<template>

    <transition name="fade">
        <div class="vue-modal" v-show="open">
            <transition name="drop-in">
                <div class="vue-modal-inner" v-show="open">
                    <div class="vue-modal-content">

                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="px-3">
                                            <div class="form-body">

                                                <form>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group p-1">
                                                                <label>Question
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input v-model="form.question" type="text" id="name"
                                                                       class="form-control pl-1" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group p-1">
                                                                <label>Option One
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input v-model="form.option_one" type="text" id="name"
                                                                       class="form-control pl-1" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group p-1">
                                                                <label>Option Two
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input v-model="form.option_two" type="text" id="name"
                                                                       class="form-control pl-1" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group p-1">
                                                                <label>Option Three</label>
                                                                <input v-model="form.option_three" type="text" id="name"
                                                                       class="form-control pl-1">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group p-1">
                                                                <label>Option Four</label>
                                                                <input v-model="form.option_four" type="text" id="name"
                                                                       class="form-control pl-1">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group p-1">
                                                                <label>Option Five</label>
                                                                <input v-model="form.option_five" type="text" id="name"
                                                                       class="form-control pl-1">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group p-1">
                                                                <label>Answer
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input v-model="form.correct_answer" type="text"
                                                                       id="name" class="form-control pl-1" required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12 center-inside">
                                                        <button v-if="question === undefined"
                                                                @click.prevent="submitQuestion"
                                                                class="btn btn-primary btn-md p-1 mr-1">Submit</button>
                                                        <button v-else @click.prevent="updateQuestion(question.id)"
                                                                class="btn btn-primary btn-md mr-1 p-1">Update</button>
                                                        <button @click.prevent="emitCloseModal"
                                                                class="btn btn-danger btn-md p-1">Close</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>

                                        <p class="text-center text-danger"
                                           v-for="(error, index) in errors" :key="index">
                                            {{ error}}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </transition>
        </div>
    </transition>

</template>

<script>
// import CkEditor in current component to work
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import {onBeforeMount, onUnmounted, onMounted, reactive, ref, watch} from 'vue';
import SweetAlertService from "../../../../services/sweet-alert-service";
import axios from "axios";
import {useRoute} from "vue-router";

export default {
    props: {
        question: Object,
        module: Object,
        open: Boolean,
    },

    components: {
        // Use the <ckeditor> component in this view.
        ckeditor: CKEditor.component,
    },

    // Context for emit
    setup(props, context){
        // For routing with params, get id from current url
        const module_id = ref('');
        const route = useRoute();
        module_id.value = route.params.id;
        watch(
            () => route.params.id,
            () => {
                module_id.value = route.params.id;
            },
        );

        const question = ref(props.question);
        const module = ref(props.module);
        const modules = ref([]);
        const form = reactive({
            brace_module_id: props.question !== undefined ? question.value.brace_module_id : module_id.value,
            question: props.question !== undefined ? question.value.question : '',
            option_one: props.question !== undefined ? question.value.option_one : '',
            option_two: props.question !== undefined ? question.value.option_two : '',
            option_three: props.question !== undefined ? question.value.option_three : '',
            option_four: props.question !== undefined ? question.value.option_four : '',
            option_five: props.question !== undefined ? question.value.option_five : '',
            correct_answer: props.question !== undefined ? question.value.correct_answer : '',
        });
        const editor = ClassicEditor;
        const editorConfig = ref({});
        const errors = ref([]);
        const submission_error = ref('');

        const emitCloseModal = () => {
            console.log("emit close modal");
            context.emit("emitting-close-modal", 'Close modal');
        }

        const handleKeyup = (event) => {
            if(event.keyCode === 27){
                emitCloseModal();
            }
        }

        const submitQuestion = async () => {
            SweetAlertService.formLoading(Swal, 'Please wait', 'Submitting...');

            //Check if the correct answer is part of the options
            let options = [form.option_one, form.option_two, form.option_three, form.option_four, form.option_five]
            if(!options.includes(form.correct_answer)){
                SweetAlertService.formError(Swal, "<p>The correct answer must be part of the options</p>", 7000);
                return false;
            }

            const formData = new FormData();
            // iterate and add form data
            Object.keys(form).forEach(function(key) {
                console.log(key); // key
                console.log(form[key]); // value
                formData.append(key, form[key]);
            });

            await axios.post('/api/admin/module/assessment/questions/store', formData, {
                headers: {
                    'content-type': 'multipart/form-data',
                    "Authorization" : "Bearer " + localStorage.getItem('learning-admin-tk'),
                    'Accept' : 'application/json',
                }
            }).then((response) => {
                if (response.data.success) {
                    errors.value = [];
                    console.log("Emitting Submitted Question");
                    context.emit("emitting-submitted-question", response.data.question);
                    console.log(response.data.question);

                    SweetAlertService.formSuccess(Swal, 'Submitted', 2500);
                    // Clear fields
                    Object.keys(form).forEach(function(key) {
                        // If key is not equals to brace_module_id, clear all fields
                        if(key !== 'brace_module_id'){
                            form[key] = '';
                        }
                    });

                } else {
                    if(response.data.submission_error){
                        submission_error.value = response.data.submission_error;
                        SweetAlertService.formError(Swal, response.data.submission_error, 7000);
                    }
                    SweetAlertService.formError(Swal, 'one or more fields are required', 7000);
                    if(response.data.errors.length){
                        errors.value = response.data.errors;
                    }
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        const updateQuestion = async (id) => {
            SweetAlertService.formLoading(Swal, 'Please wait', 'Updating...');

            //Check if the correct answer is part of the options
            let options = [form.option_one, form.option_two, form.option_three, form.option_four, form.option_five]
            if(!options.includes(form.correct_answer)){
                SweetAlertService.formError(Swal, "<p>The correct answer must be part of the options</p>", 7000);
                return false;
            }

            const formData = new FormData();
            // iterate and add form data
            Object.keys(form).forEach(function(key) {
                console.log(key); // key
                console.log(form[key]); // value
                if(form[key] !== null){
                    formData.append(key, form[key]);
                }else{
                    formData.append(key, '');
                }
            });

            await axios.post('/api/admin/module/assessment/questions/update', formData, {
                headers: {
                    'content-type': 'multipart/form-data',
                    "Authorization" : "Bearer " + localStorage.getItem('learning-admin-tk'),
                    'Accept' : 'application/json',
                },
                params: {
                    id: id
                }
            }).then((response) => {
                if (response.data.success) {
                    console.log("Emitting Updated Question");
                    context.emit("emitting-updated-question", response.data.question);
                    console.log(response.data.question);

                    SweetAlertService.formSuccess(Swal, 'Updated', 2500);
                } else {
                    if(response.data.message){
                        console.log(response.data.message);
                    }
                    if(response.data.errors.length){
                        errors.value = response.data.errors;
                        SweetAlertService.formError(Swal, 'one or more fields are required', 5000);
                    }

                }
            }).catch((error) => {
                console.log(error);
            });
        }

        const getModules = () => {
            axios.get('/api/admin/modules', {
                withCredentials: true,
                headers: {
                    "Authorization" : "Bearer " + localStorage.getItem('learning-admin-tk'),
                    'Accept' : 'application/json',
                },
            }).then((response) => {
                if(response.data.success === true){
                    modules.value = response.data.modules.data;
                }else{
                    console.log(response.data.message);
                }
                console.log(modules.value);
            }).catch((error) => {
                console.log(error);
            });
        }

        onBeforeMount(() => {
            document.addEventListener("keyup", handleKeyup);
            if(question !== undefined){
                getModules();
            }
        });

        onUnmounted(() => {
            document.removeEventListener("keyup", handleKeyup);
        });

        return {
            question,
            module_id,
            route,
            form,
            modules,
            module,
            editor,
            editorConfig,
            errors,
            submission_error,

            submitQuestion,
            updateQuestion,
            emitCloseModal,
            getModules
        }
    }
}
</script>

<style scoped>
*,
::before,
::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.vue-modal {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 1;
}

.vue-modal-inner{
    width: 60%;
    margin: 10rem auto;
}

@media only screen and (max-width: 420px) {
    .vue-modal-inner {
        width: 100%;
    }
}

.vue-modal-content {
    padding: 8px;
    background-color: #fff;
    position: relative;
    border: 1px solid rgba(0, 0, 0, 0.3);
    background-clip: padding-box;
    border-radius: 0.5rem;
    box-shadow: rgba(0, 0, 0, 0.16) 0 3px 6px, rgba(0, 0, 0, 0.23) 0 3px 6px;
}

.vue-modal-btn {
    width: 100px;
    background-color: #f81f1f;
    color: #fff;
    border-radius: 5px;
    margin: 0 auto;
    height: 30px;
    align-content: center;
    display: grid;
    font-size: 13px;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.drop-in-enter-active,
.drop-in-leave-active {
    transition: all 0.3s ease-out;
}

.drop-in-enter-from,
.drop-in-leave-to {
    opacity: 0;
    transform: translateY(-50px);
}
</style>

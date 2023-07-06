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
                                                        <div class="col-md-6">
                                                            <div class="form-group p-1">
                                                                <label>Title
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input v-model="form.title" type="text" id="name"
                                                                       class="form-control pl-1" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group p-1">
                                                                <label>Study Timer</label>
                                                                <input v-model="form.study_timer" type="number" id="name"
                                                                       class="form-control pl-1">
                                                            </div>
                                                        </div>

                                                        <div v-if="course !== undefined" class="col-md-6 p-1">
                                                            <div class="form-group">
                                                                <label>Modules</label>
                                                                <select v-model="form.brace_module_id"
                                                                        class="form-control" required>
                                                                    <option selected :value="course.brace_module_id">
                                                                        {{ course.module.title }}
                                                                    </option>
                                                                    <option v-for="module in modules"
                                                                            :key="module.id"
                                                                            :value="module.id">
                                                                        {{ module.title }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group pl-1">

                                                                <label>image</label><br>
                                                                <input type="file" @change="uploadImage"
                                                                       class="input-bg" required>

                                                                <!--If new course and image has been uploaded-->
                                                                <div v-if="course === undefined && imageErrorMessage === '' && form.image !== null">
                                                                    <img :src="imagePreview" width="100"/>
                                                                    <span @click="form.image = null"
                                                                          class="pl-1 fa fa-times text-danger"
                                                                          title="Remove image"></span>
                                                                </div>

                                                                <!--If course already exists and image has not been uploaded, during edit use image from database-->
                                                                <div v-if="course !== undefined && imageErrorMessage === '' && form.image === null">
                                                                    <img :src="course.image" width="100"/>
                                                                </div>

                                                                <!--If course already exists and image has has been uploaded during edit-->
                                                                <div v-else-if="course !== undefined && imageErrorMessage === '' && form.image !== null">
                                                                    <img :src="imagePreview" width="100"/>
                                                                    <span @click="form.image = null"
                                                                          class="pl-1 fa fa-times text-danger"
                                                                          title="Remove image"></span>
                                                                </div>

                                                                <p v-if="imageErrorMessage !== ''"
                                                                   class="text-center text-danger">
                                                                    {{ imageErrorMessage }}
                                                                </p>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Type
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select v-model="form.content_type" class="form-control pl-1" required>
                                                                <option v-if="course !== undefined" selected
                                                                        :value="course.content_type">
                                                                    {{ course.content_type }}
                                                                </option>
                                                                <option value=""></option>
                                                                <option value="Video">Video</option>
                                                                <option value="Article">Article</option>
                                                                <option value="Video & Article">Video & Article</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Video Embed Link</label>
                                                                <textarea v-model="form.video" class="form-control pl-1"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Objectives</label>
                                                                <ckeditor :editor="editor" v-model="form.objectives"
                                                                          :config="editorConfig" class="input-bg"></ckeditor>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Course Outline</label>
                                                                <ckeditor :editor="editor" v-model="form.course_outline"
                                                                          :config="editorConfig" class="input-bg"></ckeditor>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Course Contents</label>
                                                                <ckeditor :editor="editor" v-model="form.course_contents"
                                                                          :config="editorConfig" class="input-bg"></ckeditor>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 p-1">
                                                            <div class="form-group">
                                                                <label>Trainers
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input v-model="form.trainers" type="text" id="name"
                                                                       class="form-control pl-1" :placeholder="form.trainers" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 p-1">
                                                            <div class="form-group">
                                                                <label>Status
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <select v-model="form.status" class="form-control" required>
                                                                    <option value="">Select</option>
                                                                    <option value="1">Publish</option>
                                                                    <option value="0">Draft</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 p-1">
                                                            <div class="form-group">
                                                                <label>Order (0, being the first)
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input v-model="form.sort" type="number" id="name"
                                                                       class="form-control pl-1" :placeholder="form.sort">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 center-inside">
                                                        <button v-if="course === undefined"
                                                                @click.prevent="submitCourse"
                                                                class="btn btn-primary btn-md p-1 mr-1">Submit</button>
                                                        <button v-else @click.prevent="updateCourse(course.id)"
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
import SweetAlertService from "../../../services/sweet-alert-service";
import axios from "axios";
import {useRoute} from "vue-router";

export default {
    props: {
        course: Object,
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
                id.value = route.params.id;
            },
        );

        const course = ref(props.course);
        const module = ref(props.module);
        const form = reactive({
            title: props.course !== undefined ? course.value.title : '',
            brace_module_id: props.course !== undefined ? course.value.brace_module_id : module_id.value,
            image: null,
            study_timer: props.course !== undefined ? course.value.study_timer : '',
            objectives: props.course !== undefined ? course.value.objectives : '',
            video: props.course !== undefined ? course.value.video : '',
            course_outline: props.course !== undefined ? course.value.course_outline : '',
            course_contents: props.course !== undefined ? course.value.course_contents : '',
            content_type: props.course !== undefined ? course.value.content_type : '',
            trainers: props.course !== undefined ? course.value.trainers : '',
            sort: props.course !== undefined ? course.value.sort : 0,
            status: props.course !== undefined ? course.value.status : ''
        });
        const editor = ClassicEditor;
        const editorConfig = ref({});
        const errors = ref([]);
        const imageErrorMessage = ref('');
        const imagePreview = ref(null);
        const modules = ref([]);

        const emitCloseModal = () => {
            console.log("emit close modal");
            context.emit("emitting-close-modal", 'Close modal');
        }

        const handleKeyup = (event) => {
            if(event.keyCode === 27){
                emitCloseModal();
            }
        }

        const uploadImage = (event) => {
            validateImage(event);
            //Assign image and path to this variable
            form.image = event.target.files[0];
            // create base64 version display of image
            imagePreview.value = URL.createObjectURL(event.target.files[0]);
        }

        const validateImage = (event) => {
            // Validate Image
            let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            if(!allowedExtensions.exec(event.target.files[0].name)){
                imageErrorMessage.value = 'Incorrect image format';
                console.log(imageErrorMessage.value);
                form.image = null;
                return false;
            }else{
                imageErrorMessage.value = '';
            }

            if(event.target.files[0].size > 5000000){
                imageErrorMessage.value = 'File too large, 5mb max.';
                form.image = null;
                return false;
            }else{
                imageErrorMessage.value = '';
            }
        }

        const submitCourse = async () => {
            SweetAlertService.formLoading(Swal, 'Please wait', 'Submitting...');

            const formData = new FormData();
            // iterate and add form data
            Object.keys(form).forEach(function(key) {
                console.log(key); // key
                console.log(form[key]); // value
                formData.append(key, form[key]);
            });

            await axios.post('/api/admin/courses/store', formData, {
                headers: {
                    'content-type': 'multipart/form-data',
                    "Authorization" : "Bearer " + localStorage.getItem('learning-admin-tk'),
                    'Accept' : 'application/json',
                }
            }).then((response) => {
                if (response.data.success) {
                    errors.value = []; // empty error messages
                    console.log("Emitting Submitted Course");
                    context.emit("emitting-submitted-course", response.data.course);
                    console.log(response.data.course);

                    SweetAlertService.formSuccess(Swal, 'Submitted', 2500);
                    // Clear fields
                    Object.keys(form).forEach(function(key) {
                        // If there is a module and key is not brace_module_id, clear form field
                        if(module !== undefined && key !== 'brace_module_id'){
                            if(key === 'image'){
                                form[key] = null;
                            }else{
                                form[key] = '';
                            }
                        }
                    });

                } else {
                    SweetAlertService.formError(Swal, 'one or more fields are required', 7000);
                    if(response.data.message){
                        console.log(response.data.message);
                    }
                    if(response.data.errors.length){
                        errors.value = response.data.errors;
                    }
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        const updateCourse = async (id) => {
            SweetAlertService.formLoading(Swal, 'Please wait', 'Updating...');

            const formData = new FormData();
            // iterate and add form data
            Object.keys(form).forEach(function(key) {
                console.log(key); // key
                console.log(form[key]); // value
                if(form[key] !== null){
                    formData.append(key, form[key]);
                }
            });

            await axios.post('/api/admin/courses/update', formData, {

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
                    errors.value = []; // empty error messages
                    console.log("Emitting Updated Course");
                    context.emit("emitting-updated-course", response.data.course); // Emit updated content to item component
                    console.log(response.data.course);
                    // remove recently uploaded image
                    form.image = null;
                    SweetAlertService.formSuccess(Swal, 'Updated', 2500);
                } else {
                    if(response.data.message){
                        SweetAlertService.formError(Swal, 'Unknown error occurred, contact developer', 5000);
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
            if(course !== undefined){
                getModules();
                // form.brace_module_id = course.brace_module_id;
            }
            // else{
            //     form.brace_module_id = module_id.value;
            //     console.log('module id '+module_id.value);
            // }
        });

        onUnmounted(() => {
            document.removeEventListener("keyup", handleKeyup);
        });

        return {
            module_id,
            route,
            form,
            course,
            modules,
            module,
            editor,
            editorConfig,
            imageErrorMessage,
            imagePreview,
            errors,

            submitCourse,
            updateCourse,
            emitCloseModal,
            uploadImage,
            validateImage,
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

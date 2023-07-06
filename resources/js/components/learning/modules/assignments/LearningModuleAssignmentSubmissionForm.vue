<script setup>
    import {ref, computed, reactive} from "vue";
    import axios from "axios";
    import SweetAlertService from "../../../../services/sweet-alert-service";

    const props = defineProps([
        'module_id',
        'assignment_id'
    ])

    const form = reactive({
        document_one: ref(null),
        document_two: ref(null),
        document_three: ref(null),
    });

    const module_id = ref(props.module_id);
    const assignment_id = ref(props.assignment_id);
    const errors = ref([]);
    const emit = defineEmits(['emitting-submitted-assignment'])

    // Upload files
    const uploadFile = (event, number) => {
        if(number === 1){
            if(event.target.files[0]){
                validateDocument(event);
                form.document_one = event.target.files[0];
                console.log(form.document_one);
            }
        }

        if(number === 2){
            if(event.target.files[0]){
                validateDocument(event);
                form.document_two = event.target.files[0];
                console.log(form.document_two);
            }
        }

        if(number === 3){
            if(event.target.files[0]){
                validateDocument(event);
                form.document_three = event.target.files[0];
            }
        }

    };

    const validateDocument = (event) => {
        // Validate Document
        let allowedExtensions = /(\.docx|\.doc|\.ppt|\.pptx|\.xls|\.xlsx|\.pdf)$/i;
        if(!allowedExtensions.exec(event.target.files[0].name)){
            errors.value.push('Incorrect document format for '+ event.target.files[0].name);
            console.log(errors.value);
            return false;
        }else{
            errors.value = [];
        }

        if(event.target.files[0].size > 10000000){
            errors.value.push('10mb max, File too large for '+ event.target.files[0].name);
            console.log(errors.value);
            return false;
        }else{
            errors.value = [];
        }
    }

    const submitAssignment = async () => {
        errors.value = [];
        SweetAlertService.formLoading(Swal, 'Please wait', 'Submitting...');

        // iterate and add form data
        const formData = new FormData();
        Object.keys(form).forEach(function(key) {
            console.log(key); // key
            console.log(form[key]); // value
            if(form[key]){
                formData.append(key, form[key]);
            }
        });
        formData.append('brace_module_id', module_id.value);
        formData.append('module_assignment_id', assignment_id.value);

        // Get token from local storage
        let token = localStorage.getItem('brace-learning-tk');
        axios.post('/api/learning/module/assignment/store', formData, {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
            params: {
                token: token,
            }

        }).then((response) => {
            if (response.data.success) {
                errors.value = [];
                console.log("Emitting Submitted Resource");
                emit("emitting-submitted-assignment", response.data.assignment);
                console.log(response.data.assignment);

                SweetAlertService.formSuccess(Swal, 'Submitted', 2500);
                // Clear fields
                Object.keys(form).forEach(function(key) {
                    // If key is not equals to brace_course_id, clear all fields
                    form[key] = null;
                });
            }

            if (response.data.errors) {
                SweetAlertService.formError(Swal, 'One or more errors occurred, check your form', 3000);
                errors.value = response.data.errors;
                console.log(response.data.errors);
            }

            // Custom validation from backend
            if (response.data.submission_error) {
                SweetAlertService.formError(Swal, response.data.submission_error, 3000);
                errors.value.push(response.data.submission_error);
                console.log(response.data.errors);
            }

            // Errors from backend should be shown in console.log
            if (response.data.error_message) {
                console.log(response.data.error_message);
            }

        }).catch((error) => {
            console.log(error);
        });
    }

</script>

<template>
    <div class="row bg-medium-grey p-3 justify-content-center">
        <div class="col-8">
            <h5 class="text-dark-green">Submit your Assignment</h5>
            <ul>
                <li>You can only submit once</li>
                <li>Please submit document format in pdf, doc, docx, xlx, xlsx, ppt and pptx</li>
                <li>All documents should be 10mb max</li>
            </ul>

            <form @submit.prevent="submitAssignment">

                <div class="form-group">
                    <label class="custom-file-input-btn">
                        <input class="hide-file-input-btn" type="file" @change="uploadFile($event, 1)"/>
                        Upload Document one
                    </label>
                    <span v-if="form.document_one" class="pl-2">
                        {{ form.document_one.name }}
                        <span @click.prevent="form.document_one = null"
                              class="fa fa-ban text-danger" title="delete"></span>
                    </span>
                </div>

                <div class="form-group">
                    <label class="custom-file-input-btn">
                        <input class="hide-file-input-btn" type="file" @change="uploadFile($event, 2)"/>
                        Upload Document two
                    </label>
                    <span v-if="form.document_two" class="pl-2">
                        {{ form.document_two.name }}
                        <span @click.prevent="form.document_two = null"
                              class="fa fa-ban text-danger" title="delete"></span>
                    </span>
                </div>

                <div class="form-group">
                    <label class="custom-file-input-btn">
                        <input class="hide-file-input-btn" type="file" @change="uploadFile($event, 3)"/>
                        Upload Document three
                    </label>
                    <span v-if="form.document_three" class="pl-2">
                        {{ form.document_three.name }}
                        <span @click.prevent="form.document_three = null"
                              class="fa fa-ban text-danger" title="delete"></span>
                    </span>
                </div>

                <div class="form-group">
                    <p class="m-0 text-center text-danger tx-14" v-for="(error, index) in errors" :key="index">
                        {{ error }}
                    </p>
                </div>

                <div class="form-group">
                    <button class="submit-btn bg-light-brown d-flex justify-content-center mt-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>

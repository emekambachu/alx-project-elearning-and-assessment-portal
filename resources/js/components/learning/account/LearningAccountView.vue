<script setup>
import {ref, reactive, onBeforeMount} from "vue";
    import axios from "axios";
    import SweetAlertService from "../../../services/sweet-alert-service";

    const form = reactive({
        image: ref(null),
        password: ref(''),
        password_confirmation: ref(''),
    });

    const imagePreview = ref(null);
    const errors = ref([]);
    const imageErrors = ref([]);
    const passwordErrors = ref([]);
    const user = ref({});

    const getUser = async () => {
        // Get token from local storage
        let token = localStorage.getItem('brace-learning-tk');
        axios.get('/api/learning/authenticate', {
            // Make "true" if not using external API
            withCredentials: true,
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
            params: {
                token: token,
            }
        }).then((response) => {
            if (response.data.success) {
                user.value = response.data.user;
                console.log(response.data.user)
            }
        }).catch((error) => {
            console.log(error);
        });
    }

    // Upload files
    const uploadImage = (event) => {
        validateImage(event);
        form.image = event.target.files[0];
        imagePreview.value = URL.createObjectURL(event.target.files[0]);
        console.log(form.image);
    };

    const validateImage = (event) => {
        // Validate Document
        let allowedExtensions = /(\.jpg|\.png|\.jpeg)$/i;
        if(!allowedExtensions.exec(event.target.files[0].name)){
            imageErrors.value.push('Incorrect image format for '+ event.target.files[0].name);
            console.log(errors.value);
            return false;
        }else{
            imageErrors.value = [];
        }

        if(event.target.files[0].size > 5000000){
            imageErrors.value.push('5mb max, File too large for '+ event.target.files[0].name);
            console.log(errors.value);
            return false;
        }else{
            imageErrors.value = [];
        }
    }

    const updateProfileImage = async () => {
        imageErrors.value = [];
        SweetAlertService.formLoading(Swal, 'Please wait', 'Submitting...');

        // iterate and add form data
        const formData = new FormData();
        if(form.image){
            formData.append('image', form.image);
        }else{
            imageErrors.value.push('image is required');
            SweetAlertService.formError(Swal, 'image is required', 2000);
            return false;
        }

        // Get token from local storage
        let token = localStorage.getItem('brace-learning-tk');
        axios.post('/api/learning/account/update/account', formData, {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },

        }).then((response) => {
            if (response.data.success) {
                user.value = response.data.user;
                imageErrors.value = [];
                SweetAlertService.formSuccess(Swal, 'Uploaded', 2500);
            }

            if (response.data.errors) {
                SweetAlertService.formError(Swal, 'One or more errors occurred, check your form', 3000);
                imageErrors.value = response.data.errors;
                console.log(response.data.errors);
            }

            // Custom validation from backend
            if (response.data.submission_error) {
                SweetAlertService.formError(Swal, response.data.submission_error, 3000);
                imageErrors.value.push(response.data.submission_error);
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

    const updatePassword = async () => {
        passwordErrors.value = [];
        SweetAlertService.formLoading(Swal, 'Please wait', 'Submitting...');

        if(form.password !== form.password_confirmation){
            passwordErrors.value.push('Password and Password Confirmation does not match');
            SweetAlertService.formError(Swal, 'Password and Password Confirmation does not match', 2000);
            return false;
        }

        const formData = new FormData();
        formData.append('password', form.password);
        formData.append('password_confirmation', form.password_confirmation);

        // Get token from local storage
        let token = localStorage.getItem('brace-learning-tk');
        axios.post('/api/learning/account/update/account', formData, {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },

        }).then((response) => {
            if (response.data.success) {
                passwordErrors.value = [];
                SweetAlertService.formSuccess(Swal, 'Updated', 2500);
            }

            if (response.data.errors) {
                SweetAlertService.formError(Swal, 'One or more errors occurred, check your form', 3000);
                passwordErrors.value = response.data.errors;
                console.log(response.data.errors);
            }

            // Custom validation from backend
            if (response.data.submission_error) {
                SweetAlertService.formError(Swal, response.data.submission_error, 3000);
                passwordErrors.value.push(response.data.submission_error);
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

    onBeforeMount(() => {
       getUser();
    });

</script>

<template>
    <div class="row mt-3">
        <div class="col-12">
            <p><span class="text-light-grey">Dashboard</span> / <span class="text-dark">Account Settings</span></p>
            <h2 class="text-orange float-left">Account Settings</h2>
        </div>

        <div class="col-12">
            <form @submit.prevent="updateProfileImage">
                <div class="row justify-content-center d-flex">
                    <div class="col-md-8 bg-white-radius-shadow mb-5 text-center">
                        <img v-if="imagePreview" :src="imagePreview"
                             width="200" class="mb-3 rounded-circle center-cropped-200"/>
                        <img v-else-if="!imagePreview || imageErrors.length > 0" :src="user.image"
                             width="200" class="mb-3 rounded-circle center-cropped-200"/>

                        <div class="form-group">
                            <label class="custom-file-input-btn">
                                <input class="hide-file-input-btn" type="file"
                                       @change="uploadImage($event)"/>
                                Upload
                            </label>
                        </div>

                        <div class="form-group">
                            <p class="m-0 text-center text-danger tx-14"
                               v-for="(error, index) in imageErrors" :key="index">
                                {{ error }}
                            </p>
                        </div>

                        <div class="form-group">
                            <button class="submit-btn bg-light-brown d-flex justify-content-center mt-2">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

            <form @submit.prevent="updatePassword">
                <div class="row justify-content-center d-flex">
                    <div class="col-md-8 bg-white-radius-shadow">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input v-model="form.password"
                                           class="form-control" type="password" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password Confirmation</label>
                                    <input v-model="form.password_confirmation"
                                           class="form-control" type="password" required/>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <p class="m-0 text-center text-danger tx-14"
                                       v-for="(error, index) in passwordErrors" :key="index">
                                        {{ error }}
                                    </p>
                                </div>

                                <div class="form-group">
                                    <button class="submit-btn bg-light-brown d-flex justify-content-center mt-2">Update</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>

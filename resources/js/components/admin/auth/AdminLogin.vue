<template>

    <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-11 col-md-5 padding-four-all md-padding-eight-all md-padding-15px-lr sm-padding-50px-tb border-radius-4 card"
                     style="visibility: visible; animation-name: fadeInLeft; background-color: #fff;">
                    <div class="row m-0">
                        <div class="col-12 margin-six-bottom lg-margin-six-bottom md-margin-30px-bottom sm-no-margin-bottom">
                            <h4 class="na-text-dark-green learning-intro-header text-center mx-auto mx-lg-0 sm-width-100 mb-0">Admin</h4>
                            <p class="text-center text-medium font-normal-manrope-black">Login to Admin</p>

                            <div v-if="errors.length > 0 || error_message" class="text-center text-danger text-medium">
                                <span v-for="(error, index) in errors" :key="index">
                                    {{ error }}
                                </span><br>
                                <span>{{ error_message }}</span>
                            </div>

                        </div>
                        <!-- start feature box item -->
                        <div class="col-12 aligncenter margin-six-bottom md-margin-30px-bottom last-paragraph-no-margin">

                            <form @submit.prevent="submitLogin">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Email</label><br>
                                            <input v-model="form.email" type="email" name="email"
                                                   class="login-form" placeholder="email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Password</label><br>
                                            <input v-model="form.password" type="password" name="password"
                                                   class="login-form" placeholder="Enter Password" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-xs-6">
                                        <div class="float-left" style="display: block;">
                                            <input v-model="form.remember_me" class="login-form-checkbox"
                                                   style="display: inline; width: 20px;" type="checkbox"
                                                   name="remember">
                                            <label class="text-small">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="login-form-btn">Login</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- end feature box item -->
                    </div>
                </div>

            </div>
        </div>

</template>

<script>
import {ref, reactive, onMounted} from 'vue';
import SweetAlertService from "../../../services/sweet-alert-service";

export default {

    setup(){
        const form = reactive({
            email: '',
            password: '',
            remember_me: false,
        });

        const errors = ref([]);
        const error_message = ref('');
        const apiUrl = process.env.MIX_API_URL;

        const submitLogin = async () => {
            SweetAlertService.formLoading(Swal, 'Please wait', 'Submitting...');
            // First delete any token stored on the browser
            localStorage.removeItem("afc-admin-tk");
            await axios.post(apiUrl+'/api/admin/login', form, {
                // set to false when 'Access-Control-Allow-Origin' is '*'
                withCredentials: false,
            }).then((response) => {
                if (response.data.success) {
                    // Store token in local storage (Will have to find a more secured way)
                    localStorage.setItem('afc-admin-tk', response.data.token);
                    console.log(response.data.user);
                    window.location.href = '/admin/dashboard';
                } else {
                    if(response.data.message){
                        console.log(response.data.message);
                    }
                    if(response.data.error_message){
                        SweetAlertService.formError(Swal, response.data.error_message, 3000);
                        error_message.value = response.data.error_message;
                        console.log(response.data.error_message);
                    }
                    if(response.data.errors.length){
                        SweetAlertService.formError(Swal, 'One ore more errors occurred', 3000);
                        errors.value = response.data.errors;
                    }
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        onMounted(() => {
            console.log(apiUrl);
        });

        return {
            form,
            errors,
            error_message,
            apiUrl,

            submitLogin
        }
    },

}
</script>

<style scoped>

</style>

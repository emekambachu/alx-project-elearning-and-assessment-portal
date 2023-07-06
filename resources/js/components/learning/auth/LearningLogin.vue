<template>

    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-11 col-md-5 padding-four-all md-padding-eight-all md-padding-15px-lr sm-padding-50px-tb border-radius-4 card"
                 style="visibility: visible; animation-name: fadeInLeft; background-color: #fff;">
                <div class="row m-0">
                    <div class="col-12 margin-six-bottom lg-margin-six-bottom md-margin-30px-bottom sm-no-margin-bottom">
                        <h4 class="text-orange learning-intro-header text-center mx-auto mx-lg-0 sm-width-100 mb-0">
                            Login</h4>
                        <div v-if="errors.length > 0 || error_message" class="text-center text-danger text-medium">
                                <p class="mb-0" v-for="(error, index) in errors" :key="index">
                                    {{ error }}
                                </p><br>
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

                                <div class="col-md-6">
                                    <div class="float-left" style="display: block;">
                                        <input v-model="form.remember_me" class="login-form-checkbox"
                                               style="display: inline;" type="checkbox" name="remember">
                                        <label class="text-small text-navy-blue">Remember me</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="float-right">
                                        <a class="text-navy-blue"
                                           :href="'/learning/password/reset'">Password Reset</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="login-form-btn">Login</button>
                                    <p class="text-center">
                                        <span class="text-dark mr-1">No Account?</span>
                                        <a class="text-navy-blue" :href="'/learning/register'">Sign up</a>
                                    </p>
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
import {ref, reactive, onBeforeMount} from 'vue';
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

        const submitLogin = async () => {
            // Remove any previous token
            localStorage.removeItem('learning-user-tk');
            SweetAlertService.formLoading(Swal, 'Please wait', 'Submitting...');

            await axios.post('/api/learning/login', form, {
                withCredentials: true,
            }).then((response) => {
                if (response.data.success) {
                    // Store token in local storage (Will have to find a more secured way)
                    localStorage.setItem('learning-user-tk', response.data.token);
                    console.log(response.data.user);
                    window.location.href = '/learning/dashboard';

                } else {
                    SweetAlertService.formError(Swal, 'One ore more errors occurred', 3000);
                    if(response.data.message){
                        console.log(response.data.message);
                    }
                    if(response.data.error_message){
                        SweetAlertService.formError(Swal, response.data.error_message, 3000);
                        error_message.value = response.data.error_message;
                        console.log(response.data.error_message);
                    }
                    if(response.data.errors.length){
                        errors.value = response.data.errors;
                    }
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        const deleteCookies = () => {
            const cookies = document.cookie.split("; ");
            console.log(cookies);
            for (let c = 0; c < cookies.length; c++) {
                const d = window.location.hostname.split(".");
                while (d.length > 0) {
                    const cookieBase = encodeURIComponent(cookies[c].split(";")[0].split("=")[0]) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join('.') + ' ;path=';
                    const p = location.pathname.split('/');
                    document.cookie = cookieBase + '/';
                    while (p.length > 0) {
                        document.cookie = cookieBase + p.join('/');
                        p.pop();
                    }
                    d.shift();
                }
            }
            console.log("Cookie deleted");
        }

        onBeforeMount(() => {
           deleteCookies();
        });

        return {
            form,
            errors,
            error_message,

            submitLogin,
            deleteCookies
        }
    },

}
</script>

<style scoped>

</style>

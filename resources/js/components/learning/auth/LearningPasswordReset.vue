<template>

    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-11 col-md-5 padding-four-all md-padding-eight-all md-padding-15px-lr sm-padding-50px-tb border-radius-4 card"
                 style="visibility: visible; animation-name: fadeInLeft; background-color: #fff;">
                <div class="row m-0">
                    <div class="col-12 margin-six-bottom lg-margin-six-bottom md-margin-30px-bottom sm-no-margin-bottom">
                        <h4 class="na-text-dark-green learning-intro-header text-center mx-auto mx-lg-0 sm-width-100 mb-0">
                            Learning Portal</h4>
                        <p class="text-center text-medium font-normal-manrope-black">Password Reset</p>

                        <div v-if="errors.length > 0 || error_message" class="text-center text-danger text-medium">
                                <span v-for="(error, index) in errors" :key="index">
                                    {{ error }}
                                </span><br>
                            <span>{{ error_message }}</span>
                        </div>

                        <p class="text-light text-medium text-center bg-success p-2"
                           v-if="reset_sent">
                            A password reset link has been sent to your email, click on the link to reset your password</p>
                    </div>
                    <!-- start feature box item -->
                    <div class="col-12 aligncenter margin-six-bottom md-margin-30px-bottom last-paragraph-no-margin">

                        <form @submit.prevent="submitPasswordReset">
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email</label><br>
                                        <input v-model="form.email" type="email"
                                               class="login-form" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="login-form-btn">Send Password Reset Link</button>
                                </div>
                            </div>

                        </form>

                        <p class="text-inter text-center pt-2">
                            <strong>NOTE:</strong> Check your spam emails if you don't see any link in your mailbox<br>
                            Having issues with your password reset form? <br>send us a message on brace@afchub.org
                        </p>
                    </div>
                    <!-- end feature box item -->
                </div>
            </div>

        </div>
    </div>

</template>

<script>
import {ref, reactive} from 'vue';
import SweetAlertService from "../../../services/sweet-alert-service";
export default {
    setup(){
        const form = reactive({
            email: '',
        });

        const errors = ref([]);
        const error_message = ref('');
        const reset_sent = ref(false);

        const submitPasswordReset = async () => {
            errors.value = [];
            reset_sent.value = false;
            SweetAlertService.formLoading(Swal, 'Please wait', 'Submitting...');
            await axios.post('/api/learning/password/reset', form, {
                withCredentials: true,
            }).then((response) => {
                if (response.data.success) {
                    SweetAlertService.formSuccess(Swal, 'Password reset sent', 3000);
                    reset_sent.value = true;
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

        return {
            form,
            errors,
            error_message,
            reset_sent,

            submitPasswordReset
        }
    },

}
</script>

<style scoped>

</style>

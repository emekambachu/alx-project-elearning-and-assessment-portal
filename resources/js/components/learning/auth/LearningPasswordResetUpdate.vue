<template>

    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-11 col-md-5 padding-four-all md-padding-eight-all md-padding-15px-lr sm-padding-50px-tb border-radius-4 card"
                 style="visibility: visible; animation-name: fadeInLeft; background-color: #fff;">
                <div class="row m-0">
                    <div class="col-12 margin-six-bottom lg-margin-six-bottom md-margin-30px-bottom sm-no-margin-bottom">
                        <h4 class="text-navy-blue learning-intro-header text-center mx-auto mx-lg-0 sm-width-100 mb-0">
                            Learning Portal</h4>
                        <p class="text-center text-medium font-normal-manrope-black">Update Password</p>

                        <div v-if="errors.length > 0 || error_message" class="text-center text-danger text-medium">
                                <span v-for="(error, index) in errors" :key="index">
                                    {{ error }}
                                </span><br>
                            <span>{{ error_message }}</span>
                        </div>

                    </div>
                    <!-- start feature box item -->
                    <div class="col-12 aligncenter margin-six-bottom md-margin-30px-bottom last-paragraph-no-margin">

                        <form @submit.prevent="submitPassword">
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Password</label><br>
                                        <input v-model="form.password" type="password"
                                               class="login-form" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password Confirmation</label><br>
                                        <input v-model="form.password_confirmation" type="password"
                                               class="login-form" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="login-form-btn">Update Password</button>
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
import {ref, reactive} from 'vue';
import SweetAlertService from "../../../services/sweet-alert-service";

export default {
    props: {
      verification_token: Object
    },

    setup(props){
        const form = reactive({
            password: '',
            password_confirmation: '',
            verification_token: props.verification_token,
        });

        const errors = ref([]);
        const error_message = ref('');

        const submitPassword = async () => {
            SweetAlertService.formLoading(Swal, 'Please wait', 'Submitting...');
            await axios.post('/api/learning/password/update', form, {
                withCredentials: true,
            }).then((response) => {
                if (response.data.success){
                    SweetAlertService.formSuccess(Swal, 'Password Updated', 3000);
                    window.location.href = '/learning/login';
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

            submitPassword
        }
    },

}
</script>

<style scoped>

</style>

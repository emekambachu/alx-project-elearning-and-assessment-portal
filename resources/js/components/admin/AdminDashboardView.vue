<template>

    <section id="minimal-statistics">
        <div class="row">
            <div class="col-12">
                <h2 class="content-header">Welcome <strong>{{ user.name }}</strong></h2>
                <p class="content-sub-header">Statistics</p>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-stretch">
                            <a class="p-2 text-center bg-success rounded-left pt-3">
                                <div>
                                    <i class="icon-user font-large-2 text-white"></i>
                                </div>
                            </a>
                            <div class="p-2 media-body">
                                <h6>Applications</h6>
                                <h5 class="text-bold-400 mb-0">{{ applications }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-stretch">
                            <a class="p-2 text-center bg-danger rounded-left pt-3" href="">
                                <div>
                                    <i class="icon-user font-large-2 text-white"></i>
                                </div>
                            </a>
                            <div class="p-2 media-body">
                                <h6>Selected Applications</h6>
                                <h5 class="text-bold-400 mb-0">
                                    {{ selectedApplications }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

</template>

<script>
import {onMounted, ref} from 'vue';
import axios from "axios";
export default {

    setup(){
        const user = ref('');
        const applications = ref(0);
        const selectedApplications = ref(0);

        // login using main hub api
        const appUrl = process.env.MIX_API_URL+'/api/admin/user';

        const getUser = async () => {
            // Get token from local storage
            let token = localStorage.getItem('afc-admin-tk');
            axios.get(appUrl, {
                withCredentials: false,
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

        const getStats = async () => {
            // Get token from local storage
            axios.get('/api/admin/dashboard/stats', {
                withCredentials: true,
                headers: {
                    "Authorization" : "Bearer " + localStorage.getItem('afc-admin-tk'),
                    'Accept' : 'application/json',
                },
            }).then((response) => {
                if (response.data.success) {
                    applications.value = response.data.applications
                    selectedApplications.value = response.data.selected_applications
                    console.log(response.data);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        onMounted(() => {
            getUser();
            getStats();
        });

        return {
            user,
            applications,
            selectedApplications,

            getUser,
            getStats
        }
    }

}
</script>

<style scoped>

</style>

<template>

    <section id="minimal-statistics">
        <div class="row">
            <div class="col-12">
                <h2 class="content-header">Welcome <strong>{{ user.name }}</strong></h2>
                <p class="content-sub-header">Statistics</p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-stretch">
                            <a class="p-2 text-center bg-success rounded-left pt-3">
                                <div>
                                    <i class="icon-user font-large-2 text-white"></i>
                                </div>
                            </a>
                            <div class="p-2 media-body">
                                <h6>Users</h6>
                                <h5 class="text-bold-400 mb-0">{{ applications }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-stretch">
                            <a class="p-2 text-center bg-danger rounded-left pt-3" href="">
                                <div>
                                    <i class="icon-user font-large-2 text-white"></i>
                                </div>
                            </a>
                            <div class="p-2 media-body">
                                <h6>Modules</h6>
                                <h5 class="text-bold-400 mb-0">
                                    0
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-stretch">
                            <a class="p-2 text-center bg-danger rounded-left pt-3" href="">
                                <div>
                                    <i class="icon-user font-large-2 text-white"></i>
                                </div>
                            </a>
                            <div class="p-2 media-body">
                                <h6>Courses</h6>
                                <h5 class="text-bold-400 mb-0">
                                    0
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
import {onBeforeMount, onMounted, ref} from 'vue';
import axios from "axios";
export default {

    setup(){
        const user = ref('');
        const applications = ref(0);

        const getUser = async () => {
            // Get token from local storage
            let token = localStorage.getItem('learning-admin-tk');
            axios.get('/api/admin/authenticate', {
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
                    "Authorization" : "Bearer " + localStorage.getItem('learning-admin-tk'),
                    'Accept' : 'application/json',
                },
            }).then((response) => {
                if (response.data.success) {
                    applications.value = response.data.applications
                    console.log(response.data);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        onBeforeMount(() => {
            getUser();
            getStats();
        });

        return {
            user,
            applications,

            getUser,
            getStats
        }
    }

}
</script>

<style scoped>

</style>

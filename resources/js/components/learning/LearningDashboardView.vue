<template>

    <div class="row bg-gradient-blue-purple border-radius-8 pt-5 mb-3">
        <div class="col-7">
            <h1 class="text-white text-inter font-weight-bolder">Welcome {{ user.name }}</h1>
            <p class="text-white text-inter">
                Gather all the knowledge you need from our carefully curated
                courses, interactive exercises and quizzes.
            </p>
        </div>
        <div class="col-5">
            <img :src="'/images/icons/book-glasses.png'" class="welcome-image"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 p-2">
            <div class="bg-light-yellow h-100 dashboard-summary-box">
                <img class="float-left" :src="'/images/icons/folder-open.png'" width="50"/>
                <div class="float-left ml-2">
                    <p class="text-dark mb-0">Total Modules</p>
                    <h2 class="text-inter text-yellow">{{ totalModules }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 p-2">
            <div class="bg-light-green h-100 dashboard-summary-box">
                <img class="float-left" :src="'/images/icons/book-stack.png'" width="50"/>
                <div class="float-left ml-2">
                    <p class="text-dark mb-0">Total Courses</p>
                    <h2 class="text-inter text-navy-blue">{{ totalCourses }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 p-2">
            <div class="bg-light-orange h-100 dashboard-summary-box">
                <img class="float-left" :src="'/images/icons/book-open.png'" width="50"/>
                <div class="float-left ml-2">
                    <p class="text-dark mb-0">Total Resources</p>
                    <h2 class="text-inter text-orange">06</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-navy-blue float-left">Modules</h2>

            <router-link
                exact
                class="float-right"
                :to="{name: 'LearningModuleView'}">
                <span class="text-grey">See all <i class="fa fa-arrow-right"></i></span>
            </router-link>
        </div>

        <learning-module-item
            v-for="module in modules" :key="module.id"
            :module="module"
            :min_module="min_module_sort"
        ></learning-module-item>

    </div>

</template>

<script>
import {ref, onBeforeMount} from 'vue';
import LearningModuleItem from "./modules/LearningModuleItem.vue";
import RouteService from "../../services/route-service";
export default {
    components: {
        LearningModuleItem
    },
    setup(){
        const user = ref('');
        const totalModules = ref(0);
        const modules = ref([]);
        const min_module_sort = ref(0);
        const totalCourses = ref(0);
        const totalResources = ref(0);

        const getUser = async () => {
            // Get token from local storage
            let token = localStorage.getItem('learning-user-tk');
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

        const dashboardSummary = async () => {
            // Get token from local storage
            let token = localStorage.getItem('learning-user-tk');
            axios.get('/api/learning/dashboard/summary', {
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
                    totalModules.value = response.data.total_modules;
                    totalCourses.value = response.data.total_courses;
                    modules.value = response.data.modules;
                    min_module_sort.value = response.data.min_module_sort;
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        onBeforeMount(() => {
            getUser();
            dashboardSummary();
        });

        return {
            user,
            totalModules,
            totalCourses,
            totalResources,
            modules,
            min_module_sort,

            getUser,
            dashboardSummary,
        }
    }
}
</script>

<style scoped>

</style>

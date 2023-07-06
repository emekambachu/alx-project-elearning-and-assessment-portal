<template>
    <div class="row">
        <div class="col-12">
            <p>
                <router-link
                    exact
                    :to="{name: 'LearningDashboardView'}">
                    <span class="text-light-grey">Dashboard</span>
                </router-link>
                /
                <router-link
                    exact
                    :to="{name: 'LearningCourseView', params: {id: module.id}}">
                    <span class="text-light-grey">Courses</span>
                </router-link>
                /
                <span class="text-dark">{{ course.title }}</span>
            </p>
            <h4 class="text-orange float-left text-inter">{{ course.title }}</h4>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-8">
            <div class="row bg-medium-grey p-3">
                <!--Course video and contents-->
                <div v-if="course.video" class="col-12">
                    <div v-html="course.video"></div>
                </div>

                <div v-if="course.course_contents" class="col-12 mt-4">
                    <p v-html="course.course_contents"></p>
                </div>

                <!--Course resources-->
                <div v-if="course.resources" class="col-12 p-0 pb-3 bg-white na-border-radius mt-4">
                    <div class="na-bg-dark-green p-3">
                        <strong class="text-white">Resources</strong>
                    </div>

                    <div class="row justify-content-center">
                        <div v-for="resource in course.resources" :key="resource.id"
                             class="col-md-11 bg-white-radius-shadow mt-2">
                            <span class="material-symbols-outlined text-orange float-left">note</span>
                            <div class="float-left ml-1">
                                <p class="mb-0">{{ resource.title }}</p>
                                <a class="na-text-dark-green" :href="resource.url" target="_blank">
                                    {{ resource.url }}
                                </a><br>
                                <a class="na-text-dark-green"
                                   :href="resource.document" :download="resource.document">
                                    <i class="fa fa-download"></i>Download</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12">
            <learning-course-discussion-view
                :course="course"
                :module="module"
            ></learning-course-discussion-view>
        </div>
    </div>

</template>

<script>
import {ref, onBeforeMount, watch} from 'vue';
import {useRoute} from "vue-router";
import LearningCourseDiscussionView from "./discussion/LearningCourseDiscussionView.vue";

export default {
    components: {
        LearningCourseDiscussionView
    },

    setup(){
        // For routing with params, especially when changing
        const id = ref('');
        const route = useRoute();
        id.value = route.params.id;
        watch(
            () => route.params.id,
            () => {
                id.value = route.params.id;
            },
        );

        const course = ref({});
        const module = ref({});
        const activityPoints = ref(0);

        const getCourse = async () => {
            // Get token from local storage
            let token = localStorage.getItem('brace-learning-tk');
            axios.get('/api/learning/course', {
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
                params: {
                    course_id: id.value,
                }
            }).then((response) => {
                if (response.data.success) {
                    course.value = response.data.course;
                    module.value = response.data.module;
                    console.log(response.data.module);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        // const getCourseActivity = async () => {
        //     // Get token from local storage
        //     let token = localStorage.getItem('brace-learning-tk');
        //     axios.get('/api/learning/course/user-activity', {
        //         headers: {
        //             "Authorization" : "Bearer " + token,
        //             'Accept' : 'application/json',
        //         },
        //         params: {
        //             course_id: id.value,
        //         }
        //     }).then((response) => {
        //         if (response.data.success) {
        //             activityPoints.value = response.data.points;
        //             console.log(response.data.points);
        //         }
        //     }).catch((error) => {
        //         console.log(error);
        //     });
        // }
        //
        // const recordClicks = async () => {
        //     if(activityPoints.value < 3){
        //         await storeCourseActivity();
        //     }
        // }

        const storeCourseActivity = async () => {
            // Get token from local storage
            let token = localStorage.getItem('brace-learning-tk');
            axios.get('/api/learning/course/user-activity/store', {
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
                params: {
                    course_id: id.value,
                    module_id: module.value.id,
                }
            }).then((response) => {
                if (response.data.success) {
                    console.log(response.data);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        onBeforeMount(() => {
            getCourse();
            storeCourseActivity();
            // getCourseActivity();
        });

        return {
            course,
            module,
            id,
            route,
            activityPoints,

            getCourse,
            // getCourseActivity,
            storeCourseActivity,
            // recordClicks,
        }
    }
}
</script>

<style scoped>
/*
  Enter and leave animations can use different
  durations and timing functions.
*/
.slide-fade-enter-active {
    transition: all 0.4s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.2s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}
</style>

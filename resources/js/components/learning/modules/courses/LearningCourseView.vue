<template>
    <div class="container">

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
                        :to="{name: 'LearningModuleView'}">
                        <span class="text-light-grey">Modules</span>
                    </router-link>
                    /
                    <span class="text-dark">{{ module.title }}</span>
                </p>
                <h2 class="text-orange float-left text-inter">{{ module.title }}</h2>
            </div>

            <div class="col-12 bg-light-green p-4 border-radius-8">
                <p v-html="module.description"></p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">

                <!--Check if module is unlocked-->
                <div v-if="module.status === 1" class="row justify-content-center d-flex">
                    <div v-for="(course, index) in courses" :key="course.id"
                         class="col-md-5 course-card mb-4 ml-2 mr-2">
                        <div class="row">
                            <!--Display every first course-->
                            <div class="col-12" v-if="min_course_sort === course.sort">
                                <div class="row">
                                    <div class="col-md-4 p-0">
                                        <img class="course-img" :src="course.image"/>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <div class="course-header bg-very-light-orange">
                                            <span class="float-left text-orange text-inter mr-2">
                                                Course {{ index + 1 }}
                                            </span>
                                            <span class="fa fa-user mr-1 text-dark"></span>
                                            <span class="text-orange mb-1">{{ course.trainers }}</span>
                                        </div>
                                        <div class="course-body">
                                            <router-link
                                                exact
                                                :to="{name: 'LearningCourseShow', params: {id: course.id}}">
                                                <h6 class="text-medium-dark">{{ course.title }}</h6>
                                            </router-link>
                                            <p v-if="course.course_outline"
                                               class="text-grey" v-html="course.course_outline.substring(0,80)"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" v-else-if="min_course_sort !== course.sort && course.previous_course_completed">
                                <div class="row">
                                    <div class="col-md-4 p-0">
                                        <img class="course-img" :src="course.image"/>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <div class="course-header bg-very-light-orange">
                                            <span class="float-left text-orange text-inter mr-2">
                                                Course {{ index + 1 }}</span>
                                            <span class="fa fa-user mr-1 text-dark"></span>
                                            <span class="text-orange mb-1">{{ course.trainers }}</span>
                                        </div>
                                        <div class="course-body">
                                            <router-link
                                                exact
                                                :to="{name: 'LearningCourseShow', params: {id: course.id}}">
                                                <h6 class="text-medium-dark">{{ course.title }}</h6>
                                            </router-link>
                                            <p v-if="course.course_outline"
                                               class="text-grey" v-html="course.course_outline.substring(0,80)"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Fade unlocked course-->
                            <div class="col-12" v-else-if="min_course_sort !== course.sort && !course.previous_course_completed">
                                <div class="row opacity50">
                                    <div class="col-md-4 p-0">
                                        <img class="course-img" :src="course.image"/>
                                    </div>
                                    <div class="col-md-8 p-0">
                                        <div class="course-header bg-very-light-orange">
                                    <span class="float-right text-orange">
                                        <span class="material-symbols-outlined float-right">lock</span>
                                    </span>
                                        </div>
                                        <div class="course-body">
                                            <h6 class="text-medium-dark">{{ course.title }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-5 course-card mb-4 mr-2 ml-2" :class="{'opacity50': !all_courses_completed}"
                         v-for="assignment in module.assignments" :key="assignment.id">
                        <div class="row">
                            <div class="col-md-4 p-0">
                                <img :src="'/images/icons/module-assignment.jpg'"/>
                            </div>
                            <div class="col-md-8 p-0">
                                <div class="course-header bg-light-green">
                            <span v-if="all_courses_completed"
                                  class="float-left na-text-dark-green text-inter">Assignment</span>
                                    <span v-else class="material-symbols-outlined float-right">lock</span>

                                </div>
                                <div v-if="all_courses_completed" class="course-body">
                                    <router-link
                                        exact
                                        :to="{name: 'LearningModuleAssignmentView', params: {id: assignment.id}}">
                                        <h5 class="text-medium-dark text-inter">{{ assignment.title }}</h5>
                                    </router-link>
                                </div>
                                <div v-else class="course-body">
                                    <h5 class="text-medium-dark text-inter">{{ assignment.title }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 mb-4 mr-2 ml-2" :class="{'opacity50': !all_courses_completed}">
                        <div class="row course-card mb-4">
                            <div class="col-md-4 p-0">
                                <img width="200" :src="'/images/icons/module-assessment.jpg'"/>
                            </div>
                            <div class="col-md-8 p-0">
                                <div class="course-header bg-light-green">
                            <span v-if="all_courses_completed"
                                  class="float-left na-text-dark-green">Assessment</span>
                                    <span v-else class="material-symbols-outlined float-right">lock</span>
                                </div>
                                <div v-if="all_courses_completed" class="course-body">
                                    <router-link
                                        exact
                                        :to="{name: 'LearningModuleAssessmentView', params: {id: module.id}}">
                                        <h5 class="text-medium-dark text-inter">Assessment</h5>
                                    </router-link>
                                </div>
                                <div v-else class="course-body">
                                    <h5 class="text-medium-dark text-inter">Assessment</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 v-else class="na-text-dark-green text-center">
                    This module has been locked
                </h4>
            </div>

        </div>
    </div>

</template>

<script>
import {ref, watch, onBeforeMount} from 'vue';
import {useRoute} from "vue-router";
import LearningCourseItem from "./LearningCourseItem.vue";
import RouteService from "../../../../services/route-service";

export default {
    components: {
        LearningCourseItem
    },

    setup(){
        // For routing with params
        const id = ref('');
        const route = useRoute();
        id.value = route.params.id;
        watch(
            () => route.params.id,
            () => {
                id.value = route.params.id;
            },
        );

        const courses = ref([]);
        const module = ref({});
        const nextModule = ref({});
        const min_course_sort = ref(0);
        const all_courses_completed = ref(false);

        const getCourses = async () => {
            // Get token from local storage
            let token = localStorage.getItem('brace-learning-tk');
            axios.get('/api/learning/courses', {
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
                params: {
                    module_id: id.value,
                }
            }).then((response) => {
                if (response.data.success) {
                    courses.value = response.data.courses;
                    min_course_sort.value = response.data.min_course_sort;
                    module.value = response.data.module;
                    nextModule.value = response.data.module.next_module;
                    all_courses_completed.value = response.data.all_courses_completed;
                    // console.log(response.data.all_courses_completed);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        onBeforeMount(() => {
            RouteService.completedDiagnosticTool(localStorage.getItem('brace-learning-tk'));
            getCourses();
        });

        return {
            courses,
            module,
            nextModule,
            min_course_sort,
            id,
            route,
            all_courses_completed,

            getCourses,
        }
    }
}
</script>

<style scoped>

</style>

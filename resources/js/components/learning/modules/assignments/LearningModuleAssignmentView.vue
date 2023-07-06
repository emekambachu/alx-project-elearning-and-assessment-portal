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
                        :to="{name: 'LearningCourseView', params: {id: module.id}}">
                        <span class="text-light-grey">Courses</span>
                    </router-link>
                    /
                    <span class="text-dark">{{ assignment.title }}</span>
                </p>
                <h4 class="text-orange float-left">Assignment | {{ assignment.title }}</h4>
            </div>

        </div>

        <div class="row mt-5">
            <div v-if="assignment.description" class="col-12">
                <div class="row bg-medium-grey p-3">
                    <div class="col-12 mt-4">
                        <p v-html="assignment.description"></p>
                    </div>
                </div>

                <!--if user have submitted assignment, don't show form-->
                <learning-module-assignment-submission-form v-if="!submitted_assignment"
                    :module_id="module.id"
                    :assignment_id="assignment.id"
                    @emitting-submitted-assignment="submittedAssignment"
                ></learning-module-assignment-submission-form>

                <div v-if="submitted_assignment" class="row bg-medium-grey p-3 justify-content-center">

                    <div class="col-8">
                        <p class="text-center m-0 tx-16 text-dark-green">Assignment submitted</p>
                    </div>

                    <div v-if="submitted_assignment.document_one"
                         class="col-8 bg-white p-2 text-dark-green text-center">
                        <a :href="submitted_assignment.document_one"
                           :download="submitted_assignment.document_one">
                            {{ submitted_assignment.document_one_name }}</a>
                    </div>

                    <div v-if="submitted_assignment.document_two"
                         class="col-8 mt-2 bg-white p-2 text-dark-green text-center">
                        <a :href="submitted_assignment.document_two"
                           :download="submitted_assignment.document_two">
                            {{ submitted_assignment.document_two_name }}</a>
                    </div>

                    <div v-if="submitted_assignment.document_three"
                         class="col-8 mt-2 bg-white p-2 text-dark-green text-center">
                        <a :href="submitted_assignment.document_three"
                           :download="submitted_assignment.document_three">
                            {{ submitted_assignment.document_three_name }}</a>
                    </div>
                </div>

            </div>
        </div>

    </div>

</template>

<script>
import {ref, onMounted, onBeforeMount, watch} from 'vue';
import {useRoute} from "vue-router";
import LearningModuleAssignmentSubmissionForm from "./LearningModuleAssignmentSubmissionForm.vue";

export default {
    components: {
        LearningModuleAssignmentSubmissionForm
    },

    setup(){
        // For routing with params, especially when changing
        const assignment_id = ref('');
        const route = useRoute();
        assignment_id.value = route.params.id;
        watch(
            () => route.params.id,
            () => {
                assignment_id.value = route.params.id;
            },
        );

        const module = ref({});
        const assignment = ref({});
        const submitted_assignment = ref({});

        const getAssignment = async () => {
            // Get token from local storage
            let token = localStorage.getItem('brace-learning-tk');
            axios.get('/api/learning/module/assignment', {
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
                params: {
                    token: token,
                    assignment_id: assignment_id.value,
                }
            }).then((response) => {
                if (response.data.success) {
                    assignment.value = response.data.assignment;
                    module.value = response.data.module;
                    submitted_assignment.value = response.data.submitted_assignment;
                    console.log(response.data.module);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        const submittedAssignment = (event) => {
            console.log(event);
            submitted_assignment.value = event;
        }

        onBeforeMount(() => {
            getAssignment();
        });

        return {
            assignment,
            submitted_assignment,
            module,
            assignment_id,
            route,

            getAssignment,
            submittedAssignment
        }
    }
}
</script>

<style scoped>

</style>

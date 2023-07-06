<script setup>
    import {ref, onBeforeMount} from 'vue';
    import BaseService from "../../../../services/base-service";
    import RouteService from "../../../../services/route-service";

    const completedModuleAssessments = ref([]);
    const countModules = ref(0);
    const countCompletedAssessments = ref(0);
    const accumulatedAssessmentScore = ref(0);
    const overallScore = ref(false);

    const getModules = async () => {
        // Get token from local storage
        let token = localStorage.getItem('learning-user-tk');
        axios.get('/api/learning/module/assessment/history', {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
        }).then((response) => {
            if (response.data.success) {
                completedModuleAssessments.value = response.data.completed_module_assessments;
                countModules.value = response.data.count_modules;
                accumulatedAssessmentScore.value = response.data.accumulated_assessment_score;
                console.log(response.data.modules);
            }
        }).catch((error) => {
            console.log(error);
        });
    }

    const roundDecimal = (num) => {
       return BaseService.roundDecimal(num);
    }

    onBeforeMount(() => {
        getModules();
        // Show overall score/percent
        completedModuleAssessments.value.length === countModules ? overallScore.value = true : overallScore.value = false;
    });
</script>

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
                    :to="{name: 'LearningModuleView'}">
                    <span class="text-light-grey">Modules</span>
                </router-link>
                /
                <span class="text-dark">Assessment History</span>
            </p>
            <h4 class="text-orange float-left text-inter">Assessment History</h4>
        </div>
    </div>

    <div class="row justify-content-center d-flex">

        <div v-if="overallScore" class="col-md-10">
            <div class="row">
                <div class="col-12 text-center ">
                    <p class="text-navy-blue text-manrope tx-30 mb-0">Overall Score</p>
                    <h6 class="text-navy-blue text-manrope">
                        Overall Percent %</h6>
                </div>

                <div class="col-12 text-center">
                    <img :src="'/images/icons/medal2.png'" width="100"/>
                </div>

                <div class="col-12 text-center">
                    <a href="">
                        <button style="width:150px;" class="module-btn bg-light-brown">
                            Get Certificate</button>
                    </a>
                    <p class="tx-17">
                        <strong>Date Completed:</strong>

                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="text-navy-blue text-inter mb-1 tx-20">Score Breakdown</p>

                    <div v-if="completedModuleAssessments.length">
                        <div v-for="(assessment, index) in completedModuleAssessments" :key="assessment.id"
                             class="row bg-white-radius-shadow border-light-green mb-2">
                            <div class="col-md-10 col-sm-10">
                                <p class="tx-14 text-dark-green mb-1">Module {{ index + 1 }}</p>
                                <h5 class="text-inter text-dark">
                                    {{ assessment.module.title }} <span class="text-orange">
                                    ({{ roundDecimal(assessment.percent) }}%)
                                </span>
                                </h5>
                            </div>
                            <div v-if="assessment.retake < 3" class="col-md-2 col-sm-2">
                                <router-link
                                    exact :to="{name: 'LearningModuleAssessmentView', params: {id: assessment.module.id}}">
                                    <button class="module-btn bg-danger text-white d-flex justify-content-center">
                                        Retake ({{ 3 - assessment.retake }})</button>
                                </router-link>
                            </div>
                        </div>
                    </div>

                    <div v-else class="text-center bg-white-radius-shadow border-light-green">
                        <h6 class="text-inter text-gray">No assessment taken</h6>
                    </div>

                </div>
            </div>
        </div>

    </div>



</template>

<style scoped>

</style>

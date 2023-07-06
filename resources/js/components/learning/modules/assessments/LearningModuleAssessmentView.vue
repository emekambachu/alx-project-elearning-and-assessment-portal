<template>
    <div class="container">
        <div class="row">

            <!--Breadcrumbs-->
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
                    <span class="text-dark">{{ module.title }}</span>
                </p>
                <h4 class="text-orange float-left">Assessment | {{ module.title }}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row p-3 justify-content-center d-flex">

                    <TransitionGroup name="slide-fade">
                        <!--If user has passed module and on introView Component, show proceed to next module-->
                        <div v-if="introView && passed" class="col-8 text-center">
                            <img :src="'/images/icons/no-certificates.png'" width="150" class="mb-4"/>

                            <!--If next module exists-->
                            <div v-if="module.next_module">
                                <p class="text-center tx-16">
                                    <strong class="text-navy-blue">Well-done</strong> on passing this module assessment<br>
                                    <strong>Please proceed to the next module</strong><br>
                                </p>

                                <router-link
                                    exact :to="{name: 'LearningCourseView', params: {id: module.next_module.id}}">
                                    <button class="start-assessment-btn bg-light-brown mt-2">
                                        Next Module</button>
                                </router-link>
                            </div>

                            <!--If next module does not exist-->
                            <div v-else>
                                <p class="text-center tx-16">
                                    <strong class="text-navy-blue">Well-done</strong> on passing this module assessment<br>
                                    <strong>You are currently on the last module, feel free to review other modules</strong><br>
                                </p>

                                <router-link
                                    exact :to="{name: 'LearningModuleView'}">
                                    <button class="start-assessment-btn bg-light-brown d-flex justify-content-center mt-2">
                                        Modules</button>
                                </router-link>
                            </div>
                        </div>

                        <!--If user has not passed component on the introView component, commence with assessment-->
                        <div v-if="introView && !passed" class="col-8 text-center">
                            <img :src="'/images/icons/no-certificates.png'" width="150" class="mb-4"/>

                            <!--If user has not passed the assessment but still has retakes-->
                            <div v-if="retake < 3">
                                <p class="text-center tx-16">
                                    <strong class="text-navy-blue">Well-done</strong> on completing all courses for this module<br>
                                    You are required to complete this assessment before proceeding to the next module.<br>

                                    Note that your performance in each assessment counts towards your overall performance; you need an overall grade of 65% or higher to successfully complete this module.<br><br>

                                    <strong>You have only 3 attempts for this assessment.</strong><br>
                                    We recommend that you take this assessment if you are confident in your ability to score a high mark. All scores for each module will be accumulated and determine your final score for the program.<br><br>

                                    Click on ‘Begin’ to proceed.
                                </p>
                                <!--If none of the 2 conditions are true, show disabled button-->
                                <button @click.prevent="nextSection('questions')"
                                        class="start-assessment-btn bg-light-brown mt-2">
                                    Begin (Retakes: {{ 3 - retake }})
                                </button>
                            </div>

                            <div v-else>
                                <!--If next module exists-->
                                <div v-if="module.next_module">
                                    <p class="text-center tx-16">
                                        <strong class="text-navy-blue">Unfortunately,</strong> you are out of retakes<br>
                                        Please proceed to the next module and try to do better on your next assessment.
                                    </p>
                                    <!--If none of the 2 conditions are true, show disabled button-->
                                    <router-link
                                        exact
                                        :to="{name: 'LearningCourseView', params: {id: module.next_module.id}}">
                                        <button class="start-assessment-btn bg-light-brown mt-2">
                                            Next Module</button>
                                    </router-link>
                                </div>

                                <!--If next module does not exists-->
                                <div v-else>
                                    <p class="text-center tx-16">
                                        <strong class="text-navy-blue">Unfortunately,</strong> you are out of retakes<br>
                                        Retake other modules to improve your scores.
                                    </p>

                                    <div class="justify-content-center d-flex">
                                        <router-link
                                            exact
                                            :to="{name: 'LearningModuleView'}">
                                            <button class="start-assessment-btn bg-light-brown mt-2">
                                                Modules</button>
                                        </router-link>

                                        <router-link class="justify-content-center d-flex"
                                                     exact :to="{name: 'LearningModuleAssessmentHistoryView'}">
                                            <button class="start-assessment-btn bg-light-brown mt-2 ml-1">
                                                Assessment History</button>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Loading-->
<!--                        <div v-if="loading" class="col-8">-->
<!--                            <img class="assessment-loader d-none display-block"-->
<!--                                 :src="'images/icons/assessment-loader.png'"-->
<!--                                 width="200"/>-->
<!--                        </div>-->

                        <!--Questions-->
                        <div v-if="questionsView" class="col-8">
                            <div class="bg-white-radius-shadow border-light-green">
                                <form>
                                    <!--loop form.answers array-->
                                    <div v-for="(question, index) in form.answers" :key="index"
                                         class="col-md-12 text-left ml-3 mb-4 mt-4">

                                        <p class="text-inter text-dark">
                                        <span class="text-navy-blue font-weight-bolder">
                                            {{ index + 1 }}. </span>{{ question.question }}</p>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                   v-model="question.answer"
                                                   :value="question.option_one"
                                                   :id="'flexRadioDefault'+index" required>
                                            <label class="form-check-label text-dark" for="flexRadioDefault1">
                                                {{ question.option_one }}</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                   v-model="question.answer"
                                                   :value="question.option_two"
                                                   :id="'flexRadioDefault'+index" required>
                                            <label class="form-check-label text-dark" :for="'flexRadioDefault'+index">
                                                {{ question.option_two }}</label>
                                        </div>

                                        <div v-if="question.option_three" class="form-check">
                                            <input class="form-check-input" type="radio"
                                                   v-model="question.answer"
                                                   :value="question.option_three"
                                                   :id="'flexRadioDefault'+index">
                                            <label class="form-check-label text-dark" :for="'flexRadioDefault'+index">
                                                {{ question.option_three }}</label>
                                        </div>

                                        <div v-if="question.option_four" class="form-check">
                                            <input class="form-check-input" type="radio"
                                                   v-model="question.answer"
                                                   :value="question.option_four"
                                                   :id="'flexRadioDefault'+index">
                                            <label class="form-check-label text-dark" :for="'flexRadioDefault'+index">
                                                {{ question.option_four }}</label>
                                        </div>

                                        <div v-if="question.option_five" class="form-check">
                                            <input class="form-check-input" type="radio"
                                                   v-model="question.answer"
                                                   :value="question.option_five"
                                                   :id="'flexRadioDefault'+index">
                                            <label class="form-check-label text-dark" :for="'flexRadioDefault'+index">
                                                {{ question.option_five }}</label>
                                        </div>
                                    </div>

                                    <div v-if="errors.length" class="col-12 text-center text-danger">
                                        <p v-for="(error, index) in errors">
                                            {{ error}}
                                        </p>
                                    </div>

                                    <button @click.prevent="nextSection('completed')"
                                            class="start-assessment-btn bg-light-brown mt-2 justify-content-center d-flex">Submit</button>
                                </form>
                            </div>
                        </div>

                        <!--Completed-->
                        <div v-if="completionView" class="col-12 text-center">
                            <img :src="'/images/icons/checklist.png'" width="150" class="mb-4"/>
                            <h4 class="text-center">Submitted</h4>

                            <div v-if="passed === true">
                                <p class="text-center tx-16">
                                    Congratulations on passing the
                                    <strong class="text-orange">{{ module.title }}</strong> assessment.<br>
                                    <strong>
                                        Your Score: <span class="text-navy-blue">{{ percent }}%</span>
                                    </strong>
                                </p>

                                <!--If next module exists-->
                                <div v-if="module.next_module">
                                    Click on ‘Next Module’ to proceed to the next module.
                                    <router-link
                                        exact
                                        :to="{name: 'LearningCourseView', params: {id: module.next_module.id}}">
                                        <button class="start-assessment-btn na-bg-dark-green mt-2">
                                            Next Module</button>
                                    </router-link>
                                </div>

                                <!--If next module does not exists-->
                                <div v-else class="justify-content-center d-flex">
                                    <p>You have successfully completed all modules, feel free to retake some assessments to get a higher score or look at your assessment history</p>
                                    <router-link
                                        exact
                                        :to="{name: 'LearningModuleView'}">
                                        <button class="start-assessment-btn bg-light-brown mt-2">
                                            Modules</button>
                                    </router-link>
                                </div>
                            </div>

                            <div v-else>
                                <p class="text-center tx-16">
                                    Unfortunately you didn't pass the
                                    <strong class="text-orange">{{ module.title }}</strong> assessment.<br>
                                    <strong>
                                        Your Score: <span class="text-navy-blue">{{ percent }}%</span>
                                    </strong><br>
                                    Click on ‘Retake’ to try again or 'Next Module' to continue next module.
                                </p>

                                <div class="justify-content-center d-flex">
                                    <button v-if="retake < 3" @click.prevent="nextSection('questions')"
                                            class="start-assessment-btn bg-danger text-white mt-2 mr-1">
                                        Retake</button>
                                    <button v-else disabled
                                            class="start-assessment-btn bg-gray text-white mt-2 mr-1">
                                        No retakes</button>

                                    <!--If next module-->
                                    <div v-if="module.next_module">
                                        <router-link
                                            exact :to="{name: 'LearningCourseView', params: {id: module.next_module.id}}">
                                            <button class="start-assessment-btn na-bg-dark-green mt-2">
                                                Next Module</button>
                                        </router-link>
                                    </div>

                                    <div v-else class="justify-content-center d-flex">
                                        <router-link
                                            exact
                                            :to="{name: 'LearningModuleView'}">
                                            <button class="start-assessment-btn bg-light-brown mt-2 mr-1">
                                                Modules</button>
                                        </router-link>
                                    </div>
                                </div>

                            </div>

                            <!--Assessment history-->
                            <router-link class="justify-content-center d-flex"
                                exact :to="{name: 'LearningModuleAssessmentHistoryView'}">
                                <button class="start-assessment-btn bg-light-brown mt-2 ml-1">
                                    Assessment History</button>
                            </router-link>
                        </div>
                    </TransitionGroup>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
import {ref, onBeforeMount, watch, reactive} from 'vue';
import {useRoute} from "vue-router";
import BaseService from "../../../../services/base-service";
import RouteService from "../../../../services/route-service";

export default {
    setup(){
        // For routing with params, especially when changing
        const module_id = ref('');
        const route = useRoute();
        module_id.value = route.params.id;
        watch(
            () => route.params.id,
            () => {
                module_id.value = route.params.id;
            },
        );

        const form = reactive({
            answers: []
        });

        const module = ref({});
        const questions = ref([]);
        const errors = ref([]);
        const introView = ref(true);
        const questionsView = ref(false);
        const completionView = ref(false);
        const loading = ref(false);
        const percent = ref('');
        const passed = ref(null);
        const assessment_status = ref(null);
        const retake = ref(0);
        const completion_message = ref('');

        const assessmentStatus = async () => {
            // Get token from local storage
            let token = localStorage.getItem('learning-user-tk');
            await axios.get('/api/learning/module/assessment/status', {
                headers: {
                    "Authorization": "Bearer " + token,
                    'Accept': 'application/json',
                },
                params: {
                    module_id: module_id.value,
                }
            }).then((response) => {
                if (response.data.success) {
                    passed.value = response.data.passed;
                    retake.value = response.data.retake;
                    assessment_status.value = response.data.status;
                    console.log(assessment_status.value);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        const nextSection = async (next) => {
            loading.value = true;

            if(next === 'questions'){
                // Get questions from db and push to form.answers array
                form.answers = []; // Empty current questions array
                await getQuestions();
                for (let [key, value] of Object.entries(questions.value)) {
                    form.answers.push({
                        question_id: value.id,
                        answer: '',

                        question: value.question,
                        option_one: value.option_one,
                        option_two: value.option_two,
                        option_three: value.option_three,
                        option_four: value.option_four,
                        option_five: value.option_five,
                    });
                }

                console.log(form.answers);
                questionsView.value = true;
                completionView.value = false;
                introView.value = false;
                loading.value = false;
            }

            if(next === 'completed'){
                loading.value = true;
                console.log(form.answers);
                await submitAnswers();
            }
        }

        const getModule = async () => {
            // Get token from local storage
            let token = localStorage.getItem('learning-user-tk');
            await axios.get('/api/learning/module', {
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
                params: {
                    module_id: module_id.value,
                }
            }).then((response) => {
                if (response.data.success) {
                    module.value = response.data.module;
                    console.log(response.data.module);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        const getQuestions = async () => {
            // Get token from local storage
            let token = localStorage.getItem('learning-user-tk');
            await axios.get('/api/learning/module/assessment/questions', {
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
                params: {
                    module_id: module_id.value,
                }
            }).then((response) => {
                if (response.data.success) {
                    questions.value = response.data.questions;
                    console.log(response.data.questions);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        const submitAnswers = async () => {
            errors.value = [];
            const formData = new FormData();
            // iterate and add form data
            Object.keys(form.answers).forEach(function(key, name) {
                console.log(key); // key
                console.log(form.answers[key]['answer']); // value
                if(form.answers[key]['answer'] !== ''){
                    formData.append('inputs['+key+'][answer]', form.answers[key]['answer']);
                    formData.append('inputs['+key+'][question_id]', form.answers[key]['question_id']);
                }else{
                    errors.value.push(form.answers[key]['question']+' is missing an answer');
                    return false;
                }
            });

            // Get token from local storage
            let token = localStorage.getItem('learning-user-tk');
            axios.post('/api/learning/module/assessment/store', formData, {
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
                params: {
                    module_id: module_id.value
                }

            }).then((response) => {
                loading.value = true;
                if(response.data.success){
                    completionView.value = true;
                    questionsView.value = false;
                    introView.value = false;
                    percent.value = response.data.percent;
                    passed.value = response.data.passed;
                    retake.value = response.data.retake;
                    completion_message.value = response.data.message;
                }

                if(response.data.errors) {
                    errors.value = response.data.errors;
                    console.log(response.data.questions);
                }

                if(response.data.error_message) {
                    console.log(response.data.error_message);
                }

                loading.value = false;

            }).catch((error) => {
                console.log(error);
            });
            BaseService.deleteCookies();
        }

        onBeforeMount(() => {
            assessmentStatus();
            getModule();
        });

        return {
            introView,
            questionsView,
            completionView,
            loading,
            percent,
            passed,
            retake,

            form,
            errors,
            questions,
            module,
            module_id,
            route,

            assessmentStatus,
            getModule,
            getQuestions,
            submitAnswers,
            nextSection
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

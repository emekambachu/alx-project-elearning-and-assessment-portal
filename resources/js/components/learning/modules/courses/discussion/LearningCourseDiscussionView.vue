<script setup>
    import {onBeforeMount, reactive, ref} from "vue";
    import axios from "axios";
    import LearningCourseDiscussionItem from "./LearningCourseDiscussionItem.vue";

    const props = defineProps([
        'module',
        'course'
    ]);

    const form = reactive({
       comment: ''
    });
    const module = ref(props.module);
    const course = ref(props.course);
    const comments = ref([]);
    const errors = ref([]);
    const loading = ref(false);
    const submitted = ref(false);
    const activityPoints = ref(0);

    // Upload files
    const submitComment = async () => {
        loading.value = true;
        errors.value = [];
        await storeCourseActivity();

        // iterate and add form data
        const formData = new FormData();
        Object.keys(form).forEach(function(key) {
            console.log(key); // key
            console.log(form[key]); // value
            if(form[key]){
                formData.append(key, form[key]);
            }else{
                errors.value.push('comment field cannot be empty');
                loading.value = false;
                return false;
            }
        });
        formData.append('brace_module_id', module.value.id);
        formData.append('brace_course_id', course.value.id);

        // Get token from local storage
        let token = localStorage.getItem('learning-user-tk');
        axios.post('/api/learning/course/discussion/comment', formData, {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },

        }).then((response) => {
            if (response.data.success) {
                loading.value = false;
                submitted.value = true;
                errors.value = [];

                // Add to comments array
                comments.value.unshift(response.data.comment);
                console.log(response.data.comment);

                // Clear fields
                Object.keys(form).forEach(function(key) {
                    form[key] = '';
                });
            }

            if (response.data.errors) {
                loading.value = false;
                errors.value = response.data.errors;
                console.log(response.data.errors);
            }

            // Custom validation from backend
            if (response.data.submission_error) {
                loading.value = false;
                errors.value.push(response.data.submission_error);
                console.log(response.data.errors);
            }

            // Errors from backend/server should be shown in console.log
            if (response.data.error_message) {
                console.log(response.data.error_message);
            }

        }).catch((error) => {
            console.log(error);
        });
    }

    const getComments = async () => {
        // Get token from local storage
        let token = localStorage.getItem('learning-user-tk');
        axios.get('/api/learning/course/discussion', {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
            params: {
                token: token,
                course_id: course.value.id,
            }

        }).then((response) => {
            if (response.data.success) {
                comments.value = response.data.comments.data;
                console.log(response.data.comments);
            }

            // Errors from backend should be shown in console.log
            if (response.data.error_message) {
                console.log(response.data.error_message);
            }

        }).catch((error) => {
            console.log(error);
        });
    }

    const getMoreComments = async () => {
        // Get token from local storage
        let token = localStorage.getItem('learning-user-tk');
        axios.get('/api/learning/course/discussion', {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
            params: {
                token: token,
                course_id: course.value.id,
            }

        }).then((response) => {
            if (response.data.success) {
                comments.value = response.data.comments.data;
                console.log(response.data.comments);
            }

            // Errors from backend should be shown in console.log
            if (response.data.error_message) {
                console.log(response.data.error_message);
            }

        }).catch((error) => {
            console.log(error);
        });
    }

    const getCourseActivity = async () => {
        // Get token from local storage
        let token = localStorage.getItem('learning-user-tk');
        axios.get('/api/learning/course/user-activity', {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
            params: {
                course_id: course.value.id,
            }
        }).then((response) => {
            if (response.data.success) {
                activityPoints.value = response.data.points;
                console.log(response.data.points);
            }
        }).catch((error) => {
            console.log(error);
        });
    }

    const recordClicks = async () => {
        if(activityPoints.value < 3){
            await storeCourseActivity();
        }
    }

    const storeCourseActivity = async () => {
        // Get token from local storage
        let token = localStorage.getItem('learning-user-tk');
        axios.get('/api/learning/course/user-activity/store', {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
            params: {
                course_id: course.value.id,
            }
        }).then((response) => {
            if (response.data.success) {
                activityPoints.value = response.data.points;
                console.log(response.data.points);
            }
        }).catch((error) => {
            console.log(error);
        });
    }

    onBeforeMount(() => {
        getComments();
        getCourseActivity();
    });

</script>

<template>
    <div class="row justify-content-end">
        <div class="col-md-11 bg-medium-grey">

            <!--submit comment-->
            <div class="row p-2">
                <div class="col-12">

                    <h5 class="text-orange text-inter border-bottom-grey pb-3 tx-16">
                        Course Discussion
                    </h5>

                    <div class="mt-3 pb-3">
                        <form>
                            <textarea class="course-discussion-textarea"
                                      v-model="form.comment"
                                      maxlength="700"
                                      placeholder="100 words max"
                                      rows="4"
                                      required
                            ></textarea>
                            <p class="text-danger tx-12 text-center" v-for="(error, index) in errors" :key="index">
                                {{ error }}
                            </p>
                            <button v-if="!loading" class="submit-btn-full na-bg-dark-green text-white"
                                    @click.prevent="submitComment">Comment</button>
                            <button v-else disabled class="submit-btn-full na-bg-dark-green text-white">
                                <i class="fa fa-circle-notch fa-spin"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>

            <!--Get comments-->
            <div v-if="comments.length" class="row p-3 scroll-vertical">
                <div class="col-12">
                    <h5 class="text-orange text-inter pb-2 tx-16 text-inter border-top-grey">
                        Comments for this course
                    </h5>
                </div>
                <TransitionGroup name="slide-fade">
                    <learning-course-discussion-item
                        v-for="comment in comments"
                        :key="comment.id"
                        :comment="comment"
                        :course_id="course.id"
                    ></learning-course-discussion-item>
                </TransitionGroup>
            </div>
        </div>



    </div>
</template>

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

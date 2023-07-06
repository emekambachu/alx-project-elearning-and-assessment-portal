<template>
    <tr v-if="!deleted">
        <td width="50%">
            <strong>Title:</strong> {{ course.title }}<br>
            <strong>Module:</strong> {{ course.module.title }}<br>
            <strong>Order:</strong> {{ course.sort }}<br>
            <img :src="course.image" width="100"/>
        </td>

        <td width="50%">
            <strong>Trainers:</strong> <span v-html="course.trainers"></span><br>
            <strong>Study Timer:</strong> <span v-html="course.study_timer"></span><br>
        </td>

        <td width="20%">
            <strong>Date:</strong> {{ course.created_at }}<br>

            <button @click.prevent="toggleMore" class="btn btn-sm btn-info mr-1">
                <span v-if="showMore">Show less</span>
                <span v-else>Show more</span>
            </button>

            <router-link
                exact
                class="btn btn-info btn-sm mr-1"
                :to="{name: 'AdminCourseResourceView', params: {id: course.id}}">
                <i class="fa fa-book-open"></i>Resources
            </router-link>

            <button @click.prevent="deleteCourse(course.id)"
                    class="btn btn-danger btn-sm mr-1">
                <i class="fa fa-trash"></i> Delete</button>

            <button class="btn btn-warning btn-sm mr-1"
                    @click.prevent="isOpen = true">
                <i class="fa fa-trash"></i> Edit</button>

            <Teleport to="section">
                <admin-course-form
                    :open="isOpen"
                    :course="course"
                    @emitting-close-modal="closeModal"
                    @emitting-updated-course="updatedCourse"
                ></admin-course-form>
            </Teleport>

        </td>
    </tr>

    <Transition name="fade">
        <tr v-if="showMore">
            <th colSpan="4">

                <div className="row">
                    <div className="col-md-12 mt-2">
                        <div className="card">
                            <div className="bg-white">
                                <div className="mb-1 text-center">
                                    <h6 className="card-title text-primary">
                                        More info for {{ course.title }}</h6>
                                    <span className="card-text">
                                        <strong>Course Contents</strong><br>
                                        <span v-html="course.course_contents"></span><br>
                                    </span><br>
                                    <span className="card-text">
                                        <strong>Course Outline</strong><br>
                                        <span v-html="course.course_outline"></span><br>
                                    </span><br>
                                    <span className="card-text">
                                        <strong>Objectives</strong><br>
                                        <span v-html="course.objectives"></span><br>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </th>
        </tr>
    </Transition>

</template>

<script>
import moment from 'moment';
import { ref, onMounted } from 'vue';
import SweetAlertService from "../../../services/sweet-alert-service";
import AdminCourseForm from "./AdminCourseForm";

export default {
    components: {
        AdminCourseForm
    },
    props: {
        course: Object,
        module: Object,
    },

    setup(props) {
        const course = ref(props.course);
        const isOpen = ref(false);
        const showMore = ref(false);
        const deleted = ref(false);

        const toggleMore = () => {
            showMore.value === true ? showMore.value = false : showMore.value = true;
        }

        const fullDate = (value) => {
            return moment(value).format('MMMM Do YYYY, h:mm:ss a');
        }

        const closeModal = () => {
            isOpen.value = false;
        }

        const updatedCourse = (event) => {
            console.log(event);
            course.value = event;
        }

        const deleteCourse = (id) => {
            // Install sweetalert2 to use
            Swal.fire({
                html: "<h3>Delete <span class='text-success'>"+course.value.title+"</h3>",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // Loading
                    SweetAlertService.formLoading(Swal, 'Loading....', 'Please wait');
                    axios.delete('/api/admin/courses/delete', {
                        headers: {
                            "Authorization" : "Bearer " + localStorage.getItem('afc-admin-tk'),
                            'Accept' : 'application/json',
                        },
                        params: {
                            id: id
                        }
                    }).then((response) => {
                        if(response.data.success === true){
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 8000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            });
                            Toast.fire({
                                icon: 'success',
                                title: 'Deleted'
                            });
                            deleted.value = true;
                        }
                    }).catch((error) => {
                        console.log(error);
                    });
                } else if (result.isDenied) {
                    return false;
                }
            });
        }

        onMounted(() => {

        });

        return {
            course,
            showMore,
            isOpen,
            deleted,

            fullDate,
            toggleMore,
            deleteCourse,
            closeModal,
            updatedCourse
        }
    },

}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.drop-in-enter-active,
.drop-in-leave-active {
    transition: all 0.3s ease-out;
}

.drop-in-enter-from,
.drop-in-leave-to {
    opacity: 0;
    transform: translateY(-50px);
}
</style>

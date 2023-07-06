<template>
    <tr v-if="!deleted">
        <td width="40%">
            <strong>Title:</strong> {{ module.title }}<br>
            <strong>Order:</strong> {{ module.sort }}<br>
            <img :src="module.image" width="100"/>
        </td>

        <td width="30%">
            <strong>Trainers:</strong> <span v-html="module.trainers"></span><br>
            <strong>Training Methods:</strong> <span v-html="module.training_methods"></span><br>
        </td>

        <td width="10%">
            {{ module.total_courses }}
        </td>

        <td width="20%">
            <strong>Date:</strong> {{ module.created_at }}<br>

            <button class="btn btn-warning btn-sm mr-1" @click.prevent="isOpen = true">
                <i class="fa fa-trash"></i> Edit</button><br>

            <Teleport to="section">
                <admin-module-form
                    :open="isOpen"
                    :module="module"
                    @emitting-close-modal="closeModal"
                    @emitting-updated-module="updatedModule"
                ></admin-module-form>
            </Teleport>

            <router-link
                exact
                class="btn btn-info btn-sm mr-1"
                :to="{name: 'AdminModuleCourseView', params: {id: module.id}}">
                <i class="fa fa-book-open"></i>Courses
            </router-link>

            <router-link
                exact
                class="btn btn-info btn-sm mr-1"
                :to="{name: 'AdminModuleAssignmentView', params: {id: module.id}}">
                <i class="fa fa-book-open"></i>Assignments
            </router-link>

            <router-link
                exact
                class="btn btn-info btn-sm mr-1"
                :to="{name: 'AdminAssessmentQuestionView', params: {id: module.id}}">
                <i class="fa fa-book-open"></i>Assessment Questions
            </router-link>

<!--            <button class="btn btn-warning btn-sm mr-1" @click.prevent="openCourseModal = true">-->
<!--                <i class="fa fa-book-open"></i> Add Course</button>-->

            <button @click.prevent="toggleMore" class="btn btn-sm btn-info mr-1">
                <span v-if="showMore">Show less</span>
                <span v-else>Show more</span>
            </button>

            <button @click.prevent="deleteModule(module.id)"
                    class="btn btn-danger btn-sm mr-1">
                <i class="fa fa-trash"></i> Delete</button>

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
                                        More info for {{ module.title }}</h6>
                                    <span className="card-text">
                                        <strong>Description.</strong><br>
                                        <span v-html="module.description"></span><br>
                                    </span>
                                    <h6 className="card-title text-primary">
                                        Courses</h6>
                                    <span v-for="(course, index) in module.courses" :key="course.id">
                                       {{ index + 1 }} - {{ course.title }}
                                    </span><br>
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
import AdminModuleForm from "./AdminModuleForm";
import AdminCourseForm from "../courses/AdminCourseForm";

export default {
    components: {
        AdminModuleForm,
        AdminCourseForm,
    },

    props: {
        module: Object,
    },

    setup(props) {
        const module = ref(props.module);
        const isOpen = ref(false);
        const openCourseModal = ref(false);
        const showMore = ref(false);
        const showCourses = ref(false);
        const deleted = ref(false);

        const toggleMore = () => {
            showMore.value === true ? showMore.value = false : showMore.value = true;
        }

        const toggleCourses = () => {
            showMore.value === true ? showMore.value = false : showMore.value = true;
        }

        const fullDate = (value) => {
            return moment(value).format('MMMM Do YYYY, h:mm:ss a');
        }

        const closeModal = () => {
            isOpen.value = false;
        }

        const closeCourseModal = () => {
            openCourseModal.value = false;
        }

        const updatedModule = (event) => {
            console.log(event);
            module.value = event;
        }

        const deleteModule = (id) => {
            // Install sweetalert2 to use
            Swal.fire({
                html: "<h3>Delete <span class='text-success'>"+module.value.title+"</h3>",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // Loading
                    SweetAlertService.formLoading(Swal, 'Loading....', 'Please wait');
                    axios.delete('/api/admin/modules/delete', {
                        headers: {
                            "Authorization" : "Bearer " + localStorage.getItem('learning-admin-tk'),
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
            console.log(props.module);
        })

        return {
            module,
            showMore,
            showCourses,
            isOpen,
            openCourseModal,
            deleted,

            fullDate,
            toggleMore,
            toggleCourses,
            deleteModule,
            closeModal,
            closeCourseModal,
            updatedModule
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

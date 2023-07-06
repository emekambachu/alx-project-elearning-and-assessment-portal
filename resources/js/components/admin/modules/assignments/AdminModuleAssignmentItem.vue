<template>
    <tr v-if="!deleted">
        <td width="80%">
            <strong>Title:</strong> {{ assignment.title }}
        </td>

        <td width="20%">
            <button @click.prevent="toggleMore" class="btn btn-sm btn-info mr-1">
                <span v-if="showMore">Show less</span>
                <span v-else>Show more</span>
            </button>

            <button @click.prevent="deleteAssignment(assignment.id)"
                    class="btn btn-danger btn-sm mr-1">
                <i class="fa fa-trash"></i> Delete</button>

            <button class="btn btn-warning btn-sm mr-1" @click.prevent="isOpen = true">
                <i class="fa fa-trash"></i> Edit</button>

            <Teleport to="section">
                <admin-module-assignment-form
                    :open="isOpen"
                    :assignment="assignment"
                    :module="module"
                    @emitting-close-modal="closeModal"
                    @emitting-updated-assignment="updatedAssignment"
                ></admin-module-assignment-form>
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
                                        {{ assignment.title }}</h6>
                                    <span className="card-text">
                                        <strong>Description</strong><br>
                                        <span v-html="assignment.description"></span><br>
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
import SweetAlertService from "../../../../services/sweet-alert-service";
import AdminModuleAssignmentForm from "./AdminModuleAssignmentForm.vue";

export default {
    components: {
        AdminModuleAssignmentForm,
    },
    props: {
        assignment: Object,
        module: Object,
    },

    setup(props) {
        const module = ref(props.module);
        const assignment = ref(props.assignment);
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

        const updatedAssignment = (event) => {
            console.log(event);
            assignment.value = event;
        }

        const deleteAssignment = (id) => {
            // Install sweetalert2 to use
            Swal.fire({
                html: "<h3>Delete <span class='text-success'>"+assignment.value.title+"</h3>",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Loading
                    SweetAlertService.formLoading(Swal, 'Loading....', 'Please wait');
                    axios.delete('/api/admin/module/assignments/delete', {
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

        });

        return {
            assignment,
            module,
            showMore,
            isOpen,
            deleted,

            fullDate,
            toggleMore,
            deleteAssignment,
            closeModal,
            updatedAssignment
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

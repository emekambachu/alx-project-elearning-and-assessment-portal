<template>
    <tr v-if="!deleted">

        <td width="40%">
            {{ resource.title }}
        </td>

        <td width="40%">
            <span v-if="resource.document">
                <a class="btn btn-sm btn-info" :href="resource.url" :download="resource.url">
                    <i class="fa fa-download"></i> Download Document</a>
            </span><br>
            <span v-if="resource.url">
                <a class="btn btn-sm btn-info" :href="resource.url"><i class="fa fa-globe"></i> Url</a>
            </span>
        </td>

        <td width="20%">
            <button @click.prevent="deleteResource(resource.id)"
                    class="btn btn-danger btn-sm mr-1">
                <i class="fa fa-trash"></i> Delete</button>

            <button class="btn btn-warning btn-sm mr-1" @click.prevent="isOpen = true">
                <i class="fa fa-trash"></i> Edit</button>

            <Teleport to="section">
                <admin-course-resource-form
                    :open="isOpen"
                    :resource="resource"
                    :course="course"
                    @emitting-close-modal="closeModal"
                    @emitting-updated-resource="updatedResource"
                ></admin-course-resource-form>
            </Teleport>
        </td>

    </tr>

</template>

<script>
import moment from 'moment';
import { ref, onMounted } from 'vue';
import SweetAlertService from "../../../../services/sweet-alert-service";
import AdminCourseResourceForm from "./AdminCourseResourceForm.vue";

export default {
    components: {
        AdminCourseResourceForm,
    },
    props: {
        resource: Object,
        course: Object,
    },

    setup(props) {
        const resource = ref(props.resource);
        const course = ref(props.course);
        const isOpen = ref(false);
        const deleted = ref(false);

        const fullDate = (value) => {
            return moment(value).format('MMMM Do YYYY, h:mm:ss a');
        }

        const closeModal = () => {
            isOpen.value = false;
        }

        const updatedResource = (event) => {
            console.log(event);
            resource.value = event;
        }

        const deleteResource = (id) => {
            // Install sweetalert2 to use
            Swal.fire({
                html: "<h3>Delete <span class='text-success'>"+resource.value.title+"</h3>",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Loading
                    SweetAlertService.formLoading(Swal, 'Loading....', 'Please wait');
                    axios.delete('/api/admin/course/resources/delete', {
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
            resource,
            course,
            isOpen,
            deleted,

            fullDate,
            closeModal,
            updatedResource,
            deleteResource,
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

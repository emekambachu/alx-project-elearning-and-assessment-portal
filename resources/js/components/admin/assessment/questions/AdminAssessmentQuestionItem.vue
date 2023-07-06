<template>
    <tr v-if="!deleted">
        <td width="40%">
            {{ question.question }}
        </td>

        <td width="40%">
            <strong>Option 1: </strong>{{ question.option_one }}<br>
            <strong>Option 2: </strong>{{ question.option_two }}<br>
            <strong>Option 3: </strong>{{ question.option_three }}<br>
            <strong>Option 4: </strong>{{ question.option_four }}<br>
            <strong>Option 5: </strong>{{ question.option_five }}<br>
            <strong>Answer: </strong>{{ question.correct_answer }}<br>
        </td>

        <td width="20%">
            <button @click.prevent="deleteQuestion(question.id)"
                    class="btn btn-danger btn-sm mr-1">
                <i class="fa fa-trash"></i> Delete</button>

            <button class="btn btn-warning btn-sm mr-1" @click.prevent="isOpen = true">
                <i class="fa fa-trash"></i> Edit</button>

            <Teleport to="section">
                <admin-assessment-question-form
                    :open="isOpen"
                    :question="question"
                    :module="module"
                    @emitting-close-modal="closeModal"
                    @emitting-updated-question="updatedQuestion"
                ></admin-assessment-question-form>
            </Teleport>

        </td>
    </tr>

</template>

<script>
import moment from 'moment';
import { ref, onMounted } from 'vue';
import SweetAlertService from "../../../../services/sweet-alert-service";
import AdminAssessmentQuestionForm from "./AdminAssessmentQuestionForm.vue";

export default {
    components: {
        AdminAssessmentQuestionForm
    },
    props: {
        question: Object,
        module: Object,
    },

    setup(props) {
        const module = ref(props.module);
        const question = ref(props.question);
        const isOpen = ref(false);
        const deleted = ref(false);

        const fullDate = (value) => {
            return moment(value).format('MMMM Do YYYY, h:mm:ss a');
        }

        const closeModal = () => {
            isOpen.value = false;
        }

        const updatedQuestion = (event) => {
            console.log(event);
            question.value = event;
        }

        const deleteQuestion = (id) => {
            // Install sweetalert2 to use
            Swal.fire({
                html: "<h3>Delete <span class='text-success'>"+question.value.question+"</h3>",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Loading
                    SweetAlertService.formLoading(Swal, 'Loading....', 'Please wait');
                    axios.delete('/api/admin/module/assessment/questions/delete', {
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
            question,
            module,
            isOpen,
            deleted,

            fullDate,
            deleteQuestion,
            closeModal,
            updatedQuestion
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

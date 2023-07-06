<template>
    <tr>
        <td width="80%">
            <strong>Name:</strong> {{ application.name }}<br>
            <strong>Email:</strong> {{ application.email }}<br>
            <strong>Mobile:</strong> {{ application.mobile }}<br>
<!--            <strong>Country:</strong> {{ application.country }}<br>-->
<!--            <strong>Country Residence:</strong> {{ application.country_residence }}<br>-->
<!--            <strong>Date of Birth:</strong> {{ application.date_of_birth }}<br>-->
<!--            <strong>Gender:</strong> {{ application.gender }}<br>-->
<!--            <strong>Education:</strong> {{ application.education }}<br>-->
            <div><img width="70" :src="application.image"/></div>
        </td>

        <td width="20%">
            <strong>Date:</strong> {{ application.created_at }}<br>
            <strong>Last Login:</strong> {{ application.last_login }}<br><br>
<!--            <button @click.prevent="toggleMore" class="btn btn-sm btn-info mr-1">-->
<!--                <span v-if="isOpen">Show less</span>-->
<!--                <span v-else>Show more</span>-->
<!--            </button>-->
        </td>
    </tr>

    <Transition name="fade">
        <tr v-if="isOpen">
            <th colSpan="3">

                <div className="row">
                    <div className="col-md-12 mt-2">
                        <div className="card">
                            <div className="bg-white">
                                <div className="mb-1 text-center">
                                    <h6 className="card-title text-primary">More Responses from
                                        {{ application.name }}</h6>
                                    <span className="card-text">
                                        <strong>
                                            Business Description
                                        </strong><br>{{ application.business_description }}<br>

                                        <strong>
                                            Current Number of Staffs
                                        </strong><br>{{ application.number_of_employees }}<br>

                                        <strong>
                                            Have you participated in any ALX | E-learning and Assessment Portal / Nourishing Africa / Changing Narrative programs before?
                                        </strong><br>
                                        {{ application.participated_previous_program }}<br>

                                        <strong>
                                            Have you participated in any climate-related training/programs?
                                        </strong><br>{{ application.participated_climate_program }}<br>

                                        <strong>
                                            What are your expectations from the program?
                                        </strong><br>{{ application.expectations_from_program }}<br>

                                        <strong>
                                            How would the program impact your business?
                                        </strong><br>
                                        <p v-html="application.impact_on_business"></p>

                                        <strong>
                                            How did you hear about this program
                                        </strong><br>
                                        <p v-html="application.how_did_you_hear"></p>

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
    import {ref} from 'vue';
    import SweetAlertService from "../../../services/sweet-alert-service";

    export default {
        props: {
            application: Object,
        },

        setup(props, context) {
            const application = props.application;
            const isOpen = ref(false);
            const selectedApplicant = ref(application.selected === 1 ? 1 : 0);
            const totalSelected = ref(0);

            const toggleMore = () => {
                isOpen.value === true ? isOpen.value = false : isOpen.value = true;
            }

            const fullDate = (value) => {
                return moment(value).format('MMMM Do YYYY, h:mm:ss a');
            }

            const selectApplicant = (id) => {
                // Install sweetalert2 to use
                Swal.fire({
                    html: selectedApplicant.value ? "<h3>Remove <span class='text-danger'>"+ application.name +"</span></h3>" : "<h3>Select <span class='text-success'>" +application.name+"</span></h3>",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Yes',
                    denyButtonText: `No`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        // Loading
                        SweetAlertService.formLoading(Swal, 'Loading....', 'Please wait');
                        axios.get('/api/admin/applications/select', {
                            headers: {
                                "Authorization" : "Bearer " + localStorage.getItem('learning-admin-tk'),
                                'Accept' : 'application/json',
                            },
                            params: {
                                application_id: id
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
                                    title: response.data.message
                                });
                                context.emit("emitting-total-selected", response.data.total_selected);
                                selectedApplicant.value = response.data.selected;
                            }else{
                                SweetAlertService.formError(Swal, 'Error occurred, try again', 3000);
                            }

                        }).catch((error) => {
                            console.log(error);
                        });
                    } else if (result.isDenied) {
                        return false;
                    }
                });
            }

            return {
                application,
                isOpen,
                selectedApplicant,
                totalSelected,

                fullDate,
                toggleMore,
                selectApplicant


            }
        },

    }
</script>

<style scoped>
button {
    outline: none;
    border: none;
    padding: 5px 20px;
    color: #ddd;
    background-color: #006600;
    border-radius: 4px;
}
.bg-selected{
    background-color: #BAF9E2 !important;
    color: #685858;
}

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

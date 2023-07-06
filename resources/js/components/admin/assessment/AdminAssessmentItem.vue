<script setup>
    import moment from 'moment';
    import {ref} from 'vue';
    import SweetAlertService from "../../../services/sweet-alert-service";

    const props = defineProps([
        'user',
    ]);

    const isOpen = ref(false);
    const user = ref(props.user);

    const toggleMore = () => {
        isOpen.value === true ? isOpen.value = false : isOpen.value = true;
    }

    const fullDate = (value) => {
        return moment(value).format('MMMM Do YYYY, h:mm:ss a');
    }
</script>

<template>
    <tr>
        <td width="40%">
            <strong>Name:</strong> {{ user.name }}<br>
            <strong>Email:</strong> {{ user.email }}<br>
            <strong>Mobile:</strong> {{ user.mobile }}<br>
            <strong>Business:</strong> {{ user.business_name }}<br>
            <strong>Country:</strong> {{ user.country }}<br>
            <strong>Country Residence:</strong> {{ user.country_residence }}<br>
            <strong>Date of Birth:</strong> {{ user.date_of_birth }}<br>
            <strong>Gender:</strong> {{ user.gender }}<br>
            <strong>Education:</strong> {{ user.education }}<br>
            <div><img width="70" :src="user.image"/></div>
        </td>

        <td width="40%">
            <strong>Completed:</strong> {{ user.overall_assessments }}<br><br>
            <div v-for="(assessment, index) in user.module_assessments" :key="assessment.id">
                <div class="mb-2">
                    <strong>({{ index + 1 }}) Module:</strong> {{ assessment.module_title }}<br>
                    <strong>Score:</strong> {{ assessment.score }}<br>
                    <strong>Percent:</strong> {{ assessment.percent }}<br>
                </div>
            </div>
        </td>

        <td width="20%">
            <strong>Last Active:</strong> {{ user.last_login }}<br><br>
        </td>
    </tr>

<!--    <Transition name="fade">-->
<!--        <tr v-if="isOpen">-->
<!--            <th colSpan="3">-->

<!--                <div className="row">-->
<!--                    <div className="col-md-12 mt-2">-->
<!--                        <div className="card">-->
<!--                            <div className="bg-white">-->
<!--                                <div className="mb-1 text-center">-->
<!--                                    <h6 className="card-title text-primary">More Responses from-->
<!--                                        {{ application.name }}</h6>-->
<!--                                    <span className="card-text">-->
<!--                                        <strong>-->
<!--                                            Business Description-->
<!--                                        </strong><br>{{ application.business_description }}<br>-->

<!--                                        <strong>-->
<!--                                            Current Number of Staffs-->
<!--                                        </strong><br>{{ application.number_of_employees }}<br>-->

<!--                                        <strong>-->
<!--                                            Have you participated in any ALX | E-learning and Assessment Portal / Nourishing Africa / Changing Narrative programs before?-->
<!--                                        </strong><br>-->
<!--                                        {{ application.participated_previous_program }}<br>-->

<!--                                        <strong>-->
<!--                                            Have you participated in any climate-related training/programs?-->
<!--                                        </strong><br>{{ application.participated_climate_program }}<br>-->

<!--                                        <strong>-->
<!--                                            What are your expectations from the program?-->
<!--                                        </strong><br>{{ application.expectations_from_program }}<br>-->

<!--                                        <strong>-->
<!--                                            How would the program impact your business?-->
<!--                                        </strong><br>-->
<!--                                        <p v-html="application.impact_on_business"></p>-->

<!--                                        <strong>-->
<!--                                            How did you hear about this program-->
<!--                                        </strong><br>-->
<!--                                        <p v-html="application.how_did_you_hear"></p>-->

<!--                                    </span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--            </th>-->
<!--        </tr>-->
<!--    </Transition>-->
</template>

<style scoped>

</style>

<script setup>
    import moment from 'moment';
    import {ref} from 'vue';

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
            <strong>Name:</strong> {{ user.user.name }}<br>
            <strong>Email:</strong> {{ user.user.email }}<br>
            <strong>Mobile:</strong> {{ user.user.mobile }}<br>
            <strong>Business:</strong> {{ user.user.business_name }}<br>
            <strong>Country:</strong> {{ user.user.country }}<br>
            <strong>Country Residence:</strong> {{ user.user.country_residence }}<br>
            <strong>Date of Birth:</strong> {{ user.user.date_of_birth }}<br>
            <strong>Gender:</strong> {{ user.user.gender }}<br>
            <strong>Education:</strong> {{ user.user.education }}<br>
            <div><img width="70" :src="user.user.image"/></div>
        </td>

        <td width="40%">
            <strong>Status:</strong> {{ user.is_completed ? 'Completed' : 'Started' }}<br>
        </td>

        <td width="20%">
            <strong>Date Started:</strong> {{ user.updated_at }}<br>
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

<template>
    <tr :class="{'bg-selected': selectedApplicant }">
        <td width="10%">
            {{ userAnswer.question_id }}
        </td>

        <td width="45%">
            <ul v-for="(answer_option, index) of answereOptions(userAnswer.option_answer)" :key="index" :class="getItemClass(answer_option)">
                <li> {{ answer_option === "" ? "No answer" : answer_option}}</li>
            </ul>
        </td>

        <td width="45%">
            <ul v-for="(answer_option, index) of answereOptions(userAnswer.other_answer)" :key="index" :class="getItemClass(answer_option)">
                <li> {{ answer_option === "" ? "No answer" : answer_option}}</li>
            </ul>
        </td>
    </tr>

    <!-- <Transition name="fade">
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
    </Transition> -->

</template>

<script>
import moment from 'moment';
import {ref} from 'vue';
import SweetAlertService from "../../../services/sweet-alert-service";

export default {
    props: {
        userAnswer: Object,
    },
    methods: {
        answereOptions: function (value) {
            return value;
        },
        getItemClass(item) {
            return item === "" ? "noanswer" : "ansgiven"
        }
    }

}
</script>

<style scoped>
.noanswer {
  color: red;
}
.ansgiven {
  color: green;
}
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

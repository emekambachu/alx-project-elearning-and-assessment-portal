<template>
    <tr>
        <td width="10%">
            {{ index + 1 }}
        </td>

        <td width="30%">{{ diagnosticTool.question}}</td>
        <td width="30%">
            <ul v-for="(answer_option, index) of answereOptions(diagnosticTool.options)" :key="index" :class="getItemClass(answer_option)">
                <li> {{ answer_option === "" ? "No answer" : answer_option}}</li>
            </ul>
        </td>
        <td width="30%">
            <ul class="list-unstyled">
                <li>Quest Formart: {{
                    diagnosticTool.question_formate == "radio_option" ? "Radio option"
                    : diagnosticTool.question_formate == "check_box_option" ? "Checkbox option" :
                    diagnosticTool.question_formate == "input_text_option" ? "InputText option" : ""
                    }}
                </li>
                <li>Has other option: {{
                    diagnosticTool.input_text === false ? "False" : "True"
                    }}
                </li>
                <li>Has Condition: {{
                    diagnosticTool.is_condition === 0 ? "False" : "True"
                    }}
                </li>
                <li>Condition: {{
                    diagnosticTool.condition === null ? "No answer" : diagnosticTool.condition
                    }}
                </li>
                <li>Condition Value: {{
                    diagnosticTool.condition_value === null ? "No answer" : diagnosticTool.condition_value
                    }}
                </li>
                <button @click="editId(diagnosticTool.id)" class="edit-btn">Edit</button>
                <!-- <button v-if="isLoading" class="btn btn-loading"> Loading... </button>
                <button v-else @click="deleteQuest(diagnosticTool.id)" class="delete-btn">Delete</button> -->
            </ul>
        </td>
    </tr>
</template>

<script>
import moment from 'moment';
import {ref} from 'vue';
import SweetAlertService from "../../../../services/sweet-alert-service";

export default {
    props: {
        diagnosticTool: Object,
        getDiagnosticTools: Function,
        index: Number
    },
    data: function () {
        return {
            isLoading: false,
        };
    },
    methods: {
        answereOptions: function (value) {
            return value;
        },
        getItemClass(item) {
            return item === "" ? "noanswer" : "ansgiven"
        },
        deleteId(id) {
            this.$emit('custom-event', id);
        },
        editId(id) {
            this.$emit('custom-event', id);
        },
        async deleteQuest(id) {
            this.isLoading = true;
            try {
                await axios.delete(`/api/diagnostic-question/${id}`, { headers: { "Content-Type": "application/json", Accept: "application/json"}})
                // await axios.delete(
                //     `${process.env.MIX_BASE_URL}/diagnostic-question/${id}`,
                //     { headers: { "Content-Type": "application/json", Accept: "application/json"}}
                // );
                this.isLoading = false;
                this.getDiagnosticTools()
            } catch (error) {
                this.isLoading = false;
            }
        },
    },
    // mounted() {
    //     console.log(diagnosticTool)
    // },
    // created() {
    //     console.log(diagnosticTool)
    // },
}
</script>

<style scoped>
.noanswer {
  color: red;
}
.ansgiven {
  color: green;
}
.edit-btn {
    background: green;
    margin-right: 10px;
    color: #ffffff;
}
.btn-loading {
    padding: 5px 25px;
    color: red;
    background-color: #dfecdf;
}
.delete-btn {
    background: red;
    color: #ffffff;
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

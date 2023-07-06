<template>
    <div class="p-4">
        <div id="" class="progress">
            <div class="progress-bar" role="progressbar" :style="{ width: valuenow + '%' }" :aria-valuenow="valuenow" aria-valuemin="0" aria-valuemax="100">
                {{ valuenow }}%
            </div>
        </div>
        <div class="d-flex pt-3">
            <div class="m-auto">
                <div v-show="errors" class="form-text h4">
                    <b> Value is required</b>
                </div>
            </div>
        </div>
        <button v-if="isLoading" class="btn btn-loading">Save&Exit</button>
        <div class="" v-for="(diagnosticTool, index) of diagnosticTools" :key="index">
            <form autocomplete="off" @submit.prevent="handleSubmit">
                <div v-if="currentPage === diagnosticTool.id">
                    <div v-if=" diagnosticTool.question_formate === 'check_box_option'" class="d-flex">
                        <div class="m-auto">
                            <div class="container my-1">
                                <div class="question ml-sm-5 pl-sm-5 pt-2">
                                    <div class="py-2 h5">
                                        <b> {{ diagnosticTool.question }}
                                            <span class="form-text">
                                                <small v-if="diagnosticTool.is_country">(Select at most 10 countries)</small>
                                                <small v-else>(Select all that apply)</small>
                                            </span>
                                        </b>
                                    </div>
                                    <div class="" id="options">
                                        <div v-if="diagnosticTool.is_country">
                                            <div>
                                                <MultilSelectQues  @childValue="handleChildValue"/>
                                            </div>
                                        </div>
                                        <div v-else>
                                            <div v-for="(answer_option, index) of answereOptions(diagnosticTool.options)" :key="index">
                                                <label class="options">
                                                    {{ answer_option }}
                                                    <input
                                                        id="myInput"
                                                        type="checkbox"
                                                        :value="answer_option"
                                                        v-model="checkedNames"
                                                    />
                                                    <span
                                                        class="checkmark"
                                                    ></span>
                                                </label>
                                            </div>
                                        </div>
                                        <label class="options" v-if="diagnosticTool.input_text">Others<input
                                                :name="diagnosticTool.id"
                                                type="text"
                                                v-model="inputValue"
                                            />
                                            <span class="checkmark"></span>
                                        </label>
                                        <!-- <label v-if="diagnosticTool.input_text">
                                            Others
                                            <input
                                                :name="diagnosticTool.id"
                                                type="text"
                                                v-model="inputValue"
                                            />
                                        </label> -->
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pt-3">
                                    <div class="ml-auto mr-sm-5">
                                        <button v-if="isLoading" class="btn btn-loading"> Loading...</button>
                                        <button @click="getstatus(diagnosticTool.question_formate)" v-else class="btn btn-success"> Next </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="diagnosticTool.question_formate === 'radio_option'" class="d-flex">
                        <div class="m-auto">
                            <div class="container my-1">
                                <div class="question ml-sm-5 pl-sm-5 pt-2">
                                    <div class="py-2 h5">
                                        <b> {{ diagnosticTool.question }}</b>
                                    </div>
                                    <div class="" id="options">
                                        <div v-for="(answer_option, index) of answereOptions(diagnosticTool.options)" :key="index">
                                            <label class="options">
                                                {{ answer_option }}
                                                <input
                                                    v-model="selectedOption"
                                                    type="radio"
                                                    id="myInput"
                                                    :name="diagnosticTool.id"
                                                    :value="answer_option"
                                                    @change="
                                                        clearInputField(
                                                            $event,
                                                            diagnosticTool.is_condition,
                                                            diagnosticTool.condition_value,
                                                            diagnosticTool.condition
                                                        )
                                                    "
                                                />
                                                <span class="checkmark radio"></span>
                                            </label>
                                        </div>
                                        <label v-if="diagnosticTool.input_text" @click="clearRadioButton" class="options">Others<input
                                                :name="diagnosticTool.id"
                                                type="text"
                                                v-model="inputValue"
                                                @input="clearRadioButton"
                                            />
                                            <span class="checkmark radio"></span>
                                        </label>
                                        <!-- <label v-if="diagnosticTool.input_text">
                                            Others
                                            <input
                                                :name="diagnosticTool.id"
                                                type="text"
                                                v-model="inputValue"
                                                @input="clearRadioButton"
                                            />
                                        </label> -->
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pt-3">
                                    <div class="ml-auto mr-sm-5">
                                        <div class="ml-auto mr-sm-5">
                                            <button v-if="isLoading" class="btn btn-loading"> Loading...</button>
                                            <button @click="getstatus(diagnosticTool.question_formate)" v-else class="btn btn-success"> Next </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="diagnosticTool.question_formate === 'input_text_option'" class="d-flex">
                        <div class="m-auto">
                            <div class="container my-1">
                                <div class="question ml-sm-5 pl-sm-5 pt-2">
                                    <div class="py-2 h5">
                                        <b> {{ diagnosticTool.question }}
                                            <span>
                                                <input
                                                    :name="diagnosticTool.id"
                                                    type="text"
                                                    id="myInput"
                                                    v-model="inputValue"
                                                    @input="
                                                        clearRadioButton
                                                    " />
                                            </span>
                                        </b>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center pt-3">
                                    <div class="ml-auto mr-sm-5">
                                        <div class="ml-auto mr-sm-5">
                                            <button v-if="isLoading" class="btn btn-loading"> Loading... </button>
                                            <button @click="getstatus(diagnosticTool.question_formate)" v-else class="btn btn-success"> Next </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import MultilSelectQues from "./multilSelectQues.vue";

export default {
    name: "DiagnosticQuestion",
    components: {
        MultilSelectQues,
    },
    data: function () {
        return {
            diagnosticTools: [],
            isLoading: false,
            currentPage: 1,
            isShow: false,
            isChecked: "",
            setValue: {},
            errors: false,
            changeValue: false,
            checkedNames: [],
            inputValue: "",
            selectedOption: "",
            newCurrentPage: 0,
            countries: [],
            maxSelection: 10,
            totalQuestions: 0,
            answerStatus: [],
            selectedOptions: [],
            inputType: ""
        };
    },

    computed: {
        valuenow() {
            return Math.round((100 * this.currentPage) / this.totalQuestions);
        },
    },

    watch: {},

    methods: {
        handleChildValue(valueChild) {
            this.checkedNames = valueChild
        },
        clearRadioButton() {
            this.selectedOption = "";
        },
        handleCheckboxChange() {
            if (this.checkedNames.length > this.maxSelection) {
                this.checkedNames.pop();
            }
        },
        clearInputField(event, is_condition, condition_value, condition) {
            this.inputValue = "";
            const { name, value } = event.target;
            if (is_condition && condition_value && value == condition) {
                this.newCurrentPage = condition_value;
            }
        },
        answereOptions: function (value) {
            return value;
        },
        countAnswerOption: function (value) {
            return Object.keys(value).length;
        },
        getstatus: function(value) {
            return this.inputType = value
        },
        async getCountries() {
            try {
                const response = await axios.get(
                    `https://restcountries.com/v2/region/africa`,
                    {
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                    }
                );
                const formData = await response.data;
                // console.log("items")
                this.oneCountry(formData)
                // let coountryName =
                // console.log(this.countries)
                // console.log(Object.values(this.countries) );
                // this.isLoading = false;
            } catch (error) {
                this.isLoading = false;
            }
        },

        async getDiagnosticTools() {
            try {
                const response = await axios.get(`https://brace.afchub.org/api/learning/diagnostic-tool`, { headers: { "Content-Type": "application/json", Accept: "application/json"}})
                // const response = await axios.get(
                //     `${process.env.MIX_BASE_URL}/learning/diagnostic-tool`,
                //     {
                //         headers: {
                //             "Content-Type": "application/json",
                //             Accept: "application/json",
                //         },
                //     }
                // );
                this.diagnosticTools = await response.data.fetch_questions;
                this.totalQuestions = await response.data.total_count;
                // console.log(this.diagnosticTools)
            } catch (error) {
                // this.isLoading = false;
            }
        },
        async getQuestionStatus() {
            const token = localStorage.getItem("learning-user-tk");
            try {
                const response = await axios.get(`https://brace.afchub.org/api/diagnostic-tool/fetch_answer_status`, { headers: { "Content-Type": "application/json", Authorization: `Bearer ${token}`}})
                // const response = await axios.get(
                //     `${process.env.MIX_BASE_URL}/diagnostic-tool/fetch_answer_status`,
                //     {
                //         headers: {
                //             Authorization: `Bearer ${token}`,
                //             "Content-Type": "application/json",
                //         },
                //     }
                // );
                this.answerStatus = await response.data.data;
                if (this.answerStatus.is_completed) {
                    this.$router.push("/learning/dashboard");
                }
                if (this.answerStatus.current_question_id > 0) {
                    this.currentPage = this.answerStatus.current_question_id;
                }
                this.current_question_id = 0;
            } catch (error) {}
        },
        async handleSubmit() {
            const token = localStorage.getItem("learning-user-tk");
            var formData = {};
            var ansStatusData = {};

            formData.question_id = this.currentPage;
            formData.token = token;
            ansStatusData.current_question_id = this.currentPage + 1;
            this.errors = false;

            if (this.inputType == "radio_option") {
                formData.option_answer = this.selectedOption;
                formData.other_answer = this.inputValue;
                formData.inputElement = this.inputType;
                if (this.selectedOption == "" && this.inputValue == "") {
                    this.errors = true;
                }
            }
            if (this.inputType == "check_box_option") {
                formData.option_answer = this.checkedNames;
                formData.other_answer = this.inputValue;
                formData.inputElement = this.inputType;
                if (this.checkedNames.length === 0 && this.inputValue == "") {
                    this.errors = true;
                }
            }
            if (this.inputType == "input_text_option") {
                formData.other_answer = this.inputValue;
                formData.inputElement = this.inputType;
                if (this.inputValue == "") {
                    this.errors = true;
                }
            }
            if (this.currentPage == this.totalQuestions) {
                ansStatusData.is_completed = true;
            } else {
                ansStatusData.is_completed = false;
            }
            if (!this.errors) {
                try {
                    this.isLoading = true;
                    const response = await axios.post(`https://brace.afchub.org/api/diagnostic-tool/add_answer`, formData, { headers: { "Content-Type": "application/json", Authorization: `Bearer ${token}`}})
                    // await axios.post(
                    //     `${process.env.MIX_BASE_URL}/diagnostic-tool/add_answer`,
                    //     formData,
                    //     {
                    //         headers: {
                    //             Authorization: `Bearer ${token}`,
                    //             "Content-Type": "application/json",
                    //         },
                    //     }
                    // );
                    await axios.post(`https://brace.afchub.org/api/diagnostic-tool/create_or_update_answer_status`, ansStatusData, { headers: { "Content-Type": "application/json", Authorization: `Bearer ${token}`}})
                    // await axios.post(
                    //     `${process.env.MIX_BASE_URL}/diagnostic-tool/create_or_update_answer_status`,
                    //     ansStatusData,
                    //     {
                    //         headers: {
                    //             Authorization: `Bearer ${token}`,
                    //             "Content-Type": "application/json",
                    //         },
                    //     }
                    // );
                    await response.data;
                    this.getQuestionStatus();

                    this.isLoading = false;
                } catch (error) {
                    this.isLoading = false;
                }
                if (this.currentPage == this.totalQuestions) {
                    this.$router.push("/learning/dashboard");
                }
                if (this.newCurrentPage > 0) {
                    this.currentPage = this.newCurrentPage;
                } else {
                    this.currentPage = this.currentPage + 1;
                }
                this.clearAll();
            }
        },
        clearAll: function () {
            this.selectedOption = "";
            this.inputValue = "";
            this.checkedNames = [];
            this.newCurrentPage = 0;
            this.inputType = "";
        },
    },
    created() {
        this.getDiagnosticTools();
        this.getCountries();
        this.getQuestionStatus();
    },
};
</script>


<style  scoped>
.progress {
    background-color: #ffffff;
}
.progress-bar {
    height: 20px;
    background: #006600;
}
.form-text {
    color: red;
}
.container {
    background-color: #ffffff;
    color: #555;
    border-radius: 10px;
    padding: 20px;
    font-family: "Montserrat", sans-serif;
    max-width: 700px;
}
.container > p {
    font-size: 32px;
}
.question {
    width: 75%;
}
.options {
    position: relative;
    padding-left: 40px;
}
#options label {
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    cursor: pointer;
}
.options input[type="radio"], input[type="checkbox"] {
    opacity: 0;
}
.checkmark {
    position: absolute;
    top: -1px;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #ffffff;
    border: 1px solid #555;
}

.radio {
    border-radius: 50%;
}
.options input:checked ~ .checkmark:after {
    display: block;
}
.options .checkmark:after {
    content: "";
    width: 10px;
    height: 10px;
    display: block;
    background: white;
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s;
}
.options input[type="radio"]:checked ~ .checkmark {
    background: #006600;
    transition: 300ms ease-in-out 0s;
}
.options input[type="radio"]:checked ~ .checkmark:after {
    transform: translate(-50%, -50%) scale(1);
}
.options input[type="text"]:focus ~ .checkmark {
    background: #006600;
    transition: 300ms ease-in-out 0s;
}
.options input[type="text"]:focus ~ .checkmark:after {
    transform: translate(-50%, -50%) scale(1);
}
.options input[type="checkbox"]:checked ~ .checkmark {
    background: #006600;
    transition: 300ms ease-in-out 0s;
}
.options input[type="checkbox"]:checked ~ .checkmark:after {
    transform: translate(-50%, -50%) scale(1);
}
.btn-primary {
    background-color: #555;
    color: #ddd;
    border: 1px solid #ddd;
}
.btn-primary:hover {
    background-color: #006600;
    border: 1px solid #006600;
}
.btn-success {
    padding: 5px 25px;
    background-color: #006600;
}
.btn-success:hover {
    padding: 5px 25px;
    background-color: #406840;
}
.btn-loading {
    padding: 5px 25px;
    background-color: #dfecdf;
}
input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid #555;
}
input::placeholder {
    color: #ffffff;
    font-family: "Sora";
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
}
@media (max-width: 576px) {
    .question {
        width: 100%;
        word-spacing: 2px;
    }
}
</style>

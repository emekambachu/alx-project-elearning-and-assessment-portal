<template>
   <div class="p-4">
    <div class="p-4">
      <div id="" class="progress">
            <div class="progress-bar" role="progressbar" :style="{ width: valuenow + '%' }" :aria-valuenow="valuenow" aria-valuemin="0" aria-valuemax="100">
                {{ valuenow }}%
            </div>
        </div>
        <div class="text-right">
            <router-link to="/learning/logout">
                <button class="btn btn-exit mt-2 h4">Save&Exit</button>
            </router-link>
        </div>
        <div class="d-flex pt-3">
            <div class="m-auto">
                <div v-show="errors" class="form-text h4">
                    <b> Value is required</b>
                </div>
            </div>
        </div>
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
                                <input type="checkbox" :id="index" name="fruit" v-model="checkedNames" :value="answer_option">
                                <label :for="index">{{ answer_option }}</label>
                              </div>
                          </div>
                          <div v-if="diagnosticTool.input_text">
                            <input type="checkbox" id="fruit" name="fruit"  v-model="checkboxInput" @change="updateInput">
                            <label for="fruit">others<input type="text" v-model="inputText" @input="updateCheckbox"></label>
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
              </div>
              <div v-if="diagnosticTool.question_formate === 'radio_option'" class="d-flex">
                  <div class="m-auto">
                      <div class="container my-1">
                          <div class="question ml-sm-5 pl-sm-5 pt-2">
                            <div class="py-2 h5">
                                <b> {{ diagnosticTool.question }}</b>
                            </div>
                            <div>
                                <div v-for="(answer_option, index) of answereOptions(diagnosticTool.options)" :key="index">
                                  <input :value="answer_option" type="radio" :id="index" :name="diagnosticTool.id" v-model="selectedOption" @change="clearInputField(
                                                            $event,
                                                            diagnosticTool.is_condition,
                                                            diagnosticTool.condition_value,
                                                            diagnosticTool.condition
                                                        )">
                                  <label :for="index">{{ answer_option }}</label>
                                </div>
                            </div>
                            <div v-if="diagnosticTool.input_text">
                              <input value="option2" v-model="radioValue" type="radio" id="fruit" @change="clearRadioButton">
                              <label for="fruit">others<input type="text" v-model="inputValue" @input="clearRadioButton" ></label>
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
        <!-- <div class="text-right">
            <button class="btn btn-exit mt-2 h4">Save&Exit</button>
        </div> -->
      </div>
   </div>
</template>

<script>
import axios from "axios";
import MultilSelectQues from "./multilSelectQues.vue";

export default {
    components: {
        MultilSelectQues,
    },

    data() {
        return {
          inputText: "",
          inputValue: "",
          checkboxInput: false,
          diagnosticTools: [],
          checkedNames: [],
          currentPage: 1,
          errors: false,
          isShow: false,
          selectedOptions: [],
          countries: [],
          selectedOption: "",
          isLoading: false,
          totalQuestions: 1,
          checkOption: "",
          answerStatus: [],
          newCurrentPage: 0,
          radioValue: null
        };
    },
    computed: {
        valuenow() {
            return Math.round((100 * this.currentPage) / this.totalQuestions);
        },
    },
    methods: {
        answereOptions: function (value) {
            return value;
        },

        countAnswerOption: function (value) {
            return Object.keys(value).length;
        },

        handleChildValue(valueChild) {
            this.checkedNames = valueChild
        },

        updateCheckbox() {
          if (this.inputText.length > 0) {
            this.checkboxInput = true;
          } else {
            this.checkboxInput = false;
          }
        },

        updateInput() {
          if (this.checkboxInput) {
            this.inputText = '';
          } else {
            this.inputText = '';
          }
        },

        clearInputField(event, is_condition, condition_value, condition) {
            this.inputValue = "";
            this.radioValue = null;
            const { name, value } = event.target;
            if (is_condition && condition_value && value == condition) {
                // console.log(this.newCurrentPage)
                this.newCurrentPage = condition_value;
                // console.log(this.newCurrentPage)
            }
        },
        // clearInputField() {
        //     this.inputValue = "";
        //     this.radioValue = null;
        // },
        clearRadioButton() {
            this.selectedOption = "";
            this.radioValue = "option2";
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
                this.oneCountry(formData)
            } catch (error) {
                this.isLoading = false;
            }
        },

        async getQuestionStatus() {
            const token = localStorage.getItem("learning-user-tk");
            try {
                // const response = await axios.get(`http://localhost:8000/api/diagnostic-tool/fetch_answer_status`, { headers: { "Content-Type": "application/json", Authorization: `Bearer ${token}`}})

                const response = await axios.get(`/api/diagnostic-tool/fetch_answer_status`, {
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: `Bearer ${token}`
                    }
                });

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
        async getDiagnosticTools() {
            try {
                // const response = await axios.get(`http://localhost:8000/api/learning/diagnostic-tool`, { headers: { "Content-Type": "application/json",  Accept: "application/json"}})
                const response = await axios.get(`/api/learning/diagnostic-tool`, {
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json"
                    }
                });

                this.diagnosticTools = await response.data.fetch_questions;
                this.totalQuestions = await response.data.total_count;
            } catch (error) {}
        },

        async handleSubmit() {

            const token = localStorage.getItem("learning-user-tk");
            const formData = {};
            const ansStatusData = {};

            formData.question_id = this.currentPage;
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
                formData.other_answer = this.inputText;
                formData.inputElement = this.inputType;
                if (this.checkedNames.length === 0 && this.inputText == "") {
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

            formData.token = token;
            // console.log(this.newCurrentPage)

            if (this.currentPage == this.totalQuestions) {
                ansStatusData.is_completed = true;
            } else {
                ansStatusData.is_completed = false;
            }

            // console.log(this.newCurrentPage)
            if (this.newCurrentPage > 0) {
                ansStatusData.current_question_id = this.newCurrentPage;
            }
            else {
                ansStatusData.current_question_id = this.currentPage + 1;
            }
            // console.log(this.newCurrentPage)
            if (!this.errors) {
                this.isLoading = true;
                try {
                    // await axios.post(`http://localhost:8000/api/diagnostic-tool/add_answer`, formData, { headers: { "Content-Type": "application/json", Authorization: `Bearer ${token}`}})
                    // await axios.post(`http://localhost:8000/api/diagnostic-tool/create_or_update_answer_status`, ansStatusData, { headers: { "Content-Type": "application/json", Authorization: `Bearer ${token}`}})

                    await axios.post(`/api/diagnostic-tool/add_answer`, formData, {
                        headers: {
                            "Content-Type": "application/json",
                            Authorization: `Bearer ${token}`
                        }
                    });

                    await axios.post(`/api/diagnostic-tool/create_or_update_answer_status`, ansStatusData, {
                        headers: {
                            "Content-Type": "application/json",
                            Authorization: `Bearer ${token}`
                        }
                    });

                    if (this.currentPage == this.totalQuestions) {
                        return this.$router.push("/diagnostic/success-page");
                    }
                    if (this.newCurrentPage > 0) {
                        this.currentPage = this.newCurrentPage;
                    }
                    else {
                        this.currentPage = this.currentPage + 1;
                    }
                    this.getQuestionStatus();
                    this.clearAll();
                    this.isLoading = false;
                } catch (error) {
                    this.isLoading = false;
                }
            }
        },

        clearAll: function () {
            this.selectedOption = "";
            this.inputValue = "";
            this.checkedNames = [];
            this.newCurrentPage = 0;
            this.inputType = "";
            this.inputText = "";
            this.checkboxInput = false;
        },
    },

    created() {
        this.getDiagnosticTools();
        this.getCountries();
        this.getQuestionStatus();
    },
};
</script>

<style lang="scss" scoped>

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
input[type=checkbox] + label {
    display: block;
    margin: 0.4em;
    cursor: pointer;
    padding: 0.2em;
}

input[type=checkbox] {
    display: none;
}

input[type=checkbox] + label:before {
    content: "\2714";
    border: 1px solid #555;
    border-radius: 0.2em;
    display: inline-block;
    width: 1.7em;
    height: 1.7em;
    padding-left: 0.2em;
    padding-bottom: 0.3em;
    margin-right: 0.5em;
    vertical-align: bottom;
    color: transparent;
    transition: .2s;
}

input[type=checkbox]:checked + label:before {
    background-color: #006600;
    color: #fff;
    border-color: #006600;
}



input[type=radio] + label {
    display: block;
    margin: 0.4em;
    cursor: pointer;
    padding: 0.2em;
}

input[type=radio] {
    display: none;
}

input[type=radio] + label:before {
    content: "\2714";
    border: 1px solid #555;
    border-radius: 50%;
    display: inline-block;
    width: 1.7em;
    height: 1.7em;
    padding-left: 0.2em;
    padding-bottom: 0.3em;
    margin-right: 0.5em;
    vertical-align: bottom;
    color: transparent;
    transition: .2s;
}

input[type=radio]:checked + label:before {
    background-color: #006600;
    color: #fff;
    border-color: #006600;
}

input[type=text] {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid #555;
}
input::placeholder {
    color: #ffffff;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    padding-left: 10px;
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
.btn-exit {
    padding: 5px 25px;
    background-color: red;
    color: #ffffff;
}
@media (max-width: 576px) {
    .question {
        width: 100%;
        word-spacing: 2px;
    }
}
</style>



<!-- <template>
    <div>


    <label>
        <input type="checkbox" v-model="checkbox" @change="updateInput" >
       others
        <input type="text" v-model="inputText" @input="updateCheckbox">
    </label>
    </div>
</template>

<script>
export default {
    data() {
        return { inputText: "", checkbox: false };
    },
    methods: {
        updateCheckbox() {
          if (this.inputText.length > 0) {
            this.checkbox = true;
          } else {
            this.checkbox = false;
          }
        },
        updateInput() {
          if (this.checkbox) {
            this.inputText = '';
          } else {
            this.inputText = '';
          }
        }
      }
};
</script>

<style>
.form-inline {
    display: flex;
    align-items: center;
}

.form-inline input[type="text"],
.form-inline input[type="checkbox"] {
    margin-right: 10px;
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
</style> -->

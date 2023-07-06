<template>
    <div
        class=""
        v-for="(diagnosticTool, index) of diagnosticTools"
        :key="index"
    >
        <!-- <div class="progress ">
            <div
                class="progress-bar"
                role="progressbar"
                style="width: 25%"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                25%
            </div>
        </div> -->
        <div v-show="errors && !changeValue" class="form-text">
            <small> Value is required</small>
        </div>
        <form autocomplete="off" @submit.prevent="handleSubmit">
            <div v-if="currentPage === diagnosticTool.id">
                <div
                    v-if="
                        diagnosticTool.question_formate === 'check_box_option'
                    "
                    class="d-flex"
                >
                    <div class="m-auto">
                        <div class="container mt-sm-5 my-1">
                            <div class="question ml-sm-5 pl-sm-5 pt-2">
                                <div class="py-2 h5">
                                    <b
                                        >{{ diagnosticTool.id }}.
                                        {{ diagnosticTool.question }}</b
                                    >
                                </div>
                                <div
                                    class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                                    id="options"
                                >
                                    <div
                                        v-for="(
                                            answer_option, index
                                        ) of answereOptions(
                                            diagnosticTool.answer_options
                                        )"
                                        :key="index"
                                    >
                                        <label
                                            class="options"
                                            :for="answer_option"
                                            >{{ alphabets[index] }}.
                                            {{ answer_option }}
                                            <input
                                                type="checkbox"
                                                :id="answer_option"
                                                :value="answer_option"
                                                :name="
                                                    'checkquestion' +
                                                    diagnosticTool.id
                                                "
                                                @change="
                                                    onChange(
                                                        $event,
                                                        checkedNames
                                                    )
                                                "
                                                v-model="checkedNames"
                                            />
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <label v-if="diagnosticTool.input_text">
                                        {{
                                            alphabets[
                                                countAnswerOption(
                                                    diagnosticTool.answer_options
                                                )
                                            ]
                                        }}. Others
                                        <input
                                            :name="
                                                'textquestion' +
                                                diagnosticTool.id
                                            "
                                            @input="onChange($event)"
                                            type="text"
                                        />
                                    </label>
                                    <p>value: {{ setValue }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <div class="ml-auto mr-sm-5">
                                    <button
                                        @click="goNext"
                                        class="btn btn-success"
                                    >
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="currentPage === diagnosticTool.id">
                <div
                    v-if="diagnosticTool.question_formate === 'radio_option'"
                    class="d-flex"
                >
                    <div class="m-auto">
                        <div class="container mt-sm-5 my-1">
                            <div class="question ml-sm-5 pl-sm-5 pt-2">
                                <div class="py-2 h5">
                                    <b
                                        >{{ diagnosticTool.id }}.
                                        {{ diagnosticTool.question }}</b
                                    >
                                </div>
                                <div
                                    class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                                    id="options"
                                >
                                    <div
                                        v-for="(
                                            answer_option, index
                                        ) of answereOptions(
                                            diagnosticTool.answer_options
                                        )"
                                        :key="index"
                                    >
                                        <label class="options"
                                            >{{ alphabets[index] }}.
                                            {{ answer_option }}
                                            <input
                                                @change="
                                                    onChange(
                                                        $event,
                                                        checkedNames,
                                                        diagnosticTool.is_condition,
                                                        diagnosticTool.condition_value
                                                    )
                                                "
                                                type="radio"
                                                :name="
                                                    'question' +
                                                    diagnosticTool.id
                                                "
                                                :value="answer_option"
                                            />
                                            <span
                                                class="checkmark radio"
                                            ></span>
                                        </label>
                                    </div>
                                    <label v-if="diagnosticTool.input_text">
                                        {{
                                            alphabets[
                                                countAnswerOption(
                                                    diagnosticTool.answer_options
                                                )
                                            ]
                                        }}. Others
                                        <input
                                            :name="
                                                'question' + diagnosticTool.id
                                            "
                                            @input="onChange($event)"
                                            type="text"
                                            v-model="checkedNames"
                                        />
                                    </label>
                                    <p>value: {{ setValue }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <div class="ml-auto mr-sm-5">
                                    <button
                                        @click="goNext"
                                        class="btn btn-success"
                                    >
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "DiagnosticQuestion",
    data: function () {
        return {
            diagnosticTools: [],
            isLoading: false,
            currentPage: 1,
            isShow: false,
            isChecked: "",
            inputValue: "",
            setValue: {},
            errors: false,
            changeValue: false,
            checkedNames: [],
            alphabets: [
                "a",
                "b",
                "c",
                "d",
                "e",
                "f",
                "g",
                "h",
                "i",
                "j",
                "k",
                "l",
                "m",
                "n",
                "o",
                "p",
                "q",
                "r",
                "s",
                "t",
                "u",
                "v",
                "w",
                "x",
                "y",
                "z",
            ],
        };
    },
    watch: {
        errors(newQuestion, oldQuestion) {
            console.log(newQuestion, oldQuestion);
        },
    },
    methods: {
        goNext: function () {
            if (!this.errors && this.changeValue) {
                this.currentPage = this.currentPage + 1;
                this.checkedNames = [];
                this.changeValue = false;
            }
        },
        goPrevious: function () {
            this.currentPage = this.currentPage - 1;
            this.checkedNames = [];
        },
        onChange: function (event, item, is_condition, condition_value) {
            this.changeValue = true;
            this.errors = false;
            if (!item || !event.target.value) {
                this.errors = true;
            }
            console.log("3", this.errors);
            if (event.target.type == "radio" || event.target.type == "text") {
                const { name, value } = event.target;
                this.setValue = {
                    ...this.setValue,
                    [name]: value,
                };
                if (is_condition && condition_value && value == "Yes") {
                    this.currentPage = condition_value;
                }
            } else if (event.target.type == "checkbox") {
                const { name } = event.target;
                this.setValue = {
                    ...this.setValue,
                    [name]: Object.values(item),
                };
            }
        },

        answereOptions: function (value) {
            return value;
        },
        countAnswerOption: function (value) {
            return Object.keys(value).length;
        },
        async getDiagnosticTools() {
            this.isLoading = true;
            // const token = localStorage.getItem("token");
            try {
                const response = await axios.get(`/api/learning/diagnostic-tool`, { headers: { "Content-Type": "application/json", Accept: "application/json"}})
                // const response = await axios.get(
                //     `${process.env.MIX_BASE_URL}/learning/diagnostic-tool`,
                //     {
                //         headers: {
                //             "Content-Type": "application/json",
                //             Accept: "application/json",
                //         },
                //     }
                // );
                // console.log("hello", response);
                this.diagnosticTools = await response.data;
                this.isLoading = false;
            } catch (error) {
                this.isLoading = false;
            }
        },
    },
    created() {
        this.getDiagnosticTools();
    },
};
</script>

<style scoped>
.form-text {
    color: red;
}
.container {
    background-color: #555;
    color: #ddd;
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
.options input {
    opacity: 0;
}
.checkmark {
    position: absolute;
    top: -1px;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #555;
    border: 1px solid #ddd;
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
    background: #21bf73;
    transition: 300ms ease-in-out 0s;
}
.options input[type="radio"]:checked ~ .checkmark:after {
    transform: translate(-50%, -50%) scale(1);
}
.options input[type="checkbox"]:checked ~ .checkmark {
    background: #21bf73;
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
    background-color: #21bf73;
    border: 1px solid #21bf73;
}
.btn-success {
    padding: 5px 25px;
    background-color: #21bf73;
}
input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid #ffffff;
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




<div class="" id="options">
                                        <div
                                            v-for="(
                                                answer_option, index
                                            ) of answereOptions(countries)"
                                            :key="index"
                                        >
                                            <div
                                                v-if="diagnosticTool.is_country"
                                            >
                                                <label class="options">
                                                    {{ answer_option.name }}
                                                    <input
                                                        id="myInput"
                                                        type="checkbox"
                                                        :value="
                                                            answer_option.name
                                                        "
                                                        v-model="checkedNames"
                                                        @change="
                                                            handleCheckboxChange
                                                        "
                                                    />
                                                    <span
                                                        class="checkmark"
                                                    ></span>
                                                </label>
                                                <label
                                                    v-if="
                                                        diagnosticTool.input_text
                                                    "
                                                >
                                                    {{
                                                        alphabets[
                                                            countAnswerOption(
                                                                diagnosticTool.answer_options
                                                            )
                                                        ]
                                                    }}. Others
                                                    <input
                                                        :name="
                                                            diagnosticTool.id
                                                        "
                                                        type="text"
                                                        v-model="inputValue"
                                                    />
                                                </label>
                                            </div>
                                            <div v-else>
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
                                                <label
                                                    v-if="
                                                        diagnosticTool.input_text
                                                    "
                                                >
                                                    {{
                                                        alphabets[
                                                            countAnswerOption(
                                                                diagnosticTool.answer_options
                                                            )
                                                        ]
                                                    }}. Others
                                                    <input
                                                        :name="
                                                            diagnosticTool.id
                                                        "
                                                        type="text"
                                                        v-model="inputValue"
                                                    />
                                                </label>
                                            </div>
                                        </div>
                                    </div>











<div>
    <div class="" v-for="(diagnosticTool, index) of diagnosticTools" :key="index">
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
                    <!-- <div v-if="diagnosticTool.is_country">
                        <div>
                            <MultilSelectQues  @childValue="handleChildValue"/>
                        </div>
                    </div>
                    <div v-else>
                        <div v-for="(answer_option, index) of answereOptions(diagnosticTool.answer_options)" :key="index">
                          <input type="checkbox" :id="index" name="fruit" >
                          <label :for="index">{{ answer_option }}</label>
                        </div>
                    </div>
                    <div v-if="diagnosticTool.input_text">
                      <input type="checkbox" id="fruit" name="fruit"  v-model="checkbox" @change="updateInput">
                      <label for="fruit">others<input type="text" v-model="inputText" @input="updateCheckbox"></label>
                    </div> -->
                    
                    <!-- <label class="options" v-if="diagnosticTool.input_text">Others<input
                            :name="diagnosticTool.id"
                            type="text"
                            v-model="inputValue"
                        />
                        <span class="checkmark"></span>
                    </label> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- <div>
          <input type="checkbox" id="fruit1" name="fruit" >
          <label for="fruit1">Apple</label>
          <input type="checkbox" id="fruit2" name="fruit" >
          <label for="fruit2">Apple</label>
          <input type="checkbox" id="fruit3" name="fruit" >
          <label for="fruit3">Apple</label>
      </div>
      <div>
          <input type="checkbox" id="fruit" name="fruit"  v-model="checkbox" @change="updateInput">
          <label for="fruit">Apple<input type="text" v-model="inputText" @input="updateCheckbox"></label>
      </div> -->
  </div>
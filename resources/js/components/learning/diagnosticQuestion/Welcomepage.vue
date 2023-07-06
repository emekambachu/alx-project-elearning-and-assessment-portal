<template>
    <div class="p-4">
        <div class="d-flex">
            <div class="m-auto">
                <div class="container-fluid my-1">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="question">
                        <div class="py-2 h3 text-center">
                            <b>
                                BRACE DIAGNOSTIC TOOL INSTRUCTIONS
                            </b>
                        </div>
                        <div class="" id="options">
                            <p class="text-left pb-3">The aim of this tool is to collect information and gather insights about participants’ level of awareness to climate change and how their business is positioned to adopt climate smart practices.
                                Please provide honest and sincere response to the questions as it relates to your business.
                            </p>
                            <ul class="list-unstyled m-0 p-0">
                                <li><span><i class="fa-solid fa-circle-check"></i></span> Select the answer that best aligns with your business. Remember, there are no right or wrong answers.</li>
                                <li><span><i class="fa-solid fa-circle-check"></i></span>  Note that you cannot go back to previous questions, so make sure to answer the questions correctly.</li>

                                <li><span><i class="fa-solid fa-circle-check"></i></span> You are only required to answer questions related to the value chain you operate. </li>
                            </ul>
                            <p class="">This tool will take approximately 15minutes. You can save and continue answering the questions at later time </p>
                            <p class="style-red">Note: You need to complete this tool before you can have access to the learning portal</p>
                        </div>
                    </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div class="ml-auto mr-sm-5">
                            <button class="btn btn-success">
                                <router-link to="/diagnostic/multiselectques" style="display: inline-block; text-decoration: none;; color: #ffffff;">
                                    Start
                                </router-link>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "DiagnosticQuestion",
    data: function () {
        return {
            userDetails: [],
            isLoading: false,
        };
    },
    methods: {
        async getUserDetails() {
            const token = localStorage.getItem("learning-user-tk");
            try {
                const response = await axios.get(
                    `${process.env.MIX_BASE_URL}/user-details`,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                            "Content-Type": "application/json",
                        },
                    }
                );
                this.userDetails = await response.data;
                console.log(this.userDetails)
            } catch (error) {}
        },
    },
    created() {
        this.getUserDetails();
    },
};
</script>

<style scoped>
b {
    color: #006600;
}

#options p {
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 22px;
    color: #444444;
}
 .style-para {
    font-weight: 500 !important;
    font-size: 14px !important;
}
#options span {
    font-weight: 400;
    font-size: 25px;
    color: #006600;
    padding-right: 15px;
}
.container-fluid {
    background-color: #ffffff;
    color: #555;
    border-radius: 10px;
    padding: 20px 0;
    font-family: "Montserrat", sans-serif;
    max-width: 700px;
}
.container-fluid > p {
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
.style-red {
    color: red !important;
}
@media (max-width: 576px) {
    .question {
        width: 100%;
        word-spacing: 2px;
    }
}
</style>

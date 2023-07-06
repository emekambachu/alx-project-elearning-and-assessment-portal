<template>
    <div class="container pt-5">

        <div class="row justify-content-center d-flex">
            <div class="col-6 bg-white-radius-shadow text-center">
                <p class="mb-2 tx-18 text-inter">
                    Thank you for your time and effort in completing this diagnostic tool.</p>
                <a :href="'/learning/login'">
                    <button class="na-bg-dark-green p-2 na-border-radius text-white">
                        Login to Learning Portal
                    </button>
                </a>
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
                const response = await axios.get(`https://brace.afchub.org/api/user-details`, { headers: { "Content-Type": "application/json", Authorization: `Bearer ${token}`}})

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
@media (max-width: 576px) {
    .question {
        width: 100%;
        word-spacing: 2px;
    }
}
</style>

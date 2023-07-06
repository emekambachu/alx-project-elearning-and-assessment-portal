<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-10 bg-white-radius-shadow">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center text-dark-green">Participant's Information</h4>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Name:</strong><br>
                                <span>{{ user.name }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Email:</strong><br>
                                <span>{{ user.email }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Mobile:</strong><br>
                                <span>{{ user.mobile }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Country:</strong><br>
                                <span>{{ user.country }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Highest Education:</strong><br>
                                <span>{{ user.education }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Business Name:</strong><br>
                                <span>{{ user.business_name }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Business Stage:</strong><br>
                                <span>{{ user.business_stage }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Business Location:</strong><br>
                                <span>{{ user.business_country }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Type of Business:</strong><br>
                                <span>{{ user.type_of_business }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Agribusiness Sector:</strong><br>
                                <span>{{ user.agribusiness_sector }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-2">
                            <p>
                                <strong>Value Chain Operation:</strong><br>
                                <span>{{ user.value_chain_operation }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button class="btn btn-success">
                            <router-link to="/diagnostic/instruction"
                                         style="display: inline-block; text-decoration: none; color: #ffffff;">
                                Next
                            </router-link>
                        </button>
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
            user: {},
            isLoading: false,
        };
    },

    methods: {
        async getUserDetails() {
            const token = localStorage.getItem("brace-learning-tk");
            try {
                const response = await axios.get('/api/user-details', {
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: `Bearer ${token}`
                    },
                    params: {
                        token: token
                    }
                })
                // const response = await axios.get(
                //     `${process.env.MIX_BASE_URL}/user-details`,
                //     {
                //         headers: {
                //             Authorization: `Bearer ${token}`,
                //             "Content-Type": "application/json",
                //         },
                //     }
                // );
                //https://brace.afchub.org/diagnostic/undefined/user-details
                //MIX_BASE_URL="https://brace.afchub.org/api"
                this.user = await response.data.user;
                console.log(this.user)
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
/* .card {
    width: 70%;
} */
/* .question {
    width: 75%;
} */
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

<template>
    <div>
        <div v-if="currentPage === 1" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >1. In which agribusiness sector are you
                                operating?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Crop production
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked1"
                                    value="Crop production"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Animal production
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked1"
                                    value="Animal production"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Fishery
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked1"
                                    value="Fishery"
                                />
                                <span class="checkmark"></span>
                            </label>
                            e. Others
                            <input
                                name="isChecked1"
                                @input="onChange($event)"
                                type="text"
                            />
                            <!-- <p>value: {{ setValue }}</p> -->
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button
                                class="btn btn-primary disabled"
                                aria-disabled="true"
                            >
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 2" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >2. What role/value chain is your business
                                operating in the agrifood/agribusiness
                                sector?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Production
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked2"
                                    value="Production"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Aggregation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked2"
                                    value="Aggregation"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Processing / Packaging
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked2"
                                    value="Processing / Packaging"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Logistics / Distribution
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked2"
                                    value="Logistics / Distribution"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Retail / Marketing
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked2"
                                    value="Retail / Marketing"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Service Providers
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked2"
                                    value="Service Providers"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <!-- <p>value: {{ setValue }}</p> -->
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 3" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >3. How old is your business (from the time of
                                registration)?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. 1 – 2 years
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked3"
                                    value="1 – 2 years"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. 3 – 5 years
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked3"
                                    value="3 – 5 years"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. 6 - 8 years
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked3"
                                    value="6 - 8 years"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. 9 – 10 years
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked3"
                                    value="9 – 10 years"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. 11 – 15 years
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked3"
                                    value="11 – 15 years"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Above 15 years
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked3"
                                    value="Above 15 years"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 4" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>4. Where is your business located/operating</b>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 5" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >5. How many full-time staff do you
                                have/operating in your business?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. 1 – 5
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked5"
                                    value="1 – 5"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. 6 – 10
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked5"
                                    value="6 – 10"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. 11 – 20
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked5"
                                    value="11 – 20"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. 21 – 30
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked5"
                                    value="21 – 30"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. 31 – 50
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked5"
                                    value="31 – 50"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Above 50
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked5"
                                    value="Above 50"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 6" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >6. How many part-time staff do you
                                have/operating in your business?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. 1 – 5
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked6"
                                    value="1 – 5"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. 6 – 10
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked6"
                                    value="6 – 10"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. 11 – 20
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked6"
                                    value="11 – 20"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. 21 – 30
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked6"
                                    value="21 – 30"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. 31 – 50
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked6"
                                    value="31 – 50"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Above 50
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked6"
                                    value="Above 50"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 7" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >7. How many casual staff do you have/operating
                                in your business?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. 1 – 5
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked7"
                                    value="1 – 5"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. 6 – 10
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked7"
                                    value="6 – 10"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. 11 – 20
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked7"
                                    value="11 – 20"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. 21 – 30
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked7"
                                    value="21 – 30"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. 31 – 50
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked7"
                                    value="31 – 50"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Above 50
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked7"
                                    value="Above 50"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 8" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >8. How many women are involved your business
                                operation?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked8"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. 1 – 10%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked8"
                                    value="1 – 10%"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. 11 – 20%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked8"
                                    value="11 – 20%"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. 21 – 30%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked8"
                                    value="21 – 30%"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. 31 – 40%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked8"
                                    value="31 – 40%"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. 41 – 50%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked8"
                                    value="41 – 50%"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. Above 50%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked8"
                                    value="Above 50%"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 9" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >9. How many women are in your senior/management
                                team?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked9"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. 1 – 10%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked9"
                                    value="1 – 10%"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. 11 – 20%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked9"
                                    value="11 – 20%"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. 21 – 30%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked9"
                                    value="21 – 30%"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. 31 – 40%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked9"
                                    value="31 – 40%s"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. 41 – 50%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked9"
                                    value="41 – 50%"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. Above 50%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked9"
                                    value="Above 50%"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 10" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >10. Does your agribusiness currently have an
                                insurance cover?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked10"
                                    value="Yes"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked10"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 11" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>11. If yes, which type of insurance cover?</b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Natural disaster (Weather, Water, Fire)
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked11"
                                    value="Natural disaster (Weather, Water, Fire)"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Low productivity
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked11"
                                    value="Low productivity"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Theft
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked11"
                                    value="Theft"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Farm equipment and input (Seeds, fertilizer,
                                products, etc)
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked11"
                                    value="Farm equipment and input (Seeds, fertilizer,
                                products, etc)"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. General Liability
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked11"
                                    value="General Liability"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Not Applicable
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked11"
                                    value="Not Applicable"
                                />
                                <span class="checkmark"></span>
                            </label>
                            e. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 12" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>12. Do you know what climate change is?</b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, climate change refers to long-term
                                shifts in temperatures and weather patterns.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked12"
                                    value="Yes, climate change refers to long-term
                                shifts in temperatures and weather patterns."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Yes, climate change describes a change in
                                the average conditions such as temperature and
                                rainfall in a region over a period of time.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked12"
                                    value="Yes, climate change describes a change in
                                the average conditions such as temperature and
                                rainfall in a region over a period of time."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Yes, climate change is a change in the usual
                                weather found in a place.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked12"
                                    value="Yes, climate change is a change in the usual
                                weather found in a place."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Yes, climate change is the global phenomenon
                                of climate transformation characterized by the
                                changes in the usual climate of the planet that
                                are especially caused by human activities.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked12"
                                    value="Yes, climate change is the global phenomenon
                                of climate transformation characterized by the
                                changes in the usual climate of the planet that
                                are especially caused by human activities."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. No, I do not know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked12"
                                    value="No, I do not know."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. I am not sure .
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked12"
                                    value="I am not sure ."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 13" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >13. If yes, how would you rate your
                                understanding of climate change?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Excellent
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked13"
                                    value="Excellent"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Good
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked13"
                                    value="Good"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Average
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked13"
                                    value="Average"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Fair
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked13"
                                    value="Fair"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Poor
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked13"
                                    value="Poor"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Not available
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked13"
                                    value="Not available"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 14" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >14. Do you believe climate change is
                                human-induced or natural?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Human induced
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked14"
                                    value="Human induced"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Natural
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked14"
                                    value="Natural"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Both
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked14"
                                    value="Both"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked14"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked14"
                                    value="I don’t know."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 15" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >15. On a scale of 1 to 10, where 1 is “not at
                                all” to 10, “extreme impact” how does climate
                                change impact your business?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. 1
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="1"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. 2
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="2"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. 3
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="3"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. 4
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="4"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. 5
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="5"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. 6
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="6"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. 7
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="7"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. 8
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="8"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. 9
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="9"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. 10
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked15"
                                    value="10"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 16" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >16. If yes, what is the biggest climate change
                                effect your business is facing/faced in the
                                past?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Flood
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="Flood"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Drought
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="Drought"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Desertification/Soil degradation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="Desertification/Soil degradation"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Weather fluctuation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="Weather fluctuation"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Air pollution
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="Air pollution"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Pest and disease infestation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="Pest and disease infestation"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. Displacement
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="Displacement"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >h. High rates of post-harvest losses
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="High rates of post-harvest losses"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >i. High rates of spoilage
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="High rates of spoilage"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >j. Higher costs of raw materials
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="Higher costs of raw materials"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >k. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked16"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            l. Others – please explain
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 17" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >17. What is the biggest risk your business
                                poses to the environment?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Land/Soil degradation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked17"
                                    value="Land/Soil degradation"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Carbon emissions
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked17"
                                    value="Carbon emissions"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Waste deposition
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked17"
                                    value="Waste deposition"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Environmental contamination and pollution
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked17"
                                    value="Environmental contamination and pollution"
                                />
                                <span class="checkmark"></span>
                            </label>
                            e. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                            <label class="options"
                                >f. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked17"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked17"
                                    value="I don’t know."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 18" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >18. What greenhouse gas does your business emit
                                the most?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Carbon dioxide
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked18"
                                    value="Carbon dioxide"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Nitrous oxide
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked18"
                                    value="Nitrous oxide"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Methane
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked18"
                                    value="Methane"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Hydrofluorocarbons
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked18"
                                    value="Hydrofluorocarbons"
                                />
                                <span class="checkmark"></span>
                            </label>
                            e. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                            <label class="options"
                                >f. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked18"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked18"
                                    value="I don’t know."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 19" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >19. Has your business ever conducted an
                                assessment of its carbon footprint?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked19"
                                    value="Yes"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked19"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I do not understand what this means?
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked19"
                                    value="I do not understand what this means?"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked19"
                                    value="I don’t know."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 20" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >20. How do you manage/mitigate emissions in
                                your business?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I reduce my business activities.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked20"
                                    value="I reduce my business activities."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I use green solutions available from climate
                                smart practices/approach.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked20"
                                    value="I use green solutions available from climate
                                smart practices/approach."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I do not worry about emissions in my
                                business.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked20"
                                    value="I do not worry about emissions in my
                                business."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. My business has nothing to do with
                                emissions.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked20"
                                    value="My business has nothing to do with
                                emissions."
                                />
                                <span class="checkmark"></span>
                            </label>
                            e. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 21" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >21. How do you currently respond to
                                climate/environment shocks in your
                                agribusiness?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I have a plan in place to mitigate and adapt
                                to climate/environmental shocks.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked21"
                                    value="I have a plan in place to mitigate and adapt
                                to climate/environmental shocks."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I do not have a plan in place, but I have
                                some general knowledge on how to respond.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked21"
                                    value="I do not have a plan in place, but I have
                                some general knowledge on how to respond."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I do not have a plan in place, and do not
                                know how to respond.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked21"
                                    value="I do not have a plan in place, and do not
                                know how to respond."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 22" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >22. Do you know about climate smart
                                agriculture?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked22"
                                    value="Yes"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked22"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Not sure what this refers to.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked22"
                                    value="Not sure what this refers to."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 23" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >23. If yes, are you practicing any climate
                                smart approach in your business?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, I utilize various climate smart
                                approaches.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked23"
                                    value="Yes, I utilize various climate smart
                                approaches."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I do not know any/about climate smart
                                approach.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked23"
                                    value="I do not know any/about climate smart
                                approach."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I am not sure of the climate approach.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked23"
                                    value="I am not sure of the climate approach."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked23"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 24" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >24. Do you know about any climate change policy
                                in your country?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, I know a climate change policy in my
                                country.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked24"
                                    value="Yes, I know a climate change policy in my
                                country."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No, I do not know about any climate change
                                policy in my country.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked24"
                                    value="No, I do not know about any climate change
                                policy in my country."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. There is no climate change policy in my
                                country.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked24"
                                    value="There is no climate change policy in my
                                country."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 25" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >25. If yes, which climate policy do you know?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        ></div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 26" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >26. Do you grow crops or work directly with out
                                grower farmers?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked26"
                                    value="Yes"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked26"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 27" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>27. Where do you get your planting seed?</b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I plant/use reserved seeds from my crop.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked27"
                                    value="I plant/use reserved seeds from my crop."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I buy from the market.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked27"
                                    value="I buy from the market."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I make use of hybrid seeds.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked27"
                                    value="I make use of hybrid seeds."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. I multiple seeds
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked27"
                                    value="I multiple seeds"
                                />
                                <span class="checkmark"></span>
                            </label>
                            e. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 28" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >28. What factors do you consider when choosing
                                seeds for planting?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yield potential
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked28"
                                    value="Yield potential"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Disease resistance
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked28"
                                    value="Disease resistance"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Climate adaptability
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked28"
                                    value="Climate adaptability"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Drought resistance
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked28"
                                    value="Drought resistance"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Nutritional value / Quality
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked28"
                                    value="Nutritional value / Quality"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Market demand
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked28"
                                    value="Market demand"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. Cost of seeds
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked28"
                                    value="Cost of seeds"
                                />
                                <span class="checkmark"></span>
                            </label>
                            h. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                            <label class="options"
                                >i. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked28"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 29" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >29. What do you currently use to manage pest
                                and diseases on your farm?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Cultural control.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked29"
                                    value="Cultural control."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Chemical control / Inorganic pesticides.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked29"
                                    value="Chemical control / Inorganic pesticides."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Biological control / Organic pesticides.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked29"
                                    value="Biological control / Organic pesticides."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Integrated Pest Management.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked29"
                                    value="Integrated Pest Management."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. None.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked29"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            f. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 30" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >30. Do you believe that the use of pesticides
                                affects the environment, crop, and human?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked30"
                                    value="Yes"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked30"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked30"
                                    value="Not sure"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 31" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >31. Have you heard of Integrated Pest
                                Management?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, I adopt it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked31"
                                    value="Yes, I adopt it."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Yes, but I don’t use it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked31"
                                    value="Yes, but I don’t use it."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked31"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked31"
                                    value="Not sure"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 32" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >32. What are the components of regenerative
                                agriculture?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Crop rotation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked32"
                                    value="Crop rotation"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Livestock grazing/rotation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked32"
                                    value="Livestock grazing/rotation"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Composting
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked32"
                                    value="Composting"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. No tillage
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked32"
                                    value="No tillage"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Integrated Pest Management
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked32"
                                    value="Integrated Pest Management"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Agroecology and agroforestry
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked32"
                                    value="Agroecology and agroforestry"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. Cover cropping
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked32"
                                    value="Cover cropping"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >h. I do not have an idea, it’s my first-time
                                hearing about it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked32"
                                    value="I do not have an idea, it’s my first-time
                                hearing about it."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 33" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >33. Are you currently adopting regenerative
                                practices, or have you ever adopted regenerative
                                practices on your farm?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Adopted in the past.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked33"
                                    value="Adopted in the past."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Currently adopting.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked33"
                                    value="Currently adopting."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Never adopted.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked33"
                                    value="Never adopted."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Have plans to adopt.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked33"
                                    value="Have plans to adopt."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 34" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >34. Which of the following regenerative
                                practices have you adopted before or currently
                                adopting?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Crop rotation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked34"
                                    value="Crop rotation"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Livestock grazing/rotation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked34"
                                    value="Livestock grazing/rotation"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Composting
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked34"
                                    value="Composting"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. No tillage
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked34"
                                    value="No tillage"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Agroecology and agroforestry
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked34"
                                    value="Agroecology and agroforestry"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Cover cropping
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked34"
                                    value="Cover cropping"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. Carbon farming
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked34"
                                    value="Carbon farming"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >h. Not applicable
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked34"
                                    value="Not applicable"
                                />
                                <span class="checkmark"></span>
                            </label>
                            i. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 35" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >35. What are the benefits of regenerative
                                agriculture?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Replenish the soil nutrient / restoring
                                degraded soil.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked35"
                                    value="Replenish the soil nutrient / restoring
                                degraded soil."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Preserve and sustain the relationship
                                between microbial activity and soil biodiversity
                                in the ecosystem.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked35"
                                    value="Preserve and sustain the relationship
                                between microbial activity and soil biodiversity
                                in the ecosystem."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Enhance crop production.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked35"
                                    value="Enhance crop production."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Not applicable
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked35"
                                    value="Not applicable"
                                />
                                <span class="checkmark"></span>
                            </label>
                            e. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 36" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >36. What are your current challenges or
                                limitations in adopting regenerative
                                agricultural techniques in your operations?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Data
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked36"
                                    value="Data"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Finance
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked36"
                                    value="Finance"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Knowledge
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked36"
                                    value="Knowledge"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Expertise
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked36"
                                    value="Expertise"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Technology
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked36"
                                    value="Technology"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked36"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            g. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 37" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>37. Do you know what greenhouse farming is?</b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked37"
                                    value="Yes"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked37"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 38" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >38. If yes, do you agree that greenhouse
                                farming is a smart way of practicing
                                agribusiness?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked38"
                                    value="Yes"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked38"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked38"
                                    value="Not sure"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 39" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >39. Do you currently or have previously adopted
                                greenhouse farming?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked39"
                                    value="Yes"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked39"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 40" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >40. Do you know that food/crops can be grown on
                                other medium apart from the soil/ground?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Definitely
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked40"
                                    value="Definitely"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Impossible
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked40"
                                    value="Impossible"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Maybe/Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked40"
                                    value="Maybe/Not sure"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 41" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>41. Have you heard of soilless farming?</b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, I am currently practicing it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked41"
                                    value="Yes, I am currently practicing it."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Yes, I know so much about it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked41"
                                    value="Yes, I know so much about it."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Yes, a little knowledge about it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked41"
                                    value="Yes, a little knowledge about it."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked41"
                                    value="No"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 42" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >42. If yes, what type of soilless farming do
                                you know?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Hydroponics
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked42"
                                    value="Hydroponics"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Aeroponics
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked42"
                                    value="Aeroponics"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Aquaponics
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked42"
                                    value="Aquaponics"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. None.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked42"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            e. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 43" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >43. Which of the soilless farming type are you
                                currently using/adopt?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Hydroponics
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked43"
                                    value="Hydroponics"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Aeroponics
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked43"
                                    value="Aeroponics"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Aquaponics
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked43"
                                    value="Aquaponics"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Not applicable
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked43"
                                    value="Not applicable"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. None.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked43"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            f. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 44" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >44. Why is soilless farming important in this
                                time?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. To maximize/optimize land, space, and water.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked44"
                                    value="To maximize/optimize land, space, and water."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. For increased productivity and precision
                                farming
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked44"
                                    value="For increased productivity and precision
                                farming"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Urban farming (Ability to grow crops in
                                urban environment)
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked44"
                                    value="Urban farming (Ability to grow crops in
                                urban environment)"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. All year-round cultivation/farming
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked44"
                                    value="All year-round cultivation/farming"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Reduce soil-borne disease and dependent on
                                pesticides.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked44"
                                    value="Reduce soil-borne disease and dependent on
                                pesticides."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked44"
                                    value="Don’t know."
                                />
                                <span class="checkmark"></span>
                            </label>
                            g. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 45" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>45. Do you know what precision farming is?</b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, I am currently using it and familiar
                                with it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked45"
                                    value="Yes, I am currently using it and familiar
                                with it."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Yes, I have in-depth knowledge about it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked45"
                                    value="Yes, I have in-depth knowledge about it."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Yes, I have little knowledge about it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked45"
                                    value="Yes, I have little knowledge about it."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. No, I have no idea.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked45"
                                    value="No, I have no idea."
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 46" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >46. If yes, which specific precision farming
                                techniques/technologies are you currently
                                using/used on your farm/operation?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Geographical Information System (GIS)
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked46"
                                    value="Geographical Information System (GIS)"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Geographical Positioning System (GPS)
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked46"
                                    value="Geographical Positioning System (GPS)"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Remote Sensing
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked46"
                                    value="Remote Sensing"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Soil testing and yield monitoring
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked46"
                                    value="Soil testing and yield monitoring"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Aerial imagery/Drone
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked46"
                                    value="Aerial imagery/Drone"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. None.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked46"
                                    value="None."
                                />
                                <span class="checkmark"></span>
                            </label>
                            f. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 47" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >47. How do you currently measure and monitor
                                soil, and crop/plant health, nutrient need, on
                                your farm?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I depend on my previous knowledge of
                                farming.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked47"
                                    value="I depend on my previous knowledge of
                                farming."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I have a crop calendar.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked47"
                                    value="I have a crop calendar."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I just act when the need arises, or I see
                                signs on my crop.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked47"
                                    value="I just act when the need arises, or I see
                                signs on my crop."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. I depend on precision or sensor analysis.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked47"
                                    value="I depend on precision or sensor analysis."
                                />
                                <span class="checkmark"></span>
                            </label>

                            e. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 48" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >48. What are your current challenges or
                                limitations in adopting precision farming
                                techniques?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Finance
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked48"
                                    value="Finance"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Knowledge
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked48"
                                    value="Knowledge"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Expertise
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked48"
                                    value="Expertise"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Technology
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked48"
                                    value="Technology"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. None.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked48"
                                    value="None."
                                />
                                <span class="checkmark"></span>
                            </label>
                            f. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 49" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >49. Have you faced any water-related challenges
                                due to climate change in recent years?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, I have experienced drought conditions.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked49"
                                    value="Yes, I have experienced drought conditions."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Yes, I have experienced excessive
                                rainfall/flooding.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked49"
                                    value="Yes, I have experienced excessive
                                rainfall/flooding."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. No, I have not encountered any significant
                                challenges.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked49"
                                    value="No, I have not encountered any significant
                                challenges."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked49"
                                    value="Not sure"
                                />
                                <span class="checkmark"></span>
                            </label>
                            e. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="currentPage === 50" class="d-flex">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >50. How do you currently provide water on your
                                farm/production operation?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I depend on rain.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="I depend on rain."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I have a water management system in place.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="I have a water management system in place."
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            d. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 51">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >51. What type of water management system are
                                you aware of?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Rainwater harvesting
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Groundwater recharge
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Irrigation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            d. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 52">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >52.Do you practice irrigation system on your
                                farm?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 53">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >53.If yes, which of the following irrigation
                                system? (Select all that apply)</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Drip irrigation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Sprinkler irrigation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Flood Irrigation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.Centre pivot irrigation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.Furrow irrigation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f.Terraced irrigation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            d. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 54">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>54.If No, why?</b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Drip irrigation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >a.No capability
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Not interested
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.No need for it
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.No knowledge
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            d. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 55">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >55.What do you think is the benefit of
                                implementing a water management system (e.g
                                irrigation) on your production activity/ farm?
                                (Select all that apply)</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.It saves water and reduces wastage of water.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >a.No capability
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.It allows my plants/animal to have water all
                                round and I don’t have to depend on rain always.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.It preserves the soil structure.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.It allows for flexibility in my operation and
                                system.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >e.It saves time.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            d. Others
                            <input
                                style="color: #ffffff"
                                class=""
                                type="email"
                            />
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 56">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >56.Do you practice water recycling and re-use
                                on your farm?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.I have no idea water can be recycle and
                                re-use.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 57">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >57.Improper water management can cause disaster
                                like flooding, erosion?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 58">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >58.How frequently do you monitor and measure
                                the water usage on your farm?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Daily
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Weekly
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Monthly
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c.d.Rarely / Never
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 59">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >59.What is your major challenge in implementing
                                and using irrigation system on your farm?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Maintenance
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Technical know-how
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Sustainability
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >e.My farm size is small.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c.Others
                                <input type="email" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 60">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >60.Does your production facility generate
                                waste?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.I am not sure.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 61">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >61. How do you currently manage waste in your
                                operation?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I have a circularity model in my operation.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I practice zero waste.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I leave them on the farm to decompose.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d. I burn them.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >e. I have a waste storage on my farm and give
                                it to external waste disposing agency.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >f. Others
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. None
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 62">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >62.Do you believe the waste from your farm can
                                be re-used or recycled?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 63">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >63.What is your source of energy on your farm?
                                (Select all that apply)</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Fossil fuel
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Solar energy
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Inverter
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Electricity
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Biogas
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Water
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >h. Others
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 64">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >64.Do you know your daily output of carbon
                                emission due to the use of fossil fuel or the
                                amount of carbon emission saved due to use of
                                alternative energy?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.I am not concerned.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 65">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >65.Do you know that the use of fossil fuel is
                                hazardous to the environment?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Maybe
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. I don’t care.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 66">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >66.Can your operation adopt other source of
                                energy aside the use of fossil fuel?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes, currently using alternative source of
                                energy.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Yes, but not using any.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.Not sure / I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 67">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >67.Do you operate in the processing value chain
                                either primarily or secondarily?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes, primarily.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Yes, secondarily.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 68">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >68.Does your processing facility generate
                                waste?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f.I am not sure.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 69">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >69.Do you know about waste
                                recycling/circularity?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 70">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >70.How do you currently manage waste in your
                                operation?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I have a circularity model in my operation.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I practice zero waste.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. I leave them on the farm to decompose.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d. I burn them.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. I have a waste storage on my farm and give
                                it to external waste disposing agency.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. I am not concern.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >f. Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >f. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 71">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >71.Do you believe the waste from your facility
                                can be re-use or recycle?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c.I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 72">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >72.What is your source of energy on your farm?
                                (Select all that apply)</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Fossil fuel
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Solar energy
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. Inverter
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d. Electricity
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >e. Biogas
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >f. Water
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >g. Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >h. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 73">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >73.Do you know your daily output of carbon
                                emission due to the use of fossil fuel or the
                                amount of carbon emission saved due to use of
                                alternative energy?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. I am not concerned.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 74">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >74.Do you know that the use of fossil fuel is
                                hazardous to the environment?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. Maybe
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. I don’t care.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 75">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >75.Can your operation adopt other source of
                                energy aside the use of fossil fuel?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, currently using alternative source of
                                energy.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Yes, but not using any.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. Not sure / I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 76">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >76.Have you faced any water-related challenges
                                due to climate change in recent years?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes, I have experienced drought conditions.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Yes, I have experienced excessive
                                rainfall/flooding.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. No, I have not encountered any significant
                                challenges.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 77">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >77.How do you currently provide water for your
                                processing operation? (Select all that apply)</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Rain
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. River and Well
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. Borehole
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d. Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d. None
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 78">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >78.Do you have a water storage/ conservation
                                system in place?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 79">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                79.How frequently do you monitor and measure the
                                water usage on your farm?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Daily
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Weekly
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Monthly
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d. Rarely / Never
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 80">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                80.Do you operate in the packaging value chain
                                either primarily or secondarily?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes, primarily.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Yes, secondarily.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 81">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                81.How important is packaging in ensuring the
                                freshness and quality of agricultural products?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Very important
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Somewhat important
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. Neutral
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d. Not important
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 82">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                82.Which type of packaging materials do you
                                currently use? (Select all that apply)
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Plastic
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Paper
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Biodegradable materials
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d.Foils
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >e.Nylon
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >f.Sacs
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >g.None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >h.Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 83">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                83.Do you think your current packaging material
                                is sustainable and eco-friendly?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d.I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 84">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                84.If yes, how?
                                <input type="text" name="radio" />
                            </b>
                        </div>
                        <!-- <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options"
                        >a.Yes
                        <input
                                @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                        <span class="checkmark"></span>
                    </label>
                    <label class="options"
                        >b.No
                        <input
                                @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                        <span class="checkmark"></span>
                    </label>
                    <label class="options"
                        >c.Not sure
                        <input
                                @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                        <span class="checkmark"></span>
                    </label>

                    <label class="options"
                        >d.I don’t know.
                        <input
                                @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                        <span class="checkmark"></span>
                    </label>

                    
                </div> -->
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 85">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                85.How concerned are you about the environmental
                                impact of your current packaging material?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Very concern
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Neutral
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Not concern.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 86">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                86.What are the main challenges you face in the
                                packaging chain? (Select all that apply)
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Cost of packaging material
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Packaging design and functionality
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Sustainability and environmental impact
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d.Storage and transportation logistics
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >e.Compliance with regulations
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >f.None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >g.Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 87">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b> 87.Is your packaging material recyclable? </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 88">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                88.What improvements would you like to see in
                                agricultural packaging? (Select all that apply)
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Increased use of biodegradable materials
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Enhanced product protection features
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Improved labelling and information
                                transparency
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d.More efficient packaging designs for
                                transportation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 89">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                89.How important is it for packaging to provide
                                clear and accurate product information (i.e
                                origin, nutritional fact, etc)
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Very important
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Somewhat important
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Neutral
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d.Not important
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 90">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                90.Is your current packaging material providing
                                adequate product information for consumer?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.c.Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 91">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                91.How likely are you to choose packaging
                                materials with lower environmental impact, even
                                if they cost more?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Most likely
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Somewhat likely
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Neutral
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d.Not likely
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >e.Indecisive
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 92">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                92.Are you aware of any eco-friendly packaging?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 93">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                93.If yes, which of the following are you using?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Reusable packaging
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Biodegradable packaging
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Bioplastics
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.Cardboard
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.None
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 94">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>94.Do you store your produce/products? </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 95">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >95.If yes, what is your current storage
                                practice/device?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Silo
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Cribs
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. Store building
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.Underground
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.Drums
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f.Cans
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g.Bags and Sacs
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >h.Cold-room
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >i.Others
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >j.None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 96">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >96.Have you experienced any negative
                                climate/environmental impacts on your stored
                                produce/storage operation due to climate
                                change?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 97">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >97.Which climate related factors have affected
                                your storage the most?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Increased temperature
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Humidity changes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Extreme weather condition/events (storms,
                                flood, etc)
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.Pests and diseases
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f.Others
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 98">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >98.Do you use chemical or inorganic
                                preservation for use storage activity?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 99">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >99.Are you currently using any climate smart
                                storage technique/method?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 100">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>100.If yes, which</b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Temperature control
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Humidity control
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Ventilation systems
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.Insulation
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.Cold room storage
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f.Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 101">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >101.Does your storage facility generate waste
                                of any kind?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 102">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >102.How do you currently manage waste in your
                                operation?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I have a circularity model in my operation.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options">
                                b. I practice zero waste.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options">
                                c. I leave them to decompose.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. I burn them.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options">
                                e. I have a waste storage and give it to
                                external waste disposing agency.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. I am not concern.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >h. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex" v-if="currentPage === 103">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >103.Do you believe the waste from your facility
                                can be re-use or recycle?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 104">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >104.Do you know about waste
                                recycling/circularity?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 105">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >105.What is your source of energy on your farm?
                                (Select all that apply)</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Fossil fuel
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Solar energy
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Inverter
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Electricity
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Biogas
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Water
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >g. Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >h. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 106">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b
                                >106.Do you know your daily output of carbon
                                emission due to the use of fossil fuel or the
                                amount of carbon emission saved due to use of
                                alternative energy?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.I am not concern.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 107">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                107.Do you know that the use of fossil fuel is
                                hazardous to the environment?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.Maybe
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I don’t care.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 108">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                108.Can your operation adopt other source of
                                energy aside the use of fossil fuel?</b
                            >
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, currently using alternative source of
                                energy.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Yes, but not using any.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Not sure / I don’t know.

                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 109">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                109.Do you operate a personal logistics and
                                distribution chain for your business, or you use
                                third party?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, I have a personal logistics and
                                distribution chain.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.Yes, I depend on third party.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.My buyers/customer handles that.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.None

                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.Others

                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 110">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                110.If yes, what is the current logistics and
                                distribution energy use/reliance?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.I use fossil fuel vehicles like diesels and
                                petrol cars, bikes, etc
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.I use solar powered vehicles/automobiles.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c.I use electric automobiles.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d.d.Others

                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e.None

                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 111">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                111.Are there any technology innovations adopted
                                to the model?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 112">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                112.If yes, which of this technology innovations
                                are adopted to your supply/logistic chain?
                                (Select all that apply)
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Tracking device for my vehicles and goods
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Mobile App
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. Barcode Scanning
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >d. Product/goods traceability
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Others
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 113">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                113.Does your business produce food waste/loss?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 114">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                114.What percentage of your produce is wasted?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Less than 10%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. 11 – 20%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. 31 – 40%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. 41 – 50%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. Above 50%
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 115">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                115.How do you prevent or reduce food loss in
                                your operation and keep food fresh and healthy?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I have a cold-room storage and transport
                                facility.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I do no produce waste as I sell of goods
                                immediately.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I outsource and partner with cold-room
                                storage providers.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. None
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 116">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b> 116.How do you manage the generated waste? </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I recycle.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I dump them.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. I sell off.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. I am not concern and so pay no attention to
                                it.
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Others
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >f. None
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 117">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b> 117.Do you know about waste recycling? </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Yes, I use it in my business model.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Yes, but I do not use it.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >c. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 118">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                118.Do you operate in the agrifood sector as a
                                restaurant owner, chef, or cook?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes, primarily.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b.No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 119">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                119.How do you handle food waste from your
                                operations? (Select all that apply)
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. I thrash them.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. I give it out.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options">
                                c. I do not have food waste.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >d. I recycle.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >e. Others
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 120">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                120.Do you know food waste cause contamination
                                to the environment and climate?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options">
                                c. Not sure
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 121">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                121.Do you know about food recycling/food
                                transformation?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 122">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b> 122.Is your supply chain sustainable? </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options">
                                c. I don’t know.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 123">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                123.What form of technology have adopted into
                                your supply chain?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a. Mobile App
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. Tracker
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options">
                                c. Barcode Scanning
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options">
                                e. None
                                <input type="text" name="radio" />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options">
                                c. Barcode Scanning
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 124">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                124.Have you heard of carbon market/climate
                                financing/carbon credit?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>

                            <label class="options"
                                >c. It’s a myth.
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex" v-if="currentPage === 125">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                125.Have you benefited from carbon credits
                                before?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex" v-if="currentPage === 125">
            <div class="m-auto">
                <div class="container mt-sm-5 my-1">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5">
                            <b>
                                126.Do you know how to calculate your carbon
                                footprint?
                            </b>
                        </div>
                        <div
                            class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3"
                            id="options"
                        >
                            <label class="options"
                                >a.Yes
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                            <label class="options"
                                >b. No
                                <input
                                    @change="onChange($event)"
                                    type="radio"
                                    name="isChecked50"
                                    value="None"
                                />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div id="prev">
                            <button @click="goPrevious" class="btn btn-success">
                                Previous
                            </button>
                        </div>
                        <div class="ml-auto mr-sm-5">
                            <button @click="goNext" class="btn btn-success">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "LearningAssessmentView",

    data: function () {
        return {
            currentPage: 1,
            isShow: false,
            isChecked: "",
            inputValue: "",
            setValue: {},
        };
    },
    watch: {
        // isChecked(value, oldValue) {
        //     if (this.inputValue) {
        //         this.inputValue = "";
        //     }
        //     this.setValue = value;
        // },
        // inputValue(value, oldValue) {
        //     if (this.isChecked) {
        //         this.isChecked = "";
        //     }
        //     this.setValue = value;
        // },
    },
    methods: {
        goNext: function () {
            this.currentPage = this.currentPage + 1;
        },
        goPrevious: function () {
            this.currentPage = this.currentPage - 1;
        },
        onChange: function (event) {
            const { name, value } = event.target;
            this.setValue = { ...this.setValue, [name]: value };
            console.log(this.setValue);
        },
    },
};
</script>

<style scoped>
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


<template>
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-md-10">
                <p class="text-center text-medium text-inter">
                    Please note that only qualified candidates will move on to
                    the next phase.<br>
                    <span class="text-brown2">
                        Having any troubles with this application? send us your complaint and screenshots via <strong>brace@afchub.org</strong>
                    </span>
                </p>
            </div>

            <div class="col-md-10 bg-white p-5 text-center">
                <h4 class="brand-text">Application has been closed</h4>
                <p class="text-dark text-medium">
                    Are you a member of the ALX | E-learning and Assessment Portal Hub?<br>
                    if not, <a class="na-text-dark-green" href="https://afchub.org">Become a member</a>
                </p>
            </div>

<!--            <div class="col-md-10 bg-white p-5">-->
<!--                -->
<!--                <form v-if="!formSubmitted">-->
<!--                    <div class="border-radius-6 lg-padding-four-all">-->
<!--                        <div class="text-center text-danger text-medium"-->
<!--                            v-if="errors.length">-->
<!--                            <p class="text-medium mb-0" v-for="(error, index) in errors" :key="index">-->
<!--                                {{ error }}</p>-->
<!--                        </div>-->

<!--                        <div id="form1" class="form_steps">-->
<!--                            <div class="row">-->
<!--                                <div class="col-12 brand-text custom-font2 text-large font-weight-600">-->
<!--                                    <p class="brand-text-brown text-large mr-2">General Information</p>-->
<!--                                    <p class="font-weight-bold text-large"> Step 1 of 4</p>-->
<!--                                </div>-->

<!--                                &lt;!&ndash;Data Fields&ndash;&gt;-->
<!--                                <div class="col-md-4">-->
<!--                                    <label class="text-inter">-->
<!--                                        First Name-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <input v-model="form.first_name" type="text" placeholder="Enter first name"-->
<!--                                        class="input-bg" required />-->
<!--                                </div>-->

<!--                                <div class="col-md-4">-->
<!--                                    <label class="text-inter">-->
<!--                                        Last Name-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <input-->
<!--                                        v-model="form.last_name" type="text" placeholder="Enter last name"-->
<!--                                        class="input-bg" required-->
<!--                                    />-->
<!--                                </div>-->

<!--                                <div class="col-md-4">-->
<!--                                    <label class="text-inter">-->
<!--                                        Middle Name / Other Name-->
<!--                                    </label>-->
<!--                                    <input v-model="form.middle_name" type="text"-->
<!--                                        placeholder="Enter other name" class="input-bg"/>-->
<!--                                </div>-->

<!--                                <div class="col-md-4">-->
<!--                                    <label class="text-inter">-->
<!--                                        Personal Email-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <input v-model="form.email" type="text" placeholder="Enter email"-->
<!--                                        class="input-bg" required />-->
<!--                                </div>-->

<!--                                <div class="col-md-4">-->
<!--                                    <label class="text-inter">-->
<!--                                        Gender-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <select class="input-bg" v-model="form.gender">-->
<!--                                        <option value="">Select</option>-->
<!--                                        <option value="male">Male</option>-->
<!--                                        <option value="female">Female</option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="col-md-4">-->
<!--                                    <label class="text-inter">-->
<!--                                        Phone Number-->
<!--                                    </label>-->

<!--                                    <MazPhoneNumberInput-->
<!--                                        class="m-phone-number-input"-->
<!--                                        v-model="form.mobile"-->
<!--                                        show-code-on-list-->
<!--                                        color="info"-->
<!--                                        :preferred-countries="['NG', 'SA']"-->
<!--                                        :ignored-countries="['US']"-->
<!--                                        @update="results = $event"-->
<!--                                        :success="results?.isValid"-->
<!--                                    />-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Date Of Birth-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <Datepicker-->
<!--                                        class="input-bg"-->
<!--                                        v-model="form.date_of_birth"-->
<!--                                        :enable-time-picker="false"-->
<!--                                        :max-date="new Date()"-->
<!--                                        auto-apply-->
<!--                                    ></Datepicker>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Nationality-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <select v-model="form.country_id" class="input-bg" required>-->
<!--                                        <option value="">Select</option>-->
<!--                                        <option v-for="country in countries"-->
<!--                                                :key="country.id"-->
<!--                                                :value="country.id">-->
<!--                                            {{ country.country_name }}-->
<!--                                        </option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Country Of Residence-->
<!--                                    </label>-->
<!--                                    <select v-model="form.country_residence_id" class="input-bg" required>-->
<!--                                        <option value="">Select</option>-->
<!--                                        <option v-for="country in countries"-->
<!--                                                :key="country.id"-->
<!--                                                :value="country.id">-->
<!--                                            {{ country.country_name }}-->
<!--                                        </option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Highest Level Of Education-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <select v-model="form.education" class="input-bg" required>-->
<!--                                        <option value="">Select</option>-->
<!--                                        <option value="PHD">PHD</option>-->
<!--                                        <option value="Masters">Masters</option>-->
<!--                                        <option value="Bachelors">Bachelors</option>-->
<!--                                        <option value="Diploma">Diploma</option>-->
<!--                                        <option value="SSCE">SSCE</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row">-->
<!--                                <div class="col-12 justify-content-end d-flex">-->
<!--                                    <button @click.prevent="toggleFormSteps(2)" type="button"-->
<!--                                            class="btn btn-medium border-radius-4 na-bg-brown-2 text-white">Next</button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div id="form2" class="form_steps d-none">-->
<!--                            <div class="row">-->
<!--                                <div class="col-12 brand-text custom-font2 text-large font-weight-600">-->
<!--                                    <p class="brand-text-brown text-large">Business Information</p>-->
<!--                                    <p class="font-weight-bold text-large"> Step 2 of 4</p>-->
<!--                                </div>-->

<!--                                <div class="col-md-12">-->
<!--                                    <label class="text-inter">-->
<!--                                        Business Name-->
<!--                                        <span class="required font-weight-bold">*</span>-->
<!--                                    </label>-->
<!--                                    <input placeholder="Enter business name"-->
<!--                                           v-model="form.business_name"-->
<!--                                           type="text" class="input-bg" required/>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Business Email-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <input placeholder="Enter email" v-model="form.business_email"-->
<!--                                           type="text" class="input-bg" required />-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Business Location-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <select class="input-bg" v-model="form.business_country_id" required>-->
<!--                                        <option value="">Select location</option>-->
<!--                                        <option v-for="country in countries"-->
<!--                                                :key="country.id" :value="country.id">-->
<!--                                            {{ country.country_name }}-->
<!--                                        </option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Business Registered?-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <select v-model="form.business_registered" class="input-bg" required>-->
<!--                                        <option value="">Select option</option>-->
<!--                                        <option value="1">Yes</option>-->
<!--                                        <option value="2">No</option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Year of Business Operation since Incorporation</label>-->
<!--                                    <Datepicker required-->
<!--                                        class="input-bg"-->
<!--                                        v-model="form.year_of_operation"-->
<!--                                        :max-date="new Date()"-->
<!--                                        year-picker-->
<!--                                        auto-apply-->
<!--                                    ></Datepicker>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Proof of business registration/Incorporation (Document, image, 5mb Max)-->
<!--                                    </label>-->
<!--                                    <input type="file" @change="uploadDocument" class="input-bg" required>-->
<!--                                    <p v-if="documentErrorMessage !== ''" class="text-center text-danger">-->
<!--                                        {{ documentErrorMessage }}-->
<!--                                    </p>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Type of Business-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <select v-model="form.type_of_business" class="input-bg" required>-->
<!--                                        <option value="">Select option</option>-->
<!--                                        <option value="Sole Proprietorship">Sole Proprietorship</option>-->
<!--                                        <option value="Partnership">Partnership</option>-->
<!--                                        <option value="Limited Liability Company">Limited Liability Company</option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Agribusiness Sector-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <select v-model="form.agribusiness_sector" class="input-bg" required>-->
<!--                                        <option value="">Select option</option>-->
<!--                                        <option value="Crop Production">Crop Production</option>-->
<!--                                        <option value="Fishery">Fishery</option>-->
<!--                                        <option value="Animal Production">Animal Production</option>-->
<!--                                        <option value="Forestry">Forestry</option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Value Chain Operation (Farm to Fork)-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <select v-model="form.value_chain_operation" class="input-bg" required>-->
<!--                                        <option value="">Select option</option>-->
<!--                                        <option value="Production">Production</option>-->
<!--                                        <option value="Aggregation">Aggregation</option>-->
<!--                                        <option value="Processing / Packaging">Processing / Packaging</option>-->
<!--                                        <option value="Logistics / Distribution">Logistics / Distribution</option>-->
<!--                                        <option value="Retail / Marketing / Consumption">Retail/Marketing /Consumption</option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">-->
<!--                                        Business Stage-->
<!--                                        <span class="required">*</span>-->
<!--                                    </label>-->
<!--                                    <select v-model="form.business_stage" class="input-bg" required>-->
<!--                                        <option value="">Select option</option>-->
<!--                                        <option value="Ideation">Ideation</option>-->
<!--                                        <option value="launch">Launch</option>-->
<!--                                        <option value="Growth">Growth</option>-->
<!--                                        <option value="Maturity">Maturity</option>-->
<!--                                        <option value="Decline">Decline</option>-->
<!--                                    </select>-->
<!--                                </div>-->

<!--                                <div class="col-12">-->
<!--                                    <label class="text-inter">-->
<!--                                        Brief description of your business (include problem(s) that your business is addressing):-->
<!--                                        <span class="brand-text-brown">(Max 150 Words)</span>-->
<!--                                        <span class="required font-weight-bold">*</span>-->
<!--                                    </label>-->
<!--                                    <ckeditor :editor="editor" v-model="form.business_description"-->
<!--                                              :config="editorConfig" class="input-bg"></ckeditor>-->
<!--                                </div>-->

<!--                                <div class="col-12 margin-two-top">-->
<!--                                    <p class="na-text-dark-green text-medium">Current Number of Staffs</p>-->
<!--                                </div>-->

<!--                                <div class="col-md-4">-->
<!--                                    <label class="text-inter">Full-time</label>-->
<!--                                    <input v-model="form.number_of_employees_full_time"-->
<!--                                           type="number" class="input-bg" />-->
<!--                                </div>-->

<!--                                <div class="col-md-4">-->
<!--                                    <label class="text-inter">Part-time</label>-->
<!--                                    <input v-model="form.number_of_employees_part_time"-->
<!--                                           type="number" class="input-bg" />-->
<!--                                </div>-->

<!--                                <div class="col-md-4">-->
<!--                                    <label class="text-inter">Casual</label>-->
<!--                                    <input v-model="form.number_of_employees_casual"-->
<!--                                           type="number" class="input-bg" />-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row">-->
<!--                                <div class="col-6 justify-content-start d-flex">-->
<!--                                    <button @click.prevent="toggleFormSteps(1)" type="button"-->
<!--                                            class="btn btn-medium border-radius-4 na-bg-brown-2 text-white">Previous</button>-->
<!--                                </div>-->
<!--                                <div class="col-6 justify-content-end d-flex">-->
<!--                                    <button @click.prevent="toggleFormSteps(3)" type="button"-->
<!--                                            class="btn btn-medium border-radius-4 na-bg-brown-2 text-white">Next</button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div id="form3" class="form_steps d-none">-->
<!--                            <div class="row">-->
<!--                                <div class="col-12 brand-text custom-font2 text-large font-weight-600">-->
<!--                                    <p class="brand-text-brown text-large mr-2">-->
<!--                                        Online & Social Media pages (Fill the ones that apply to your business)</p>-->
<!--                                    <p class="font-weight-bold text-large mb-0"> Step 3 of 4</p>-->
<!--                                    <p class="brand-text-brown text-small">Insert full url of business page or profile. e.g https://facebook.com/business-name</p>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">Business Website</label>-->
<!--                                    <input placeholder="Enter website link" @keyup="validateUrl(form.website)"-->
<!--                                           v-model="form.website" type="text" class="input-bg mb-0" />-->
<!--                                    <span v-if="!validateUrl(form.website)" class="text-danger text-center">-->
<!--                                        Incorrect url</span>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter">Facebook Page</label>-->
<!--                                    <input placeholder="Facebook Page" @keyup="validateUrl(form.facebook)"-->
<!--                                           v-model="form.facebook" type="text" class="input-bg mb-0" />-->
<!--                                    <span v-if="!validateUrl(form.facebook)" class="text-danger text-center">-->
<!--                                        Incorrect url</span>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter mt-1">Twitter</label>-->
<!--                                    <input placeholder="Twitter Page" @keyup="validateUrl(form.twitter)"-->
<!--                                           v-model="form.twitter" type="text" class="input-bg mb-0" />-->
<!--                                    <span v-if="!validateUrl(form.twitter)" class="text-danger text-center">-->
<!--                                        Incorrect url</span>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter mt-1">Instagram</label>-->
<!--                                    <input placeholder="Enter instagram link" @keyup="validateUrl(form.instagram)"-->
<!--                                           v-model="form.instagram" type="text" class="input-bg mb-0" />-->
<!--                                    <span v-if="!validateUrl(form.instagram)" class="text-danger text-center">-->
<!--                                        Incorrect url</span>-->
<!--                                </div>-->

<!--                                <div class="col-md-6">-->
<!--                                    <label class="text-inter mt-1">Linkedin page</label>-->
<!--                                    <input placeholder="Enter linkedin link" @keyup="validateUrl(form.linkedin)"-->
<!--                                           v-model="form.linkedin" type="text" class="input-bg mb-0" />-->
<!--                                    <span v-if="!validateUrl(form.linkedin)" class="text-danger text-center">-->
<!--                                        Incorrect url</span>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row mt-2">-->
<!--                                <div class="col-6 justify-content-start d-flex">-->
<!--                                    <button @click.prevent="toggleFormSteps(2)" type="button"-->
<!--                                            class="btn btn-medium border-radius-4 na-bg-brown-2 text-white">Previous</button>-->
<!--                                </div>-->
<!--                                <div class="col-6 justify-content-end d-flex">-->
<!--                                    <button @click.prevent="toggleFormSteps(4)" type="button"-->
<!--                                            class="btn btn-medium border-radius-4 na-bg-brown-2 text-white">Next</button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div id="form4" class="form_steps d-none">-->
<!--                            <div class="row">-->
<!--                                <div class="col-12 brand-text custom-font2 text-large font-weight-600">-->
<!--                                    <p class="brand-text-brown text-large mr-2">Other Options</p>-->
<!--                                    <p class="font-weight-bold text-large"> Step 4 of 4</p>-->
<!--                                </div>-->

<!--                                <div class="col-12">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-6">-->
<!--                                            <label class="text-inter">-->
<!--                                                Have you participated in any ALX | E-learning and Assessment Portal / Nourishing Africa / Changing Narrative programs before?-->
<!--                                                <span class="required font-weight-bold">*</span>-->
<!--                                            </label>-->
<!--                                            <select v-model="form.participated_previous_program" class="input-bg" required>-->
<!--                                                <option value=""></option>-->
<!--                                                <option value="Yes">Yes</option>-->
<!--                                                <option value="No">No</option>-->
<!--                                            </select>-->
<!--                                        </div>-->

<!--                                        <div v-if="form.participated_previous_program === 'Yes'" class="col-md-6">-->
<!--                                            <label class="text-inter">If Yes, which:</label>-->
<!--                                            <input v-model="form.participated_previous_program_yes"-->
<!--                                                   type="text" class="input-bg" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-12">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-6">-->
<!--                                            <label class="text-inter">-->
<!--                                                Have you participated in any climate-related training/programs?-->
<!--                                                <span class="required font-weight-bold">*</span>-->
<!--                                            </label>-->
<!--                                            <select v-model="form.participated_climate_program" class="input-bg" required>-->
<!--                                                <option value=""></option>-->
<!--                                                <option value="Yes">Yes</option>-->
<!--                                                <option value="No">No</option>-->
<!--                                            </select>-->
<!--                                        </div>-->

<!--                                        <div v-if="form.participated_climate_program === 'Yes'" class="col-md-6">-->
<!--                                            <label class="text-inter">If Yes, which:</label>-->
<!--                                            <input v-model="form.participated_climate_program_yes"-->
<!--                                                   type="text" class="input-bg" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->

<!--                                <div class="col-12 mt-2">-->
<!--                                    <label class="text-inter">-->
<!--                                        What are your expectations from the program?-->
<!--                                        <span class="brand-text-brown">(Max 150 Words)</span>-->
<!--                                        <span class="required font-weight-bold">*</span>-->
<!--                                    </label>-->
<!--                                    <ckeditor :editor="editor" v-model="form.expectations_from_program"-->
<!--                                              :config="editorConfig" class="input-bg"></ckeditor>-->
<!--                                </div>-->

<!--                                <div class="col-12 mt-2">-->
<!--                                    <label class="text-inter">-->
<!--                                        How would the program impact your business?-->
<!--                                        <span class="brand-text-brown">(Max 150 Words)</span>-->
<!--                                        <span class="required font-weight-bold">*</span>-->
<!--                                    </label>-->
<!--                                    <ckeditor :editor="editor" v-model="form.impact_on_business"-->
<!--                                              :config="editorConfig" class="input-bg"></ckeditor>-->
<!--                                </div>-->

<!--                                <div class="col-12 mt-2">-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-md-6">-->
<!--                                            <label class="text-inter">-->
<!--                                                How did you hear about this program?-->
<!--                                                <span class="required">*</span>-->
<!--                                            </label>-->
<!--                                            <select v-model="form.how_did_you_hear" class="input-bg" required>-->
<!--                                                <option value="">Select option</option>-->
<!--                                                <option value="Instagram">Instagram</option>-->
<!--                                                <option value="Linkedin">Linkedin</option>-->
<!--                                                <option value="Twitter">Twitter</option>-->
<!--                                                <option value="Website">Website</option>-->
<!--                                                <option value="Google">Google</option>-->
<!--                                                <option value="Job Sites">Job Sites</option>-->
<!--                                                <option value="Newsletter">Newsletter</option>-->
<!--                                                <option value="Others">Others</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                        <div v-if="form.how_did_you_hear === 'Others'" class="col-md-6">-->
<!--                                            <label class="text-inter">If Others, which:</label>-->
<!--                                            <input v-model="form.how_did_you_hear_others"-->
<!--                                                   type="text" class="input-bg" />-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="row">-->
<!--                                <div class="col-6 justify-content-start d-flex">-->
<!--                                    <button @click.prevent="toggleFormSteps(3)" type="button"-->
<!--                                            class="btn btn-medium border-radius-4 na-bg-brown-2 text-white">Previous</button>-->
<!--                                </div>-->
<!--                                <div class="col-6 justify-content-end d-flex">-->
<!--                                    <button @click.prevent="submitApplication"-->
<!--                                            class="btn btn-medium border-radius-4 brand-color-bg text-white">Submit</button>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                        </div>-->

<!--                    </div>-->
<!--                </form>-->

<!--                <div v-else class="text-center custom-font2">-->
<!--                    <h3 class="brand-text">Submitted</h3>-->
<!--                    <p class="text-dark text-medium">-->
<!--                        Thank you for completing your application for ALX | E-learning and Assessment Portal (BRACE).<br><br>-->

<!--                        The AFC team will review your application and communicate with you on the next step.<br><br>-->

<!--                        Are you a member of the ALX | E-learning and Assessment Portal Hub?<br>-->
<!--                        if not, <a class="na-text-dark-green" href="https://afchub.org">Become a member</a>-->
<!--                    </p>-->
<!--                </div>-->

<!--            </div>-->

        </div>
    </div>
</template>

<script>
import { ref, reactive, onMounted, computed } from "vue";
import SweetAlertService from "../../../services/sweet-alert-service";
import axios from "axios";

// import CkEditor in current component to work
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

// Date picker
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import { addMonths, getMonth, getYear, subMonths } from 'date-fns';

// Phone number country code input
import MazPhoneNumberInput from 'maz-ui/components/MazPhoneNumberInput';

export default {
    components: {
        // Use the <ckeditor> component in this view.
        ckeditor: CKEditor.component,
        Datepicker,
        MazPhoneNumberInput
    },

    setup() {
        const results = ref();
        const countries = ref([]);
        const errors = ref([]);
        const documentErrorMessage = ref("");
        const editor = ClassicEditor;
        const editorConfig = ref({});
        const formSubmitted = ref(null);
        // Disable 12 months back from today
        const minDateCompany = computed(() => subMonths(new Date(getYear(new Date()), getMonth(new Date())), 24));
        // Disable 18 years back from today
        const minDateDob = computed(() => subMonths(new Date(getYear(new Date()), getMonth(new Date())), 216));

        const form = reactive({
            first_name: "",
            last_name: "",
            middle_name: "",
            email: "",
            mobile: "",
            gender: "",
            date_of_birth: new Date(),
            education: "",
            country_id: "",
            country_residence_id: "",

            business_name: "",
            business_email: "",
            business_country_id: "",
            business_registered: "",
            website: "",
            linkedin: "",
            twitter: "",
            instagram: "",
            facebook: "",
            year_of_operation: "",
            document: "",
            type_of_business: "",
            agribusiness_sector: "",
            value_chain_operation: "",
            business_stage: "",
            business_description: "",
            number_of_employees_full_time: "",
            number_of_employees_part_time: "",
            number_of_employees_casual: "",

            participated_previous_program: "",
            participated_previous_program_yes: "",
            participated_climate_program: "",
            participated_climate_program_yes: "",
            expectations_from_program: "",
            impact_on_business: "",
            how_did_you_hear: "",
            how_did_you_hear_others: "",
        });

        const toggleFormSteps = (number) => {
            // iterate and add hie class to all elements, then remove it from current form container
            for (let el of document.getElementsByClassName("form_steps")) {
                el.classList.add("d-none");
            }
            document.getElementById("form" + number).classList.remove("d-none");
        };

        const submitApplication = async () => {
            SweetAlertService.formLoading(Swal, "Please wait", "Submitting...");

            const formData = new FormData();
            // iterate and add form data
            Object.keys(form).forEach(function (key) {
                console.log(key); // key
                console.log(form[key]); // value
                formData.append(key, form[key]);
            });

            await axios.post("/api/application/store", formData, {
                    headers: {
                        "content-type": "multipart/form-data",
                    },
                }).then((response) => {
                    if (response.data.success) {
                        console.log(response.data.application);
                        SweetAlertService.formSuccess(Swal, "Submitted", 2500);
                        SweetAlertService.formEmpty(form);
                        formSubmitted.value = true;
                    } else {
                        if (response.data.error_message){
                            console.log(response.data.error_message);
                            SweetAlertService.formError(
                                Swal,
                                "Error occurred, please contact the administrator",
                                7000
                            );
                        }
                        if (response.data.errors.length) {
                            errors.value = response.data.errors;
                            SweetAlertService.formValidationError(
                                Swal,
                                "<p class='text-medium'>One or more fields are required, please check for missing fields at the top of the form</p>",
                                7000
                            );
                        }
                    }
            }).catch((error) => {
                console.log(error);
            });
        };

        const getCountries = async () => {
            await axios.get("/api/countries/africa").then((response) => {
                if (response.data.success) {
                    console.log(response.data.countries);
                    countries.value = response.data.countries;
                } else {
                    console.log(response.data.message);
                }
            }).catch((error) => {
                console.log(error);
            });
        };

        const uploadDocument = (event) => {
            validateDocument(event);
            //Assign image and path to this variable
            form.document = event.target.files[0];
        };

        const validateDocument = (event) => {
            // Validate Image
            let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.docx|\.pdf|\.doc)$/i;
            if (!allowedExtensions.exec(event.target.files[0].name)) {
                documentErrorMessage.value = "Incorrect document format";
                console.log(documentErrorMessage.value);
                form.document = null;
                return false;
            } else {
                documentErrorMessage.value = "";
            }

            if (event.target.files[0].size > 5000000) {
                documentErrorMessage.value = "File too large, 5mb max.";
                form.document = null;
                return false;
            } else {
                documentErrorMessage.value = "";
            }
        };

        const validateUrl = (url) => {
            return !(url !== '' && !urlValidation(url));
        }

        const urlValidation = (urlString) => {
            const urlPattern = new RegExp('^(https?:\\/\\/)?' + // validate protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // validate domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))' + // validate OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // validate port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?' + // validate query string
                '(\\#[-a-z\\d_]*)?$', 'i'); // validate fragment locator
            return !!urlPattern.test(urlString);
        }

        onMounted(() => {
            getCountries();
        });

        return {
            results,
            form,
            errors,
            countries,
            documentErrorMessage,
            editor,
            editorConfig,
            formSubmitted,
            minDateCompany,
            minDateDob,

            submitApplication,
            getCountries,
            toggleFormSteps,
            uploadDocument,
            validateDocument,
            urlValidation,
            validateUrl,
        };

    },
};
</script>

<style scoped>
/*
Enter and leave animations can use different
durations and timing functions.
*/
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}

.m-phone-number-input{
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    border: #060 2px solid;
    border-radius: 8px;
}
</style>

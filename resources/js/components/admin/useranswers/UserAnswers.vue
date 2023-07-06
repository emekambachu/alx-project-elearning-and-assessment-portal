<template>
    <h4 class="content-header">Arthur Orduh</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <!-- <form @submit.prevent="searchApplications" style="margin-bottom: 4px;">
                    <div class="row p-3">
                        <div class="col-12">
                            <h5 class="text-left">Search and filter</h5>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <label>Name/Email</label>
                            <input class="form-control" type="text" v-model="form.term">
                        </div>
                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <label>Country</label>
                            <select v-model="form.country_id" class="form-control">
                                <option value="">Select</option>
                                <option v-for="country in countries"
                                        :key="country.id"
                                        :value="country.id">{{ country.country_name }}</option>
                            </select>
                        </div>

                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <label>Selected</label>
                            <select v-model="form.selected" class="form-control">
                                <option value="">Select</option>
                                <option value="selected">Selected applicants</option>
                                <option value="all">All applicants</option>
                            </select>
                        </div>

                        <div class="col-md-3" style="margin-bottom: 10px;">
                            <label>Date of Birth (Start)</label>
                            <input v-model="form.dob_start" class="form-control" type="date">
                        </div>

                        <div class="col-md-3" style="margin-bottom: 10px;">
                            <label>Date of Birth (End)</label>
                            <input v-model="form.dob_end" class="form-control" type="date">
                        </div>

                        <div class="col-md-3" style="margin-bottom: 10px;">
                            <label>Application Date (Start)</label>
                            <input v-model="form.application_date_start" class="form-control" type="date">
                        </div>

                        <div class="col-md-3" style="margin-bottom: 10px;">
                            <label>Application Date (End)</label>
                            <input v-model="form.application_date_end" class="form-control" type="date">
                        </div>

                        <div class="col-md-12 d-flex justify-content-center"
                             style="margin-bottom: 10px;">
                            <button type="submit" class="btn btn-info btn-md mr-2">
                                Search <i class="fa fa-search"></i></button>

                            <a :href="'/admin/applications/export/' + JSON.stringify(form)"
                               :download="'/admin/applications/export/' + JSON.stringify(form)">
                                <button type="button" class="btn btn-warning btn-md">
                                    Export <i class="fa fa-download"></i>
                                </button>
                            </a>
                        </div>

                    </div>
                </form> -->

                <div class="card-body">
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered small table-hover table-responsive-sm mb-0">
                                <thead>
                                <tr>
                                    <th class="border-top-0">Question No</th>
                                    <th class="border-top-0">Option Answers</th>
                                    <th class="border-top-0">Other Answers</th>
                                </tr>
                                </thead>
                                <tbody>

                                <template v-if="dataLoaded">
                                    <user-answers-table
                                        v-for="userAnswer in userAnswers"
                                        :key="userAnswer.id"
                                        :userAnswer="userAnswer"
                                    ></user-answers-table>
                                </template>

                                <tr v-else>
                                    <td colspan="3">
                                        <content-loader
                                            :animate="true"
                                            :speed="2"
                                            width={1500}
                                            height={400}
                                            viewBox="0 0 1500 400"
                                            backgroundColor="#f3f3f3"
                                            foregroundColor="#ecebeb"
                                        >
                                            <rect x="27" y="139" rx="4" ry="4" width="20" height="20" />
                                            <rect x="67" y="140" rx="10" ry="10" width="85" height="19" />
                                            <rect x="188" y="141" rx="10" ry="10" width="169" height="19" />
                                            <rect x="402" y="140" rx="10" ry="10" width="85" height="19" />
                                            <rect x="523" y="141" rx="10" ry="10" width="169" height="19" />
                                            <rect x="731" y="139" rx="10" ry="10" width="85" height="19" />
                                            <rect x="852" y="138" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1424" y="137" rx="10" ry="10" width="68" height="19" />
                                            <rect x="26" y="196" rx="4" ry="4" width="20" height="20" />
                                            <rect x="66" y="197" rx="10" ry="10" width="85" height="19" />
                                            <rect x="187" y="198" rx="10" ry="10" width="169" height="19" />
                                            <rect x="401" y="197" rx="10" ry="10" width="85" height="19" />
                                            <rect x="522" y="198" rx="10" ry="10" width="169" height="19" />
                                            <rect x="730" y="196" rx="10" ry="10" width="85" height="19" />
                                            <rect x="851" y="195" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="1456" cy="203" r="12" />
                                            <rect x="26" y="258" rx="4" ry="4" width="20" height="20" />
                                            <rect x="66" y="259" rx="10" ry="10" width="85" height="19" />
                                            <rect x="187" y="260" rx="10" ry="10" width="169" height="19" />
                                            <rect x="401" y="259" rx="10" ry="10" width="85" height="19" />
                                            <rect x="522" y="260" rx="10" ry="10" width="169" height="19" />
                                            <rect x="730" y="258" rx="10" ry="10" width="85" height="19" />
                                            <rect x="851" y="257" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="1456" cy="265" r="12" />
                                            <rect x="26" y="316" rx="4" ry="4" width="20" height="20" />
                                            <rect x="66" y="317" rx="10" ry="10" width="85" height="19" />
                                            <rect x="187" y="318" rx="10" ry="10" width="169" height="19" />
                                            <rect x="401" y="317" rx="10" ry="10" width="85" height="19" />
                                            <rect x="522" y="318" rx="10" ry="10" width="169" height="19" />
                                            <rect x="730" y="316" rx="10" ry="10" width="85" height="19" />
                                            <rect x="851" y="315" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="1456" cy="323" r="12" />
                                            <rect x="26" y="379" rx="4" ry="4" width="20" height="20" />
                                            <rect x="66" y="380" rx="10" ry="10" width="85" height="19" />
                                            <rect x="187" y="381" rx="10" ry="10" width="169" height="19" />
                                            <rect x="401" y="380" rx="10" ry="10" width="85" height="19" />
                                            <rect x="522" y="381" rx="10" ry="10" width="169" height="19" />
                                            <rect x="730" y="379" rx="10" ry="10" width="85" height="19" />
                                            <rect x="851" y="378" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="1456" cy="386" r="12" />
                                            <rect x="978" y="138" rx="10" ry="10" width="169" height="19" />
                                            <rect x="977" y="195" rx="10" ry="10" width="169" height="19" />
                                            <rect x="977" y="257" rx="10" ry="10" width="169" height="19" />
                                            <rect x="977" y="315" rx="10" ry="10" width="169" height="19" />
                                            <rect x="977" y="378" rx="10" ry="10" width="169" height="19" />
                                            <rect x="1183" y="139" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1182" y="196" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1182" y="258" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1182" y="316" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1182" y="379" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1305" y="137" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1304" y="194" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1304" y="256" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1304" y="314" rx="10" ry="10" width="85" height="19" />
                                            <rect x="1304" y="377" rx="10" ry="10" width="85" height="19" />
                                            <circle cx="37" cy="97" r="11" />
                                            <rect x="26" y="23" rx="5" ry="5" width="153" height="30" />
                                            <circle cx="1316" cy="88" r="11" />
                                            <rect x="1337" y="94" rx="0" ry="0" width="134" height="3" />
                                            <circle cx="77" cy="96" r="11" />
                                        </content-loader>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
import UserAnswersTable from "./UserAnswersTable";
import LaravelVuePagination from 'laravel-vue-pagination';
import {
    ContentLoader,
    BulletListLoader,
    ListLoader,
} from 'vue-content-loader';

// import {ref, reactive, onMounted} from 'vue';
import axios from "axios";

export default {
    components: {
        UserAnswersTable,
        LaravelVuePagination,
        ContentLoader,
        BulletListLoader,
        ListLoader,
    },
    data() {
        return {
            userAnswers: [],
            dataLoaded: false,
            userId: null
        };
    },

    methods: {
        async getAnswers(id) {
            try {
                const response = await axios.get(`https://brace.afchub.org/api/user-answer_byid/${id}`, { headers: { "Content-Type": "application/json", Accept: "application/json"}})
                // const response = await axios.get(
                //     `${process.env.MIX_BASE_URL}/user-answers/${id}`,
                //     { headers: { "Content-Type": "application/json", Accept: "application/json"}}
                // );
                this.userAnswers = await response.data;
                console.log(this.userAnswers);
                this.dataLoaded = true
            } catch (error) {}
        },

    },
    created() {
        console.log(this.$route.params.id);
        this.getAnswers(this.$route.params.id);
        this.userId = this.$route.params.id;
    },
    mounted() {

    },
}
</script>

<style scoped>

</style>

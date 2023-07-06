<template>
    <h4 class="content-header">Arthur Orduh</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row px-3 pt-3">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <h5 class="text-left">Search and filter</h5>
                        <button @click="getDiagnosticTools">Refresh</button>
                    </div>
                </div>

                <form  @submit.prevent="handleEdit" style="margin-bottom: 4px;">
                    <div class="row p-3">
                        <div class="col-md-12" style="margin-bottom: 10px;">
                            <label>Question</label>
                            <input v-model="diagnosticQuests.question" class="form-control" type="text">
                        </div>
                        <div class="col-md-12" style="margin-bottom: 10px;">
                            <label>Question Options</label>
                            <textarea rows="2" v-model="diagnosticQuests.options" class="form-control" type="text"></textarea>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <label>Has Other Option</label>
                            <select v-model="diagnosticQuests.input_text" class="form-control">
                                <option value="radio_option"></option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <label>Question Format</label>
                            <select v-model="diagnosticQuests.question_formate" class="form-control">
                                <option value="radio_option">Radio option</option>
                                <option value="check_box_option">Checkbox option</option>
                                <option value="input_text_option">Input text</option>
                            </select>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <label>Has Condition</label>
                            <select v-model="diagnosticQuests.is_condition" class="form-control">
                                <option value="radio_option"></option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <label>Condition</label>
                            <select v-model="diagnosticQuests.condition" class="form-control">
                                <option value="">Select</option>
                                <option v-for="(answer_option, index) of answereOptions(diagnosticQuests.options)" :key="index">
                                    {{ answer_option}}
                                </option>
                            </select>
                        </div>

                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <label>Condition Value</label>
                            <input v-model="diagnosticQuests.condition_value" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="pl-3">
                        <button v-if="isLoading" class="btn btn-loading"> Loading... </button>
                        <button v-else class="edit-btn">Create/Edit</button>
                    </div>
                </form>
                <div class="card-body">
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered small table-hover table-responsive-sm mb-0">
                                <thead>
                                <tr>
                                    <th class="border-top-0">Quest No</th>
                                    <th class="border-top-0">Question</th>
                                    <th class="border-top-0">Option Answers</th>
                                    <th class="border-top-0">Question Format</th>
                                </tr>
                                </thead>
                                <tbody>

                                <template v-if="dataLoaded">
                                    <diagnostic-quest-table
                                        v-for="(diagnosticTool, index) in diagnosticTools"
                                        :key="diagnosticTool.id"
                                        :index="index"
                                        :diagnosticTool="diagnosticTool"
                                        @custom-event="handleEvent"
                                        :getDiagnosticTools="getDiagnosticTools"
                                    ></diagnostic-quest-table>
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
import DiagnosticQuestTable from "./DiagnosticQuestTable.vue";
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
        DiagnosticQuestTable,
        LaravelVuePagination,
        ContentLoader,
        BulletListLoader,
        ListLoader,
    },
    data() {
        return {
            diagnosticTools: [],
            dataLoaded: false,
            totalQuestions: 0,
            questId: null,
            selectedOptions: [],
            isLoading: false,
            diagnosticQuests: {
                question_formate: "",
                question: "",
                options: "",
                input_text: "",
                is_condition: "",
                condition: "",
                condition_value: "",
            }
        };
    },
    computed: {
        squaredNumber() {
            // console.log(typeof Object.values(this.diagnosticQuests.options))
            // return Object.values(this.diagnosticQuests.options).join('|').replace(/,/g, '|');
            // return Object.values(this.diagnosticQuests.options).replace(/,/g, '|');
            // return this.answereOptions(this.diagnosticQuests.options);
        }
    },
    watch: {
        questId(newValue, oldValue) {
            this.getDiagnosticQuest(newValue)
        }
    },
    methods: {
        handleEvent(value) {
            this.questId = value;
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        },
        answereOptions: function (value) {
            // return value;
            return typeof value === 'string' ? value.split("|") : value;
        },
        async getDiagnosticTools() {
            try {
                const response = await axios.get('https://brace.afchub.org/api/learning/diagnostic-tool', { headers: { "Content-Type": "application/json", Accept: "application/json"}})
                // const response = await axios.get(
                //     `${process.env.MIX_BASE_URL}/learning/diagnostic-tool`,
                //     { headers: { "Content-Type": "application/json", Accept: "application/json"}}
                // );
                this.diagnosticTools = await response.data.fetch_questions;
                this.totalQuestions = await response.data.total_count;
                this.dataLoaded = true
            } catch (error) {}
        },

        async getDiagnosticQuest() {
            console.log(this.questId)
            try {
                const response = await axios.get(`https://brace.afchub.org/api/diagnostic-question/${this.questId}`, { headers: { "Content-Type": "application/json", Accept: "application/json"}})
                // const response = await axios.get(
                //     `${process.env.MIX_BASE_URL}/diagnostic-question/${this.questId}`,
                //     { headers: { "Content-Type": "application/json", Accept: "application/json"}}
                // );
                this.diagnosticQuests = await response.data;
                console.log(this.diagnosticQuests);

            } catch (error) {}
        },
        async handleEdit() {
            this.isLoading = true;
            try {
                await axios.post(`https://brace.afchub.org/api/create_question`, this.diagnosticQuests, { headers: { "Content-Type": "application/json", Accept: "application/json"}})
                // const response = await axios.post(
                //     `${process.env.MIX_BASE_URL}/create_question`,
                //     this.diagnosticQuests,
                //     { headers: { "Content-Type": "application/json",  Accept: "application/json"}}
                // );

                // console.log("hello", response.data)
                this.isLoading = false;
                this.getDiagnosticTools();
                this.clearAll()
            } catch (error) {
                this.isLoading = false;
                this.clearAll()
            }
        },
        clearAll: function () {
            this.diagnosticQuests.question = "";
            this.diagnosticQuests.options = "";
            this.diagnosticQuests.input_text = "";
            this.diagnosticQuests.is_condition = "";
            this.diagnosticQuests.condition = "";
            this.diagnosticQuests.condition_value = "";
        },
    },
    created() {
        this.getDiagnosticTools();
    },
}
</script>

<style scoped>
.edit-btn {
    background: green;
    margin-right: 10px;
    color: #ffffff;
}
.delete-btn {
    background: red;
    color: #ffffff;
}
button {
    outline: none;
    border: none;
    background: #006600;
    color: #ffffff;
    padding: 5px 20px;
    border-radius: 6px;
}
.btn-loading {
    padding: 5px 25px;
    color: red;
    background-color: #dfecdf;
}
</style>

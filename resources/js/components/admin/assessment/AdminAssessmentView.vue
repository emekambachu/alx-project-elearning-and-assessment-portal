<script setup>
import {ref, reactive, onBeforeMount} from 'vue';
    import axios from "axios";
    import AdminAssessmentItem from "../assessment/AdminAssessmentItem.vue";
    import LaravelVuePagination from 'laravel-vue-pagination';
    import {
        ContentLoader,
        BulletListLoader,
        ListLoader,
    } from 'vue-content-loader';

    const form = reactive({
        terms: '',
        start_date: '',
        end_date: '',
    });

    const users = ref([]);
    const total = ref(0);
    const dataLoaded = ref(false);
    const searchActive = ref(false);
    const search_values = ref([]);

    const getUsers = (page = 1) => {
        searchActive.value = false;
        dataLoaded.value = false;
        axios.get('/api/admin/users/selected/assessments?page=' + page, {
            // withCredentials: true,
            headers: {
                "Authorization" : "Bearer " + localStorage.getItem('learning-admin-tk'),
                'Accept' : 'application/json',
            },
        }).then((response) => {
            if(response.data.success === true){
                users.value = response.data.users;
                total.value = response.data.total;
            }else{
                console.log(users.value);
            }
            dataLoaded.value = true;
            console.log(users.value);
        }).catch((error) => {
            console.log(error);
        });
    }

    const searchUsers = (page = 1) => {
        // On submit, make search active, turn on div load and empty current logins array
        users.value = [];
        searchActive.value = true;
        dataLoaded.value = false;

        axios.post('/api/admin/users/selected/assessments?page=' + page, form, {
            // withCredentials: true,
            headers: {
                "Authorization" : "Bearer " + localStorage.getItem('learning-admin-tk'),
                'Accept' : 'application/json',
            },
        }).then((response) => {
            if(response.data.success === true){
                users.value = response.data.users;
                total.value = response.data.total;
                search_values.value = response.data.search_values;
            }else{
                console.log(response.data.message);
            }
            dataLoaded.value = true;
            console.log(dataLoaded.value);
        }).catch((error) => {
            console.log(error);
        });
    }

    onBeforeMount(() => {
        getUsers();
    });

</script>

<template>
    <div class="row">
        <div class="col-12">
            <h4 class="content-header">BRACE | Assessments</h4>
        </div>

        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-stretch">
                        <div class="p-2">
                            <i class="fa fa-user font-large-2 text-success"></i>
                        </div>
                        <div class="p-2 media-body">
                            <h6>Total</h6>
                            <h5 class="text-bold-400 mb-0">{{ total }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--        <div class="col-xl-3 col-lg-6 col-12">-->
<!--            <div class="card">-->
<!--                <div class="card-body">-->
<!--                    <div class="media align-items-stretch">-->
<!--                        <div class="p-2">-->
<!--                            <i class="fa fa-user font-large-2 text-success"></i>-->
<!--                        </div>-->
<!--                        <div class="p-2 media-body">-->
<!--                            <h6>Total Selected</h6>-->
<!--                            <h5 class="text-bold-400 mb-0">{{ totalSelected }}</h5>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <form @submit.prevent="searchUsers" style="margin-bottom: 4px;">
                    <div class="row p-3">
                        <div class="col-12">
                            <h5 class="text-left">Search and filter</h5>
                        </div>

                        <div class="col-md-6" style="margin-bottom: 10px;">
                            <label>Name/Email</label>
                            <input class="form-control" type="text" v-model="form.term">
                        </div>

                        <div class="col-md-3" style="margin-bottom: 10px;">
                            <label>Start Date</label>
                            <input v-model="form.start_date" class="form-control" type="date">
                        </div>

                        <div class="col-md-3" style="margin-bottom: 10px;">
                            <label>End Date</label>
                            <input v-model="form.end_date" class="form-control" type="date">
                        </div>

                        <div class="col-md-12 d-flex justify-content-center"
                             style="margin-bottom: 10px;">
                            <button type="submit" class="btn btn-info btn-md mr-2">
                                Search <i class="fa fa-search"></i></button>
                            <!--convert form inputs object to json string and pass with url-->
                            <a :href="'/admin/users/assessment/export/' + JSON.stringify(form)"
                               :download="'/admin/users/assessment/export/' + JSON.stringify(form)">
                                <button type="button" class="btn btn-warning btn-md">
                                    Export <i class="fa fa-download"></i>
                                </button>
                            </a>
                        </div>

                    </div>
                </form>

                <div class="card-body">
                    <div v-if="searchActive && dataLoaded" class="card-block">
                        <h5 v-if="users.length > 0">
                            {{ total }} result(s) for
                            <span v-for="(value, index) in search_values" :key="index">
                                    <!--Get value from each object-->
                                    "{{ value }}",</span>
                        </h5>
                        <h5 v-else>
                            {{ total }} result(s) for
                            <span v-for="(value, index) in search_values" :key="index">
                                    <!--Get value from each object-->
                                    "{{ value }}",</span>
                        </h5>

                        <a class="btn btn-rounded btn-outline-success font-weight-bold mr-1"
                           @click.prevent="getUsers">
                            Back to Users</a>
                    </div>

                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered small table-hover table-responsive-sm mb-0">
                                <thead>
                                <tr>
                                    <th class="border-top-0">Bio</th>
                                    <th class="border-top-0">Assessments</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <template v-if="users">
                                    <admin-assessment-item
                                        v-for="user in users.data"
                                        :key="user.id"
                                        :user="user"
                                    ></admin-assessment-item>
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

    <laravel-vue-pagination v-if="!searchActive"
                            class="justify-content-center"
                            :limit="3"
                            :data="users"
                            @pagination-change-page="getUsers"
    >
        <template #prev-nav>
            <span>&lt; Previous</span>
        </template>
        <template #next-nav>
            <span>Next &gt;</span>
        </template>
    </laravel-vue-pagination>

    <laravel-vue-pagination v-if="searchActive"
                            class="justify-content-center"
                            :limit="3"
                            :data="users"
                            @pagination-change-page="searchUsers"
    >
        <template #prev-nav>
            <span>&lt; Previous</span>
        </template>
        <template #next-nav>
            <span>Next &gt;</span>
        </template>
    </laravel-vue-pagination>
</template>

<style scoped>

</style>

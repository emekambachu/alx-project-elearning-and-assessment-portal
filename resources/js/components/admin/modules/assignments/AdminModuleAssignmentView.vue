<template>

    <div>
        <div class="row">
            <div class="col-12">
                <h4 class="content-header">Assignments | {{ module.title }}</h4>
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
        </div>

        <div class="row">
            <div class="col-12 justify-content-center d-flex">
                <button class="btn btn-md btn-info" @click.prevent="isOpen = true">
                    Add assignment to this module
                </button>
            </div>
        </div>

        <Teleport to="section">
            <admin-module-assignment-form
                :open="isOpen"
                :module="module"
                @emitting-close-modal="closeModal"
                @emitting-submitted-assignment="submittedAssignment"
            ></admin-module-assignment-form>
        </Teleport>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered small table-hover table-responsive-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <template v-if="dataLoaded">
                                        <admin-module-assignment-item
                                            v-for="assignment in assignments"
                                            :key="assignment.id"
                                            :assignment="assignment"
                                            :module="module"
                                        ></admin-module-assignment-item>
                                    </template>

                                    <tr v-else>
                                        <td colspan="2">
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
                                :data="assignments"
                                @pagination-change-page="getAssignments"
        >
            <template #prev-nav>
                <span>&lt; Previous</span>
            </template>
            <template #next-nav>
                <span>Next &gt;</span>
            </template>
        </laravel-vue-pagination>

    </div>

</template>

<script>
import AdminModuleAssignmentForm from "./AdminModuleAssignmentForm.vue";
import AdminModuleAssignmentItem from "./AdminModuleAssignmentItem.vue";
import LaravelVuePagination from 'laravel-vue-pagination';
import {
    ContentLoader,
    BulletListLoader,
    ListLoader,
} from 'vue-content-loader';

import {ref, reactive, onMounted, watch, onBeforeMount} from 'vue';
import {useRoute} from "vue-router";
import axios from "axios";

export default {
    components: {
        AdminModuleAssignmentForm,
        AdminModuleAssignmentItem,
        LaravelVuePagination,
        ContentLoader,
        BulletListLoader,
        ListLoader,
    },

    setup(){
        // For routing with params
        const id = ref('');
        const route = useRoute();
        id.value = route.params.id;
        watch(
            () => route.params.id,
            () => {
                id.value = route.params.id;
            },
        );

        const module = ref({});
        const assignments = ref([]);
        const total = ref(0);
        const dataLoaded = ref(false);
        const searchActive = ref(false);
        const search_values = ref([]);
        const isOpen = ref(false);

        const closeModal = () => {
            isOpen.value = false;
        }

        const submittedAssignment = (event) => {
            console.log(event);
            assignments.value.unshift(event);
        }

        const getAssignments = (page = 1) => {
            searchActive.value = false;
            dataLoaded.value = false;
            axios.get('/api/admin/module/assignments', {
                withCredentials: true,
                headers: {
                    "Authorization" : "Bearer " + localStorage.getItem('afc-admin-tk'),
                    'Accept' : 'application/json',
                },
                params: {
                    module_id: id.value
                }
            }).then((response) => {
                if(response.data.success === true){
                    assignments.value = response.data.assignments;
                    module.value = response.data.module;
                    total.value = response.data.total;
                }else{
                    console.log(response.data.message);
                    console.log(response.data.error_message);
                }
                dataLoaded.value = true;
            }).catch((error) => {
                console.log(error);
            });
        }

        onBeforeMount(() => {
            getAssignments();
            console.log(route.params.id);
        });

        return {
            id,
            route,
            assignments,
            module,
            total,
            dataLoaded,
            searchActive,
            search_values,
            isOpen,

            closeModal,
            submittedAssignment,
            getAssignments,
        }
    }

}
</script>

<style scoped>

</style>

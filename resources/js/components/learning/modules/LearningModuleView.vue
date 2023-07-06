<template>
    <div class="row mt-5">
        <div class="col-12">
            <p><span class="text-light-grey">Dashboard</span> / <span class="text-dark">Modules</span></p>
            <h2 class="text-orange float-left">Modules</h2>
        </div>

        <learning-module-item
            v-for="module in modules" :key="module.id"
            :module="module"
            :min_module="min_module_sort"
        ></learning-module-item>
    </div>
</template>

<script>
import {ref, onMounted, onBeforeMount} from 'vue';
import LearningModuleItem from "./LearningModuleItem.vue";
import RouteService from "../../../services/route-service";

export default {
    components: {
        LearningModuleItem
    },

    setup(){
        const modules = ref([]);
        const min_module_sort = ref(0);

        const getModules = async () => {
            // Get token from local storage
            let token = localStorage.getItem('brace-learning-tk');
            axios.get('/api/learning/modules', {
                // Make "true" if not using external API
                withCredentials: true,
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
            }).then((response) => {
                if (response.data.success) {
                    modules.value = response.data.modules;
                    min_module_sort.value = response.data.min_module_sort;
                    // console.log(response.data.modules);
                    // console.log(response.data.min_module_sort);
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        onBeforeMount(() => {
            RouteService.completedDiagnosticTool(localStorage.getItem('brace-learning-tk'));
            getModules();
        });

        return {
            modules,
            min_module_sort,

            getModules,
        }
    }
}
</script>

<style scoped>

</style>

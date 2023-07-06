<template>
    <!--If first module-->
    <template v-if="module.status === 1">
        <div class="col-md-6" v-if="module.sort === minModule">
            <div class="module-preview-box mr-2">
                <div class="row module-preview-inner">
                    <div class="col-12 justify-content-center d-flex">
                        <router-link
                            exact
                            :to="{name: 'LearningCourseView', params: { id: module.id }}">
                            <h5 class="text-inter na-text-dark-green">{{ module.title }}</h5>
                            <img class="module-grid-image" :src="module.image"/>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <!--If not first module and previous module has been completed-->
        <div class="col-md-6" v-else-if="module.sort !== minModule && module.previous_module_completed">
            <div class="module-preview-box mr-2">
                <div class="row module-preview-inner">
                    <div class="col-12 justify-content-center d-flex">
                        <router-link
                            exact
                            :to="{name: 'LearningCourseView', params: { id: module.id }}">
                            <h5 class="text-inter na-text-dark-green">{{ module.title }}</h5>
                            <img class="module-grid-image" :src="module.image"/>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>

        <!--If not first module and previous module has been not completed-->
        <div class="col-md-6" v-else-if="module.sort !== minModule && !module.previous_module_completed">
            <div class="module-preview-box mr-2">
                <div class="row module-preview-inner opacity50">
                    <div class="col-11 na-text-dark-green pb-1">
                        <!--if this is not the first module, check if the previous module has been completed-->
                        <!--Lock this module/show lock icon if previous module has not been completed-->
                        <h5 class="text-inter na-text-dark-green">{{ module.title }}</h5>
                    </div>
                    <div class="col-1">
                        <span class="material-symbols-outlined float-right">lock</span>
                    </div>
                    <div class="col-12">
                        <img class="module-grid-image" :src="module.image"/>
                    </div>
                </div>
            </div>
        </div>
    </template>

</template>

<script>
import {ref} from 'vue';
export default {
    props: {
        module: Object,
        min_module: Number,
    },

    setup(props, context) {
        const module = ref(props.module);
        const minModule = ref(props.min_module);
        const courses = ref(props.module.courses);
        const moreCourses = ref(false);

        return {
            module,
            minModule,
            courses,
            moreCourses,
        }
    },

}
</script>

<style scoped>
/*
  Enter and leave animations can use different
  durations and timing functions.
*/
.slide-fade-enter-active {
    transition: all 0.4s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.2s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}
</style>


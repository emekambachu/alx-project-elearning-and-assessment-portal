<template>
    <div class="row module-preview-inner">
        <div class="col-2 pt-2">
            <span class="material-symbols-outlined text-dark">play_circle</span>
        </div>
        <div class="col-8">
            <p class="text-dark">{{ course.title }}</p>
        </div>
        <div class="col-2 pt-2">
            <p class="text-success">10:20</p>
        </div>
    </div>

    <div class="row module-preview-inner">
        <div class="col-2 pt-2">
            <span class="material-symbols-outlined">border_color</span>
        </div>
        <div class="col-8">
            <p class="text-dark">Assignment</p>
        </div>
        <div class="col-2">
            <p></p>
        </div>
    </div>
</template>

<script>
export default {
    name: "LearningCourseItem"
}
</script>

<style scoped>

</style>

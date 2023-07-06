<script setup>

</script>

<template>

    <div class="row mt-5">
        <div class="col-12">
            <p><span class="text-light-grey">Dashboard</span> / <span class="text-dark">Self Help Videos</span></p>
            <h2 class="text-orange float-left">Self Help Videos</h2>
        </div>
    </div>

    <div class="row justify-content-center d-flex">
        <div class="col-md-9 mb-5">
            <h4 class="text-navy-blue text-inter">Introduction</h4>
            <div style="padding:54.47% 0 0 0;position:relative;">
                <iframe src="https://player.vimeo.com/video/836196324?h=b7111594ac&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="BRACE - Introduction"></iframe>
            </div>
        </div>

        <div class="col-md-9 mb-5">
            <h4 class="text-navy-blue text-inter">Onboarding Session</h4>
            <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/840187561?h=7d9e021653&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="BRACE - Onboarding Session"></iframe></div>
        </div>

        <div class="col-md-9 mb-5">
            <h4 class="text-navy-blue text-inter">Diagnostic Tool Onboarding</h4>
            <div style="padding:54.47% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/840073399?h=466a1bbad7&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="BRACE - Diagnostic Tool - Onboarding"></iframe></div>
        </div>

        <div class="col-md-9 mb-5">
            <h4 class="text-navy-blue text-inter">Portal Onboarding</h4>
            <div style="padding:54.47% 0 0 0;position:relative;">
                <iframe src="https://player.vimeo.com/video/839798218?h=9bd56dfea2&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="BRACE - Portal Onboarding"></iframe>
            </div>
        </div>

        <!--Include vimeo embed script as component-->
        <component
            src="https://player.vimeo.com/api/player.js"
            :is="'script'"
        ></component>
    </div>



</template>

<style scoped>

</style>

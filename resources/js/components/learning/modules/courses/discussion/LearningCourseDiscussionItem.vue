<script setup>
import {onBeforeMount, ref} from "vue";
    import axios from "axios";

    const props = defineProps([
        'comment',
        'course_id',
    ]);

    const comment = ref(props.comment);
    const course_id = ref(props.course_id);
    const liked = ref(false);
    const likes = ref(props.comment.likes);
    const moreComment = ref(false);

    const likeComment = () => {
        // Get token from local storage
        let token = localStorage.getItem('brace-learning-tk');
        let data = {
            course_id: course_id.value,
            comment_id: comment.value.id,
        }
        axios.post('/api/learning/course/discussion/like', data, {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },

        }).then((response) => {
            if (response.data.success){
                if(response.data.message === 'liked'){
                    liked.value = true;
                    likes.value += 1;
                }else{
                    liked.value = false;
                    likes.value -= 1;
                }
            }

        }).catch((error) => {
            console.log(error);
        });
    }

    const likedByUser = () => {
        let token = localStorage.getItem('brace-learning-tk');
        axios.get('/api/learning/course/discussion/liked', {
            headers: {
                "Authorization" : "Bearer " + token,
                'Accept' : 'application/json',
            },
            params: {
                course_id: course_id.value,
                comment_id: comment.value.id,
            }

        }).then((response) => {
            if (response.data.success) {
                liked.value = true;
                console.log('has like');
            }

        }).catch((error) => {
            console.log(error);
        });
    }

    onBeforeMount(() => {
        likedByUser();
    });
</script>

<template>
    <div class="col-12 bg-white-radius-shadow mb-2">
        <div class="row">

            <div class="col-12">
                <img width="40" :src="comment.image" class="center-cropped-50 rounded-circle mr-1"/>
                <span class="text-orange">{{ comment.name }}</span>
            </div>

            <div class="col-12">
                <Transition name="fade">
                    <p class="tx-11">
                        <span v-if="!moreComment">
                            {{ comment.comment.substring(0, 150) }}
                        </span>
                        <span v-else>
                            {{ comment.comment }}
                        </span>
                    </p>
                </Transition>

                <div v-if="comment.comment.length > 150"
                     class="text-orange text-center bg-very-light-orange border-radius-8 tx-11"
                     @click.prevent="moreComment === true ? moreComment = false : moreComment = true">
                    <span v-if="moreComment">Less</span>
                    <span v-else>More</span>
                </div>

                <div class="bg-light-grey">
                    <span class="float-left tx-10">{{ comment.created_at }}</span>
                    <span v-if="!liked" @click.prevent="likeComment" class="float-right text-orange">
                        {{ likes }} <i class="fa fa-heart text-dark"></i>
                    </span>
                    <span v-else @click.prevent="likeComment" class="float-right text-orange">
                        {{ likes }} <i class="fa fa-heart text-dark-green"></i>
                    </span>
                </div>
            </div>

        </div>
    </div>
</template>

<style scoped>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s ease;
    }

    .fade-enter-from,
    .fade-leave-to {
        opacity: 0;
    }
</style>

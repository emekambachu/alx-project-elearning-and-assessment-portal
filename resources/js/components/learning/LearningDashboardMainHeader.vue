<template>
    <div class="main-header-left">
        <div class="app-sidebar__toggle mobile-toggle" data-toggle="sidebar">
            <a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
            <a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
        </div>

        <span class="na-text-black font-weight-bold"
              style="font-size: 16px; margin-left: 4px;">
        </span>
    </div>

    <div class="main-header-search">
        <form>
            <input placeholder="Search">
        </form>
    </div>

    <div class="main-header-right" style="height : 100%">

        <div class="nav nav-item navbar-nav-right ml-auto" style="height : 100%">

            <div class="dropdown main-profile-menu nav nav-item nav-link pr-3 pl-3 m-0 pt-3 pb-0">
                <a class="profile-user d-flex" href="">
                    <label class="d-sm-none d-none d-md-block mr-2"
                           style="padding-left:5px; padding-top: 5px; font-family: Inter,serif; font-style: normal; font-weight: normal; font-size: 14px; color: #626161;">
                                <span class="light-green">{{ user.name }}</span>
                    </label>

                    <img class="rounded-circle mCS_img_loaded" style="margin: 0 auto;"
                         :src="user.image">
                    <i class="fa fa-chevron-down text-dark" style="margin-left: 3px; margin-top: 7px;"></i>
                </a>

                <div class="dropdown-menu">
                    <div class="row p-3">
                        <div class="col-4">
                            <img class="rounded-circle center-cropped-50"
                                 style="margin: 0 auto;" :src="user.image">
                        </div>
                        <div class="col-8">
                            <p class="tx-15 light-green mb-0">{{ user.name }}</p>
                            <p class="tx-15 text-grey">{{ user.business_name }}</p>
                        </div>
                        <div class="col-12 text-center">
                            <hr style="border: 1px solid #e7e7e7;"/>
                            <router-link
                                exact
                                class="text-dark float-left"
                                :to="{name: 'LearningAccountView'}">
                                <i class="fas fa-user mr-2"></i>  Account Settings
                            </router-link>
                        </div>
                        <div class="col-12 text-center">
                            <hr style="border: 1px solid #e7e7e7;"/>
                            <router-link
                                exact
                                class="text-danger float-left"
                                :to="{name: 'LearningLogout'}">
                                <i class="fas fa-lock mr-2"></i>  Logout
                            </router-link>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import {ref, onMounted} from 'vue';
export default {
    setup(){
        const user = ref('');

        const getUser = async () => {
            // Get token from local storage
            let token = localStorage.getItem('learning-user-tk');
            axios.get('/api/learning/authenticate', {
                // Make "true" if not using external API
                withCredentials: true,
                headers: {
                    "Authorization" : "Bearer " + token,
                    'Accept' : 'application/json',
                },
                params: {
                    token: token,
                }
            }).then((response) => {
                if (response.data.success) {
                    user.value = response.data.user;
                    console.log(response.data.user)
                }
            }).catch((error) => {
                console.log(error);
            });
        }

        onMounted(() => {
            getUser();
        });

        return {
            user,

            getUser,
        }
    }
}
</script>

<style scoped>

</style>

<script>

import api from "../../router/api.js";
import router from "../../router/router.js";

export default {
    name: "AdminLayout",

    mounted() {
        this.getAccessToken()

    },
    watch: {
        '$route'() {
            this.$nextTick(this.getAccessToken)
        }
    },

    data(){
        return{
            accessToken : null,
            isActive: false,
            profile: '',
            category: '',
            rating: '',
            likes: '',
            images: '',
            type: 'hidden'
        }
    },
    methods:{

        activeBar(){


            (async () => {
                // Задержка в 2 секунды перед выводом сообщения
                await sleep(200);
                this.isActive = true

                this.profile = 'Profiles'
                this.category = 'Category'
                this.rating = 'Rating'
                this.likes = 'Likes'
                this.images = 'Images'
            })();

        },
        getAccessToken(){
            this.accessToken = localStorage.getItem('access_token')
        },
        logout(){
            api.post('/api/auth/logout').then(res =>{
                localStorage.removeItem('access_token')
                router.push({name: 'login'})
            }).catch(e => {console.log(e)})
        },
        deactiveBar(){
            (async () => {
                // Задержка в 2 секунды перед выводом сообщения
                await sleep(200);
                this.isActive = false

                this.profile = ''
                this.category = ''
                this.rating = ''
                this.likes = ''
                this.images = ''
            })()

        }

    }
}
</script>

<template>
    <section> <!--top sidebar-->
        <div class="justify-center text-white">
                <nav class="py-3 text-[25px]   bg-violet-900 snap-always">
                    <ul class="flex justify-items-start  ">
                        <li class=" ml-3 mr-5 ">
                            <a href="#"></a>Admin Panel
                        </li>
                        <li class="mx-3 ">
                            <router-link  :to="{name: 'admin_profiles'}"> Profile</router-link>
                        </li>
                        <li class="mx-3 ">
                            <router-link  :to="{name: 'admin_category'}">Category</router-link>
                        </li>
                        <li class="mx-3 ">
                            <router-link  :to="{name: 'admin_likes'}">Likes</router-link>
                        </li>
                        <li class="mx-3 ">
                            <router-link  :to="{name: 'admin_images'}">Images</router-link>
                        </li>
                        <li class="mx-3 ">
                            <router-link  :to="{name: 'admin_rating'}">Rating</router-link>
                        </li>
                        <li class="mx-3 ">
                            <a  @click.prevent="logout">Logout</a>
                        </li>
                    </ul>

                </nav>

        </div>
    </section>
    <section id="left-navbar"> <!--NAVBAR-LEFT-->
        <nav @mousemove="activeBar" @mouseleave="deactiveBar" class=" self-start h-full   absolute text-start rounded-t-none rounded-r-lg px-2 py-1 text-white border-gray-600 border-r-2 bg-violet-900">
            <ul class="w-auto text-[25px] ">
                <li class="pb-1 "><a :class="{'text-blue-800': isActive}" href="#"><i class="ri-profile-line pr-2"></i>{{profile}}</a></li>
                <li class="pb-1 "><a href="#"><i class="ri-menu-search-line pr-2"></i>{{category}}</a></li>
                <li class="pb-1 "><a href="#"><i class="ri-heart-line pr-2"></i>{{likes}}</a></li>
                <li class="pb-1 "><a href="#"><i class="ri-image-line pr-2"></i>{{images}}</a></li>
                <li class="pb-1 "><a href="#"><i class="ri-shake-hands-line pr-2"></i>{{rating}}</a></li> <!--rating-->

            </ul>
        </nav>
    </section>
    <router-view></router-view>
</template>

<style scoped>

</style>

<script>


import router from "../../router/router.js";
import api from "../../router/api.js";

export default {
    name: "ClientLayout",

    data(){
        return{
            accessToken : null
        }
    },
    mounted() {
        this.getAccessToken()

    },
    watch: {
        '$route'() {
            this.$nextTick(this.getAccessToken)
        }
    },


    methods:{
        getAccessToken(){
            this.accessToken = localStorage.getItem('access_token')
        },
        logout(){
            api.post('/api/auth/logout').then(res =>{
                localStorage.removeItem('access_token')
                router.push({name: 'login'})
            }).catch(e => {console.log(e)})
        }

    }
}
</script>

<template>
    <header >
        <nav class="w-full h-[60px] bg-cyan-800 text-white text-2xl py-2">
            <div class="flex justify-items-start ">
                <div v-if="accessToken" class="mx-3 h-12 hover:bg-white hover:text-blue-800 rounded-md px-1 py-2 transition hover:duration-300">
                    <router-link :to="{name: 'admin_show', params: {id: 1}}">My profile</router-link>
                </div>
                <div class="mx-3 h-12 hover:bg-white hover:text-blue-800 rounded-md px-1 py-2 transition hover:duration-300">
                    <router-link :to="{name: 'profile'}">Profiles</router-link>
                </div>
                <div v-if="accessToken" class="mx-3 h-12 hover:bg-white hover:text-blue-800 rounded-md px-1 py-2 transition hover:duration-300">
                    <router-link  :to="{name: 'admin_create'}">Create profile</router-link>
                </div>
                <div v-if="!accessToken" class="mx-3  h-12 hover:bg-white hover:text-blue-800 rounded-md px-1 py-2 transition hover:duration-300">
                    <router-link  :to="{name: 'login'}">Login</router-link>
                </div>
                <div  v-if="!accessToken" class="mx-3 h-12 hover:bg-white hover:text-blue-800 rounded-md px-1 py-2 transition hover:duration-300">
                    <router-link :to="{name: 'register'}">Register</router-link>
                </div>
                <div v-if="accessToken"  class="mx-3 h-12 hover:bg-white hover:text-blue-800 rounded-md px-1 py-2 transition hover:duration-300">
                    <a  @click.prevent="logout">Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <router-view/>
</template>

<style scoped>

</style>

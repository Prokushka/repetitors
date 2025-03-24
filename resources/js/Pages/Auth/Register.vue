<script>


import router from "../../router/router.js";
import api from "../../router/api.js";



export default {
    data(){
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null
        }
    },
    methods:{
        register(){
            axios.post('/api/auth/register',{
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            }).then(e => {
                localStorage.setItem('access_token', e.data.access_token)
                router.push({name: 'profile'})
            }).catch(e => {
                console.log(e)
            })

        }
    },
    name: "Register"

}

</script>

<template>
    <div class="container relative justify-items-center mx-auto mt-5  ">
        <div class=" bg-cyan-800 text-center min-w-[375px] sm:size-3/4 md:size-1/2 lg:size-3/5 size-3/5 mb-10 pt-20 pb-10 rounded-2xl border-gray-200 border-2" >
            <div class=" mb-5 text-4xl py-3 text-center text-white">
                Регистрация
            </div>
            <form @submit.prevent="register()" class="flex flex-col items-center text-xl " method="post">

                <input class="input-form" type="text" v-model="name" placeholder="Имя" name="name" >
                <input class="input-form" type="email" v-model="email" placeholder="Email" name="email" >
                <input class="input-form" type="password" v-model="password" placeholder="Password" name="password" >
                <input class="input-form" type="password" v-model="password_confirmation" placeholder="confirm password" id="password_confirmation" name="password_confirmation" >
                <input type="submit" value="Отправить" class="input-button">
            </form>
        </div>
    </div>
</template>

<style scoped>

</style>

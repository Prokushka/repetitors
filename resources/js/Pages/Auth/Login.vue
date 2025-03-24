
<script>
    import router from "../../router/router.js";
    export default {
        data(){
            return{
              email: null,
              password: null,
              error: null,
            }
        },
        methods:{

            login(){
                axios.post('/api/auth/login',{
                    email: this.email,
                    password: this.password,

                }).then(e => {
                    localStorage.setItem('access_token', e.data.access_token)
                    router.push({name: "index"})
                }).catch(e => {
                    this.error = e.response.data.error
                    console.log(e)
                })

            }
        },


    }

</script>


<template>

    <div class="container relative justify-items-center mx-auto mt-20  ">
        <div class=" bg-cyan-800 text-center min-w-[375px] sm:size-3/4 md:size-1/2 lg:size-3/5 size-3/5 mb-10 pt-20 pb-10 rounded-2xl border-gray-200 border-2" >
            <div class=" mb-5 text-4xl py-3 text-center text-white">
                Вход
            </div>
            <form @submit.prevent="login()" class="flex flex-col items-center text-xl " method="post">

                <input class="input-form" v-model="email" type="email" placeholder="Email" name="email" >
                <input class="input-form" type="password" v-model="password" placeholder="Password" name="password" >
                <input type="submit" value="Отправить" class="input-button">
                <div v-if="error" class="text-red-700">{{error}}</div>
            </form>
        </div>
    </div>

</template>

<style scoped>

</style>

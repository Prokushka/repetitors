
<template>
<div>
    <div class=" container w-5/6 mt-5 justify-items-center content-center grid  lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-x-8 text-center gap-y-10 bg-violet-950/50 rounded-md text-white ">
        <div v-for="profiles in profile"  class="flex justify-center" @click="Show(profiles.id)">
        <div class=" rounded-md relative ml-10   border-2 p-3 xl:w-[350px]  lg:w-[300] md:w-[250px] xl:h-[475px] lg:h-[425px] md:h-[375px] sm:w-[200px] sm:h-[325px]   border-white ease-in-out duration-300 hover:-translate-y-1">


            <div class="text-3xl py-2">{{ profiles.name}}</div>
            <img :src="profiles.image" class=" xl:w-[275px] lg:w-[200px] md:w-[175px] md:ml-6 sm:ml-6 lg:mr-5 sm:w-[125px] xl:ml-8 lg:ml-4  border-white border-2 rounded-md"  >
            <div class="py-3 mb-2 break-words line-clamp-3 w-full leading-relaxed whitespace-normal">
                <div class="text-xl">
                    {{profiles.first_name}}
                </div>
                <div class="text-xl">
                    {{profiles.last_name}}
                </div>

            </div>

        </div>
        </div>
    </div>

</div>
</template>
<script >
import api from "../../router/api.js";
import router from "../../router/router.js";


export default {
    name: "Profile",


    data(){
        return{
            profile: null
        }
    },

    methods:{
        getData(){
            api.get('/api/profile').then(
                res => {
                    this.profile = res.data.data
                }
            )
        },
        Show(id){
            router.push({name: 'admin_show', params: { id: id}})
            //api.get(`/api/profile/${id}`)
        }

    },
    mounted() {
        this.getData()

    }
}

</script>
<style scoped>

</style>

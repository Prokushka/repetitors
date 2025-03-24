
<template>
<div>
    <div class=" container mt-5 justify-items-center content-center grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-x-8 text-center gap-y-10 bg-gray-600 rounded-md text-white ">
        <div v-for="profiles in profile"  class="flex justify-center" @click="Show(profiles.id)">
        <div class=" rounded-md relative ml-10   border-2 p-3 xl:w-[350px]  lg:w-[300] md:w-[250px] xl:h-[475px] lg:h-[425px] md:h-[375px] sm:w-[200px] sm:h-[325px]   border-white ease-in-out duration-300 hover:-translate-y-1">


            <div class="text-3xl py-3">{{ profiles.name}}</div>
            <img :src="profiles.image" class=" xl:w-[275px] lg:w-[200px] md:w-[175px] md:ml-6 sm:ml-6 lg:mr-5 sm:w-[125px] xl:ml-8 lg:ml-4  border-white border-2 rounded-md "  >
            <h4 class="py-3 mb-2 break-words line-clamp-3 w-full leading-relaxed whitespace-normal">
                {{profiles.description}}
            </h4>

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
    computed: {
        show() {
            return show
        }
    },

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

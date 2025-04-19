
<template>

    <div class="text-white container justify-self-center justify-items-center p-2 m-2 rounded-md border-1 w-3/4 border-white">

        <div class="whitespace-normal">
            {{profile.first_name}}
        </div>
        <div class="whitespace-normal">
            {{profile.last_name}}
        </div>
        <div>
        <img width="" :src="image" class="xl:w-[275px] lg:w-[200px] md:w-[175px] md:ml-6 sm:ml-6 lg:mr-5 sm:w-[125px] xl:ml-8 lg:ml-4  border-white border-2 rounded-md"  >

        </div>
        <div class="whitespace-normal">
            {{profile.sex}}
        </div>
        <div class="mt-5 w-125">
            {{profile.description}}
        </div>


    </div>
    <div class="w-auto h-40 grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-8 my-10 text-center">


        <div class="container relative  bg-violet-800 rounded-md hover:-translate-y-1 px-14 duration-300 text-white items-center py-10 ">
            <p class="text-2xl">Мы - хуесосы</p> <br>
            Поэтому покупайте у нас всякую хуйню
            <i class="ri-store-line"></i>
        </div>

        <div class="container relative  bg-violet-800 rounded-md hover:-translate-y-1 px-14 duration-300 text-white items-center py-10 ">
            <p class="text-2xl">Мы - долбоёбы</p> <br>
            Поэтому пососите наш хер
            <i class="ri-service-line"></i>
        </div>


    </div>
</template>
<script>
    import api from "../../../router/api.js";


    export default {
        name: "Show",

        data(){
            return{
                profile: Object,
                image: ''
            }
        },


        methods:{

            getData(){

                api.get(`/api/profiles/${this.$route.params.id}`)
                    .then(res => (
                        this.image = res.data.data.image,
                        this.profile = res.data.data
                    )).catch(e => {console.log(e)})
            },

        },
        mounted() {
            this.getData()

        }
    }
</script>

<style scoped>

</style>

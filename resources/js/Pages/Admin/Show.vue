

<script>
    import api from "../../router/api.js";

    export default {
        name: "Show",

        data(){
            return{
                profile: null
            }
        },

        methods:{
            /*async getData(){
               const res = await api.get(`/api/profile/${$route.params.id}`)
                try{
                   this.profile = res.data.data
                }catch (e) {
                    console.log(e)
                }
            }*/
            getData(){

                api.get(`/api/profiles/${this.$route.params.id}`)
                    .then(res => (
                        this.profile = res.data.data
                    )).catch(e => {console.log(e)})
            }
        },
        mounted() {
            this.getData()
        }
    }
</script>
<template>
    <div>
        {{ profile }}
    </div>

</template>
<style scoped>

</style>

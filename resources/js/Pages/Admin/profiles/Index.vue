<script>
import api from "../../../router/api.js";
import router from "../../../router/router.js";

export default {
name: "Profiles",
    data(){
        return{
            profile: null
        }
    },

    methods:{
        getData(){
            api.get('/api/admin/profiles').then(
                res => {
                    this.profile = res.data.data
                }
            )
        },
        Show(id){
            router.push({name: 'admin_show', params: { id: id}})

        }

    },
    mounted() {
        this.getData()

    }
}
</script>

<template>
    <div class="flex place-content-center text-2xl ">
        <table class="border-collapse border-2  border-slate-400  ">
            <thead >
            <tr>
                <th class="border px-2 border-slate-300">First Name</th>
                <th class="border border-slate-300">Last Name</th>
                <th class="border border-slate-300">Images</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="profiles in profile">
                <td class="border border-slate-300">{{profiles.first_name}}</td>
                <td class="border border-slate-300">{{profiles.last_name}}</td>
                <td class="border border-slate-300">{{profiles.images}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>

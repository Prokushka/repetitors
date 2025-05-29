
<template>
<div>
    <vue-awesome-paginate
        :total-items="50"
        :items-per-page="5"
        :max-pages-shown="5"
        v-model="currentPage"/>
    <div class=" w-5/6 mt-5 p-10 place-self-center justify-items-center grid  lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-x-9 text-center gap-y-10 bg-violet-950/50 rounded-md text-white ">
        <div v-for="profiles in profile"  class=" justify-items-center" @click="Show(profiles.id)">
        <div class=" rounded-md relative border-2 pt-5  w-11/12  h-auto    border-white ease-in-out duration-300 hover:-translate-y-1">



            <img :src="profiles.image" class=" place-self-center w-11/12  h-auto    border-white border-2 rounded-md"  >
            <div class="py-3 mb-2 break-words line-clamp-3 w-full leading-relaxed whitespace-normal">
                <div class="text-xl">
                    {{profiles.first_name}}
                </div>
                <div class="text-xl">
                    {{profiles.last_name}}
                </div>
                <div class="text-lg">
                    {{profiles.subjects}}
                </div>
            </div>

        </div>
        </div>

    </div>

</div>
</template>

<script setup>
import api from "../../router/api.js";
import router from "../../router/router.js";

import {onMounted, ref} from 'vue'

    const currentPage = ref(1)
    const totalRow = ref(30)
    const profile = ref(0)
    function getData(){
            api.get('/api/profile').then(
                res => {
                    profile.value = res.data.data
                }
            )
        }
    function Show(id) {
          router.push({name: 'admin_show', params: {id: id}})
      }
    onMounted(() => {
        getData()

    })


</script>
<style>
.pagination-container {
    display: flex;

    column-gap: 10px;
}

.paginate-buttons {
    height: 40px;

    width: 40px;

    border-radius: 20px;

    cursor: pointer;

    background-color: rgb(242, 242, 242);

    border: 1px solid rgb(217, 217, 217);

    color: black;
}

.paginate-buttons:hover {
    background-color: #d8d8d8;
}

.active-page {
    background-color: #3498db;

    border: 1px solid #3498db;

    color: white;
}

.active-page:hover {
    background-color: #2988c8;
}
</style>

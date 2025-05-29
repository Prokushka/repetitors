
<template>
<div>


</div>
</template>
<script >
import api from "../../router/api.js";
import router from "../../router/router.js";


export default {
    name: "Profile",


    data(){
        return{

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
        },
        onClickHandler(page) {
            console.log('Страница:', page)
        }
    },
    mounted() {
        this.getData()

    }
}

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

<script >
import api from "../router/api.js";
    export default {
        methods: {
            getData(){
                api.get('/api/index', {
                   
                },)
            }
        }
    }
</script>

<template>
    <div>Index</div>
</template>

<style scoped>

</style>

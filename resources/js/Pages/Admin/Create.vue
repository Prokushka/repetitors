<template>
    <div class="container relative justify-items-center mx-auto mt-20  ">
        <div class=" bg-cyan-800 text-center min-w-[375px] sm:size-3/4 md:size-1/2 lg:size-3/5 size-3/5 mb-10 pt-20 pb-10 rounded-2xl border-gray-200 border-2" >
            <div class=" mb-5 text-4xl py-3 text-center text-white">
                Создание профиля
            </div>
            <form @submit.prevent="uploadFile" class="flex flex-col items-center text-xl "  method="post">

                <input class="input-form"  type="text" v-model="name" placeholder="Name" name="email" >
                <textarea class="input-form" v-model="description" placeholder="Description"></textarea>
                <input class="input-form " style="display: none" id="file-input" @change="handleFileUpload" type="file" name="image"  placeholder="Description"/>
                <label for="file-input" class="text-white mt-3 py-2 ">
                    Choose photo for profile
                </label>
                <input  type="submit" value="Отправить"  class="input-button">


            </form>
        </div>
    </div>
</template>
<script>
    import router from "../../router/router.js";
    import api from "../../router/api.js";
    export default {
        name: "Create",
        data(){
            return{
                name: null,
                description: null,
                image: null,
                selectedFile: null
            }
        },

        methods:{

            handleFileUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    this.selectedFile = file;
                }
            },
            uploadFile() {
                if (!this.selectedFile) {
                    alert("Please, choose file");
                    return;
                }

                const formData = new FormData();
                formData.append('image', this.selectedFile);
                formData.append('name', this.name);
                formData.append('description', this.description);

                    return api.post('/api/profiles',  formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(res => {
                            console.log(res)
                            router.push({name: 'admin_show', params: { id: res.data.data.id}})
                        }).catch(e => {console.log(e)})


            }
        }
    }
</script>



<style scoped>

</style>

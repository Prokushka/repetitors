import './bootstrap';

import router from "./router/router.js";
import { createApp } from 'vue'

import Client from "./Pages/Layouts/Client.vue";
import Admin from "./Pages/Layouts/Admin.vue";
import Main from "./Pages/Main.vue"
import {VueAwesomePaginate} from "vue-awesome-paginate";
import "vue-awesome-paginate/dist/style.css";

const main = createApp(Main)


main.use(router).use(VueAwesomePaginate).mount('#main')


const client = createApp(Client)

client.use(router).use(VueAwesomePaginate).mount('#app')

const admin = createApp(Admin)

admin.use(router).use(VueAwesomePaginate).mount('#admin')



import './bootstrap';

import router from "./router/router.js";
import { createApp } from 'vue'

import Client from "@/Pages/Main.vue";
import Admin from "./Pages/Layouts/Admin.vue";



const client = createApp(Client)

client.use(router).mount('#app')

const admin = createApp(Admin)

admin.use(router).mount('#admin')

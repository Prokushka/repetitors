import './bootstrap';

import router from "./router/router.js";
import { createApp } from 'vue'

import Client from "./Pages/Layouts/Client.vue";
import Admin from "./Pages/Layouts/Admin.vue";
import Main from "./Pages/Main.vue"


const main = createApp(Main)

main.use(router).mount('#main')

const client = createApp(Client)

client.use(router).mount('#app')

const admin = createApp(Admin)

admin.use(router).mount('#admin')



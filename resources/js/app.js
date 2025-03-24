import './bootstrap';

import router from "./router/router.js";
import { createApp } from 'vue'

import Layout from "@/Pages/Layout.vue";
const app = createApp(Layout)

app.use(router).mount('#app')

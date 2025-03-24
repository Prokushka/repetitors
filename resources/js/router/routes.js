import Index from "../Pages/Index.vue";
import Profile from "../Pages/User/Profile.vue";
import Login from "../Pages/Auth/Login.vue";
import Register from "../Pages/Auth/Register.vue";
import Create from "../Pages/Admin/Create.vue";
import Show from "../Pages/Admin/Show.vue";
 const routes = [
    { path: '/', name: 'index', component: Index },
    { path: '/profile', name: 'profile', component: Profile },
    { path: '/login', name: 'login', component: Login },
    { path: '/register', name: 'register', component: Register },
    { path: '/admin/create_profile', name: 'admin_create', component: Create },
    { path: '/admin/show_profile/:id(\\d+)', name: 'admin_show', component: Show },

]
export default routes

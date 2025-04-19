
import Profile from "../Pages/User/Profile.vue";
import Login from "../Pages/Auth/Login.vue";
import Register from "../Pages/Auth/Register.vue";
import Create from "../Pages/Admin/profiles/Create.vue";
import Show from "../Pages/Admin/profiles/Show.vue";
import Main from "../Pages/Main.vue";
import Likes from "../Pages/Admin/likes/Index.vue"
import Images from "../Pages/Admin/images/Index.vue"
import Profiles from "../Pages/Admin/profiles/Index.vue";
 const routes = [
    { path: '/', name: 'Client', component: Main },
    { path: '/profile', name: 'profile', component: Profile },
    { path: '/login', name: 'login', component: Login },
    { path: '/register', name: 'register', component: Register },
    { path: '/admin/profiles', name: 'admin_profiles', component: Profiles },
    { path: '/admin/show_profile/:id(\\d+)', name: 'admin_profiles_show', component: Show },
    { path: '/admin/create_profiles', name: 'admin_profiles_create', component: Create },
    { path: '/admin/likes', name: 'admin_likes', component: Likes },
    { path: '/admin/images', name: 'admin_images', component: Images },
    { path: '/admin/rating', name: 'admin_rating', component: Show },
    { path: '/admin/category', name: 'admin_category', component: Show },
    { path: '/admin/show_profile/:id(\\d+)', name: 'admin_show', component: Show },
]
export default routes

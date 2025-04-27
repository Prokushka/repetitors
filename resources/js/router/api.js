import axios from "axios";
import router from "./router.js";



const api = axios.create()
api.interceptors.request.use(config => {
    //const results = config.document.cookie.match(/access_token=(undefined|null)/);
    if (localStorage.getItem('access_token') === 'undefined'){
        localStorage.removeItem('access_token')
    }
    const token = localStorage.getItem('access_token')
    if (token) {
        config.headers.Authorization = (`Bearer ${token}`)
    }

    return config
})
api.interceptors.response.use(config => {
    return config
}, error => {

    if(error.response.data.error ===  "The token is expired"){
       return axios.post('/api/auth/refresh', {}, {
           headers: {
               'authorization' : `Bearer ${localStorage.getItem('access_token')}`
           }

       }).then(res => {
            localStorage.setItem('access_token', res.data.access_token);
            error.config.headers.Authorization = `Bearer ${res.data.access_token}`
            return api.request(error.config)
        }).catch(error => {
            if (error.response.data.error === "refresh_token is undefined"){
                localStorage.removeItem('access_token')
                router.push({name: 'login'})
            }
       })
    }
})
export default api

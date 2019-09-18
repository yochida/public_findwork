require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router'
import Notifications from 'vue-notification'

Vue.use(Notifications)
Vue.use(VueRouter)

import App from './components/App'
import router from './routers'

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    components: {
        Notifications
    },
});


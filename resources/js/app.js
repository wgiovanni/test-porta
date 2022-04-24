
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('dashboard', require('./components/DashboardComponent.vue').default);
Vue.component('login', require('./components/LoginComponent.vue').default);
Vue.component('register', require('./components/RegisterComponent.vue').default);

const app = new Vue({
    el: '#app',
});

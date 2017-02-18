window.Vue = require('vue');

Vue.component('test', require('./widgets/Test.vue'));
Vue.component('timer', require('./widgets/Timer.vue'));

const app = new Vue({
	el: '#app'
});
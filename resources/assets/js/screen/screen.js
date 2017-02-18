window.Vue = require('vue');

Vue.component('test', require('./widgets/Test.vue'));

const app = new Vue({
	el: '#app'
});
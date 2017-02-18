window.Vue = require('vue');

Vue.component('head-panel', require('./widgets/HeadPanel/HeadPanel.vue'));

const app = new Vue({
	el: '#app'
});
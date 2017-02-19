window.Vue = require('vue');

Vue.component('head-panel', require('./widgets/HeadPanel/HeadPanel.vue'));

window.app = new Vue({
	el: '#app',
	data: window.state
});
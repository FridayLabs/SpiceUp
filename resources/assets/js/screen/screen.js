window.Vue = require('vue');

Vue.component('head-panel', require('./widgets/HeadPanel/HeadPanel.vue'));

const app = new Vue({
	el: '#app',
	data: {
		scoreData: {
			teamA: {
				color1: '#cc0000',
				name: 'LIV',
				goals: 1,
			},
			teamB: {
				color1: '#1729ff',
				name: 'MNC',
				goals: 2,
			}
		},
		timerData: {
			status: false,
			start: 0,
			end: 3600,
		}
	},
	methods: {

	}
});
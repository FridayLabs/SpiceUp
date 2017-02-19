window.Vue = require('vue');

import Echo from "laravel-echo"

window.Echo = new Echo({
	broadcaster: 'pusher',
	key: '400169720b859c709ef4',
	cluster: 'eu',
	encrypted: true
});

Vue.component('head-panel', require('./widgets/HeadPanel/HeadPanel.vue'));

window.app = new Vue({
	el: '#app',
	data: {
		teamData: {
			teamA: {
				color1: '#c00',
				nameShort: 'LIV',
			},
			teamB: {
				color1: '#1729ff',
				nameShort: 'MNC',
			}
		},
		substitutionData: {
			team: 'home',
			playerIn: 'Firmino',
			playerOut: 'Lallana',
		},
		scoreData: {
			teamA: {
				goals: 1,
			},
			teamB: {
				goals: 2,
			}
		},
		timerData: {
			status: false,
			start: 0,
			end: 0,
		},
	},
	created: function () {
		/*Echo.channel('screen')
			.listen('TimerStart', this.timerStart)
			.listen('TimerPause', this.timerPause)
			.listen('TimerEnd', this.timerEnd)
			.listen('TimerData', this.timerEnd)
			.listen('addGoal', this.addGoal)
			.listen('scoreData', this.scoreData);*/
	},
	methods: {
		timerStart: function () {
			this.timerData.status = 'start'
		},
		timerPause: function () {
			this.timerData.status = 'pause'
		},
		timerEnd: function () {
			this.timerData.status = 'end'
		},
		timerData: function (e) {
			this.timerData = e.timerData;
		},
		addGoal: function (e) {
			this.scoreData[e.team].goals = e.score;
		},
		scoreData: function (e) {
			this.scoreData = e.scoreData;
		},
	}
});
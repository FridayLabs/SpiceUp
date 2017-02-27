window.Vue = require('vue');

import Echo from "laravel-echo"

window.echo = new Echo({
	broadcaster: 'pusher',
	key: '400169720b859c709ef4',
	cluster: 'eu'
});

Vue.component('head-panel', require('./widgets/HeadPanel/HeadPanel.vue'));
Vue.component('substitution', require('./widgets/Substitution/Substitution.vue'));

window.app = new Vue({
	el: '#app',
	data: window.state,
	created: function () {
		window.echo.channel('screen.' + window.screen.public_id)
			.listen('.App.Events.Widgets.Timer.StartEvent', this.timerStart)
			.listen('.App.Events.Widgets.Timer.PauseEvent', this.timerPause)
			.listen('.App.Events.Widgets.Timer.StopEvent', this.timerEnd)
			.listen('.App.Events.Widgets.Score.UpdateEvent', this.addGoal)
			.listen('.ScoreDataUpdate', this.scoreDataUpdate)
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
		timerDataUpdate: function (e) {
			this.timerData = e.timerData;
		},
		addGoal: function (e) {
			this.scoreData[e.team].goals = e.score;
		},
		scoreDataUpdate: function (e) {
			this.scoreData = e.scoreData;
		},
	}
});


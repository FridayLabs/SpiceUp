<template>
	<div class="head-panel">
		<score v-bind:team-data="teamData" v-bind:score-data="scoreData"></score>
		<timer v-bind:timer-data="timerData"></timer>
	</div>
</template>

<script>
	import Timer from './Timer.vue';
	import Score from './Score.vue';
	export default {
		props: [
			'teamData', 'scoreData', 'timerData', 'substitutionData'
		],
		components: {
			'timer': Timer,
			'score': Score
		}
	}
</script>

<style lang="scss" rel="stylesheet/scss">
.head-panel {
	position: fixed;
	top: 10px;
	left: 50%;
	transform: translateX(-50%);
	.timer {
		margin: 0 auto;
	}
}
</style>
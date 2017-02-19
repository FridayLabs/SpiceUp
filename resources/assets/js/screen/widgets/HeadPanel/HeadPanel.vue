<template>
	<div class="head-panel">
		<score v-bind:score-data="scoreData"></score>
		<timer v-bind:timer-data="timerData"></timer>
	</div>
</template>

<script>
	import Timer from './Timer.vue';
	import Score from './Score.vue';
	export default {
		props: [
			'scoreData', 'timerData'
		],
		components: {
			'timer': Timer,
			'score': Score
		}
	}
</script>

<style lang="scss">
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
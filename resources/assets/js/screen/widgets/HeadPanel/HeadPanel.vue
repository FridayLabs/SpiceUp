<template>
	<div class="head-panel">
		test1
		<timer></timer>
	</div>
</template>

<script>
	import Timer from './Timer.vue';
	export default {
		components: {
			'timer': Timer,
		}
	}
</script>

<style lang="scss">
.head-panel {
	position: relative;
	.timer {
		margin: 0 auto;
	}
}
</style>
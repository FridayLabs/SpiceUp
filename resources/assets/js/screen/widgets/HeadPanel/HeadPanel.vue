<template>
	<div class="head-panel">
		test1
		<Timer></Timer>
	</div>
</template>

<script>
	import Timer from './Timer.vue';
	export default {
		components: {
			'Timer': Timer,
		}
	}
</script>

<style lang="scss">
.head-panel {
	position: relative;
}
</style>
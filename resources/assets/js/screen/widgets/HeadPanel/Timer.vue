<template>
	<div class="timer">
		{{timerData.end}}
	</div>
</template>

<script>
	export default {
		props: [
			'timerData'
		],
	}
</script>

<style lang="scss" rel="stylesheet/scss" >
.timer {
	@import "../../../../sass/screen/variables.scss";
	width: 102px;
	font-size: 20px;
	font-weight: bold;
	background: $white;
	color: $black;
	text-align: center;
	padding: 5px 2px;
	text-overflow: ellipsis;
	overflow: hidden;
	white-space: nowrap;
}
</style>
<template>
	<div class="score">
		<div class="left-side">
			<div class="team-color"></div>
			<div class="team-name">
				LIV
			</div>
		</div>
		<div class="score-count">
			0 - 0
		</div>
		<div class="right-side">
			<div class="team-name">
				MNC
			</div>
			<div class="team-color"></div>
		</div>
	</div>
</template>

<script>
	export default {}
</script>


<style lang="scss">

	.score {
		display: inline-block;
		border: 1px solid gray;
		font-size: 20px;
	}

	.left-side, .score-count, .right-side {
		display: inline-block;
		text-align: center;
	}

	.team-name, .score-count {
		width: 102px;
	}

	.score-count .left-side {
		padding-left: 6px;
	}

	.score-count .right-side {
		padding-right: 6px;
	}

	.team-color {
		background-color: darkred;
		width: 6px;
	}


</style>


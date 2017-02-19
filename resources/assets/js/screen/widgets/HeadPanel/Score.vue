<template>
	<div class="score">
		<div class="score__left-side">
			<div class="score__team-color" v-bind:style="{ backgroundColor: teamData.teamA.color1 }"></div>
			<div class="score__team-name">
				{{teamData.teamA.nameShort}}
			</div>
		</div>
		<div class="score__count">
			{{scoreData.teamA.goals}} - {{scoreData.teamB.goals}}
		</div>
		<div class="score__right-side">
			<div class="score__team-name">
				{{teamData.teamB.nameShort}}
			</div>
			<div class="score__team-color" v-bind:style="{ backgroundColor: teamData.teamB.color1 }"></div>
		</div>
	</div>
</template>

<script>
	export default {
		props: [
			'teamData', 'scoreData'
		],
	}
</script>


<style lang="scss" rel="stylesheet/scss">

	@import "../../../../sass/screen/variables.scss";

	.score {
		font-size: 0;
		position: relative;
		padding-bottom: 10px;
		margin-bottom: -10px;
		overflow: hidden;
		color: $white;

		&__left-side, &__count, &__right-side {
			float: left;
			text-align: center;
			padding: 5px 0;
			font-size: 20px;
		}

		&__count {
			width: 102px;
			color: $black;
			background-color: $secondary_color;
			-webkit-box-shadow: 0px 1px 10px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 1px 10px 0px rgba(0,0,0,0.75);
			box-shadow: 0px 1px 10px 0px rgba(0,0,0,0.75);
		}

		&__left-side, &__right-side {
			width: 108px;
			background-color: $primary_color;
		}

		&__left-side {
			padding-left: 8px;
		}
		
		&__right-side {
			padding-right: 8px;
		}

		&__team-color {
			position: absolute;
			top: 0;
			bottom: 10px;
			width: 6px;
		}

		&__left-side .score__team-color {
			background-color: cornflowerblue;
			left: 0;
		}

		&__right-side .score__team-color {
			background-color: coral;
			right: 0;
		}


	}


</style>


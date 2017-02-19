<template>
	<div class="timer">
		{{currentTime|secToMin}}
		<div class="timer__additional-time" v-if="additionalTime">
			+{{additionalTime|secToMin}}
		</div>
	</div>
</template>

<script>
	export default {
		props: [
			'timerData'
		],
		computed: {
			status: function (value) {
				return this.timerData.status;
			}
		},
		data: function () {
			return {
				currentTime: (this.timerData.start > this.timerData.end ? this.timerData.end : this.timerData.start),
				additionalTime: (this.timerData.start > this.timerData.end ? this.timerData.start - this.timerData.end : 0),
				timer: null,
			}
		},
		watch: {
			status: function (value) {
				switch (value) {
					case 'start': this.timerStart(); break;
					case 'pause': this.timerPause(); break;
					case 'end': this.timerEnd(); break;
				}
			}
		},
		filters: {
			secToMin: function (value) {
				if (!value) return '00:00';
				let minutes = addFirstZero(Math.floor(value / 60));
				let seconds = addFirstZero(value % 60);
				function addFirstZero(value) {
					return (value < 10 ?  '0' + value : value);
				}
				return ( minutes + ':' + seconds );
			},
		},
		methods: {
			timerStart: function () {
				this.timer = setInterval(this.timerInterval.bind(this), 1000);
			},
			timerInterval: function () {
				if (this.currentTime < this.timerData.end) {
					this.currentTime += 1;
				} else {
					this.additionalTime += 1;
				}
			},
			timerPause: function () {
				clearInterval(this.timer);
			},
			timerEnd: function () {
				clearInterval(this.timer);
				this.currentTime = 0;
				this.additionalTime = 0;
			}
		}
	}
</script>

<style lang="scss" rel="stylesheet/scss" >
.timer {
	@import "../../../../sass/screen/variables.scss";
	position: relative;
	width: 102px;
	font-size: 20px;
	font-weight: bold;
	background-color: $white;
	color: $black;
	text-align: center;
	padding: 5px 2px;
	&__additional-time {
		position: absolute;
		left: 100%;
		top: 0;
		height: 100%;
		width: 82px;
		background-color: inherit;
		color: inherit;
		font-size: 20px;
		font-weight: bold;
		text-align: center;
		padding: 5px 2px;
		border: 1px solid $primary_color;
	}
}
</style>
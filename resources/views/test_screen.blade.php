@extends('layouts.screen')
@section('headJS')
<script>
	window.screen = {
		public_id: '{{$screen->public_id}}'
	};
	window.state = {
		scoreData: {
			teamA: {
				goals: {{$game->score_home}},
			},
			teamB: {
				goals: {{$game->score_away}},
			}
		},
		timerData: {
			status: false,
				start: 0,
				end: 10,
		},
		substitutionData: {
			team: 'teamB',
			playerIn: '12 Firmino',
			playerOut: '11 Lallana',
		},
		teamData: {
			teamA: {
				color1: '#c00',
					nameShort: '{{$game->teamHome->shortTitle}}',
			},
			teamB: {
				color1: '#1729ff',
					nameShort: '{{$game->teamAway->shortTitle}}',
			}
		},
	};
</script>
@endsection
@section('headCSS')
@if($withBg==1)
<style>
	body {
		background-image: url('http://fcdb.ru/wp-content/uploads/2015/08/rn4gKCatwnY.jpg');
		background-position: top center;
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>
@endif
@endsection
@section('content')
	<head-panel
			v-bind:team-data="teamData"
			v-bind:timer-data="timerData"
			v-bind:score-data="scoreData"></head-panel>
	<substitution
			v-bind:substitution-data="substitutionData"
			v-bind:team-data="teamData"></substitution>
@endsection

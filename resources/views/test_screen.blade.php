@extends('layouts.screen')

@section('content')

	<script>
		window.state = {
			scoreData: {
				teamA: {
					color1: '#c00',
					name: '{{$game->teamHome->shortTitle}}',
					goals: {{$game->score_home}},
				},
				teamB: {
					color1: '#1729ff',
					name: '{{$game->teamAway->shortTitle}}',
					goals: {{$game->score_away}},
				}
			},
			timerData: {
				status: false,
				start: 0,
				end: 0,
			}
		};
	</script>

	<head-panel v-bind:score-data="scoreData" v-bind:timer-data="timerData"></head-panel>
@endsection

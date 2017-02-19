@extends('layouts.screen')

@section('content')
	<script>
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
					end: 0,
			},
			substitutionData: {
				team: 'home',
					playerIn: 'Firmino',
					playerOut: 'Lallana',
			},
			teamData: {
				teamA: {
					color1: '#c00',
					nameShort: '{{$game->teamHome->shortTitle}}',
				},
				teamB: {
					color1: '#1729ff',
					nameShort: '{$game->teamAway->shortTitle}}',
				}
			},
		};
	</script>
	<head-panel
			v-bind:team-data="teamData"
			v-bind:timer-data="timerData"
			v-bind:score-data="scoreData"
			v-bind:substitution-data="substitutionData"></head-panel>
@endsection

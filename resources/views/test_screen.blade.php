@extends('layouts.screen')

@section('content')
	<head-panel
			v-bind:team-data="teamData"
			v-bind:timer-data="timerData"
			v-bind:score-data="scoreData"></head-panel>
	<substitution
			v-bind:substitution-data="substitutionData"
			v-bind:team-data="teamData"></substitution>
@endsection

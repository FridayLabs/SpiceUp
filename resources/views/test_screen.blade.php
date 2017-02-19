@extends('layouts.screen')

@section('content')
	<head-panel
			v-bind:team-data="teamData"
			v-bind:timer-data="timerData"
			v-bind:score-data="scoreData"
			v-bind:substitution-data="substitutionData"></head-panel>
@endsection

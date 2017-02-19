@extends('layouts.screen')

@section('content')
	<head-panel v-bind:score-data="scoreData" v-bind:timer-data="timerData"></head-panel>
	<substitution></substitution>
@endsection

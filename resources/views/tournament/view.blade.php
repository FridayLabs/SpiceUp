@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('screens') }}">Screens</a></li>
                <li class="active">Screen View #{{$screen->id}}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Screen View #{{$screen->id}}
                </div>

                <div class="panel-body">
                    @foreach ($screen->states()->get() as $state)
                    <p>State ->  {{ $state->title }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

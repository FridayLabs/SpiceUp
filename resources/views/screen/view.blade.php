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
                    <ul class="nav nav-tabs">
                        @foreach ($screen->states()->get() as $state)
                        <li role="presentation" @if ($loop->first) class="active" @endif ><a href="#stateBlock_{{$state->id}}" aria-controls="stateBlock_{{$state->id}}" role="tab" data-toggle="tab">{{ $state->title }}</a></li>
                        @endforeach
                        <li role="presentation"><a href="{{route('stateCreate',["screenId" => $screen->id])}}">+ Add state</a></li>
                    </ul>
                    <div class="tab-content">
                        @foreach ($screen->states()->get() as $state)
                        <div role="tabpanel" class="tab-pane @if ($loop->first) active @endif" id="stateBlock_{{$state->id}}">
                            <div class="row">
                            @foreach ($state->widgets()->get() as $widgetLink)
                                <div class="col-xs-4">
                                    <widget_score></widget_score>
                                </div>
                            @endforeach
                            <div class="col-xs-4">
                                <a href="#"
                                   class="btn btn-primary"
                                   style="display: block;width: 100%;height: 250px;text-align: center;padding: 100px;">
                                    + Add widget
                                </a>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerJS')
    @parent
    @foreach ($screen->states()->get() as $state)
        @foreach ($state->widgets()->get() as $widgetLink)
            {{$widgetLink->widget->renderScripts()}}
        @endforeach
    @endforeach
@show
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Screens
                    <a class="btn btn-primary pull-right btn-sm" href="{{ action('ScreenController@create') }}">
                        Add Screen
                    </a>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-responsive">
                        @foreach ($screens as $screen)
                        <tr>
                            <td>{{$screen->id}}</td>
                            <td>{{$screen->title}}</td>
                            <td>{{$screen->public_id}}</td>
                            <td>{{$screen->user->name}}</td>
                            <td><a href="{{route('screenView', ['screenId'=>$screen->id])}}" class="btn btn-primary">View</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tournaments
                        <a class="btn btn-primary pull-right btn-sm"
                           href="{{ action('TournamentsController@create') }}">
                            Add Tournament
                        </a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered table-responsive">
                            @foreach ($tournaments as $tournament)
                                <tr>
                                    <td>{{$tournament->id}}</td>
                                    <td>{{$tournament->title}}</td>
                                    <td>
                                        <a href="{{action('TournamentsController@show', ['id'=>$tournament->id])}}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

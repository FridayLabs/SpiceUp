@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create screen
                    </div>
                    <div class="panel-body">
                        <form action="{{ action('ScreenController@store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="title">Screen Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Screen title">
                            </div>
                            <div class="form-group">
                                <label for="game">Game</label>
                                <select>
                                    @foreach( $games as $game)
                                        <option value="{{$game->id}}">{{$game->teamHome->title}} - {{$game->teamAway->title}}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="game" class="form-control" placeholder="Screen game">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

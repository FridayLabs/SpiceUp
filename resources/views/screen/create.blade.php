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
                        <form action="">
                            <div class="form-group">
                                <label for="title">Screen Title</label>
                                <input type="text" id="title" class="form-control" placeholder="Screen title">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.guest')

@section('content')

    <div class="col-md-9">

        <div class="panel panel-default">
            <div class="panel-heading">{{$judge->name}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2">
                        <b>Name :</b>
                    </div>
                    <div class="col-sm-4">
                        {{$judge->name}}
                    </div>
                </div>

                <br>

            </div>
        </div>
    </div>

@endsection

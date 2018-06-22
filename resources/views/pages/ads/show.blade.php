@extends('layouts.app')

@section('content')

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading"><b>{{$ad->title}}</b></div>
            <div class="panel-body">
                <div class="col-md-8">

                    <div class="row">
                        <div class="col-sm-10">
                            {{ $ad->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

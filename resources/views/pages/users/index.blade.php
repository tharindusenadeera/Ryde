@extends('layouts.app')

@section('content')


    <div class="col-md-9">


        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Judges
                <a href="{{url('judges/create')}}" type="button" class="btn btn-primary btn-xs pull-right">Add New</a>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    @foreach($judges as $judge)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4>{{$judge->name}}</h4>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-right">
                                        <a href="{{url('judges/'.$judge->id.'/edit')}}" class="btn btn-success">Edit</a>

                                        <form title="Delete Judge" style="display: inline;" method="POST" action="{{url('judges/'. $judge->id.'/delete')}}" accept-charset="UTF-8">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

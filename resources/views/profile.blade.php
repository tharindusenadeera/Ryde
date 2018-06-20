@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="/uploads/profile/{{ $user->profile_pic }} style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px"/>
                <h2>{{ $user->fname }}'s Profile</h2>
                <form enctype="multipart/form-data" action="/profile" method="POST">
                
                <label> Upload Profile Image</label>
                <input type="file" name="profile_pic">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
                
                </form>
            
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Category</div>
            <div class="panel-body">
                <div class="col-md-10">
                    <form method="post" action="{{ route('categories.update', $category->id)  }}">
                        <input type="hidden" name="_method" value="patch">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" value="{{$category->name}}" class="form-control" placeholder="Category name or something" value="{{ old('title') }}">
                        </div>
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control"  name="desc" placeholder="Some more details about the category">{{$category->desc}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

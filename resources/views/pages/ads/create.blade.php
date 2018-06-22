@extends('layouts.app')

@section('content')

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">New Ad</div>
            <div class="panel-body">
                <div class="col-md-10">
                    <form method="post" action="{{ route('ads.store')  }}">
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control" placeholder="Category name or something" value="{{ old('title') }}">
                        </div>
                        @if ($errors->has('title'))
                            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                        @endif
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control"  name="desc" placeholder="Some more details about the category">{{ old('desc') }}</textarea>
                        </div>
                        @if ($errors->has('desc'))
                            <div class="alert alert-danger">{{ $errors->first('desc') }}</div>
                        @endif

                        <div class="form-group">
                            <label>Seller Name</label>
                            <input name="seller" type="text" class="form-control" placeholder="Seller name" value="{{ old('seller') }}">
                        </div>
                        @if ($errors->has('seller'))
                            <div class="alert alert-danger">{{ $errors->first('seller') }}</div>
                        @endif

                        <div class="form-group">
                            <label>Seller Email</label>
                            <input name="seller_email" type="text" class="form-control" placeholder="Seller email" value="{{ old('seller_email') }}">
                        </div>
                        @if ($errors->has('seller_email'))
                            <div class="alert alert-danger">{{ $errors->first('seller_email') }}</div>
                        @endif

                        <div class="form-group">
                            <label>Seller Phone</label>
                            <input name="seller_phone" type="number" class="form-control" placeholder="Seller name" value="{{ old('seller_phone') }}">
                        </div>
                        @if ($errors->has('seller_phone'))
                            <div class="alert alert-danger">{{ $errors->first('seller_phone') }}</div>
                        @endif

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option value="5">05 minutes – LKR 50</option>
                                <option value="10">10 minutes – LKR 100</option>
                                <option value="15">15 minutes – LKR 150	</option>
                            </select>
                        </div>
                        @if ($errors->has('category'))
                            <div class="alert alert-danger">{{ $errors->first('category') }}</div>
                        @endif

                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

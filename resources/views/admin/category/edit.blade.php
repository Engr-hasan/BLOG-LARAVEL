@extends('layouts.backend.app')
@section('title','category')
@push('css')

@endpush
@section('content')
	<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit category
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('admin.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        	@csrf
                            @method('PUT')
                            <label for="email_address">Category Name </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}">
                                </div>
                            </div>

                            <label for="email_address">Category Image </label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>
                            </div>

                            <a href="{{route('admin.category.index')}}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

@endpush

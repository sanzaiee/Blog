@extends('backend.layouts.master') @section('content')
<h1>Blog create</h1>
<div class="container">
    <form method="POST" action="{{ route('blog.store') }}" enctype='multipart/form-data'>
        @csrf

        <div class="form-group">
            <label class="control-label" for="cateogry">Cateogry <span style="color: red">*</span></label>
            <select class="form-control" id="category_id" name="category_id">
                @if(old('category_id') == "")
                <option class="form-control" value="0">Please Select Category</option>
                @foreach ($category as $item)
                <option class="form-control" value="{{$item->id}}" @if (old( 'category_id')==$item->id) selected="selected" @endif>{{$item->category_name}}
                    </p>
                </option>
                @endforeach @else
                <option class="form-control" value="0" @if (old( 'category_id')==0 ) selected="selected" @endif>Please Select category_id</option>
                @foreach ($category as $item)
                <option class="form-control" value="{{$item->id}}" @if (old( 'category_id')==$item->id) selected="selected" @endif>{{$item->category_name}} </p>
                </option>
                @endforeach @endif
            </select>
        </div>

        <div class="form-group">
            <label for="Fname">Blog Title<span style="color: red">*</span></label>
            <input type="text" class="form-control" id="title" placeholder="" name="blog_title">
        </div>

        <div class="form-group">
            <label class="control-label " for="academic"> Select Image to upload: <span style="color: red">*</span></label>
        </div>
        <div class="col-md-6">
            <input autocomplete="off" type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-category_id">
            <label for="Lname">Blog Description <span style="color: red">*</span></label>
            <input type="text" class="form-control" id="description" placeholder="" name="blog_description">
        </div>

        <div class="form-category_id">
            <label for="Lname">Short Description <span style="color: red">*</span></label>
            <input type="text" class="form-control" id="description" placeholder="" name="blog_short_description">
        </div>

        <div class="form-category_id">
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label " for="academic">Status <span style="color: red">*</span></label>
                </div>
                <div class="col-md-6">
                    <select name="status" class="form-control">
                        <option value="1" class="form-control">Active</option>
                        <option value="0" class="form-control">Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-primary d-block mx-auto w-75 p-2" type="submit">{{ __('Create') }}</button>

    </form>

</div>
@endsection

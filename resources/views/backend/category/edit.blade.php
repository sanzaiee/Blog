@extends('backend.layouts.master')
@section('content')
<h1>Category Update</h1>
<div class="container">
        <form method="POST" action="{{ route('category.update',$category->id) }}" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
        <label for="Fname">Category Name<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="Fname" placeholder="" name="category_name" value=
        "@if(old('category_name')==""){{ $category->category_name }}@else{{old('category_name')}}@endif"
        >
      </div>

      <div class="form-group">
        <label for="Lname">Category Description <span style="color: red">*</span></label>
        <input type="text" class="form-control" id="Lname" placeholder="" name="category_description" value="{{ $category->category_description }}">
      </div>
      <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label class="control-label " for="academic">Status <span style="color: red">*</span></label>
            </div>
            <div class="col-md-6">
                <select name="status" class="form-control">
                    <option value="1" class="form-control">Active</option>
                    @if(old('status')==0)
                    <option value="0" @if($category->status== 0) selected="selected" @endif>In Active</option>
                    @else
                    <option value="1" @if($category->status== 1) selected="selected" @endif>Active</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
          <button class="btn btn-primary d-block mx-auto w-75 p-2" type="submit">{{ __('Update') }}</button>


           </form>



</div>
@endsection

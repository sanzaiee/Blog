@extends('backend.layouts.master')
@section('content')
<h1>Admin Edit</h1>
<div class="container">
        <form method="POST" action="{{ route('user.update',$user->id) }}" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
        <label for="Fname"> Name<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="Fname" placeholder="" name="name" value=
        "@if(old('name')==""){{ $user->name }}@else{{old('name')}}@endif"
        >
      </div>
      <div class="form-group">
        <label for="Fname"> Address<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="Fname" placeholder="" name="address" value=
        "@if(old('address')==""){{ $user->address }}@else{{old('address')}}@endif"
        >
      </div>

    <div class="form-group">
      <label for="Fname"> Phone<span style="color: red">*</span></label>
      <input type="text" class="form-control" id="Fname" placeholder="" name="phone" value=
      "@if(old('phone')==""){{ $user->phone }}@else{{old('phone')}}@endif"
      >
    </div>



      <div class="form-group">
        <label for="Lname">Email <span style="color: red">*</span></label>
        <input type="text" class="form-control" id="Lname" placeholder="" name="email" value="{{ $user->email }}">
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
                    <option value="0" @if($user->status== 0) selected="selected" @endif>In Active</option>
                    @else
                    <option value="1" @if($user->status== 1) selected="selected" @endif>Active</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
          <button class="btn btn-primary d-block mx-auto w-75 p-2" type="submit">{{ __('Update') }}</button>


           </form>



</div>
@endsection

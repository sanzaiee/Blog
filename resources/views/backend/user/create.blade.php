@extends('backend.layouts.master')
@section('content')
<h1>Create Admin</h1>
<div class="container">
        <form method="POST" action="{{ route('user.store') }}" enctype='multipart/form-data'>
            @csrf
    <div class="form-group">
        <label for="Fname"> Name<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="Fname" placeholder="" name="name">
      </div>

      <div class="form-group">
        <label for="Lname">Email <span style="color: red">*</span></label>
        <input type="text" class="form-control" id="Lname" placeholder="" name="email">
      </div>

      <div class="form-group">
        <label for="Lname">Address <span style="color: red">*</span></label>
        <input type="text" class="form-control" id="Lname" placeholder="" name="address">
      </div>

      <div class="form-group">
        <label for="Lname">Phone <span style="color: red">*</span></label>
        <input type="text" class="form-control" id="Lname" placeholder="" name="phone">
      </div>


      <div class="form-group">
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

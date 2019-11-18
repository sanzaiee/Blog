@extends('backend.layouts.master')
@section('content')
<h1>Category Detail</h1>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>User Type</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th> {{ $user->name }}</th>
            <th>{{ $user->email }}</th>
            <th>{{ $user->address }}</th>
            <th>{{ $user->phone }}</th>

            <th>
            @if ($user->user_type == 1)
                Admin
            @elseif($user->user_type == 2)
                Client
            @endif
            </th>


            <th>
                @if ($user->status == 1)
                    Active
                @else
                    Inactive
                @endif
                </th>
        </tr>



    </tbody>
  </table>

  <a href="/user"><button class="btn btn-info">Back</button></a>
@endsection

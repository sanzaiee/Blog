@extends('backend.layouts.master')
@section('content')
<h1>Category Table</h1>
<a href="/user/create"><button class="btn btn-info"> Create </button></a>
<table class="table table-striped">
    <thead>
      <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Email</th>
        <th>User Type</th>
        <th>Approve</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Approval</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($admin as $index=> $item)
        <tr>
            <th>{{ ++$index }}</th>
            <th><a href="/user/{{ $item->id }}"> {{ $item->name }}</a></th>
            <th>{{ $item->email }}</th>
            <th>{{ $item->user_type }}</th>
            <th>{{ $item->approve }}</th>
            <th>{{ $item->address }}</th>
            <th>{{ $item->phone }}</th>
            <th>
                @if ($item->approve == 1)
                    Approved
                @else
                    Not Approved
                @endif
                </th>
            <th>
            @if ($item->status == 1)
                Active
            @else
                Inactive
            @endif
            </th>
            <th>
                    <a href="/user/{{ $item->id }}/delete">   <button type="button" class="btn btn-danger btn-sm action-delete">  Delete </button></a>
                    <a href="/user/{{ $item->id }}/edit">   <button type="button" class="btn btn-info">  Edit </button></a>
                </th>
        </tr>


        @endforeach


    </tbody>
  </table>
@endsection

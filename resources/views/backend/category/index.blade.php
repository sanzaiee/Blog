@extends('backend.layouts.master')
@section('content')
<h1>Category Table</h1>
<a href="/category/create"><button class="btn btn-info"> Create </button></a>
<table class="table table-striped">
    <thead>
      <tr>
        <th>SN</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($category as $index=> $item)
        <tr>
            <th>{{ ++$index }}</th>
            <th><a href="/category/{{ $item->id }}"> {{ $item->category_name }}</a></th>
            <th>{{ $item->category_description }}</th>
            <th>
            @if ($item->status == 1)
                Active
            @else
                Inactive
            @endif
            </th>
            <th>
                    <a href="/category/{{ $item->id }}/delete">   <button type="button" class="btn btn-danger btn-sm action-delete">  Delete </button></a>
                    <a href="/category/{{ $item->id }}/edit">   <button type="button" class="btn btn-info">  Edit </button></a>
                </th>
        </tr>


        @endforeach


    </tbody>
  </table>
@endsection

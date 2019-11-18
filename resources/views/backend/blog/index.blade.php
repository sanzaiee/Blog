@extends('backend.layouts.master')
@section('content')
<h1>Blog Table</h1>
<a href="/blog/create"><button class="btn btn-info"> Create </button></a>
<table class="table table-striped">
    <thead>
      <tr>
        <th>SN</th>
        <th>Image</th>
        <th>Blog Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Posted By</th>
        <th>Short Description</th>
        <th>status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $index=> $item)
        <tr>
            <th>{{ ++$index }}</th>
            <th> <img src="/files/blog/{{ $item->image }}" height="100px" width="100px"></th>

            <th><a href="/blog/{{ $item->id }}"> {{ $item->blog_title }}</a></th>
            <th>{{ $item->blog_description }}</th>
            <th>{{ $item->category->category_name }}</th>
            <th>{{ $item->user->name }}</th>
            <th>{{ $item->blog_short_description }}</th>
            <th>
            @if ($item->status == 1)
                Active
            @else
                Inactive
            @endif
            </th>
            <th>
                    <a href="/blog/{{ $item->id }}/delete">   <button type="button" class="btn btn-danger btn-sm action-delete">  Delete </button></a>
                    <a href="/blog/{{ $item->id }}/edit">   <button type="button" class="btn btn-info">  Edit </button></a>
                </th>
        </tr>


        @endforeach


    </tbody>
  </table>
@endsection

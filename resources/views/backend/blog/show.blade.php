@extends('backend.layouts.master')
@section('content')
<h1>Blog Detail</h1>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Image</th>
        <th>Blog Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Posted By</th>
        <th>Short Description</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th> <img src="/files/blog/{{ $blog->image }}" height="100px" width="100px"></th>

            <th><a href="/category/{{ $blog->id }}"> {{ $blog->blog_title }}</a></th>
            <th>{{ $blog->blog_description }}</th>
            <th>{{ $blog->category->category_name }}</th>
            <th>{{ $blog->user->name }}</th>
            <th>{{ $blog->blog_short_description }}</th>
            <th>
            @if ($blog->status == 1)
                Active
            @else
                Inactive
            @endif
            </th>

        </tr>




    </tbody>
  </table>

  <a href="/blog"><button class="btn btn-info">Back</button></a>
@endsection

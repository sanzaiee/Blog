@extends('backend.layouts.master')
@section('content')
<h1>Category Detail</h1>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Description</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th> {{ $category->category_name }}</th>
            <th>{{ $category->category_description }}</th>
            <th>
            @if ($category->status == 1)
                Active
            @else
                Inactive
            @endif
            </th>
        </tr>



    </tbody>
  </table>

  <a href="/category"><button class="btn btn-info">Back</button></a>
@endsection

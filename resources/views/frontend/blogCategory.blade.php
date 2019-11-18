<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Blog</title>

  </head>
  <body>

        {{-- <div id="fb-root"></div> --}}
        {{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=447273396111913&autoLogAppEvents=1"></script> --}}


@include('frontend.navbar');

    <div class="row">
        <div class="col-md-3">
            <div class="container">
                <div class="card" >
                        <div class="card-header">
                          Category
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($category as $item)
                           <a href="/{{ $item->id }}/blog/{{ $item->category_name }}"> <li class="list-group-item">{{ $item->category_name }}</li></a>
                            @endforeach

                        </ul>
                      </div>
            </div>
        </div>


        <div class="col-md-9">

                <div class="row">
                    @foreach ($blog as $item)

                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="/files/blog/{{ $item->image }}" alt="Card image cap" width="300px" height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $item->blog_title }} <br> Blogger: {{ $item->user->name }}</h5>
                                      <p class="card-text">{{ $item->blog_short_description }}</p>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $item->id }}">
                                        More..
                                        </button>
                                    @if (Auth::check())
                                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=http://localhost:8000/3/blog/Nature/&layout=button&size=small&mobile_iframe=true&width=60&height=20&appId" width="60" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                    {{-- <iframe src="https://www.facebook.com/plugins/share_button.php?href=https://www.google.com/&layout=button&size=small&mobile_iframe=true&width=60&height=20&appId" width="60" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe> --}}

                                    <a
                                    href="https://twitter.com/share"
                                    class="twitter-share-button"
                                    data-text="{{ $item->blog_title }}"
                                    data-via="{{ auth::user()->name }}"
                                    data-hashtags="{{ $item->category->category_name }}"
                                    data-show-count="false">Tweet
                                </a>
                            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                    @endif

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $item->blog_title }} </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{$item->blog_description}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                            </div>
                                            </div>
                                        </div>
                                        </div>


                                    </div>
                                  </div>
                        </div>
                        @endforeach


                    </div>

        </div>
    </div>




@include('frontend.footer');



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>
</html>

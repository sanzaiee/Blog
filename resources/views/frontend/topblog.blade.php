<div class="row">
    @foreach ($blogs as $item)

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

                                    <a target="_blank"  href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" class="facebook-share" >
                                    <button type="button" class="btn btn-primary">
                                        Share
                                        </button>
                                        </a>
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

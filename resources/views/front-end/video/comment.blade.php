<div class="row  mt-3" id="commnets">
        <div class="col-10 " style="margin: auto">
            <div class="card ">
                <div class="card-header card-header-rose text-center text-bold">
                <h3><strong>@lang('validation.Comments') ({{$video->comments->count()}})</strong> </h3>
                </div>
                <div class="card-body">
                    @foreach ($video->comments as $comment)
                        <div class="row">
                            <div class="col-8">
                                <p>
                                    <span class="badge badge-pill badge-dark"><i class="fas fa-user pr-1 "> </i>
                                        <a class="text-white" href="{{ route('front.profile', ['id'=>$comment->user->id,'slug' => trim(str_replace(' ', '_',$comment->user->name))]) }}">{{$comment->user->name}}</a>
                                    </span>
                                <span class="badge badge-pill badge-dark"><i class="fas fa-clock pr-1"> </i>   {{$comment->created_at}} </span>
                                </p>
                                <strong>{{$comment->comment}}</strong><br>
                            </div>
                            <div class="col-4 text-right">
                                @if (auth()->user())
                                @if ((auth()->user()->group == 'admin') || auth()->user()->id == $comment->user->id)
                                <a href="{{ route('delete.comment' , ['id' => $comment->id]) }}" class="btn btn-danger btn-round">delete</a>
                                        <a href="#" onclick="$(this).slideToggle();$(this).next('div').slideToggle(1000);return false;" class="btn btn-success btn-round">@lang('validation.edit')</a>

                                        <div class="mt-3" style="display: none">
                                            <form action="{{route('front.commentUpdate' , ['id' =>$comment->id ])}}" method="post">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <textarea name="comment"  class="form-control"  rows="4" cols="10">{{  $comment->comment }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-round">@lang('validation.edit')</button>
                                            </form>
                                        </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        <br>
                            @if (! $loop->last)
                                    <hr>
                            @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>

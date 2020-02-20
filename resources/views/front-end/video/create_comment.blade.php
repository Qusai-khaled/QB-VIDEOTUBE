 @if (auth()->user())
            <form class="w-75 m-auto" action="{{route('front.commentStore' , ['id' =>$video->id ])}}" method="post">
                {{ csrf_field() }}
                <div class="form-group text-center">
                    <label for="exampleFormControlTextarea1"><span class="badge badge-pill badge-danger "><h3 class="m-auto">@lang('validation.add') @lang('validation.Comments')</h3></span></label>
                    <textarea name="comment"  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <button type="submit" class="btn btn-success btn-round mt-3">@lang('validation.add')</button>
                </div>
            </form>
        @endif

<div class="card mr-auto border-dark" style="width: 20rem; margin: auto">
<a href="{{ route('front.video', ['id'=>$video->id]) }}"><img class="card-img-top" src="{{url('uploads/'.$video->image)}}" alt="{{$video->name}}" style="max-height: 140px"></a>
    <div class="card-body">
    <h4 class="card-title">{{$video->name}}</h4>
    <br>
    <p class="card-text">@lang('validation.created_at'): {{$video->created_at}}</p>
    <a href="{{ route('front.video', ['id'=>$video->id]) }}" class="btn btn-danger btn-round">@lang('validation.Go-Video')</a>
    </div>
</div>

@extends('layouts.app')
@section('title',$video->name)
@section('meta_keywords' , $video->meta_keywords)
@section('meta_des' , $video->meta_des)
@section('content')
<div class="section section-buttons">
<div class="container">
    <div class="title text-center">
        <h1>{{$video->name}}</h1>
    </div>
    <div class="row ">
        <div class="col-md-12 ">
                @php $url = getYoutubeId($video->youtube) @endphp
                @if($url)
                    <iframe height="450px" width="100%" src="https://www.youtube.com/embed/{{ $url }}" style="margin-bottom: 20px" frameborder="0"  allowfullscreen></iframe>
                @endif
        </div>
    </div>
    <div class="row mb-4">
    <div class="col-md-10 text-center m-auto" >
        <span class=" badge badge-pill badge-dark " style="white-space: pre-line" >
            <strong>
            {{$video->des}}
            </strong>
        </span>
    </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-5 ">
            <div class="row">
                    <div class="col-6"><span class="badge badge-pill badge-dark" style="font-size: 15px"><strong><i class="fas fa-user pr-1 "> </i>   {{$video->user->name}}</strong></span></div>
                    <div class="col-6"><span class="badge badge-pill badge-dark" style="font-size: 15px"><strong><i class="fas fa-clock pr-1"> </i>   {{$video->created_at}}</strong></span></div>
            </div>
        </div>
            <div class="col-md-7 m-auto ">
                <div class="row">
                    <div class="col-4 text-center">
                    <p><span class="badge badge-pill badge-dark" style="font-size: 15px"><strong>@lang('validation.Categories'):</strong> </span><br>
                            <a href="{{ route('front.category', ['id'=>$video->cat->id]) }}"><span class="badge badge-pill badge-danger" style="font-size: 13px">{{$video->cat->name}}</span></a>
                        </p>
                </div>
                <div class="col-4 text-center">
                     <p><span class="badge badge-pill badge-dark" style="font-size: 15px"><strong>@lang('validation.Skills'):</strong> </span><br>
                        <ul class="list-group list-unstyled">
                        @foreach ($video->skills as $skill)
                           <li> <a href="{{ route('front.skill', ['id'=>$skill->id]) }}"><span class="badge badge-pill badge-danger">{{$skill->name}}</span></a></li>
                        @endforeach
                        </ul>
                    </p>
                </div>
                <div class="col-4 text-center">
                     <p> <span class="badge badge-pill badge-dark" style="font-size: 15px"><strong>@lang('validation.Tags'):</strong> </span><br>
                        <ul class="list-group list-unstyled">
                        @foreach ($video->tags as $tag)
                           <li> <a href="{{ route('front.tag', ['id'=>$tag->id]) }}"><span class="badge badge-pill badge-danger">{{$tag->name}}</span></a></li>
                        @endforeach
                        </ul>
                    </p>
                </div>
                </div>
            </div>
        </div>
        @include('front-end.video.comment')
        @include('front-end.video.create_comment')
</div>
</div>
@endsection

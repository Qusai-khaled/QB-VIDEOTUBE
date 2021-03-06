@extends('layouts.app')

@section('title',$tag->name)


@section('content')
<div class="section section-buttons">
<div class="container">
    <div class="title text-center">
        <h1>{{$tag->name}}</h1>
        <h2>{{$num}} @lang('validation.Videos')</h2>
    </div>
    @include('front-end.shared.video_row')
</div>
</div>
@endsection

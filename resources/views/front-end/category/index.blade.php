@extends('layouts.app')

@section('title',$category->name)

@section('meta_keywords' , $category->meta_keywords)

@section('meta_des' , $category->meta_des)
@section('content')
<div class="section section-buttons" style="min-height: 560px">
<div class="container">
    <div class="title text-center">
        <h1>{{$category->name}}</h1>
        <h2>{{$num}} @lang('validation.Videos')</h2>
    </div>
        @include('front-end.shared.video_row')
</div>
</div>
@endsection

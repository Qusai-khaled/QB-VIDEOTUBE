@extends('layouts.app')

@section('title',$page->name)
@section('meta_keywords' , $page->meta_keywords)
@section('meta_des' , $page->meta_des)

@section('content')
<div class="section section-buttons" style="min-height: 550px">
    <div class="container">
        <div class="title text-center">
            <h1>{{$page->name}}</h1>
            <h4 style="color: black">{{$page->des}}</h4>
        </div>
    </div>
</div>
@endsection

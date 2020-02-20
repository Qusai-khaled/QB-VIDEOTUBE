@extends('back-end.layout.app')

@php
    $pageTitle = "Edit";
    $pageDes = "Here You Can Edit Videos"
@endphp

@section('title')
    Videos Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>'Edit Video '])
    @endcomponent
    <div class="row">
                <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                    <h4 class="card-title">{{ $pageTitle}}</h4>
                    <p class="card-category">{{$pageDes}}</p>
                    </div>
                    <div class="card-body">
                    <form action="{{route('videos.update',['video'=>$videos])}}" method="POST" enctype="multipart/form-data">
                        {{ method_field('put') }}
                            @include('back-end.videos.form')
                        <button type="submit" class="btn btn-primary pull-right">Update Video</button>
                        <div class="clearfix"></div>
                    </form>
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                        <div class="card">

                            <div class="card-body text-center">
                                    <h4>Your Video</h4>
                                    @php $url = getYoutubeId($videos->youtube) @endphp
                                    @if($url)
                                        <iframe width="250" src="https://www.youtube.com/embed/{{ $url }}" style="margin-bottom: 20px" frameborder="0"  allowfullscreen></iframe>
                                    @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <h4>Your Photo</h4>
                            <img src="{{url('uploads/'.$videos->image)}}" width="250px">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                    <h4 class="card-title">Comments</h4>

                    </div>
                    @if (request()->route()->parameter('video'))
                        @include('back-end.comments.index')
                    @endif
                </div>
                </div>
                <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                    @include('back-end.comments.create')
                            </div>
                        </div>
                    </div>
            </div>


@endsection


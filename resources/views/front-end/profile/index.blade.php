@extends('layouts.app')
@section('title',$user->name)
@section('content')
<div class="section section-buttons" style="margin-top: 100px">
    <div class="container">
        <div class="owner mb-5">
                <div class="avatar">
                    <img src="/frontend/img/user.png" alt="Circle Image"
                        class="img-circle img-no-padding img-responsive">
                </div>
                <div class="name">
                    <h2 class="title">{{ $user->name }}
                        <br>
                    </h2>
                    <h4 class="description">
                        {{ $user->email }}
                    </h4>
                </div>
                <br>
                @if(auth()->user() && $user->id == auth()->user()->id)
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto text-center">
                            <btn onclick="$('#profileCard').slideToggle(1000)" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i>@lang('validation.edit') @lang('validation.prof') </btn>
                        </div>
                    </div>
                    @include('front-end.profile.edit')
                @endif
            </div>
                <h2 class="text-center mb-4">@lang('validation.shared')({{$num}})</h2>
                @include('front-end.shared.video_row')
    </div>
</div>
@endsection

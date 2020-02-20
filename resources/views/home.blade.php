@extends('layouts.app')

@section('title','QB-VideoTube')
@section('search')
<form class="form-inline">
                    <div class="form-group has-white">
                        <input type="text" name="search" class="form-control" placeholder="@lang('validation.Search')">
                    </div>
                    </form>
@endsection
@section('content')
<div class="section section-buttons">
<div class="container">
    <div class="title text-center">
        <h2>@lang('validation.Latest-Videos')</h2>
        @if (request()->has('search') && request()->get('search') != '')
            <h3>you are search in <b>({{request()->get('search') }})</b></h3>
            <a href="{{ route('home') }}" class="btn btn-danger btn-round mt-3">Reset</a>

        @endif
    </div>
        @include('front-end.shared.video_row')
</div>
</div>
@endsection




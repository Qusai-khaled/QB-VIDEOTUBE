@extends('back-end.layout.app')

@php
    $pageTitle = "Edit";
    $pageDes = "Here You Can Show Message"
@endphp

@section('title')
    Messages Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>'Show Message'])
    @endcomponent
    <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                <div class="card-header card-header-primary text-center">
                <h4 class="card-title">{{ $pageTitle}}</h4>
                <p class="card-category">{{$pageDes}}</p>
                </div>
                <div class="card-body">
                        @include('back-end.messages.form')
                </div>
                </div>
            </div>
    </div>


@endsection


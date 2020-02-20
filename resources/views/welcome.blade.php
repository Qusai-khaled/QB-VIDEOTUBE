@extends('layouts.app')
@section('title','QB-VideoTube | Home')
@section('content')
    @include('front-end.homebage.header')
    @include('front-end.homebage.videos')
    @include('front-end.homebage.statics')
    @include('front-end.homebage.contact_us')
@endsection

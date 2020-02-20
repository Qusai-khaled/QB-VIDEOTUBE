@extends('back-end.layout.app')

@section('title')
    Home Page
@endsection

@push('css')
    <style>

    </style>
@endpush
@section('content')
    @component('back-end.layout.header',['nav_title'=>'Home Page'])

    @endcomponent
    @include('back-end.home-sections.statics')
    @include('back-end.home-sections.latest-comments')
@endsection


@push('js')
    <script>

    </script>
@endpush

@extends('back-end.layout.app')

@php
    $pageTitle = "Create";
    $pageDes = "Here You Can Create Pages"
@endphp

@section('title')
    Pages Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>'Create Page '])
    @endcomponent
<div class="row">
            <div class="col-md-8 m-auto">
              <div class="card">
                <div class="card-header card-header-primary text-center">
                <h4 class="card-title">{{ $pageTitle}}</h4>
                <p class="card-category">{{$pageDes}}</p>
                </div>
                <div class="card-body">
                  <form action="{{ route('pages.store')}}" method="POST">
                        @include('back-end.pages.form')
                    <button type="submit" class="btn btn-primary pull-right">Add Page</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>

@endsection


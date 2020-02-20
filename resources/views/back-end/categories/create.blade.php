@extends('back-end.layout.app')

@php
    $pageTitle = "Create";
    $pageDes = "Here You Can Create Category"
@endphp

@section('title')
    Categories Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>'Create Category '])
    @endcomponent
<div class="row">
            <div class="col-md-8 m-auto">
              <div class="card">
                <div class="card-header card-header-primary text-center">
                <h4 class="card-title">{{ $pageTitle}}</h4>
                <p class="card-category">{{$pageDes}}</p>
                </div>
                <div class="card-body">
                  <form action="{{ route('categories.store')}}" method="POST">
                        @include('back-end.categories.form')
                    <button type="submit" class="btn btn-primary pull-right">Add Category</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>

@endsection


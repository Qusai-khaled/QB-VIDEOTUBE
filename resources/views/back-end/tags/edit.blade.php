@extends('back-end.layout.app')

@php
    $pageTitle = "Edit";
    $pageDes = "Here You Can Edit Tag"
@endphp

@section('title')
    Tags Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>'Edit Tag '])
    @endcomponent
    <div class="row">
            <div class="col-md-8 m-auto">
              <div class="card">
                <div class="card-header card-header-primary text-center">
                <h4 class="card-title">{{ $pageTitle}}</h4>
                <p class="card-category">{{$pageDes}}</p>
                </div>
                <div class="card-body">

                  <form action="{{route('tags.update',['tag'=>$tags])}}" method="POST">
                    {{ method_field('put') }}
                        @include('back-end.tags.form')
                    <button type="submit" class="btn btn-primary pull-right">Update Tag</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

          </div>


@endsection


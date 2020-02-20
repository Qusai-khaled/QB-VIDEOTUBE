@extends('back-end.layout.app')

@php
    $pageTitle = "Controller";
    $pageDes = "Here You Can Edit / Add / Delete Videos"
@endphp

@section('title')
    Videos Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>' Controller Videos'])
    @endcomponent
    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title ">{{ $pageTitle}}</h4>
                            <p class="card-category"> {{$pageDes}}</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{route('videos.create')}}" class="btn btn-white btn-round ">Add Video</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
    <div class="table-responsive">
            <table class="table text-center">
                <thead class=" text-primary">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th >
                        published
                    </th>
                    <th>
                        User
                    </th>
                    <th>
                        Categories
                    </th>

                    <th >
                        Controller
                    </th>
                </tr></thead>
                <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td>
                            {{ $video->id }}
                        </td>
                        <td>
                            {{ $video->name }}
                        </td>
                        <td >
                            @if ( $video->published == 1)
                                <i class="fas fa-eye"></i>
                            @else
                                <i class="fas fa-eye-slash"></i>
                            @endif

                        </td>
                        <td>
                            {{ $video->user->name }}
                        </td>
                        <td>
                            {{ $video->cat->name }}
                        </td>

                        <td class="td-actions d-inline-flex ">
                              <a href="{{route('videos.edit',['video'=>$video])}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit Video">
                                <i class="material-icons">edit</i>
                              </a>
                              <form action="{{route('videos.destroy',['video'=>$video])}}" method="POST">
                                {{@csrf_field()}}
                                {{method_field('delete')}}
                                  <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Video">
                                <i class="material-icons">close</i>
                              </button>
                              </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $videos->links() !!}
        </div>
                </div>
              </div>
            </div>
    </div>

@endsection


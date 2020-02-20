@extends('back-end.layout.app')

@php
    $pageTitle = "Tags";
    $pageDes = "Here You Can Edit / Add / Delete Tags"
@endphp

@section('title')
    Tags Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>' Controller Tags'])
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
                            <a href="{{route('tags.create')}}" class="btn btn-white btn-round ">Add Tag</a>
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
                        Controller
                    </th>
                </tr></thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->id }}
                        </td>
                        <td>
                            {{ $tag->name }}
                        </td>


                        <td class="td-actions d-inline-flex ">
                              <a href="{{route('tags.edit',['tag'=>$tag])}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit Tag">
                                <i class="material-icons">edit</i>
                              </a>
                              <form action="{{route('tags.destroy',['tag'=>$tag])}}" method="POST">
                                {{@csrf_field()}}
                                {{method_field('delete')}}
                                  <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Tag">
                                <i class="material-icons">close</i>
                              </button>
                              </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $tags->links() !!}
        </div>
                </div>
              </div>
            </div>
    </div>

@endsection


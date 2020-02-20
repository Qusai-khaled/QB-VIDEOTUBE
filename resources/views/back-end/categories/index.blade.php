@extends('back-end.layout.app')

@php
    $pageTitle = "Controller";
    $pageDes = "Here You Can Edit / Add / Delete Categories"
@endphp

@section('title')
    Categories Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>' Controller Categories'])
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
                            <a href="{{route('categories.create')}}" class="btn btn-white btn-round ">Add Category</a>
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
                    <th>
                        Meta Keywords
                    </th>

                    <th >
                        Controller
                    </th>
                </tr></thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            {{ $category->meta_keywords }}
                        </td>

                        <td class="td-actions d-inline-flex ">
                              <a href="{{route('categories.edit',['category'=>$category])}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit Category">
                                <i class="material-icons">edit</i>
                              </a>
                              <form action="{{route('categories.destroy',['category'=>$category])}}" method="POST">
                                {{@csrf_field()}}
                                {{method_field('delete')}}
                                  <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Category">
                                <i class="material-icons">close</i>
                              </button>
                              </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $categories->links() !!}
        </div>
                </div>
              </div>
            </div>
    </div>

@endsection


@extends('back-end.layout.app')

@php
    $pageTitle = "Controller";
    $pageDes = "Here You Can Edit / Add / Delete Pages"
@endphp

@section('title')
    Pages Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>' Controller Pages'])
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
                            <a href="{{route('pages.create')}}" class="btn btn-white btn-round ">Add Page</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
    <div class="table-responsive">
            <table class="table">
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

                    <th class=" text-right">
                        Controller
                    </th>
                </tr></thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>
                            {{ $page->id }}
                        </td>
                        <td>
                            {{ $page->name }}
                        </td>
                        <td>
                            {{ $page->meta_keywords }}
                        </td>

                        <td class="td-actions text-right">
                              <a href="{{route('pages.edit',['page'=>$page])}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit Page">
                                <i class="material-icons">edit</i>
                              </a>
                              <form action="{{route('pages.destroy',['page'=>$page])}}" method="POST">
                                {{@csrf_field()}}
                                {{method_field('delete')}}
                                  <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Page">
                                <i class="material-icons">close</i>
                              </button>
                              </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $pages->links() !!}
        </div>
                </div>
              </div>
            </div>
    </div>

@endsection


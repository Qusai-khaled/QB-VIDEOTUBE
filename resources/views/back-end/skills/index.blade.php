@extends('back-end.layout.app')

@php
    $pageTitle = "Skills";
    $pageDes = "Here You Can Edit / Add / Delete Skill"
@endphp

@section('title')
    Skills Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>' Controller Skills'])
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
                            <a href="{{route('skills.create')}}" class="btn btn-white btn-round ">Add Skill</a>
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
                        Controller
                    </th>
                </tr></thead>
                <tbody>
                @foreach($skills as $skill)
                    <tr>
                        <td>
                            {{ $skill->id }}
                        </td>
                        <td>
                            {{ $skill->name }}
                        </td>


                        <td class="td-actions d-inline-flex ">
                              <a href="{{route('skills.edit',['skill'=>$skill])}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit Skill">
                                <i class="material-icons">edit</i>
                              </a>
                              <form action="{{route('skills.destroy',['skill'=>$skill])}}" method="POST">
                                {{@csrf_field()}}
                                {{method_field('delete')}}
                                  <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Skill">
                                <i class="material-icons">close</i>
                              </button>
                              </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $skills->links() !!}
        </div>
                </div>
              </div>
            </div>
    </div>

@endsection


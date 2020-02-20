@extends('back-end.layout.app')

@php
    $pageTitle = "Controller";
    $pageDes = "Here You Can Edit / Add / Delete Users"
@endphp

@section('title')
    Users Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>'Controller Users '])
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
                            <a href="{{route('users.create')}}" class="btn btn-white btn-round ">Add User</a>
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
                        email
                    </th>
                    <th>
                        group
                    </th>
                    <th >
                        Controller
                    </th>
                </tr></thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->group }}
                        </td>
                        <td class="td-actions d-inline-flex ">
                              <a href="{{route('users.edit',['user'=>$user])}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit User">
                                <i class="material-icons">edit</i>
                              </a>
                              <form action="{{route('users.destroy',['user'=>$user])}}" method="POST">
                                {{@csrf_field()}}
                                {{method_field('delete')}}
                                  <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove User">
                                <i class="material-icons">close</i>
                              </button>
                              </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
                </div>
              </div>
            </div>
    </div>

@endsection


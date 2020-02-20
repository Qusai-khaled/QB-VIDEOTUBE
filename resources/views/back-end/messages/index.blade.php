@extends('back-end.layout.app')

@php
    $pageTitle = "Controller";
    $pageDes = "Here You Can  Show / Reply / Delete Messages"
@endphp

@section('title')
    Messages Controller
@endsection


@section('content')
    @component('back-end.layout.header',['nav_title'=>' Controller Messages'])
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
                        Email
                    </th>
                    <th>
                        Message
                    </th>

                    <th >
                        Controller
                    </th>
                </tr></thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>
                            {{ $message->id }}
                        </td>
                        <td>
                            {{ $message->name }}
                        </td>
                        <td>
                            {{ $message->email }}
                        </td>
                        <td>
                            {{ $message->message }}
                        </td>

                        <td class="td-actions d-inline-flex ">
                              <a href="{{route('messages.show',['message'=>$message])}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Show Message">
                                <i class="fas fa-eye"></i>
                              </a>
                              <form action="{{route('messages.destroy',['message'=>$message])}}" method="POST">
                                {{@csrf_field()}}
                                {{method_field('delete')}}
                                  <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Message">
                                <i class="material-icons">close</i>
                              </button>
                              </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $messages->links() !!}
        </div>
                </div>
              </div>
            </div>
    </div>

@endsection


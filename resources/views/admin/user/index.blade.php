@extends('layouts.master')

@section('title','View Users')

@section('pageName','Users')

@section('contents')

<div class="container-fluid px-4">

    <div class="card">
        <div class="card-header">
            <h4>View Users</h4>
           
        </div>

        <div class="card-body">
            @if(session('message'))
            
            <div class="alert alert-success" id="messageS" >{{session('message')}}</div>
            
            @endif
            @if ($errors->any())
            <div class="alert alert-danger" id="messageF">

                {!! implode('', $errors->all('<div>:message</div>')) !!}
                {{-- @foreach ($errors->all as $error)
                <div>
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                </div>
                    
                @endforeach --}}
            </div>
            
            @endif

            {{-- table --}}

            <div class="table-responsive">

            

                <table id="myDataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>user name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
            
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role =='1'? 'Admin' :'User'}}</td>
                            <td>
                                <a href="#edit{{$item->id}}" data-bs-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                {{-- <form action="{{route('posts.destroy',$item)}}" style="display: inline-block" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                </form> --}}
                                
                                @include('admin.user.editModal')
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>

            </div>
            {{-- end of table --}}



        </div>
    </div>

</div>


@endsection
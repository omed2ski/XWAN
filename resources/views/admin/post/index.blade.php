@extends('layouts.master')

@section('title','Posts')



@section('pageName','Posts')

@section('contents')

<div class="container-fluid px-4">


    <div class="card">
        <div class="card-header">
            <h4>View Posts</h4>
            <button type="button" class="btn btn-primary btn-sm float-end" id="modalBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Post
            </button>
                @include('admin.post.addModal')
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
                            <th>post name</th>
                            <th>cover</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)
            
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{asset('uploads/postCover/'.$item->cover_img)}}" width="50px" height="50px" alt="img">
                            </td>
                            <td>{{$item->Category->name}}</td>
                            <td>{{$item->status =='1'? 'hidden' :'visible'}}</td>
                            <td>
                                <a href="#edit{{$item->id}}" data-bs-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                <form action="{{route('posts.destroy',$item)}}" style="display: inline-block" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                                
                                @include('admin.post.editModal')
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


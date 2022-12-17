@extends('layouts.master')

@section('title','Category')

@section('pageName','Category')

@section('contents')




<div class="card mt-4">

    <div class="card-header">

        <h4>View Category</h4>
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm float-end" id="modalBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add category
    </button>
    @include('admin.category.addModal')

    </div>
    <!-- card body -->
    <div class="card-body">
        @if (session('message'))


    <div class="alert alert-success">{{session('message')}}</div>
    
@endif

@if ($errors->any())
<div class="alert alert-danger">

    {!! implode('', $errors->all('<div>:message</div>')) !!}
    {{-- @foreach ($errors->all as $error)
    <div>
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
        
    @endforeach --}}
</div>
    
@endif

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" id="modalBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add category
  </button> --}}
  

    </div>
    <div class="table-responsive">

    
        <table id="myDataTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category name</th>
                    <th>Description</th>
                    <th>image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $cateItem)

                <tr>
                    <td>{{$cateItem->id}}</td>
                    <td>{{$cateItem->name}}</td>
                    <td>{!! $cateItem->description !!}</td>
                    <td>
                    <img src="{{asset('uploads/category/'.$cateItem->image)}}" width="50px" height="50px" alt="img">
                    </td>
                    <td>{{$cateItem->status =='1'? 'hidden' :'show'}}</td>
                    <td>
                        <a href="#edit{{$cateItem->id}}" data-bs-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a>
                        <form action="{{route('category.destroy',$cateItem)}}" style="display: inline-block" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure? this will delete its post too')" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    
                        
                        @include('admin.category.editModal')
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- end card body -->
</div>


 


  

@endsection

@section('scripts')
    
@endsection


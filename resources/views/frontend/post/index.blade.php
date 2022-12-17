@extends('layouts.app')

@if ($category)
    
@section('titleP',"$category->meta_title")
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keyword")

@endif



@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-heading">
                    <h4>{{$category->name}}</h4>
                </div>
                @forelse ($post as $postItem)

                {{-- <div class="card mb-3 mt-4">
                    <img src="{{asset('uploads/postCover/'.$postItem->cover_img)}}" class="card-img-top img-fluid"   alt="...">
                    <div class="card-body">
                        <a href="{{url('kitchen/'.$category->name.'/'.$postItem->slug)}}" class="text-decoration-none">
                      <h5 class="card-title">{{$postItem->name}}</h5>
                        </a>
                      <p class="card-text">Posted by : {{$postItem->user->name}}</p>
                      <p class="card-text"><small class="text-muted">Posted on : {{$postItem->created_at->format('d-m-Y')}}</small></p>
                    </div>
                </div>     --}}

                <div class="card mb-3 mt-4" style="max-width: 720px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('uploads/postCover/'.$postItem->cover_img)}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <a href="{{url('kitchen/'.$category->name.'/'.$postItem->slug)}}" class="text-decoration-none">
                          <h5 class="card-title">{{$postItem->name}}</h5>
                          </a>
                          <p class="card-text">Posted by : {{$postItem->user->name}}</p>
                          <p class="card-text"><small class="text-muted">Posted on : {{$postItem->created_at->format('d-m-Y')}}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                    
                {{-- <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <a href="{{url('kitchen/'.$category->name.'/'.$postItem->slug)}}" class="text-decoration-none">

                            <h2 class="post-heading">{{$postItem->name}}</h2>
                        </a>
                        <h6>Posted on : {{$postItem->created_at->format('d-m-Y')}}
                        <span class="ms-3">Posted by : {{$postItem->user->name}}</span>
                        </h6>
                        
                    </div>
                </div> --}}
               
                @empty
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h1>No post Available</h1>
                    </div>
                </div>
                @endforelse
                <div class="my-paginate mt-4">
                    {{$post->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
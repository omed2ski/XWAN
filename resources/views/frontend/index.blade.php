@extends('layouts.app')


@if($setting)
    
    @section('titleP',"$setting->meta_title")
    @section('meta_description',"$setting->meta_description")
    @section('meta_keyword',"$setting->meta_keyword")

@endif

@section('content')

{{-- all posts --}}
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-heading">
                    <h4>welcome to XWAN</h4>
                </div>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                @forelse ($all_posts as $postItems)

               

                <div class="card mb-3 mt-4" style="max-width: 720px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('uploads/postCover/'.$postItems->cover_img)}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <a href="{{url('kitchen/'.$postItems->category->slug.'/'.$postItems->slug)}}" class="text-decoration-none">
                          <h5 class="card-title">{{$postItems->name}}</h5>
                          </a>
                          <p class="card-text">Posted by : {{$postItems->user->name}}</p>
                          <p class="card-text"><small class="text-muted">Posted on : {{$postItems->created_at->format('d-m-Y')}}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                    
              
               
                @empty
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h1>No post Available</h1>
                    </div>
                </div>
                @endforelse
                <div class="my-paginate mt-4">
                    {{$all_posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>



{{-- end of all posts it --}}

{{-- to view all categories --}}
<div class="py-5 bg-gray" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All categories List</h4>
                <div class="underline"></div>
                    


            </div>
            @forelse ($all_categories as $all_catItem)
            <div class="col-md-3">

                <div class="card card-body mb-3">
                    <a href="{{url('kitchen/'.$all_catItem->slug)}}" class="text-decoration-none">
                        <h4 class="text-dark mb-0">{{$all_catItem->name}}</h4>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-md-3">
                    <h4>No category exist</h4>
                </div>
            @endforelse
            {{-- @foreach ($all_categories as $all_catItem)
            <div class="col-md-3">

                <div class="card card-body mb-3">
                    <a href="{{url('kitchen/'.$all_catItem->slug)}}" class="text-decoration-none">
                        <h4 class="text-dark mb-0">{{$all_catItem->name}}</h4>
                    </a>
                </div>
            </div>
             @endforeach --}}
        </div>
    </div>
</div>

{{-- to view latest posts --}}

<div class="py-5 bg-white" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>latest posts</h4>
                <div class="underline"></div>
                    
            </div>


            @forelse ($latest_posts as $latest_postItem)
            <div class="col-md-3">

                <div class="card card-body bg-gray shadow mb-3">
                    <a href="{{url('kitchen/'.$latest_postItem->category->slug.'/'.$latest_postItem->slug)}}" class="text-decoration-none">
                        <h4 class="text-dark mb-0">{{$latest_postItem->name}}</h4>
                    </a>
                    <h6>Posted on : {{$latest_postItem->created_at->format('d-m-Y')}}</h6>
                </div>
            </div>
            @empty
            <div class="col-md-3">
                <h4>No post exist yet</h4>
            </div>
            @endforelse


            {{-- @foreach ($latest_posts as $latest_postItem)
            <div class="col-md-3">

                <div class="card card-body bg-gray shadow mb-3">
                    <a href="{{url('kitchen/'.$latest_postItem->category->slug.'/'.$latest_postItem->slug)}}" class="text-decoration-none">
                        <h4 class="text-dark mb-0">{{$latest_postItem->name}}</h4>
                    </a>
                    <h6>Posted on : {{$latest_postItem->created_at->format('d-m-Y')}}</h6>
                </div>
            </div>
             @endforeach --}}
        </div>
    </div>
</div>
    
@endsection
@extends('layouts.app')

@section('titleP',"$post->name")
@section('meta_description',"$post->meta_description")
@section('meta_keyword',"$post->meta_keyword")
    




@section('content')

<div class="py-5">
    <div class="container">
       
        <div class="row">
            <div class="col-md-8">
                <div class="category-heading">
                    <h4>{!! $post->name !!}</h4>
                </div>
                <div class="mt-3">
                    <h6>{{$post->category->name.' / '.$post->name}}</h6>
                </div>
                <div class="card card-shadow mt-4">

                    <div class="card-body post-description ">
                        @if ($post->yt_link)
                            
                            <video class="w-100" controls>
                                <source src="{{asset('uploads/videos/'.$post->yt_link)}}" type="video/mp4">
                            </video>

                        @else
                        <img src="{{asset('uploads/postCover/'.$post->cover_img)}}"  class="img-fluid rounded-start w-100 h-50" alt="{{$post->name}}">
                        @endif

                        {!! $post->description !!}

                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Latest posts</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($latest_posts as $latest_post_item)
                            <a href="{{ url('kitchen/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug)}}" class="text-decoration-none">
                                <h6> > {{ $latest_post_item->name}} < </h6>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

      

    
            

        <div class="comment-area mt-4">

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
            @if (session('message'))
    
    
            <div class="alert alert-success">{{session('message')}}</div>
            
                @endif 
            <div class="card card-body">
                <h6 class="card-title">Leave a comment</h6>
                <form action="{{route('comments.store')}}" method="post" >
                    @csrf
                    <input type="hidden" name="post_slug" value="{{$post->slug}}">
                    <textarea name="comment_body" id="" rows="3" class="form-control " required></textarea>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>


            @forelse ($post->comments as $comment)
                
           

            <div class="comment-container card card-body shadow-sm mt-3">
                <div class="detail-area">
                    <h6 class="user-name mb-1">
                        @if ($comment->user)
                        {{$comment->user->name}}
                        @endif
                        <small class="ms-3 text-primary">
                            commented on : {{$comment->created_at->format('d-m-Y')}}
                        </small>

                    </h6>
                    <p class="user-comment mb-1">
                       {!! $comment->comment_body !!}
                        
                    </p>
                </div>
                @if (Auth::check() && Auth::id()==$comment->user_id)
                    
                <div>
                    {{-- <a href="" class="btn btn-primary btn-sm me-2">edit</a> --}}
                    <button href="" type="button" value="{{$comment->id}}" class="deleteComment btn btn-danger btn-sm me-2">Delete</button>
                </div>
                @endif
            </div>

            @empty

            <div class="card card-body shadow-sm mt-3">

            <h6>no comments on this post</h6>
            </div>
                
            @endforelse


        </div>
    </div>
                

</div>
    
@endsection

@section('scripts')

<script>
    $(document).ready(function () {




                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

        $(document).on('click','.deleteComment', function () {
            
            var thisClicked=$(this);
            var comment_id=thisClicked.val();

            $.ajax({
                type: "post",
                url: "/delete-comment",
                data: {
                    'comment_id':comment_id
                },
                
                success: function (res) {
                    if(res.status ==200)
                    {
                        thisClicked.closest('.comment-container').remove();
                        alert(res.message);
                    }
                    else
                    {
                        alert(res.message);
                    }
                }
            });

        });
    });
</script>
    
@endsection
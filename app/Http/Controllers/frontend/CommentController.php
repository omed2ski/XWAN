<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) 
        {
            $validator=Validator::make($request->all(),
        [
            'comment_body'=>['required','string'],
        ]);

            if ($validator->fails()) {
                return redirect()->back()->with('message','comment area is required ');
            }

           $post=Post::where('slug',$request->post_slug)->where('status','0')->first();
           if ($post)
            {
             Comment::create([
                'post_id'=>$post->id,
                'user_id'=>Auth::user()->id,
                'comment_body'=>$request->comment_body,

             ]);

             return redirect()->back()->with('message','commented successfuly');

            }
            else 
            {
               return redirect()->back()->with('message','no such post found');
            }
        }
        else
        {
           return redirect('login')->with('message','You are not logged in! log-in to comment');
        }
        
    }

    public function destroy(Request $request)
    {
        if (Auth::check()) 
        {
            $comment=Comment::where('id',$request->comment_id)->where('user_id',Auth::user()->id)->first();

            if ($comment) 
            {
                $comment->delete();

            // 200=ok or success

            return response()->json([
                'status'=>200,
                'message'=>'comment deleted successfuly',
            ]);
            } 
            
            else {

                // 500=the server encountered an unexpected condition that prevented it from fulfilling the
                return response()->json([
                    'status'=>500,
                    'message'=>'something went wrong with the server',
                ]);
            }
            
           
        } 
        else
        {

            // 401=Unauthorized response
            return response()->json([
                'status'=>401,
                'message'=>'to delete this comment you have to log-in to your account',
            ]);
        }
        
    }
}

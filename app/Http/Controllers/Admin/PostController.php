<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $post=Post::all();
        $category=Category::where('status','0')->get();
        return View('admin.post.index',compact('category','post'));
    }

    public function store(PostFormRequest $request)
    {
        $post=new Post();

        $post->category_id=$request->category_id;
        $post->name=$request->name;
        $post->slug=Str::slug($request->slug);

        if ($request->hasfile('cover_img'))
        {
           $file=$request->cover_img;
           $fileName=time().'.'.$file->getClientOriginalExtension();
           $file->move('uploads/postCover/',$fileName);
           $post->cover_img=$fileName;
       }

       if ($request->hasfile('yt_link'))
        {
           $file=$request->yt_link;
           $fileName=time().'.'.$file->getClientOriginalExtension();
           $file->move('uploads/videos/',$fileName);
           $post->yt_link=$fileName;
       }
    //    $post->yt_link=$request->yt_link;

        $post->description=$request->description;
        $post->meta_title=$request->meta_title;
        $post->meta_description=$request->meta_description;
        $post->meta_keyword=$request->meta_keyword;
        $post->status=$request->status == true ? '1':'0';
        $post->created_by=Auth::user()->id;
        $post->save();

        return redirect()->route('posts.index')->with('message','post added successfully');

    }

    public function update(PostFormRequest $request,Post $post)
    {
        $post->category_id=$request->category_id;
        $post->name=$request->name;
        $post->slug=Str::slug($request->slug);

        if ($request->hasfile('cover_img'))
        {
            $destination='uploads/postCover/'.$post->cover_img;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

           $file=$request->cover_img;
           $fileName=time().'.'.$file->getClientOriginalExtension();
           $file->move('uploads/postCover/',$fileName);
           $post->cover_img=$fileName;
       }


       if ($request->hasfile('yt_link'))
        {
            $vdestination='uploads/videos/'.$post->yt_link;
            if (File::exists($vdestination)) {
                File::delete($vdestination);
            }
           $file=$request->yt_link;
           $fileName=time().'.'.$file->getClientOriginalExtension();
           $file->move('uploads/videos/',$fileName);
           $post->yt_link=$fileName;
       }

        $post->description=$request->description;

        $post->meta_title=$request->meta_title;
        $post->meta_description=$request->meta_description;
        $post->meta_keyword=$request->meta_keyword;

       
        $post->status=(bool) $request->status ==true ? '1':'0';
        $post->created_by=Auth::user()->id;

        $post->update();

        return redirect()->route('posts.index')->with('message','post updated successfully');

    }

    public function destroy(Post $post)
    {
        if ($post) {
            $post->delete();
            return redirect()->route('posts.index')->with('message','post deleted successfully');
        }
        else {
            return redirect()->route('posts.index')->with('message','No Post found');
        }
    }


}

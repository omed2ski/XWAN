<?php

namespace App\Http\Controllers\frontend;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        $setting=Setting::find(1);
        $all_categories=Category::where('status','0')->get();
        $all_posts=Post::where('status','0')->paginate(6);
        $latest_posts=Post::where('status','0')->orderBy('created_at','DESC')->get()->take(10);
        return View('frontend.index',compact('all_categories','latest_posts','setting','all_posts'));
    }

    public function viewCategoryPost(string $category_slug)
    {

        $category=Category::where('slug',$category_slug)->where('status','0')->first();
        if ($category) {
            $post=Post::where('category_id',$category->id)->where('status','0')->paginate(10);

            return View('frontend.post.index',compact('post','category'));
        }
        else {
            return redirect('/');
        }


    }
    
    public function viewPost(string $category_slug,string $post_slug)
    {
        $category=Category::where('slug',$category_slug)->where('status','0')->first();
        if ($category) {
            $post=Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','0')->first();
            $latest_posts=Post::where('category_id',$category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(10);

            return View('frontend.post.view',compact('post','latest_posts'));
        }
        else
        {
            return redirect('/');
        }
    }



    public function aboutUs()
    {
        return View('frontend.about');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){

        $categories=Category::count();
        $posts=Post::count();
        $users=User::where('role','0')->count();
        $admins=User::where('role','1')->count();

        return View('admin.dashboard.dashboard',compact('categories','posts','users','admins'));
    }
}

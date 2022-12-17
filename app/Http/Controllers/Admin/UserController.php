<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();

        return View('admin.user.index',compact('users'));
    }


    public function update(Request $request,User $user)
    {
        if ($user)
         {
            $user->role=$request->role;
            $user->update();

            return redirect()->route('users.index')->with('message','user updated successfully');
        }
        return redirect()->route('users.index')->with('message','No user Found');
    }
}

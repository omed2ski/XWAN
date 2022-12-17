<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CatregoryFormRequest;

use Illuminate\Support\Str;

use App\Models\Category;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category=Category::all();
        return View('admin.category.index')->with('category',$category);
    }


    public function store(CatregoryFormRequest $request)
    {
            //  $request->validate([
            //     'name'=>['required','string','max:200'],
            //     'slug'=>['required','string','max:200'],
            //     'description'=>'required',
            //     'meta_title'=>['required','string','max:200'],
            //     'meta_description'=>['required','string'],
            //     'meta_keyword'=>['required','string'],
            //     'navbar_status'=>['boolean'],
            //     'status'=>['boolean']
            //  ]);

            $category=new Category();

            $category->name=$request->name;
            $category->slug=Str::slug($request->slug);
            $category->description=$request->description;

            if ($request->hasfile('image'))
             {
                $file=$request->image;
                $fileName=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/category/',$fileName);
                $category->image=$fileName;
            }

            $category->meta_title=$request->meta_title;
            $category->meta_description=$request->meta_description;
            $category->meta_keyword=$request->meta_keyword;

            $category->navbar_status=(bool) $request->navbar_status ==true ? '1':'0';
            $category->status=(bool) $request->status ==true ? '1':'0';
            $category->created_by=Auth::user()->id;

            $category->save();

            return redirect()->route('category.index')->with('message','Category added successfully');
    }

    public function update(CatregoryFormRequest $request,Category $category)
    {
        $category->name=$request->name;
        $category->slug=Str::slug($request->slug);
        $category->description=$request->description;

        if ($request->hasfile('image'))
             {
                $destination='uploads/category/'.$category->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file=$request->image;
                $fileName=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/category/',$fileName);
                $category->image=$fileName;
            }

          

        $category->meta_title=$request->meta_title;
        $category->meta_description=$request->meta_description;
        $category->meta_keyword=$request->meta_keyword;

        $category->navbar_status=(bool) $request->navbar_status ==true ? '1':'0';
        $category->status=(bool) $request->status ==true ? '1':'0';
        $category->created_by=Auth::user()->id;

        $category->update();

        return redirect()->route('category.index')->with('message','Category updated successfully');

    }

    public function destroy(Category $category)
    {
        if ($category) {
            $destination='uploads/category/'.$category->image;
            if (File::exists($destination)) {
                File::delete($destination);
                
            }
            $category->posts()->delete();
            $category->delete();
            return redirect()->route('category.index')->with('message','Category Deleted with its post successfully');
        }
        
        else {
            return redirect()->route('category.index')->with('message','no Category Found');
           
        }



    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index(){

        $setting=Setting::find(1);
        return View('admin.setting.index',compact('setting'));
    }

    public function saveData(Request $request)
    {
        $validator=Validator::make($request->all(),[

            'web_name'=>'required|max:255',
            'web_logo'=>'nullable',
            'web_favicon'=>'nullable',
            'description'=>'nullable',
            'meta_title'=>'nullable|max:255',
            'meta_keyword'=>'nullable',
            'meta_description'=>'nullable',


        ]);


        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator);

        } 
        
       $setting=Setting::where('id','1')->first();
       if ($setting)
        {
            $setting->web_name=$request->web_name;

           

            if ($request->hasfile('web_logo'))
             {
                $destination='uploads/settings/'.$setting->web_logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file=$request->web_logo;
                $fileName=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/settings/',$fileName);
                $setting->logo=$fileName;
            }


            if ($request->hasfile('web_favicon'))
            {

                $destination='uploads/settings/'.$setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

               $file=$request->web_favicon;
               $fileName=time().'.'.$file->getClientOriginalExtension();
               $file->move('uploads/settings/',$fileName);
               $setting->favicon=$fileName;
           }

            


            $setting->description=$request->description;
            
            $setting->meta_title=$request->meta_title;
            $setting->meta_keyword=$request->meta_keyword;
            $setting->meta_description=$request->meta_description;
            $setting->save();

            return redirect('admin/settings')->with('message','setting updated');
        } 
       else
        {
            $setting=new Setting;

            $setting->web_name=$request->web_name;

           

            if ($request->hasfile('web_logo'))
             {
                $file=$request->web_logo;
                $fileName=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/settings/',$fileName);
                $setting->logo=$fileName;
            }


            if ($request->hasfile('web_favicon'))
            {
               $file=$request->web_favicon;
               $fileName=time().'.'.$file->getClientOriginalExtension();
               $file->move('uploads/settings/',$fileName);
               $setting->favicon=$fileName;
           }

            

           $setting->description=$request->description;

            $setting->meta_title=$request->meta_title;
            $setting->meta_keyword=$request->meta_keyword;
            $setting->meta_description=$request->meta_description;
            $setting->save();

            return redirect('admin/settings')->with('message','setting added');


        }
       
        
    }
}

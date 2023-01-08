<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Session;
use DB;

class CompanyController extends Controller
{
    public function index()
    {
        $title="Company";
        $type="main";
        $companies=Company::first();
        return view("company.index",compact("companies","title","type"));
    }

    public function about()
    {
        $title="About";
        $type="about";
        $companies=Company::first();
        return view("company.index",compact("companies","title","type"));
    }

    public function banner()
    {
        $title="Top Banner";
        $type="banner";
        $companies=Company::first();
        return view("company.index",compact("companies","title","type"));
    }

    public function why_us()
    {
        $title="Why Choose Us?";
        $type="why_us";
        $companies=Company::first();
        return view("company.index",compact("companies","title","type"));
    }

    public function update(Request $request)
    {
        $folderpath="company/";
        $company=Company::find($request->id);
        if(isset($request->name)){
            $company->name=$request->name;
            $company->email=$request->email;
            $company->phone=$request->phone;
            $company->location=$request->address;
            $company->facebook=$request->facebook;
            $company->linkedin=$request->linkedin;
            $company->instagram=$request->instagram;
            $company->short_desc=$request->short_desc;
            $company->map_radius=$request->map_radius;
        
            $company->meta_title=$request->meta_title;
            $company->meta_keyword=$request->meta_keyword;
            $company->meta_description=$request->meta_description;

            if($request->hasFile('logo')){
                $filenameWithExt = $request->file('logo')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('logo')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('logo')->storeAs($folderpath,$fileNameToStore);
                $company->logo = "storage/".$folderpath.'/'.$fileNameToStore;
            }

            if($request->hasFile('favicon')){
                $filenameWithExt = $request->file('favicon')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('favicon')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('favicon')->storeAs($folderpath,$fileNameToStore);
                $company->favicon = "storage/".$folderpath.'/'.$fileNameToStore;
            }

        }
        if(isset($request->about_title)){
            $company->about_title=$request->about_title;
            $company->about=$request->about;
            $company->vision=$request->vision;
            $company->mission=$request->mission;
            
        
            if($request->hasFile('about_image')){
                $filenameWithExt = $request->file('about_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('about_image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('about_image')->storeAs($folderpath,$fileNameToStore);
                $company->about_image = "storage/".$folderpath.'/'.$fileNameToStore;
            }
        }

        if(isset($request->main_content)){
            $company->main_content=$request->main_content;

        
            if($request->hasFile('main_image')){
                $filenameWithExt = $request->file('main_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('main_image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('main_image')->storeAs($folderpath,$fileNameToStore);
                $company->main_image = "storage/".$folderpath.'/'.$fileNameToStore;
            }
        }

        if(isset($request->why_us)){
            $company->why_us=$request->why_us;
            $company->why_us_content=$request->why_us_content;

        
            if($request->hasFile('why_us_image')){
                $filenameWithExt = $request->file('why_us_image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('why_us_image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('why_us_image')->storeAs($folderpath,$fileNameToStore);
                $company->why_us_image = "storage/".$folderpath.'/'.$fileNameToStore;
            }
        }

        if($company->save()){
            return back()->with("success","Updated Successfully");
        }
    }

 
}

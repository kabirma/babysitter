<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Session;
use DB;
use Auth;

class SliderController extends Controller
{
    public function index()
    {
       $title="Slider";
       $sliders=Slider::get();
       return view("slider.index",compact("sliders","title"));
    }

    public function add()
    {
        $title="Slider";
      
        return view("slider.add",compact("title"));
    }

    public function edit($id)
    {
        $title="Slider";
        
        $sliders=Slider::find($id);
        
        return view("slider.add",compact("title","sliders"));
    }

    public function create(Request $request)
    {
        $slider=new Slider;
        $slider->heading=$request->heading;
        
        $slider->admin_id=Auth::guard('admin')->user()->id;
        $slider->description=$request->description;
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs("images/slider/",$fileNameToStore);
            $slider->image = "storage/images/slider/".$fileNameToStore;
        
        }
        if($request->hasFile('mobileimage')){
            $filenameWithExt = $request->file('mobileimage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('mobileimage')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('mobileimage')->storeAs("images/slider/",$fileNameToStore);
            $slider->mobileimage = "storage/images/slider/".$fileNameToStore;
        
        }
        if($slider->save()){
            return redirect()->route('sliderview')->with("success","Slider Created Successfully");

        }
       
    }

    public function update(Request $request)
    {
        $slider=Slider::find($request->id);
     
        $slider->heading=$request->heading;
        
        $slider->admin_id=Auth::guard('admin')->user()->id;
        $slider->description=$request->description;
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs("images/slider/",$fileNameToStore);
            $slider->image = "storage/images/slider/".$fileNameToStore;
        
        }
        if($request->hasFile('mobileimage')){
            $filenameWithExt = $request->file('mobileimage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('mobileimage')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('mobileimage')->storeAs("images/slider/",$fileNameToStore);
            $slider->mobileimage = "storage/images/slider/".$fileNameToStore;
        
        }
        if($slider->save()){
            return redirect()->route('sliderview')->with("success","Slider Updated Successfully");
        }
    }

    public function delete($id)
    {
        DB::delete("delete from sliders where id='$id'");
        return redirect()->route('sliderview')->with("success","Slider Deleted Successfully");
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Session;
use DB;
use Auth;

class TestimonialController extends Controller
{
    public function index()
    {
       $title="Testimonials";
       $testimonials=Testimonial::get();
       return view("testimonial.index",compact("testimonials","title"));
    }

    public function add()
    {
        $title="Testimonials";
      
        return view("testimonial.add",compact("title"));
    }

    public function edit($id)
    {
        $title="Testimonials";
     
        $testimonials=Testimonial::find($id);
        
        return view("testimonial.add",compact("title","testimonials"));
    }

    public function create(Request $request)
    {
        $testimonial=new Testimonial;
        $testimonial->name=$request->name;
        $testimonial->email=$request->email;
        $testimonial->designation=$request->designation;
        $testimonial->review=$request->review;
        
        if($testimonial->save()){
            return redirect()->route('testimonialview')->with("success","Testimonial Created Successfully");

        }
       
    }

    public function update(Request $request)
    {
        $testimonial=Testimonial::find($request->id);
       $testimonial->name=$request->name;
        $testimonial->email=$request->email;
        $testimonial->designation=$request->designation;
        $testimonial->review=$request->review;
        
        if($testimonial->save()){
            return redirect()->route('testimonialview')->with("success","Testimonial Updated Successfully");
        }
    }

    public function delete($id)
    {
        DB::delete("delete from testimonials where id='$id'");
        return redirect()->route('testimonialview')->with("success","Testimonial Deleted Successfully");
    }

}

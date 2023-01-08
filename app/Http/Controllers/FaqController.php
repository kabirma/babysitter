<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use Session;
use DB;
use Auth;

class FaqController extends Controller
{
    public function index()
    {
       $title="FAQs";
       $faqs=Faq::get();
       return view("faq.index",compact("faqs","title"));
    }

    public function add()
    {
        $title="FAQs";
      
        return view("faq.add",compact("title"));
    }

    public function edit($id)
    {
        $title="FAQs";
        
        $faqs=Faq::find($id);
        
        return view("faq.add",compact("title","faqs"));
    }

    public function create(Request $request)
    {
        $faq=new Faq;
        $faq->question=$request->question;
        $faq->answer=$request->answer;
        $faq->admin_id=Auth::guard('admin')->user()->id;
        if($faq->save()){
            return redirect()->route('faqview')->with("success","faq Created Successfully");

        }
       
    }

    public function update(Request $request)
    {
        $faq=Faq::find($request->id);
     
        $faq->question=$request->question;
        $faq->answer=$request->answer;
        $faq->admin_id=Auth::guard('admin')->user()->id;
       
        if($faq->save()){
            return redirect()->route('faqview')->with("success","Faq Updated Successfully");
        }
    }

    public function delete($id)
    {
        DB::delete("delete from faqs where id='$id'");
        return redirect()->route('faqview')->with("success","Faq Deleted Successfully");
    }

}

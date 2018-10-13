<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$faqs = Faq::oldest()->paginate();
    	return view('faq.index',compact('faqs'));
    }

    public function create(Request $request, $data){
    	return view('faq.create')->with(['data'=>$data]);
    }    

    public function store(Request $request,Faq $faq){
    	$request->validate([
    		'title'=>'required',    		
    		'content_position'=>'required',
            'description'=>'required'
    	]);        

    	Faq::create( $request->all());
    	return redirect()->route('faqs.index')->with('success','Service upload successfully');
    }

    public function edit(Faq $faq)
    {
        return view('faq.edit',compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {

        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ]);
  
        $faq->update($faq->all());
  
        return redirect()->route('faqs.index')
                        ->with('success','Service updated successfully');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')
                        ->with('success','Faq deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Mail;
use App\Query;
use App\Mail\TestMail;
use Illuminate\Http\Request;

class QueriesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth',['except' => ['store']]);
    }

    public function index(){
    	$queries = Query::latest()->paginate();
    	return view('query.index',compact('queries'));
    }

    public function store(Request $request,Query $query){    	
    	$request->validate([
    		'name'=>'required',    		
    		'email'=>'required',
            'message'=>'required'
    	]);        
    	$for_reciver = [
    				'message' => $request->message,
    				'from'=>$request->email,
    				'name'=>$request->name,
    				'subject'=>$request->subject
    			];    	
        Mail::to('gurpreet.indybytes@gmail.com')->send(new TestMail($for_reciver));
        $for_sender = [
                    'message' => "Thank you $request->name",
                    'from'=>'no-reply@indybytes.com',
                    'name'=>$request->name,
                    'subject'=>'Thnak you'
                ];
        Mail::to($request->email)->send(new TestMail($for_sender));                
    	Query::create($request->all());

        
    	return redirect()->route('website.index')->with('success','Service upload successfully');
    }    

    public function destroy(Query $query)
    {
        $query->delete();
        return redirect()->route('queries.index')
                        ->with('success','Query deleted successfully');
    }
}

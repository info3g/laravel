<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    	$services = Service::latest()->paginate();
    	return view('services.index',compact('services'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create(){
    	return view('services.create');
    }    

    public function store(Request $request,Service $service){
    	$request->validate([
    		'title'=>'required',
            'description'=>'required'
    	]);        

    	Service::create( $request->all());
    	return redirect()->route('service.index')->with('success','Service upload successfully');
    }

    public function edit(Service $service)
    {
        return view('services.edit',compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
  
        $service->update($request->all());
  
        return redirect()->route('service.index')
                        ->with('success','Service updated successfully');
    }    

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')
                        ->with('success','Serviec deleted successfully');
    }
}

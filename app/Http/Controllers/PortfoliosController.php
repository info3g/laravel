<?php

namespace App\Http\Controllers;

use App\Portfolio;
use File;
use DB;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');    	
    }

    public function index(){
    	$portfolios = Portfolio::latest()->paginate();
    	return view('portfolio.index',compact('portfolios'));
    }

    public function create() {
    	return view('portfolio.create');
    }

    public function store(Request $request){
    	$path = public_path().'/profile_images';

    	if(!File::exists($path)) {
		    File::makeDirectory($path, $mode = 0777, true, true);
		}

		$request->validate([
    		'title'=>'required',
    		'technology'=>'required',
    		'image'=>'required'
    	]);

    	$imageName = time().'.'.request()->image->getClientOriginalExtension();    	
        request()->image->move(public_path('portfolio'), $imageName);     
        $image = 'portfolio/'.$imageName;          
        Portfolio::create(['title'=>$request->title,
    					'technology'=>$request->technology,                        
                        'image'=>$image
                    ]);
        return redirect()->route('portfolios.index');
    }

    public function edit(Portfolio $portfolio){
        return view('portfolio.edit',compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required',
            'technology' => 'required'
        ]);
        $portfolio->update($request->all());
        return redirect()->route('portfolios.index')
                        ->with('success','Portfolio updated successfully');
    }  

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolios.index')
                        ->with('success','Portfolio deleted successfully');
    }

    public function updateImage($id) {
        $portfolio = Portfolio::find($id);  
        return view('portfolio.updateimage',compact('portfolio'));
    }

    public function uploadImage($id) {
        DB::table('portfolios')->where('id',$id);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('portfolio'),$imageName);
        $image = 'portfolio/'.$imageName;          
        DB::table('portfolios')
            ->where('id', $id)
            ->update([
                        'image' => $image                       
                    ]);
        return redirect()->route('portfolios.index');
    }
}

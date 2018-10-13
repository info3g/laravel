<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use File;
use DB;
class SlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$sliders = Slider::oldest()->paginate();
    	return view('sliders.index',compact('sliders'));
    }

    public function create(){
    	return view('sliders.create');
    }

    public function store(Request $request,Slider $slider) {
    	$path = public_path().'/slider_images';
    	
    	if(!File::exists($path)) {
		    File::makeDirectory($path, $mode = 0777, true, true);
		}
    	$request->validate([
    		'title1'=>'required',
    		'image'=>'required'
    	]);

    	$imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('slider_images'), $imageName);

       	$image = 'slider_images/'.$imageName;
    	Slider::create(  ['title1'=>$request->title1,
    					'title2'=>$request->title2,                        
                        'image'=>$imageName]);
    	return redirect()->route('slider.index');
    }

    public function edit(Slider $slider){
        return view('sliders.edit',compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title1' => 'required',
            'title2' => 'required'
        ]);
  
        $slider->update($request->all());
  
        return redirect()->route('slider.index')
                        ->with('success','Slider updated successfully');
    }

    public function updateImage($id) {
        $slider = Slider::find($id);  
        return view('sliders.updateimage',compact('slider'));
    }

    public function uploadImage($id) {
        DB::table('sliders')->where('id',$id);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('slider_images'), $imageName);
        DB::table('sliders')
            ->where('id', $id)
            ->update([
                        'image' => $imageName                       
                    ]);
        return redirect()->route('slider.index');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index')
                        ->with('success','Serviec deleted successfully');
    }
}
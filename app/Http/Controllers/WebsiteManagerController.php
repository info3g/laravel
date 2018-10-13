<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use DB;

class WebsiteManagerController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$blogs = Blog::oldest()->paginate();
    	return view('websitemanager.index',compact('blogs'))->with('i',(request()->input('page',1)-1)*5);
    }
    
    public function create(){
    	return view('websitemanager.create');
    }
    
    public function store(Request $request) {
    	$request->validate([
    		'title'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

    	Blog::create(  ['title'=>$request->title,
                        'description'=>$request->description,
                        'image'=>$imageName]);
    	return redirect()->route('websitemanager.index')->with('success','Post upload successfully');
    }

    public function edit(Blog $blog,$id)
    {
        $blog = Blog::find($id);        
        return view('websitemanager.edit',compact('blog'));
    }
      
    public function update(Request $request, Blog $blog,$id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
  
        $title = $request->all()['title'];
        $description = $request->all()['description'];
        DB::table('blogs')
            ->where('id', $id)
            ->update([
                        'title' => $title,
                        'description' => $description
                    ]);
  
        return redirect()->route('websitemanager.index')
                        ->with('success','Blog updated successfully');
    }

    public function destroy(Blog $blog, $id) {        
        DB::table('blogs')->where('id',$id)->delete();
        return redirect()->route('websitemanager.index');
    }

    public function updateImage($id) {
        $blog = Blog::find($id);  
        return view('websitemanager.updateimage',compact('blog'));
    }

    public function uploadImage($id) {
        DB::table('blogs')->where('id',$id);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        DB::table('blogs')
            ->where('id', $id)
            ->update([
                        'image' => $imageName                       
                    ]);
        return redirect()->route('websitemanager.index');
    }
}

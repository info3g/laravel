<?php

namespace App\Http\Controllers;
use App\Team;
use File;
use DB;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    Public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$teams = Team::latest()->paginate();    
    	return view('team.index',compact('teams'));
    }

    public function create(){
    	return view('team.create');
    }

    public function store(Request $request,Team $team){
    	$path = public_path().'/profile_images';

    	if(!File::exists($path)) {
		    File::makeDirectory($path, $mode = 0777, true, true);
		}

		$request->validate([
    		'employe_name'=>'required',
    		'position'=>'required',
    		'image'=>'required'
    	]);

    	$imageName = time().'.'.request()->image->getClientOriginalExtension();    	
        request()->image->move(public_path('profile_images'), $imageName);               
        Team::create(['employe_name'=>$request->employe_name,
    					'position'=>$request->position,                        
                        'image'=>$imageName
                    ]);
        return redirect()->route('teams.index');
    } 

    public function edit(Team $team){
        return view('team.edit',compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'employe_name' => 'required',
            'position' => 'required'
        ]);
        $team->update($request->all());
        return redirect()->route('teams.index')
                        ->with('success','Team data updated successfully');
    }   

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')
                        ->with('success','Team member deleted successfully');
    }

    public function updateImage($id) {
        $team = Team::find($id);  
        return view('team.updateimage',compact('team'));
    }

    public function uploadImage($id) {
        DB::table('teams')->where('id',$id);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('profile_images'), $imageName);
        DB::table('teams')
            ->where('id', $id)
            ->update([
                        'image' => $imageName                       
                    ]);
        return redirect()->route('teams.index');
    }
}

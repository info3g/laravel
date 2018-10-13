<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Excel;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$redirectTo = '/dashboard';
    	$users = User::latest()->where('role','user')->paginate(5);            	
        return view('dashboard.index',compact('users')) ;
    } 

    public function show(){
        return view('dashboard.dashboard') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit(User $product,$id) {    	
    	$user = User::find($id);
        return view('dashboard.edit',compact('user'));
    }

    public function update(Request $request, User $user,$id)
    {    	
        $request->validate([
            'name' => 'required'            
        ]);
  		$name = $request->all()['name'];  		
        DB::table('users')
            ->where('id', $id)
            ->update(['name' => $name]);
        return redirect()->route('dashboard');
    }

    public function activeUser(User $user,$id = null){
    	DB::table('users')
            ->where('id', $id)
            ->update(['status' => 1]);        	
            return redirect()->route('dashboard');
    }

    public function destroy(User $user, $id)
    {        
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('dashboard');
    }

    public function deactiveUser(User $user,$id = null){
    	DB::table('users')
            ->where('id', $id)
            ->update(['status' => 0]);
            return redirect()->route('dashboard');
    }

    public function exportFile($type,Request $request){
        if(isset($request->all()['user_id'])){
            $users = array();
            $user_ids = $request->all()['user_id'];
            foreach ($user_ids as $id) {
                $data = User::get()->where('id',$id)->first()->toArray();
                array_push($users, $data);
            }
            return Excel::create('export_data', function($excel) use ($users) {
                $excel->sheet('sheet name', function($sheet) use ($users)
                {
                    $sheet->fromArray($users);

                });
            })->download($type);
        }
        else{
            return redirect()->route('dashboard')->with('error','Select at least one row !');
        }        
    }
}

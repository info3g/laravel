<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index(){
    	return view('search.search');
    }

    public function search(Request $request){
    	if($request->ajax()){
    		$output = '';
    		$users = DB::table('users')->where('email','LIKE','%'.$request->search.'%')->get();
    		if($users){
    			foreach ($users as $key => $user) {
    				$output.='<tr>'.
    				'<td>'.$user->id.'<td>'.
    				'<td>'.$user->name.'<td>'.
    				'<td>'.$user->email.'<td>'.
    				'<td>'.$user->created_at.'<td>'.
    				'<tr>';
    			}
    			return 
    		}
    	}
    }
}

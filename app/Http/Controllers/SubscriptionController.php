<?php

namespace App\Http\Controllers;


use Mail;
use DB;
use App\Mail\TestMail;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$subscribers = Subscription::oldest()->paginate(5);
    	return view('subscriptions.index',compact('subscribers'));
    }

    public function create(){
    	return view('subscriptions.create');
    }    

    public function store(Request $request,Subscription $subscription){    	
    	$request->validate([
    		'email'=>'required'            
    	]);                
        $data = ['message' => 'This is a test mail from sendgrid API'];
        Mail::to($request->email)->send(new TestMail($data));
    	Subscription::create( $request->all());
    	return redirect()->route('website.index');
    }

    public function search(Request $request) {        
        if($request->ajax()) {                        
            $output="";            
            $products=DB::table('subscriptions')->where('email','LIKE','%'.$request->search."%")->paginate(5);
            if($products) {
                foreach ($products as $key => $product) {                    
                    $output.='<tr>'.                    
                    '<td>'.$product->email.'</td>'.
                    '<td>'.$product->ip_address.'</td>'.
                    '</tr>';
                }                
                return Response($output);                
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use App\Faq;
use App\News;
use App\Team;
use App\blog;
use App\Slider;
use App\Service;
use App\Portfolio;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }

    public function index(){
    	$technology_array = array();
    	$portfolio_items = Portfolio::oldest()->paginate();    	
    	foreach ($portfolio_items as $portfolio) {
	        array_push($technology_array, $portfolio->technology);
	    } 
    	$technologies = array_unique($technology_array);    	
    	$technology_count = count($technologies);    
    	$tech = array_values($technologies);    	    	
    	$tables = array('blog'=>Blog::latest()->paginate(1),
						'service'=>Service::latest()->paginate(),
						'slider'=>Slider::latest()->paginate(),
						'faq_right'=>Faq::latest()->where('content_position','right')->paginate(150),
						'faq_left'=>Faq::latest()->where('content_position','left')->paginate(150),
						'team'=>Team::latest()->paginate(),
						'portfolio'=>Portfolio::latest()->paginate(),
						'technologies'=>$tech,
						'technology_count'=>$technology_count,
                        'news'=>News::with('comments')->paginate(),                        
    				);
    	return view('website.index',compact('tables'));
    }

    public function profile(){
        return view('website.profile');
    }

    public function show($id){
       // $blog = DB::table('news')->with('comments')->where('id',$id)->get();
       $blog = News::with('comments')->where('id',$id)->paginate();
        return view('website.show',compact('blog'));
    }
}

<?php

namespace App\Http\Controllers;
use File;
use DB;
use App\News;
use Illuminate\Http\Request;
use App\Http\Resources\News as NewsResource;

class NewsController extends Controller
{
    public function __construct() {        
        $allowed_method = ['getNewsList','getNews','addNews','deleteNews'];
    	$this->middleware('auth',['except'=>$allowed_method]);
    }

    public function index(){
    	// $blogs = News::latest()->paginate();
    	$blogs = News::with('comments')->paginate();
    	return view('news.index',compact('blogs'));
    }

    public function create(){
    	return view('news.create');
    }

    public function store(Request $request,News $news){
    	$path = public_path().'/news_images';

    	if(!File::exists($path)) {
		    File::makeDirectory($path, $mode = 0777, true, true);
		}

		$request->validate([
    		'title'=>'required',
    		'description'=>'required',
    		'image'=>'required'
    	]);

    	$imageName = time().'.'.request()->image->getClientOriginalExtension();    	
        request()->image->move(public_path('news_images'), $imageName);               
        $image = 'news_images/'.$imageName;
        $short_title = substr($request->description,0,200);        
        $data = [	'title'=>$request->title,
					'short_title'=>$short_title.'...',                        
					'description'=>$request->description,                        
		            'image'=>$image
		        ];
        News::create($data);
        return redirect()->route('news.index');
    }

    public function edit(News $news){
        return view('news.edit',compact('news'));
    }

    public function update(Request $request, News $news) {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $short_title = substr($request->description,0,200);
        $data = [	'title'=>$request->title,
					'short_title'=>$short_title,                        
					'description'=>$request->description		          
		        ];
        $news->update($data);
        return redirect()->route('news.index')
                        ->with('success','News data updated successfully');
    }

    public function updateImage($id) {
        $news = News::find($id);  
        return view('news.updateimage',compact('news'));
    }

    public function uploadImage($id) {
        DB::table('news')->where('id',$id);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('news_images'), $imageName);
        $image = 'news_images/'.$imageName;
        DB::table('news')
            ->where('id', $id)
            ->update([
                        'image' => $image                       
                    ]);
        return redirect()->route('news.index');
    }

/*============================================  API CODE START FROM HERE  ============================================*/
    public function getNewsList($pageNumber = 1){  
        $news = News::with('comments')->paginate(5, ['*'], 'page', $pageNumber);
        foreach ($news as $value) {
            $value->image = URL.$value->image;
        }
        return NewsResource::collection($news);
    }

    public function getNews($id){        
        $news = News::with('comments')->findOrfail($id);
        Log::useDailyFiles(storage_path().'/logs/test_log.log');
        Log::error('testing ');
        return new NewsResource($news);
    }

    public function addNews(Request $request){  
        $news = $request->isMethod('put') ? News::findOrFail($request->id) : new News;
        $news->id = $request->input('id');
        $news->title = $request->input('title');        
        $news->description = $request->input('description');        
        $news->short_title = substr($request->input('description'),0,100);
        if($news->save()) {
            return new NewsResource($news);
        }
    }

    public function deleteNews($id){
        $news = News::findOrfail($id);
        if($news->delete()) {
            return new NewsResource($news);
        } 
    }
}

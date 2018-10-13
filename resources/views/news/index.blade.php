<!-- load app.blade.php file from app folder -->
@extends('layouts.app')
<!-- Load content from app.blade.php file from app folder-->
@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
	<div class="row">
	    <div class="col-lg-12 margin-tb">        
	        <div class="pull-right">
	        	<a class="btn btn-sm btn-primary" href="{{route('news.create')}}">Add news</a>
	        </div>	        
	    </div>
	</div>
	<ol class="breadcrumb">
	    <li class="breadcrumb-item active">
	        <a href="{{route('news.index')}}">News List</a>
	    </li>	    
	    <!-- <li class="breadcrumb-item active">Overview</li> -->
    </ol>
	@if ($message = Session::get('success'))
	    <div class="alert alert-success notification notification-success">
	        <p>{{ $message }}</p>
	    </div>
	@endif
	<div class="card-body">
	        <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>						
						<th>Title</th>
						<th>Description</th>						
						<th>Image</th>						
						<th>Comment</th>						
						<th>Action</th>
						<th>Delete</th>
					</tr>					
					@foreach($blogs as $news)
					<tr>
						<td>{{$news->title}}</td>
						<td>{{$news->short_title}}</td>						
						<td><img src="{{$news->image}}" style="width:100px;"></td>	
						<td>
							{{count($news->comments)}}
						</td>										
						<td>
							<a href="{{route('news.edit',$news->id) }}">Edit</a>
							<a href="{{route('news.updateImage',$news->id)}}">Update image</a>
		            	</td>
		            	<td>
		            		<form action="{{ route('news.destroy',$news->id) }}" method="POST">
			                    @csrf
			                    @method('DELETE')			      
			                    <button type="submit" class="btn btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
			                </form>
		            	</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
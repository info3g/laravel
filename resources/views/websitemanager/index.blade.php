@extends('layouts.app')
 
@section('content')
<div class="container-fluid">
	@if ($message = Session::get('success'))
	    <div class="alert alert-success notification notification-success">
	        <p>{{ $message }}</p>
	    </div>
	@endif
	<div class="card mb-3">
		<div class="card-header">Blog List
			<div class="pull-right">
	        	<a class="btn btn-primary btn-sm" href="{{route('websitemanager.create')}}">Add Blog</a>
	        </div>
		</div>	
		<div class="card-body">
	        <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>
						<th>no</th>
						<th>Title</th>
						<th>description</th>
						<th>Image</th>
						<th>Action</th>
						<th>Delete</th>
					</tr>
					@foreach($blogs as $blog)
					<tr>
						<td>{{$blog->id}}</td>
						<td>{{$blog->title}}</td>
						<td>{{$blog->description}}</td>
						<td><img src="{{'images/'.$blog->image}}" style="width: 150px"></td>
						<td>
							<a href="{{route('websitemanager.updateImage',$blog->id)}}">Update image</a>
							<a href="{{route('websitemanager.edit',$blog->id)}}">Edit</a>
						</td>
						<td>
		            		<form action="{{ route('websitemanager.destroy',$blog->id) }}" method="POST">
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
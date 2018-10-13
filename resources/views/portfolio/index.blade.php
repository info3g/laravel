<!-- load app.blade.php file from app folder -->
@extends('layouts.app')
<!-- Load content from app.blade.php file from app folder-->
@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
	<div class="row">
	    <div class="col-lg-12 margin-tb">        
	        <div class="pull-right">
	        	<a class="btn btn-primary" href="{{route('portfolios.create')}}">Add new portfolio</a>
	        </div>	        
	    </div>
	</div>
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">
	        <a href="{{route('portfolios.index')}}">Portfolio List</a>
	    </li>	    
	    <!-- <li class="breadcrumb-item active">Overview</li> -->
    </ol>
	@if ($message = Session::get('success'))
	    <div class="alert alert-success notification notification-success">
	    	<button type="button" class="close" data-dismiss="alert">×</button>
	        <p>{{ $message }}</p>
	    </div>
	@endif
	<div class="card-body">
	        <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>						
						<th>Project Name</th>
						<th>Technology</th>						
						<th>Image</th>						
						<th>Action</th>
						<th>Delete</th>
					</tr>					
					@foreach($portfolios as $portfolio)
					<tr>
						<td>{{$portfolio->title}}</td>
						<td>{{$portfolio->technology}}</td>						
						<td><img src="{{$portfolio->image}}" style="width:100px;"></td>						
						<td>
							<a href="{{route('portfolios.edit',$portfolio->id) }}">Edit</a>
							<a href="{{route('portfolios.updateImage',$portfolio->id)}}">Update image</a>
		            	</td>
		            	<td>
		            		<form action="{{ route('portfolios.destroy',$portfolio->id) }}" method="POST">
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
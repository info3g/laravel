<!-- load app.blade.php file from app folder -->
@extends('layouts.app')
<!-- Load content from app.blade.php file from app folder-->
@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
	<div class="row">
	    <div class="col-lg-12 margin-tb">        
	        <div class="pull-right">
	        	<a class="btn btn-primary" href="{{route('teams.create')}}">Add new team member</a>
	        </div>	        
	    </div>
	</div>
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">
	        <a href="{{route('teams.index')}}">Team List</a>
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
						<th>Employe Name</th>
						<th>Position</th>						
						<th>Image</th>						
						<th>Action</th>
						<th>Delete</th>
					</tr>					
					@foreach($teams as $team)
					<tr>
						<td>{{$team->employe_name}}</td>
						<td>{{$team->position}}</td>						
						<td><img src="profile_images/{{$team->image}}" style="width:100px;"></td>						
						<td>
							<a href="{{route('teams.edit',$team->id) }}">Edit</a>
							<a href="{{route('teams.updateImage',$team->id)}}">Update image</a>
		            	</td>
		            	<td>
		            		<form action="{{ route('teams.destroy',$team->id) }}" method="POST">
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
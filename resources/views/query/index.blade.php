<!-- load app.blade.php file from app folder -->
@extends('layouts.app')
<!-- Load content from app.blade.php file from app folder-->
@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->	
	<ol class="breadcrumb">
	    <li class="breadcrumb-item active">
	        <a href="{{route('queries.index')}}">Query List</a>
	    </li>	    
	    <!-- <li class="breadcrumb-item">Overview</li> -->
    </ol>
	@if ($message = Session::get('success'))
	    <div class="alert alert-success">
	        <p>{{ $message }}</p>
	    </div>
	@endif
	<div class="card-body">
	        <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>						
						<th>Name</th>
						<th>Email</th>						
						<th>Subject</th>						
						<th>Message</th>												
						<th>Delete</th>
					</tr>					
					@foreach($queries as $query)
					<tr>
						<td>{{$query->name}}</td>
						<td>{{$query->email}}</td>												
						<td>{{$query->subject}}</td>												
						<td>{{$query->message}}</td>												
		            	<td>
		            		<form action="{{ route('queries.destroy',$query->id) }}" method="POST">
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
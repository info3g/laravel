@extends('layouts.app')
 
@section('content')
<div class="container-fluid">	
	@if ($message = Session::get('success'))
	    <div class="alert alert-success notification notification-success">
	        <p>{{ $message }}</p>
	    </div>
	@endif
	<div class="card mb-3">
		<div class="card-header">Service List			
			<div class="pull-right">				
				<a class="btn btn-primary btn-sm" href="{{route('service.create')}}">Add service</a>
			</div>
		</div>
		<div class="card-body">
	        <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Description</th>
						<th>Action</th>
						<th>Delete</th>
					</tr>
					@foreach($services as $service)
					<tr>
						<td>{{++$i}}</td>
						<td>{{$service->title}}</td>
						<td>{{$service->description}}</td>
						<td>
							<a href="{{route('service.edit',$service->id) }}">Edit</a>
		            	</td>
		            	<td>
		            		<form action="{{ route('service.destroy',$service->id) }}" method="POST">
			                    @csrf
			                    @method('DELETE')			      
			                    <button type="submit" class="btn btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
			                </form>
		            	</td>
					</tr>
					@endforeach
				</table>
				{{ $services->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
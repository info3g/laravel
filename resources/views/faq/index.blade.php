<!-- load app.blade.php file from app folder -->
@extends('layouts.app')
<!-- Load content from app.blade.php file from app folder-->
@section('content')
<div class="container-fluid">	
	@if ($message = Session::get('success'))
	    <div class="alert alert-success notification notification-success">
	        <p>{{ $message }}</p>
	    </div>
	@endif
	<div class="card mb-3">
		<div class="card-header">Faq List	
			<div class="pull-right">
	        	<a class="btn btn-primary btn-sm" href="{{route('faqs.create','right')}}">Add content to right</a>
	        </div>
	        <div class="pull-right mr-2">
	        	<a class="btn btn-primary btn-sm" href="{{route('faqs.create','left')}}">Add content to left</a>
	        </div>
		</div>
		<div class="card-body">
	        <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>						
						<th>Title</th>
						<th>Subtitle</th>
						<th>Position</th>
						<th>Description</th>
						<th>Action</th>
						<th>Delete</th>
					</tr>					
					@foreach($faqs as $faq)
					<tr>
						<td>{{$faq->title}}</td>
						<td>{{$faq->subtitle}}</td>
						<td>{{$faq->content_position}}</td>
						<td>{{$faq->description}}</td>
						<td>
							<a href="{{route('faqs.edit',$faq->id) }}">Edit</a>
		            	</td>
		            	<td>
		            		<form action="{{ route('faqs.destroy',$faq->id) }}" method="POST">
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
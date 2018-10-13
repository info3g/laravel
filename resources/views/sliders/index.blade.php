@extends('layouts.app')
 
@section('content')
<div class="container-fluid">
	@if ($message = Session::get('success'))
	    <div class="alert alert-success notification notification-success">
	        <p>{{ $message }}</p>
	    </div>
	@endif
	<div class="card mb-3">
		<div class="card-header">Slider Image List	
			<div class="pull-right">				
				<a class="btn btn-primary btn-sm" href="{{route('slider.create')}}">Add new image</a>
			</div>
		</div>
		<div class="card-body">
	        <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>
						<th>First Title</th>						
						<th>Second Title</th>
						<th>Image</th>
						<th>Action</th>
						<th>Delete</th>
					</tr>
					@foreach($sliders as $slider)
					<tr>
						<td>{{$slider->title1}}</td>
						<td>{{$slider->title2}}</td>
						<td><img src="{{'slider_images/'.$slider->image}}" style="width: 150px;"></td>
						<td>							
							<a href="{{route('slider.edit',$slider->id)}}">Edit</a>
							<a href="{{route('slider.updateImage',$slider->id)}}">Update image</a>
						</td>
						<td>
		            		<form action="{{ route('slider.destroy',$slider->id) }}" method="POST">
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
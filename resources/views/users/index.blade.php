@extends('layouts.app')

@section('content')
<table class="table table-borderd"> 
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Created</th>
		<th>Action</th>
	</tr>

	@foreach($users as $user)
	<tr>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->created_at}}</td>
		<td>			
			<a class="btn btn-info" href="{{route('users.active',$user->id)}}">Active</a>
			<a class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a>
		</td>
	</tr>
	@endforeach
</table>
@endsection
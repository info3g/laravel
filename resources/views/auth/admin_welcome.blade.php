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
			
		</td>
	</tr>
	@endforeach
</table>
@endsection
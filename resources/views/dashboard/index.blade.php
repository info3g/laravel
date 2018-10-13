<!-- load app.blade.php file from app folder -->
@extends('layouts.app')
<!-- Load content from app.blade.php file from app folder-->
@section('content')

<div class="container-fluid">
    @if ($message = Session::get('error'))
	    <div class="alert alert-block notification notification-error"> 
			<!-- <a class="close" data-dismiss="alert" href="#">×</a> -->
		  	<h4 class="alert-heading">Error!</h4>
		  	{{$message}}
		</div>	
    @endif
    <!-- DataTables Example -->
<form action="{{ route('export.file',['type'=>'csv']) }}" method="post">
	<div class="card mb-3">
		<div class="card-header">User List
			@csrf
			@method('POST')
			<div class="pull-right">				
				<input type="submit" class="btn btn-outline-primary btn-sm action" name="action" value="Download CSV" class="pull-right">			
			</div>
			
		</div>
	    <div class="col-sm-6 pull-left list-select">
	        <label class="check">Select All List
	        <input type="checkbox" onclick="toggle(this);" />
	        <span class="checkmark"></span>
	        </label>
	    </div>
	    <div class="col-sm-6 pull-right">
	        <div id="custom-search-input">
	            <div class="input-group col-md-6 pull-right">
	                <input type="text" class="  search-query form-control" id="search" placeholder="Search" />
	                <span class="input-group-btn">
	                <button class="btn btn-danger" type="button">
	                <i class="fa fa-search" aria-hidden="true"></i>
	                </button>
	                </span>
	            </div>
	        </div>
	    </div>
	    <div class="card-body">
	        <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>		
						<tr>
							<th align="center">Select</th>
							<th>Name</th>
							<th>Email</th>
							<th>Status</th>							
							<th>Action</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					@foreach($users as $user)
					<tr>
						<td>	                        
	                        <label class="check">
                            <input type="checkbox" name="user_id[]" value ="{{$user->id}}" hiddenField = "false">
                            <span class="checkmark"></span>
                            </label>
	                        </form>
	                    </td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							@if($user->status == 0)
								<p>Deactivate</p>
							@endif
							@if($user->status == 1)
								<p>Active</p>
							@endif
						</td>						
						<td>
							<!-- <form action="{{route('dashboard.destroy',$user->id)}}" method="post">				 -->

								<a href="{{route('dashboard.edit',$user->id)}}">Edit</a>
								<!-- <button type="submit" class="btn btn-danger btn-sm">Delete</button> -->
								@if($user->status == 0)
									<a href="{{url('dashboard/activeUser/'.$user->id)}}">Active</a>
								@endif
								@if($user->status == 1)
									<a href="{{url('dashboard/deactiveUser/'.$user->id)}}">Deactive</a>
								@endif
							<!-- </form> -->
						</td>
						<td>
							<form action="{{route('dashboard.destroy',$user->id)}}" method="post">	
								@csrf
								@method('DELETE')		
								<button type="submit" class="btn btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
								
							</form>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>		
	</div>
</div>
<!-- /.container-fluid -->
<!-- Sticky Footer -->
<!-- <footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © Laravel Website 2018</span>
        </div>
    </div>
</footer> -->
<script type="text/javascript">
    var $rows = $('#dataTable tr');
    $('#search').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        console.log(val);
        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });

    function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>
@endsection

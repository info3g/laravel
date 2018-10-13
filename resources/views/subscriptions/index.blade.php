<!-- load app.blade.php file from app folder -->
@extends('layouts.app')
<!-- Load content from app.blade.php file from app folder-->
@section('content')
<div class="container-fluid">
	
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">
	        <a href="{{route('subscriptions.index')}}">Subscriber List</a>
	    </li>	    
	    <!-- <li class="breadcrumb-item active">Overview</li> -->
    </ol>
	@if ($message = Session::get('success'))
	    <div class="alert alert-success notification notification-success">
	        <p>{{ $message }}</p>
	    </div>
	@endif
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
					<tr>						
						<th>Email</th>						
						<th>IP Address</th>						
					</tr>										
					<tbody id="data">
						@foreach($subscribers as $subscriber)
						<tr>						
							<td>{{$subscriber->email}}</td>
							<td>{{$subscriber->ip_address}}</td>												
						</tr>
						@endforeach
					</tbody>
				</table>
						{{$subscribers->links()}}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#search').on('keyup',function(){
		$value=$(this).val();
		$.ajax({
			type : 'get', 
			url : '{{URL::to('search')}}',
			data:{'search':$value},
			success:function(data){
				$('#data').html(data);
			}
		}); 
	})
</script>
@endsection
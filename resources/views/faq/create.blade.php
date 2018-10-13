@extends ('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Content For {{$data}} Section</h2>
            </div>
            <div class="pull-right">
            	<a class="btn btn-primary" href="{{route('faqs.index')}}">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('faqs.store')}}" method="POST">
    	@csrf
    	<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter title">
                </div>
            </div>
            @if($data == 'right')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Subtitle:</strong>
                    <input type="text" class="form-control" name="subtitle" placeholder="Write something">
                </div>
            </div>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">                    
                    <input type="hidden" class="form-control" style="height:150px" name="content_position" value={{$data}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Write something"></textarea>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>	
</div>
@endsection
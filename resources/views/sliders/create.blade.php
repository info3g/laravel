@extends ('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add images to slider</h2>
            </div>
            <div class="pull-right">
            	<a class="btn btn-primary" href="{{route('slider.index')}}">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
    	@csrf
    	<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Title:</strong>
                    <input type="text" name="title1" class="form-control" placeholder="Enter first title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Second Title:</strong>
                    <input type="text" name="title2" class="form-control" placeholder="Enter second title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Select Image:</strong>
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>	
</div>
@endsection
@extends('layouts.app')
   
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Portfolio</h2>
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
    <form action="{{route('portfolios.update',$portfolio->id)}}" method="POST">
        @csrf
        @method('PUT')        
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Name</strong>
                    <input type="text" name="title" value="{{$portfolio->title}}" class="form-control" placeholder="Project Name">
                </div>
                <div class="form-group">
                    <strong>Technology</strong>
                    <input type="text" name="technology" value="{{$portfolio->technology}}" class="form-control" placeholder="position">
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Upadte</button>
            </div>
        </div>   
    </form>
</div>
@endsection
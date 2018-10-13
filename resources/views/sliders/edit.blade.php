@extends('layouts.app')
   
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Slider</h2>
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
    <form action="{{route('slider.update',$slider->id)}}" method="POST">
        @csrf
        @method('PUT')        
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Title</strong>
                    <input type="text" name="title1" value="{{$slider->title1}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <strong>Second Title</strong>
                    <input type="text" name="title2" value="{{$slider->title2}}" class="form-control" placeholder="Description">
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Upadte</button>
            </div>
        </div>   
    </form>
</div>
@endsection
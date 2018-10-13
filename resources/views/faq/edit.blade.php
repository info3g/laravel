@extends('layouts.app')
   
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Faq</h2>
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
    <form action="{{route('faqs.update',$faq->id)}}" method="POST">
        @csrf
        @method('PUT')        
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{$faq->title}}" class="form-control" placeholder="Name">
                </div>
                @if($faq->content_position == 'right')
                <div class="form-group">
                    <strong>Subtitle:</strong>
                    <input type="text" name="subtitle" value="{{$faq->subtitle}}" class="form-control" placeholder="Name">
                </div>
                @endif
                <div class="form-group">
                    <input type="hidden" name="content_position" value="{{$faq->content_position}}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{$faq->description}}" class="form-control" placeholder="Description">
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
    </form>
</div>
@endsection
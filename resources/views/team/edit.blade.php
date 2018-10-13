@extends('layouts.app')
   
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit team member detail</h2>
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
    <form action="{{route('teams.update',$team->id)}}" method="POST">
        @csrf
        @method('PUT')        
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Employe Name</strong>
                    <input type="text" name="employe_name" value="{{$team->employe_name}}" class="form-control" placeholder="Employe Name">
                </div>
                <div class="form-group">
                    <strong>Position</strong>
                    <input type="text" name="position" value="{{$team->position}}" class="form-control" placeholder="position">
                </div>
            </div>            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Upadte</button>
            </div>
        </div>   
    </form>
</div>
@endsection
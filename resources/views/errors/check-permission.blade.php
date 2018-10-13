<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>


<div class="container text-center">    
    @if(Auth::user()['role'] == 'admin')
	   <h1>You don't have permission for access this page <br/> </h1>
       <a class="btn btn-primary" href="{{route('dashboard')}}">Back</a>        
    @else   
        <h1>You don't have permission for access this page <br/> </h1>
        <a class="btn btn-primary" href="{{route('website.profile')}}">Back</a>        
    @endif
    
</div>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">

        <title>Laravel Website</title>
        <!--CSS
			============================================= -->
        <link href="{{ asset('web/img/favicon.png') }}"/>
        <link href="{{ asset('web/img/apple-touch-icon.png') }}"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet" type="text/css" />
        <link href="{{ asset('web/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('web/lib/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet"/>
        <link href="{{ asset('web/lib/owlcarousel/owl.carousel.css') }}" rel="stylesheet"/>
        <link href="{{ asset('web/lib/owlcarousel/owl.transitions.css') }}" rel="stylesheet"/>
        <link href="{{ asset('web/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>		
        <link href="{{ asset('web/lib/animate/animate.min.css') }}" rel="stylesheet"/>		
        <link href="{{ asset('web/lib/venobox/venobox.css') }}" rel="stylesheet"/>		
        <link href="{{ asset('web/css/nivo-slider-theme.css') }}" rel="stylesheet"/>		
        <link href="{{ asset('web/css/style.css') }}" rel="stylesheet"/>		
        <link href="{{ asset('web/css/responsive.css') }}" rel="stylesheet"/>		        
    </head>
    <body data-spy="scroll" data-target="#navbar-example">  
    	<div id="preloader"></div>  
        	        
    	@yield('content')                
          
        <script src="{{ asset('web/lib/jquery/jquery.min.js') }}"></script>        
        <script src="{{ asset('web/lib/bootstrap/js/bootstrap.min.js') }}"></script>        
        <script src="{{ asset('web/lib/owlcarousel/owl.carousel.min.js') }}"></script>        
        <script src="{{ asset('web/lib/venobox/venobox.min.js') }}"></script>        
        <script src="{{ asset('web/lib/knob/jquery.knob.js') }}"></script>        
        <script src="{{ asset('web/lib/wow/wow.min.js') }}"></script>        
        <script src="{{ asset('web/lib/parallax/parallax.js') }}"></script>        
        <script src="{{ asset('web/lib/easing/easing.min.js') }}"></script>        
        <script src="{{ asset('web/lib/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>        
        <script src="{{ asset('web/lib/appear/jquery.appear.js') }}"></script>        
        <script src="{{ asset('web/lib/isotope/isotope.pkgd.min.js') }}"></script>         
        <!-- <script src="{{ asset('web/contactform/contactform.js') }}"></script>         -->
        <script src="{{ asset('web/js/main.js') }}"></script>
    </body>
</html>
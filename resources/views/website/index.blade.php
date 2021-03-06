<?php      
    $items = count($tables['slider']);  
    $faq_items_right = count($tables['faq_right']); 
    $faq_items_left = count($tables['faq_left']);     
    $portfolio_count = count($tables['portfolio']);          
?>

@extends('layouts.website')

@section('content')
<header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Navigation -->
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <!-- Brand -->
                            <a class="navbar-brand page-scroll sticky-logo" href="/">
                                <h1><span>L</span>aravel</h1>
                                <!-- Uncomment below if you prefer to use an image logo -->
                                <!-- <img src="img/logo.png" alt="" title=""> -->
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active">
                                    <a class="page-scroll" href="#home">Home</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#about">About</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#services">Services</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#team">Team</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#portfolio">Portfolio</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#blog">Blog</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="#contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <!-- navbar-collapse -->
                    </nav>
                    <!-- END: Navigation -->
                </div>
            </div>
        </div>
    </div>
    <!-- header-area end -->
</header>
<!-- Start Slider Area -->
<div id="home" class="slider-area">
    <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            <?php for ($i=0; $i <$items ; $i++) {  ?>
                <img src="{{'slider_images/'.$tables['slider'][$i]->image}}" alt="" title="#slider-direction-{{$tables['slider'][$i]->id}}" />       
            <?php } ?>
        </div>

        <?php for ($i=0; $i <$items ; $i++) {  ?>
            <div id="slider-direction-{{$tables['slider'][$i]->id}}" class="slider-direction slider-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h2 class="title1">{{$tables['slider'][$i]->title1}}</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                    <h1 class="title2">{{$tables['slider'][$i]->title2}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
</div>
<!-- End Slider Area -->
<!-- Start About area -->
<div id="about" class="about-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>About eBusiness</h2>
                </div>
            </div>
        </div>
        @foreach($tables['blog'] as $blog)
        <div class="row">
            <!-- single-well start-->
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="well-left">
                    <div class="single-well">
                        <a href="#">
                        <img src="{{'images/'.$blog->image}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <!-- single-well end-->
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="well-middle">
                    <div class="single-well">
                        <a href="#">
                            <h4 class="sec-head">{{$blog->title}}</h4>
                        </a>
                        <p class="text-justify">
                            {{$blog->description}}
                        </p>
                    </div>
                </div>
            </div><
            <!-- End col-->
        </div>
        @endforeach
    </div>
</div>
<!-- End About area -->
<!-- Start Service area -->
<div id="services" class="services-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline services-head text-center">
                    <h2>Our Services</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="services-contents">
                <!-- Start Left services -->
                @foreach($tables['service'] as $service)
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="about-move">
                        <div class="services-details">
                            <div class="single-services">
                                <h4>{{$service->title}}</h4>
                                <p>{{$service->description}}</p>
                            </div>
                        </div>
                        <!-- end about-details -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Service area -->
<!-- Faq area start -->
<div class="faq-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Faq Question</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="faq-details">
                    <div class="panel-group" id="accordion">
                        <!-- Panel Default -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="check-title">
                                    <a data-toggle="collapse" class="active text-left" data-parent="#accordion" href="#check1">
                                    <span class="acc-icons"></span>Static
                                    </a>
                                </h4>
                            </div>
                            <div id="check1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>
                                        Redug Lefes dolor sit amet, consectetur adipisicing elit. Aspernatur, tempore, commodi quas mollitia dolore magnam quidem repellat, culpa voluptates laboriosam maiores alias accusamus recusandae vero
                                    </p>
                                </div>
                            </div>
                            <?php for($i=0;$i<$faq_items_left;$i++) { ?> 
                            <div class="panel-heading">
                                <h4 class="check-title">
                                    <a class="text-left" data-toggle="collapse" data-parent="#accordion" href="#check{{$tables['faq_left'][$i]->id}}">
                                    <span class="acc-icons"></span>check{{$tables['faq_left'][$i]->title}}
                                    </a>
                                </h4>
                            </div>
                            <div id="check{{$tables['faq_left'][$i]->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>{{$tables['faq_left'][$i]->description}}</p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- End Panel Default -->                        
                    </div>
                </div>
            </div>            
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="tab-menu">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                            <a href="#p-view-2235" role="tab" data-toggle="tab">Static</a>
                        </li>
                        <?php for($i=0;$i<$faq_items_right;$i++) { ?>                        
                        <li class="">
                            <a href="#p-view-{{$tables['faq_right'][$i]->id}}" role="tab" data-toggle="tab">{{$tables['faq_right'][$i]->title}}</a>
                        </li>
                        <?php } ?>
                    </ul>                   
                </div>
                <div class="tab-content">
                    <div class="active tab-pane" id="p-view-2235">
                        <div class="tab-inner">
                            <div class="event-content head-team">
                                <h4>Planning</h4>
                                <p>
                                    voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis.
                                </p>
                                <p>
                                    Redug Lares dolor sit amet, consectetur adipisicing elit. Animi vero excepturi magnam ducimus adipisci voluptas, praesentium maxime necessitatibus in dolor dolores unde ab, libero quo. Aut.
                                </p>
                            </div>
                        </div>
                    </div> 
                    <?php for($i=0;$i<$faq_items_right;$i++) { ?>
                        <div class="tab-pane" id="p-view-{{$tables['faq_right'][$i]->id}}">
                            <div class="tab-inner">
                                <div class="event-content head-team">
                                    <h4>{{$tables['faq_right'][$i]->subtitle}}</h4>
                                    <p>{{$tables['faq_right'][$i]->description}}</p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>                                    
                </div>
            </div>
        </div>
        <!-- end Row -->
    </div>
</div>
<!-- End Faq Area -->
<!-- Start Wellcome Area -->
<div class="wellcome-area">
    <div class="well-bg">
        <div class="test-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="wellcome-text">
                        <div class="well-text text-center">
                            <h2>Welcome To Our eBusiness</h2>
                            <p>
                                Busuness Lorem ipsum dolor sit amet, consectetur adipiscing elit.luctus est eget congue.
                            </p>
                            <div class="subs-feilds">
                                <div class="suscribe-input">
                                    <form action="{{route('subscriptions.store')}}" method="POST">                        
                                        @csrf                                                     
                                        <input type="email" class="email form-control width-80" id="sus_email" placeholder="Email" name="email">
                                        <input type="hidden" value="{{request()->ip()}}" name="ip_address">
                                        <button type="submit" id="sus_submit" class="add-btn width-20">Subscribe</button>
                                        <div id="msg_Submit" class="h3 text-center hidden"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wellcome Area -->
<!-- Start team Area -->
<div id="team" class="our-team-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Our special Team</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="team-top">
                @foreach($tables['team'] as $team)
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single-team-member">
                        <div class="team-img">
                            <a href="#">
                            <img src="{{'profile_images/'.$team->image}}" alt="">
                            </a>
                            <div class="team-social-icon text-center">
                                <ul>
                                    <li>
                                        <a href="#">
                                        <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                        <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>{{$team->employe_name}}</h4>
                            <p>{{$team->position}}</p>
                        </div>
                    </div>
                </div>
                @endforeach                
            </div>
        </div>
    </div>
</div>
<!-- End Team Area -->
<!-- Start portfolio Area -->
<div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h2>Our Portfolio</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Start Portfolio -page -->
            <div class="awesome-project-1 fix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="awesome-menu ">
                        <ul class="project-menu">
                            <li>
                                <a href="#" class="active" data-filter="*">All</a>
                            </li>
                            <?php for($i=0;$i<$tables['technology_count'];$i++) { ?>                                
                                <li>
                                    <a href="#" data-filter=".{{$tables['technologies'][$i]}}">{{$tables['technologies'][$i]}}</a>
                                </li>
                            <?php } ?>                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="awesome-project-content">
                <?php for($i=0;$i<$portfolio_count;$i++) { ?>
                    <!-- single-awesome-project start -->
                    <div class="col-md-4 col-sm-4 col-xs-12 {{$tables['portfolio'][$i]->technology}}">
                        <div class="single-awesome-project">
                            <div class="awesome-img">
                                <a href="#"><img src="{{$tables['portfolio'][$i]->image}}" alt="" /></a>
                                <div class="add-actions text-center">
                                    <div class="project-dec">
                                        <a class="venobox" data-gall="myGallery" href="{{$tables['portfolio'][$i]->image}}">
                                            <h4>{{$tables['portfolio'][$i]->title}}</h4>                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single-awesome-project end -->
                <?php } ?>                                
            </div>
        </div>
    </div>
</div>
<!-- awesome-portfolio end -->

<!-- Start Blog Area -->
<div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
        <div class="blog-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($tables['news'] as $news)
                    <!-- Start Blog -->
                    <div class="col-md-4 col-sm-4 col-xs-12" style="max-height: 500px !important;min-height: 500px !important;">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="{{route('website.show',$news->id)}}">
                                <img src="{{$news->image}}" alt="">
                                </a>
                            </div>
                            <div class="blog-meta">
                                <span class="comments-type">
                                <i class="fa fa-comment-o"></i>
                                <a href="#">{{count($news->comments)}} comments</a>
                                </span>
                                <span class="date-type">
                                <i class="fa fa-calendar"></i>{{str_replace(' ',' / ',$news->created_at)}}
                                </span>
                            </div>
                            <div class="blog-text">
                                <h4>
                                    <a href="{{route('website.show',$news->id)}}">{{$news->title}}</a>
                                </h4>
                                <p>
                                    {{$news->short_title}}
                                </p>
                            </div>
                            <span>
                            <a href="{{route('website.show',$news->id)}}" class="ready-btn">Read more</a>
                            </span>
                        </div>
                        <!-- Start single blog -->
                    </div>
                    <!-- End Blog-->
                @endforeach                
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->

<!-- Start contact Area -->
<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Contact us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-mobile"></i>
                            <p>
                                Call: +1 5589 55488 55<br>
                                <span>Monday-Friday (9am-5pm)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-envelope-o"></i>
                            <p>
                                Email: info@example.com<br>
                                <span>Web: www.example.com</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                            <i class="fa fa-map-marker"></i>
                            <p>
                                Location: A108 Adam Street<br>
                                <span>NY 535022, USA</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start Google Map -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start Map -->
                    <!-- Uncomment below if you wan to use dynamic maps -->
                    <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
                    <img src="https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x350&maptype=roadmap&markers=color:red%7Clabel:S%7C40.702147,-74.015794&key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY" alt="">
                    <!-- End Map -->
                </div>
                <!-- End Google Map -->
                <!-- Start  contact -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form contact-form">
                        <div id="sendmessage">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                        </div>
                        <div id="errormessage"></div>
                        <form action="{{route('queries.store')}}" method="POST" role="form" class="contactForm">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 4 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
                <!-- End Left contact -->
            </div>
        </div>
    </div>
</div>
<!-- End Contact Area -->
<!-- Start Footer bottom Area -->
<footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <div class="footer-logo">
                                <h2><span>e</span>Business</h2>
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                            <div class="footer-icons">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>information</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                            <div class="footer-contacts">
                                <p><span>Tel:</span> +123 456 789</p>
                                <p><span>Email:</span> contact@example.com</p>
                                <p><span>Working Hours:</span> 9am-5pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Instagram</h4>
                            <div class="flicker-img">
                                <a href="#"><img src="web/img/portfolio/1.jpg" alt=""></a>
                                <a href="#"><img src="web/img/portfolio/2.jpg" alt=""></a>
                                <a href="#"><img src="web/img/portfolio/3.jpg" alt=""></a>
                                <a href="#"><img src="web/img/portfolio/4.jpg" alt=""></a>
                                <a href="#"><img src="web/img/portfolio/5.jpg" alt=""></a>
                                <a href="#"><img src="web/img/portfolio/6.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                        <!-- <p>
                            <!-- &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved -->
                        </p> -->
                    </div>
                    <div class="credits">
                        <!--
                            All the links in the footer should remain intact.
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
                            -->
                        Designed by <a href="#">PHP Developer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
@endsection
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
                    </nav>
                    <!-- END: Navigation -->
                </div>
            </div>
        </div>
    </div>
    <!-- header-area end -->
</header>
<!-- Start Bottom Header -->
<div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider-content text-center">
                    <div class="header-bottom">
                        <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                            <h1 class="title2">Blog Details </h1>
                        </div>
                        <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                            <h2 class="title3">Profesional Blog Page</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<div class="blog-page area-padding">
    <div class="container">
        <div class="row">            
            <!-- Start single blog -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- single-blog start -->
                        <article class="blog-post-wrapper">
                            <div class="post-thumbnail">
                            	<center>                            		
                                	<img src="{{asset($blog[0]->image)}}" alt="" />
                            	</center>
                            </div>
                            <div class="post-information">
                                <h2>{{$blog[0]->title}}</h2>
                                <div class="entry-meta"></div>
                                <div class="entry-content">
                                    <p>{{$blog[0]->description}}</p>                                    
                                </div>
                            </div>
                        </article>
                        <div class="clear"></div>
                        <div class="single-post-comments">
                            <div class="comments-area">
                                <div class="comments-heading">
                                    <h3>{{count($blog[0]->comments)}} comments</h3>
                                </div>
                                @if(count($blog[0]->comments) > 0)
                                <div class="comments-list">
                                    <ul>
                                    	@foreach($blog[0]->comments as $comment)
                                        <li>
                                            <div class="comments-details">
                                                <!-- <div class="comments-list-img">
                                                    <img src="img/blog/b02.jpg" alt="post-author">
                                                </div> -->
                                                <div class="comments-content-wrap">
                                                    <span>
                                                    <b>{{$comment->name}}</b>                                                    
                                                    <span class="post-time">{{$comment->created_at}}</span>
                                                    </span>
                                                    <p>{{$comment->comment}}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @else
                                <div class="comments-list">
                                    <p>Be First to post comment</p>
                                </div>
                                @endif
                            </div>
                            <div class="comment-respond">
                                <h3 class="comment-reply-title">Leave a Reply </h3>
                                <span class="email-notes">Your email address will not be published. Required fields are marked *</span>
                                <form action="{{route('comments.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <p>Name *</p>
                                            <input type="text" name="name" required/>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <p>Email *</p>
                                            <input type="email" name="email" required/>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <p>Website</p>
                                            <input type="text" name="website"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                                            <p>Your message *</p>
                                            <textarea id="message-box" name="comment" cols="30" rows="10" minlength="4" required></textarea>
                                            <input type="hidden" name="url" value="{{Request::url()}}">
                                            <input type="hidden" name="news_id" value="{{$blog[0]->id}}">
                                            <input type="submit" value="Post Comment" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- single-blog end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->
<div class="clearfix"></div>
@endsection
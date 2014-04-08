@extends('layouts.master')

@section('content')

<!-- ******HEADER****** --> 
    <header id="top" class="header navbar-fixed-top">  
        <div class="container">            
            <h1 class="logo pull-left">
                <a class="scrollto" href="#promo">
                    <img id="logo-image" class="logo-image" src="assets/images/logo/logo.png" alt="Logo">
                    <span class="logo-title">SpotFinder</span>
                </a>
            </h1><!--//logo-->              
            <nav id="main-nav" class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active nav-item sr-only"><a class="scrollto" href="#promo">Home</a></li>
                        <li class="nav-item"><a class="scrollto" href="#features">Features</a></li>
                        <li class="nav-item"><a class="scrollto" href="#how">How it works</a></li>
                        <li class="nav-item"><a class="scrollto" href="#faq">FAQ</a></li>
                        <li class="nav-item"><a class="scrollto" href="#story">Story</a></li>
                        <li class="nav-item last"><a class="scrollto" href="#contact">Contact</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->           
        </div>
    </header><!--//header-->
    
    <!-- ******PROMO****** --> 
    <section id="promo" class="promo section offset-header has-pattern">
        <div class="container">
            <div class="row">
                <div class="overview col-md-8 col-sm-12 col-xs-12">
                    <h2 class="title">SpotFinder makes parking easy!</h2>
                    <ul class="summary">
                        <li>Showcase and promote your mobile app to the web</li>
                        <li>Demonstrate how the app works</li>
                        <li>Provide answers to common questions</li>
                        <li>Tell the world about the story behind the app</li>
                    </ul>
                    <div class="download-area">
                        <ul class="btn-group list-inline">
                            <li class="ios-btn"><a href="#">Download from the App Store</a></li>
                            <li class="android-btn"><a href="#">Get it from Google Play</a></li>
                        </ul>
                        <div class="note text-center">
                            <p>30% OFF - Now only $0.99<br />Offer ends 31st March</p>
                            <span class="left-arrow"></span>
                            <span class="right-arrow"></span>
                        </div><!--//note-->
                    </div>
                </div><!--//overview-->
                
                <!--// iPhone starts -->
                <div class="phone iphone iphone-black col-md-4 col-sm-12 col-xs-12 ">
                    <div class="iphone-holder phone-holder">
                        <div class="iphone-holder-inner">
                            <div class="slider flexslider">
                                <ul class="slides">
                                    <li>
                                        <img src="assets/images/iphone/iphone-slide-1.png"  alt="" />
                                    </li>
                                    <li>
                                        <img src="assets/images/iphone/iphone-slide-2.png"  alt="" />
                                    </li>
                                    <li>
                                        <img src="assets/images/iphone/iphone-slide-3.png"  alt="" />
                                    </li>
                                </ul><!--//slides-->
                            </div><!--//flexslider-->   
                        </div><!--//iphone-holder-inner-->                    
                    </div><!--//iphone-holder-->                   
                </div><!--//iphone-->  
                <!--// iPhone ends -->
                
                <!--// Android starts -->                
                <div class="phone android col-md-4 col-sm-12 col-xs-12" style="display:none">
                    <div class="android-holder phone-holder">
                        <div class="android-holder-inner">
                            <div class="slider flexslider">
                                <ul class="slides">
                                    <li>
                                        <img src="assets/images/android/android-slide-1.png"  alt="" />
                                    </li>
                                    <li>
                                        <img src="assets/images/android/android-slide-2.png"  alt="" />
                                    </li>
                                    <li>
                                        <img src="assets/images/android/android-slide-3.png"  alt="" />
                                    </li>
                                </ul><!--//slides-->
                            </div><!--//flexslider-->   
                        </div><!--//phone-holder-inner-->                    
                    </div><!--//iphone-holder-->                   
                </div><!--//iphone--> 
                <!--// Android ends -->
                
                <!--// iPad starts -->
                <div class="ipad ipad-black col-md-4 col-sm-12 col-xs-12 col-md-pull-1" style="display:none">
                    <div class="ipad-holder">
                        <div class="ipad-holder-inner">
                            <div class="slider flexslider">
                                <ul class="slides">
                                    <li>
                                        <img src="assets/images/ipad/ipad-slide-1.png"  alt="" />
                                    </li>
                                    <li>
                                        <img src="assets/images/ipad/ipad-slide-2.png"  alt="" />
                                    </li>
                                    <li>
                                        <img src="assets/images/ipad/ipad-slide-3.png"  alt="" />
                                    </li>
                                </ul><!--//slides-->
                            </div><!--//flexslider-->   
                        </div><!--//ipad-holder-inner-->                    
                    </div><!--//ipad-holder-->                   
                </div><!--//ipad--> 
                <!--// iPad ends -->  
                                           
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//promo-->
    
    <!-- ******FEATURES****** --> 
    <section id="features" class="features section">
        <div class="container">
            <div class="row">
                <h2 class="title text-center sr-only">Features</h2>
                <div class="item col-md-3 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-cloud-upload"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">App Feature One</h3>
                        <p>Outline an app feature here. You can change the icon above to any of the 300+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwsome icons</a> available. </p>  
                    </div><!--//content-->               
                </div><!--//item-->
                <div class="item col-md-3 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-rocket"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">App Feature Two</h3>
                        <p>Outline an app feature here. You can change the icon above to any of the 300+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwsome icons</a> available. </p>   
                    </div><!--//content-->               
                </div><!--//item-->
                <div class="item col-md-3 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-users"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">App Feature Three</h3>
                        <p>Outline an app feature here. You can change the icon above to any of the 300+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwsome icons</a> available. </p>   
                    </div><!--//content-->               
                </div><!--//item-->
                <div class="item col-md-3 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">App Feature Four</h3>
                        <p>Outline an app feature here. You can change the icon above to any of the 300+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwsome icons</a> available. </p>   
                    </div><!--//content-->               
                </div><!--//item-->
            </div><!--//row-->
            
            <div class="row">
                <div class="item col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-calendar"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">App Feature One</h3>
                        <p>Outline an app feature here. You can change the icon above to any of the 300+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwsome icons</a> available. </p>  
                    </div><!--//content-->               
                </div><!--//item-->
                <div class="item col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-comments"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">App Feature Two</h3>
                        <p>Outline an app feature here. You can change the icon above to any of the 300+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwsome icons</a> available. </p>   
                    </div><!--//content-->               
                </div><!--//item-->
                <div class="item col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-globe"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">App Feature Three</h3>
                        <p>Outline an app feature here. You can change the icon above to any of the 300+ <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">FontAwsome icons</a> available. </p>   
                    </div><!--//content-->               
                </div><!--//item-->
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//features-->
    
    <!-- ******HOW****** --> 
    <section id="how" class="how section has-pattern">
        <div class="container">
            <div class="row">
                <div class="content col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6 text-center">
                    <h2 class="title">How it works</h2>
                    <p class="intro">You can <a href="http://blog.sensortower.com/blog/2013/07/19/3-ways-to-create-a-great-ios-app-demo-video-without-breaking-the-bank/" target="_blank">create a video demo</a> for your app to demonstrate how the app works. You can also <a href="http://www.qrstuff.com/" target="_blank">generate QR codes</a> for the app download links.</p>
                    <div class="qr-codes hidden-sm hidden-xs">
                        <div class="note">
                            <p>Scan the QR codes</p>
                            <span class="left-arrow"></span>
                            <span class="right-arrow"></span>
                        </div><!--//note-->
                        <div class="row">
                            <div class="item col-md-6 col-sm-6">
                                <img src="assets/images/qrcodes/qr-1.png" alt="" />
                                <p>Download for iOS</p>
                            </div><!--//item-->
                            <div class="item col-md-6 col-sm-6">
                                <img src="assets/images/qrcodes/qr-1.png" alt="" />
                                <p>Download for Andriod</p>
                            </div><!--//item-->
                        </div>                    
                    </div><!--//qr-codes-->
                </div><!--//content-->
                <div id="video-container" class="video-container col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <iframe src="//player.vimeo.com/video/87044590" width="570" height="320" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div><!--//video-->
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//how-->
    
    <!-- ******FAQ****** --> 
    <section id="faq" class="faq section">
        <div class="container">
            <div class="row">
                <h2 class="title text-center">Frequently Asked Questions</h2>
                <div class="faq-col col-md-6 col-sm-6 col-xs-12">
                    <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>How can I  ipsum dolor sit amet?</h3>
                        <p class="answer">Proin scelerisque magna ac eros aliquam aliquam id in lacus. Morbi quam tortor, consequat at orci non, vulputate volutpat libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sagittis laoreet urna eu ornare. Aenean tempor, leo vel eleifend porttitor, nibh libero ultricies est, sit amet ultricies magna enim et turpis. Donec aliquam velit eu sollicitudin cursus.</p>
                    </div><!--//item-->
                    <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>What is the ipsum dolor sit amet quam tortor?</h3>
                        <p class="answer">Proin scelerisque magna ac eros aliquam aliquam id in lacus. Morbi quam tortor, consequat at orci non, vulputate volutpat libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sagittis laoreet urna eu ornare.</p>
                    </div><!--//item-->
                    <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>What's the differences between ipsum and dolor sit amet?</h3>
                        <p class="answer">Proin scelerisque magna ac eros aliquam aliquam id in lacus. Morbi quam tortor, consequat at orci non, vulputate volutpat libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sagittis laoreet urna eu ornare. Aenean tempor, leo vel eleifend porttitor. Aenean tempor, leo vel eleifend porttitor, nibh libero ultricies est.</p>
                    </div><!--//item-->
                </div><!--//faq-col-->
                <div class="faq-col col-md-6 col-sm-6 col-xs-12">
                    <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>How does the morbi quam tortor work?</h3>
                        <p class="answer">Proin scelerisque magna ac eros aliquam aliquam id in lacus. Morbi quam tortor, consequat at orci non, vulputate volutpat libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sagittis laoreet urna eu ornare.Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sagittis laoreet urna eu ornare. Aenean tempor, leo vel eleifend porttitor, nibh libero ultricies est, sit amet ultricies magna enim et turpis. Donec aliquam velit eu sollicitudin cursus.</p>
                    </div><!--//item-->
                    <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>Can I ipsum dolor sit amet nascetur ridiculus?</h3>
                        <p class="answer">Proin scelerisque magna ac eros aliquam aliquam id in lacus. Morbi quam tortor, consequat at orci non, vulputate volutpat libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sagittis laoreet urna eu ornare.</p>
                    </div><!--//item-->
                    <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>How can I proin scelerisque magna?</h3>
                        <p class="answer">Aenean tempor, leo vel eleifend porttitor, nibh libero ultricies est, sit amet ultricies magna enim et turpis. Donec aliquam velit eu sollicitudin cursus.Proin scelerisque magna ac eros aliquam aliquam id in lacus. Morbi quam tortor, consequat at orci non, vulputate volutpat libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sagittis laoreet urna eu ornare. </p>
                    </div><!--//item-->
                </div><!--//faq-col-->
            </div><!--//row-->
            <div class="more text-center">
                <h4 class="title">More questions?</h4>
                <a class="btn btn-lg btn-theme scrollto" href="#contact">Get in touch<i class="fa fa-arrow-circle-o-down"></i></a>
            </div>
        </div><!--//container-->
    </section><!--//faq-->
    
    <!-- ******STORY****** --> 
    <section id="story" class="story section has-pattern">
        <div class="container">
            <div class="row">
                <div class="content col-md-6 col-sm-6 col-xs-12 text-center">
                    <h2 class="title">Story behind the app</h2>
                    <p>Aliquam euismod vehicula lacus, non congue ante pulvinar a. Nunc eu posuere risus, ut condimentum ante. Suspendisse at turpis sollicitudin odio congue lobortis vitae nec nisi. Nullam sodales at libero in lacinia. Nullam vel nibh pulvinar, interdum purus tristique, iaculis turpis. Integer imperdiet tincidunt erat vel gravida. Suspendisse tincidunt orci sed leo euismod, quis ultrices ipsum lobortis. Sed viverra dui et elit accumsan accumsan. Donec lorem turpis, iaculis ac fermentum nec, dignissim sed nisi. Nunc condimentum turpis arcu, eu aliquet lorem eleifend ut. Integer at lorem nec diam elementum convallis vel vel nulla.</p>
                    <p>Nullam vel nibh pulvinar, interdum purus tristique, iaculis turpis. Integer imperdiet tincidunt erat vel gravida. eleifend ut. Integer at lorem nec diam elementum convallis vel vel nulla.</p>
                </div><!--//content-->
                <div class="team col-md-5 col-sm-5 col-md-offset-1 col-sm-offset-1 col-xs-12">
                    <div class="row">
                        <div class="member col-md-6 text-center">
                            <img class="img-rounded" src="assets/images/team/member-1.png" alt="" />
                            <p class="name">James Norton</p>
                            <p class="title">Lead Developer</p>
                            <ul class="connect list-inline">
                                <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
                                <li class="row-end"><a href="#" ><i class="fa fa-github"></i></a></li>         
                            </ul>
                        </div><!--//member-->
                        <div class="member col-md-6 text-center">
                            <img class="img-rounded" src="assets/images/team/member-2.png" alt="" />
                            <p class="name">Steve Thomson</p>
                            <p class="title">UI/UX Designer</p>
                            <ul class="connect list-inline">
                                <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
                                <li class="row-end"><a href="#" ><i class="fa fa-dribbble"></i></a></li>         
                            </ul>
                        </div><!--//member-->
                    </div>
                </div><!--//team-->
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//features-->
    
    <!-- ******TESTIMONIALS****** --> 
    <section id="testimonials" class="testimonials section">
        <div class="container">
            <div class="row">
                <h2 class="title text-center">What do people think?</h2>
                <div class="item col-md-4 col-sm-4">
                    <div class="quote-box">
                        <i class="fa fa-quote-left"></i>
                        <blockquote class="quote">
                            <a href="#">@Delta</a> I love this #app. Lorem ipsum dolor sit amet, consectetur adipiscing elit. #Mobile
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-1.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Christine Heal</span>
                            <span class="title">Bristol, UK</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-4">
                    <div class="quote-box">
                        <i class="fa fa-quote-left"></i>
                        <blockquote class="quote">
                            <a href="#">@Delta</a> consectetur adipiscing elit. #DeltaApp Sed bibendum velit quis nunc laoreet dictum id nisl id lacinia. 
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-2.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Ben Rousseau</span>
                            <span class="title">Paris, France</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-4">
                    <div class="quote-box">
                        <i class="fa fa-quote-left"></i>
                        <blockquote class="quote">
                        I find DeltaApp very useful - Lorem ipsum dolor sit amet, check it out: <a href="#">http://bit.ly/1gB9UBR</a>
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-3.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Mike Chan</span>
                            <span class="title">Hongkong, China</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
            </div><!--//row-->
            <div class="row">
                <div class="item col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <div class="quote-box">
                        <i class="fa fa-quote-left"></i>
                        <blockquote class="quote">
                         DeltaApp is fab lorem ipsum dolor sit amet proin sagittis sodales pulvinar Mauris id arcu eget augue condimentum euismod: <a href="#">http://bit.ly/1gB9UBR</a>
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-4.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Annie Lee</span>
                            <span class="title">Berlin, Germany</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-4">
                    <div class="quote-box">
                        <i class="fa fa-quote-left"></i>
                        <blockquote class="quote">
                        DeltaApp is a great dolor sit amet proin sagittis sodales pulvinar vestibulum porta dolor molestie semper.: <a href="#">http://bit.ly/1gB9UBR</a>
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-5.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Adam Gordon</span>
                            <span class="title">London, UK</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
            </div>
            <div class="press row text-center">
                <h3 class="note">Also featured in...</h3>
                <ul class="col-md-12 list-inline">
                    <li><a href="#"><img class="img-responsive" src="assets/images/press/press-1.png" alt="" /></a></li>
                    <li><a href="#"><img class="img-responsive" src="assets/images/press/press-2.png" alt="" /></a></li>
                    <li><a href="#"><img class="img-responsive" src="assets/images/press/press-3.png" alt="" /></a></li>
                    <li><a href="#"><img class="img-responsive" src="assets/images/press/press-4.png" alt="" /></a></li>
                    <li class="last"><a href="#"><img class="img-responsive" src="assets/images/press/press-5.png" alt="" /></a></li>
                </ul>
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//Testimonials-->
    
    <!-- ******CONTACT****** --> 
    <section id="contact" class="contact section has-pattern">
        <div class="container">
            <div class="row text-center">
                <h2 class="title">Contact US</h2>
                <div class="intro col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
                    <p>We’d love to hear from you. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut erat magna. Aliquam porta sem a lacus imperdiet posuere. Integer semper eget ligula id eleifend.</p>
                    <ul class="list-unstyled contact-details">
                        <li><i class="fa fa-envelope"></i><a href="mailto: hello@website.com">hello@website.com</a></li>
                        <li><i class="fa fa-phone-square"></i>0800 123 456</li>
                </div>
            </div><!--//row-->
            <div class="row text-center">
                <div class="contact-form col-md-6 col-sm-12 col-xs-12 col-md-offset-3">                            
                    <form class="form">                
                        <div class="form-group name">
                            <label class="sr-only" for="name">Name</label>
                            <input id="name" type="text" class="form-control" placeholder="Name:">
                        </div><!--//form-group-->
                        <div class="form-group email">
                            <label class="sr-only" for="email">Email</label>
                            <input id="email" type="email" class="form-control" placeholder="Email:">
                        </div><!--//form-group-->
                        <div class="form-group message">
                            <label class="sr-only" for="message">Message</label>
                            <textarea id="message" class="form-control" rows="6" placeholder="Message:"></textarea>
                        </div><!--//form-group-->
                        <button type="submit" class="btn btn-lg btn-theme">Send Message</button>
                    </form><!--//form-->                 
                </div><!--//contact-form-->
            </div><!--//row-->
            <div class="text-center">
                 <ul class="social-icons list-inline">
                    <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" ><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#" ><i class="fa fa-google-plus"></i></a></li>                  
                </ul><!--//social-icons-->
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//contact-->    
    <!-- ******CONTENT****** --> 
    <footer class="footer">
        <div class="container">
            <small class="copyright pull-left">Copyright &copy; 2014 Delta App</small>
            <ul class="links list-inline">
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
            </ul>
        </div>
    </footer><!--//footer-->
    
    <!-- *****CONFIGURE STYLE****** -->  
    <div class="config-wrapper">
        <div class="config-wrapper-inner">
            <a id="config-trigger" class="config-trigger" href="#"><i class="fa fa-cog"></i></a>
            <div id="config-panel" class="config-panel">
                <h5>Choose Colour</h5>
                <ul id="color-options" class="list-unstyled list-inline">
                    <li class="theme-1 active" ><a data-style="assets/css/styles.css" data-logo="assets/images/logo/logo.png" href="#"></a></li>
                    <li class="theme-2"><a data-style="assets/css/styles-2.css" data-logo="assets/images/logo/logo-2.png" href="#"></a></li>
                    <li class="theme-3"><a data-style="assets/css/styles-3.css" data-logo="assets/images/logo/logo-3.png" href="#"></a></li>
                    <li class="theme-4"><a data-style="assets/css/styles-4.css" data-logo="assets/images/logo/logo-4.png" href="#"></a></li>
                    
                    <li class="theme-5"><a data-style="assets/css/styles-5.css" data-logo="assets/images/logo/logo-5.png" href="#"></a></li> 
                    <div class="clearfix"></div>
                    <li class="theme-6"><a data-style="assets/css/styles-6.css" data-logo="assets/images/logo/logo-6.png" href="#"></a></li>
                    <li class="theme-7"><a data-style="assets/css/styles-7.css" data-logo="assets/images/logo/logo-7.png" href="#"></a></li>
                    <li class="theme-8"><a data-style="assets/css/styles-8.css" data-logo="assets/images/logo/logo-8.png" href="#"></a></li>
                    
                    <li class="theme-9"><a data-style="assets/css/styles-9.css" data-logo="assets/images/logo/logo-9.png" href="#"></a></li>
                    <li class="theme-10"><a data-style="assets/css/styles-10.css" data-logo="assets/images/logo/logo-10.png" href="#"></a></li>
                    
                </ul><!--//color-options-->
                <h5 class="device-title">Choose Device</h5>
                <ul id="device-options" class="list-unstyled">
                    <li class="default active"><a data-class="iphone-black" data-type="iphone" href="#">iPhone Black</a></li>
                    <li><a data-class="iphone-white" data-type="iphone" href="#">iPhone White</a></li>
                    <li><a data-class="ipad-white" data-type="ipad" href="#">iPad White</a></li>
                    <li><a data-class="ipad-black" data-type="ipad" href="#">iPad Black</a></li>
                    <li><a data-class="android" data-type="android" href="#">Android</a></li>
                </ul>
                <a id="config-close" class="close" href="#"><i class="fa fa-times-circle"></i></a>
            </div><!--//configure-panel-->
        </div><!--//config-wrapper-inner-->
    </div><!--//config-wrapper-->

@stop
@extends('layouts.master')

@section('content')
    <!-- SpotFinder is Awesome!! -->
    <!-- ******PROMO****** -->
    <section id="promo" class="promo section offset-header has-pattern">
        <div class="container">
            <div class="row">
                <div class="overview col-md-8 col-sm-12 col-xs-12">
                    <h2 class="title">SpotFinder makes parking easy!</h2>
                    <ul class="summary">
                        <li>Find a spot before you leave!</li>
                        <li>Reserve and pay right away!</li>
                        <li>Get a text with driving directions!</li>
                        <li>Make it to wherever you're going on time!</li>
                    </ul>
                    <div class="download-area">
                        <p>
                          <button type="button" class="btn btn-default btn-lg"><a href="{{{ action('HomeController@showLogin') }}}">Login</button></a>
                          <button type="button" class="btn btn-default btn-lg"><a href="{{{ action('RegisterController@index') }}}">Sign Up</a></button>
                        </p>
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
                <a name="features"></a>
                <h2 class="title text-center sr-only">Features</h2>
                <div class="item col-md-6 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">Claim Your Spot</h3>
                        <p> Kind of like how you called shotgun as a kid, claim your spot in the parking lot you choose before you even arrive! </p>  
                    </div><!--//content-->               
                </div><!--//item-->
                <div class="item col-md-6 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-calendar"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title"> Be Prepared </h3>
                        <p> With SpotFinder you can make a parking reservation minutes before or days in advance! Never be late for that important meeting again. </p>   
                    </div><!--//content-->                            
                </div><!--//item-->
            </div><!--//row-->
            
            <div class="row">
                <div class="item col-md-6 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-rocket"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">Don't Know How To Get There</h3>
                        <p> SpotFinder will send you a text with a confirmation number and street address to the lot! No more driving around in circles! </p>  
                    </div><!--//content-->               
                </div><!--//item-->
                <div class="item col-md-6 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">Easy Checkout</h3>
                        <p> Easy secure payment system. I mean seriously, who carries cash anymore?</p>   
                    </div><!--//content-->               
                </div><!--//item-->
            </div><!--//row-->
        </div><!--//container-->
    </section><!--//features-->
    
    <!-- ******HOW****** -->
    <a name="how"></a>
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
    <a name="faq"></a>
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
    <a name="story"></a>
    <section id="story" class="story section has-pattern">
        <div class="container">
            <div class="row">
                <div class="content col-md-6 col-sm-6 col-xs-12 text-center">
                    <h2 class="title">Story behind the app</h2>
                    <p>Parking was a pain so Karina and Mike came up with SpotFinder. The easy way to reserve a parking spot before you even get into a car! No driving in circles around full lots or having to park blocks away in the shady part of town!</p>
                </div><!--//content-->
                <div class="team col-md-5 col-sm-5 col-md-offset-1 col-sm-offset-1 col-xs-12">
                    <div class="row">
                        <div class="member col-md-6 text-center">
                            <img class="img-circle" style="width:160px" src="assets/images/team/eva-longoria.jpg" alt="" />
                            <p class="name">Karina Montes Trevino</p>
                            <p class="title">Developer</p>
                            <ul class="connect list-inline">
                                <li><a href="https://twitter.com/Kimt3D"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/karinamontestrevino"><i class="fa fa-linkedin"></i></a></li>
                                <li class="row-end"><a href="https://github.com/KarinaMontesTrevino"><i class="fa fa-github"></i></a></li>         
                            </ul>
                        </div><!--//member-->
                        <div class="member col-md-6 text-center">
                            <img class="img-circle" style="width:160px" src="assets/images/team/iron-man.jpg" alt="" />
                            <p class="name">Mike Tamburo</p>
                            <p class="title">Developer</p>
                            <ul class="connect list-inline">
                                <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
                                <li class="row-end"><a href="https://github.com/miketamburo"><i class="fa fa-github"></i></a></li>         
                            </ul>
                        </div><!--//member-->
                        <div class="member col-md-12 text-center">
                            <img class="img-circle" style="width:160px" src="assets/images/team/jennifer-lawerence.jpg" alt="" />
                            <p class="name">Grace Faubion</p>
                            <p class="title">Developer</p>
                            <ul class="connect list-inline">
                                <li><a href="https://twitter.com/gdfaubion"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/gracefaubion"><i class="fa fa-linkedin"></i></a></li>
                                <li class="row-end"><a href="https://github.com/gdfaubion"><i class="fa fa-github"></i></a></li>         
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
                            <a href="#">@spotfinder</a> I love this #app. Spotfinder makes parking so easy!
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-1.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Christine Heal</span>
                            <span class="title">San Antonio, Tx</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-4">
                    <div class="quote-box">
                        <i class="fa fa-quote-left"></i>
                        <blockquote class="quote">
                            <a href="#">@spotfinder</a> Oh snap! I love spotfinder! 
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-2.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Ben Rousseau</span>
                            <span class="title">San Antonio, Tx</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-4">
                    <div class="quote-box">
                        <i class="fa fa-quote-left"></i>
                        <blockquote class="quote">
                        I find SpotFinder very useful - I never have to stress about finding parking again!
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-3.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Mike Chan</span>
                            <span class="title">San Antonio, Tx</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
            </div><!--//row-->
            <div class="row">
                <div class="item col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <div class="quote-box">
                        <i class="fa fa-quote-left"></i>
                        <blockquote class="quote">
                         Spotfinder rocks my world! I use it every week!
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-4.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Annie Lee</span>
                            <span class="title">San Antonio, Tx</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
                <div class="item col-md-4 col-sm-4">
                    <div class="quote-box">
                        <i class="fa fa-quote-left"></i>
                        <blockquote class="quote">
                            I love claiming the best spot in the lot before I even hit the road!
                        </blockquote><!--//quote-->
                    </div><!--//quote-box-->
                    <div class="people row">
                        <img class="img-rounded user-pic col-md-5 col-sm-5 col-xs-12 col-md-offset-1 col-sm-offset-1" src="assets/images/people/people-5.png" alt="" />
                        <p class="details text-center pull-left">
                            <span class="name">Adam Gordon</span>
                            <span class="title">San Antonio, Tx</span>
                        </p>                        
                    </div><!--//people-->
                </div><!--//item-->
            </div>
            <div class="press row text-center">
                <h3 class="note">Also featured in...(maybe one day)</h3>
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
    <a name="contact"></a>
    <section id="contact" class="contact section has-pattern">
        <div class="container">
            <div class="row text-center">
                <h2 class="title">Contact US</h2>
                <div class="intro col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
                    <p>We’d love to hear from you!</p>
                    <ul class="list-unstyled contact-details">
                        <li><i class="fa fa-envelope"></i><a href="mailto: hello@website.com">spotfindersa@gmail.com</a></li>
                        <!-- <li><i class="fa fa-phone-square"></i>0800 123 456</li> -->
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
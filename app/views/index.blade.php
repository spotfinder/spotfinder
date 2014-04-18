@extends('layouts.master')

@section('content')
    <!-- SpotFinder is Awesome!! -->
    <!-- ******PROMO****** -->
    <section id="promo" class="promo section offset-header has-pattern">
        <div class="container">
            <div class="row">
                <div class="overview col-md-8 col-sm-12 col-xs-12">
                    <h2 class="title">SpotSpy makes parking easy!</h2>
                    <ul class="summary">
                        <li>Find a spot before you leave!</li>
                        <li>Reserve and pay right away!</li>
                        <li>Get a confirmation text!</li>
                        <li>Make it to wherever you're going on time!</li>
                    </ul>
                    <div class="download-area">
                    @if(Auth::check())
                        <p>
                          <a href="{{{ action('HomeController@showReservation') }}}"><button type="button" class="btn btn-default btn-lg">Reserve A Spot</button></a>
                        </p>
                    @else
                        <p>
                          <a href="{{{ action('HomeController@showLogin') }}}"><button type="button" class="btn btn-default btn-lg">Login</button></a>
                          <a href="{{{ action('RegisterController@index') }}}"><button type="button" class="btn btn-default btn-lg">Sign Up</button></a>
                        </p>
                    @endif
                    </div>
                </div><!--//overview-->
                
                <!--// iPhone starts -->
                <div class="phone iphone iphone-black col-md-4 col-sm-12 col-xs-12 ">
                    <div class="iphone-holder phone-holder">
                        <div class="iphone-holder-inner">
                            <div class="slider flexslider">
                                <ul class="slides">
                                    <li>
                                        <img style="height:395px" src="/assets/images/iphone/stripe.png"  alt="" />
                                    </li>
                                    <li>
                                        <img style="height:395px" src="/assets/images/iphone/reserve.png"  alt="" />
                                    </li>
                                    <li>
                                        <img style="height:395px" src="assets/images/iphone/home.png"  alt="" />
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
                        <p> With SpotSpy you can make a parking reservation minutes before or days in advance! Never be late for that important meeting again. </p>   
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
                        <p> SpotSpy will send you a text with a confirmation number and street address to the lot! No more driving around in circles! </p>  
                    </div><!--//content-->               
                </div><!--//item-->
                <div class="item col-md-6 col-sm-6 col-xs-12 text-center">
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>                
                    </div><!--//icon-->
                    <div class="content">
                        <h3 class="title">Easy Checkout</h3>
                        <p> Easy secure payment system via stripe. I mean seriously, who carries cash anymore?</p>   
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
                    <img style="width:50px" style="width:50px" src="/assets/images/logo/magnifying-glass.gif">
                    <h2 class="title">How it works</h2>
                    <p class="intro">SpotSpy is a web app that provides a way for you to reserve a parking space by searching city lots. You can choose an area of the city for a desired arrival and departure time. Then you will be presented with the ability to choose a parking lot based upon availability and cost. Once complete you will have the option to pay and receive a confirmation email and text.</p>
                </div><!--//content-->
                <div id="video-container" class="video-container col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                     <iframe width="570" height="320" src="//www.youtube.com/embed/sGF6bOi1NfA" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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
                        <h3 class="question"><i class="fa fa-question-circle"></i>How do I reserve a spot?</h3>
                        <p class="answer">Just <a href="{{{action('RegisterController@index')}}}">signup</a> and head on over to <a href="{{{ action('HomeController@showReservation') }}}">spotfinder.dev/reserve</a> to get the best spot in the lot! You can pick an area of the city, which lot is closest to your destination and your arrival and departure time. We will then generate some options that best suite your needs. Pick one and hit that pay button! We will send you a confirmation email and text with all the info. Now all you have to do is park!</p>
                    </div><!--//item-->
                    <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>What happens if someone is in my spot?</h3>
                        <p class="answer">Well, I guess you will have a problem getting your car between the lines then! - Ok, eventually we would like to be able to send you a text or email with a different spot number. Right now we are trusting every one will be awesome humans and leave their spot when the time is up!</p>
                    </div><!--//item-->
                    <!-- <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>What's the differences between ipsum and dolor sit amet?</h3>
                        <p class="answer">Proin scelerisque magna ac eros aliquam aliquam id in lacus. Morbi quam tortor, consequat at orci non, vulputate volutpat libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sagittis laoreet urna eu ornare. Aenean tempor, leo vel eleifend porttitor. Aenean tempor, leo vel eleifend porttitor, nibh libero ultricies est.</p>
                    </div> --><!--//item-->
                </div><!--//faq-col-->
                <div class="faq-col col-md-6 col-sm-6 col-xs-12">
                    <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>How does SpotSpy know what spots are available?</h3>
                        <p class="answer">While we cant give away the secret sauce, we can tell you that we do a massive search in our database that compares lots and spaces with times and dates. It's pretty cool if your into geeky stuff. Take a short moment and thank Mike the guy who worked his butt off to give you this luxury!</p>
                    </div><!--//item-->
                    <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>Can I add my parking lots to SpotSpy?</h3>
                        <p class="answer">Absolutley! We would love to hear from you. Send us an e-mail with all the info and we will get back to you promptly!</p>
                    </div><!--//item-->
                  <!--   <div class="item">
                        <h3 class="question"><i class="fa fa-question-circle"></i>How can I proin scelerisque magna?</h3>
                        <p class="answer">Aenean tempor, leo vel eleifend porttitor, nibh libero ultricies est, sit amet ultricies magna enim et turpis. Donec aliquam velit eu sollicitudin cursus.Proin scelerisque magna ac eros aliquam aliquam id in lacus. Morbi quam tortor, consequat at orci non, vulputate volutpat libero. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean sagittis laoreet urna eu ornare. </p>
                    </div> --><!--//item-->
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
                <div class="content col-md-6 col-sm-6 col-md-12 text-center">
                    <h2 class="title">Story behind the app</h2>
                    <p>Our team created SpotSpy, a solution to dreadful, everyday parking in city lots. SpotSpy allows the user to reserve a parking space within a lot of their choice before even leaving for work, an event, or just to grab a cup of coffee. This project is a great representation of all the skills we acquired during our time at CodeUp. We used Laravel a PHP framework, a MYSQL database, HTML, CSS, Twitter Bootstrap, JavaScript and jQuery. We also included API’s such as Stripe and TWILIO.</p>
                </div><!--//content-->
                <div class="team col-md-5 col-sm-5 col-md-offset-1 col-sm-offset-1 col-xs-12">
                    <div class="row">
                        <div class="member col-md-6 text-center">
                            <img class="img-circle" style="width:160px" src="assets/images/team/karina.jpg" alt="" />
                            <p class="name">Karina Montes Trevino</p>
                            <p class="title">Developer</p>
                            <ul class="connect list-inline">
                                <li><a href="https://twitter.com/Kimt3D"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/karinamontestrevino"><i class="fa fa-linkedin"></i></a></li>
                                <li class="row-end"><a href="https://github.com/KarinaMontesTrevino"><i class="fa fa-github"></i></a></li>         
                            </ul>
                        </div><!--//member-->
                        <div class="member col-md-6 text-center">
                            <img class="img-circle" style="width:160px" src="assets/images/team/Tamburo.jpg" alt="" />
                            <p class="name">Mike Tamburo</p>
                            <p class="title">Developer</p>
                            <ul class="connect list-inline">
                                <li><a href="mailto:tamburocode@gmail.com" ><i class="fa fa-envelope"></i></a></li>
                                <li class="row-end"><a href="https://github.com/miketamburo"><i class="fa fa-github"></i></a></li>         
                            </ul>
                        </div><!--//member-->
                        <div class="member col-md-12 text-center">
                            <img class="img-circle" style="width:160px" src="assets/images/team/Grace.jpg" alt="" />
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
                            <a href="#">@spotspy</a> I love this #app. SpotSpy makes parking so easy!
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
                            <a href="#">@spotspy</a> Oh snap! I love SpotSpy! 
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
                        I find SpotSpy very useful - I never have to stress about finding parking again!
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
                         SpotSpy rocks my world! I use it every week!
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
                        <li><i class="fa fa-envelope"></i><a href="mailto:spotspysa@gmail.com">spotspysa@gmail.com</a></li>
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
            <small class="copyright pull-left">Copyright &copy; 2014 SpotSpy App</small>
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
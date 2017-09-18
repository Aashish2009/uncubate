<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="coworking, startup consulting, business consulting, ahmedabad, surat, mvp, product development, mobile apps, android apps, iphone apps, ui design, ux design, web applications, website design, coworking space, uncubate, stimulusco">
    <meta name="description" content="Uncubate enable enterpreneurs to convert their ideas into a business by consulting and technology service and provide plug and play coworking space for professionals and team with no hassle!">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Uncubate - Co-Working, Consulting, Starups, Startup Consulting, MVPs, Mentoring, Product Development</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/css/line-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/css/nivo-lightbox.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/css/menu_sideslide.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/css/main.css')}}">    
    <link rel="stylesheet" href="{{URL::asset('front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css"/>
   <link rel="shortcut icon" href="/images/sc-favicon.png" />

  </head>
  <body>
 	<!--  Google Analytics Code Start --> 
  	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-104796116-1', 'auto');
		  ga('send', 'pageview');
	</script>
	<!--  Google Analytics Code End -->
      <div class="menu-wrap">
        <nav class="menu navbar">
          <div class="icon-list navbar-collapse">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#video-area">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="#features">Startups</a>
              </li>  
              <!-- <li class="nav-item">
                <a class="nav-link" href="#expertise">Expertise</a>
              </li>-->                           
              <li class="nav-item">
                <a class="nav-link" href="#photos">Photos</a>
              </li>            
              <!-- <li class="nav-item">
                <a class="nav-link" href="#team">Team</a>
              </li> -->     
              <!-- <li class="nav-item">
                <a class="nav-link" href="#blog">Blog</a>
              </li>  -->
              <li class="nav-item">
                <a class="nav-link" href="#booknow">Post Space Requirement</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#subscribe">Subscribe</a>
              </li>
            </ul>
          </div>
        </nav> 
        <button class="close-button" id="close-button"><i class="lnr lnr-cross"></i></button>
      </div>      
  	<!-- Header Section Start -->

    <header id="video-area" data-stellar-background-ratio="0.5">    
      <div id="block" data-vide-bg="{{URL::asset($videoText['video_url'])}}"></div>
      <div class="fixed-top">
          <div class="container">
            <div class="logo-menu">
              <a href="/" class="logo">Uncubate</a>
              <button class="menu-button" id="open-button"><i class="lnr lnr-menu"></i></button>    
            </div>           
          </div>
      </div>
      <div class="overlay overlay-2"></div>      
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-10">
            <div class="contents text-center">
              <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">{{$videoText['big_text']}}</h1>
              <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms" id="ctwhite" >{{$videoText['small_text']}}</p>
              <a href="#booknow" class="btn btn-common wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms"><i class="lnr lnr-download"></i> Get Your Space Now</a>
            </div>
          </div>
        </div> 
      </div>      
    </header>
    <!-- Header Section End --> 


    <!-- Services Section Start -->
    <section id="services" class="section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">What do you <span>GET</span></h2>
          <hr class="lines wow zoomIn" data-wow-delay="0.3s">
          <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Turn-key solution for the startups, individual<br>professionals and freelancer! We love the artists too :)</p>
        </div>
        <div class="row">

			<div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="1s">
              <div class="icon">
                <i class="lnr lnr-tablet"></i>
              </div>
              <h4>Unlimited Internet</h4>
              <p>WiFi and Cable - you get unlimited internet at your desk</p>
            </div>
          </div>
		  <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.4s">
              <div class="icon">
                <i class="lnr lnr-cog"></i>
              </div>
              <h4>No Additional Billing</h4>
              <p>Electricity, taxes, maintenance - no need to worry about any bills!</p>
            </div>
          </div>
		  <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.8s">
              <div class="icon">
                <i class="lnr lnr-layers"></i>
              </div>
              <h4>Free AWS & Credits</h4>
              <p>Get benefit of $1000 AWS Credit* and other free tools</p>
            </div>
          </div>
		  <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.6s">
              <div class="icon">
                <i class="lnr lnr-briefcase"></i>
              </div>
              <h4>Conducive Environment</h4>
              <p>Selected and curated co-workers to create a conducive environment for all</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
              <div class="icon">
                <i class="lnr lnr-pencil"></i>
              </div>
              <h4>In-House Services</h4>
              <p>No need to look for design, development & IT services, all available in-house!</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="1.2s">
              <div class="icon">
                <i class="lnr lnr-chart-bars"></i>
              </div>
              <h4>Mentors & Consultants</h4>
              <p>Bringing industry experts through events and activities</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section End -->

	  <!-- Start Video promo Section -->
    <section class="video-promo section" data-stellar-background-ratio="0.5">
	<div id="block" data-vide-bg="video/coworking"></div>
    <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
              <div class="video-promo-content text-center">
                <h2 class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms">A Sneak Peak in Uncubate Co-Working</h2>
                <p class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms" id="ctwhite">Quick video introduction of the space</p>
                <a href="https://www.youtube.com/watch?v=-mUjv0P6qYQ" class="video-popup wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s"><i class="lnr lnr-film-play"></i></a>
              </div>
          </div>
        </div>
      </div>
	  
	  <div class="contents text-center">
				<br><br>
              <a href="#booknow" class="btn btn-border wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms"><i class="lnr lnr-download"></i> Book Your Desk</a>
            </div>
    </section>
    <!-- End Video Promo Section -->
	
    <!-- Features Section Start -->
    <section id="features" class="section" data-stellar-background-ratio="0.2">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">For <span>Startups</span></h2>
          <hr class="lines wow zoomIn" data-wow-delay="0.3s">
          <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">This is our playfield. We love working with startups, encounter new ideas, <br> We work with them closely through ideation, prototyping, business design, business plan, resource planning and funding.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="content-left text-right wow fadeInLeft animated" data-wow-offset="10">
              <div class="box-item left">
                <span class="icon">
                  <i class="lnr lnr-rocket"></i>
                </span>
                <div class="text">
                  <h4>Ideation</h4>
                  <p>Every idea needs a validation, we help startups to create their ideas into initial blueprint of the business</p>
                </div>
              </div>
              <div class="box-item left">
                <span class="icon">
                  <i class="lnr lnr-laptop-phone"></i>
                </span>
                <div class="text">
                  <h4>Prototyping / Beta / MVP</h4>
                  <p>An idea needs to be touched, felt and experienced by the users, we make those agile MVPs & we are good at it!.</p>
                </div>
              </div>
              <div class="box-item left">
                <span class="icon">
                  <i class="lnr lnr-cog"></i>
                </span>
                <div class="text">
                  <h4>Product Development</h4>
                  <p>Once validated, we plan the next level product based on the user feedback and future goals. Be it web or mobile!</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="show-box wow fadeInDown animated" data-wow-offset="10">
              <img src="{{URL::asset('front/img/features/feature.jpg')}}" alt="">
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="content-right text-left wow fadeInRight animated" data-wow-offset="10">
              <div class="box-item right">
                <span class="icon">
                  <i class="lnr lnr-camera-video"></i>
                </span>
                <div class="text">
                  <h4>Brand & Market Strategy</h4>
                  <p>We design and position the brand and create a market strategy for the startups for an early stage</p>
                </div>
              </div>
              <div class="box-item right">
                <span class="icon">
                  <i class="lnr lnr-magic-wand"></i>
                </span>
                <div class="text">
                  <h4>Business Plan & Financials</h4>
                  <p>We plan the cost and revenues projects and design a business plan with future goals, short term & long term</p>
                </div>
              </div>
              <div class="box-item right">
                <span class="icon">
                  <i class="lnr lnr-spell-check"></i>
                </span>
                <div class="text">
                  <h4>Business Case & Funding</h4>
                  <p>We help startup building a business case and the pitch, for raising funds and seeking partnerships</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features Section End -->    

  

 

    <!-- Start Pricing Table Section -->
    <!--
	<div id="pricing" class="section pricing-section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Pricing <span>Plans</span></h2>
          <hr class="lines wow zoomIn" data-wow-delay="0.3s">
          <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy <br> nibh euismod tincidunt ut laoreet dolore magna.</p>
        </div>

        <div class="row pricing-tables">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="pricing-table table-left wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="0.3s">
              <div class="icon">
                <i class="lnr lnr-rocket"></i> 
              </div>
              <div class="pricing-details">
                <h2>Starter Plan</h2>
                <span>Free</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Get Plan</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="pricing-table wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
              <div class="icon">
                <i class="lnr lnr-heart"></i> 
              </div>
              <div class="pricing-details">
                <h2>Popular Plan</h2>
                <span>$3.99</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="pricing-table table-left wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="0.3s">
              <div class="icon">
                <i class="lnr lnr-magic-wand"></i> 
              </div>
              <div class="pricing-details">
                <h2>Premium Plan</h2>
                <span>$9.50</span>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common">Buy Now</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- End Pricing Table Section -->
    
    <!-- Counter Section Start -->
    <div class="counters section" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row"> 
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="wow fadeInUp" data-wow-delay=".2s">
              <div class="facts-item"> 
                <div class="icon">
                  <i class="fa fa-usd"></i>
                </div>                
                <div class="fact-count">
                  <h3>$<span class="counter">1000</span></h3>
                  <h4>AWS Credits*</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="wow fadeInUp" data-wow-delay=".4s">
              <div class="facts-item">
                <div class="icon">
                  <i class="lnr lnr-coffee-cup"></i>
                </div>                
                <div class="fact-count">
                  <h3><span class="counter">2000</span>+</h3>
                  <h4>Cup of Tea</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="wow fadeInUp" data-wow-delay=".6s">
              <div class="facts-item">
                <div class="icon">
                  <i class="lnr lnr-user"></i>
                </div>                
                <div class="fact-count">
                  <h3><span class="counter">35</span>+</h3>
                  <h4>CoWorked</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="wow fadeInUp" data-wow-delay=".8s">
              <div class="facts-item">
                <div class="icon">
                  <i class="lnr lnr-heart"></i>
                </div>                
                <div class="fact-count">
                  <h3>So much</h3>
                  <h4>of Community Love</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Counter Section End -->

    <!-- testimonial Section Start -->
    <?php 
	if(count($testimonial) > 0){
	?>
    <!-- testimonial Section Start -->
    <div id="testimonial" class="section">
      <div class="container">
      	<div class="section-header">          
          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Testi<span>monial</span></h2>
        </div>
        <div class="row justify-content-md-center">
          <div class="col-md-10 wow fadeInRight" data-wow-delay="0.2s">
            <div class="touch-slider owl-carousel owl-theme">
              <?php 
              foreach($testimonial as $v){
              ?>
              <div class="testimonial-item">
                <img src="{{URL::asset($v['image_large'])}}" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>{{$v['testimonial']}}</p>
                  <h3>{{$v['name']}}</h3>
                  <span>{{$v['designation']}}, {{$v['organisation']}}</span>
                </div>
              </div>
			  <?php 
              }
			  ?>
            </div>
          </div>
        </div>        
      </div>
    </div>
    <!-- testimonial Section Start -->
    <?php 
	}
    ?>
    <!-- testimonial Section Start -->
   
   <!-- Portfolio Section -->
    <section id="photos" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Uncubate <span>Photos</span></h2>
          <hr class="lines wow zoomIn" data-wow-delay="0.3s">
          <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Have a look at the pictures of the Co-Working space</p>
        </div>
        <div class="row">          
          <div class="col-md-12">
            <!-- Portfolio Controller/Buttons -->
            <div class="controls text-center wow fadeInUp" data-wow-delay=".6s">
              <a class="control mixitup-control-active btn btn-common" data-filter="all" id="gallery1" onclick="changelightboxdata(this.id);">
                All 
              </a>
              <a class="control btn btn-common" data-filter=".Sitting-Area" id="gallery2" onclick="changelightboxdata(this.id);">
                Sitting Area 
              </a>
              <a class="control btn btn-common" data-filter=".Meeting-Area" id="gallery3" onclick="changelightboxdata(this.id);">
                Meeting Area
              </a>
              <a class="control btn btn-common" data-filter=".Conference-Room" id="gallery4" onclick="changelightboxdata(this.id);">
                Conference Room 
              </a>
              <a class="control btn btn-common" data-filter=".Events" id="gallery5" onclick="changelightboxdata(this.id);">
                Events 
              </a>
              <a class="control btn btn-common" data-filter=".Facilities" id="gallery6" onclick="changelightboxdata(this.id);">
                Facilities 
              </a>
            </div>
            <!-- Portfolio Controller/Buttons Ends-->          

            <!-- Portfolio Recent Projects -->
            <div id="portfolio" class="row wow fadeInUp" data-wow-delay="0.8s">
              <div id="portfolio" class="row wow fadeInUp" data-wow-delay="0.8s">
              <?php 
              foreach($projects as $v){
              ?>
              <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix {{str_replace(' ','-',$v['type'])}} planning">
                <div class="portfolio-item">
                  <div class="shot-item">
                    <a class="overlay lightbox"  data-lightbox-gallery="gallery1" href="{{URL::asset($v['image_large'])}}">
                      <img src="{{URL::asset($v['image_large'])}}" alt="" />  
                      <i class="lnr lnr-plus-circle item-icon"></i>
                    </a>
                  </div>               
                </div>
              </div>
              <?php 
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Container Ends -->
    </section>
    <!-- Portfolio Section Ends --> 
    
    <!-- Download Section Start -->
    <section id="download" class="section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><span>DOWNLOAD</span> BROCHURE</h2>
        </div>
        <div class="row">
          <div class="col-md-12">            
            <div class="download-area text-center wow fadeInUp" data-wow-delay="0.3s">
                <a target="_blank" href="front/downloads/uncubateco.pdf" class="btn btn-border"><i class="fa fa-file-pdf-o"></i>Download Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Download Section End -->

    <!-- Blog Section -->
    <?php /*<section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Latest <span>Blogs</span></h2>
          <hr class="lines wow zoomIn" data-wow-delay="0.3s">
          <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Read about latests trends, about startup ecoystem from our experts.</p>
        </div>
        <div class="row">
          <?php 
          foreach ($blogs as $v){
          ?>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper wow fadeInUp" data-wow-delay="0.3s">
              <div class="blog-item-img">
                <a href="single-post.html">
                  <img src="{{URL::asset($v['image_large'])}}" alt="">
                </a>                
              </div>
              <div class="blog-item-text"> 
                <h3>
                <a target="_blank" href="{{$v['medium_link']}}">{{$v['blog_title']}}</a>
                </h3>
                <div class="meta-tags">
                  <span class="date"><i class="lnr lnr-calendar-full"></i>on {{date('d M, Y',strtotime($v['blog_publish_date']))}}</span>
                </div>
                <p>
                {{(strlen(strip_tags($v['blog_desc'])) > 135) ? substr(strip_tags($v['blog_desc']), 0, 135).'...' : strip_tags($v['blog_desc'])}}
                </p>
                <a target="_blank" href="{{$v['medium_link']}}" style="color: #4676fa;padding: 0px;text-decoration: none;margin: 0px;" class="btn btn-link">Read More</a>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>
          <?php 
          }
          ?>
		  </div>
		  <div class="row justify-content-md-center">
			  <a target="_blank" href="https://medium.com/@snehism" class="btn btn-common wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="400ms" 
			  style="visibility: visible;-webkit-animation-duration: 1000ms; -moz-animation-duration: 1000ms; animation-duration: 1000ms;-webkit-animation-delay: 400ms; 
			  -moz-animation-delay: 400ms; animation-delay: 400ms;"><i class="fa fa-eye"></i> View All</a>
		  </div>
      </div>
    </section> */ ?>
    <!-- blog Section End -->

    <!-- Contact Section Start -->
    <section id="booknow" class="section">
      <div class="container">
        <div class="row justify-content-md-center">          
          <div class="col-md-9 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">            
            <div class="contact-block">
              <div class="section-header">          
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">POST <span>SPACE</span> REQUIREMENT</h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
              </div>
              <form id="contactForm">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required data-error="Please enter your name">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="email" placeholder="Your Email" id="email" class="form-control" name="name" required data-error="Please enter your email">
                      <div class="help-block with-errors"></div>
                    </div> 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" pattern="[0-9]{10}" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required data-error="Please enter valid mobile number">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Company Name" id="company" class="form-control" name="company" required data-error="Please enter your company name">
                      <div class="help-block with-errors"></div>
                    </div> 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="business" name="business" placeholder="Type of Business / Profession" required data-error="Please enter your business type">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="number" class="form-control" id="months" name="months" min="0"  placeholder="How long you need the space for? (In Months)" required data-error="Please mention for how long you need the space">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="number" class="form-control" id="seats" name="seats"  min="0"  placeholder="No. of seats?" required data-error="Please enter your mobile number">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text" pattern="\d{1,2}-\d{1,2}-\d{4}" class="form-control" id="moveindate" name="moveindate" placeholder="Move in date?" 
                      required data-error="Please enter valid date">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text"  class="form-control" pattern="\d{1,2}:\d{1,2} (AM|PM)" style="margin-bottom: 0px;" id="workhour1" name="workhour1" placeholder="Starting Hour*" required data-error="Please enter valid work hours">
                      <span style="font-size: 12px; color:#292b2c;">*Typical working hours</span>
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="text"  class="form-control" id="workhour2" pattern="\d{1,2}:\d{1,2} (AM|PM)" name="workhour2" placeholder="Ending Hour*" required data-error="Please enter valid work hours">
                      <div class="help-block with-errors"></div>
                      <input type="hidden"  name="workhour" id="workhourval">
                    </div>                                 
                  </div>
                  <div class="col-md-6">
                  	<div class="form-group">
					  <label for="exampleInputPassword1">Do you need mentoring or consulting for your business?</label>
					  <div class="radio">
					    <label><input type="radio" name="consulting" id="consulting" value="Yes" style="margin-right: 7px;" checked> Yes</label><br/>
					    <label><input type="radio" name="consulting" id="consulting" value="No" style="margin-right: 7px;"> No</label><br/>
					    <label><input type="radio" name="consulting" id="consulting" value="Not Sure" style="margin-right: 7px;"> Not Sure</label>
					  </div>
					</div>
                  </div>
                  <div class="col-md-6">
                  	<div class="form-group">
					  <label for="exampleInputPassword1">Location</label>
					  <div class="radio">
					    <label><input type="radio" name="location" id="location" value="Vijay Char Rasta" checked style="margin-right: 7px;"> Vijay Char Rasta</label><br/>
					    <label><input type="radio" name="location" id="location" value="Pakwan Char Rasta" style="margin-right: 7px;"> Pakwan Char Rasta</label><br/>
					  </div>
					</div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group"> 
                      <textarea class="form-control" placeholder="Any other comments" id="message" rows="2"></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="submit-button text-center">
                      <button class="btn btn-common" id="submit" type="submit" onclick="workhourdata();">Send Message</button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div> 
                      <div class="clearfix"></div> 
                    </div>
                  </div>
                </div>            
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section End -->

    <!-- Subcribe Section Start -->
    <div id="subscribe" class="section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Subscribe <span>Newsletter</span></h2>
          <hr class="lines wow zoomIn" data-wow-delay="0.3s">
          <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Subscribe to get all latest news from us.</p>
        </div>
        <div class="row justify-content-md-center">
          <div class="col-md-8">
              <form data-wow-delay="0.3s" id="newsSubscriptionForm">
                <input type="email" class="mb-20 form-control" name="email" id="newsEmail" placeholder="Your Email Address" required data-error="Please enter your email">
                <button class="sub_btn" id="subBtn" type="button">subscribe</button>
              </form><br>
              <div id="newsSubmitMsg" class="h3 text-center hidden"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subcribe Section End -->

    <!-- Footer Section Start -->
    <footer>          
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="social-icons wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
              <ul>
                <li class="facebook"><a target="_blank" href="https://www.facebook.com/uncubate/"><i class="fa fa-facebook"></i></a></li>
                <li class="twitter"><a target="_blank" href="https://www.instagram.com/uncubate/"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
            <div class="site-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
              <p>All copyrights reserved &copy; <?php echo date('Y'); ?> - Uncubate.Co</p>
            </div>  
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer Section End --> 

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lnr lnr-arrow-up"></i>
    </a>

    <div id="loader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>    

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="{{URL::asset('front/js/jquery-min.js')}}"></script>
    <script src="{{URL::asset('front/js/tether.min.js')}}"></script>
    <script src="{{URL::asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('front/js/classie.js')}}"></script>
    <script src="{{URL::asset('front/js/mixitup.min.js')}}"></script>
    <script src="{{URL::asset('front/js/nivo-lightbox.js')}}"></script>
    <script src="{{URL::asset('front/js/owl.carousel.min.js')}}"></script>    
    <script src="{{URL::asset('front/js/jquery.stellar.min.js')}}"></script>    
    <script src="{{URL::asset('front/js/jquery.nav.js')}}"></script>    
    <script src="{{URL::asset('front/js/smooth-scroll.js')}}"></script>    
    <script src="{{URL::asset('front/js/smooth-on-scroll.js')}}"></script>    
    <script src="{{URL::asset('front/js/wow.js')}}"></script>    
    <script src="{{URL::asset('front/js/menu.js')}}"></script>
    <script src="{{URL::asset('front/js/jquery.vide.js')}}"></script>
    <script src="{{URL::asset('front/js/jquery.counterup.min.js')}}"></script>    
    <script src="{{URL::asset('front/js/jquery.magnific-popup.min.js')}}"></script>    
    <script src="{{URL::asset('front/js/waypoints.min.js')}}"></script>    
    <script src="{{URL::asset('front/js/form-validator.min.js')}}"></script>
    <script src="{{URL::asset('front/js/main.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{{URL::asset('/js/moment/moment.min.js')}}}"></script>
    <script src="{{{URL::asset('/js/datepicker/daterangepicker.js')}}}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    @include('front.ajax_script')
    <script>
    function workhourdata(){
        var value = $('#workhour1').val()+' - '+$('#workhour2').val();
       $('#workhourval').val(value);
    }
    function changelightboxdata(id){
        var tabclass = $("#"+id).attr('data-filter');
        if(tabclass !== "all"){
        	$(tabclass).find(".lightbox").attr('data-lightbox-gallery',id);	     
        }else{
        	$('#portfolio').find(".lightbox").attr('data-lightbox-gallery',id);
        }
    }
    $(document).ready(function(){
    	$('#moveindate').daterangepicker({
        	minDate: moment(),
            singleDatePicker: true,
            calender_style: "picker_2",
            showDropdowns: true,
            drops: 'up',
            format: 'DD-MM-YYYY',
        },function(start, end, label) {
        	$('#moveindate').blur();
        	$('#moveindate').focus();
        });

    	$("#workhour").focus(function(){
 			$(".calendar").hide();
        });

    	$("#moveindate").focus(function(){
    		$(".daterangepicker").find(".first").show();
        });

    	$('#workhour').on('apply.daterangepicker', function(ev, picker) {
    		$('#workhour').blur();
    	});

    	$('#workhour').daterangepicker({
            calender_style: "picker_2",
            showDropdowns: true,
            format: 'hh:mm a',
        });
    	$('#workhour1').timepicker({
    		defaultTime:false,
    		icons:{
    		    up: 'fa fa-chevron-up',
    		    down: 'fa fa-chevron-down'
    		}
    		
    		}).on('show.timepicker', function(e) {
    			var d = new Date();
    			var hours =d.getHours();
        		var mid = "AM";
        		if (hours > 12) {
        		    hours -= 12;
        		    mid = "PM"
        		} else if (hours === 0) {
        		   hours = 12;
        		   mid = "AM"
        		}
				$(".bootstrap-timepicker-hour").val(hours);
				$(".bootstrap-timepicker-minute").val(d.getMinutes());
				$(".bootstrap-timepicker-meridian").val('PM');
    		  });
    	$('#workhour2').timepicker({
    		icons:{
    		    up: 'fa fa-chevron-up',
    		    down: 'fa fa-chevron-down'
    		},
        	defaultTime:false }).on('show.timepicker', function(e) {
        		var d = new Date();
        		var hours =d.getHours();
        		var mid = "AM";
        		if (hours > 12) {
        		    hours -= 12;
        		    mid = "PM"
        		} else if (hours === 0) {
        		   hours = 12;
        		   mid = "AM"
        		}
				$(".bootstrap-timepicker-hour").val(hours);
				$(".bootstrap-timepicker-minute").val(d.getMinutes());
				$(".bootstrap-timepicker-meridian").val('PM');
			  });
    	$('#moveindate').keydown(function() {
    		  //code to not allow any changes to be made to input field
    		  return false;
    		});
    });
    </script>
  </body>
</html>
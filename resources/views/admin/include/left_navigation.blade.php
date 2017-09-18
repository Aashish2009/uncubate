		<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/admin" class="site_title"><img src="{{{URL::asset('images/logo.png')}}}" alt=""></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <!-- <div class="profile">
              <div class="profile_pic">
                <img src="{{{URL::asset('images/img.jpg')}}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li {{{ (Request::segment(2) == 'messages') ? 'class = active' : ''  }}}>
                  	<a href="{{{URL::route('admin_messages')}}}"><i class="fa fa-envelope"></i>  Inquiry </a>
                  </li>
                  <!-- <li {{{ (Request::segment(2) == 'bookings') ? 'class = active' : ''  }}}>
                  	<a href="{{{URL::route('admin_bookings')}}}"><i class="fa fa-braille"></i> Bookings </a>
                  </li> -->
                  <!-- <li {{{ (Request::segment(2) == 'team-member') ? 'class = active' : ''  }}}>
                  	<a href="{{{URL::route('admin_team_member')}}}"><i class="fa fa-users"></i> Team </a>
                  </li> -->
                  <li {{{ (Request::segment(2) == 'projects') ? 'class = active' : ''  }}}>
                  	<a href="{{{URL::route('admin_projects')}}}"><i class="fa fa-picture-o"></i> Photo </a>
                  </li>
                  <li {{{ (Request::segment(2) == 'blog') ? 'class = active' : ''  }}}>
                  	<a href="{{{URL::route('admin_blog')}}}"><i class="fa fa-comment"></i>  Blogs </a>
                  </li>
                  <li {{{ (Request::segment(2) == 'testimonials') ? 'class = active' : ''  }}}>
                  	<a href="{{{URL::route('admin_leaders')}}}"><i class="fa fa-quote-left"></i>  Testimonial </a>
                  </li>
                  <li {{{ (Request::segment(2) == 'news-letter-subscription') ? 'class = active' : ''  }}}>
                  	<a href="{{{URL::route('news_letter_subscription')}}}"><i class="fa fa-newspaper-o"></i>  News Letter Subscription </a>
                  </li>
                  <li {{{ (Request::segment(2) == 'video-text') ? 'class = active' : ''  }}}>
                  	<a href="{{{URL::route('admin_video_text')}}}"><i class="fa fa-file-video-o"></i>  Home video & text </a>
                  </li>
                  <li {{{ (Request::segment(2) == 'location') ? 'class = active' : ''  }}}>
                  	<a href="{{{URL::route('admin_location')}}}"><i class="fa fa-map-marker"></i>  Location Master </a>
                  </li>
                  <li {{{ (Request::segment(2) == 'status') ? 'class = active' : ''  }}}>
                    <a href="{{{URL::route('admin_status')}}}"><i class=" fa fa-map-signs"></i>  Status Master </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <p>&nbsp;&nbsp;&nbsp;&nbsp;Copyrights &copy;<?php echo date('Y'); ?> UNCUBATE. </p>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
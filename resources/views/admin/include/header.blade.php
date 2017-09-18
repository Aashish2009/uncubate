<?php
use Carbon\Carbon;
?>
		<div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{{URL::asset('images/img.png')}}}" alt="">Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="javascript:;">  Profile</a>
                    </li> -->
                    <li><a href="{{{URL::route('logout')}}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>
				<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">{{{($msgs['count'] > 0) ? $msgs['count'] : ''}}}</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  	<?php 
                  	foreach ($msgs['last5'] as $msg){
                  	?>
                    <li>
                      <a href="{{{URL::route('admin_messages_view', $msg['slug'])}}}">
                        <span>
                           <span>{{{$msg['name']}}}</span>
                        <span class="time">{{{Carbon::createFromTimestamp(strtotime($msg['created_at']))->diffForHumans()}}}</span>
                        </span>
                        <span class="message">
                        	{{{strlen($msg['message']) > 100 ? substr($msg['message'],0,100)."..." : $msg['message']}}}
                        </span>
                      </a>
                    </li>
                    <?php 
                  	}
                    ?>
                    <li>
                      <div class="text-center">
                        <a href="{{{URL::route('admin_messages')}}}">
                          <strong>All Messages</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
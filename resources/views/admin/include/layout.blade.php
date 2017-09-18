<!DOCTYPE html>
<html lang="en">
  <head>
    @yield('head')
	@yield('script')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
    	<!-- left navigation -->
    	@yield('left_navigation')      
		<!-- /left navigation -->
		
        <!-- top navigation -->
    	@yield('header')	    	
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        @yield('footer')
        <!-- /footer content -->
      </div>
    </div>

	@yield('footjs')
    
	@yield('footscript')
  </body>
</html>
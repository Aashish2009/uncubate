@extends('errors.layout')
	@section('head')
		@include('errors.head')
	@stop
	@section('script')
	
	@stop
	@section('content')
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">404</h1>
              <h2>Sorry but we couldnt find this page</h2>
              <p>This page you are looking for does not exist <a href="#">Report this?</a>
              </p>
              <div class="mid_center">
                <h3>Search</h3>
                <div class="col-xs-12 form-group pull-right top_search">
                    <script>
					  (function() {
					    var cx = '001393551539407651590:vi9hqtsdpve';
					    var gcse = document.createElement('script');
					    gcse.type = 'text/javascript';
					    gcse.async = true;
					    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
					    var s = document.getElementsByTagName('script')[0];
					    s.parentNode.insertBefore(gcse, s);
					  })();
					</script>
					<gcse:search></gcse:search>
                      <!-- <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>
    <style>
    .gsc-control-cse {
    	background: #2A3F54;
    	border: none;
    }
    form.gsc-search-box {
    	background: #2A3F54;
    	border: none;
    	-webkit-box-shadow: none;
    }
    table.gsc-search-box {
    	width: 100%;
    }
    input.gsc-input, input.gsc-search-button {
    	height: 32px;
    }
    table.gsc-search-box td.gsc-input{
    	padding-right : 0;
    }
    </style>
    @stop
@extends('admin.include.layout')
	@section('head')
		@include('admin.include.formhead')
	@stop
	
	@section('headscript')
	<script>
	
	</script>	
	@stop
	@section('left_navigation')
		@include('admin.include.left_navigation')
	@stop
	@section('header')
		@include('admin.include.header')
	@stop
	@section('content')
    	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <a href="{{{URL::route('admin_messages')}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> All Messages</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Messages</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['name'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Email address</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['email'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile Number</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['mobile'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['status'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Company Name</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['company'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Space for (Months)</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['months'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Move In Date</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['moveindate'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Work Hours</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['workhour'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Comments</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['comments'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Message</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($message)) ? $message['message'] : ''}}}
						</div>
		              </div>
		              <br />
                  </div>
                </div>
                <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
              </div>
            </div>
          </div>
        </div>
	@stop
	
	@section('footer')
		@include('admin.include.footer')
	@stop

	@section('footjs')
		@include('admin.include.formfootjs')
	@stop
	
	@section('footscript')
		<script>
		    
	    </script>
	@stop

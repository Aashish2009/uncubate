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
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Home page background video and text.</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      <div class="row">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Big Text</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($data)) ? $data['big_text'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Medium Text</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($data)) ? $data['medium_text'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Small Text</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		{{{(isset($data)) ? $data['small_text'] : ''}}}
						</div>
		              </div>
		              <div class="row">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Video</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<video class="img-responsive avatar-view" controls>
								<source src="{{URL::asset($data['video_url'])}}" type="video/mp4">
							</video>
						</div>
		              </div>
		              <div class="ln_solid"></div>
		              <div class="row">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">&nbsp;</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<a href="{{URL::route('admin_video_text_edit')}}"><button class="btn btn-warning" style>Edit</button></a>
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

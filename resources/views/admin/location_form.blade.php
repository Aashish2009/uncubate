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
                <a href="{{{URL::route('admin_location')}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> Location</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{{(isset($location)) ? 'Edit' : 'Add New'}}} Location</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" class="form-horizontal form-label-left" method="post" action="{{{URL::route('admin_location_submit')}}}" enctype="multipart/form-data">
                      <div class="form-group has-feedback">
                      	<label class="control-label col-md-1 col-sm-1 col-xs-12">Location</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
		               		<input type="text" class="form-control" name="location" placeholder="Location" value="{{{(isset($location)) ? $location['location'] : ''}}}"
							data-bv-notempty="true" id="location" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
                          <input type="hidden" name="slug" id="slug" value="{{{(isset($location)) ? $location['slug'] : ''}}}" />
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <button type="button" class="btn btn-primary" onclick="location.href = '{{{URL::route('admin_location')}}}';">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
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
		    $(document).ready(function(){
		    	$('#form').bootstrapValidator();
		    });
	    </script>
	@stop

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
                <a href="{{{URL::route('admin_gallery_videos', $gallery_slug)}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> {{{$gallery['gallery_name']}}} Updates</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{{(isset($gallery_video)) ? 'Edit' : 'Add New'}}} Videos</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" class="form-horizontal form-label-left" method="post" action="{{{URL::route('admin_gallery_videos_submit', $gallery_slug)}}}" >
                      <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<input type="text" class="form-control" name="gallery_video_title" placeholder="Title" data-bv-notempty="true" id="gallery_video_title" 
							data-bv-notempty-message="This field is required and cannot be empty" value="{{{(isset($gallery_video)) ? $gallery_video['gallery_video_title'] : ''}}}">
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Url</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<input type="text" class="form-control" name="gallery_video_url" placeholder="Url" data-bv-notempty="true" id="gallery_video_url" 
                      		data-bv-uri="true" data-bv-uri-message="please enter valid url."
							data-bv-notempty-message="This field is required and cannot be empty" value="{{{(isset($gallery_video)) ? $gallery_video['gallery_video_url'] : ''}}}">
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<textarea type="text" class="form-control" name="gallery_video_desc" placeholder="Description" data-bv-notempty="true" id="gallery_video_desc" rows="4"
							data-bv-notempty-message="This field is required and cannot be empty">{{{(isset($gallery_video)) ? $gallery_video['gallery_video_desc'] : ''}}}</textarea>
						</div>
		              </div>
		              <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="slug" id="slug" value="{{{(isset($gallery_video)) ? $gallery_video['slug'] : ''}}}" />
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <input type="hidden" name="gallery_id" id="gallery_id" value="{{{$gallery['id']}}}" />
                          <button type="button" class="btn btn-primary" onclick="location.href = '{{{URL::route('admin_gallery_videos', $gallery_slug)}}}';">Cancel</button>
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

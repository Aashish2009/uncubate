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
                    <form id="form" enctype="multipart/form-data" class="form-horizontal form-label-left" method="post" 
                    action="{{{URL::route('admin_video_text_submit')}}}" onsubmit="return {{{(isset($data)) ? 'true' : 'validateVideo()'}}}">
                      <div class="form-group has-feedback">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Big Text</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="big_text" placeholder="Big Text" value="{{{(isset($data)) ? $data['big_text'] : ''}}}"
							data-bv-notempty="true" id="big_text" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Medium Text</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="medium_text" placeholder="Medium Text" value="{{{(isset($data)) ? $data['medium_text'] : ''}}}"
							data-bv-notempty="false" id="medium_text" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Small Text</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="small_text" placeholder="Small Text" value="{{{(isset($data)) ? $data['small_text'] : ''}}}"
							data-bv-notempty="true" id="small_text" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Photo</label>
                      	<div class="col-md-4 col-sm-4 col-xs-12">
                      		<div class="form-video">
                      			<video class="video-responsive avatar-view" controls id="project_video">
								  <source src="{{URL::asset((isset($data)) ? $data['video_url'] : '')}}" type="video/mp4">
								</video>
		               			<button onclick="openFileBrowse()" type="button" class="btn btn-primary btn-xs img-edit" style="right: 12px;left: auto;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{{(isset($data)) ? 'Edit' : 'Add'}}}</button>
		               			<input type="file" id="new_video" name="video" style="display: none;" onchange="return validateVideo()">
		               		</div>
						</div>
		              </div>
		              <div class="form-group has-feedback video-err-block" style="display: none;">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">&nbsp;</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<small id="errVideo" class="help-block"></small>
						</div>
		              </div>
		              <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <button type="button" class="btn btn-primary" onclick="location.href = '{{{URL::route('admin_video_text')}}}';">Cancel</button>
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
			function openFileBrowse(){
				$('#new_video').click();
			}
			function validateVideo() {
				var fuData = document.getElementById('new_video');
			    var FileUploadPath = fuData.value;
				var File = $("#new_video").val();
			    if (File == '') {
			    	$("#errVideo").html("Please upload an image.");
			    	$(".video-err-block").show();
			    	return false;
			    } else {
			    	document.getElementById("errVideo").innerHTML = "";
			        var Extension = FileUploadPath.substring(
			          FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
			        if (Extension == "mp4") {
				        console.log(fuData.files[0].size);
				    	if(fuData.files[0].size > (1024*1024*10)){
				    		$("#errVideo").html("Only allows file size up to 10 mb.");
				        	$(".video-err-block").show();
				        	return false;
					    }else{
					      	$(".video-err-block").hide();
				          	if (fuData.files && fuData.files[0]) {
					        	var reader = new FileReader();
					        	reader.onload = function (e) {
					            	$('#project_video').attr('src', e.target.result);
					        	}
						  		reader.readAsDataURL(fuData.files[0]);
						  	}
						  	return true;
					    }
			        } else {
			        	$("#errVideo").html("Only allows file types mp4.");
			        	$(".video-err-block").show();
			        	return false;
			        }
			    }
			}
		    $(document).ready(function(){
		    	$('#form').bootstrapValidator();
		    	$('.form-control').on('input', function(){
					$(this).parent().find('.server-error').remove();
					$('.login-error').remove();
				});
		    });
	    </script>
	@stop

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
                <a href="{{{URL::route('admin_project_images', $project_slug)}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> {{{$project['project_title']}}} Images</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{{(isset($project_image)) ? 'Edit' : 'Add New'}}} {{{$project['project_title']}}} Images</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" enctype="multipart/form-data" class="form-horizontal form-label-left" method="post" 
                    action="{{{URL::route('admin_project_images_submit', $project_slug)}}}" onsubmit="return {{{(isset($project_image)) ? 'true' : 'validateImage()'}}}">
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="title" 
		               		placeholder="Title" value="{{{(isset($project_image)) ? $project_image['title'] : ''}}}"
							data-bv-notempty="true" id="title" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
                      		<div class="form-img">
		               			<img class="img-responsive avatar-view" id="project_img"
		               			src="{{{URL::asset((isset($project_image) && $project_image['image_small'] != '') ? $project_image['image_small'] : 'images/default-image.jpg')}}}">
		               			<button onclick="openFileBrowse()" type="button" class="btn btn-primary btn-xs img-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{{(isset($project_image)) ? 'Edit' : 'Add'}}}</button>
		               			<input type="file" id="new_img" name="image" style="display: none;" onchange="return validateImage()">
		               		</div>
						</div>
		              </div>
		              <div class="form-group has-feedback img-err-block" style="display: none;">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<small id="errImage" class="help-block"></small>
						</div>
		              </div>
		              <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="slug" id="slug" value="{{{(isset($project_image)) ? $project_image['slug'] : ''}}}" />
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <input type="hidden" name="projects_id" id="projects_id" value="{{{$project['id']}}}" />
                          <button type="button" class="btn btn-primary" onclick="location.href = '{{{URL::route('admin_project_images', $project_slug)}}}';">Cancel</button>
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
				$('#new_img').click();
			}
			function validateImage() {
				var fuData = document.getElementById('new_img');
			    var FileUploadPath = fuData.value;
				var File = $("#new_img").val();
			    if (File == '') {
			    	$("#errImage").html("Please upload an image.");
			    	$(".img-err-block").show();
			    	return false;
			    } else {
			    	document.getElementById("errImage").innerHTML = "";
			        var Extension = FileUploadPath.substring(
			          FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
			        if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
				        console.log(fuData.files[0].size);
				    	if(fuData.files[0].size > (1024*1024)){
				    		$("#errImage").html("Only allows file size up to 1 mb.");
				        	$(".img-err-block").show();
				        	return false;
					    }else{
					      	$(".img-err-block").hide();
				          	if (fuData.files && fuData.files[0]) {
					        	var reader = new FileReader();
					        	reader.onload = function (e) {
					            	$('#project_img').attr('src', e.target.result);
					        	}
						  		reader.readAsDataURL(fuData.files[0]);
						  	}
						  	return true;
					    }
			        } else {
			        	$("#errImage").html("Only allows file types PNG, JPG and JPEG.");
			        	$(".img-err-block").show();
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
		    	$('#date').daterangepicker({
		            singleDatePicker: true,
		            calender_style: "picker_2",
		            showDropdowns: true,
		            format: 'DD-MM-YYYY',
		        });
		    });
	    </script>
	@stop

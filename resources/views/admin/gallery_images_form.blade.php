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
		<link href="{{{URL::asset('/vendors/dropzone/dist/min/dropzone.min.css')}}}" rel="stylesheet">
    	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <a href="{{{URL::route('admin_gallery_images', $gallery_slug)}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> {{{$gallery['gallery_name']}}} Images</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <?php 
                  if(!isset($gallery_image)){
                  ?>
                  <div class="x_title">
                    <h2>Add Multiple Images </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Drag multiple files to the box below for multi upload or click to select files. This is for demonstration purposes only, the files are not uploaded to any server.</p>
                    <form class="dropzone"></form>
                    <br />
                  <?php 
                  }
                  ?>  
               	  <!--div class="x_title">
                    <h2>{{{(isset($gallery_image)) ? 'Edit' : 'Or Add Single'}}} Image</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" enctype="multipart/form-data" class="form-horizontal form-label-left" method="post" 
                    action="{{{URL::route('admin_gallery_images_submit', $gallery_slug)}}}" onsubmit="return {{{(isset($gallery_image)) ? 'true' : 'validateImage()'}}}">
                      <div class="form-group has-feedback">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Label</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<input type="text" class="form-control" name="image_label" placeholder="Label" data-bv-notempty="true" id="image_label" 
							data-bv-notempty-message="This field is required and cannot be empty" value="{{{(isset($gallery_image)) ? $gallery_image['image_label'] : ''}}}">
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-2 col-sm-2 col-xs-12">Image</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
                      		<div class="form-img">
		               			<img class="img-responsive avatar-view" id="gallery_img"
		               			src="{{{URL::asset((isset($gallery_image) && $gallery_image['image_small'] != '') ? $gallery_image['image_small'] : 'images/default-image.jpg')}}}">
		               			<button onclick="openFileBrowse()" type="button" class="btn btn-primary btn-xs img-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{{(isset($gallery_image)) ? 'Edit' : 'Add'}}}</button>
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
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                          <input type="hidden" name="slug" id="slug" value="{{{(isset($gallery_image)) ? $gallery_image['slug'] : ''}}}" />
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <input type="hidden" name="gallery_id" id="gallery_id" value="{{{$gallery['id']}}}" />
                          <button type="button" class="btn btn-primary" onclick="location.href = '{{{URL::route('admin_gallery_images', $gallery_slug)}}}';">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div -->
              </div>
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
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
					            	$('#gallery_img').attr('src', e.target.result);
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
		    	$('#start_dt').daterangepicker({
		            singleDatePicker: true,
		            calender_style: "picker_2",
		            showDropdowns: true,
		            format: 'DD-MM-YYYY',
		        });
		    });
	    </script>
	    <script src="{{{URL::asset('/vendors/dropzone/dist/min/dropzone.min.js')}}}"></script>
	    <script>
	    Dropzone.autoDiscover = false;
	    $(".dropzone").dropzone({
	        url: "{{{URL::route('admin_gallery_images_upload', $gallery['id'])}}}",
	        addRemoveLinks : true,
	        paramName: "file",
	        maxFilesize: 5,
	        addRemoveLinks: false,
	        dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
	        dictResponseError: 'Error uploading file!',
	        headers: {
	            'X-CSRF-Token': '{{{Session::token()}}}'
	        },
	    });
	    </script>
	@stop

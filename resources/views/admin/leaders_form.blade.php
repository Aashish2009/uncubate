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
                <a href="{{{URL::route('admin_leaders')}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i>Testimonial</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{{(isset($leader)) ? 'Edit' : 'Add New'}}} Testimonial</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" class="form-horizontal form-label-left" method="post" onsubmit="return {{{(isset($leader)) ? 'true' : 'validateForm();'}}}" 
                    action="{{{URL::route('admin_leaders_submit')}}}" enctype="multipart/form-data">
                      <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="name" placeholder="Name" value="{{{(isset($leader)) ? $leader['name'] : ''}}}"
							data-bv-notempty="true" id="leader_name" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
                      		<div class="form-img">
		               			<img class="img-responsive avatar-view" id="leader_img"
		               			src="{{{URL::asset((isset($leader) && $leader['image_small'] != '') ? $leader['image_small'] : 'images/default-image.jpg')}}}">
		               			<button onclick="openFileBrowse()" type="button" class="btn btn-primary btn-xs img-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{{(isset($leader)) ? 'Edit' : 'Add'}}}</button>
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
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="city" placeholder="City" value="{{{(isset($leader)) ? $leader['city'] : ''}}}"
							data-bv-notempty="true" id="city" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="country" placeholder="Country" value="{{{(isset($leader)) ? $leader['country'] : ''}}}"
							data-bv-notempty="true" id="country" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Company</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="organisation" placeholder="Company" value="{{{(isset($leader)) ? $leader['organisation'] : ''}}}"
							data-bv-notempty="true" id="organisation" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Designation</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="designation" placeholder="Designation" value="{{{(isset($leader)) ? $leader['designation'] : ''}}}"
							data-bv-notempty="true" id="designation" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Company Logo</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
                      		<div class="form-img">
		               			<img class="img-responsive avatar-view" id="logo_img"
		               			src="{{{URL::asset((isset($leader) && $leader['logo_small'] != '') ? $leader['logo_small'] : 'images/default-image.jpg')}}}">
		               			<button onclick="openFileBrowseForLogo()" type="button" class="btn btn-primary btn-xs img-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{{(isset($leader)) ? 'Edit' : 'Add'}}}</button>
		               			<input type="file" id="new_logo_img" name="logo" style="display: none;" onchange="return validateLogoImage()">
		               		</div>
						</div>
		              </div>
		              <div class="form-group has-feedback logo-err-block" style="display: none;">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">&nbsp;</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<small id="errLogo" class="help-block" style="color: #a94442;"></small>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Testimonial</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<textarea class="form-control" name="testimonial" placeholder="Testimonial" data-bv-notempty="true" id="testimonial" rows="5"
                      		data-bv-notempty-message="This field is required and cannot be empty">{{{(isset($leader)) ? $leader['testimonial'] : ''}}}</textarea>
						</div>
		              </div>
		              <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="slug" id="slug" value="{{{(isset($leader)) ? $leader['slug'] : ''}}}" />
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <button type="button" class="btn btn-primary" onclick="location.href = '{{{URL::route('admin_leaders')}}}';">Cancel</button>
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
			function validateForm(){
				if(validateImage() && validateLogoImage()){
					return true;
				}else{
					return false;
				}
			}
			function openFileBrowse(){
				$('#new_img').click();
			}
			function openFileBrowseForLogo(){
				$('#new_logo_img').click();
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
				    	if(fuData.files[0].size > (1024*1024)){
				    		$("#errImage").html("Only allows file size up to 1 mb.");
				        	$(".img-err-block").show();
				        	return false;
					    }else{
					    	var flg = true;
				          	if (fuData.files && fuData.files[0]) {
					        	var reader = new FileReader();
					        	var image  = new Image();
					        	reader.onload = function (e) {
					        		image.src = e.target.result;
					        		image.onload = function() {
						        		if(this.height == this.width){
						        			$(".img-err-block").hide();
						        			$('#leader_img').attr('src', e.target.result);
							        	}else{
							        		$("#errImage").html("Only square image allow.");
								        	$(".img-err-block").show();
								        	flg = false;
								        }
					                }
					        	}
						  		reader.readAsDataURL(fuData.files[0]);
						  	}
						  	return flg;
					    }
			        } else {
			        	$("#errImage").html("Only allows file types PNG, JPG and JPEG.");
			        	$(".img-err-block").show();
			        	return false;
			        }
			    }
			}
			function validateLogoImage() {
				var fuData = document.getElementById('new_logo_img');
			    var FileUploadPath = fuData.value;
				var File = $("#new_logo_img").val();
			    if (File == '') {
			    	$("#errLogo").html("Please upload an image.");
			    	$(".logo-err-block").show();
			    	return false;
			    } else {
			    	document.getElementById("errLogo").innerHTML = "";
			        var Extension = FileUploadPath.substring(
			          FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
			        if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
				    	if(fuData.files[0].size > (1024*1024)){
				    		$("#errLogo").html("Only allows file size up to 1 mb.");
				        	$(".logo-err-block").show();
				        	return false;
					    }else{
					      	$(".logo-err-block").hide();
				          	if (fuData.files && fuData.files[0]) {
					        	var reader = new FileReader();
					        	reader.onload = function (e) {
					            	$('#logo_img').attr('src', e.target.result);
					        	}
						  		reader.readAsDataURL(fuData.files[0]);
						  	}
						  	return true;
					    }
			        } else {
			        	$("#errLogo").html("Only allows file types PNG, JPG and JPEG.");
			        	$(".logo-err-block").show();
			        	return false;
			        }
			    }
			}
		    $(document).ready(function(){
		    	$('#form').bootstrapValidator();
		    });
	    </script>
	@stop

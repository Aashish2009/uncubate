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
                <a href="{{{URL::route('admin_team_member')}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> Team Member</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{{(isset($team_member)) ? 'Edit' : 'Add New'}}} Team Member</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" class="form-horizontal form-label-left" method="post" action="{{{URL::route('admin_team_member_submit')}}}"
                    onsubmit="return checkTeamMember()" enctype="multipart/form-data">
                      <div class="col-md-6">
                      	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">First Name</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="fname" placeholder="First Name" value="{{{(isset($team_member)) ? $team_member['fname'] : ''}}}"
								data-bv-notempty="true" id="team_member_title" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			              </div>
			              <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Last Name</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="lname" placeholder="Last Name" value="{{{(isset($team_member)) ? $team_member['lname'] : ''}}}"
								data-bv-notempty="true" id="team_member_title" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			              </div>
			              <div class="form-group">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Designation</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="role" placeholder="Designation" value="{{{(isset($team_member)) ? $team_member['role'] : ''}}}"
								data-bv-notempty="true" id="team_member_title" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			              </div>
			              <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Email</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="email" placeholder="Email" value="{{{(isset($team_member)) ? $team_member['email'] : ''}}}"
								data-bv-notempty="true" id="team_member_title" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			              </div>
			              <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Mobile</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="mobile" placeholder="Mobile" value="{{{(isset($team_member)) ? $team_member['mobile'] : ''}}}"
								data-bv-notempty="true" id="team_member_title" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			              </div>
			              <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Photo(400px*500px)</label>
	                      	<div class="col-md-4 col-sm-4 col-xs-12">
	                      		<div class="form-img">
			               			<img class="img-responsive avatar-view" id="team_member_img"
			               			src="{{{URL::asset((isset($team_member) && $team_member['image_small'] != '') ? $team_member['image_small'] : 'images/default-image.jpg')}}}">
			               			<button onclick="openFileBrowse()" type="button" class="btn btn-primary btn-xs img-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{{(isset($team_member)) ? 'Edit' : 'Add'}}}</button>
			               			<input type="file" id="new_img" name="image" style="display: none;" onchange="return validateImage()">
			               		</div>
							</div>
			              </div>
			              <div class="form-group has-feedback img-err-block" style="display: none;">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">&nbsp;</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                      		<small id="errImage" class="help-block"></small>
							</div>
			              </div>
			              <div class="form-group">
						    <label class="col-xs-4 control-label">Date of Birth</label>
						    <div class="col-xs-4 dateContainer">
						        <div class="input-group date">
						    	    <input type="text" class="form-control" data-bv-notempty="false" data-bv-notempty-message="This field is required and cannot be empty"
						    	     placeholder="DD-MM-YYYY" name="dob" value="{{{(isset($team_member) && $team_member['dob']) ? date('d-m-Y',strtotime($team_member['dob'])) : ''}}}"
						    	     id="dob" data-bv-date="true" data-bv-date-format="DD-MM-YYYY" data-bv-date-message="The value is not a valid date" />
						            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						  	    </div>
						  	</div>
						  </div>
						  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Blood Group</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="blood_group" placeholder="Blood Group" value="{{{(isset($team_member)) ? $team_member['blood_group'] : ''}}}"
								data-bv-notempty="false" id="team_member_title" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			              </div>
			              <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Emergency Contact</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="emergency_contact" placeholder="Emergency Contact" value="{{{(isset($team_member)) ? $team_member['emergency_contact'] : ''}}}"
								data-bv-notempty="false" id="team_member_title" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			              </div>
			              <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">PAN Number</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="pan_number" placeholder="PAN Number" value="{{{(isset($team_member)) ? $team_member['pan_number'] : ''}}}"
								data-bv-notempty="false" id="team_member_title" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			              </div>
			              <div class="form-group">
						    <label class="col-xs-4 control-label">Joining Date</label>
						    <div class="col-xs-4 dateContainer">
						        <div class="input-group date">
						    	    <input type="text" class="form-control" data-bv-notempty="false" data-bv-notempty-message="This field is required and cannot be empty"
						    	     placeholder="DD-MM-YYYY" name="joining_date" value="{{{(isset($team_member) && $team_member['joining_date']) ? date('d-m-Y',strtotime($team_member['joining_date'])) : ''}}}"
						    	     id="start_dt" data-bv-date="true" data-bv-date-format="DD-MM-YYYY" data-bv-date-message="The value is not a valid date" />
						            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						  	    </div>
						  	</div>
						  </div>
			              <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Technology Known</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="technology_known" placeholder="Technology Known" value="{{{(isset($team_member)) ? $team_member['technology_known'] : ''}}}"
								data-bv-notempty="false" id="technology" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			              </div>
			              <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Resume</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="file" class="form-control" name="resume" data-bv-notempty="false" id="resume" onchange="return validateDocs();"
			               		data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
							<?php 
							if(isset($team_member) && $team_member['resume'] != ''){
							?>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<a href="{{URL::asset($team_member['resume'])}}" download><i class="fa fa-file-text" style="font-size: 28px;margin-top: 3px;" aria-hidden="true"></i></a>
							</div>
							<?php 
							}
							?>
			              </div>
			              <div class="form-group has-feedback doc-err-block" style="display: none;">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">&nbsp;</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                      		<small id="errDocs" style="color: #a94442;" class="help-block"></small>
							</div>
			              </div>
                      </div>
                      <div class="col-md-6">
                      	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Residential Address</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control address-field" name="ra_society" placeholder="Society" value="{{{(isset($team_member)) ? $team_member['ra_society'] : ''}}}"
								data-bv-notempty="false" id="ra_society" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control address-field" name="ra_area" placeholder="Area" value="{{{(isset($team_member)) ? $team_member['ra_area'] : ''}}}"
								data-bv-notempty="false" id="ra_area" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control address-field" name="ra_city" placeholder="City" value="{{{(isset($team_member)) ? $team_member['ra_city'] : ''}}}"
								data-bv-notempty="false" id="ra_city" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control address-field" name="ra_pincode" placeholder="PinCode" value="{{{(isset($team_member)) ? $team_member['ra_pincode'] : ''}}}"
								data-bv-notempty="false" id="ra_pincode" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control address-field" name="ra_state" placeholder="state" value="{{{(isset($team_member)) ? $team_member['ra_state'] : ''}}}"
								data-bv-notempty="false" id="ra_state" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Upload Address Proof</label>
	                      	<div class="col-md-4 col-sm-4 col-xs-12">
	                      		<div class="form-img">
			               			<img class="img-responsive avatar-view" id="address_proof"
			               			src="{{{URL::asset((isset($team_member) && $team_member['address_proof_small'] != '') ? $team_member['address_proof_small'] : 'images/default-image.jpg')}}}">
			               			<button onclick="openFileBrowseForAddProof()" type="button" class="btn btn-primary btn-xs img-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{{(isset($team_member)) ? 'Edit' : 'Add'}}}</button>
			               			<input type="file" id="new_proof" name="address_proof" style="display: none;" onchange="return validateProof()">
			               		</div>
							</div>
			              </div>
			              <div class="form-group has-feedback proof-err-block" style="display: none;">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">&nbsp;</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                      		<small id="errProof" style="color: #a94442;" class="help-block"></small>
							</div>
			              </div>
			          	  <br/><br/>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12">Permanent Address</label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
	                      		<br/>
	                      		<input type="checkbox" id="sameAdd"> <label for="sameAdd"> Same as above
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="pa_society" placeholder="Society" value="{{{(isset($team_member)) ? $team_member['pa_society'] : ''}}}"
								data-bv-notempty="false" id="pa_society" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="pa_area" placeholder="Area" value="{{{(isset($team_member)) ? $team_member['pa_area'] : ''}}}"
								data-bv-notempty="false" id="pa_area" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="pa_city" placeholder="City" value="{{{(isset($team_member)) ? $team_member['pa_city'] : ''}}}"
								data-bv-notempty="false" id="pa_city" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="pa_pincode" placeholder="PinCode" value="{{{(isset($team_member)) ? $team_member['pa_pincode'] : ''}}}"
								data-bv-notempty="false" id="pa_pincode" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
			          	  <div class="form-group has-feedback">
	                      	<label class="control-label col-md-4 col-sm-4 col-xs-12"></label>
	                      	<div class="col-md-6 col-sm-6 col-xs-12">
			               		<input type="text" class="form-control" name="pa_state" placeholder="state" value="{{{(isset($team_member)) ? $team_member['pa_state'] : ''}}}"
								data-bv-notempty="false" id="pa_state" data-bv-notempty-message="This field is required and cannot be empty"/>
							</div>
			          	  </div>
                      </div>
                      <div class="col-md-12">
			              <div class="ln_solid"></div>
	                      <div class="form-group">
	                        <div class="col-md-11 col-sm-11 col-xs-12">
	                        	<div class="pull-right">
		                          <input type="hidden" name="slug" id="slug" value="{{{(isset($team_member)) ? $team_member['slug'] : ''}}}" />
		                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
		                          <button type="button" class="btn btn-primary" onclick="location.href = '{{{URL::route('admin_team_member')}}}';">Cancel</button>
		                          <button type="submit" class="btn btn-success">Submit</button>
		                        </div>
	                        </div>
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
					    	var flg = false;
				          	if (fuData.files && fuData.files[0]) {
					        	var reader = new FileReader();
					        	var image  = new Image();
					        	reader.onload = function (e) {
					        		image.src = e.target.result;
					        		image.onload = function() {
						        		if(this.height == 500 && this.width == 400){
						        			$(".img-err-block").hide();
						        			$('#team_member_img').attr('src', e.target.result);
						        			flg = true;
							        	}else{
							        		$("#errImage").html("Image size should be 400*500.");
								        	$(".img-err-block").show();
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

			function openFileBrowseForAddProof(){
				$('#new_proof').click();
			}
			function validateProof() {
				var fuData = document.getElementById('new_proof');
			    var FileUploadPath = fuData.value;
				var File = $("#new_proof").val();
			    if (File == '') {
			    	$("#errProof").html("Please upload an image.");
			    	$(".proof-err-block").show();
			    	return false;
			    } else {
			    	document.getElementById("errProof").innerHTML = "";
			        var Extension = FileUploadPath.substring(
			          FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
			        if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {
				        console.log(fuData.files[0].size);
				    	if(fuData.files[0].size > (1024*1024)){
				    		$("#errProof").html("Only allows file size up to 1 mb.");
				        	$(".proof-err-block").show();
				        	return false;
					    }else{
					      	$(".proof-err-block").hide();
				          	if (fuData.files && fuData.files[0]) {
					        	var reader = new FileReader();
					        	reader.onload = function (e) {
					            	$('#address_proof').attr('src', e.target.result);
					        	}
						  		reader.readAsDataURL(fuData.files[0]);
						  	}
						  	return true;
					    }
			        } else {
			        	$("#errProof").html("Only allows file types PNG, JPG and JPEG.");
			        	$(".proof-err-block").show();
			        	return false;
			        }
			    }
			}

			function validateDocs() {
				var fuData = document.getElementById('resume');
			    var FileUploadPath = fuData.value;
				var File = $("#resume").val();
		        var Extension = FileUploadPath.substring(
		        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
		        if (Extension == "doc" || Extension == "docx") {
			    	if(fuData.files[0].size > (1024*1024)){
			    		$("#errDocs").html("Only allows file size up to 1 mb.");
			        	$(".doc-err-block").show();
			        	return false;
				    }else{
				      	$(".doc-err-block").hide();
					  	return true;
				    }
		        } else {
		        	$("#errDocs").html("Only allows file types doc or docx.");
		        	$(".doc-err-block").show();
		        	return false;
		        }
			}
			
		    $(document).ready(function(){
		    	$('#form').bootstrapValidator();
		    	autosize($('.resizable_textarea'));
		    	$('#team_member_publish_date').daterangepicker({
		    		minDate: moment(),
		            singleDatePicker: true,
		            calender_style: "picker_2",
		            showDropdowns: true,
		            format: 'DD-MM-YYYY h:mm a',
		            timePicker: true,
		            timePickerIncrement: 30,
		        });
		    	$('#technology').tagsInput({
		            width: 'auto',
		          });
		    });
	    </script>
	    <script>
      $(document).ready(function() {
        if($("#pa_society").val() == $("#ra_society").val() && $("#ra_society").val() != '' &&
        		$("#pa_area").val() == $("#ra_area").val() && $("#ra_area").val() != '' &&
        		$("#pa_city").val() == $("#ra_city").val() && $("#ra_city").val() != '' &&
        		$("#pa_pincode").val() == $("#ra_pincode").val() && $("#ra_pincode").val() != '' &&
        		$("#pa_state").val() == $("#ra_state").val() && $("#ra_state").val() != ''){
        	$("#sameAdd").click();
        	setAddVal();
    	}
		$("#sameAdd").change(function(){
			setAddVal();
		});

		$(".address-field").keyup(function(){
			setAddVal();
		});

		function setAddVal(){
			if($("#sameAdd").is(':checked')){
				$("#pa_society").val($("#ra_society").val()).prop('disabled', true);
				$("#pa_area").val($("#ra_area").val()).prop('disabled', true);
				$("#pa_city").val($("#ra_city").val()).prop('disabled', true);
				$("#pa_pincode").val($("#ra_pincode").val()).prop('disabled', true);
				$("#pa_state").val($("#ra_state").val()).prop('disabled', true);
			}else{
				$("#pa_society").val('').prop('disabled', false);
				$("#pa_area").val('').prop('disabled', false);
				$("#pa_city").val('').prop('disabled', false);
				$("#pa_pincode").val('').prop('disabled', false);
				$("#pa_state").val('').prop('disabled', false);
			}
		}
          
        function initToolbarBootstrapBindings() {
          var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
              'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
              'Times New Roman', 'Verdana'
            ],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
          $.each(fonts, function(idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
          });
          $('a[title]').tooltip({
            container: 'body'
          });
          $('.dropdown-menu input').click(function() {
              return false;
            })
            .change(function() {
              $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
            })
            .keydown('esc', function() {
              this.value = '';
              $(this).change();
            });

          $('[data-role=magic-overlay]').each(function() {
            var overlay = $(this),
              target = $(overlay.data('target'));
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
          });

          if ("onwebkitspeechchange" in document.createElement("input")) {
            var editorOffset = $('#editor').offset();

            $('.voiceBtn').css('position', 'absolute').offset({
              top: editorOffset.top,
              left: editorOffset.left + $('#editor').innerWidth() - 35
            });
          } else {
            $('.voiceBtn').hide();
          }
        }

        function showErrorAlert(reason, detail) {
          var msg = '';
          if (reason === 'unsupported-file-type') {
            msg = "Unsupported format " + detail;
          } else {
            console.log("error uploading file", reason, detail);
          }
          $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
          fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();

        $('#start_dt').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_2",
            showDropdowns: true,
            format: 'DD-MM-YYYY',
        });
        
        $('#dob').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_2",
            showDropdowns: true,
            format: 'DD-MM-YYYY',
        });
      });

      function checkTeamMember(){
    	  {{{(isset($team_member)) ? '' : 'validateImage()'}}}
    	  /* {{{(isset($team_member)) ? '' : 'validateProof()'}}}
    	  {{{(isset($team_member)) ? '' : 'validateDocs()'}}} */
          if($('#editor').html() != ''){
        	  $(".team_member-err-block").hide();
    	  	  $('#descr').val($('#editor').html());
    	  	  $('.btn-success').prop('disabled', false);
    	  	  return true;
      	  }else{
        	  $("#errTeamMember").html("This field is required and cannot be empty.");
	          $(".team_member-err-block").show();
	          $('.btn-success').prop('disabled', true);
	          return false;
          }
      }
    </script>
	@stop

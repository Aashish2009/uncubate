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
	<?php if(isset($booking)){
			$explode = explode('-',$booking['workhour']);
			$start = $explode[0];
			$end = $explode[1];
		  }
	?>
    	<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <a href="{{{URL::route('admin_bookings')}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> Bookings</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{{(isset($booking)) ? 'Edit' : 'Add New'}}} Booking</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" class="form-horizontal form-label-left" method="post" 
                    action="{{{URL::route('admin_bookings_submit')}}}" enctype="multipart/form-data">
                      <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="name" placeholder="Name" value="{{{(isset($booking)) ? $booking['name'] : ''}}}"
							data-bv-notempty="true" id="booking_name" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="email" class="form-control" name="email" placeholder="Email" value="{{{(isset($booking)) ? $booking['email'] : ''}}}"
							data-bv-notempty="true" id="city" data-bv-notempty-message="This field is required and cannot be empty" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="mobile" placeholder="Mobile" value="{{{(isset($booking)) ? $booking['mobile'] : ''}}}"
							data-bv-notempty="true" id="country" data-bv-notempty-message="This field is required and cannot be empty" maxlength="10" data-bv-digits=true data-bv-digits-message="Only numbers are allowed"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Company</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="company" placeholder="Company" value="{{{(isset($booking)) ? $booking['company'] : ''}}}"
							data-bv-notempty="true" id="company" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Business Type</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="business" placeholder="Business Type" value="{{{(isset($booking)) ? $booking['business'] : ''}}}"
							data-bv-notempty="true" id="business" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Space for(Months)</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="months" placeholder="Months" value="{{{(isset($booking)) ? $booking['months'] : ''}}}"
							data-bv-notempty="true" id="months" data-bv-notempty-message="This field is required and cannot be empty " maxlength="2" data-bv-digits=true data-bv-digits-message="Please enter numbers only"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Seats</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="seats" placeholder="Seats" value="{{{(isset($booking)) ? $booking['seats'] : ''}}}"
							data-bv-notempty="true" id="seats" data-bv-notempty-message="This field is required and cannot be empty" maxlength="3" data-bv-digits=true data-bv-digits-message="Please enter numbers only"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Move in date</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
		               		<input type="text" class="form-control" name="moveindate" placeholder="dd-mm-yyyy" value="{{{(isset($booking)) ? $booking['moveindate'] : ''}}}"
							data-bv-notempty="true" id="moveindate" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Work hours</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
				           <div class="col-md-6" style="padding:initial;">
		                    <div class="form-group">
		                      <input type="text" value="{{{(isset($booking)) ? $start : ''}}}" class="form-control" pattern="\d{1,2}:\d{1,2} (AM|PM)" style="margin-bottom: 0px;" id="workhour1" name="workhour1" placeholder="FROM" required data-error="Please enter valid work hours">
		                      <div class="help-block with-errors"></div>
		                    </div>                                 
		                  </div>
		                  <div class="col-md-6">
		                    <div class="form-group">
		                      <input type="text"  class="form-control" id="workhour2" value="{{{(isset($booking)) ? $end : ''}}}" pattern="\d{1,2}:\d{1,2} (AM|PM)" name="workhour2" placeholder="TO" required data-error="Please enter valid work hours">
		                      <div class="help-block with-errors"></div>
		                      <input type="hidden"  name="workhour" id="workhourval" value="{{{(isset($booking)) ? $booking['workhour'] : ''}}}" >
		                    </div>                                 
		                  </div>
						</div>
		              </div>
		              <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Need consulting</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="radio">
                            <label class="">
                              <div class="iradio_flat-green" style="position: relative;"><input type="radio"class="flat" name="consulting" value="Yes" 
                              style="position: absolute; opacity: 0;" {{{(isset($booking) && $booking['consulting'] == 'Yes') ? 'checked' : ''}}}
                              {{{(!isset($booking)) ? 'checked' : ''}}}>
                              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
                              height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Yes
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" name="consulting" 
                              value="No" {{{(isset($booking) && $booking['consulting'] == 'No') ? 'checked' : ''}}}
                              style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
                              height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> No
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" name="consulting" 
                              value="Not Sure" {{{(isset($booking) && $booking['consulting'] == 'Not Sure') ? 'checked' : ''}}}
                              style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
                              height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Not Sure
                            </label>
                          </div>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Location</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="radio">
                            <label class="">
                              <div class="iradio_flat-green" style="position: relative;"><input type="radio"class="flat" name="location" value="Vijay Char Rasta" 
                              style="position: absolute; opacity: 0;" {{{(isset($booking) && $booking['location'] == 'Vijay Char Rasta') ? 'checked' : ''}}}
                              {{{(!isset($booking)) ? 'checked' : ''}}}>
                              <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
                              height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Vijay Char Rasta
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" name="location" 
                              value="Pakwan Char Rasta" {{{(isset($booking) && $booking['location'] == 'Pakwan Char Rasta') ? 'checked' : ''}}}
                              style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; 
                              height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Pakwan Char Rasta
                            </label>
                          </div>
                        </div>
                      </div>                      
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12">Other Description</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<textarea class="form-control" name="description" placeholder="Description" 
                      		id="description" rows="5">{{{(isset($booking)) ? $booking['description'] : ''}}}</textarea>
						</div>
		              </div>
		              <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="slug" id="slug" value="{{{(isset($booking)) ? $booking['slug'] : ''}}}" />
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <a href="{{{URL::route('admin_bookings')}}}"><button type="button" class="btn btn-primary">Cancel</button></a>
                          <button type="submit" class="btn btn-success" onclick="workhourdata();">Submit</button>
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
	  	function workhourdata(){
	        var value = $('#workhour1').val()+' - '+$('#workhour2').val();
	       $('#workhourval').val(value);
	    }
		    $(document).ready(function(){
		    	$('#workhour1').timepicker({
		    		defaultTime:false,
		    		icons:{
		    		    up: 'fa fa-chevron-up',
		    		    down: 'fa fa-chevron-down'
		    		}
		    		
		    		}).on('show.timepicker', function(e) {
		    			var d = new Date();
		    			var hours =d.getHours();
		        		var mid = "AM";
		        		if (hours > 12) {
		        		    hours -= 12;
		        		    mid = "PM"
		        		} else if (hours === 0) {
		        		   hours = 12;
		        		   mid = "AM"
		        		}
						$(".bootstrap-timepicker-hour").val(hours);
						$(".bootstrap-timepicker-minute").val(d.getMinutes());
						$(".bootstrap-timepicker-meridian").val('PM');
		    		  });
		    	$('#workhour2').timepicker({
		    		icons:{
		    		    up: 'fa fa-chevron-up',
		    		    down: 'fa fa-chevron-down'
		    		},
		        	defaultTime:false }).on('show.timepicker', function(e) {
		        		var d = new Date();
		        		var hours =d.getHours();
		        		var mid = "AM";
		        		if (hours > 12) {
		        		    hours -= 12;
		        		    mid = "PM"
		        		} else if (hours === 0) {
		        		   hours = 12;
		        		   mid = "AM"
		        		}
						$(".bootstrap-timepicker-hour").val(hours);
						$(".bootstrap-timepicker-minute").val(d.getMinutes());
						$(".bootstrap-timepicker-meridian").val('PM');
					  });
			    $("#moveindate").keydown(function() {
		    		  //code to not allow any changes to be made to input field
		    		  return false;
		    		});
		    	$('#form').bootstrapValidator();
		    	$('#moveindate').daterangepicker({
		    		singleDatePicker: true,
		            calender_style: "picker_2",
		            showDropdowns: true,
		            format: 'DD-MM-YYYY',
		        });
		    });
	    </script>
	@stop

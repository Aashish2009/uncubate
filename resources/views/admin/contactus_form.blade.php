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
                <a href="{{{URL::route('admin_messages')}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> Inquiry</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-8 col-xs-8">
                <div class="x_panel">
                	<div class="x_title">
                    	<h2>Edit Inquiry</h2>
                    	<div class="clearfix"></div>
                    </div>
                  	<div class="x_content"> <br/>
                    	<form id="form" class="form-horizontal form-label-left" method="post" action="{{{URL::route('admin_messages_update')}}}" enctype="multipart/form-data">
                    		<div class="row">
                  				<div class="col-md-6">
                    				<div class="form-group">
                    					<label class="">Name:</label>
                      					<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="{{$contactus['name']}}" required data-error="Please enter your name">
                      					<div class="help-block with-errors"></div>
                    				</div>                                 
                  				</div>
                  				<div class="col-md-6">
                    				<div class="form-group">
                    					<label class="">Email:</label>
                      					<input type="email" placeholder="Your Email" id="email" class="form-control" value="{{$contactus['email']}}" name="email" required data-error="Please enter your email">
                      					<div class="help-block with-errors"></div>
                    				</div> 
                  				</div>
			                  	<div class="col-md-6">
			                    	<div class="form-group">
			                    		<label class="">Mobile:</label>
			                      		<input type="text" pattern="[0-9]{10}" class="form-control" id="mobile" value="{{$contactus['mobile']}}" name="mobile" placeholder="Mobile" required data-error="Please enter valid mobile number">
			                      		<div class="help-block with-errors"></div>
			                    	</div>                                 
			                  	</div>
				                <div class="col-md-6">
				                	<div class="form-group">
				                		<label class="">Company name:</label>
				                    	<input type="text" placeholder="Company Name" id="company" class="form-control" value="{{$contactus['company']}}" name="company" required data-error="Please enter your company name">
				                        <div class="help-block with-errors"></div>
				                    </div> 
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                    	<label class="">Business:</label>
				                    	<input type="text" class="form-control" id="business" name="business" value="{{$contactus['business']}}" placeholder="Type of Business / Profession" required data-error="Please enter your business type">
				                      	<div class="help-block with-errors"></div>
				                    </div>                                 
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                    	<label class="">Months required:</label>
				                      	<input type="number" class="form-control" id="months" name="months" min="0"  value="{{$contactus['months']}}" placeholder="How long you need the space for? (In Months)" required data-error="Please mention for how long you need the space">
				                      	<div class="help-block with-errors"></div>
				                    </div>                                 
				                </div>
				                <div class="col-md-3">
				                    <div class="form-group">
				                    	<label class="">Seats required:</label>
				                      	<input type="number" class="form-control" id="seats" name="seats"  min="0"  value="{{$contactus['seats']}}" placeholder="No. of seats?" required data-error="Please enter no of seats required">
				                      	<div class="help-block with-errors"></div>
				                    </div>                                 
				                </div>
				                <div class="col-md-3">
				                    <div class="form-group">
				                    	<label class="">Move in date?</label>
				                      	<input type="text" pattern="\d{1,2}-\d{1,2}-\d{4}" class="form-control" value="{{$contactus['moveindate']}}" id="moveindate" name="moveindate" placeholder="Move in date?" required data-error="Please enter valid date">
				                      	<div class="help-block with-errors"></div>
				                    </div>                                 
				                </div>
				                <div class="col-md-3">
				                    <div class="form-group">
				                    	<label class=""> Work hours?</label>
				                      	<input type="text"  class="form-control"  pattern="\d{1,2}:\d{1,2} (AM|PM) - \d{1,2}:\d{1,2} (AM|PM)"style="margin-bottom: 0px;" value="{{$contactus['workhour']}}" id="workhour1" name="workhour1" placeholder="Working hours" required data-error="Please enter valid work hours">
				                      	<div class="help-block with-errors"></div>
				                    </div>                                 
				                </div>
				                <div class="col-md-3">
				                    <div class="form-group">
	                      				<label>Status</label>
	                      				<select class="form-control" name="status" id="status">
	                      					<option value="Open" {{($contactus['status'] == 'Open') ? 'selected' : ''}}>Open</option>
	                      					<option value="Open_Viewed" {{($contactus['status'] == 'Open_Viewed') ? 'selected' : ''}}>Open_Viewed</option>
	                      					<option value="On Hold" {{($contactus['status'] == 'On Hold') ? 'selected' : ''}}>On Hold</option>
	                      					<option value="Dont Want" {{($contactus['status'] == 'Dont Want') ? 'selected' : ''}}>Dont Want</option>
	                      					<option value="Uncubated" {{($contactus['status'] == 'Uncubated') ? 'selected' : ''}}>Uncubated</option>
	                      				</select>
				                      	<div class="help-block with-errors"></div>
				                    </div>                                 
				                </div>
				                <!-- <div class="col-md-3">
				                    <div class="form-group">
				                    	<label class="">Work hours?</label>
				                      	<input type="text"  class="form-control" id="workhour2" pattern="\d{1,2}:\d{1,2} (AM|PM)" name="workhour2" value="{{$contactus['workhour']}}" placeholder="Ending Hour*" required data-error="Please enter valid work hours">
				                      	<div class="help-block with-errors"></div>
				                      	<input type="hidden"  name="workhour" id="workhourval">
				                    </div>                                 
				                </div> -->
				                <div class="col-md-6">
				                  	<div class="form-group">
									  	<label>Do you need mentoring or consulting for your business?</label>
									  	<div class="radio">
									    	<label><input type="radio" name="consulting" id="consulting" value="Yes" {{{ $contactus['consulting'] == 'Yes' ? 'checked="checked"' : ''}}} style="margin-right: 7px;"> Yes</label><br/>
									    	<label><input type="radio" name="consulting" id="consulting" value="No" {{{ $contactus['consulting'] == 'No' ? 'checked="checked"' : ''}}} style="margin-right: 7px;"> No</label><br/>
									    	<label><input type="radio" name="consulting" id="consulting" value="Not Sure" {{{ $contactus['consulting'] == 'Not Sure' ? 'checked="checked"' : ''}}} style="margin-right: 7px;"> Not Sure</label>
									  	</div>
									</div>
				                </div>
				                <div class="col-md-6">
				                  	<div class="form-group">
									  	<label>Location</label>
									  	<div class="radio">
									    	<label><input type="radio" name="location" id="location" value="Vijay Char Rasta" {{{ $contactus['location'] == 'Vijay Char Rasta' ? 'checked="checked"' : ''}}} style="margin-right: 7px;"> Vijay Char Rasta</label><br/>
									    	<label><input type="radio" name="location" id="location" value="Pakwan Char Rasta" {{{ $contactus['location'] == 'Pakwan Char Rasta' ? 'checked="checked"' : ''}}} style="margin-right: 7px;"> Pakwan Char Rasta</label><br/>
									  	</div>
									</div>
				                </div>
                  				<div class="col-md-12">
                    				<div class="form-group"> 
                    					<label>Comments: </label>
                    					<input type="hidden" name="message" id="message" value="{{$contactus['message']}}" />
                      					<textarea class="form-control" placeholder="Any other comments" id="comments" name="comments" value="{{$contactus['comments']}}" rows="2">{{$contactus['comments']}}</textarea>
                      					<div class="help-block with-errors"></div>
                    				</div>	
                    				<!-- <div class="submit-button text-center">
                      					<button class="btn btn-common" id="submit" type="submit">Update Inquiry</button>
                      					<div id="msgSubmit" class="h3 text-center hidden"></div> 
                      					<input type="hidden" name="slug" id="slug" value="{{$contactus['slug']}}" />
                      					<div class="clearfix"></div> 
                    				</div> -->
                    				<div class="ln_solid"></div>
                    				<div class="form-group">
                        				<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
                          					<input type="hidden" name="slug" id="slug" value="{{$contactus['slug']}}" />
                          					<a href="{{{URL::route('admin_messages')}}}"><button type="button" class="btn btn-primary">Cancel</button></a>
                          					<button type="submit" class="btn btn-success">Submit</button>
                       					</div>
                      				</div>
                  				</div>
                			</div>            
                    	</form>
                    </div> <!-- x-content -->
                </div> <!-- x-panel -->
              </div> <!-- col -->
            </div> <!-- row -->
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
		    // function workhourdata(){
      //   		var value = $('#workhour1').val()+' - '+$('#workhour2').val();
      //  			$('#workhourval').val(value);
    		// }
		    $(document).ready(function(){
		    	$('#moveindate').daterangepicker({
		        	minDate: moment(),
		            singleDatePicker: true,
		            calender_style: "picker_2",
		            showDropdowns: true,
		            drops: 'up',
		            format: 'DD-MM-YYYY',
		        },function(start, end, label) {
		        	$('#moveindate').blur();
		        	$('#moveindate').focus();
		        });
		    // 	$("#workhour").focus(function(){
		 			// $(".calendar").hide();
		    //     });

		    	$("#moveindate").focus(function(){
		    		$(".daterangepicker").find(".first").show();
		        });

		    	$('#workhour').on('apply.daterangepicker', function(ev, picker) {
		    		$('#workhour').blur();
		    	});
		    // 	$('#workhour').daterangepicker({
		    //         calender_style: "picker_2",
		    //         showDropdowns: true,
		    //         format: 'hh:mm a',
		    //     });
		    // 	$('#workhour1').timepicker({
		    // 		defaultTime:false,
		    // 		icons:{
		    // 		    up: 'fa fa-chevron-up',
		    // 		    down: 'fa fa-chevron-down'
		    // 		}
		    // 		}).on('show.timepicker', function(e) {
		    // 			var d = new Date();
		    // 			var hours =d.getHours();
		    //     		var mid = "AM";
		    //     		if (hours > 12) {
		    //     		    hours -= 12;
		    //     		    mid = "PM"
		    //     		} else if (hours === 0) {
		    //     		   hours = 12;
		    //     		   mid = "AM"
		    //     		}
						// $(".bootstrap-timepicker-hour").val(hours);
						// $(".bootstrap-timepicker-minute").val(d.getMinutes());
						// $(".bootstrap-timepicker-meridian").val('PM');
		    // 		  });
		    // 	$('#workhour2').timepicker({
		    // 		icons:{
		    // 		    up: 'fa fa-chevron-up',
		    // 		    down: 'fa fa-chevron-down'
		    // 		},
		    //     	defaultTime:false }).on('show.timepicker', function(e) {
		    //     		var d = new Date();
		    //     		var hours =d.getHours();
		    //     		var mid = "AM";
		    //     		if (hours > 12) {
		    //     		    hours -= 12;
		    //     		    mid = "PM"
		    //     		} else if (hours === 0) {
		    //     		   hours = 12;
		    //     		   mid = "AM"
		    //     		}
						// $(".bootstrap-timepicker-hour").val(hours);
						// $(".bootstrap-timepicker-minute").val(d.getMinutes());
						// $(".bootstrap-timepicker-meridian").val('PM');
					 //  });
		    	$('#moveindate').keydown(function() {
		    		  //code to not allow any changes to be made to input field
		    		  return false;
		    		});
		    });
		</script>
		@stop
	
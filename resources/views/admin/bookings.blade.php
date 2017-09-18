@extends('admin.include.layout')
	@section('head')
		@include('admin.include.head')
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bookings</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                      	<button type="button" onclick="location.href = '{{{URL::route('admin_bookings_add')}}}';" class="btn btn-default">ADD NEW</button>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Created Date</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Company</th>
                          <th>Business Type</th>
                          <th>Space for(Month)</th>
                          <th>Seats</th>
                          <th>Movein date</th>
                          <th>Work hour</th>
                          <th>Need consulting</th>
                          <th>Location</th>
                          <th>Description</th>
                          <th class="all" width="20px">&nbsp;</th>
                        </tr>
                      </thead>
                    </table>
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
		@include('admin.include.footjs')
	@stop
	
	@section('footscript')
		<script>
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': '{{{Session::token()}}}'
		        }
		    });
			$(document).ready(function() {
		        $('#datatable').DataTable({
		        	fixedHeader: true,
		        	processing: true,
		            serverSide: true,
		            ajax: {
						url: '{!! route("admin_bookings_data") !!}',
						type: "POST"
			        },
		            columns: [
						{ data: 'created_at', name: 'created_at', type: 'date' },
						{ data: 'name', name: 'name' },
		                { data: 'email', name: 'email' },
		                { data: 'mobile', name: 'mobile' },
		                { data: 'company', name: 'company' },
		                { data: 'business', name: 'business' },
		                { data: 'months', name: 'months' },
		                { data: 'seats', name: 'seats' },
		                { data: 'moveindate', name: 'created_at', type: 'date' },
		                { data: 'workhour', name: 'workhour' },
		                { data: 'consulting', name: 'consulting' },
		                { data: 'location', name: 'location' },
		                { data: 'description', name: 'description' },
		                { data: 'operation', name: 'edit', "orderable": false, "searchable": false, "sClass": 'tb-operation'},
		            ],
		            "order": [[ 0, "desc" ]]
			    });
		    });
	    </script>
	@stop

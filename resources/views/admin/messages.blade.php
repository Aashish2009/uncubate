@extends('admin.include.layout')
	@section('head')
		<style>
			tfoot {
	   			display: table-header-group;
			}
			thead {
				display: table-row-group;
			}
		</style>
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
                  		<h2>Inquiries</h2>
                    	<div class="clearfix"></div>
                    </div>  
                <div class="x_content">
                    <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> <br>
                    	<thead>
	                        <tr>
	                          <th>Created Date</th>
	                          <th>Name</th>
	                          <th>Email Address</th>
	                          <th>Mobile Number</th>
	                          <th>Status</th>
	                          <th>Company Name</th>
	                          <th>Business Type</th>
	                          <th>Space for (Months)</th>
	                          <th>Seats</th>
	                          <th>Move In date</th>
	                          <th>Work Hours</th>
	                          <th>Need consulting</th>
	                          <th>Location</th>
	                          <th>Message</th>
	                          <th>Comments</th>
	                          <th class="all" width="20px">&nbsp;</th>
	                        </tr>
                        </thead>
                        <tfoot>
	                        <tr>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>Status</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                          <th>&nbsp;</th>
	                        </tr>
                        </tfoot>
                    </table>
                    </div>
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
		        var table = $('#datatable').DataTable({

		        	initComplete: function () {
		    			this.api().columns([4]).every( function () {
	                    	var column = this;                 
	                     	var select = $('<select><option value="All">All</option></select>')
	                         .appendTo( $(column.footer()).empty() )
	                         .on( 'change', function () {
	                             var val = $.fn.dataTable.util.escapeRegex(
	                                 $(this).val()
	                            );
	                            column
	                                 .search( val ? '^'+val+'$' : '', true, false )
	                                 .draw();
	                         } );
	                         select.append( '<option value="Open">Open</option><option value="Open_Viewed">Open_Viewed</option><option value="On Hold">On Hold</option><option value="Dont Want">Dont Want</option><option value="Uncubated">Uncubated</option>')
	                 	} );
	                }, 	
	                responsive: true,	        	
		        	processing: true,
		            serverSide: true,
		            ajax: {
						url: '{!! route("admin_messages_data") !!}',
						type: "POST"
			        },
		            columns: [
						{ data: 'created_at', name: 'created_at', type: 'date' },
						{ data: 'name', name: 'name' },
		                { data: 'email', name: 'email' },
		                { data: 'mobile', name: 'mobile' },
		                { data: 'status', name: 'status'},
		                { data: 'company', name: 'company' },
		                { data: 'business', name: 'business' },
		                { data: 'months', name: 'months' },
		                { data: 'seats', name: 'seats' },
		                { data: 'moveindate', name: 'created_at', type: 'date' },
		                { data: 'workhour', name: 'workhour' },
		                { data: 'consulting', name: 'consulting' },
		                { data: 'location', name: 'location' },
		                { data: 'message', name: 'message' },
		                { data: 'comments', name: 'comments' },
		                { data: 'operation', name: 'operation', "orderable": false, "searchable": false, "sClass": 'tb-operation'},
		            ],
		            "order": [[ 0, "desc" ]]    	
			    });
			    $( $.fn.dataTable.tables(true) ).DataTable().responsive.recalc();
			    
		    });
	    </script>
	@stop

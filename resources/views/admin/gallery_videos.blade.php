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
          	<div class="page-title">
              <div class="title_left">
                <a href="{{{URL::route('admin_gallery')}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> Gallery</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_name">
                    <h2>{{{$gallery['gallery_name']}}} Videos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                      	<button type="button" onclick="location.href = '{{{URL::route('admin_gallery_videos_add', $gallery_slug)}}}';" class="btn btn-default">ADD NEW</button>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="13%">Created Date</th>
                          <th>Video</th>
                          <th>Title</th>
                          <th width="75%">Description</th>
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
						url: '{!! route("admin_gallery_videos_data", $gallery_slug) !!}',
						type: "POST"
			        },
		            columns: [
						{ data: 'created_at', name: 'created_at', type: 'date' },
						{ data: 'gallery_video_url', name: 'gallery_video_url', "orderable": false, "searchable": false, "sClass": 'tb-operation' },
		                { data: 'gallery_video_title', name: 'gallery_video_title' },
		                { data: 'gallery_video_desc', name: 'gallery_video_desc' },
		                { data: 'operation', name: 'edit', "orderable": false, "searchable": false, "sClass": 'tb-operation'},
		            ],
		            "order": [[ 0, "desc" ]]
			    });
		    });
	    </script>
	@stop

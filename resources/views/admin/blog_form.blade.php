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
                <a href="{{{URL::route('admin_blog')}}}"><h4><i class="fa fa-arrow-left" aria-hidden="true"></i> Blog</h4></a>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            </div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{{(isset($blog)) ? 'Edit' : 'Add New'}}} Blog</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" class="form-horizontal form-label-left" method="post" action="{{{URL::route('admin_blog_submit')}}}"
                    onsubmit="return checkBlog()" enctype="multipart/form-data">
                      <div class="form-group has-feedback">
                      	<label class="control-label col-md-1 col-sm-1 col-xs-12">Title</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
		               		<input type="text" class="form-control" name="blog_title" placeholder="Title" value="{{{(isset($blog)) ? $blog['blog_title'] : ''}}}"
							data-bv-notempty="true" id="blog_title" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-1 col-sm-1 col-xs-12">Cover Image</label>
                      	<div class="col-md-2 col-sm-2 col-xs-12">
                      		<div class="form-img">
		               			<img class="img-responsive avatar-view" id="blog_img"
		               			src="{{{URL::asset((isset($blog) && $blog['image_small'] != '') ? $blog['image_small'] : 'images/default-image.jpg')}}}">
		               			<button onclick="openFileBrowse()" type="button" class="btn btn-primary btn-xs img-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{{(isset($blog_image)) ? 'Edit' : 'Add'}}}</button>
		               			<input type="file" id="new_img" name="image" style="display: none;" onchange="return validateImage()">
		               		</div>
						</div>
		              </div>
		              <div class="form-group has-feedback img-err-block" style="display: none;">
                      	<label class="control-label col-md-1 col-sm-1 col-xs-12">&nbsp;</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<small id="errImage" class="help-block"></small>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-1 col-sm-1 col-xs-12">Medium Link</label>
                      	<div class="col-md-6 col-sm-6 col-xs-12">
		               		<input type="text" class="form-control" name="medium_link" placeholder="Medium Link" value="{{{(isset($blog)) ? $blog['medium_link'] : ''}}}"
							data-bv-notempty="true" id="medium_link" data-bv-notempty-message="This field is required and cannot be empty"/>
						</div>
		              </div>
		              <div class="form-group has-feedback">
                      	<label class="control-label col-md-1 col-sm-1 col-xs-12">Description</label>
                      	<div class="col-md-10 col-sm-10 col-xs-12">
                      	  <div id="alerts"></div>
		                  <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
		                    <div class="btn-group">
		                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
		                      <ul class="dropdown-menu">
		                      </ul>
		                    </div>
		                    <div class="btn-group">
		                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
		                      <ul class="dropdown-menu">
		                        <li>
		                          <a data-edit="fontSize 5">
		                            <p style="font-size:17px">Huge</p>
		                          </a>
		                        </li>
		                        <li>
		                          <a data-edit="fontSize 3">
		                            <p style="font-size:14px">Normal</p>
		                          </a>
		                        </li>
		                        <li>
		                          <a data-edit="fontSize 1">
		                            <p style="font-size:11px">Small</p>
		                          </a>
		                        </li>
		                      </ul>
		                    </div>
		                    <div class="btn-group">
		                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
		                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
		                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
		                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
		                    </div>
		                    <div class="btn-group">
		                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
		                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
		                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
		                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
		                    </div>
		                    <div class="btn-group">
		                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
		                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
		                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
		                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
		                    </div>
		                    <div class="btn-group">
		                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
		                      <div class="dropdown-menu input-append">
		                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
		                        <button class="btn" type="button">Add</button>
		                      </div>
		                      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
		                    </div>
		                    <div class="btn-group">
		                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
		                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
		                    </div>
		                    <div class="btn-group">
		                      <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
		                      <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
		                    </div>
		                  </div>
		                  <div id="editor" onchange="return checkBlog()" class="editor-wrapper"><?= (isset($blog)) ? $blog['blog_desc'] : '' ?></div>
		                  <textarea name="descr" id="descr"  data-bv-notempty="true" style="display:none;"></textarea>
						</div>
		              </div>
		              <div class="form-group has-feedback blog-err-block" style="display: none;">
                      	<label class="control-label col-md-1 col-sm-1 col-xs-12">&nbsp;</label>
                      	<div class="col-md-9 col-sm-9 col-xs-12">
                      		<small id="errBlog" class="help-block"></small>
						</div>
		              </div>
		              <div class="form-group">
					    <label class="col-md-1 col-sm-1 control-label">Publish Date</label>
					    <div class="col-md-4 col-sm-4 col-xs-12 dateContainer">
					        <div class="input-group date">
					    	    <input type="text" class="form-control" data-bv-notempty="true" data-bv-notempty-message="This field is required and cannot be empty"
					    	     placeholder="DD-MM-YYYY h:mm aa" name="blog_publish_date" value="{{{(isset($blog)) ? date('d-m-Y h:i a',strtotime($blog['blog_publish_date'])) : ''}}}"
					    	     id="blog_publish_date" data-bv-date="true" data-bv-date-format="DD-MM-YYYY h:m A" data-bv-date-message="The value is not a valid date" />
					            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					  	    </div>
					  	</div>
					  </div>
					  <div class="form-group">
                      	<label class="control-label col-md-1 col-sm-1 col-xs-12">Status</label>
                      	<div class="col-xs-4">
                      		<select class="form-control" name="blog_status" placeholder="Description" id="blog_status">
                      			<option value="active" {{{(isset($blog) && $blog['blog_status'] == 'active') ? 'selected' : ''}}}>Active</option>
                      			<option value="deactive" {{{(isset($blog) && $blog['blog_status'] == 'deactive') ? 'selected' : ''}}}>Deactive</option>
                      		</select>
						</div>
		              </div>
		              <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
                          <input type="hidden" name="slug" id="slug" value="{{{(isset($blog)) ? $blog['slug'] : ''}}}" />
                          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <button type="button" class="btn btn-primary" onclick="location.href = '{{{URL::route('admin_blog')}}}';">Cancel</button>
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
					            	$('#blog_img').attr('src', e.target.result);
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
		    	autosize($('.resizable_textarea'));
		    	$('#blog_publish_date').daterangepicker({
		    		minDate: moment(),
		            singleDatePicker: true,
		            calender_style: "picker_2",
		            showDropdowns: true,
		            format: 'DD-MM-YYYY h:mm a',
		            timePicker: true,
		            timePickerIncrement: 30,
		        });
		    });
	    </script>
	    <script>
      $(document).ready(function() {
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
      });

      function checkBlog(){
    	  {{{(isset($blog)) ? '' : 'validateImage()'}}}
          if($('#editor').html() != ''){
        	  $(".blog-err-block").hide();
    	  	  $('#descr').val($('#editor').html());
    	  	  $('.btn-success').prop('disabled', false);
    	  	  return true;
      	  }else{
        	  $("#errBlog").html("This field is required and cannot be empty.");
	          $(".blog-err-block").show();
	          $('.btn-success').prop('disabled', true);
	          return false;
          }
      }
    </script>
	@stop

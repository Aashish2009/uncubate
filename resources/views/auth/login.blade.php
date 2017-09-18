<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>
	
    <!-- Bootstrap -->
    <link href="{{{URL::asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{{URL::asset('/vendors/font-awesome/css/font-awesome.min.css')}}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{{URL::asset('/css/custom.css')}}}" rel="stylesheet">
    <!-- JQuery -->
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.2.min.js"></script>
    <!-- form validation -->
    <link href="{{{URL::asset('/css/formValidation.min.css')}}}" rel="stylesheet">
    <script src="{{{URL::asset('/js/formValidation.min.js')}}}" type="text/javascript"></script>
    <script>
	    $(document).ready(function(){
	    	$('#form').bootstrapValidator();
	    	$('.form-control').on('input', function(){
				$(this).parent().find('.server-error').remove();
				$('.login-error').remove();
			});
	    });
    </script>
  </head>
  <body style="background:#F7F7F7;">
    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>
      <div id="wrapper">
        <div id="login" class="form">
          <section class="login_content">
            <form id="form" method="post" action="{{{URL::route('verify_login')}}}">
              {!! csrf_field() !!}
              <h1>Login</h1>
              <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" placeholder="Email"
					data-bv-notempty="true" id="email" data-bv-notempty-message="The email address is required and cannot be empty" 
					data-fv-emailaddress-message="The value is not a valid email address" data-fv-field="email" value="{{{old('email')}}}"/>
				@if ($errors->has('email'))
					<small class="help-block server-error" data-bv-for="email" data-bv-result="INVALID" style="color:#a94442;">{{{$errors->first('email')}}}</small>
				@endif
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" data-bv-notempty="true"
                    data-bv-notempty-message="The password is required and cannot be empty" data-bv-stringlength="true" value="{{{old('password')}}}"
                    data-bv-different="true" data-bv-different-field="email" data-bv-different-message="The password cannot be the same as username" />
                @if ($errors->has('password'))
					<small class="help-block server-error" data-bv-for="password" data-bv-result="INVALID" style="color:#a94442;">{{{$errors->first('password')}}}</small>
				@endif
              </div>
              <small class="help-block login-error" data-bv-for="password" data-bv-result="INVALID" style="color:#a94442;">{{{Session::pull('error_message')}}}</small>
              <div>
                <button type="submit" class="btn btn-default submit" disabled>Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
	              <div class="clearfix"></div>
	              <br />
	              <div>
	                  <h1><img style="max-width: 350px;" src="{{{URL::asset('images/logo-login.png')}}}"></h1>
	                  <p>&copy;2017 All Rights Reserved. Stimulus Consultancy Pvt Ltd.</p>
	              </div>
              </div>
          	</form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
    <title>Creative Tech Solutions EMS</title>
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
{!!Html::style('vendor/bootstrap/css/bootstrap.min.css') !!}
{!!Html::style('vendor/fontawesome/css/font-awesome.min.css')!!}
{!!Html::style('vendor/animate.css/animate.min.css')!!}
{!!Html::style('vendor/perfect-scrollbar/perfect-scrollbar.min.css')!!}
{!!Html::style('vendor/switchery/switchery.min.css')!!}
{!!Html::style('assets/css/styles.css')!!}
{!!Html::style('assets/css/plugins.css')!!}
{!!Html::style('assets/css/themes/theme-1.css')!!}
{!!Html::style('css/style.css')!!}
<body class="login">
<!-- start: REGISTRATION -->
<div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="logo margin-top-30">

        </div>
        <!-- start: REGISTER BOX -->
        <div class="box-register">
            <form class="form-register" method="POST" action="{{route('register')}}">
                {{ csrf_field() }}
                <fieldset>
                    <legend>
                        Sign Up
                    </legend>
                    <p>
                        Enter your personal details below:
                    </p>
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Full Name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="city" placeholder="City">
                    </div>
                    <div class="form-group">
                        <label class="block">
                            Gender
                        </label>
                        <div class="clip-radio radio-primary">
                            <input type="radio" id="rg-female" name="gender" value="0">
                            <label for="rg-female">
                                Female
                            </label>
                            <input type="radio" id="rg-male" name="gender" value="1">
                            <label for="rg-male">
                                Male
                            </label>
                        </div>
                    </div>
                    <p>
                        Enter your account details below:
                    </p>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
								<span class="input-icon">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                                    <i class="fa fa-envelope"></i> </span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
								<span class="input-icon">
									<input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                    <i class="fa fa-lock"></i> </span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                    </div>
                    <div class="form-group">
								<span class="input-icon">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="Password Again">
									<i class="fa fa-lock"></i> </span>
                    </div>
                    <div class="form-actions">
                        <p>
                            Already have an account?
                            <a href="{{route('login')}}">
                                Log-in
                            </a>
                        </p>
                        <button type="submit" class="btn btn-primary pull-right">
                            Submit <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                </fieldset>
            </form>
            <!-- start: COPYRIGHT -->
            <div class="copyright">
                &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Creative Tech Solutions </span>. <span>All rights reserved</span>
            </div>
            <!-- end: COPYRIGHT -->
        </div>
        <!-- end: REGISTER BOX -->
    </div>
</div>
{!!Html::script('vendor/jquery/jquery.min.js')!!}
{!!Html::script('vendor/bootstrap/js/bootstrap.min.js')!!}
{!!Html::script('vendor/modernizr/modernizr.js')!!}
{!!Html::script('vendor/jquery-cookie/jquery.cookie.js')!!}
{!!Html::script('vendor/perfect-scrollbar/perfect-scrollbar.min.js')!!}
{!!Html::script('vendor/switchery/switchery.min.js')!!}
{!!Html::script('vendor/jquery-validation/jquery.validate.min.js')!!}
{!!Html::script('assets/js/main.js')!!}
{!!Html::script('assets/js/login.js')!!}
<script>
    jQuery(document).ready(function() {
        Main.init();
        Login.init();
    });
</script>

</body>
</html>
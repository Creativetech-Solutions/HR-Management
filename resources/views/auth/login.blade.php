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
</head>
<body class="login">
    <div class="row">
        <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="logo margin-top-30">

            </div>
            <!-- start: LOGIN BOX -->
            <div class="box-login">
                <form class="form-login" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <fieldset>
                        <legend>
                            Sign in to your account
                        </legend>
                        <p>
                            Please enter your name and password to log in.
                        </p>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
								<span class="input-icon">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
									<i class="fa fa-user"></i>
                                </span>
                        </div>
                        <div class="form-group form-actions {{ $errors->has('password') ? ' has-error' : '' }}">
								<span class="input-icon">
									 <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
									<i class="fa fa-lock"></i>
								<a class="forgot" href="{{ route('password.request') }}">Forgot Your Password?</a>
                                </span>
                        </div>
                        <div class="form-actions">
                            <div class="checkbox clip-check check-primary">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">
                                Login<i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>

                        <div class="new-account">
                            Don't have an account yet?
                            <a href="{{ route('register') }}">
                                Create an account
                            </a>
                        </div>
                    </fieldset>
                </form>
                <!-- start: COPYRIGHT -->
                <div class="copyright">
                    &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Creative Tech Solutions </span>. <span>All rights reserved</span>
                </div>
                <!-- end: COPYRIGHT -->
            </div>
            <!-- end: LOGIN BOX -->
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



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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" href="assets/images/logo.png" />

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    {!!Html::style('vendor/bootstrap/css/bootstrap.min.css') !!}
    {!!Html::style('vendor/fontawesome/css/font-awesome.min.css')!!}
    {!!Html::style('vendor/themify-icons/themify-icons.min.css')!!}
    {!!Html::style('vendor/animate.css/animate.min.css')!!}
    {!!Html::style('vendor/perfect-scrollbar/perfect-scrollbar.min.css')!!}
    {!!Html::style('vendor/switchery/switchery.min.css')!!}
    {!!Html::style('assets/css/styles.css')!!}
    {!!Html::style('assets/css/plugins.css')!!}
    {!!Html::style('assets/css/themes/theme-1.css')!!}
    {!!Html::style('vendor/select2/select2.min.css')!!}
    {!!Html::style('vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css')!!}
    {!!Html::style('vendor/bootstrap-timepicker/bootstrap-timepicker.min.css')!!}
    {!!Html::style('vendor/DataTables/css/DT_bootstrap.css')!!}
    {!!Html::style('vendor/toastr/toastr.min.css')!!}
    {!!Html::style('vendor/jquery-file-upload/css/jquery.fileupload-ui.css')!!}
    {!!Html::style('css/style.css')!!}
</head>
<body>
<div id="app">
    @include('layout.sidebar')
    <div class="app-content">
        <!-- start: TOP NAVBAR -->
        <header class="navbar navbar-default navbar-static-top">
            <!-- start: NAVBAR HEADER -->
            <div class="navbar-header">
                <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                    <i class="ti-align-justify"></i>
                </a>

                    <img class="logo-img" src="http://localhost/cts-ems/public/images/logo.png" alt="Creative Tech Solutions">



                <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                    <i class="ti-align-justify"></i>
                </a>
                <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="ti-view-grid"></i>
                </a>
            </div>
            <!-- end: NAVBAR HEADER -->
            <!-- start: NAVBAR COLLAPSE -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-right">
                    <!-- start: MESSAGES DROPDOWN -->
                    {{--<li class="dropdown">--}}
                        {{--<a href class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<span class="dot-badge partition-red"></span> <i class="ti-comment"></i> <span>MESSAGES</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">--}}
                            {{--<li>--}}
                                {{--<span class="dropdown-header"> Unread messages</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="drop-down-wrapper ps-container">--}}
                                    {{--<ul>--}}
                                        {{--<li class="unread">--}}
                                            {{--<a href="javascript:;" class="unread">--}}
                                                {{--<div class="clearfix">--}}
                                                    {{--<div class="thread-image">--}}
                                                        {{--<img src="./assets/images/avatar-2.jpg" alt="">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="thread-content">--}}
                                                        {{--<span class="author">Nicole Bell</span>--}}
                                                        {{--<span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>--}}
                                                        {{--<span class="time"> Just Now</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="javascript:;" class="unread">--}}
                                                {{--<div class="clearfix">--}}
                                                    {{--<div class="thread-image">--}}
                                                        {{--<img src="./assets/images/avatar-3.jpg" alt="">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="thread-content">--}}
                                                        {{--<span class="author">Steven Thompson</span>--}}
                                                        {{--<span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>--}}
                                                        {{--<span class="time">8 hrs</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="javascript:;">--}}
                                                {{--<div class="clearfix">--}}
                                                    {{--<div class="thread-image">--}}
                                                        {{--<img src="./assets/images/avatar-5.jpg" alt="">--}}
                                                    {{--</div>--}}
                                                    {{--<div class="thread-content">--}}
                                                        {{--<span class="author">Kenneth Ross</span>--}}
                                                        {{--<span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>--}}
                                                        {{--<span class="time">14 hrs</span>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="view-all">--}}
                                {{--<a href="#">--}}
                                    {{--See All--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<!-- end: MESSAGES DROPDOWN -->--}}
                    {{--<!-- start: ACTIVITIES DROPDOWN -->--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="ti-check-box"></i> <span>ACTIVITIES</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">--}}
                            {{--<li>--}}
                                {{--<span class="dropdown-header"> You have new notifications</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div class="drop-down-wrapper ps-container">--}}
                                    {{--<div class="list-group no-margin">--}}
                                        {{--<a class="media list-group-item" href="">--}}
                                            {{--<img class="img-circle" alt="..." src="assets/images/avatar-1.jpg">--}}
                                            {{--<span class="media-body block no-margin"> Use awesome animate.css <small class="block text-grey">10 minutes ago</small> </span>--}}
                                        {{--</a>--}}
                                        {{--<a class="media list-group-item" href="">--}}
                                            {{--<span class="media-body block no-margin"> 1.0 initial released <small class="block text-grey">1 hour ago</small> </span>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="view-all">--}}
                                {{--<a href="#">--}}
                                    {{--See All--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<!-- end: ACTIVITIES DROPDOWN -->--}}
                    {{--<!-- start: LANGUAGE SWITCHER -->--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="ti-world"></i> English--}}
                        {{--</a>--}}
                        {{--<ul role="menu" class="dropdown-menu dropdown-light fadeInUpShort">--}}
                            {{--<li>--}}
                                {{--<a href="#" class="menu-toggler">--}}
                                    {{--Deutsch--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#" class="menu-toggler">--}}
                                    {{--English--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#" class="menu-toggler">--}}
                                    {{--Italiano--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- start: LANGUAGE SWITCHER -->
                    <!-- start: USER OPTIONS DROPDOWN -->
                    <div class="login_user_id" style="display: none"> <?= $userId = Auth::id();?>  </div>>
                    <li class="dropdown current-user">
                        <a href class="dropdown-toggle" data-toggle="dropdown">
                            {!!Html::image('assets/images/avatar-1.jpg')!!}
                             <span class="username">Admin<i class="ti-angle-down"></i></span>
                        </a>
                        <ul class="dropdown-menu dropdown-dark">
                            <li>
                                <a href="pages_user_profile.html">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href="pages_calendar.html">
                                    My Calendar
                                </a>
                            </li>
                            <li>
                                <a hef="pages_messages.html">
                                    My Messages (3)
                                </a>
                            </li>
                            <li>
                                <a href="login_lockscreen.html">
                                    Lock Screen
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                   Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- end: USER OPTIONS DROPDOWN -->
                </ul>
                <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
                <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                    <div class="arrow-left"></div>
                    <div class="arrow-right"></div>
                </div>
                <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
            </div>
            {{--<a class="dropdown-off-sidebar sidebar-mobile-toggler hidden-md hidden-lg" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">--}}
                {{--&nbsp;--}}
            {{--</a>--}}
            {{--<a class="dropdown-off-sidebar hidden-sm hidden-xs" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">--}}
                {{--&nbsp;--}}
            {{--</a>--}}
            <!-- end: NAVBAR COLLAPSE -->
        </header>
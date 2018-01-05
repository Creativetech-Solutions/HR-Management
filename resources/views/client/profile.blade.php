@extends('layout.layout')
@section('content')
    @parent

    <div class="tabbable">
        <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
            <li class="active">
                <a data-toggle="tab" href="#panel_overview">
                    Overview
                </a>
            </li>
            <li class="hide">
                <a  href="{{ route("clients.edit", $user->id ) }}">
                    Edit Account
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#panel_projects">
                    Projects
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="panel_overview" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-sm-5 col-md-4">
                        <div class="user-left">
                            <div class="center">
                                <h4>{{$user->name}}</h4>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="user-image">
                                        <div class="fileinput-new thumbnail"><img src="{{asset('assets/images/logo/logo.jpg')}}" alt="">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div class="user-image-buttons">
																			<span class="btn btn-azure btn-file btn-sm"><span class="fileinput-new"><i class="fa fa-pencil"></i></span><span class="fileinput-exists"><i class="fa fa-pencil"></i></span>
																				<input type="file">
																			</span>
                                            <a href="#" class="btn fileinput-exists btn-red btn-sm" data-dismiss="fileinput">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="social-icons block">
                                    <ul>
                                        <li data-placement="top" data-original-title="Twitter" class="social-twitter tooltips">
                                            <a href="http://www.twitter.com" target="_blank">
                                                Twitter
                                            </a>
                                        </li>
                                        <li data-placement="top" data-original-title="Facebook" class="social-facebook tooltips">
                                            <a href="http://facebook.com" target="_blank">
                                                Facebook
                                            </a>
                                        </li>
                                        <li data-placement="top" data-original-title="Google" class="social-google tooltips">
                                            <a href="http://google.com" target="_blank">
                                                Google+
                                            </a>
                                        </li>
                                        <li data-placement="top" data-original-title="LinkedIn" class="social-linkedin tooltips">
                                            <a href="http://linkedin.com" target="_blank">
                                                LinkedIn
                                            </a>
                                        </li>
                                        <li data-placement="top" data-original-title="Github" class="social-github tooltips">
                                            <a href="#" target="_blank">
                                                Github
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                            </div>
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th colspan="3">Contact Information</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                        {{ $user->first_name .'  '.$user->last_name}}
                                    </td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>
                                        <a href="#">
                                            {{ $user->email }}
                                        </a></td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td>{{ $user->phone }}</td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>

                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="3">General information</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <?= $user->status == 1 ? '<span class="btn btn-xs btn-success">Publish</span>' : "<span class='btn btn-xs btn-danger'>Pending</span>" ?>
                                    </td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="3">Additional information</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $user->city ." , ". $user->country }}</td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                <tr>
                                    <td>Skills</td>
                                    <td><?php

                                        if(!empty($skills)){
                                        foreach($skills as $skill)
                                        {
                                        ?><span class="p_skills btn btn-xs btn-primary"> {{ $skill->skill_name }}</span><?php
                                        }
                                        }?>
                                    </td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-8">
                        <div class="row space20">
                            <div class="col-sm-3">
                                <button class="btn btn-icon margin-bottom-5 margin-bottom-5 btn-block">
                                    <i class="ti-layers-alt block text-primary text-extra-large margin-bottom-10"></i>
                                    Projects <span class="badge badge-success" id="p_t" >  </span>
                                </button>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-icon margin-bottom-5 btn-block">
                                    <i class="ti-comments block text-primary text-extra-large margin-bottom-10"></i>
                                    Tasks <span class="badge badge-success" > 23 </span>
                                </button>
                            </div>
                            <div class="col-sm-3 hide">
                                <button class="btn btn-icon margin-bottom-5 btn-block">
                                    <i class="ti-calendar block text-primary text-extra-large margin-bottom-10"></i>
                                    Calendar
                                </button>
                            </div>
                            <div class="col-sm-3 ">
                                <button class="btn btn-icon margin-bottom-5 btn-block">
                                    <i class="fa fa-edit block text-primary text-extra-large margin-bottom-10"></i>
                                    <a href="{{ route('clients.edit',$user->id) }}"> Edit Profile </a>
                                </button>
                            </div>
                        </div>
                        <div class="panel panel-white" id="activities">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title text-primary">Recent Completed Tasks </h4>
                                <paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
                            </div>
                            <div collapse="activities" ng-init="activities=false" class="panel-wrapper">
                                <div class="panel-body">
                                    <ul class="timeline-xs">
                                        <li class="timeline-item success">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>
                                                <p>
                                                    <a class="text-info" href>
                                                        Steven
                                                    </a>
                                                    has completed his account.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    12:30
                                                </div>
                                                <p>
                                                    Staff Meeting
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item danger">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    11:11
                                                </div>
                                                <p>
                                                    Completed new layout.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item info">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Thu, 12 Jun
                                                </div>
                                                <p>
                                                    Contacted
                                                    <a class="text-info" href>
                                                        Microsoft
                                                    </a>
                                                    for license upgrades.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Tue, 10 Jun
                                                </div>
                                                <p>
                                                    Started development new site
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Sun, 11 Apr
                                                </div>
                                                <p>
                                                    Lunch with
                                                    <a class="text-info" href>
                                                        Nicole
                                                    </a>
                                                    .
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item warning">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Wed, 25 Mar
                                                </div>
                                                <p>
                                                    server Maintenance.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Fri, 20 Mar
                                                </div>
                                                <p>
                                                    New User Registration
                                                    <a class="text-info" href>
                                                        more details
                                                    </a>
                                                    .
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-white space20">
                            <div class="panel-heading">
                                <h4 class="panel-title">Recent Project</h4>
                            </div>
                            <div class="panel-body">
                                <ul class="ltwt">
                                    <li class=" ">
                                        <p class="ltwt_tweet_text">
                                            <a href class="text-info">
                                                {{ $dev_pro->name }}
                                            </a>
                                        </p>
                                        <span class="block text-light"><i class="fa fa-fw fa-clock-o"></i> Start Date: {{ $dev_pro->start_date }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel_projects" class="tab-pane fade padding-bottom-30">
                <table class="table-bordered table table-striped table-bordered table-hover table-full-width" id="projects">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Project Name</th>
                        <th>Client Name</th>
                        <th>Project Manager</th>
                        <th>Start Date</th>
                        <th>Due Date </th>
                        <th>Project Status</th>
                        <th>Payment Status</th>
                    </tr>
                    {{ csrf_field() }}
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <?php $ids = $dev->id ?>
@stop
@section('script')
    @parent
    <script>
        jQuery(function($) {
            var oTable = $('#projects').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('get.getData_for_cl',$ids ) !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'pro_name', name: 'pro_name' },
                    { data: 'client_name', name: 'client_name' },
                    { data: 'emp_name', name: 'emp_name' },
                    { data: 'start_date', name: 'start_date' },
                    { data: 'due_date', name: 'due_date' },
                    { data: 'project_status', name: 'project_status' },
                    { data: 'payment_status', name: 'payment_status' },
                ]
            });
        });
        $(document).ready(function(){
            var tp = $('#projects > tr').size();
             $('#p_t').text(tp);
        });
    </script>
@stop
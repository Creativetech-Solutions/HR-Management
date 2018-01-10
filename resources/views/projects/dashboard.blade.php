@extends('layout.layout')
@section('content')
@parent
    <div class="row">
        <div class="col-md-8">
            <h2>Projects Name</h2>
        </div>

    </div>


    @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message')}}
        </div>
    @endif
<div class="p-dashboard">

    <div class="tabbable">
        <ul id="myTab2" class="nav nav-tabs nav-justified">
            <li class="active">
                <a href="#myTab2_example1" data-toggle="tab">
                    OverView
                </a>
            </li>
            <li>
                <a href="#myTab2_example2" data-toggle="tab">
                    Tasks
                </a>
            </li>
         </ul>
        <div class="tab-content">
             <div class="tab-pane fade in active" id="myTab2_example1">
                <div class="row">
                    <div class="col-sm-5 col-md-3">

                        <div class="user-left">
                            <div class="heading">
                                <h4 class="panel-title">Client Name:</h4>
                            </div>
                            <div class="">
                                <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                <h6 class="no-margin inline-block padding-15 panel-title">Peter Clark </h6>
                                <div class="pull-right padding-15">
                                    <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                </div>
                            </div>
                            <div class="heading">
                                <h4 class="panel-title">Project Manager:</h4>
                            </div>
                            <div class="">
                                <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                <h6 class="no-margin inline-block padding-15 panel-title">Peter Clark</h6>
                                <div class="pull-right padding-15">
                                    <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                </div>
                            </div>
                            <div class="heading">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="panel-title">Developers:</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="pull-right">Add New </a>
                                    </div>
                                </div>

                            </div>
                            <div class="developer" data-toggle="modal" data-target=".user-model">
                                <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                <h6 class="no-margin inline-block padding-15 panel-title">Peter Clark </h6>
                                <div class="pull-right padding-15">
                                    <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                </div>
                            </div>
                            <hr>
                            <div class="developer"data-toggle="modal" data-target=".user-model">
                                <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                <h6 class="no-margin inline-block padding-15 panel-title">Peter Clark</h6>
                                <div class="pull-right padding-15">
                                    <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                </div>
                            </div>
                            <hr>
                            <div class="developer"data-toggle="modal" data-target=".user-model">
                                <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                <h6 class="no-margin inline-block padding-15 panel-title">Peter Clark </h6>
                                <div class="pull-right padding-15">
                                    <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                </div>
                            </div>
                            <hr>
                            <div class="developer"data-toggle="modal" data-target=".user-model">
                                <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                <h6 class="no-margin inline-block padding-15 panel-title">Peter Clark </h6>
                                <div class="pull-right padding-15">
                                    <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                </div>
                            </div>
                            <hr>
                            <div class="developer"data-toggle="modal" data-target=".user-model">
                                <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                <h6 class="no-margin inline-block padding-15 panel-title">Peter Clark </h6>
                                <div class="pull-right padding-15">
                                    <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                </div>
                            </div>
                            <hr>
                            <div class="developer" data-toggle="modal" data-target=".user-model">
                                <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                <h6 class="no-margin inline-block padding-15 panel-title">Peter Clark </h6>
                                <div class="pull-right padding-15">
                                    <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-9">
                        <div class="panel panel-white" id="activities">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title text-primary">Project Description</h4>
                                <paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
                            </div>
                            <div collapse="activities" ng-init="activities=false" class="panel-wrapper">
                                <div class="panel-body">
                                    <p>
                                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.
                                    </p>
                                    <p>
                                        Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
                                    </p>
                                </div>
                            </div>
                            <hr>
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

                    </div>
                </div>
                <hr>
                <div class="row">
                    {{-- Mile Stones Sections  --}}
                    <div class="col-md-6 col-sm-12 border-right ">
                        <div class="panel-heading border-light">
                            <h4 class="panel-title text-primary center">Milestones</h4>
                            <paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
                        </div>
                        <hr>

                        <div class="panel-body">

                            <div class="collapse-group">
                                <div class="controls">
                                    <button class="btn btn-sm btn-primary open-button" type="button">
                                        Open all
                                    </button>
                                    <button class="btn btn-sm btn-primary close-button" type="button">
                                        Close all
                                    </button>
                                    <a class="btn btn-primary btn-sm pull-right" type="button" data-toggle="modal" data-target=".add-milestone">
                                        Add New
                                    </a>
                                </div>
                                <div class="panel panel-default">
                                    <ul class="timeline-xs">
                                        <li class="timeline-item success">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>
                                                <p role="button" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                    Collapsible Group Item #1
                                                </p>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiand
                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Task1</span>
                                                    <span class="btn btn-xs btn-success">Task2</span>
                                                    <span class="btn btn-xs btn-success">Task3</span>
                                                    <a class="pull-right success" data-toggle="modal" data-target=".milestone">View Detail</a>

                                                </div>

                                                <hr>
                                            </div>
                                        </li>
                                        <li class="timeline-item info">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>

                                                <p role="button" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapse2" class="trigger collapsed">
                                                    Collapsible Group Item #2

                                                </p>
                                            </div>


                                            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.

                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Task1</span>
                                                    <span class="btn btn-xs btn-success">Task2</span>
                                                    <span class="btn btn-xs btn-success">Task3</span>
                                                    <a class="pull-right success" data-toggle="modal" data-target=".milestone">View Detail</a>
                                                </div>
                                                <hr>
                                            </div>
                                        </li>

                                        <li class="timeline-item danger">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>

                                                <p role="button" data-toggle="collapse" href="#collapse3" aria-expanded="true" aria-controls="collapse3" class="trigger collapsed">
                                                    Collapsible Group Item #3
                                                </p>
                                            </div>


                                            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.

                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Task1</span>
                                                    <span class="btn btn-xs btn-success">Task2</span>
                                                    <span class="btn btn-xs btn-success">Task3</span>
                                                    <a class="pull-right success" data-toggle="modal" data-target=".milestone">View Detail</a>
                                                </div>
                                                <hr>
                                            </div>

                                        </li>
                                        <li class="timeline-item primary">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>

                                                <p role="button" data-toggle="collapse" href="#collapse4" aria-expanded="true" aria-controls="collapse4" class="trigger collapsed">
                                                    Collapsible Group Item #4
                                                </p>
                                            </div>


                                            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.

                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Task1</span>
                                                    <span class="btn btn-xs btn-success">Task2</span>
                                                    <span class="btn btn-xs btn-success">Task3</span>
                                                    <a class="pull-right success" data-toggle="modal" data-target=".milestone">View Detail</a>
                                                </div>
                                                <hr>
                                            </div>

                                        </li>
                                        <li class="timeline-item success">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>

                                                <p role="button" data-toggle="collapse" href="#collapse5" aria-expanded="true" aria-controls="collapse4" class="trigger collapsed">
                                                    Collapsible Group Item #5
                                                </p>
                                            </div>


                                            <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.

                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Task1</span>
                                                    <span class="btn btn-xs btn-success">Task2</span>
                                                    <span class="btn btn-xs btn-success">Task3</span>
                                                    <a class="pull-right success" data-toggle="modal" data-target=".milestone">View Detail</a>
                                                </div>
                                                <hr>
                                            </div>

                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                    {{-- Task sections --}}
                    <div class="col-md-6" col-sm-12>
                        <div class="panel-heading border-light">
                            <h4 class="panel-title text-primary center">Tasks</h4>
                            <paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
                        </div>
                        <hr>
                        <div class="panel-body">

                            <div class="collapse-group">
                                <div class="controls">
                                    <button class="btn btn-sm btn-primary open-button" type="button">
                                        Open all
                                    </button>
                                    <button class="btn btn-sm btn-primary close-button" type="button">
                                        Close all
                                    </button>
                                    <a class="btn btn-primary btn-sm pull-right" type="button" >
                                        Add New
                                    </a>
                                </div>
                                <div class="panel panel-default">
                                    <ul class="timeline-xs">
                                        <li class="timeline-item success">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>
                                                <p role="button" data-toggle="collapse" href="#1" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                    Collapsible Group Item #1
                                                </p>
                                            </div>
                                            <div id="1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiand
                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Developer name</span>
                                                    <a class="pull-right success" data-toggle="modal" data-target=".task-model">View Detail</a>

                                                </div>

                                                <hr>
                                            </div>
                                        </li>
                                        <li class="timeline-item info">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>

                                                <p role="button" data-toggle="collapse" href="#2" aria-expanded="true" aria-controls="collapse2" class="trigger collapsed">
                                                    Collapsible Group Item #2

                                                </p>
                                            </div>


                                            <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.

                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Developer name</span>
                                                    <a class="pull-right success" data-toggle="modal" data-target=".task-model">View Detail</a>
                                                </div>
                                                <hr>
                                            </div>
                                        </li>

                                        <li class="timeline-item danger">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>

                                                <p role="button" data-toggle="collapse" href="#3" aria-expanded="true" aria-controls="collapse3" class="trigger collapsed">
                                                    Collapsible Group Item #3
                                                </p>
                                            </div>


                                            <div id="3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.

                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Developer name</span>
                                                    <a class="pull-right success" data-toggle="modal" data-target=".task-model">View Detail</a>
                                                </div>
                                                <hr>
                                            </div>

                                        </li>
                                        <li class="timeline-item primary">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>

                                                <p role="button" data-toggle="collapse" href="#4" aria-expanded="true" aria-controls="collapse4" class="trigger collapsed">
                                                    Collapsible Group Item #4
                                                </p>
                                            </div>


                                            <div id="4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.

                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Developer name</span>

                                                    <a class="pull-right success" data-toggle="modal" data-target=".task-model">View Detail</a>
                                                </div>
                                                <hr>
                                            </div>

                                        </li>
                                        <li class="timeline-item success">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>

                                                <p role="button" data-toggle="collapse" href="#5" aria-expanded="true" aria-controls="collapse4" class="trigger collapsed">
                                                    Collapsible Group Item #5
                                                </p>
                                            </div>


                                            <div id="5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                                                <div class="panel-body">
                                                    Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.

                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">Developer name</span>

                                                    <a class="pull-right success" data-toggle="modal" data-target=".task-model">View Detail</a>
                                                </div>
                                                <hr>
                                            </div>

                                        </li>
                                    </ul>
                                </div>


                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="myTab2_example2">
                <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">To Do <input  draggable="false" type="button" class="btn btn-xs btn-primary pull-right margin-3" value="Add New" data-toggle="modal" data-target=".add-task"></div>

                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="drag1">
                        <div class="t-heading"  data-toggle="collapse" href="#t1" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            Task Name  1
                        </div>
                        <p id="t1" class="panel-collapse collapse">Detail</p>
                    </div>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="drag2" >
                        <div class="t-heading"  data-toggle="collapse" href="#t2" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            Task Name 2
                        </div>
                        <p id="t2" class="panel-collapse collapse">Detail</p>
                    </div>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="drag3" >
                        <div class="t-heading"  data-toggle="collapse" href="#t3" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            Task Name  3
                        </div>
                        <p id="t3" class="panel-collapse collapse">Detail</p>
                    </div>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="drag4" >
                        <div class="t-heading"  data-toggle="collapse" href="#t4" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            Task Name 4
                        </div>
                        <p id="t4" class="panel-collapse collapse">Detail</p>
                    </div>

                </div>

                <div id="div2"  ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">Doing</div>
                </div>

                <div id="div3"  ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">Review</div>
                </div>
                <div id="div4"  ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">Done</div>
                </div>
            </div>

        </div>
    </div>
 </div>
    <style>
        /*  for user-model Darage and Drop */
        #div1, #div2,#div3,#div4 {
            float: left;
            width: 350px;
            height: auto;
            min-height: 550px;
            margin: 10px;
            border: 2px solid #0000003d;
            cursor: pointer;
        }
        .d-heading {
            background-color: #8080803b;
            padding: 10px;
            margin: 0px !important;
            color:#007aff !important;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
        }
        .t-heading {
            background-color: #c8c7cc70;
            color: #333333ed;
            font-size: 16px;
            font-weight: 500;
            padding: 6px;
        }
        .tasks{
            margin: 8px;
            border: 2px solid #8080803d;
            border-radius: 3px;
        }
        .tasks p{
            padding: 5px;
        }

        .user-model .modal-body{
            display: flex !important;
        }
        #myTab2_example2{
            display: flex !important;
        }
        .developer{
            cursor: pointer;
        }
        .select2-container{
            z-index: 9999999!important;
        }
        .modal-body input,textarea {
            background-color: #f7f7f8 !important;
        }
        .select2-container--default .select2-selection--single {
            background-color: #f7f7f8 !important;
        }

        /* End */

        .trigger{
            cursor: pointer;
        }
        a:hover, a:visited, a:link, a:active {
            text-decoration: none;
        }
        .timeline-item{
            list-style: none;
        }
        .controls {
            margin-bottom: 10px;
        }

        .collapse-group {
            padding: 10px;
            border: 1px solid darkgrey;
            margin-bottom: 10px;
        }

        .panel-title .trigger:before {
            content: '\e082';
            font-family: 'Glyphicons Halflings';
            vertical-align: text-bottom;
        }

        .panel-title .trigger.collapsed:before {
            content: '\e081';
        }
        </style>

<!-- Milestones Model  -->
<div class="modal fade milestone bs-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Milestone Name</h4>
            </div>
            <div class="modal-body">
                Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.
                <hr>

                <h4 class="modal-title" id="myModalLabel">Milestone Details</h4>
                <table class="table-full-width table">
                    <tr>
                        <td> Start Date </td>
                        <td> 01/08/2018</td>
                    </tr>
                    <tr>
                        <td>End Date  </td>
                        <td> 01/08/2018 </td>
                    </tr>
                    <tr>
                        <td>Payment Status  </td>
                        <td> Pending</td>
                    </tr>
                    <tr>
                        <td>Milestone Status </td>
                        <td> Pending</td>
                    </tr>
                    <tr>
                        <td>Budget</td>
                        <td> Pending</td>
                    </tr>
                </table>
                <h4 class="modal-title" id="myModalLabel">Milestone Tasks</h4>
                <table class="table-full-width table">
                   <thead>
                    <tr>
                        <th> Task Name   </th>
                        <th> Assigned To </th>
                        <th> Assigned By </th>
                        <th> Status %    </th>
                    </tr>
                   </thead>
                    <tr>
                        <td> Task Name </td>
                        <td> Mudasir   </td>
                        <td> Hamid     </td>
                        <td> 50%       </td>
                    </tr>
                    <tr>
                        <td> Task Name </td>
                        <td> Mudasir   </td>
                        <td> Hamid     </td>
                        <td> 50%       </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

{{---  Task Model  ---}}
<div class="task-model modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Task Name</h4>
            </div>
            <div class="modal-body">
                Sunt quia aperiam, officiis tempora quis quasi fugit ab ipsa quo expedita reiciendis quod iusto! Enim delectus unde voluptatem officiis molestiae repudiandae.
                <hr>
                <h4 class="modal-title" id="myModalLabel">Tasks</h4>
                <table class="table-full-width table">
                    <thead>
                    <tr>
                        <th> Task Name   </th>
                        <th> Assigned To </th>
                        <th> Assigned By </th>
                        <th> Due Date    </th>
                        <th> Complete %  </th>
                        <th> Status     </th>
                    </tr>
                    </thead>
                    <tr>
                        <td> Task Name </td>
                        <td> Mudasir   </td>
                        <td> Hamid     </td>
                        <td> 12/12/2018</td>
                        <td> 50%       </td>
                        <td> Active    </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
{{---- Add Task  Model ----}}
<div class="add-task modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Task</h4>
            </div>
            <div class="modal-body">

                <form id="form3" method="POST" action="{{url($action_url)}}" role="form" enctype="multipart/form-data" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                            </div>
                            <div class="successHandler alert alert-success no-display">
                                <i class="fa fa-ok"></i> Your form validation is successful!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    Task Name <span class="symbol required"></span>
                                </label>
                                <input type="text" placeholder="Task Name" class="form-control" id="email" name="name" value="<?php if(!empty($projects->name)){echo  $projects->name; }?>"
                                >

                                <input type="hidden" name="hidden_project_id" value="<?= !empty($projects->id) ? $projects->id :" " ?>" id="hidden_project_id">

                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Task Due Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Assigned Date" class="form-control datepicker" id="assigned_date" name="assigned_date"
                                       value="<?= !empty($projects->assigned_date) ? $projects->assigned_date : " " ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Assigned To
                                </label>
                                <select  name="assigned_to" class="js-example-placeholder-single js-country form-control" placeholder="Assigned To">
                                    <?php if($employee){
                                    foreach($employee as $employees){?>
                                    <option value="<?= $employees->id ?>" <?php if(isset($projects->project_manager) && $projects->project_manager == $employees->id ){ echo "Selected";}?>>
                                        <?= $employees->name ?></option>
                                    <?php }}?>
                                </select>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">
                                    Task Descriptions <span class=""></span>
                                </label>
                                <textarea class="form-control autosize area-animated" name="description">
                                </textarea>
                            </div>
                         </div>
                    </div>
                    <button class="btn btn-primary btn-wide pull-right" type="submit" id="name_id">
                        Save <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </form>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="activity"> Activity:-</h4>
                        <ul>
                            <li>ABC USER added it into Reiview </li>
                        </ul>
                    </div>
                </div>

            </div>



        </div>
    </div>

</div>
{{---- Add Milestone  Model ----}}
<div class="add-milestone modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Milestone </h4>
            </div>
            <div class="modal-body">


                <form id="form3" method="POST" action="{{url($action_url2)}}" role="form" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="errorHandler alert alert-danger no-display">
                                <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                            </div>
                            <div class="successHandler alert alert-success no-display">
                                <i class="fa fa-ok"></i> Your form validation is successful!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    Milestone Name <span class="symbol required"></span>
                                </label>
                                <input type="text" placeholder="Milestone Name" class="form-control" id="email" name="title" value="<?php if(!empty($milestones->title)){echo  $milestones->title; }?>"
                                >
                                {{-- use for edit case to check project name --}}
                                <input type="hidden" name="hidden_milestone_id" value="<?= !empty($milestones->id) ? $milestones->id :" " ?>" id="hidden_project_id">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Budget <span class=""></span>
                                </label>
                                <input type="text" placeholder="Insert your Milestone Budget" class="form-control" id="budget" name="budget"
                                       value="<?php if(!empty($milestones->budget )){echo $milestones->budget ;}?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Milestone Start Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Milestone Start Date" class="form-control datepicker" id="start_date" name="start_date"
                                       value="<?= !empty($milestones->start_date) ? $milestones->start_date : " " ?>">
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Payment Status
                                </label>
                                <select  name="payment_status" class="js-example-basic-single js-country form-control" placeholder="Select Payment Status">
                                    <option></option>
                                    <option value="1" <?php if(isset($milestones->payment_status) && $milestones->payment_status== 1 ){echo "selected";}?> > Pending     </option>
                                    <option value="2" <?php if(isset($milestones->payment_status) && $milestones->payment_status== 2 ){echo "selected";}?> > Incomplete  </option>
                                    <option value="3" <?php if(isset($milestones->payment_status) && $milestones->payment_status== 3 ){echo "selected";}?> > Paid        </option>
                                    <option value="4" <?php if(isset($milestones->payment_status) && $milestones->payment_status== 4 ){echo "selected";}?> > Cancelled   </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Currency <span class=""></span>
                                </label>
                                <select   name="currency" class="js-example-basic-single form-control">
                                    <option></option>
                                    <?php
                                    if($currency){
                                    foreach($currency as $currency){
                                    foreach($currency->currency as $cr){?>
                                    <option value="<?= $cr['ISO4217Code'] ?>" <?php if(isset($milestones->currency) && $milestones->currency == $cr['ISO4217Code'] ){ echo "Selected";}?> >
                                        <?= $cr['sign'] ."  ".$cr['ISO4217Code'] . "   ".$cr['title']  ?>
                                    </option>
                                    <?php
                                    }
                                    }
                                    }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Milestone End Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Milestone End Date" class="form-control datepicker" id="due_date" name="due_date"
                                       value="<?= !empty($milestones->due_date) ? $milestones->due_date : " " ?>">
                            </div>



                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                            <label>
                                Description
                            </label>
                            <textarea class="form-control" name="description"><?php if(!empty($milestones->description)){echo  $milestones->description; }?></textarea>
                        </div>
                        </div>
                    </div>

                </form>
                <div class="row">

                    <div class="col-md-12">
                        <button class="btn btn-primary btn-wide pull-right" type="submit" id="name_id">
                            Submit <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                </div>

            </div>



        </div>
    </div>
</div>

{{--   User Details Model  --}}

<div class="user-model modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Developer Name </h4>
            </div>
            <div class="modal-body">

                <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">To Do</div>

                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="drag1">
                        <div class="t-heading"  data-toggle="collapse" href="#t1" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            Task Name  1
                        </div>
                        <p id="t1" class="panel-collapse collapse">Detail</p>
                    </div>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="drag2" >
                        <div class="t-heading"  data-toggle="collapse" href="#t2" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            Task Name 2
                        </div>
                        <p id="t2" class="panel-collapse collapse">Detail</p>
                    </div>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="drag3" >
                        <div class="t-heading"  data-toggle="collapse" href="#t3" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            Task Name  3
                        </div>
                        <p id="t3" class="panel-collapse collapse">Detail</p>
                    </div>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="drag4" >
                        <div class="t-heading"  data-toggle="collapse" href="#t4" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            Task Name 4
                        </div>
                        <p id="t4" class="panel-collapse collapse">Detail</p>
                    </div>
                </div>

                <div id="div2"  ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">Doing</div>
                </div>

                <div id="div3"  ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">Review</div>
                </div>
                <div id="div4"  ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">Done</div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

@stop
@section('script')
    @parent

    <script>
        $(".open-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('show');
        });

        $(".close-button").on("click", function() {
            $(this).closest('.collapse-group').find('.collapse').collapse('hide');
        });
// for drage and drop

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
// drage and drop end


        //form submit

        $(document).ready(function () {
            var name_exist = false;
            $('#form3').validate({
                rules: {
                    'name': { required: true},
                },
                messages: {
                    name: {
                        required: "Please enter your Project Name",
                    },
                },
            });
            $("#name_id").click(function () {
                if ($('#form3').valid() && name_exist === false) {
                    $('#form3').submit();
                } else {
                    if(name_exist === true){
                        $("#email").after("<label  class='error hideit' style='display:inline-block'>Name already exist Please chose another one</label>");
                        setTimeout(function() {
                            $('.hideit').slideUp("slow");
                        }, 4000);
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                }
            });
            $("#email").blur(function(){
                var name = $('#email').val();
                var p_id = $('#hidden_project_id').val();
                $.ajax({
                    type: 'POST',
                    url: '{{url('check_projects_name')}}',
                    data: {
                        'name':name,
                        'p_id':p_id,
                        '_token': $('input[name=_token]').val(),},
                    dataType: "json",
                    success: function(res) {
                        if(res.exists){
                            name_exist = true;
                            $("#email").after("<label  class='error hideit' style='display:inline-block'>Name already exist Please chose another one</label>");
                            setTimeout(function() {
                                $('.hideit').slideUp("slow");
                            }, 4000);

                        }else{
                            name_exist = false;
                        }
                    },
                    error: function (jqXHR, exception) {

                    }
                });
            });
        });



    </script>
@stop
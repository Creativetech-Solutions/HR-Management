@extends('layout.layout')
@section('content')
@parent
    <div class="row">
        <div class="col-md-8">
            <?php // echo "<pre>";  print_r($projects); ?>
            <h2>{{ $projects->name }}</h2>
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
                                <h6 class="no-margin inline-block padding-15 panel-title">{{ $users->name }}</h6>
                                <div class="pull-right padding-15">
                                    <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                </div>
                            </div>
                            <div class="heading">
                                <h4 class="panel-title">Project Manager:</h4>
                            </div>
                            <div class="">
                                <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                <h6 class="no-margin inline-block padding-15 panel-title">{{ $projects_man->name }}</h6>
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

                            <div class="developer">
                                <?php
                                if(!empty($project_dev)){
                                    foreach($project_dev as $dev){ ?>
                                        <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                            <h6 class=" dev-model no-margin inline-block padding-15 panel-title" id="" data-id="{{$dev->id}}">{{$dev->name}} </h6>
                                            <div class="pull-right padding-15">
                                                <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                            </div> <hr>




                                           {{--  error in the following code --}}
                                            <div class=" user-model modal fade"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="userid<?=$dev->id?>">
                                                <div class="modal-dialog modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">{{$dev->name}} </h4>
                                                        </div>
                                                        <div class="modal-body">


                                                            <?php
                                                            if(!empty($task_developer) && !empty($task_developer[$dev->id])){
                                                                foreach($task_developer[$dev->id] as $task_dev){
                                                                    if($task_dev->status == 0){
                                                                        $task_todos[$dev->id][] = $task_dev;
                                                                    }else if($task_dev->status == 1){
                                                                        $task_doings[$dev->id][] = $task_dev;
                                                                    }else if($task_dev->status == 2){
                                                                        $task_reviews[$dev->id][] = $task_dev;
                                                                    }else if($task_dev->status == 3){
                                                                        $task_dones[$dev->id][] = $task_dev;
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                              <div id="divs1"  data-id="0" ondrop="drops(event)" ondragover="allowDrops(event)">
                                                                    <div class="d-headings">To Do</div>
                                                                    <?php
                                                                    if(!empty($task_todos[$dev->id]))
                                                                    {
                                                                    foreach($task_todos[$dev->id] as $dev_tasks)
                                                                    { ?>
                                                                    <div class="tasks" draggable="true" ondragstart="drags(event)" id="single{{$dev_tasks->id}}" data-id="0">
                                                                        <div class="t-headings"  data-toggle="collapse" href="#ts{{$dev_tasks->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                                            <?= !empty($dev_tasks->task_name) ? $dev_tasks->task_name : "Name Not Found" ; ?>
                                                                        </div>
                                                                        <div id="ts{{$dev_tasks->id}}" class="panel-collapse collapse">
                                                                            <div class="col-md-12 p-10">
                                                                                <span class="delete-modal fa fa-trash pull-right"></span>
                                                                                <span class="edittask fa fa-pencil pull-right" ></span>
                                                                            </div>
                                                                            <p>{{$dev_tasks->description}}</p>
                                                                            <table class="p-10 table table-condensed" >
                                                                                <tr class="info">
                                                                                    <td>Assigned To:</td>
                                                                                    <td class="aas">{{$dev_tasks->ass_to}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Assigned By:</td>
                                                                                    <td>{{$dev_tasks->ass_by}}</td>
                                                                                </tr>
                                                                                <tr class="success">
                                                                                    <td>Due Date:</td>
                                                                                    <td class="d_date" >{{$dev_tasks->due_date}}</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    }} ?>
                                                                </div>
                                                                <div id="divs2" data-id="1"  ondrop="drops(event)" ondragover="allowDrops(event)">
                                                                    <div class="d-headings">Doing</div>
                                                                    <?php
                                                                    if(!empty($task_doings[$dev->id])){foreach($task_doings[$dev->id] as $dev_tasks){?>
                                                                    <div class="tasks" draggable="true" ondragstart="drags(event)" id="single{{$dev_tasks->id}}" data-id="1">
                                                                        <div class="t-headings"  data-toggle="collapse" href="#ts{{$dev_tasks->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                                            <?= !empty($dev_tasks->task_name) ? $dev_tasks->task_name : "Name Not Found" ; ?>
                                                                        </div>
                                                                        <div id="ts{{$dev_tasks->id}}" class="panel-collapse collapse">
                                                                            <div class="col-md-12 p-10">
                                                                                <span class="delete-modal fa fa-trash pull-right"></span>
                                                                                <span class="edittask fa fa-pencil pull-right" ></span>
                                                                            </div>
                                                                            <p>{{$dev_tasks->description}}</p>
                                                                            <table class="p-10 table table-condensed" >
                                                                                <tr class="info">
                                                                                    <td>Assigned To:</td>
                                                                                    <td class="aas">{{$dev_tasks->ass_to}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Assigned By:</td>
                                                                                    <td>{{$dev_tasks->ass_by}}</td>
                                                                                </tr>
                                                                                <tr class="success">
                                                                                    <td>Due Date:</td>
                                                                                    <td class="d_date" >{{$dev_tasks->due_date}}</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <?php }} ?>
                                                                </div>
                                                                <div id="divs3" data-id="2"  ondrop="drops(event)" ondragover="allowDrops(event)">
                                                                    <div class="d-headings">Review</div>
                                                                    <?php
                                                                    if(!empty($task_reviews[$dev->id])){foreach($task_reviews[$dev->id] as $dev_tasks){?>
                                                                    <div class="tasks" draggable="true" ondragstart="drags(event)" id="single{{$dev_tasks->id}}" data-id="2">
                                                                        <div class="t-headings"  data-toggle="collapse" href="#ts{{$dev_tasks->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                                            <?= !empty($dev_tasks->task_name) ? $dev_tasks->task_name : "Name Not Found" ; ?>
                                                                        </div>
                                                                        <div id="ts{{$dev_tasks->id}}" class="panel-collapse collapse">
                                                                            <div class="col-md-12 p-10">
                                                                                <span class="delete-modal fa fa-trash pull-right"></span>
                                                                                <span class="edittask fa fa-pencil pull-right" ></span>
                                                                            </div>
                                                                            <p>{{$dev_tasks->description}}</p>
                                                                            <table class="p-10 table table-condensed" >
                                                                                <tr class="info">
                                                                                    <td>Assigned To:</td>
                                                                                    <td class="aas">{{$dev_tasks->ass_to}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Assigned By:</td>
                                                                                    <td>{{$dev_tasks->ass_by}}</td>
                                                                                </tr>
                                                                                <tr class="success">
                                                                                    <td>Due Date:</td>
                                                                                    <td class="d_date" >{{$dev_tasks->due_date}}</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <?php }} ?>
                                                                </div>
                                                                <div id="divs4" data-id="3" ondrop="drops(event)" ondragover="allowDrops(event)">
                                                                    <div class="d-headings">Done</div>
                                                                    <?php
                                                                    if(!empty($task_dones[$dev->id])){foreach($task_dones[$dev->id] as $dev_tasks){?>
                                                                    <div class="tasks" draggable="true" ondragstart="drags(event)" id="single{{$dev_tasks->id}}" data-id="3">
                                                                        <div class="t-headings"  data-toggle="collapse" href="#ts{{$dev_tasks->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                                            <?= !empty($dev_tasks->task_name) ? $dev_tasks->task_name : "Name Not Found" ; ?>
                                                                        </div>
                                                                        <div id="ts{{$dev_tasks->id}}" class="panel-collapse collapse">
                                                                            <div class="col-md-12 p-10">
                                                                                <span class="delete-modal fa fa-trash pull-right"></span>
                                                                                <span class="edittask fa fa-pencil pull-right" ></span>
                                                                            </div>
                                                                            <p>{{$dev_tasks->description}}</p>
                                                                            <table class="p-10 table table-condensed" >
                                                                                <tr class="info">
                                                                                    <td>Assigned To:</td>
                                                                                    <td class="aas">{{$dev_tasks->ass_to}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Assigned By:</td>
                                                                                    <td>{{$dev_tasks->ass_by}}</td>
                                                                                </tr>
                                                                                <tr class="success">
                                                                                    <td>Due Date:</td>
                                                                                    <td class="d_date" >{{$dev_tasks->due_date}}</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <?php }} ?>

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
                                    <?php } }?>

                            </div>

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
                                        {{ $projects->description }}
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
                                        <?php if(!empty($com_tasks)){
                                        foreach($com_tasks as $task){
                                        ?>
                                        <li class="timeline-item success">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    {{$task->updated_at}}
                                                </div>
                                                <p><a class="text-info" href=""> {{$task->task_name}} </a> {{$task->description}} </p>
                                            </div>
                                        </li>
                                        <?php }} ?>

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
                                 </div>
                                 <div class="panel panel-default">
                                     <ul class="timeline-xs">
                                         <?php if(!empty($tasks)){
                                         foreach($tasks as $taskss){
                                         ?>
                                         <li class="timeline-item success">
                                             <div class="margin-left-15">
                                                 <div class="text-muted text-small">
                                                     {{$taskss->updated_at}}
                                                 </div>
                                                 <p role="button" data-toggle="collapse" href="#alltasls<?=$taskss->id ?>" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                     {{$taskss->task_name}}
                                                 </p>
                                             </div>
                                             <div id="alltasls<?=$taskss->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                                 <div class="panel-body">
                                                     {{$taskss->description}}
                                                     <br>
                                                     <br>
                                                     <span class="btn btn-xs btn-success">{{$taskss->ass_to}} </span>
                                                     {{--<a class="pull-right success" data-toggle="modal" data-target=".task-model">View Detail</a>--}}
                                                 </div>
                                                 <hr>
                                             </div>
                                         </li>
                                         <?php }}
                                         ?>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
            <?php
            if(!empty($tasks)){
                foreach($tasks as $task){
                    if($task->status == 0){
                        $task_todo[] = $task;
                    }else if($task->status == 1){
                        $task_doing[] = $task;
                    }else if($task->status == 2){
                        $task_review[] = $task;
                    }else if($task->status == 3){
                        $task_done[] = $task;
                    }
                }
            }
            ?>
            <div class="tab-pane fade" id="myTab2_example2">
                <div id="div1"  data-id="0" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">To Do <input  draggable="false" type="button" class="btn btn-xs btn-primary pull-right margin-3" value="Add New" data-toggle="modal" data-target=".add-task" id="add_new_task"></div>
                    <?php
                    if(!empty($task_todo))
                    {foreach($task_todo as $task){?>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="{{$task->id}}" data-id="0">
                        <div class="t-heading"  data-toggle="collapse" href="#t{{$task->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            <?= !empty($task->task_name) ? $task->task_name : "Name Not Found" ; ?>
                        </div>
                        <div id="t{{$task->id}}" class="panel-collapse collapse">
                            <div class="col-md-12 p-10">
                                <span class="delete-modal fa fa-trash pull-right"></span>
                                <span class="edittask fa fa-pencil pull-right" ></span>
                            </div>
                            <p>{{$task->description}}</p>
                            <table class="p-10 table table-condensed" >
                                <tr class="info">
                                    <td>Assigned To:</td>
                                    <td class="aas">{{$task->ass_to}}</td>
                                </tr>
                                <tr>
                                    <td>Assigned By:</td>
                                    <td>{{$task->ass_by}}</td>
                                </tr>
                                <tr class="success">
                                    <td>Due Date:</td>
                                    <td class="d_date" >{{$task->due_date}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php }} ?>
                </div>

                <div id="div2" data-id="1"  ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">Doing</div>
                    <?php
                    if(!empty($task_doing)){foreach($task_doing as $task){?>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="{{$task->id}}" data-id="1">
                        <div class="t-heading"  data-toggle="collapse" href="#t{{$task->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            <?= !empty($task->task_name) ? $task->task_name : "Name Not Found" ; ?>
                        </div>
                        <div id="t{{$task->id}}" class="panel-collapse collapse">
                            <div class="col-md-12 p-10">
                                <span class="delete-modal fa fa-trash pull-right"></span>
                                <span class="edittask fa fa-pencil pull-right" ></span>
                            </div>
                            <p>{{$task->description}}</p>
                            <table class="p-10 table table-condensed" >
                                <tr class="info">
                                    <td>Assigned To:</td>
                                    <td class="aas">{{$task->ass_to}}</td>
                                </tr>
                                <tr>
                                    <td>Assigned By:</td>
                                    <td>{{$task->ass_by}}</td>
                                </tr>
                                <tr class="success">
                                    <td>Due Date:</td>
                                    <td class="d_date" >{{$task->due_date}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php }} ?>
                </div>

                <div id="div3" data-id="2"  ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">Review</div>
                    <?php
                    if(!empty($task_review)){foreach($task_review as $task){?>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="{{$task->id}}" data-id="2">
                        <div class="t-heading"  data-toggle="collapse" href="#t{{$task->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            <?= !empty($task->task_name) ? $task->task_name : "Name Not Found" ; ?>
                        </div>
                        <div id="t{{$task->id}}" class="panel-collapse collapse">
                            <div class="col-md-12 p-10">
                                <span class="delete-modal fa fa-trash pull-right"></span>
                                <span class="edittask fa fa-pencil pull-right" ></span>
                            </div>
                            <p>{{$task->description}}</p>
                            <table class="p-10 table table-condensed" >
                                <tr class="info">
                                    <td>Assigned To:</td>
                                    <td class="aas">{{$task->ass_to}}</td>
                                </tr>
                                <tr>
                                    <td>Assigned By:</td>
                                    <td>{{$task->ass_by}}</td>
                                </tr>
                                <tr class="success">
                                    <td>Due Date:</td>
                                    <td class="d_date" >{{$task->due_date}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
                <div id="div4" data-id="3" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="d-heading">Done</div>
                    <?php
                    if(!empty($task_done)){foreach($task_done as $task){?>
                    <div class="tasks" draggable="true" ondragstart="drag(event)" id="{{$task->id}}" data-id="3">
                        <div class="t-heading"  data-toggle="collapse" href="#t{{$task->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            <?= !empty($task->task_name) ? $task->task_name : "Name Not Found" ; ?>
                        </div>
                        <div id="t{{$task->id}}" class="panel-collapse collapse">
                            <div class="col-md-12 p-10">
                                <span class="delete-modal fa fa-trash pull-right"></span>
                                <span class="edittask fa fa-pencil pull-right" ></span>
                            </div>
                            <p>{{$task->description}}</p>
                            <table class="p-10 table table-condensed" >
                                <tr class="info">
                                    <td>Assigned To:</td>
                                    <td class="aas">{{$task->ass_to}}</td>
                                </tr>
                                <tr>
                                    <td>Assigned By:</td>
                                    <td>{{$task->ass_by}}</td>
                                </tr>
                                <tr class="success">
                                    <td>Due Date:</td>
                                    <td class="d_date" >{{$task->due_date}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
    /*  for user-model Darage and Drop */
    #div1, #div2,#div3,#div4 ,#divs1, #divs2,#divs3,#divs4 {
        float: left;
        width: 350px;
        height: auto;
        min-height: 550px;
        margin: 10px;
        border: 2px solid #c8c7cc12;
        cursor: pointer;
        border-radius: 5px;
    }
    .d-heading , .d-heading {
        background-color: #80808017;
        padding: 10px;
        margin: 0px !important;
        color: #808080 !important;
        text-align: center;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
    }
    .t-heading , .t-headings {
        background-color: #f7f7f863;
        color: #333333e3;
        font-size: 16px;
        font-weight: 500;
        padding: 6px;
    }
    .tasks{
        margin: 8px;
        border: 2px solid #f7f7f8;
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
                <h4 class="modal-title" id="myModalLabel">Task</h4>

            </div>
            <div class="modal-body">

                <form id="addtask">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    Task Name <span class="symbol required"></span>
                                </label>

                                <input type="text" placeholder="Task Name" class="form-control" id="task_name" name="task_name" value="" required>
                                <input type="hidden" name="p_id" value="<?= !empty($projects->id) ? $projects->id :" " ?>" id="p_id">
                                <input type="hidden" name="ass_by" value="<?= !empty(Auth::user()->name) ? Auth::user()->name :Auth::user()->email ;?>" id="ass_by">
                                <input type="hidden" name="ass_by_id" value="{{ Auth::user()->id }}" id="ass_by_id">
                                <input type="hidden" value="" id="hidden_task_id" >
                                <input type="hidden" value="" id="status" name="status">

                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Task Due Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Due Date" class="form-control datepicker" id="due_date" name="due_date"
                                       value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Assigned To
                                </label>
                                <select required name="developer" class="js-example-placeholder-single js-country form-control" placeholder="Assigned To" id="developer">
                                    <?php foreach($employee as $devs){ ?>

                                    <option value="{{ $devs->id }}" data-title="{{ $devs->name }}"> {{ $devs->name }} </option>
                                    <?php } ?>
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
                                <textarea class="form-control autosize area-animated" name="description" id="description">
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-wide pull-right" type="submit" id="add_task">
                        Save <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </form>

                <div class="row">
                    <div class="col-md-12">
                        <hr class="costum-row">
                        <h4 class="activity"> Activity:-</h4>
                        <ul id="append_activity">

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
            var div    = ev.target.id;
            var status = $('#'+div).data('id');
            $.ajax({
                type: 'Post',
                url: '{!! url('change_task_status') !!}',
                data: {
                    'id':data,
                    'status':status,
                    '_token': $('input[name=_token]').val(),
                },
            });
        }
        // for single users
        function allowDrops(ev) {
            ev.preventDefault();
        }
        function drags(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }
        function drops(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            console.log(data);
            ev.target.appendChild(document.getElementById(data));
            var div    = ev.target.id;
            var status = $('#'+div).data('id');
            data = data.replace('single','');
            $.ajax({
                type: 'Post',
                url: '{!! url('change_task_status') !!}',
                data: {
                    'id':data,
                    'status':status,
                    '_token': $('input[name=_token]').val(),
                },
            });
        }
        // Add and Edit Task Using same function
        $(document).on('click','#add_new_task',function(){
            $('.add-task').modal('show');
            $('#append_activity').css('display:none');
            $("#addtask").trigger("reset");
            $('#append_activity').empty();
        })

        $("#addtask").on('submit',function (e) {   //add task using Ajax
            e.preventDefault();
            var formdata    = $("#addtask").serializeArray();
            var name        = $('#task_name').val();
            var p_id        = $('#project_id').val();
            var due_date    = $('#due_date').val();
            var developer   = $('#developer').val();
            var description = $('#description').val();
            var ass_to      = $("#developer option:selected").text();
            var ass_by      = $('#ass_by').val();
            var ass_id      = $('#ass_by_id').val();
            var task_id     = $('.add-task').find('#hidden_task_id').val();
            var urls        = " ";
            console.log('id'+task_id);
            if(task_id.length === 0){
                urls = '{{url('store')}}';

            }else{
                urls = '{{url('task/update')}}'+'/'+task_id;
            }
            $.ajax({
                type: 'POST',
                url:urls,
                data: formdata,
                success: function (last_id) {
                    if(last_id != null) {
                        $('.add-task').modal('hide');
                        if(task_id){  // when update task
                            $('#myTab2_example2').find("#"+task_id).replaceWith('<div class="tasks" draggable="true" ondragstart="drag(event)" id="' + last_id + '"><div class="t-heading"  data-toggle="collapse" href="#t' + last_id + '" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">' + name + '</div><div id="t' + last_id + '" class="panel-collapse collapse">'
                                +'<div class="col-md-12 p-10"><span class="delete-modal fa fa-trash pull-right"></span>'
                                +'<span class="edittask fa fa-pencil pull-right" ></span></span>'
                                +'</div><p>'+ description + '</p>'
                                +'<table class="p-10 table table-condensed" ><tr class="info"><td>Assigned To:</td><td>' + ass_to + '</td></tr>' +
                                '<tr><td>Assigned By:</td><td>' + ass_by + '</td></tr><tr class="success"><td>Due Date:</td><td>' + due_date + '</td></tr></table></div></div>');
                            $('#hidden_task_id').val('')
                        }else{
                            $('#div1 .d-heading').after('<div class="tasks" draggable="true" ondragstart="drag(event)" id="' + last_id + '"><div class="t-heading"  data-toggle="collapse" href="#t' + last_id + '" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">' + name + '</div><div id="t' + last_id + '" class="panel-collapse collapse">'
                                +'<div class="col-md-12 p-10"><span class="delete-modal fa fa-trash pull-right"></span>'
                                +'<span class="edittask fa fa-pencil pull-right" ></span></span>'
                                +'</div><p>'+ description + '</p>'
                            +'<table class="p-10 table table-condensed" ><tr class="info"><td>Assigned To:</td><td>' + ass_to + '</td></tr>' +
                            '<tr><td>Assigned By:</td><td>' + ass_by + '</td></tr><tr class="success"><td>Due Date:</td><td>' + due_date + '</td></tr></table></div></div>');
                            $('#hidden_task_id').val('');
                        }
                    }
                },
            });
        });
        //Edit Task
        $(document).on('click','.edittask',function(){
            $('.add-task').modal('show');
            var t_id     =  $(this).closest('.tasks').prop('id');
            var status   =  $(this).closest('div[data-id]').data('id');
            var name     =  $(this).closest('.tasks').children('.t-heading').text();
            var ass_to   =  $(this).closest('.p-10').nextAll('.table').find(".info td:nth-child(2)").text();
            var d_date   =  $(this).closest('.p-10').nextAll('.table').find(".success td:nth-child(2)").text();
            var des      =  $(this).closest('.p-10').next('p').text();
            $('#task_name').val(name);
            $('.add-task').find('#hidden_task_id').val(t_id);
            $('.add-task').find('#status').val(status);
            $('#due_date').val(d_date);
            $('#description').val(des);
            $("#developer option:selected").find(ass_to);
            $('select[name="developer"]').find('option[data-title='+ass_to+']').attr("selected",true).trigger("change");
            $.ajax({
                type: 'post',
                url: '{{url('get_activities')}}'+'/'+ t_id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    $('#append_activity').empty();
                    $.each(data,function(){
                        var user_name  =  this['user_name'];
                        var activity   =  this['activity'];
                        var updated_at =  this['updated_at'];
                        $('#append_activity').append('<li><h5>'+user_name+'</h5>'+activity+'</li><li>'+updated_at+'</li>');
                    });
                 }
            });
        })
        // Delete TAsk
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('.heading_text').text('Are you sure you want to Delete the following Task?');
            $('.custom-button').text('Delete');
            $('.custom-button').addClass('delete');
            $('#id_delete').val($(this).closest('.tasks').prop('id'));
            $('#name').val($(this).closest('.tasks').children('.t-heading').text());
            $('#deleteModal').modal('show');
            $('.skills_hide').hide();
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: '{{url('task_delete')}}'+'/'+ id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                        $('#'+id).hide();
                        toastr.success('Successfully deleted Tsks!', 'Success Alert', {timeOut: 3000});
                    $('.custom-button').removeClass('delete');
                }
            });
        });
        $(document).on("click",'.dev-model',function() {
            var dev_id =$(this).data('id');
            console.log(dev_id);
            console.log('#userid'+dev_id);
            $('#userid'+dev_id).modal('show');


        });
        $(document).on("click",'.close',function() {
             $('#hidden_task_id').val('');
        });
    </script>
@stop
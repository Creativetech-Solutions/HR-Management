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
                            <div class="developer">
                                <div class="" data-placement="bottom" data-toggle="tooltip"  data-original-title="Click on the name to view Details">
                                    <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                    <h6 class=" dev-model no-margin inline-block padding-15 panel-title" data-id="<?= $projects_man->id ?>"><?= substr($projects_man->first_name . " " . $projects_man->last_name, 0, 16) ;  ?></h6>
                                    <div class="pull-right padding-15">
                                        <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                    </div>
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
                                       <div data-placement="bottom" data-toggle="tooltip"  data-original-title="Click on the name to view Details">
                                            <img width="50" height="50" src="{!! asset('assets/images/avatar-1.jpg') !!}" class="img-circle pull-left" alt="">
                                            <h6 class=" dev-model no-margin inline-block padding-15 panel-title" id="" data-id="{{$dev->id}}"><?= substr($dev->first_name . " " . $dev->last_name, 0, 16) ;  ?></h6>
                                            <div class="pull-right padding-15">
                                                <span class="text-small text-bold text-green"><i class="fa fa-dot-circle-o"></i> on-line</span>
                                            </div>
                                       </div><hr>




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
                                                              <div id="divs1"  data-id="0" ondrop="drops(event)" ondragover="allowDrops(event)" class="blog-parent-single">
                                                                    <div class="d-heading">To Do</div>
                                                                    <?php
                                                                    if(!empty($task_todos[$dev->id]))
                                                                    {
                                                                    foreach($task_todos[$dev->id] as $dev_tasks)
                                                                    { ?>
                                                                    <div class="tasks edittaskmodel" draggable="true" ondragstart="drags(event)" id="single{{$dev_tasks->id}}" data-id="0">
                                                                        <div class="t-heading"  data-toggle="collapse" href="#ts{{$dev_tasks->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                                            <?= !empty($dev_tasks->task_name) ? $dev_tasks->task_name : "Name Not Found" ; ?>
                                                                        </div>
                                                                        <div id="ts{{$dev_tasks->id}}" class="panel-collapse collapse">
                                                                            <div class="col-md-12 p-10">
                                                                                <span class="delete-modal fa fa-trash pull-right"></span>
                                                                                <span class="edittask pull-right" id="singleedit" ></span>
                                                                            </div>
                                                                            <p class="task-p">{{$dev_tasks->description}}</p>
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
                                                                <div id="divs2" data-id="1"  ondrop="drops(event)" ondragover="allowDrops(event)" class="blog-parent-single">
                                                                    <div class="d-heading">Doing</div>
                                                                    <?php
                                                                    if(!empty($task_doings[$dev->id])){foreach($task_doings[$dev->id] as $dev_tasks){?>
                                                                    <div class="tasks edittaskmodel" draggable="true" ondragstart="drags(event)" id="single{{$dev_tasks->id}}" data-id="1">
                                                                        <div class="t-heading"  data-toggle="collapse" href="#ts{{$dev_tasks->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                                            <?= !empty($dev_tasks->task_name) ? $dev_tasks->task_name : "Name Not Found" ; ?>
                                                                        </div>
                                                                        <div id="ts{{$dev_tasks->id}}" class="panel-collapse collapse">
                                                                            <div class="col-md-12 p-10">
                                                                                <span class="delete-modal fa fa-trash pull-right"></span>
                                                                                <span class="edittask  pull-right" id="singleedit" ></span>
                                                                            </div>
                                                                            <p class="task-p">{{$dev_tasks->description}}</p>
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
                                                                <div id="divs3" data-id="2"  ondrop="drops(event)" ondragover="allowDrops(event)" class="blog-parent-single">
                                                                    <div class="d-heading">Review</div>
                                                                    <?php
                                                                    if(!empty($task_reviews[$dev->id])){foreach($task_reviews[$dev->id] as $dev_tasks){?>
                                                                    <div class="tasks edittaskmodel" draggable="true" ondragstart="drags(event)" id="single{{$dev_tasks->id}}" data-id="2">
                                                                        <div class="t-heading"  data-toggle="collapse" href="#ts{{$dev_tasks->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                                            <?= !empty($dev_tasks->task_name) ? $dev_tasks->task_name : "Name Not Found" ; ?>
                                                                        </div>
                                                                        <div id="ts{{$dev_tasks->id}}" class="panel-collapse collapse">
                                                                            <div class="col-md-12 p-10">
                                                                                <span class="delete-modal fa fa-trash pull-right"></span>
                                                                                <span class="edittask  pull-right" id="singleedit" ></span>
                                                                            </div>
                                                                            <p class="task-p">{{$dev_tasks->description}}</p>
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
                                                                <div id="divs4" data-id="3" ondrop="drops(event)" ondragover="allowDrops(event)" class="blog-parent-single">
                                                                    <div class="d-heading">Done</div>
                                                                    <?php
                                                                    if(!empty($task_dones[$dev->id])){foreach($task_dones[$dev->id] as $dev_tasks){?>
                                                                    <div class="tasks edittaskmodel" draggable="true" ondragstart="drags(event)" id="single{{$dev_tasks->id}}" data-id="3">
                                                                        <div class="t-heading"  data-toggle="collapse" href="#ts{{$dev_tasks->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                                            <?= !empty($dev_tasks->task_name) ? $dev_tasks->task_name : "Name Not Found" ; ?>
                                                                        </div>
                                                                        <div id="ts{{$dev_tasks->id}}" class="panel-collapse collapse">
                                                                            <div class="col-md-12 p-10">
                                                                                <span class="delete-modal fa fa-trash pull-right"></span>
                                                                                <span class="edittask  pull-right" id="singleedit" ></span>
                                                                            </div>
                                                                            <p class="task-p">{{$dev_tasks->description}}</p>
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
                                                <p role="button" data-toggle="collapse" href="#r<?=$task->id ?>" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                    {{$task->task_name}}
                                                </p>
                                            </div>
                                            <div id="r<?=$task->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                                <div class="panel-body">
                                                    {{$task->description}}
                                                    <br>
                                                    <br>
                                                    <span class="btn btn-xs btn-success">{{$task->ass_to}} </span>
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

                                         <?php

                                         if(!empty(count($milestones) > 0)){
                                               foreach($milestones as $milestone){ ?>
                                                    <li class="timeline-item success">
                                                         <div class="margin-left-15">
                                                             <div class="text-muted text-small">
                                                                 {{$milestone->updated_at}}
                                                             </div>
                                                             <p role="button" data-toggle="collapse" href="#collapse{{$milestone->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                                                                 {{$milestone->title}}
                                                             </p>
                                                         </div>
                                                        <div id="collapse{{$milestone->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                                            <div class="panel-body">
                                                                {{$milestone->description}}
                                                                <br>
                                                                <br>
                                                               <?php
                                                                    if(!empty($m_tasks[$milestone->id])){
                                                                        foreach($m_tasks[$milestone->id] as $m_task){ ?>
                                                                <span class=" btn btn-xs btn-success">  {{$m_task->name}} </span>
                                                               <?php } }?>
                                                                <a data-id="{{$milestone->id}}" class="milestoneview  pull-right success">View Detail</a><span class="editmilestone  mr-10 primary pull-right glyphicon glyphicon-edit " data-toggle="modal" data-target=".add-milestone"></span>
                                                           </div>
                                                            <hr>
                                                        </div>
                                                    </li>

                                         <?php  }}else{?>

                                                   <li class="timeline-item danger"><h5 class="p-10">No Data Available! </h5></li>
                                     <?php } ?>
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
                <div id="div1"  data-id="0" ondrop="drop(event)" ondragover="allowDrop(event)" class="blog-parent">
                    <div class="d-heading">To Do <input  draggable="false" type="button" class="btn btn-xs btn-primary pull-right margin-3" value="Add New" data-toggle="modal" data-target=".add-task" id="add_new_task"></div>
                    <?php
                    if(!empty($task_todo))
                    {foreach($task_todo as $task){?>
                    <div class="tasks edittaskmodel" draggable="true" ondragstart="drag(event)" id="{{$task->id}}" data-id="0">
                        <div class="t-heading"  data-toggle="collapse" href="#t{{$task->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            <?= !empty($task->task_name) ? $task->task_name : "Name Not Found" ; ?>
                        </div>
                        <div id="t{{$task->id}}" class="panel-collapse collapse">
                            <div class="col-md-12 p-10">
                                <span class="delete-modal fa fa-trash pull-right"></span>
                                <span class="edittask  pull-right" ></span>
                            </div>
                            <p class="task-p">{{$task->description}}</p>
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

                <div id="div2" data-id="1"  ondrop="drop(event)" ondragover="allowDrop(event)" class="blog-parent">
                    <div class="d-heading">Doing</div>
                    <?php
                    if(!empty($task_doing)){foreach($task_doing as $task){?>
                    <div class="tasks edittaskmodel" draggable="true" ondragstart="drag(event)" id="{{$task->id}}" data-id="1">
                        <div class="t-heading"  data-toggle="collapse" href="#t{{$task->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            <?= !empty($task->task_name) ? $task->task_name : "Name Not Found" ; ?>
                        </div>
                        <div id="t{{$task->id}}" class="panel-collapse collapse">
                            <div class="col-md-12 p-10">
                                <span class="delete-modal fa fa-trash pull-right"></span>
                                <span class="edittask  pull-right" ></span>
                            </div>
                            <p class="task-p">{{$task->description}}</p>
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

                <div id="div3" data-id="2"  ondrop="drop(event)" ondragover="allowDrop(event)" class="blog-parent">
                    <div class="d-heading">Review</div>
                    <?php
                    if(!empty($task_review)){foreach($task_review as $task){?>
                    <div class="tasks edittaskmodel" draggable="true" ondragstart="drag(event)" id="{{$task->id}}" data-id="2">
                        <div class="t-heading"  data-toggle="collapse" href="#t{{$task->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            <?= !empty($task->task_name) ? $task->task_name : "Name Not Found" ; ?>
                        </div>
                        <div id="t{{$task->id}}" class="panel-collapse collapse">
                            <div class="col-md-12 p-10">
                                <span class="delete-modal fa fa-trash pull-right"></span>
                                <span class="edittask  pull-right" ></span>
                            </div>
                            <p class="task-p">{{$task->description}}</p>
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
                <div id="div4" data-id="3" ondrop="drop(event)" ondragover="allowDrop(event)" class="blog-parent">
                    <div class="d-heading">Done</div>
                    <?php
                    if(!empty($task_done)){foreach($task_done as $task){?>
                    <div class="tasks edittaskmodel" draggable="true" ondragstart="drag(event)" id="{{$task->id}}" data-id="3">
                        <div class="t-heading"  data-toggle="collapse" href="#t{{$task->id}}" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">
                            <?= !empty($task->task_name) ? $task->task_name : "Name Not Found" ; ?>
                        </div>
                        <div id="t{{$task->id}}" class="panel-collapse collapse">
                            <div class="col-md-12 p-10">
                                <span class="delete-modal fa fa-trash pull-right"></span>
                                <span class="edittask  pull-right" ></span>
                            </div>
                            <p class="task-p">{{$task->description}}</p>
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

<!-- Milestones Details Model  -->
<div class="modal fade milestone bs-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-md">
        <div class="modal-content milestone-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="m-title modal-title " id="myModalLabel">Name Not Found</h4>
            </div>
            <div class="modal-body">
                <p class="description"> Descriptions Not Found </p>

                <hr>
                <h4 class="modal-title" id="myModalLabel">Milestone Details</h4>
                <table class="table-full-width table">
                    <tr>
                        <td> Start Date </td>
                        <td class="start_date"> Not Found</td>
                    </tr>
                    <tr>
                        <td>End Date  </td>
                        <td class="due_date"> Not Found</td>
                    </tr>
                   <tr>
                        <td>Payment Status  </td>
                        <td class="payment_status">  </td>
                    </tr>
                    <tr>
                        <td>Milestone Status </td>
                        <td class="mile_status"></td>
                    </tr>
                    <tr>
                        <td>Budget</td>
                        <td class="budget">Not Found </td>
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
<div class="add-task modal fade bs-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="">

    <div class="modal-dialog modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Task</h4>
                <input type="hidden" id="h_task_id" value="">

            </div>
            <div class="modal-body">
                <div class="tabbable tabs-right">
                    <ul id="myTab5" class="nav nav-tabs">

                        <li class="active">
                            <a href="#myTab5_example1" data-toggle="tab">
                                View Details
                            </a>
                        </li>
                        <li class="">
                            <a href="#myTab5_example2" data-toggle="tab" aria-expanded="true">
                                Edit
                            </a>
                        </li>

                        <li class="" id="attachments">
                            <a href="#myTab5Attachment" data-toggle="tab">
                                Attachment
                            </a>
                        </li>
                        <li class="">
                            <a href="#myTab5Review" data-toggle="tab">
                                Add Review
                            </a>
                        </li>
                        <li class="">
                            <a href="#myTab5_example3" data-toggle="tab">
                                Activity Log
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="right-tab view_task_details  tab-pane fade in active" id="myTab5_example1">
                            <p class="t_description"></p>
                            <table class="p-10 table table-condensed" >
                                <tr class="info">
                                    <td>Assigned To:</td>
                                    <td class="aas"></td>
                                </tr>
                                <tr>
                                    <td>Assigned By:</td>
                                    <td></td>
                                </tr>
                                <tr class="success">
                                    <td>Due Date:</td>
                                    <td class="d_date" ></td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="activity mt-20"> Attachments:- </h4>
                                    <div class="fileinputappend"></div>
                                    <hr>
                                    <h4 class="activity mt-20"> Reviews:- </h4>
                                    <hr>
                                    <ul id="append_reviews">

                                    </ul>
                                </div>
                            </div>


                        </div>
                        <div class="right-tab tab-pane fade" id="myTab5_example2">
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
                                            <input type="hidden"   value="" id="is_single_user_task">
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
                        </div>
                        <div class="right-tab tab-pane fade" id="myTab5_example3">
                            <div class="row">
                                <div class="col-md-12">

                                    <h4 class="activity mt-20"> Activity:- </h4>
                                    <ul id="append_activity">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="right-tab tab-pane fade" id="myTab5Attachment">
                            <div class="row">
                                <div class="col-md-12 ">

                                    <h4 class="activity mt-20">Attachments:- </h4>
                                    <div class="fileinputappend"></div>
                                    <form enctype="multipart/form-data" id="uploadimage">


                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                        </div>


                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" id="task_id" name="task_id" value="" >
                                        <div class="form-group">
                                            <label>Add New File:</label>
                                            <input type="file" name="attachment" class="form-control" id="uploadfile">
                                        </div>


                                        <div class="form-group">
                                            <button class="btn btn-success upload-image" type="submit">Upload Image</button>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="right-tab tab-pane fade" id="myTab5Review">
                            <div class="row">
                                <div class="col-md-12">

                                    <h4 class="activity mt-20">Add Review:- </h4>
                                    <form id="review">
                                        {{ csrf_field() }}
                                        <textarea class="form-control" name="review"></textarea>
                                        <button class="btn btn-sm mt-10 pull-right btn-success ">Submit</button>
                                    </form>

                                </div>
                            </div>
                        </div>
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


                <form id="addmilestone">
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
                                <input type="text"  required placeholder="Milestone Name" class="form-control" id="title" name="title" value="<?php if(!empty($milestones->title)){echo  $milestones->title; }?>"
                                >
                                {{-- use for edit case to check project name --}}
                                <input type="hidden" name="hidden_milestone_id" value="<?= !empty($milestones->id) ? $milestones->id :" " ?>" id="hidden_project_id">
                                <input type="hidden" name="pro_id" value="{{ $projects->id }}" id="pro_id">
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
                            <div class="form-group">
                                <label>
                                    Select Tasks
                                </label>
                                <select multiple="" name="tasks[]" class="js-example-basic-multiple js-states form-control">
                                    <?php
                                    $tasks_ids = !empty($tasks->id) ?  $tasks->id: " ";
                                    if(!empty($tasks)){
                                    foreach ($tasks as $tasks_name) { ?>
                                    <option value="<?= $tasks_name->id ?>"<?php // if( in_array( $skill->id ,explode(",",$tasks_name))){ echo "selected"; }?>> <?= $tasks_name->task_name ?></option>
                                    <?php }}
                                    ?>
                                </select>
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
                    <div class="row">

                        <div class="col-md-12">
                            <button class="btn btn-primary btn-wide pull-right" type="submit">
                                Submit <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </div>

                </form>


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
        function allowDrop(ev) {
            ev.preventDefault();
        }
        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }
        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            if($(ev.target).hasClass('.blog-parent')){
                ev.target.appendChild(document.getElementById(data));
                var div    = ev.target.id;
             }
            else {
                ev.target.closest(".blog-parent").appendChild(document.getElementById(data));
                var div = ev.target.closest(".blog-parent").id;
                console.log('else'+ div);
            }
            var status = $('#'+div).data('id');
            $.ajax({
                type: 'Post',
                url: '{!! url('change_task_status') !!}',
                data: {
                    'id':data,
                    'status':status,
                    '_token': $('input[name=_token]').val(),
                },
                success:function(data){
                    if(data == true){
                        toastr.success('Task Moved Successfully!','Success Alert',{timeout:3000});
                    }else{
                        toastr.error('Some Thing Happend Wrong!','Warning Alert',{timeout:3000});
                    }

                }
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
            if($(ev.target).hasClass('.blog-parent-single')){
                ev.target.appendChild(document.getElementById(data));
                var div    = ev.target.id;
            }
            else {
                ev.target.closest(".blog-parent-single").appendChild(document.getElementById(data));
                var div = ev.target.closest(".blog-parent-single").id;
            }
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
                success:function(data){
                    if(data == true){
                        toastr.success('Task Moved SuccessFully!','Success Alert',{timeout:3000});
                    }else{
                        toastr.error('Some Thing Happend Wrong!','Warning Alert',{timeout:3000});
                    }
                }
            });
        }
        // Add and Edit Task Using same function
        $(document).on('click','#add_new_task',function(){
            $('.add-task').modal('show');
            $('#append_activity').css('display:none');
            $("#addtask").trigger("reset");
            $('#append_activity').empty();
            $('.t_description').empty();
            $('.add-task').find('.modal-title').text('Add New Task');
            $('.add-task').find('#myTab5').hide();
        })
        $(document).on('click','#add_new_task',function(){  // show default form
            $('.add-task').find('#myTab5').children('li').not("li:nth-child(2)").removeClass('active');
            $('.add-task').find('#myTab5').children( "li:nth-child(2)" ).addClass('active');
            $('.add-task').find('div').not('#myTab5_example2').removeClass('in active');
            $('.add-task').find('#myTab5_example2').addClass('in active');
        });
        $(document).on('click','.edittaskmodel',function(){  // show default details
            $('.add-task').find('#myTab5').children('li').not("li:nth-child(1)").removeClass('active');
            $('.add-task').find('#myTab5').children( "li:nth-child(1)" ).addClass('active');
            $('.add-task').find('div').not('#myTab5_example1').removeClass('in active');
            $('.add-task').find('#myTab5_example1').addClass('in active');
        });
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
            var check       = $('.add-task').find('#is_single_user_task').val();

            var urls        = " ";
            if(task_id.length === 0){
                urls = '{{url('store')}}';
            }else{
                urls = '{{url('task/update')}}'+'/'+task_id;
            }
            if(check == 1){
                $.ajax({
                    type: 'POST',
                    url:urls,
                    data: formdata,
                    success: function (last_id) {
                        if(last_id != null) {
                            $('.add-task').modal('hide');
                            if(task_id){  // when update task
                                $('.user-model').find("#single"+task_id).replaceWith('<div class="tasks edittaskmodel" draggable="true" ondragstart="drags(event)" id="single'+last_id + '"><div class="t-heading "  data-toggle="collapse" href="#ts' + last_id + '" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">' + name + '</div><div id="ts' + last_id + '" class="panel-collapse collapse">'
                                    +'<div class="col-md-12 p-10"><span class="delete-modal fa fa-trash pull-right"></span>'
                                    +'<span class="edittask  pull-right" id="singleedit" ></span></span>'
                                    +'</div><p class="task-p">'+ description + '</p>'
                                    +'<table class="p-10 table table-condensed" ><tr class="info"><td>Assigned To:</td><td>' + ass_to + '</td></tr>' +
                                    '<tr><td>Assigned By:</td><td>' + ass_by + '</td></tr><tr class="success"><td>Due Date:</td><td>' + due_date + '</td></tr></table></div></div>');
                                $('#hidden_task_id').val('')
                            }else{

                            }
                        }
                    },
                });

            }else{
                $.ajax({
                    type: 'POST',
                    url:urls,
                    data: formdata,
                    success: function (last_id) {
                        if(last_id != null) {
                            $('.add-task').modal('hide');
                            if(task_id){  // when update task
                                $('#myTab2_example2').find("#"+task_id).replaceWith('<div class="tasks" draggable="true" ondragstart="drag(event)" id="' + last_id + '"><div class="t-heading edittask"  data-toggle="collapse" href="#t' + last_id + '" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">' + name + '</div><div id="t' + last_id + '" class="panel-collapse collapse">'
                                    +'<div class="col-md-12 p-10"><span class="delete-modal fa fa-trash pull-right"></span>'
                                    +'<span class=" fa fa-pencil pull-right" ></span></span>'
                                    +'</div><p class="task-p">'+ description + '</p>'
                                    +'<table class="p-10 table table-condensed" ><tr class="info"><td>Assigned To:</td><td>' + ass_to + '</td></tr>' +
                                    '<tr><td>Assigned By:</td><td>' + ass_by + '</td></tr><tr class="success"><td>Due Date:</td><td>' + due_date + '</td></tr></table></div></div>');
                                $('#hidden_task_id').val('')
                            }else{
                                $('#div1 .d-heading').after('<div class="tasks edittaskmodel" draggable="true" ondragstart="drag(event)" id="' + last_id + '"><div class="t-heading"  data-toggle="collapse" href="#t' + last_id + '" aria-expanded="true" aria-controls="collapse1" class="trigger collapsed">' + name + '</div><div id="t' + last_id + '" class="panel-collapse collapse">'
                                    +'<div class="col-md-12 p-10"><span class="delete-modal fa fa-trash pull-right"></span>'
                                    +'<span class="edittask  pull-right" ></span></span>'
                                    +'</div><p class="task-p">'+ description + '</p>'
                                    +'<table class="p-10 table table-condensed" ><tr class="info"><td>Assigned To:</td><td>' + ass_to + '</td></tr>' +
                                    '<tr><td>Assigned By:</td><td>' + ass_by + '</td></tr><tr class="success"><td>Due Date:</td><td>' + due_date + '</td></tr></table></div></div>');
                                $('#hidden_task_id').val('');
                            }
                        }
                    },
                });
            }

        });
        //Edit Task
        $(document).on('click','.edittaskmodel',function(){
            $('.add-task').modal('show');
            $('.add-task').find('#myTab5').show();
            var t_id     =  $(this).closest('.tasks').prop('id');
            t_id         =  t_id.replace('single','');
            $('.add-task').find("#h_task_id").val(t_id);
            var status   =  $(this).closest('div[data-id]').data('id');
            var name     =  $(this).closest('.tasks').children('.t-heading').text();
            var ass_to   =  $(this).find(".info td:nth-child(2)").text();
            var d_date   =  $(this).find(".success td:nth-child(2)").text();
            var ass_by   =  $(this).find("tbody tr:nth-child(2) td:nth-child(2)").text();
            var des      =  $(this).find('.task-p').text();
            $('.fileinputappend').empty();
            getattachedfiles(t_id);



            $('#uploadimage').find('#task_id').val(t_id);
            $('.add-task').find('.modal-title').text(name);
            $('.add-task').find('#hidden_task_id').val(t_id);

            $('.view_task_details').find('.t_description').text(des);
            $('.view_task_details').find(".info td:nth-child(2)").text(ass_to);
            $('.view_task_details').find(".success td:nth-child(2)").text(d_date);
            $('.view_task_details').find("tr:nth-child(2) td:nth-child(2)").text(ass_by);


            $('#task_name').val($.trim(name));
            $('.add-task').find('#hidden_task_id').val(t_id);
            $('.add-task').find('#status').val(status);
            $('#due_date').val(d_date);
            $('#description').val($.trim(des));
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
            $.ajax({
                type: 'post',
                url: '{{url('get_reviews')}}'+'/'+ t_id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    $('#append_reviews').empty();
                    $.each(data,function(){
                        var user_name  =  (this['name']== '') ? this['email']: this['name'];
                        var activity   =  this['review'];
                        var updated_at =  this['updated_at'];
                        $('#append_reviews').append('<li><h5>'+user_name+'</h5>'+activity+'</li><li>'+updated_at+'</li>');
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
            $('.change_name').val($(this).closest('.tasks').children('.t-heading').text());
            $('#deleteModal').modal('show');
            $('.skills_hide').hide();
            id = $('#id_delete').val();
            id = id.replace('single','');
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
                        $('#single'+id).hide();
                        toastr.success('Successfully deleted Tsks!', 'Success Alert', {timeOut: 3000});
                    $('.custom-button').removeClass('delete');
                }
            });
        });
        $(document).on("click",'.dev-model',function() {
            var dev_id =$(this).data('id');
            $('#userid'+dev_id).modal('show');


        });
        $(document).on("click",'.close',function() {
             $('#hidden_task_id').val('');
        });
        $(document).on("click",'#singleedit',function() {
             $('#is_single_user_task').val('1');
        });

        //add  Mile  Stone Code Start
         $("#addmilestone").on('submit',function(e){
             e.preventDefault();
             var form_data = $("#addmilestone").serializeArray();
             $.ajax({
                 type :'POST',
                 url: '{!! url('add_mile_stone') !!}',
                 data: form_data,
                 success:function(data){
                     if(data){
                         $('.add-milestone').modal('hide');
                         toastr.success('Successfully Added MileStone!','Success Alert',{timeOut:3000});
                     }
                 }
             });
         });
         //view  Mile  Stone Code Start
         $(document).on('click','.milestoneview',function(){
             var id = $(this).data('id');
             $.ajax({
                 type :'POST',
                 url: '{!! url('view_mile_stone_data') !!}',
                 data: {
                     'id': id,
                     '_token': $('input[name=_token]').val(),
                 },
                 success:function(data){
                     if(data){
                         $('.milestone').modal('show');
                         $('.milestone-content').find('.m-title').text(data['title']);
                         $('.milestone-content').find('.description').text(data['description']);
                         $('.milestone-content').find('.start_date').text(data['start_date']);
                         $('.milestone-content').find('.due_date').text(data['due_date']);
                         $('.milestone-content').find('.budget').text(data['budget']);
                         var payment_status =  data['payment_status'];
                         if(payment_status == 1){
                             $('.milestone-content').find('.payment_status').append('<span class="btn btn-xs btn-danger">Pending</span>');
                         }else if(payment_status == 2){
                             $('.milestone-content').find('.payment_status').append('<span class="btn btn-xs btn-info">Incomplete</span>');
                         }else if(payment_status == 3){
                             $('.milestone-content').find('.payment_status').append('<span class="btn btn-xs btn-success">Paid</span>');
                         }
                         var mile_status =  data['mile_status'];
                        // if(mile_status == 1){  calculate completed on the basis of assigned task
                             $('.milestone-content').find('.mile_status').append('<span class="btn btn-xs btn-success">33% Completed</span>');
                        // }
                     }
                 }
             });
         });
        // End Mile  Stone Code
        $(document).on("submit","#review",function(e){
            e.preventDefault();
            var t_id     =  $('.add-task').find("#h_task_id").val();
            $(this).append('<input type="hidden" name="t_id" value='+ t_id + '>');
            var form_data = $("#review").serializeArray();
            $.ajax({
                type :'POST',
                url: '{!! url('store_review') !!}',
                data: form_data,
                success:function(data){
                    if(data){
                        $("#review").find('textarea').val('');
                        toastr.success('Review Successfully added!','Success Alert',{timeOut:3000});

                    }
                }
            });
        });
        $("#uploadimage").submit(function(){

            var form = $('#uploadimage')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            $.ajax({
                url : '{!! url('upload_files') !!}',
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data['success']){
                        $("#uploadfile").val("");
                        $('.fileinputappend').empty();
                        var t_id = $(".add-task").find("#h_task_id").val();
                        getattachedfiles(t_id);
                        toastr.success('File Uploaded Successfully',"Success Alert",{timeOut:3000});
                    }else{
                        toastr.error('Please Upload only jpeg,png,jpg,gif,doc,pdf,docx,zip,svg files',"Warning Alert",{timeOut:4000});
                    }
                },
            });
            return false;
        });
        $(document).on('click','#attachments',function(e){
            e.preventDefault();
            $('.fileinputappend').empty();
            var t_id = $(".add-task").find("#h_task_id").val();
            getattachedfiles(t_id);
        });
        function getattachedfiles(t_id){
            var id = t_id;
                $.ajax({
                type:'POST',
                url:  '{!! url('get_task_attachmetns') !!}',
                data:{'id':id,'_token': $('input[name=_token]').val(),},
                success:function(data){
                    $.each(data,function(){
                        var src = (this['attachment']) ? this['attachment'] : "";
                        var path = "{{ URL::asset('images')}}";
                        var extension = src.substring(src.lastIndexOf('.')+1);
                        switch(extension){
                            case 'txt':
                                var paths = path +'/'+'txt.png';
                                break;
                            case 'zip':
                                var paths = path +'/'+'zip.jpg';
                                break;
                            case 'doc':
                                var paths = path +'/'+'doc.png';
                                break;
                            case 'pdf':
                                var paths = path +'/'+'pdf.png';
                                break;
                            case 'docx':
                                var paths = path +'/'+'doc.png';
                                break;
                            default:
                                var paths = path +'/'+src;
                        }
                        $('.fileinputappend').append('<div class="fileinput fileinput-new" data-provides="fileinput"><div class="user-image">'
                            +'<div class="fileinput-new thumbnail"><img src="'+paths+'" alt="" data-src="'+src+'"></div>'
                            +'<div class="fileinput-preview fileinput-exists thumbnail"></div>'
                            +'<div class="user-image-buttons">'
                            +'<span class="btn btn-xs btn-danger remove_file" data-id="'+ this['id']+ '"><i class="fa fa-close"></i></span>'
                            +'<a href="'+path+'/'+src+'" download><span class="btn btn-xs btn-success"><i class="fa fa-arrow-down"></i></span></a>'
                            +'</div><div class="img-text">'+src.slice(-15)+'</div></div></div>');
                    });
                }
            });
        }
        $(document).on('click','.remove_file',function(e){  // Remove Uploeded File
            e.preventDefault();
            var af_id = $(this).data('id');
            var img_src = $(this).parents('.user-image').find('img').data('src');
            $.ajax({
                type:'DELETE',
                url:'{!! url('remove_task_file') !!}',
                data:{'id':af_id,'img_src':img_src,'_token': $('input[name=_token]').val(),},
                success:function(data){
                   if(data){
                       $('.fileinputappend').empty();
                       var t_id = $(".add-task").find("#h_task_id").val();
                       getattachedfiles(t_id);
                       toastr.success('File Removed Successfully!','Success Alert!',{timeOut:3000});
                   }else{
                       toastr.error('Something Hapened Wrong Please Try Again!','Success Alert!',{timeOut:3000});
                   }
                }
            });
        });
    </script>
@stop
@extends('layout.layout')
@section('content')
    @parent
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $title; ?></h2>
                <hr>

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
                                {{-- use for edit case to check project name --}}
                                <input type="hidden" name="hidden_project_id" value="<?= !empty($projects->id) ? $projects->id :" " ?>" id="hidden_project_id">

                            </div>
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

                            <div class="form-group">
                                <label>
                                    Task Status
                                </label>
                                <select   name="status" class="js-example-placeholder-single  form-control" placeholder="Slect Project Status">
                                    <option value="1"<?php if(isset($projects->status) && $projects->status == 1 ){echo "selected";}?> >Active</option>
                                    <option value="2"<?php if(isset($projects->status) && $projects->status == 2 ){echo "selected";}?> > Onhold</option>
                                    <option value="3"<?php if(isset($projects->status) && $projects->status == 3 ){echo "selected";}?> > Completed</option>
                                    <option value="4"<?php if(isset($projects->status) && $projects->status == 4 ){echo "selected";}?> > Drop</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Task Start Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Project Start Date" class="form-control datepicker" id="start_date" name="start_date"
                                       value="<?= !empty($projects->start_date) ? $projects->start_date : " " ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                  Select Project
                                </label>
                                <select  name="project_id" class="js-example-placeholder-single js-country form-control" placeholder="Slect Project">
                                    <?php if($employee){
                                    foreach($employee as $employees){?>
                                    <option value="<?= $employees->id ?>" <?php if(isset($projects->name) && $projects->id == $employees->id ){ echo "Selected";}?>>
                                        <?= $employees->name ?></option>
                                    <?php }}?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>
                                    Assigned By
                                </label>
                                 <select  name="assigned_by" class="js-example-placeholder-single   form-control" placeholder="Assigned by">
                                   <?php if($employee){
                                       foreach($employee as $employees){?>
                                           <option value="<?= $employees->id ?>" <?php if(isset($projects->project_manager) && $projects->project_manager == $employees->id ){ echo "Selected";}?>>
                                               <?= $employees->name ?></option>
                                   <?php }}?>
                                 </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                     Assigned Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Task End Date" class="form-control datepicker" id="due_date" name="due_date"
                                      value="<?= !empty($projects->due_date) ? $projects->due_date : " " ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Task Due Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Assigned Date" class="form-control datepicker" id="assigned_date" name="assigned_date"
                                       value="<?= !empty($projects->assigned_date) ? $projects->assigned_date : " " ?>">
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
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add files...</span>
													<input type="file" name="images[]" multiple>
												</span>
                                    <!-- The loading indicator is shown during file processing -->
                                    <span class="fileupload-loading"></span>

                                </div>

                            </div>

                        </div>
                    </div>
                    <button class="btn btn-primary btn-wide pull-right" type="submit" id="name_id">
                        Submit <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>


@stop
@section('script')
    @parent
<script>

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

@extends('layout.layout')
@section('content')
@parent
 <h2><?= $title; ?></h2>
<hr>
<form id="form3" method="POST" action="{{url($action_url)}}" role="form" >
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
                <label>
                    Select Project
                </label>
                <select  name="project_id" class="js-example-basic-single form-control" placeholder="Select Project">
                    <option></option>
                    <?php
                    if(!empty($project)){
                    foreach ($project as $projects) { ?>
                    <option value="<?= $projects->id ?>" <?php if(isset($milestones->project_id) && $projects->id == $milestones->project_id){echo "Selected";}?>> <?= $projects->project_name ?></option>
                        <?php }}
                        ?>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Milestone Status
                </label>
                <select   name="mile_status" class="js-example-basic-single  form-control" placeholder="Select Milestone Status">
                    <option></option>
                    <option value="1"<?php if(isset($milestones->mile_status) && $milestones->mile_status == 1 ){echo "selected";}?> >Active</option>
                    <option value="2"<?php if(isset($milestones->mile_status) && $milestones->mile_status == 2 ){echo "selected";}?> > Onhold</option>
                    <option value="3"<?php if(isset($milestones->mile_status) && $milestones->mile_status == 3 ){echo "selected";}?> > Completed</option>
                    <option value="4"<?php if(isset($milestones->mile_status) && $milestones->mile_status == 4 ){echo "selected";}?> > Drop</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">
                    Milestone Start Date <span class=""></span>
                </label>
                <input type="text" placeholder="Milestone Start Date" class="form-control datepicker" id="start_date" name="start_date"
                       value="<?= !empty($milestones->start_date) ? $milestones->start_date : " " ?>">
            </div>
            <div class="form-group">
                <label class="control-label">
                    Milestone End Date <span class=""></span>
                </label>
                <input type="text" placeholder="Milestone End Date" class="form-control datepicker" id="due_date" name="due_date"
                       value="<?= !empty($milestones->due_date) ? $milestones->due_date : " " ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    Budget <span class=""></span>
                </label>
                <input type="text" placeholder="Insert your Milestone Budget" class="form-control" id="budget" name="budget"
                       value="<?php if(!empty($milestones->budget )){echo $milestones->budget ;}?>">
            </div>
            <div class="form-group">
                <label>
                    Developer
                </label>
                <select  name="emp_id" class="js-example-basic-single js-country form-control" placeholder="Select Developer">
                    <option></option>
                    <?php if($employee){
                    foreach($employee as $employees){?>
                    <option value="<?= $employees->id ?>" <?php if(isset($milestones->emp_id) && $milestones->emp_id == $employees->id ){ echo "Selected";}?>>
                        <?= $employees->name ?></option>
                        <?php }}?>
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
                <label>
                    Description
                </label>
                <textarea class="form-control" name="description"><?php if(!empty($milestones->description)){echo  $milestones->description; }?></textarea>
            </div>
        </div>
    </div>
</form>
<button class="btn btn-primary btn-wide pull-right" type="submit" id="name_id">
    Submit <i class="fa fa-arrow-circle-right"></i>
</button>
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
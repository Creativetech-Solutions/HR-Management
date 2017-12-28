@extends('layout.layout')
@section('content')
    @parent
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
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
                                    Project Name <span class="symbol required"></span>
                                </label>
                                <input type="text" placeholder="Project Name" class="form-control" id="email" name="name" value="<?php if(!empty($projects->name)){echo  $projects->name; }?>"
                                >
                                {{-- use for edit case to check project name --}}
                                <input type="hidden" name="hidden_project_id" value="<?= !empty($projects->id) ? $projects->id :" " ?>" id="hidden_project_id">

                            </div>
                            <div class="form-group">
                                <label>
                                    Select Client
                                </label>
                                <select  name="client_id" class="js-example-placeholder-single js-country form-control" placeholder="Slect Client">
                                    <?php
                                    if(!empty($client)){
                                        foreach ($client as $clients) { ?>
                                        <option value="<?= $clients->id ?>" <?php if(isset($projects->client_id) && $clients->id == $projects->client_id){echo "Selected";}?>> <?= $clients->name ?></option>
                                        <?php }}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>
                                    Required Skills
                                </label>
                                <select multiple="" name="required_skills[]" class="js-example-basic-multiple js-states form-control">
                                    <?php
                                    $projects_skills = !empty($projects->required_skills) ?  $projects->required_skills: " ";
                                    if(!empty($skills)){
                                    foreach ($skills as $skill) { ?>
                                    <option value="<?= $skill->id ?>"<?php if( in_array( $skill->id ,explode(",",$projects_skills))){ echo "selected"; }?>> <?= $skill->skill_name ?></option>
                                    <?php }}
                                    ?>
                                </select>
                            </div>
                           <div class="form-group">
                                <label>
                                    Project Status
                                </label>
                                <select   name="project_status" class="js-example-placeholder-single  form-control" placeholder="Slect Project Status">
                                    <option value="1"<?php if(isset($projects->project_status) && $projects->project_status == 1 ){echo "selected";}?> >Active</option>
                                    <option value="2"<?php if(isset($projects->project_status) && $projects->project_status == 2 ){echo "selected";}?> > Onhold</option>
                                    <option value="3"<?php if(isset($projects->project_status) && $projects->project_status == 3 ){echo "selected";}?> > Completed</option>
                                    <option value="4"<?php if(isset($projects->project_status) && $projects->project_status == 4 ){echo "selected";}?> > Drop</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Project Start Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Project Start Date" class="form-control datepicker" id="start_date" name="start_date"
                                       value="<?= !empty($projects->start_date) ? $projects->start_date : " " ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    Budget <span class=""></span>
                                </label>
                                <input type="text" placeholder="Insert your Project Budget" class="form-control" id="budget" name="budget"
                                       value="<?php if(!empty($projects->budget )){echo $projects->budget ;}?>">
                            </div>
                            <div class="form-group">
                                <label>
                                    Project Manager
                                </label>
                                 <select  name="project_manager" class="js-example-placeholder-single js-country form-control" placeholder="Slect Project manager">
                                   <?php if($employee){
                                       foreach($employee as $employees){?>
                                           <option value="<?= $employees->id ?>" <?php if(isset($projects->project_manager) && $projects->project_manager == $employees->id ){ echo "Selected";}?>>
                                               <?= $employees->name ?></option>
                                   <?php }}?>
                                 </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Currency <span class=""></span>
                                </label>
                                <select   name="currency" class="js-example-placeholder-single form-control">
                                    <?php
                                     if($currency){
                                         foreach($currency as $currency){
                                            foreach($currency->currency as $cr){?>
                                                 <option value="<?= $cr['ISO4217Code'] ?>" <?php if(isset($projects->currency) && $projects->currency == $cr['ISO4217Code'] ){ echo "Selected";}?> >
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
                                <select  name="payment_status" class="js-example-placeholder-single js-country form-control" placeholder="Slect User Role">
                                    <option value="1" <?php if(isset($projects->payment_status) && $projects->payment_status== 1 ){echo "selected";}?> > Pending     </option>
                                    <option value="2" <?php if(isset($projects->payment_status) && $projects->payment_status== 2 ){echo "selected";}?> > Incomplete  </option>
                                    <option value="3" <?php if(isset($projects->payment_status) && $projects->payment_status== 3 ){echo "selected";}?> > Paid        </option>
                                    <option value="4" <?php if(isset($projects->payment_status) && $projects->payment_status== 4 ){echo "selected";}?> > Cancelled   </option>
                                    <option value="5" <?php if(isset($projects->payment_status) && $projects->payment_status== 5 ){echo "selected";}?> > Refunded    </option>
                                    <option value="6" <?php if(isset($projects->payment_status) && $projects->payment_status== 6 ){echo "selected";}?> > Declined    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Project End Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Project End Date" class="form-control datepicker" id="due_date" name="due_date"
                                       value="<?= !empty($projects->due_date) ? $projects->due_date : " " ?>">
                            </div>
                        </div>
                    </div>
                  </form>
                 <button class="btn btn-primary btn-wide pull-right" type="submit" id="name_id">
                        Submit <i class="fa fa-arrow-circle-right"></i>
                    </button>
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

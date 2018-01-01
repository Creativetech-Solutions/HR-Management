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
                                    Select Employee Name <span class="symbol required"></span>
                                </label>
                                <select  name="emp_id" class="js-example-placeholder-single js-country form-control" placeholder="Slect Project manager">
                                    <?php if($employee){
                                    foreach($employee as $employees){?>
                                    <option value="<?= $employees->id ?>" <?php if(isset($leave->emp_id) && $leave->emp_id == $employees->id ){ echo "Selected";}?>>
                                        <?= $employees->name ?></option>
                                    <?php }}?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                   Leave From <span class=""></span>
                                </label>
                                <input type="text" placeholder="Project End Date" class="form-control datepicker" id="leave_from" name="leave_from"
                                       value="<?= !empty($leave->leave_from) ? $leave->leave_from : " " ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    Total leave
                                </label>
                                <input type="text" name="total_leave" class="form-control" value="<?= !empty($leave->total_leave) ? $leave->total_leave : " " ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Leave To<span class=""></span>
                                </label>
                                <input type="text" placeholder="" class="form-control datepicker" id="leave_to" name="leave_to"
                                       value="<?= !empty($leave->leave_to) ? $leave->leave_to : " " ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">
                                    Descriptions <span class=""></span>
                                </label>
                                <textarea class="form-control autosize area-animated" name="description">
                                    <?= !empty($leave->description) ? $leave->description : " " ?>
                                </textarea>
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

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
                                <select  name="emp_id" class="js-example-placeholder-single js-country form-control" placeholder="Slect Project manager" id="email" >
                                    <?php if($employee){
                                    foreach($employee as $employees){?>
                                    <option data-id="<?= $employees->salary ?>" value="<?= $employees->id ?>" <?php if(isset($salary->emp_id) && $salary->emp_id == $employees->id ){ echo "Selected";}?>>
                                        <?= $employees->name ?></option>
                                    <?php }}?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Bonus  <span class=""></span>
                                </label>
                                <input type="text" placeholder="Bonus" class="form-control " id="bonus" name="bonus"
                                       value="<?= !empty($salary->bonus) ? $salary->bonus : " " ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Salary Month <span class=""></span>
                                </label>
                                <input type="text" placeholder="Salary Month" class="form-control datepicker" id="salary_month" name="salary_month"
                                       value="<?= !empty($salary->salary_month) ? $salary->salary_month : " " ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    Salary <span class="symbol required"></span>
                                </label>
                                <input type="text" name="salary_req" value=""    class=" emp_salary form-control ">


                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Deduction  <span class=""></span>
                                </label>
                                <input type="text" placeholder="deduction" class="form-control " id="deduction" name="deduction"
                                       value="<?= !empty($salary->deduction) ? $salary->deduction : " " ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Transaction  Date <span class=""></span>
                                </label>
                                <input type="text" placeholder="Transaction Date" class="form-control datepicker" id="trans_date" name="trans_date"
                                       value="<?= !empty($salary->trans_date) ? $salary->trans_date : " " ?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden"  name="salary" value="" class=" emp_salary form-control">
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
                $('#form3').validate({
                    rules: {
                        'emp_id': { required: true},
                        'salary_req': { required: true},
                    },
                    messages: {
                        salary: {
                            required: "Please Select Employee",
                         },
                        salary_req:{
                            required:  "Please Select Employee",
                        }
                    },
                });
                $("#name_id").click(function () {
                    if ($('#form3').valid()) {
                        $('#form3').submit();
                    } else {
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        return false;
                    }
                });

                $("#email").change(function () {
                    var selected = $(this).find("option:selected").attr("data-id");
                    $('.emp_salary').val(selected);
                });
                $(window).load(function () {
                    var selected = $('#email').find("option:selected").attr("data-id");
                    $('.emp_salary').val(selected);
                });
            });
    </script>
@stop

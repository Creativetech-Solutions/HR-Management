@extends('layout.layout')
@section('content')
    @parent
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $title; ?></h2>
                <hr>

                <form id="form3" method="POST" action="{{url($action_url)}}" role="form">
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
                       <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">
                                    Update Logo <span class="symbol required"></span>
                                </label>
                                <input type="text" name="logo" value=""  id="logo"  class="form-control ">


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

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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    Skill Name <span class="symbol required"></span>
                                </label>
                                <input type="text" placeholder="Skills Name" class="form-control" id="skill_name" name="skill_name" value="<?php if(!empty($skill->skill_name)){echo  $skill->skill_name; }     ?>">


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    Status <span class=""></span>
                                </label>
                                <select class="form-control" name="status">
                                    <option value="1">Published</option>
                                    <option value="0">Pending</option>
                                </select>
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
            var exists = false;
            $('#form3').validate({
                rules: {
                    'skill_name': { required: true},
                },
                messages: {
                    skill_name: {
                        required: "Please enter Skills Name",

                    },

                },
            });
            $("#name_id").click(function () {
                if ($('#form3').valid() && exists === false) {
                    $('#form3').submit();
                } else {
                    if(exists === true){
                        $("#skill_name").after("<label  class='error hideit' style='display:inline-block'>Skill Name  already exist Please chose another one</label>");
                        setTimeout(function() {
                            $('.hideit').slideUp("slow");
                        }, 4000);
                    }
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    return false;
                }
            });
            $("#skill_name").blur(function(){
                var skill_name = $('#skill_name').val();
                $.ajax({
                    type: 'POST',
                    url: '{{url('check_skill_name')}}',
                    data: {skill_name:skill_name,'_token': $('input[name=_token]').val(),},
                    dataType: "json",
                    success: function(res) {
                        if(res.exists){
                            exists = true;
                            $("#skill_name").after("<label  class='error hideit' style='display:inline-block'>Skill Name already exist Please chose another one</label>");
                            setTimeout(function() {
                                $('.hideit').slideUp("slow");
                            }, 4000);

                        }else{
                            exists = false;
                        }
                    },
                    error: function (jqXHR, exception) {

                    }
                });
            });
        });
    </script>
@stop

@extends('layout.layout')
@section('content')
    @parent
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $title; ?></h2>
                <hr>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message')}}
                    </div>
                @endif

                <form id="form3" method="POST" action="{{url($action_url)}}" role="form" enctype="multipart/form-data">
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
                               <label>
                                   Image Uploaded
                               </label>
                               <?= print_r($data);

                              // echo $data->logo;
                               exit;?>
                               <div class="fileinput fileinput-new" data-provides="fileinput">
                                   <div class="fileinput-new thumbnail"><img src="{{URL::asset('/images/logo/'.$data->logo)}}" alt="">
                                   </div>
                                   <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                   <div class="user-edit-image-buttons">
										<span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span><span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
												<input type="file"name="logo" id="logo" value="">
										</span>
                                       <a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
                                           <i class="fa fa-times"></i> Remove
                                       </a>
                                   </div>
                               </div>
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
            $('.alert').delay(3000).fadeOut();
        });
    </script>
@stop

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
                                    Email Address <span class="symbol required"></span>
                                </label>
                                <input type="email" placeholder="Email Address" class="form-control" id="email" name="email" value="<?php if(!empty($user->email)){echo  $user->email; }     ?>"
                                <?php if(!empty($user->email)){echo "disabled";}?>>

                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    First Name <span class=""></span>
                                </label>
                                <input type="text" placeholder="Insert your First Name" class="form-control" id="firstname" name="first_name"
                                       value="<?php if(!empty($user->first_name )){echo $user->first_name ;}?>">
                            </div>

                            <?php if(empty($user->id)){ ?>
                                <div class="form-group">
                                    <label class="control-label">
                                        Password <span class="symbol required"></span>
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label>
                                    User Role
                                </label>
                                <?= !empty($user->user_type) ? $user_type = $user->user_type : $user_type  = " " ;?>
                                <select multiple="" name="user_type[]" class="js-example-basic-multiple js-states form-control" placeholder="Slect User Role">
                                    <option value="Admin"    <?php if(in_array("Admin",explode(",",$user_type))){echo "selected";}?> >Admin</option>
                                    <option value="Client"   <?php if(in_array("Client",explode(",",$user_type))){echo "selected";}?> > Client</option>
                                    <option value="Developer"<?php if(in_array("Developer",explode(",",$user_type))){echo "selected";}?> > Developer</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    User Name <span class=""></span>
                                </label>
                                <input class="form-control tooltips" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"
                                       title="" data-placement="top" name="name" id="name" placeholder="User Name" value="<?php if(!empty($user->name)){echo $user->name ;} ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Last Name <span class=""></span>
                                </label>
                                <input type="text" placeholder="Insert your Last Name" class="form-control" id="lastname" name="last_name"
                                       value="<?php if(!empty($user->last_name)){echo $user->last_name ;} ?>">
                            </div>
                            <?php if(empty($user->id)){ ?>

                                <div class="form-group">
                                    <label class="control-label">
                                        Confirm Password <span class="symbol required"></span>
                                    </label>
                                    <input type="password" class="form-control" id="password_again" name="password_again">
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label class="control-label">
                                    Gender <span class=""></span>
                                </label>
                                <div class="clip-radio radio-primary">

                                    <input type="radio" value="0" name="gender" id="gender_female" <?= !empty($user->gender) == 0 ? 'checked' : ''; ?>>
                                    <label for="gender_female">
                                        Female
                                    </label>
                                    <input type="radio" value="1" name="gender" id="gender_male" <?= !empty($user->gender) == 1 ? 'checked' : ''; ?>>
                                    <label for="gender_male">
                                        Male
                                    </label>
                                </div>
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
        var email_exist = false;
         $('#form3').validate({
            rules: {
               'email': { required: true, email: true },
                'password': { minlength: 6,required: true },
                'password_again': { required: true, minlength: 6, equalTo: "#password"},
            },
             messages: {
                email: {
                    required: "Please enter your Email address",
                    email: "Your email address must be in the format of name@domain.com"
                },
                gender: "Please check a gender!"
            },
        });
        $("#name_id").click(function () {
            if ($('#form3').valid() && email_exist === false) {
               $('#form3').submit();
               } else {
                if(email_exist === true){
                    $("#email").after("<label  class='error hideit' style='display:inline-block'>Email already exist Please chose another one</label>");
                    setTimeout(function() {
                        $('.hideit').slideUp("slow");
                    }, 4000);
                }
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            }
        });
        $("#email").blur(function(){
            var email = $('#email').val();
            $.ajax({
                type: 'POST',
                url: '{{url('check_email')}}',
                data: {email:email,'_token': $('input[name=_token]').val(),},
                dataType: "json",
                success: function(res) {
                    if(res.exists){
                        email_exist = true;
                        $("#email").after("<label  class='error hideit' style='display:inline-block'>Email already exist Please chose another one</label>");
                        setTimeout(function() {
                            $('.hideit').slideUp("slow");
                        }, 4000);

                    }else{
                        email_exist = false;
                    }
                },
                error: function (jqXHR, exception) {

                }
            });
        });
    });
</script>
@stop

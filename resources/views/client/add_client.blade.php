@extends('layout.layout')
@section('content')
    @parent
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Client</h2>
                 <hr>
                <form method="POST" action="{{url('clients/store')}}" role="form" >
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
                                <input type="email" placeholder="Email Address" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    First Name <span class=""></span>
                                </label>
                                <input type="text" placeholder="Insert your First Name" class="form-control" id="firstname" name="firstname">
                            </div>


                            <div class="form-group">
                                <label class="control-label">
                                    Password <span class="symbol required"></span>
                                </label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Country <span class=""></span>
                                </label>
                                <input type="text" class="form-control" name="country" id="country" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Zip Code
                                </label>
                                <input class="form-control" type="text" name="zipcode" id="zipcode">
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    User Name <span class=""></span>
                                </label>
                                <input class="form-control tooltips" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="User Name" data-placement="top" name="name" id="name" placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Last Name <span class=""></span>
                                </label>
                                <input type="text" placeholder="Insert your Last Name" class="form-control" id="lastname" name="lastname">
                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    Confirm Password <span class="symbol required"></span>
                                </label>
                                <input type="password" class="form-control" id="password_again" name="password_again">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    City <span class=""></span>
                                </label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <label class="control-label">
                                    Gender <span class=""></span>
                                </label>
                                <div class="clip-radio radio-primary">
                                    <input type="radio" value="" name="gender" id="gender_female">
                                    <label for="gender_female">
                                        Female
                                    </label>
                                    <input type="radio" value="" name="gender" id="gender_male">
                                    <label for="gender_male">
                                        Male
                                    </label>
                                </div>
                            </div>
                     </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-wide pull-right" type="submit">
                                Register <i class="fa fa-arrow-circle-right"></i>
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@extends('layout.layout')
@section('content')
    @parent

    <div class="tabbable">
        <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
            <li class="active">
                <a data-toggle="tab" href="#panel_overview">
                    Overview
                </a>
            </li>
            <li class="hide">
                <a  href="{{ route("employee.edit", $user->id ) }}">
                    Edit Account
                </a>
            </li>
            <li class="" id="documents">
                <a data-toggle="tab" href="#panel_documents">
                    Documents
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#panel_projects">
                    Projects
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="panel_overview" class="tab-pane fade  in active ">
                <div class="row">
                    <div class="col-sm-5 col-md-4">
                        <div class="user-left">
                            <div class="center">
                                <h4>{{$user->name}}</h4>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="user-image">
                                        <div class="fileinput-new thumbnail"><img src="{{asset('assets/images/logo/logo.jpg')}}" alt="">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div class="user-image-buttons">
																			<span class="btn btn-azure btn-file btn-sm"><span class="fileinput-new"><i class="fa fa-pencil"></i></span><span class="fileinput-exists"><i class="fa fa-pencil"></i></span>
																				<input type="file">
																			</span>
                                            <a href="#" class="btn fileinput-exists btn-red btn-sm" data-dismiss="fileinput">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="social-icons block">
                                    <ul>
                                        <li data-placement="top" data-original-title="Twitter" class="social-twitter tooltips">
                                            <a href="http://www.twitter.com" target="_blank">
                                                Twitter
                                            </a>
                                        </li>
                                        <li data-placement="top" data-original-title="Facebook" class="social-facebook tooltips">
                                            <a href="http://facebook.com" target="_blank">
                                                Facebook
                                            </a>
                                        </li>
                                        <li data-placement="top" data-original-title="Google" class="social-google tooltips">
                                            <a href="http://google.com" target="_blank">
                                                Google+
                                            </a>
                                        </li>
                                        <li data-placement="top" data-original-title="LinkedIn" class="social-linkedin tooltips">
                                            <a href="http://linkedin.com" target="_blank">
                                                LinkedIn
                                            </a>
                                        </li>
                                        <li data-placement="top" data-original-title="Github" class="social-github tooltips">
                                            <a href="#" target="_blank">
                                                Github
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                            </div>
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th colspan="3">Contact Information</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>
                                        {{ $user->first_name .'  '.$user->last_name}}
                                    </td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>
                                        <a href="#">
                                            {{ $user->email }}
                                        </a></td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td>{{ $user->phone }}</td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>

                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="3">General information</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Join Date</td>
                                    <td>{{ $dev->join_date }}</td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                <tr>
                                    <td>Last Increment</td>
                                    <td>{{ $dev->last_increment }}</td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                <tr>
                                    <td>Salary</td>
                                    <td>{{ $dev->salary }}</td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <?= $user->status == 1 ? '<span class="btn btn-xs btn-success">Publish</span>' : "<span class='btn btn-xs btn-danger'>Pending</span>" ?>
                                    </td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                 </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="3">Additional information</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Skills</td>
                                    <td><?php

                                            if(!empty($skills)){
                                                foreach($skills as $skill)
                                                {
                                                    ?><span class="p_skills btn btn-xs btn-primary"> {{ $skill->skill_name }}</span><?php
                                                }
                                            }?>
                                    </td>
                                    <td><a href="#panel_edit_account" class="show-tab"></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-8">
                        <div class="row space20">
                            <div class="col-sm-3">
                                <button class="btn btn-icon margin-bottom-5 margin-bottom-5 btn-block">
                                    <i class="ti-layers-alt block text-primary text-extra-large margin-bottom-10"></i>
                                    Projects <span class="badge badge-success" id="p_t"> </span>
                                </button>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-icon margin-bottom-5 btn-block">
                                    <i class="ti-comments block text-primary text-extra-large margin-bottom-10"></i>
                                    Tasks <span class="badge badge-success"> 23 </span>
                                </button>
                            </div>
                            <div class="col-sm-3 hide">
                                <button class="btn btn-icon margin-bottom-5 btn-block">
                                    <i class="ti-calendar block text-primary text-extra-large margin-bottom-10"></i>
                                    Calendar
                                </button>
                            </div>
                            <div class="col-sm-3 ">
                                <button class="btn btn-icon margin-bottom-5 btn-block">
                                    <i class="fa fa-edit block text-primary text-extra-large margin-bottom-10"></i>
                                    <a href="{{ route('employee.edit',$user->id) }}"> Edit Profile </a>
                                </button>
                            </div>
                        </div>
                        <div class="panel panel-white" id="activities">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title text-primary">Recent Completed Tasks </h4>
                                <paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
                            </div>
                            <div collapse="activities" ng-init="activities=false" class="panel-wrapper">
                                <div class="panel-body">
                                    <ul class="timeline-xs">
                                        <li class="timeline-item success">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    2 minutes ago
                                                </div>
                                                <p>
                                                    <a class="text-info" href>
                                                        Steven
                                                    </a>
                                                    has completed his account.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    12:30
                                                </div>
                                                <p>
                                                    Staff Meeting
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item danger">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    11:11
                                                </div>
                                                <p>
                                                    Completed new layout.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item info">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Thu, 12 Jun
                                                </div>
                                                <p>
                                                    Contacted
                                                    <a class="text-info" href>
                                                        Microsoft
                                                    </a>
                                                    for license upgrades.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Tue, 10 Jun
                                                </div>
                                                <p>
                                                    Started development new site
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Sun, 11 Apr
                                                </div>
                                                <p>
                                                    Lunch with
                                                    <a class="text-info" href>
                                                        Nicole
                                                    </a>
                                                    .
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item warning">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Wed, 25 Mar
                                                </div>
                                                <p>
                                                    server Maintenance.
                                                </p>
                                            </div>
                                        </li>
                                        <li class="timeline-item">
                                            <div class="margin-left-15">
                                                <div class="text-muted text-small">
                                                    Fri, 20 Mar
                                                </div>
                                                <p>
                                                    New User Registration
                                                    <a class="text-info" href>
                                                        more details
                                                    </a>
                                                    .
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-white space20">
                            <div class="panel-heading">
                                <h4 class="panel-title">Recent Project</h4>
                            </div>
                            <div class="panel-body">
                                <ul class="ltwt">
                                    <li class=" ">
                                        <p class="ltwt_tweet_text">
                                            <a href class="text-info">
                                               <?= !empty($dev_pro->name) ? $dev_pro->name : " "   ?>
                                            </a>
                                        </p>
                                        <span class="block text-light"><i class="fa fa-fw fa-clock-o"></i> Start Date: <?= !empty($dev_pro->start_date) ? $dev_pro->start_date : " "   ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="panel_documents" class="tab-pane fade padding-bottom-30">
                <div class="row">
                    <div class="col-md-12 ">
                        <h4 class="activity mt-20 "> </h4>
                        <div class="fileinputappends"></div>
                        <form enctype="multipart/form-data" id="uploaddoc">
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="emp_id" name="emp_id" value="{{ !empty($dev->id) ? $dev->id : " "}}" >
                            <div class="form-group">
                                <label>Add New File:</label>
                                <input type="file" name="attachment" class="form-control" id="uploadfile">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success upload-file" type="submit">Upload File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="panel_projects" class="tab-pane fade padding-bottom-30">
                <div class="row">
                    <?php
                    if(!empty($dev_pro)){
                        foreach($dev_pro as $dev_pr){?>
                            <div class="col-md-3 col-sm-4 portfolio "  style="border: ridge;">
                                <div class="content">
                                    <div class="p-image">
                                        <img src="{{asset('assets/images/logo/logo.jpg')}}"  alt="" style="width:100%; margin-top: 10px">
                                    </div>
                                     <hr>
                                    <span class="heading"><a href="{!! url('projects/dashboard/'.$dev_pr->id) !!}"> {{ $dev_pr->name }}</a></span>
                                    <p  class="well"><?= substr($dev_pr->description, 0, 150) ?></p>
                                    <table>
                                        <tr><td>Team Members:</td><td> {{$user->name}} </td></tr>
                                        <tr><td>Start Date: </td><td> {{ $dev_pr->start_date }}</td></tr>
                                        <tr><td>Due Date: </td><td> {{ $dev_pr->due_date }}</td></tr>
                                    </table>
                                </div>
                            </div>
                <?php  } } ?>
                </div>
            </div>
        </div>
    </div>
    <?php $u_id = $user->id;?>
    <?php $emp_id = $dev->id;?>

@stop
@section('script')
    @parent
    <script>

        $(document).on('click','#update',function(){
            var id ='{!! $u_id !!}';
            var names = $('#logo')[0].files[0];
            $.ajax({
                url: '{!! route('users.update_user_image') !!}',
                data: {
                      'ids':id,
                    'names':names,
                    '_token': $('input[name=_token]').val()},
                contentType: false,
                processData: false,
                type: 'POST',
                success:function(response) {
                    alert(response);
                }
            });
        })
        // upload Documents
        $("#uploaddoc").submit(function(){
            var form = $('#uploaddoc')[0]; // You need to use standard javascript object here
            var formData = new FormData(form);
            $.ajax({
                url : '{!! url('upload_developers_doc') !!}',
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data['success']){
                        $("#uploadfile").val("");
                        $('.fileinputappends').empty();
                        var emp_id = '{{ $emp_id }}';
                        getattachedfiless(emp_id);
                        toastr.success('File Uploaded Successfully',"Success Alert",{timeOut:3000});
                    }else{
                        toastr.error('Please Upload only jpeg,png,jpg,gif,doc,pdf,docx,zip,svg files',"Warning Alert",{timeOut:4000});
                    }
                },
            });
            return false;
        });
        $(document).on("click","#documents",function(){
            $('.fileinputappends').empty();
            var emp_id = '{{ $emp_id }}';
            getattachedfiless(emp_id);
        });
        function getattachedfiless(emp_id){
            var id = emp_id;
            $.ajax({
                type:'POST',
                url:  '{!! url('get_developers_docs') !!}',
                data:{'id':id,'_token': $('input[name=_token]').val(),},
                success:function(data){
                    $.each(data,function(){
                        var src = (this['document']) ? this['document'] : "";
                        var path = "{{ URL::asset('images/employee_doc')}}";
                        var extension = src.substring(src.lastIndexOf('.')+1);
                        switch(extension){
                            case 'txt':
                                var paths = path +'/'+'txt.png';
                                break;
                            case 'zip':
                                var paths = path +'/'+'zip.jpg';
                                break;
                            case 'doc':
                                var paths = path +'/'+'doc.png';
                                break;
                            case 'pdf':
                                var paths = path +'/'+'pdf.png';
                                break;
                            case 'docx':
                                var paths = path +'/'+'doc.png';
                                break;
                            default:
                                var paths = path +'/'+src;
                        }
                        $('.fileinputappends').append('<div class="fileinput fileinput-new" data-provides="fileinput"><div class="user-image">'
                            +'<div class="fileinput-new thumbnail"><img src="'+paths+'" alt="" data-src="'+src+'"></div>'
                            +'<div class="fileinput-preview fileinput-exists thumbnail"></div>'
                            +'<div class="user-image-buttons">'
                            +'<span class="btn btn-xs btn-danger remove_file" data-id="'+ this['id']+ '"><i class="fa fa-close"></i></span>'
                            +'<a href="'+path+'/'+src+'" download><span class="btn btn-xs btn-success"><i class="fa fa-arrow-down"></i></span></a>'
                            +'</div><div class="img-text">'+src.slice(-15)+'</div></div></div>');
                    });
                }
            });
        }
        $(document).on('click','.remove_file',function(e){  // Remove Uploeded File
            e.preventDefault();
            var af_id = $(this).data('id');
            var img_src = $(this).parents('.user-image').find('img').data('src');
            $.ajax({
                type:'DELETE',
                url:'{!! url('remove_employee_doc') !!}',
                data:{'id':af_id,'img_src':img_src,'_token': $('input[name=_token]').val(),},
                success:function(data){
                    if(data){
                        $('.fileinputappends').empty();
                        var emp_id = '{{ $emp_id }}';
                        getattachedfiless(emp_id);
                        toastr.success('File Removed Successfully!','Success Alert!',{timeOut:3000});
                    }else{
                        toastr.error('Something Hapened Wrong Please Try Again!','Success Alert!',{timeOut:3000});
                    }
                }
            });
        });


    </script>
@stop
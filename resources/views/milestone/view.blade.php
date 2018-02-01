@extends('layout.layout')
@section('content')
@parent
   <div class="row">
       <div class="col-md-8">
          <h2>Projects Listings</h2>
       </div>
       <div class="col-md-4">
           <a href="{{ url('milestones/add') }}" >
               <span class="title btn btn-sm btn-primary pull-right"> Add New </span>
           </a>
       </div>
   </div>
<hr>
@if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message')}}
    </div>
@endif
<table class="table-bordered table table-striped table-bordered table-hover table-full-width" id="users-table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Milestone</th>
        <th>Project Name</th>
        <th>Developer</th>
        <th>Status</th>
        <th>Payment Status</th>
        <th>Budget</th>
        <th>Start Date</th>
        <th>Due Date </th>
        <th>Action</th>
    </tr>
    {{ csrf_field() }}
    </thead>
</table>
 </div><div id="mile_status" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center heading_text"></h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Name:</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id_delete" disabled>
                                <input type="text" class="form-control" id="name_statu" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Project Status:</label>
                            <div class="col-sm-10">
                                 <select   name="project_status" class="model-selecter s-example-placeholder-single js-country form-control" placeholder="Slect Project Status" id="selectd_value">
                                    <option value="1"> Active</option>
                                    <option value="2"> Onhold</option>
                                    <option value="3"> Completed</option>
                                    <option value="4"> Drop</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success  custom-button" id = "update_status" data-dismiss="modal">

                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><div id="milestone_pay_status" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center heading_text"></h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">Name:</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id_delete" disabled>
                                <input type="text" class="form-control" id="name_pay" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Project Status:</label>
                            <div class="col-sm-10">
                                <select  name="payment_status" class="model-selecter form-control" placeholder="Slect User Role" id="payment_status_id">
                                    <option value="1">Pending</option>
                                    <option value="2"> Incomplete</option>
                                    <option value="3"> Paid</option>
                                    <option value="4"> Cancelled</option>
                                    <option value="5"> Refunded</option>
                                    <option value="6"> Declined</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success  custom-button" id = "update_pay_status" data-dismiss="modal">

                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
@parent
<script>
    jQuery(function($) {
        var oTable = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.milestones_data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'pro_name', name: 'pro_name' },
                { data: 'emp_name', name: 'emp_name' },
                { data: 'mile_status', name: 'mile_status' },
                { data: 'payment_status', name: 'payment_status' },
                { data: 'budget', name: 'budget' },
                { data: 'start_date', name: 'start_date' },
                { data: 'due_date', name: 'due_date' },
                {data: 'action', name: 'action'}
            ]
        });

        $(document).on('click', '.mile_status', function() {
            $('.modal-title').text('Change Milestone Status');
            $('.heading_text').text('Are you sure you want to Change the following Milestone Status?');
            $('.custom-button').text('Update');
            $('#id_delete').val($(this).data('id'));
            $('#name_statu').val($(this).data('title'));
            $('#title_delete').val($(this).data('status'));
            old_status = $(this).data('status');
            $('select[name="mile_status"]').find('option[value= '+old_status+']').attr("selected",true);
            $('#mile_status').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '#update_status', function() {
            status = $("select#selectd_value option").filter(":selected").val();
            $.ajax({
               type: 'Post',
                url: 'milestones_status',
                data: {
                    'id':id,
                    'status':status,
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                        toastr.success('Successfully Changed Milestone Status!', 'Success Alert', {timeOut: 3000});
                  //  $('.custom-button').removeClass('status_Change');
                    oTable.draw();
                }
            });
        });
        $(document).on('click', '.milestones_pay_status', function() {
            $('.modal-title').text('Change Payment Status');
            $('.heading_text').text('Are you sure you want to Change the Payment Status?');
            $('.custom-button').text('Update');
            $('#id_delete').val($(this).data('id'));
            $('#name_pay').val($(this).data('title'));
            $('#title_delete').val($(this).data('status'));
            old_status = $(this).data('status');
            $('select[name="payment_status"]').find('option[value= '+old_status+']').attr("selected",true);
            $('#milestone_pay_status').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '#update_pay_status', function() {
            status = $("select#payment_status_id option").filter(":selected").val();
            $.ajax({
               type: 'Post',
                url: 'milestones_pay_status',
                data: {
                    'id':id,
                    'status':status,
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                        toastr.success('Successfully Changed Milestone payment Status!', 'Success Alert', {timeOut: 3000});
                 //   $('.custom-button').removeClass('status_Change');
                    oTable.draw();
                }
            });
        });
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('.heading_text').text('Are you sure you want to Delete the following Project?');
            $('.custom-button').text('Delete');
            $('.custom-button').addClass('delete');
            $('#id_delete').val($(this).data('id'));
            $('.change_name').val($(this).data('title'));
            $('#title_delete').val($(this).data('content'));
            $('#deleteModal').modal('show');
            $('.skills_hide').hide();
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'projects_delete/'+id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                        toastr.success('Successfully deleted Project!', 'Success Alert', {timeOut: 3000});
                    $('.custom-button').removeClass('delete');
                    oTable.draw();
                }
            });
        });
       $('.alert').delay(3000).fadeOut();
    });
</script>
@stop

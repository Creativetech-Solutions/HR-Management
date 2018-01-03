@extends('layout.layout')
@section('content')
    @parent
     <div class="row">
                    <div class="col-md-8">
                     <h2>Leaves Listings</h2>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('leave/apply') }}" >
                            <span class="title btn btn-sm btn-primary pull-right"> Add New </span>
                        </a>

                    </div>
                </div>
    <hr>
    @if(Session::has('message'))<div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>@endif
    <table class="table-bordered table table-striped table-bordered table-hover table-full-width" id="users-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total leave</th>
                        <th>Approved By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    {{ csrf_field() }}
                    </thead>
                </table>
@stop
@section('script')
@parent
<script>
    jQuery(function($) {
        var oTable = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.leave_data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'total_leave', name: 'total_leave' },
                { data: 'approved_by', name: 'approved_by' },
                { data: 'status', name: 'status' },
                {data: 'action', name: 'action'}

             ]
        });

        $(document).on('click', '.approve-modal', function() {
            $('.modal-title').text('Approved Leave ');
            $('.heading_text').text('Are you sure you want to Approved leave ?');
            $('.custom-button').text('Approve');
            $('.custom-button').addClass('approve');
            $('.custom-button').removeClass('btn-danger');
            $('.custom-button').addClass('btn-success');
            $('#id_delete').val($(this).data('id'));
            $('#name').val($(this).data('title'));
            $('#title_delete').val($(this).data('content'));
            $('#deleteModal').modal('show');
            $('.rejected').removeClass('hide');

            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.approve', function() {
            var login_user_id = $('.login_user_id').text();
            $.ajax({
                type: 'post',
                url: 'approve_leave',
                data: {
                    'id':id,
                    'user_id':login_user_id,
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                    toastr.success('Successfully Approved Leave!', 'Success Alert', {timeOut: 3000});
                    $('.custom-button').removeClass('approve');
                    $('.custom-button').removeClass('btn-success');
                    $('.custom-button').addClass('btn-danger');
                    $('.rejected').addClass('hide');
                    oTable.draw();
                 }
            });
        });
        $('.modal-footer').on('click', '.rejected', function() {
            $.ajax({
                type: 'post',
                url: 'approve_leave',
                data: {
                    'id':id,
                    'user_id':-1,
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                    toastr.success('Successfully Rejected Leave!', 'Success Alert', {timeOut: 3000});
                    $('.custom-button').removeClass('approve');
                    $('.custom-button').removeClass('btn-success');
                    $('.custom-button').addClass('btn-danger');
                    $('.rejected').addClass('hide');
                    oTable.draw();
                 }
            });
        });

        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('.heading_text').text('Are you sure you want to Delete the following Application?');
            $('.custom-button').text('Delete');
            $('.custom-button').addClass('delete');
            $('#id_delete').val($(this).data('id'));
            $('#name').val($(this).data('title'));
            $('#title_delete').val($(this).data('content'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'leave_delete/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                        toastr.success('Successfully deleted Application!', 'Success Alert', {timeOut: 3000});
                    $('.custom-button').removeClass('delete');
                    oTable.draw();
                }
            });
        });
        $('.alert').delay(3000).fadeOut();
    });
</script>
@stop

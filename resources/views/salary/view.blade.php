@extends('layout.layout')
@section('content')
    @parent
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                     <h2>Salary Transsactions </h2>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('salary/new_transaction') }}" >
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Transferred Amount</th>
                        <th>Salary Month</th>
                        <th>Transactions Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    {{ csrf_field() }}
                    </thead>
                </table>
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
            ajax: '{!! route('get.salary_data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'amount', name: 'amount' },
                { data: 'salary_month', name: 'salary_month' },
                { data: 'trans_date', name: 'trans_date' },
                { data: 'status', name: 'status' },
                {data: 'action', name: 'action'}

             ]
        });

        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('.heading_text').text('Are you sure you want to Delete the following Client?');
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
                url: 'users_delete/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                        toastr.success('Successfully deleted Client!', 'Success Alert', {timeOut: 3000});
                    $('.custom-button').removeClass('delete');
                    oTable.draw();
                }
            });
        });
        $(document).on('click', '.publish-modal', function() {
            $('.modal-title').text('Change Status');
            status     = $(this).data('status');
            status_val = status == 0 ? 'Publish':'UnPublish';
            $('.heading_text').text('Are you sure you want to ' +status_val+ ' the following Salary Transactions  Status?');
            $('.custom-button').text(status_val);
            $('.custom-button').addClass('status_Change');
            $('#id_delete').val($(this).data('id'));
            $('#name').val($(this).data('title'));
            $('#title_delete').val($(this).data('content'));
            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.status_Change', function() {
            $.ajax({
                type: 'Post',
                url: 'salary_tran_status',
                data: {
                    'id':id,
                    'status':status,
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                        toastr.success('Successfully Changed salary Transactions Status!', 'Success Alert', {timeOut: 3000});
                    $('.custom-button').removeClass('status_Change');
                    oTable.draw();
                }
            });
        });
        $('.alert').delay(3000).fadeOut();
    });
</script>
@stop

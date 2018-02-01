@extends('layout.layout')
@section('content')
    @parent

                <div class="row">
                    <div class="col-md-8">
                     <h2>Employee Increments Due </h2>
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
                        <th>Current Salary</th>
                        <th>Last Increment Date</th>
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
            ajax: '{!! route('get.increment_due_data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'salary', name: 'salary' },
                { data: 'last_increment', name: 'last_increment' },
                { data: 'status', name: 'status' },
                { data: 'Action', name: 'Action' },
             ]
        });

        $(document).on('click', '.increase_salary', function() {
            $('.modal-title').text('Update Salary');
            $('.heading_text').text('Are you sure you want to increase  the following Client Salary?');
            $('.custom-button').text('Update Salary');
            $('.custom-button').addClass('inc_salary');
            $('#id_delete').val($(this).data('id'));
            $('.change_name').val($(this).data('title'));
            status = $(this).data('status');
            $('#title_delete').val($(this).data('content'));
            $('#deleteModal').modal('show');
            if ($('.remove').length === 0) {
                // code to run if it isn't there
                $('.form-horizontal').append('<div class="form-group remove"><label class="control-label col-sm-2" for="id">Current Salary:</label><div class="col-sm-9"><input type="text" disabled class="form-control" id="" value="' + status + '"></div></div>');
                $('.form-horizontal').append('<div class="form-group remove"><label class="control-label col-sm-2" for="id">Inrement Amount:</label><div class="col-sm-9"><input type="text" name="salary" class="form-control" id="salary" value=""></div></div>');
            }
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.inc_salary', function() {
           salary =  $('#salary').val();
            $.ajax({
                type: 'POSt',
                url: 'increase_salary',
                data: {
                    'id':id,
                    'salary':salary,
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    if(data === true )
                        toastr.success('Successfully Updated Employee Salary!', 'Success Alert', {timeOut: 3000});
                     oTable.draw();
                }
            });
        });

        $('.alert').delay(3000).fadeOut();
    });
</script>
@stop

@extends('layouts.master')
@section('content')

<h3>Users</h3>
<br>      
    <table class="table table-bordered table-striped" id="userDatatable">
        <thead>
            <tr>
                <th>ID</th>
                <th>@lang('user.id')</th>
                <th>@lang('user.fName')</th>
                <th>@lang('user.lName')</th>
                <th>@lang('user.email')</th>
            </tr>
        </thead>
    </table>

@endsection

@section('script')
<script>
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#userDatatable').DataTable({
            processing: true,
            serverSide: true,
            // Peticion al servidor
            ajax: "{{ route('user.showAllUsers') }}",
            // Estos son los datos que se van a mostrar
            columns: [
                        {data: 'id', name: 'id', 'visible': false},
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                        { data: 'firstName', name: 'firstName' },
                        { data: 'lastName', name: 'lastName' },
                        { data: 'email', name: 'email' },
                    ],
            order: [[0, 'desc']]
            });
        });         
</script>
@endsection
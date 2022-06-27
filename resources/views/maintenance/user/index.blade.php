@extends('layouts.app')
@section('title', 'Users')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" />
@endprepend
@section('content')
<div class="card">
    <div class="card-body">
        <table class='table table-bordered' id='users-table'>
                <thead>
                    <tr>
                        <th>EMPLOYEE ID</th>
                        <th>USERNAME</th>
                        <th>USER TYPE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr></tr>
                </tbody>
        </table>
    </div>
</div>
@push('page-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
let table = $("#users-table").DataTable({
    ajax: "/user/list",
    serverSide: true,
    processing: true,
    destroy: true,
    language: {
        processing:
            '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>',
    },
    columns: [
        {
            name: "Employee_id",
            class: "align-middle w-25 text-center",
        },
        {
            name: "username",
            class: "align-middle text-truncate text-center",
        },
        {
            name: "user_type",
            class: "align-middle text-center",
            render : function (data) {
                if(data == 0) {
                    return `<span class='badge badge-primary'>USER</span>`;
                } else if(data == 1) {
                    return `<span class='badge badge-info'>ADMINISTRATOR</span>`;
                }
            }
        },
        {
            name: "action",
            orderable : false,
            searchable : false,
            class: "align-middle",
        },
    ],
});
</script>
@endpush
@endsection

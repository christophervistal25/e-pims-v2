@extends('layouts.app')
@section('title', 'Restore Data')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endprepend
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-title">Deleted data</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tables</th>
                    <th>Data</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deletedData as $table => $data)
                    @foreach($data as $d)
                        <tr>
                            <td>{{ $table }}</td>
                            <td>
                                {{ Str::limit(json_encode($d), 100, '...') }}
                            </td>
                            <td class='text-center'>
                                <button class='btn btn-primary shadow'>
                                    <i class='fa fa-eye'>
                                    </i>
                                    View
                                </button>
                                <button class='btn btn-success shadow'>
                                    <i class='fa fa-refresh'>
                                    </i>
                                    Restore
                                </button>
                                <button class='btn btn-danger shadow'>
                                    <i class='fa fa-trash'>
                                    </i>
                                    Permanent Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('page-scripts')
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset("js/sweetalert.min.js") }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        // let table = $('#step-increment-table').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     destroy: true,
        //     retrieve: true,
        //     ajax: '/step-increment/list',
        //     columns: [{
        //             data: 'date_step_increment',
        //             name: 'date_step_increment'
        //         },
        //         {
        //             data: 'fullname',
        //             name: 'fullname',
        //             searchable: true,
        //             sortable: false,
        //             visible: true
        //         },
        //         {
        //             data: 'position_name',
        //             name: 'position_name',
        //             searchable: true,
        //             sortable: false,
        //             visible: true
        //         },
        //         {
        //             data: 'item_no',
        //             name: 'item_no',
        //             searchable: true,
        //             sortable: false,
        //             visible: true
        //         },
        //         {
        //             data: 'date_latest_appointment',
        //             name: 'date_latest_appointment',
        //             searchable: true,
        //             sortable: false,
        //             visible: true
        //         },
        //         {
        //             data: 'sg_from_and_step_from',
        //             name: 'sg_from_and_step_from'
        //         },
        //         {
        //             data: 'salary_amount_from',
        //             name: 'salary_amount_from'
        //         },
        //         {
        //             data: 'sg_to_and_step_to',
        //             name: 'sg_to_and_step_to'
        //         },
        //         {
        //             data: 'salary_amount_to',
        //             name: 'salary_amount_to'
        //         },
        //         {
        //             data: 'salary_diff',
        //             name: 'salary_diff'
        //         },
        //         {
        //             data: 'action',
        //             name: 'action'
        //         },
        //     ]
        // });

@endpush

@endsection

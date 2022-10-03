@extends('layouts.app')
@section('title', 'Plantilla Report')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://use.fontawesome.com/78c056906b.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .pointer-events-none {
        pointer-events: none;
    }

    table>tbody>tr {
        cursor: pointer;
    }

    input:-moz-read-only {
        background-color: #f2f3f194 !important;
        border-color: #e9ecef !important;
        cursor: not-allowed !important;
    }

    input:read-only {
        background-color: #f2f3f194 !important;
        border-color: #e9ecef !important;
        cursor: not-allowed !important;
    }

    .bootstrap-select .dropdown-toggle:focus,
    .bootstrap-select>select.mobile-device:focus+.dropdown-toggle {
        outline: none !important;
    }
</style>
@endprepend
@section('content')
<div class="card rounded-0 shadow-none">
    <div class="card-body">
        <div id="table" class="page-header">
            <div class="row">
                <div class="col-5 mb-2">
                    <select class="form-control form-control-xs selectpicker" name="office" data-live-search="true"
                        id="office" data-size="5">
                        <option value="*">All</option>
                        @foreach($offices as $office)
                        <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-7 text-right">
                    <button class="btn btn-primary" id="btnExchange">ASSIGN</button>
                </div>
            </div>

            <div class="table">
                <table class="table table-bordered table-hover align-middle" id="plantilla-personnel-table"
                    style="width:100%;">
                    <thead>
                        <tr class="bg-light text-uppercase">
                            <th scope="col">&nbsp;</th>
                            <th scope="col">&nbsp;</th>
                            <th scope="col" class="text-center">Item No</th>
                            <th scope="col">Employee Name</th>
                            <th>Position Title</th>
                            <th scope="col" class="text-center">Office</th>
                            <th scope="col" class="text-center">SG / Step</th>
                            <th scope="col" class="text-center">Year</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 85%;" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <span class="modal-title h4 text-uppercase">
                    Assign Employee
                </span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="reportDetailAssignForm">

                    <div class="row">
                        <div class="col-lg-10">
                            <label class="text-capitalize h5 font-weight-medium">Fullname</label>
                            <select data-style="btn-primary text-white"
                                class="form-control form-control-xs selectpicker" name="employee"
                                data-live-search="true" id="employee" data-size="15">
                                <option value=""></option>
                                @foreach($employees as $employee)
                                <option value="{{ $employee->Employee_id }}">{{ $employee->fullname }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="employee-error"></span>
                        </div>

                        <div class="col-lg-2">
                            <label class="text-capitalize h5 font-weight-medium">Employee ID</label>
                            <input type="text" class="form-control" id="employee_id" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-lg-6 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Position</label>
                            <input type="text" class="form-control" id="position" readonly name="position">
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Office</label>
                            <input type="text" class="form-control" id="edit_office" readonly name="office">
                        </div>


                        <div class="form-group col-12 col-lg-4 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Division</label>
                            <input type="text" class="form-control" id="division" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-4 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Section</label>
                            <input class="form-control" id="section" readonly>
                        </div>

                        <div class="form-group col-12 col-lg-4 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Status</label>
                            <select class="form-control form-control-xs form-select" name="status" id="status">
                                <option value="Appointed">Appointed</option>
                                <option value="Casual">Casual</option>
                                <option value="Coterminous">Coterminous</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Provisional">Provisional</option>
                                <option value="Temporary">Temporary</option>
                                <option value="Elected">Elected</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Item No</label>
                            <input value="1" class="form-control " name="itemNo" id="itemNo" type="text"
                                placeholder="Item No.">
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Old Item No</label>
                            <input value="1" class="form-control " name="oldItemNo" id="oldItemNo" type="text"
                                placeholder="Old Item No">
                        </div>

                        <div class="form-group col-12 col-lg-3 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Current Salary Grade Year</label>
                            <input class="form-control" name="currentSgyear" id="currentSgyear" type="text">
                        </div>

                        <div class="form-group col-12 col-lg-2 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Salary Grade</label>
                            <select class="form-control salaryGradePrevious" id="currentSalarygrade"
                                name="currentSalarygrade">
                                @foreach(range(1, 33) as $grade)
                                <option value="{{ $grade }}">{{ $grade }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-lg-2 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Step</label>
                            <select class="form-control form-control-xs " name="stepNo" id="currentStepno"
                                data-width="100%">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-lg-2 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Salary Amount</label>
                            <input class="form-control" name="salaryAmount" id="salaryAmount" type="text">
                        </div>

                        <div class="form-group col-12 col-lg-3 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">(Yearly)</label>
                            <input class="form-control" name="salaryAmountYearly" id="salaryAmountYearly" type="text"
                                placeholder="">
                        </div>

                        <div class="form-group col-12 col-lg-3 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Previous Salary Grade</label>
                            <select class="form-control salaryGradePrevious" name="salaryGradePrevious"
                                data-live-search="true" id="salaryGradePrevious" data-size="5" data-width="100%">
                                @foreach(range(1, 33) as $grade)
                                <option value="{{ $grade }}">{{ $grade }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-12 col-lg-3 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Previous Step</label>
                            <select class="form-control stepNoPrevious" name="stepNoPrevious" data-live-search="true"
                                id="stepNoPrevious" data-size="5" data-width="100%">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>


                        <div class="form-group col-12 col-lg-3 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">Salary Authorized</label>
                            <input class="form-control" name="salaryAuthorized" id="salaryAuthorized" type="text">
                        </div>

                        <div class="form-group col-12 col-lg-3 mb-0">
                            <label class="text-capitalize h5 font-weight-medium">(Yearly)</label>
                            <input class="form-control" name="salaryAmountPreviousYearly"
                                id="salaryAmountPreviousYearly" type="text">
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label class="text-capitalize h5 font-weight-medium">Original Appointment</label>
                            <input class="form-control" name="originalAppointment" id="originalAppointment" type="date">
                        </div>

                        <div class="form-group col-12 col-lg-4">
                            <label class="text-capitalize h5 font-weight-medium">Last Promotion</label>
                            <input class="form-control" id="lastPromotion" name="lastPromotion" type="date">
                        </div>


                        <div class="form-group col-12 col-lg-4">
                            <label class="text-capitalize h5 font-weight-medium">Last Step Increment</label>
                            <input class="form-control" name="lastStepIncrement" id="lastStepIncrement" type="date">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <div class="float-right">
                    <button class="btn btn-primary" id="btnUpdateReportDetail">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('page-scripts')
<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
</script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function () {
            const NO_VACANT_SELECTED = -1;
            let selectedRow = [];
            let selectedIds = [];
            let office = '0001';
            let id = "{{ $reportID }}"

            let table = $('#plantilla-personnel-table').DataTable({
                ajax: `/plantilla-report/show/${id}/list/${office}`,
                serverSide: true,
                saveState : true,
                search: {
                    regex: true
                },
                processing: true,
                drawCallback: function( settings ) {
                    // Get all rendered checkbox
                    $('tbody > tr > td > input[type="checkbox"]').each(function(index, element) {
                        let idx = $(element).attr('id').replace('record__checkbox__', '');
                        if(selectedIds.includes(idx)) {
                            $(element).attr('checked', true);
                        }
                    });
                },
                language: {
                    processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
                },
                columns : [
                    {
                        className : 'text-center align-middle',
                        name : 'Id',
                        data : 'Id',
                        orderable : false,
                        render : function (Id, _, row) {
                            return `<input type="checkbox" class="pointer-events-none record-checkbox" style="transform:scale(1.5)" id="record__checkbox__${Id}" data-employee-id="${row.employee_id}">`;
                        },
                    },
                    {
                        className : 'text-center align-middle',
                        name : 'Id',
                        data : 'Id',
                        visible : false,
                    },
                    {
                        class : 'text-center align-middle',
                        name : 'item_no',
                        data : 'item_no',
                    },
                    {
                        className : 'align-middle text-truncate',
                        name : 'fullname',
                        data : 'fullname',
                        render : function(rawData, _, data) {
                            if(!data.employee_id) {
                                return `
                                <center>
                                    <span class="badge badge-primary text-white">VACANT</span>
                                </center>
                                `;
                            }
                            return `<span class="font-weight-medium mx-2">${rawData}</span>`;
                        }
                    },
                    {
                        className : 'text-left align-middle',
                        name : 'Description',
                        data : 'Description',
                    },
                    {
                        className : 'text-left text-truncate align-middle',
                        name : 'office_name',
                        data : 'office_name',
                    },
                    {
                        className : 'text-center align-middle',
                        name : 'sg_no',
                        data : 'sg_no',
                        render : function (_,_, row) {
                            return `${row.sg_no} / ${row.step_no}`;
                        }
                    },
                    {
                        className : 'text-center align-middle',
                        name : 'year',
                        data : 'year',
                    },
                    {
                        className : 'text-center align-middle ',
                        name : 'Id',
                        data : 'Id',
                        render : function (id, _, row) {
                            if(!row.employee_id) {
                                return `
                                    <button class="btn btn-primary text-white shadow btn-assign" data-id="${id}" title="Edit">
                                        <i class="fas fa-plus pointer-events-none"></i>
                                    </button>

                                    <button class="btn btn-danger text-white shadow btn-mark-as-vacant" data-id="${id}" title="Mark as Vacant">
                                        <i class="fas fa-times pointer-events-none"></i>
                                    </button>
                                `;
                            } else {
                                return `
                                    <button class="btn btn-success text-white shadow btn-assign" data-id="${id}" title="Edit">
                                        <i class="fas fa-pen pointer-events-none"></i>
                                    </button>

                                    <button class="btn btn-danger text-white shadow btn-mark-as-vacant" data-id="${id}" title="Mark as Vacant">
                                        <i class="fas fa-times pointer-events-none"></i>
                                    </button>
                                `;
                            }

                        },
                    },
                ],
            });


            $('#employee').change(function () {
                let id = $(this).val();
                $('#employee_id').val(id);
            });

            $('#office').change(function () {
                office = $(this).val();
                table.ajax.url(`/plantilla-report/show/${id}/list/${office}`).load();
            });

            $(document).on('click', 'tbody > tr', function (e) {
                const CHECKBOX_INDEX_CELL = 0;
                if(e.target.tagName === 'BUTTON') {
                    return;
                }

                let row = $(e.target).parent().children();

                while(row[0].nodeName !== 'TR') {
                    row = $(row).parent();
                }

                let checkBox = row.eq(CHECKBOX_INDEX_CELL).find('input[type=checkbox]');
                let employeeID = $(checkBox).attr('data-employee-id');
                let idx = $(checkBox).attr('id').replace('record__checkbox__', '');

                if(isNaN(employeeID)) {
                    employeeID = 0;
                }



                if($(checkBox).is(':checked')) {
                    $(checkBox).removeAttr('checked');
                    selectedRow = selectedRow.filter((id) => id !== employeeID);
                    selectedIds = selectedIds.filter((id) => id !== idx);
                } else {
                    if(selectedRow.length >= 2) {
                        let message = document.createElement('p');
                        message.innerHTML = `<center>You can only select 2 records make sure the first or second is <strong>vacant</strong>.</center>`;
                        swal({
                            title : '',
                            content : message,
                            icon : 'warning',
                            buttons : false,
                        });
                        return;
                    }

                    $(checkBox).attr('checked', true);
                    selectedRow.push(parseInt(employeeID));
                    selectedIds.push(idx)

                    // Check sum validation check if the user select a one vacant and one with plantilla
                    if(selectedRow.length == 2) {
                        let total = 0;
                        selectedRow.map((data) => total += parseInt(data));
                        if(selectedRow.indexOf(total) == NO_VACANT_SELECTED) {
                            // Re-initialize selectedRow and IDs
                            selectedRow = [];
                            selectedIds = [];

                            let message = document.createElement('p');
                            message.innerHTML = `<center>Please select a <strong>vacant</strong> record</center>`;

                            swal({
                                title : '',
                                content : message,
                                icon : 'warning',
                                buttons : false,
                            });

                            $('input[checked="checked"].record-checkbox').each((index, element) => $(element).removeAttr('checked'));
                        }
                    }
                }
            });

            $(document).on('click', '.btn-assign', function () {
                let id = $(this).attr('data-id');

                $('#employee-error').text('');

                axios(`/plantilla-report-details/view-detials/${id}`).then((response) => {
                    let data = response.data;
                    $('#btnUpdateReportDetail').attr('data-id', id);
                    $('#employee').val(data.report_details.employee_id).selectpicker('refresh').trigger('change');
                    $('#position').val(data.plantilla.plantilla_positions.position.Description);
                    $('#edit_office').val(data.plantilla.office.office_name);
                    $('#section').val(data.plantilla.plantilla_positions?.section?.section_name);
                    $('#division').val(data.plantilla.plantilla_positions?.division?.division_name);
                    $('#status').val(data.report_details.status);
                    $('#itemNo').val(data.report_details.item_no);
                    $('#oldItemNo').val(data.report_details.old_item_no);
                    $('#currentSgyear').val(data.report_details.year);
                    $('#currentSalarygrade').val(data.report_details.sg_no);
                    $('#currentStepno').val(data.report_details.step_no);
                    $('#salaryAmount').val(data.report_details.salary_amount);
                    $('#salaryAmountYearly').val(data.report_details.salary_amount_yearly);
                    $('#currentSgyear').val(data.report_details.year);
                    $('#currentSalarygrade').val(data.report_details.sg_no);
                    $('#currentStepno').val(data.report_details.step_no);
                    $('#salaryAmount').val(data.report_details.salary_amount);
                    $('#salaryAmountYearly').val(data.report_details.salary_amount_yearly);
                    $('#salaryGradePrevious').val(data.report_details.sg_no_previous);
                    $('#stepNoPrevious').val(data.report_details.step_no_previous);
                    $('#salaryAuthorized').val(data.report_details.salary_amount_previous);
                    $('#salaryAmountPreviousYearly').val(data.report_details.salary_amount_previous_yearly);
                    $('#originalAppointment').val(data.report_details.date_original_appointment);
                    $('#lastPromotion').val(data.report_details.date_last_promotion);
                    console.log(data.report_details);
                    $('#lastStepIncrement').val(data.report_details.date_last_increment);
                    $('#employeeModal').modal('toggle');
                });
            });

            $(document).on('click', '.btn-mark-as-vacant', async function () {
                let reportID = $(this).attr('data-id');
                let confirmation = await swal({
                    title : '',
                    text : 'Are you sure you want to mark this plantilla as vacant?',
                    icon : 'warning',
                    dangerMode : true,
                    buttons : ["No", "Yes"],
                });
                if(confirmation) {
                    axios.put(`/plantilla-report-show/${reportID}/vacant`).then((response) => {
                        if(response.status === 200) {
                            table.ajax.reload(null, false);
                        }
                    });
                }
            });

            $('#btnExchange').click(function () {
                axios.post(`/plantilla-report-show/assign`, {
                    ids : selectedIds,
                    employeeIDS : selectedRow,
                }).then((response) => {
                    if(response.status === 200) {
                        table.ajax.reload(null, false);
                        selectedIds = [];
                        selectedRow = [];
                        $('input[checked="checked"].record-checkbox').each((index, element) => $(element).removeAttr('checked'));
                    }
                });
            });

            $('#btnUpdateReportDetail').click(function () {
                let detailID = $(this).attr('data-id');
                let data = $('#reportDetailAssignForm').serialize();
                data = data.concat('&detailID=', detailID);
                axios.post('/plantilla-report-detail-filled', data).then((response) => {
                    if(response.status === 200) {
                        $('#employeeModal').modal('toggle');
                        table.ajax.reload(null, false);
                    }
                }).catch((error) => {
                    if(error.response.status === 422) {
                        Object.keys(error.response.data.errors).forEach((key) => {
                            $(`#${key}-error`).text(`${error.response.data.errors[key][0]}`);
                        });
                    }
                });
            });
        });
</script>
@endpush
@endsection

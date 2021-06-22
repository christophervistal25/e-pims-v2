@extends('layouts.app')
@section('title', 'Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<script src="{{ asset('js/app.js') }}" defer></script>
<style>
    .swal-button--cancel {
        background: #FEFAE3;
    }

</style>
@endprepend
@section('content')

{{-- VIEW TABLE BUTTON IN FORM --}}
<div class="float-right mr-3 d-none" id='btnViewTableContainer'>
    <button class="btn btn-info shadow"><i class='la la-list'></i>&nbsp View Table</button>
</div>
<div class="clearfix"></div>
<br>
<br>

 {{-- FORM AND TABLE --}}
<div class="content container-fluid">
    <div class="kanban-board card mb-0 shadow">
        <div class="card-body">
            <div id="addIncrement" class="page-header d-none">
                <form action="" method="POST" id="formStepIncrement">
                    @csrf

                    <div class="row">

                        <div class="col-12">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert">ADD STEP INCREMENT</div>
                        </div>

                        <div class="card-body">
                            <div class="col-12 col-lg-11 mt-2">
                                <label class="form-group has-float-label mb-0" for="employeeName">
                                <select class="form-control selectpicker" value="" data-live-search="true"
                                    name="employeeName" id="employeeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <option>Search name here</option>
                                    @foreach($employee as $employees)
                                    <option data-plantilla="{{ $employees->plantilla }}"
                                        value="{{ $employees->employee_id }}">{{ $employees->lastname }},
                                        {{ $employees->firstname }} {{ $employees->middlename }} </option>
                                    @endforeach
                                </select>
                                <span><strong>EMPLOYEE NAME<span class="text-danger">*</span></strong></span>
                                </label>
                                <div id="employeeName-error-message" class="text-danger text-sm">
                                </div>
                            </div>
                            <div class="col-12 col-lg-11 mt-3">
                                <label class="form-group has-float-label" for="dateStepIncrement">
                                <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                    id="dateIncrement" name="dateStepIncrement" type="date" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>DATE<span class="text-danger">*</span></strong></span>    
                                </label>
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <input class="form-control" id="employeeId" name="employeeID" type="hidden" readonly>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="plantillaID" id="plantillaId" class="">
                            </div>

                            <div class="form-group col-12 col-lg-11">
                                <input class="form-control d-none" value="" id="positionId" name="positionID"
                                    type="text" readonly>
                            </div>

                            <div class="col-12 col-lg-11 mt-3">
                                <label for="positionName" class="form-group has-float-label">
                                <input class="form-control" value="" id="positionName" name="positionName" type="text"
                                    readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>POSITION</strong></span>
                                    </label>
                            </div>

                            <div class="col-12 col-lg-11">
                                <label for="itemNoFrom" class="form-group has-float-label">
                                <input class="form-control" value="" id="itemNo" name="itemNoFrom" type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>ITEM NO</strong></span>
                            </label>
                            </div>

                            <div class="col-12 col-lg-11">
                                <label class="form-group has-float-label" for="lastAppointment">
                                <input class="form-control" value="" id="lastAppointment" name="datePromotion"
                                    type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>DATE OF LAST APPOINTMENT</strong></span>
                                </label>
                            </div>

                            <div class="form-row col-12">
                                <div class="col-6 col-lg-6">
                                    <label class="form-group has-float-label" for="sgNoFrom">
                                    <input class="form-control" value="" id="salaryGrade" name="sgNoFrom" type="text"
                                        readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>SALARY GRADE</strong></span>    
                                    </label>
                                </div>
                                <div class="col-6 col-lg-5 ml-2">
                                    <label class="form-group has-float-label mb-0" for="stepNo">
                                    <input class="form-control" value="" id="stepNo" name="stepNoFrom" type="text"
                                        readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>STEP</strong></span>    
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-lg-11">
                                <label class="form-group has-float-label" for="amountFrom">
                                <input class="form-control" value="" id="amount" name="amountFrom" type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>AMOUNT</strong></span> 
                            </label>
                            </div>
                        </div>

                        {{-- FORM THAT HAS TO BE INPUT --}}
                        <!-- <div class="step-increment"> -->
                        <div class="card-body">
                            <div class="col-12 col-lg-12 mt-2">
                                <label class="form-group has-float-label" for="">
                                <input type="text" class="form-control" name="sgNo2" id="sgNo2" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>SALARY GRADE</strong></span>
                            </label>
                                <div id="sgNo2-error-message" class="text-danger">
                                </div>
                            </div>

                            <div class="col-12 col-lg-12">
                                <label class="form-group has-float-label mb-0" for="stepNo2">
                                <select name="stepNo2" id="stepNo2" value="" style="outline: none; box-shadow: 0px 0px 0px transparent;"
                                    class="form-control floating {{ $errors->has('stepNo2')  ? 'is-invalid' : ''}}">
                                    <option value="">Please Select</option>
                                </select>
                                <span><strong>STEP<span class="text-danger">*</span></strong></span>
                                </label>
                                <div id="stepNo2-error-message" class="text-danger text-sm">
                                </div>
                            </div>

                            <div class="col-12 col-lg-12 mt-3">
                                <label class="form-group has-float-label" for="amount2">
                                <input class="form-control" value="" id="amount2" name="amount2" type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>AMOUNT</strong></span>
                            </label>
                                <div id="amount2-error-message" class="text-danger">
                                </div>
                            </div>

                            <div class="col-12 col-lg-12">
                                <label class="form-group has-float-label" for="monthlyDifference">
                                <input class="form-control" value="" id="monthlyDifference" name="monthlyDifference"
                                    type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>MONTHLY DIFFERENCE</strong></span>    
                                </label>
                            </div>

                            <div class="form-group col-12 col-lg-12" id="buttons">
                                <button type="submit" id="btnSave"
                                    class="form-control col-5 float-right btn btn-success mb-5 shadow"><i class="fas fa-save"></i>&nbsp; Save</button>
                                <button type="button" id="btnCancel" style="margin-right:10px"
                                    class="form-control col-5 btn btn-warning float-right shadow text-light"><i class="fas fa-ban"></i>&nbsp; Cancel</button>
                            </div>
                        </div>
                        <form>
                    </div>
            </div>

            {{-- LIST OR DATA TABLES --}}
            <div id="stepIncrementTable" class="page-header">
                <div class="row align-items-right mb-2 mt-4">
                    <div class="col-auto float-right ml-auto">
                        <button id="addBtn" type="button" class="btn btn-primary float-right shadow"><i class="fa fa-plus"></i>&nbsp
                            Add Step Increment </button>
                    </div>
                </div>
                <div class="table" style="overflow-x:auto;">
                    <table class="table table-bordered text-center" id="step-increment-table" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Date of Step Increment
                                </th>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Name</th>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Position</th>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Item No.</th>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Date of Last
                                    Appointment
                                </th>
                                <th class="font-weight-bold align-middle text-center" rowspan="1 " colspan="2">From</th>
                                <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="2">To</th>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Monthly Difference
                                </th>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Action</th>
                            <tr>
                                <td class="font-weight-bold align-middle text-center">SG/Step</td>
                                <td class="font-weight-bold align-middle text-center">Salary Rate</td>
                                <td class="font-weight-bold align-middle text-center">SG/Step</td>
                                <td class="font-weight-bold align-middle text-center">Salary Rate</td>
                            </tr>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- JQUERY VALIDATION,FUNCTIONS AND PARAMETERS--}}

@push('page-scripts')

<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //SWEET ALERT SUCCESS
    (function () {
        let isSuccess = "{{ Session::get('success') }}";
        if (isSuccess) {
            swal("Good job!", "Successfully added!", "success");
        }
    })();

    // SHOWS THE DATA ON THE TABLE
    $(document).ready(function () {
        let table = $('#step-increment-table').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            retrieve: true,
            ajax: '/step-increment/list',
            columns: [{
                    data: 'date_step_increment',
                    name: 'date_step_increment'
                },
                {
                    data: 'fullname',
                    name: 'fullname',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'position_name',
                    name: 'position_name',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'item_no',
                    name: 'item_no',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'date_latest_appointment',
                    name: 'date_latest_appointment',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'sg_from_and_step_from',
                    name: 'sg_from_and_step_from'
                },
                {
                    data: 'salary_amount_from',
                    name: 'salary_amount_from'
                },
                {
                    data: 'sg_to_and_step_to',
                    name: 'sg_to_and_step_to'
                },
                {
                    data: 'salary_amount_to',
                    name: 'salary_amount_to'
                },
                {
                    data: 'salary_diff',
                    name: 'salary_diff'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });

        const MAX_NUMBER_OF_STEP_NO = 8;

        //SOFT DELETE BUTTON
        $(document).on('click', '.btnRemoveRecord', function () {
            let id = $(this).attr('data-id');
            let message = document.createElement('h3');
            message.innerText = 'Are you sure you want to delete this row?';


            swal({
                    title: message.innerText,
                    text: "Once you delete this row, it willl disappear on the table.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: `/step-increment/${id}`, // /step-increment/ is a route
                            method: 'DELETE',  // DELETE is from the route
                            success: function (response) {
                                if (response.success) {
                                    let messageText = document.createElement('h3');
                                    messageText.innerText = 'The row has been deleted.';
                                    swal({
                                        title: messageText.innerText,
                                        icon: "success",
                                    });
                                    table.draw();
                                }
                            },
                        });

                    }
                });
        });

        // TRANSITION OF FORM TO TABLE
        $('#addBtn').click(function () {
            $('#addIncrement').attr("class", "page-header");
            $('#stepIncrementTable').attr("class", "page-header d-none");
            $('#btnViewTableContainer').removeClass('d-none');
            $('#formStepIncrement').removeClass('d-none');
        });

        // DISPLAY TABLE
        $('#btnViewTableContainer').click(function () {
            $('#stepIncrementTable').removeClass('d-none');
            $(this).addClass('d-none');
            $('#formStepIncrement').addClass('d-none');
        });

        // SHOWS THE DATA VALUE IN INPUT
        $('#employeeName').change(function (e) {
            let employeeID = e.target.value;
            let plantilla = $($("#employeeName option:selected")[0]).attr('data-plantilla');
            /*let moneyFormat = toLocalString("ph", {maximumFractionDigits:2}) + '.00';*/
            

            if (plantilla) {
                plantilla = JSON.parse(plantilla);

                $('#employeeId').val(plantilla.employee_id);
                $('#plantillaId').val(plantilla.plantilla_id);
                $('#positionName').val(plantilla.position.position_name);
                $('#positionId').val(plantilla.position.position_id);
                $('#itemNo').val(plantilla.item_no);
                $('#lastAppointment').val(plantilla.date_last_promotion);
                $('#salaryGrade').val(plantilla.sg_no);
                $("#sgNo2").val(plantilla.sg_no);
                $('#stepNo').val(plantilla.step_no);
                $('#amount').val(plantilla.salary_amount);
                /*$('#amount').val(plantilla.salary_amount)toLocalString('ph', {maximumFractionDigits:2}) + '.00';*/

                $('#stepNo2').html('');
                $('#stepNo2').append(`<option readonly>Please select</option>`);

                for (let step = plantilla.step_no + 1; step <= MAX_NUMBER_OF_STEP_NO; step++) {
                    $('#stepNo2').append(`<option value='${step}'>${step}</option>`);
                }

            } else {
                $('#positionName').val('');
                $('#itemNo').val('');
                $('#lastAppointment').val('');
                $('#salaryGrade').val('');
                $('#stepNo').val('');
                $('#amount').val('');
            }
        });

        //STEP NUMBER CONDITION WITH ERRORS
        $('#stepNo2').change(function (e) {
            let selectedSetep = e.target.value;
            $.ajax({
                url: `/api/step/${$('#sgNo2').val()}/${selectedSetep}`,
                success: function (response) {
                    $('#amount2').val(`${response['sg_step' + selectedSetep]}`)
                    var amount = parseFloat($('#amount').val());
                    var amount2 = parseFloat($('#amount2').val());
                    var amountDifference = parseFloat(((amount2 - amount) || ''));
                    $('#monthlyDifference').val(amountDifference);
                }
            });
        });

        $('#btnSave').click(function (e) {
            e.preventDefault()

            let employeeName = $('#employeeName').val();
            let sgNo = $('#sgNo2').val();
            let stepNo = $('#stepNo2').val();
            let amount = $('#amount2').val();
            let errors = {};
            let filteredError = "";

            if (employeeName == "" || employeeName.toLowerCase() == 'search name here') {
                $('#employeeName-error-message').html('');
                $('#employeeName-error-message').append(
                    `<span class="text-danger"> Employee name is required. </span>`);
                errors.employee = true;
            } else {
                $('#employeeName-error-message').html('');
                errors.employee = false;
            }


            if (stepNo == "" || stepNo.toLowerCase() == 'please select') {
                $('#stepNo2-error-message').html('');
                $('#stepNo2-error-message').append(`<span> The step no. is required. </span>`);
                errors.stepNo = true;
            } else {
                $('#stepNo2-error-message').html('');
                errors.stepNo = false;
            }


            filteredError = Object.values(errors).filter((error) => error);

            // Check if the filtered error array variable has value or not.
            // if the length of this array is 0 this means that there is no error
            // or all fields that required is filled by the user.
            if (filteredError.length === 0) {
                $('#formStepIncrement').submit();
            }
        });


        $('#btnCancel').click(function (e) {
            location.reload();
        })

    });

</script>
@endpush

@endsection

@extends('layouts.app')
@section('title', 'Step Increment')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> --}}
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<style>
    table.dataTable.no-footer {
        border:1px solid #dee2e6;
    }

    table.dataTable thead th, table.dataTable thead td {
        padding: 15px 25px;
        border-bottom: 1px solid #dee2e6;
    }

    table.dataTable {
        border-collapse: collapse;
    }
</style>
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<style>
    .swal-button--cancel {
        background: #FEFAE3;
    }

</style>
@endprepend
@section('content')


<div class="content container-fluid">
    <div class="kanban-board card mb-0 shadow">
        <div class="card-body">
            <div class="page-header d-none" id="addForm" >
                <div class="float-right mb-2" id='btnViewTableContainer'>
                    <button class="btn btn-primary shadow"><i class='fa fa-list'></i>&nbsp; Personnel List</button>
                </div>
                <br>
                <br>
                <br>

                <form action="{{ route('create.step') }}" method="POST" id="formStepIncrement">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-secondary text-center font-weight-bold" role="alert">ADD STEP INCREMENT</div>
                        </div>
                        
                        
                        <div class="card-body col-12 col-md-6 col-lg-6">
                            <div class="col-12 col-lg-11 mt-2">
                                <label class="form-group has-float-label mb-0" for="employeeName">
                                <select class="form-control employeeName selectpicker {{ $errors->has('employeeName')  ? 'is-invalid' : ''}}" data-live-search="true"
                                    name="employeeName" id="employeeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <option hidden></option>

                                    @foreach($employees as $employee)
                                    <option data-plantilla="{{ $employee->plantillaForStep }}"
                                        value="{{ $employee->Employee_id }}"> {{ $employee->fullname }} </option>
                                    @endforeach

                                </select>
                                <span><strong>EMPLOYEE NAME<span class="text-danger">*</span></strong></span>
                                </label>
                                @error('employeeName')
                                    <div class="text-danger text-sm">{{ $message }}</div>
                                @enderror
                                    <small id="employeeName-error-message" class="text-danger text-sm"></small>
                            </div>

        
                            <div class="col-12 col-lg-4">
                                <label class="form-group has-float-label" for="employeeId">
                                <input  type="text" class="form-control" id="employeeId" name="employeeID"
                                    readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>EMPLOYEE ID</strong></span>
                                </label>
                            </div>

                            <div class="col-12 col-lg-11">
                                <label class="form-group has-float-label" for="dateStepIncrement">
                                <input class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                    id="dateIncrement" name="dateStepIncrement" type="date" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>DATE<span class="text-danger">*</span></strong></span>
                                </label>
                            </div>


                            <div class="form-group">
                                <input type="hidden" name="officeCode" id="officeCode" class="">
                            </div>


                            <div class="form-group col-12 col-lg-11">
                                <input class="form-control d-none" id="positionId" name="positionID"
                                    type="hidden" readonly>
                            </div>

                            <div class="col-12 col-lg-11">
                                <label for="positionName" class="form-group has-float-label">
                                <input class="form-control" id="positionName" data-position="" name="positionName" type="text"
                                    readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>POSITION</strong></span>
                                </label>
                            </div>

                            <div class="col-12 col-lg-11">
                                <label for="itemNoFrom" class="form-group has-float-label">
                                    <input class="form-control" id="itemNo" name="itemNoFrom" type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>ITEM NO</strong></span>
                                </label>
                            </div>

                            <div class="col-12 col-lg-11">
                                <label class="form-group has-float-label" for="lastAppointment">
                                <input class="form-control" id="lastAppointment" name="datePromotion"
                                    type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>DATE OF LAST APPOINTMENT</strong></span>
                                </label>
                            </div>

                            <div class="form-row col-12">

                                <div class="col-12 col-lg-6">
                                    <label class="form-group has-float-label" for="sgNoFrom">
                                    <input class="form-control" id="salaryGrade" name="sgNoFrom" type="text"
                                        readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>SALARY GRADE</strong></span>
                                    </label>
                                </div>

                                <div class="col-12 col-lg-5 ml-2">
                                    <label class="form-group has-float-label mb-0" for="stepNo">
                                    <input class="form-control" id="stepNo" name="stepNoFrom" type="text"
                                        readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                    <span><strong>STEP</strong></span>
                                    </label>
                                </div>

                            </div>

                            <div class="col-12 col-lg-11">
                                <label class="form-group has-float-label" for="amountFrom">
                                <input class="form-control" id="amount" name="amountFrom" type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>AMOUNT</strong></span>
                            </label>
                            </div>
                        </div>

                        {{-- FORM THAT HAS TO BE INPUT --}}
                        <div class="card-body col-12 col-md-6 col-lg-6">
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
                                <select name="stepNo2" id="stepNo2" style="outline: none; box-shadow: 0px 0px 0px transparent;"
                                    class="form-control stepNo2 floating {{ $errors->has('stepNo2')  ? 'is-invalid' : ''}}">
                                    <option>Please Select</option>
                                </select>
                                <span><strong>STEP<span class="text-danger">*</span></strong></span>
                                </label>
                                @error('stepNo2')
                                    <div class="text-danger text-sm">{{ $message }}</div>    
                                @enderror
                                
                                <small id="stepNo2-error-message" class="text-danger text-sm"></small>
                                
                            </div>

                            <div class="col-12 col-lg-12">
                                <label class="form-group has-float-label" for="amount2">
                                <input type="text" class="form-control" id="amount2" name="amount2" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>AMOUNT</strong></span>
                            </label>
                                <div id="amount2-error-message" class="text-danger">
                                </div>
                            </div>`

                            <div class="col-12 col-lg-12">
                                <label class="form-group has-float-label" for="monthlyDifference">
                                <input class="form-control" id="monthlyDifference" name="monthlyDifference"
                                    type="text" readonly style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                <span><strong>MONTHLY DIFFERENCE</strong></span>
                                </label>
                            </div>

                            <div class="form-group col-12 col-lg-12" id="buttons">
                                <button type="submit" id="btnSave"
                                    class="form-control col-5 float-right btn btn-success mb-5 shadow"><i class="fas fa-save"></i>&nbsp; Save</button>
                                <button type="button" id="btnCancel" style="margin-right:10px"
                                    class="form-control col-5 btn btn-danger float-right shadow text-light"><i class="fas fa-ban"></i>&nbsp; Cancel</button>
                            </div>
                        </div>
                        <form>
                    </div>
            </div>

            {{-- LIST OR DATATABLES --}}
            <div id="stepIncrementTable" class="page-header">
                <div class="row align-items-right mb-2">
                    <div class="col-auto float-right ml-auto">
                        <button id="addBtn" type="button" class="btn btn-primary float-right shadow text-white"><i class="fa fa-plus"></i>&nbsp;
                            Add Step Increment </button>
                    </div>
                </div>
                <div class="table" style="overflow-x:auto;">
                    <table class="table table-bordered" id="step-increment-table" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Date of Step Increment
                                </th>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Name</th>
                                <th class="font-weight-bold align-middle text-center" rowspan="2">Position</th>
                                <th class="font-weight-bold align-middle" rowspan="2">Item No.</th>
                                <th class="font-weight-bold align-middle" rowspan="2">Date of Last
                                    Appointment
                                </th>
                                <th class="font-weight-bold align-middle text-center" rowspan="1 " colspan="2">From</th>
                                <th class="font-weight-bold align-middle text-center" rowspan="1" colspan="2">To</th>
                                <th class="font-weight-bold align-middle" rowspan="2">Monthly Difference</th>
                                <th class="font-weight-bold align-middle" rowspan="2">Action</th>
                                <tr>
                                    <td class="font-weight-bold align-middle">SG/Step</td>
                                    <td class="font-weight-bold align-middle">Salary Rate</td>
                                    <td class="font-weight-bold align-middle">SG/Step</td>
                                    <td class="font-weight-bold align-middle">Salary Rate</td>
                                </tr>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            {{-- END OF DATATABLES --}}

        </div>
    </div>
</div>


{{-- JQUERY VALIDATION,FUNCTIONS AND PARAMETERS--}}

@push('page-scripts')

<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready( ()=> {
        let table = $('#step-increment-table').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            retrieve: true,
            pagingType: "full_numbers",
            ajax: '/step-increment/list',
            language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
            },
            columns: [{
                    data: 'date_step_increment',
                    name: 'date_step_increment'
                },
                {
                    className: 'text-truncate',
                    data: null,
                    searchable: true,
                    sortable: false,
                    visible: true,
                    render: function ( data, type, row ) {
                        return row.FirstName +' '+ row.MiddleName[0] +'. '+ row.LastName;
                    }
                },
                {
                    className: 'text-truncate',
                    data: 'Description',
                    name: 'Description',
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
                    data: 'last_latest_appointment',
                    name: 'last_latest_appointment',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    className: 'text-truncate',
                    data: 'sg_from_and_step_from',
                    name: 'sg_from_and_step_from',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    className: 'text-truncate',
                    data: 'salary_amount_from',
                    name: 'salary_amount_from',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    className: 'text-truncate',
                    data: 'sg_to_and_step_to',
                    name: 'sg_to_and_step_to',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    className: 'text-truncate',
                    data: 'salary_amount_to',
                    name: 'salary_amount_to',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    data: 'salary_diff',
                    name: 'salary_diff',
                    searchable: true,
                    sortable: false,
                    visible: true
                },
                {
                    className: 'text-truncate',
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
        $('#addBtn').click( ()=> {
            $('#addForm').attr("class", "page-header d-none");
            $('#stepIncrementTable').attr("class", "page-header d-none");
            // $('#btnViewTableContainer').removeClass('float-right d-none');
            $('#addForm').removeClass('page-header d-none');
            $('#formStepIncrement').removeClass('d-none');
        });

        // DISPLAY TABLE
        $('#btnViewTableContainer').click( ()=> {
            $('#stepIncrementTable').removeClass('d-none');
            $(this).addClass('d-none');
            $('#formStepIncrement').addClass('d-none');
            $('#addForm').addClass('page-header d-none');
        });


        // FETCH DATA AND SHOW VALUE IN INPUT FIELDS
        $('#employeeName').change( (e)=> {
            let employeeID = e.target.value;
            let plantilla = $($("#employeeName option:selected")[0]).attr('data-plantilla');
           

            if (plantilla) {
                plantilla = JSON.parse(plantilla);
                
                let {plantilla_positions} = plantilla;
                let {position} = plantilla_positions;

                console.log(plantilla)
                
                $('#employeeId').val(plantilla.employee_id);
                $('#plantillaId').val(plantilla.plantilla_id);
                $('#officeCode').val(plantilla.office_code);
                $('#positionId').val(position?.PosCode);
                $('#positionName').val(position?.Description || 'NO POSITION');
                $('#itemNo').val(plantilla.item_no);
                $('#lastAppointment').val(plantilla.date_last_promotion);
                $('#salaryGrade').val(plantilla.sg_no);
                $("#sgNo2").val(plantilla.sg_no);
                $('#stepNo').val(plantilla.step_no);
                $('#amount').val(plantilla.salary_amount);
                /*$('#amount').val(plantilla.salary_amount)toLocalString('ph', {maximumFractionDigits:2}) + '.00';*/

                $('#stepNo2').html('');
                $('#stepNo2').append(`<option readonly>Please select</option>`);


                let step = plantilla.step_no;

                for ( step + 1; step <= MAX_NUMBER_OF_STEP_NO; step++ )
                {
                    $('#stepNo2').append(`<option value='${step}'>${step}</option>`);
                }

            } else {
                $('#officeCode').val('');
                $('#status').val('');
                $('#positionName').val('');
                $('#itemNo').val('');
                $('#lastAppointment').val('');
                $('#salaryGrade').val('');
                $('#stepNo').val('');
                $('#amount').val('');

            }
        });


        // STEP NUMBER CONDITION WITH ERRORS  //
        $('#stepNo2').change( (e)=> {
            let valueSelected = e.target.value;


            console.log(valueSelected)
            $.ajax({
                url: `/api/step/${$('#sgNo2').val()}/${valueSelected}`,
                success: function (response) {
                    $('#amount2').val(`${response['sg_step' + valueSelected]}`)


                    let amount = parseFloat($('#amount').val());
                    let amount2 = parseFloat($('#amount2').val());
                    let amountDifference = parseFloat(((amount2 - amount) || ''));
                    $('#monthlyDifference').val(amountDifference);
                }
            });
        });


        // SAVE BUTTON //
        $('#btnSave').click( (e)=> {
            e.preventDefault();

            let employeeName = $('#employeeName').val();
            let sgNo = $('#sgNo2').val();
            let stepNo = $('#stepNo2').val();
            let amount = $('#amount2').val();
            let errors = {};
            let filteredError = "";

            if (employeeName == "" || employeeName.toLowerCase() == 'search name here') {
                $('#employeeName-error-message').html('');
                $(".employeeName").addClass("is-invalid");
                $('#employeeName-error-message').append(
                    `<span class="text-danger"> Employee name is required. </span>`);
                errors.employee = true;
            } else {
                $('#employeeName-error-message').html('');
                $(".employeeName").removeClass("is-invalid");
                errors.employee = false;
            }


            if (stepNo == "" || stepNo.toLowerCase() == 'please select') {
                $('#stepNo2-error-message').html('');
                $(".stepNo2").addClass("is-invalid");
                $('#stepNo2-error-message').append(`<span> The step no. is required. </span>`);
                errors.stepNo = true;
            } else {
                $('#stepNo2-error-message').html('');
                $(".stepNo2").removeClass("is-invalid");
                errors.stepNo = false;
            }


            filteredError = Object.values(errors).filter((error) => error);

            // Check if the filtered error array variable has value or not.
            // if the length of this array is 0 this means that there is no error
            // or all fields that required is filled by the user.
            if (filteredError.length === 0) {
                $('#formStepIncrement').submit();
                swal("Good job!", "Successfully added!", "success")
                .then((response) => {
                    if(response){
                        location.reload();
                    }
                });
            }
        });

    });


    let btnCancel = document.querySelector('#btnCancel');

    btnCancel.addEventListener('click', function(e){
        e.preventDefault();
        location.reload();
    })



</script>

@endpush

@endsection

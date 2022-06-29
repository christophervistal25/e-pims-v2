@extends('layouts.app')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />

@endprepend
@section('title', 'Employee Leave Increment')
@section('content')
<div class="row mt-0">
    <div class="col-lg-4">
        <input type="text" id="searchEmployee" class='form-control rounded-0 text-uppercase' placeholder="Search...">
        <div class="card rounded-0 shadow-none border-top-0 mb-0"
            style="height : 700px; overflow-y :scroll; overflow-x:hidden;">
            <div class="card-body p-0 m-0 b">
                <table class='table table-hover' id='employees-table' width="100%">
                    <thead class='d-none'>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id='employees'>
                        @foreach($employees as $employee)
                        <tr class='employee-row' id='employee-row-{{ $employee->Employee_id }}' data-key="{{ $employee->Employee_id }}" style='cursor:pointer;'>
                            <td class='align-middle'><span class='font-weight-bold'>{{ $employee->Employee_id }}</span>
                                - {{ $employee->fullname }}</td>
                            <td class='text-truncate'>
                                <button class='btn btn-sm btn-danger rounded-circle shadow btn-exclude-employee'
                                    data-key="{{ $employee->Employee_id }}">
                                    <i class="las la-trash" style='pointer-events:none;'></i>
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td></td>
                        <td></td>
                    </tfoot>
                </table>
            </div>
        </div>
        <button class='btn btn-primary btn-block rounded-0 mt-0 text-uppercase' id='btn-increment-leave-credits'>INCREMENT LEAVE CREDITS OF {{ $employees->count() }} Employee's</button>
    </div>
    <div class="col-lg-8">
        <div class="row mb-1">
            <div class="col-lg-auto align-middle text-center d-flex">
                <div class="font-weight-bold justify-content-center align-self-center">
                    MONTH : 
                </div>
            </div>
            <div class="col-lg-11">
                <input type="date" class='form-control rounded-0' id="month" name="month" value="{{ date('Y-m-d') }}">
            </div>
        </div>
        <div class="card rounded-0 shadow-none">
            <div class="card-body" id='employee-information'>
                <div class="row">
                    <div class="col-lg-6 border border-top-0 border-bottom-0 border-left-0">
                        <div class="row">
                            <center>
                                <img src="{{ asset('/storage/employee_images/no_image.png') }}" class="p-2 rounded cursor-pointer d-md-none d-lg-block img-fluid" width="33.5%" />
                            </center>
                            <div class="col-lg-12">
                                <label class="form-group has-float-label mb-0" for="firstname">
                                    <input type="text" class="form-control" readonly id="firstname" />
                                    <span> <strong>FIRSTNAME </strong></span>
                                </label>
                            </div>

                            <div class="col-lg-12">
                                <label class="form-group has-float-label mb-0" for="middlename">
                                    <input type="text" class="form-control" readonly id="middlename" />
                                    <span> <strong>MIDDLENAME </strong></span>
                                </label>
                            </div>

                            <div class="col-lg-12">
                                <label class="form-group has-float-label mb-0" for="lastname">
                                    <input type="text" class="form-control" readonly id="lastname" />
                                    <span> <strong>LASTNAME </strong></span>
                                </label>
                            </div>

                            <div class="col-lg-12">
                                <label class="form-group has-float-label mb-0" for="suffix">
                                    <input type="text" class="form-control" readonly id="suffix" />
                                    <span> <strong>SUFFIX </strong></span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label class="form-group has-float-label mb-0" for="office_charging">
                                    <input type="text" class="form-control" readonly id="office_charging" />
                                    <span> <strong>OFFICE CHARGING</strong></span>
                                </label>
                            </div>

                            <div class="col-lg-12">
                                <label class="form-group has-float-label mb-0" for="office_assignment">
                                    <input type="text" class="form-control" readonly id="office_assignment" />
                                    <span> <strong>OFFICE ASSIGNMENT </strong></span>
                                </label>
                            </div>

                            <div class="col-lg-12">
                                <label class="form-group has-float-label mb-0" for="position">
                                    <input type="text" class="form-control" readonly id="position" />
                                    <span> <strong>POSITION </strong></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <table class='table table-hover'>
                            <tbody>
                                @foreach($types as $label => $type)
                                <tr>
                                    <td width="450px">{{ $label }}</td>
                                    <td class='text-right' id='{{ $type }}'></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="incrementProgressModal" tabindex="-1" role="dialog" aria-labelledby="incrementProgressModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="incrementProgressModalLabel">Leave Increment Progress</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" id='progress-bar' role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <br>
            <p>Processing employee's leave increment (<span id='progress'>0</span>/<span id='chunk-length'></span>)</p>
        </div>
      </div>
    </div>
  </div>
</div>

@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script>
    let table = $('#employees-table').DataTable({
        "dom": "lrt",
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "ordering": false,
        "bAutoWidth": false
    });

    $('#searchEmployee').keyup(function () {
        table.search($(this).val()).draw();
    });


    $(document).on('click', '.employee-row', function () {
        let employeeID = $(this).data('key');
        $('#employee-information').fadeOut(200).fadeIn(200);
        $('.employee-row').removeClass('bg-primary').removeClass('text-white');
        $(this).addClass('bg-primary').addClass('text-white').attr('data-picked', 'active-employee');
        $.ajax({
            url: '/maintenance/leave/increments/' + employeeID,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#firstname').val(data.employee?.FirstName);
                $('#middlename').val(data.employee?.MiddleName);
                $('#lastname').val(data.employee?.LastName);
                $('#suffix').val(data.employee?.Suffix);
                $('#office_charging').val(data.employee?.office_charging?.Description);
                $('#office_assignment').val(data.employee?.office_assignment?.Description);
                $('#position').val(data.employee?.position?.Description);
                for ([type, value] of Object.entries(data.leaveCredits)) {
                    $(`#${type}`).text(value || 0.000);
                }
            }
        });
    });

    $(document).on('click', function (e) {
        if(e.target.tagName === 'BUTTON' && Array.from(e.target.classList).includes('btn-exclude-employee')) {
            let employeeID = $(e.target).data('key');
            $(`#employee-row-${employeeID}`).remove();
            let noOfEmployees = $('.employee-row').length;
            $('#btn-increment-leave-credits').text(`INCREMENT LEAVE CREDITS OF ${noOfEmployees} EMPLOYEE'S`);
        }
    });

    let progressCounter = 0;
    $('#btn-increment-leave-credits').click(function () {
        let month = $('#month').val();

        // Check if the selected month already exists in database using guard route
        $.ajax({
            url : `/maintenance/leave/increments/guard/${month}`,
            success : function (response) {
                if(response.success) {
                    let employeeIDs = [];
                    progressCounter = 0;
                    
                    $('#progress-bar').css('width', `0%`);
                    $('#btn-increment-leave-credits').attr('disabled', true);
                    $('#incrementProgressModal').modal('toggle');


                    $('.employee-row').each(function () {
                        employeeIDs.push($(this).data('key'));
                    });

                    // Array chunking to prevent the request from getting too large.
                    let chunks = [];
                    while (employeeIDs.length > 0) {
                        chunks.push(employeeIDs.splice(0, 500));
                    }

                    $('#chunk-length').text(chunks.length);

                    let promises = [];

                    for (let chunk of chunks) {
                        promises.push($.ajax({
                            url: `/maintenance/leave/increments/${month}`,
                            type: 'POST',
                            dataType: 'json',
                            xhr: function () {
                                var xhr = new window.XMLHttpRequest();
                                xhr.addEventListener("progress", function (evt) {
                                    progressCounter++;
                                    $('#progress').text(progressCounter);
                                    $('#progress-bar').css('width', `${progressCounter / chunks.length * 100}%`);
                                }, false);
                                return xhr;
                            },
                            data: {
                                employeeIDs: chunk
                            }
                        }));
                    }
                    $.when.apply($, promises).done(function () {
                        setTimeout(() => {
                            $('#incrementProgressModal').modal('hide');
                            $('#btn-increment-leave-credits').attr('disabled', false);
                            swal({
                                title: '',
                                text: 'Leave credits have been incremented.',
                                icon: 'success',
                                buttons : false,
                            });
                            $('*[data-picked="active-employee"]').trigger('click');
                        }, 700);
                    });
                }
            },
            error : function (data) {
                let message = document.createElement('p');
                message.innerText = data.responseJSON.message;
                message.classList.add('text-center');
                if(data.status === 422) {
                    swal({
                        icon : 'warning',
                        title : '',
                        content : message,
                        buttons : false,
                        timer : 5000,
                    });
                }
            }
        });
    });

</script>
@endpush
@endsection

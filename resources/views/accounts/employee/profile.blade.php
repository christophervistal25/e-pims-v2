@extends('accounts.employee.layouts.app')
@section('title', 'Your Profile')
@prepend('page-css')
<link rel="stylesheet"
    href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
@endprepend
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="">
                                <img alt="" class='rounded-circle'
                                        {{ is_null($account->employee->profile) ? "src=asset(/assets/img/province.png)" :  'src=/storage/employee_images/' . $account->employee->profile . "" }}></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <p class="h3 font-weight-medium">
                                            {{ $account->employee?->FirstName }}
                                            {{ substr($account->employee?->MiddleName, 0, 1) . '.' }}
                                            {{ $account->employee?->LastName }} {{  $account->employee?->Suffix }}
                                        </p>
                                        <p>
                                            {{ $account->Employee_id }}
                                            <br>
                                            {{ $account->employee?->offices?->office_name ?? 'N/A' }}
                                            <br>
                                            {{ $account->employee?->position?->Description ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Email:</div>
                                            <div class=""><a {{ $account->employee?->Email_address ? "href=mailto:{$account->employee->Email_address}" : '' }}  id="email_text">{{ $account->employee?->Email_address ?? 'N/A' }}</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Phone:</div>
                                            <div class="">{{ $account->employee?->ContactNumber ?? 'N/A' }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Birthday:</div>
                                            <div class="">{{ $account->employee?->Birthdate }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Address:</div>
                                            <div class="">{{ $account->employee?->Address }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Gender:</div>
                                            <div class="text-uppercase">{{ $account->employee?->Gender }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a data-target="#profile_info" href="#" data-toggle="modal" class="edit-icon">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card tab-box">
        <div class="row user-tabs">
            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item">
                        <a href="#emp_profile" data-toggle="tab" class="nav-link font-weight-bold active">Account
                            Informations</a>
                    </li>
                    <li class="nav-item">
                        <a href="#leave_logs" data-toggle="tab" class="nav-link font-weight-bold">Leave History <span
                                class='badge badge-primary rounded-circle px-2 py-1'>{{ $noOfLeaveHistory }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <!-- Profile Info Tab -->
        <div id="emp_profile" class="pro-overview tab-pane fade show active">
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">Login Credentials
                                <a class="edit-icon" href="#" data-toggle="modal" data-target="#account__info__modal">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </h3>
                            <ul class="personal-info">
                                <hr>
                                <li>
                                    <div class="title">Username</div>
                                    <div class="text" id="username__field">{{ $account->username }}</div>
                                </li>
                                <hr>
                                <li>
                                    <div class="title">Email</div>
                                    <div class="text" id="email__field">{{ $account->email }}</div>
                                </li>
                                <hr>
                                <li>
                                    <div class="title">Password</div>
                                    <div class="text">{{ str_repeat('*', 16) }}</div>
                                </li>
                                <hr>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Profile Info Tab -->
        <!-- Leave Logs Tab -->
        <div class="tab-pane fade" id="leave_logs">
            <div class="row">
                <div class="col-lg -12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Leave History</div>
                            <hr>
                            <table class='table table-bordered' id='leave-history-table' width="100%">
                                <thead>
                                    <tr>
                                        <th>DATE APPLIED</th>
                                        <th>LEAVE</th>
                                        <th>NO. OF DAYS</th>
                                        <th>DATE FROM</th>
                                        <th>DATE TO</th>
                                        <th>APPROVED BY</th>
                                        <th class='text-center'>APPROVED FOR</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Projects Tab -->
        <!-- Bank Statutory Tab -->
        <div class="tab-pane fade" id="bank_statutory">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"> Basic Salary Information</h3>
                    <form>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Salary basis <span
                                            class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select salary basis type</option>
                                        <option>Hourly</option>
                                        <option>Daily</option>
                                        <option>Weekly</option>
                                        <option>Monthly</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Salary amount <small class="text-muted">per
                                            month</small></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Type your salary amount"
                                            value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Payment type</label>
                                    <select class="select">
                                        <option>Select payment type</option>
                                        <option>Bank transfer</option>
                                        <option>Check</option>
                                        <option>Cash</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="card-title"> PF Information</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">PF contribution</label>
                                    <select class="select">
                                        <option>Select PF contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select PF contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Employee PF rate</label>
                                    <select class="select">
                                        <option>Select PF contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Additional rate <span
                                            class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select additional rate</option>
                                        <option>0%</option>
                                        <option>1%</option>
                                        <option>2%</option>
                                        <option>3%</option>
                                        <option>4%</option>
                                        <option>5%</option>
                                        <option>6%</option>
                                        <option>7%</option>
                                        <option>8%</option>
                                        <option>9%</option>
                                        <option>10%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Total rate</label>
                                    <input type="text" class="form-control" placeholder="N/A" value="11%">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Employee PF rate</label>
                                    <select class="select">
                                        <option>Select PF contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Additional rate <span
                                            class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select additional rate</option>
                                        <option>0%</option>
                                        <option>1%</option>
                                        <option>2%</option>
                                        <option>3%</option>
                                        <option>4%</option>
                                        <option>5%</option>
                                        <option>6%</option>
                                        <option>7%</option>
                                        <option>8%</option>
                                        <option>9%</option>
                                        <option>10%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Total rate</label>
                                    <input type="text" class="form-control" placeholder="N/A" value="11%">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="card-title"> ESI Information</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">ESI contribution</label>
                                    <select class="select">
                                        <option>Select ESI contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select ESI contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Employee ESI rate</label>
                                    <select class="select">
                                        <option>Select ESI contribution</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Additional rate <span
                                            class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select additional rate</option>
                                        <option>0%</option>
                                        <option>1%</option>
                                        <option>2%</option>
                                        <option>3%</option>
                                        <option>4%</option>
                                        <option>5%</option>
                                        <option>6%</option>
                                        <option>7%</option>
                                        <option>8%</option>
                                        <option>9%</option>
                                        <option>10%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">Total rate</label>
                                    <input type="text" class="form-control" placeholder="N/A" value="11%">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Bank Statutory Tab -->
    </div>
</div>

<!-- Account Info Modal -->
<diva id="account__info__modal" class="modal  fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-left">
                    <h4 class="modal-title">Edit your Account Information</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class='font-weight-medium text-danger text-sm'>All fields with (*) asterisk mark are
                    required</span>
                <div id="form__validation__error__container"></div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label for="username" class="form-group has-float-label">
                            <input type="text" name="username" id="username" class="form-control"
                                value="{{ $account->username }}">
                            <span>
                                <strong>USERNAME
                                    <span class="text-danger">*</span>
                                </strong>
                            </span>
                        </label>
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-group has-float-label">
                            <input type="text" name="email" id="email" class="form-control"
                                value="{{ $account->email }}">
                            <span>
                                <strong>EMAIL
                                    <span class="text-danger">*</span>
                                </strong>
                            </span>
                        </label>
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-6">
                        <label for="password" class="form-group has-float-label">
                            <input type="password" name="password" id="password" class="form-control">
                            <span>
                                <strong>PASSWORD
                                </strong>
                            </span>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-group has-float-label">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                            <span>
                                <strong>RE-TYPE PASSWORD</strong>
                            </span>
                        </label>
                    </div>
                </div>
                <div class='float-right'>
                    <button class="btn btn-success shadow" id="btn__update__account__information">
                        <i class='la la-pencil'></i>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</diva>
@push('page-scripts')
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/js/moment.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
<script>
    $('#btn__update__account__information').click(function () {
        let data = {
            username: $('#username').val(),
            password: $('#password').val(),
            email: $('#email').val(),
            retypePassword: $('#password_confirmation').val(),
        };

        Object.keys(data).forEach((field) => $(`#${field}`).removeClass('is-invalid'));
        $('#form__validation__error__container').html('');

        $.ajax({
            url: `/employee-update-account-information`,
            method: 'PUT',
            data: data,
            success: function (response) {
                if (response.success) {
                    $('#username__field').text(data.username);
                    $('#email__field').text(data.email);
                    $('#email_text').text(data.email);
                    $('#account__info__modal').modal('toggle');
                    swal("Good Job!", "Successfully update your account information.", "success");
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    Object.keys(response.responseJSON.errors).forEach((field) => {
                        $(`#${field}`).addClass('is-invalid');
                        $('#form__validation__error__container').append(`
							<span class='text-danger text-sm'><br> • ${response.responseJSON.errors[field].join("<br> •")}</span>
						`);
                    });
                }
            }
        });
    });


    let table = $('#leave-history-table').DataTable({
        serverSide: true,
        stateSave: true,
        ajax: `/employee-leave-history/list`,
        processing: true,
        language: {
            processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> ',
        },
        pagingType: "full_numbers",
        columns: [{
                data: "date_applied",
                name: "date_applied",
                className: 'text-center font-weight-bold',
                render: function (data) {
                    return moment(data).format('MMMM DD, YYYY')
                }
            }, {
                data: "type.name",
                name: "leave_type_id",
                className: 'text-center'
            }, {
                data: "no_of_days",
                name: "no_of_days",
                className: 'text-center'
            }, {
                data: "date_from",
                type: "date_from",
                className: 'text-center',
                render: function (data) {
                    return moment(data).format('YYYY-MM-DD');
                }
            }, {
                data: "date_to",
                name: "date_to",
                className: 'text-center',
                render: function (data) {
                    return moment(data).format('YYYY-MM-DD');
                }
            }, {
                data: "approved_by",
                name: "approved_by",
                className: 'text-center',
            }, {
                data: "approved_for",
                name: "approved_for",
                className: 'text-center',
            },

        ],
    });

</script>
@endpush

@endsection

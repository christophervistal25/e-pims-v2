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
                                <img alt="" class='rounded-circle' src="{{ asset('/assets/img/profiles/' . $account->Employee_id . '.jpg') }}"></a>
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
                                            <div class="">{{ Str::limit($account->employee?->Address, 60, '...') }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Gender:</div>
                                            <div class="text-uppercase">{{ $account->employee?->Gender }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card tab-box rounded-0 border-0">
        <div class="row user-tabs">
            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item">
                        <a href="#emp_profile" data-toggle="tab" class="nav-link font-weight-bold active">Login Credentials</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div id="emp_profile" class="pro-overview tab-pane fade show active">
            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="card profile-box flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">
                              <button class='btn btn-success btn-sm float-right shadow' data-toggle="modal" data-target="#account__info__modal">
                                    EDIT
                              </button>
                              <div class="clearfix"></div>
                            </h3>
                            <ul class="personal-info">
                                <hr>
                                <li>
                                    <div class="title">Username</div>
                                    <div class="text" id="username__field">{{ $account->username }}</div>
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
    </div>
</div>

<!-- Account Info Modal -->
<div id="account__info__modal" class="modal  fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-left">
                    <h4 class="modal-title">Edit your Login Credentials</h4>
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
</div>
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
                    swal({
                        title : 'Sweet!',
                        text : 'Successfully udpate your login credentials',
                        icon : 'success',
                        buttons : false,
                        timer : 5000,
                    });
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

</script>
@endpush

@endsection

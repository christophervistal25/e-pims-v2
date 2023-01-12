<form id="addEmployeeForm">
    <div id="showAddEmployee">
        <div>
            <button class="btn btn-warning shadow-lg h5est text-white mb-2 rounded-circle" type="button" id="btn-add-back">
                <i class="las la-chevron-left"></i>
            </button>
            <div class="card shadow-none">
                <div class="card-header h4 bg-primary text-white">
                    Basic Information
                </div>
                <div class="card-body">
                    <img src="{{
                            asset('/storage/employee_images/no_image.png')
                        }}" width="20%" height="19%" class="border border-default p-2 float-right rounded cursor-pointer d-md-none d-lg-block" height="360px" />

                    <div class="row pb-0">
                        <div class="col-lg-12 pb-0">
                            <div class="form-group">
                                <label class="h5 required">EMPLOYEE ID</label>
                                <input type="number" id='newEmployeeID' name="employeeID" readonly value="{{ $lastEmployeeID }}" class="form-control" />
                                <span class="text-sm text-danger" id='employeeID-error'></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label class="text-uppercase h5 required">lastname</label>
                                <input type="text" name="lastname" class="form-control text-uppercase" />
                                <span class="text-sm text-danger" id='lastname-error'></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label class="text-uppercase h5 required">firstname</label>
                                <input type="text" name="firstname" class="form-control text-uppercase" />
                                <span class="text-sm text-danger" id='firstname-error'></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label class="text-uppercase h5">middlename</label>
                                <input type="text" name="middlename" class="form-control text-uppercase" />
                                <span class="text-sm text-danger" id='middlename-error'></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label class="text-uppercase h5 text-uppercase">suffix</label>
                                <input type="text" name="suffix" max="5" class="form-control" />
                                <span class="text-sm text-danger" id='suffix-error'></span>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-0">
                        <div class="col-lg-3 pb-0" style="padding-left : 3px;">
                            <div class="form-group">
                                <label class="text-uppercase h5 required">birthdate</label>
                                <input type="date" name="birthdate" class="form-control" />
                                <span class="text-sm text-danger" id="birthdate-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label class="text-uppercase h5 required">birthplace</label>
                                <input type="text" name="birthplace" class="form-control text-uppercase" />
                                <span class="text-sm text-danger" id="birthplace-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label class="text-uppercase h5 required">gender</label>
                                <select class="form-control form-select" name="gender">
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
                                <span class="text-sm text-danger" id="gender-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label class="text-uppercase h5 required">civil status</label>
                                <select class="form-control form-select" name="civil_status">
                                    <option value="SINGLE">SINGLE</option>
                                    <option value="MARRIED">MARRIED</option>
                                    <option value="WIDOWED">WIDOWED</option>
                                    <option value="DIVORCED">DIVORCED</option>
                                    <option value="SEPARATED">SEPARATED</option>
                                </select>
                                <span class="text-sm text-danger" id="civil_status-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="text-uppercase h5 required">address</label>
                            <textarea name="address" class="form-control" cols="30" rows="3"></textarea>
                            <span class="text-sm text-danger" id="address-error"></span>
                        </div>
                    </div>

                    <div class="row pb-0">
                        <div class="col-lg-6 pb-0">
                            <label class="text-uppercase h5">Contact #</label>
                            <input type="text" class="form-control" name="contact_no" maxlength="13" />
                            <span class="text-sm text-danger" id="contact_no-error"></span>
                        </div>

                        <div class="col-lg-6 pb-0">
                            <label class="text-uppercase h5 required">Active Status</label>
                            <select class="form-control" name="active_status">
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                            <span class="text-sm text-danger" id="active_status-error"></span>
                        </div>
                    </div>

                    <div class="row pb-0">
                        <div class="col-lg-6 pb-0">
                            <label class="h5 required">OFFICE CHARGING</label>
                            <select name="office_charging" id="add_form_office_charging" class="form-control form-select">
                                <option value="">-</option>
                            </select>
                            <span class="text-sm text-danger" id="office_charging-error"></span>
                        </div>
                        <div class="col-lg-6 pb-0">
                            <label class="h5 required">OFFICE ASSIGNMENT</label>
                            <select name="office_assignment" id="add_form_office_assignment" class="form-control form-select">
                                <option value="">-</option>
                            </select>
                            <span class="text-sm text-danger" id="office_assignment-error"></span>
                        </div>
                    </div>

                    <div class="row pb-0">
                        <div class="col-lg-6 pb-0">
                            <label class="h5 required">POSITION</label>
                            <select id="add_form_position" name="position" style="width : 100%;" class="form-control form-select">
                            </select>
                            <span class="text-sm text-danger" id="position-error"></span>
                        </div>

                        <div class="col-lg-6 pb-0">
                            <label class="h5 required">WORK STATUS</label>
                            <select name="status" style="width : 100%;" class="form-control form-select">
                                <option value="PLANTILLA">PLANTILLA</option>
                                <option value="CONTRACT OF SERVICE">CONTRACT OF SERVICE</option>
                                <option value="JOB ORDER">JOB ORDER</option>
                            </select>
                            <span class="text-sm text-danger" id="status-error"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <label class="h5">SALARY GRADE</label>
                            <select name="salary_grade" class="form-control form-select">
                                <option selected value="">-</option>
                                @foreach(range(1, 33) as $grade)
                                    <option value="{{ $grade }}">{{ $grade }}</option>
                                @endforeach
                            </select>
                            <span class="text-sm text-danger" id="salary_grade-error"></span>
                        </div>

                        <div class="col-lg-4">
                            <label class="h5">STEP INCREMENT</label>
                            <select name="step_increment" class="form-control form-select">
                                <option selected value="">-</option>
                                @foreach(range(1, 8) as $step)
                                    <option value="{{ $step }}">{{ $step }}</option>
                                @endforeach
                            </select>
                            <span class="text-sm text-danger" id="step_increment-error"></span>
                        </div>

                        <div class="col-lg-4">
                            <label class="h5 required">SALARY RATE</label>
                            <input name="salary_rate" class="form-control" type="number" />
                            <span class="text-sm text-danger" id="salary_rate-error"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none">
            <div class="card-header text-white bg-primary h4">
                Social Insurance
            </div>

            <div class="card-body">
                <div class="row p-0">
                    <div class="col-lg-6 pb-0">
                        <div class="form-group">
                            <label class="h5 text-uppercase">
                                Phil Health #
                            </label>
                            <input type="text" name="philhealth_no" class="form-control  {{ $errors->first('philhealth_no') ? 'is-invalid' : '' }}" value="{{ old('philhealth_no') }}" />
                            <span class="text-sm text-danger" id="philhealth_no-error"></span>
                        </div>
                    </div>

                    <div class="col-lg-6 pb-0">
                        <div class="form-group">
                            <label class="h5 text-uppercase">
                                Pag-Ibig #
                            </label>
                            <input type="text" name="pagibig_no" class="form-control  {{ $errors->has('pagibig_no') ? 'is-invalid' : '' }}" value="{{ old('pagibig_no') }}" />
                            <span class="text-sm text-danger" id="pagibig_no-error"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-uppercase h5">
                                tin #
                            </label>
                            <input type="text" name="tin_no" class="form-control  {{ $errors->has('tin_no') ? 'is-invalid' : '' }}" value="{{ old('tin_no') }}" />
                            <span class="text-sm text-danger" id="tin_no-error"></span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-uppercase h5">
                                GSIS #
                            </label>
                            <input type="text" name="gsis_no" class="form-control  {{ $errors->has('gsis_no') ? 'is-invalid' : '' }}" value="{{ old('gsis_no') }}" />
                            <span class="text-sm text-danger" id="gsis_no-error"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none mb-2">
            <div class="card-header text-white bg-primary h4">
                Login Credentials
            </div>

            <div class="card-body">
                <div class="row p-0">
                    <div class="col-lg-12 pb-0">
                        <div class="form-group">
                            <label class="h5 text-uppercase">
                                Username
                            </label>
                            <input type="text" name="username" class="form-control  {{ $errors->first('username') ? 'is-invalid' : '' }}" value="{{ old('username') }}" />
                            <span class="text-sm text-danger" id='username-error'></span>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-uppercase h5">
                                Password
                            </label>
                            <input type="password" name="password" class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{ old('password') }}" />
                            <span class="text-sm text-danger" id='password-error'></span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="text-uppercase h5">
                                Re-type Password
                            </label>
                            <input type="password" name="password_confirmation" class="form-control  {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" value="{{ old('password_confirmation') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <button class="btn btn-primary btn-lg h5 shadow float-right " id="submitNewEmployee">
            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id='btnUpdateSpinner'></span>
            SUBMIT
        </button>
    </div>
</form>

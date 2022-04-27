<form id="updateEmployeeForm">
    <div id="showEmployee">
        <div>
            <button class="btn btn-warning shadow-lg h5est text-white mb-2 rounded-circle" type="button" id="btn-back">
                <i class="las la-chevron-left"></i>
            </button>
            <div class="card shadow-none">
                <div class="card-header h4">
                    BASIC INFORMATION
                </div>
                <div class="card-body">
                    <img id="employeeImage" src="{{
                            asset('/storage/employee_images/no_image.png')
                        }}" width="20%" height="19%" class="border border-default float-right p-2 rounded cursor-pointer" height="360px" />

                    <div class="row pb-0">
                        <div class="col-lg-12 pb-0" style="padding-left : 3px;">
                            <div class="form-group">
                                <label for="employeeID" class="h5 required">EMPLOYEE ID</label>
                                <input type="number" id="employeeID" name="employeeID" class="form-control" />
                                <span class="text-sm text-danger" id="employeeID-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0" style="padding-left : 3px;">
                            <div class="form-group">
                                <label for="lastname" class="text-uppercase h5 required">lastname</label>
                                <input type="text" id="lastname" name="lastname" class="form-control" />
                                <span class="text-sm text-danger" id="lastname-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label for="firstname" class="text-uppercase h5 required">firstname</label>
                                <input type="text" id="firstname" name="firstname" class="form-control" />
                                <span class="text-sm text-danger" id="firstname-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label for="middlename" class="text-uppercase h5">middlename</label>
                                <input type="text" id="middlename" name="middlename" class="form-control" />
                                <span class="text-sm text-danger" id="middlename-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label for="suffix" class="text-uppercase h5">suffix</label>
                                <input type="text" id="suffix" name="suffix" class="form-control" />
                                <span class="text-sm text-danger" id="suffix-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-0">
                        <div class="col-lg-3 pb-0" style="padding-left : 3px;">
                            <div class="form-group">
                                <label for="birthdate" class="text-uppercase h5 required">birthdate</label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control" />
                                <span class="text-sm text-danger" id="birthdate-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label for="birthplace" class="text-uppercase h5 required">birthplace</label>
                                <input type="text" id="birthplace" name="birthplace" class="form-control" />
                                <span class="text-sm text-danger" id="birthplace-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label for="gender" class="text-uppercase h5 required">gender</label>
                                <select class="form-control form-select" name="gender" id="gender">
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
                                <span class="text-sm text-danger" id="gender-error"></span>
                            </div>
                        </div>

                        <div class="col-lg-3 pb-0">
                            <div class="form-group">
                                <label for="civil_status" class="text-uppercase h5 required">civil status</label>
                                <select class="form-control form-select" name="civil_status" id="civil_status">
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
                            <label for="address" class="text-uppercase h5 required">address</label>
                            <textarea name="address" id="address" class="form-control" cols="30" rows="3"></textarea>
                            <span class="text-sm text-danger" id="address-error"></span>
                        </div>
                    </div>

                    <div class="row pb-0">
                        <div class="col-lg-6 pb-0">
                            <label for="contact_no" class="text-uppercase h5 required">Contact #</label>
                            <input type="text" class="form-control" name="contact_no" id="contact_no" maxlength="13" />
                            <span class="text-sm text-danger" id="contact_no-erorr"></span>
                        </div>

                        <div class="col-lg-6 pb-0">
                            <label for="active_status" class="text-uppercase h5 required">Active Status</label>
                            <select class="form-control" name="active_status" id="active_status">
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                            <span class="text-sm text-danger" id="active_status-error"></span>
                        </div>
                    </div>

                    <div class="row pb-0">
                        <div class="col-lg-6 pb-0">
                            <label for="office_charging" class="h5 required">OFFICE CHARGING</label>
                            <select name="office_charging" id="office_charging" class="form-control form-select">
                                <option value="">-</option>
                            </select>
                            <span class="text-sm text-danger" id="office_charging-error"></span>
                        </div>
                        <div class="col-lg-6 pb-0">
                            <label for="office_assignment" class="h5 required">OFFICE ASSIGNMENT</label>
                            <select name="office_assignment" id="office_assignment" class="form-control form-select">
                                <option value="">-</option>
                            </select>
                            <span class="text-sm text-danger" id="office_assignment-error"></span>
                        </div>
                    </div>

                    <div class="row pb-0">
                        <div class="col-lg-6 pb-0">
                            <label for="position" class="h5 required">POSITION</label>
                            <select name="position" style="width : 100%;" id="position" class="form-control form-select">
                            </select>
                            <span class="text-sm text-danger" id="position-error"></span>
                        </div>

                        <div class="col-lg-6 pb-0">
                            <label for="position" class="h5 required">WORK STATUS</label>
                            <select name="status" style="width : 100%;" id="status" class="form-control form-select">
                                <option value="JOB ORDER">JOB ORDER</option>
                                <option value="CONTRACT OF SERVICE">CONTRACT OF SERVICE</option>
                                <option value="CASUAL">CASUAL</option>
                                <option value="CO-TERMINUS">CO-TERMINUS</option>
                                <option value="COTERMINOUS TEMPORARY">COTERMINOUS TEMPORARY</option>
                                <option value="ELECTED">ELECTED</option>
                                <option value="PERMANENT">PERMANENT</option>
                            </select>
                            <span class="text-sm text-danger" id="status-error"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="salary_grade" class="h5 required">SALARY GRADE</label>
                            <select name="salary_grade" id="salary_grade" class="form-control form-select">
                                <option selected value="">-</option>
                                @foreach(range(1, 33) as $grade)
                                <option value="{{ $grade }}">{{
                                    $grade
                                }}</option>
                                @endforeach
                            </select>
                            <span class="text-sm text-danger" id="salary_grade-error"></span>
                        </div>

                        <div class="col-lg-4">
                            <label for="step_increment" class="h5 required">STEP INCREMENT</label>
                            <select name="step_increment" id="step_increment" class="form-control form-select">
                                <option selected value="">-</option>
                                @foreach(range(1, 8) as $step)
                                <option value="{{ $step }}">{{ $step }}</option>
                                @endforeach
                            </select>
                            <span class="text-sm text-danger" id="step_increment-error"></span>
                        </div>

                        <div class="col-lg-4">
                            <label for="salary_rate" class="h5 required">SALARY RATE</label>
                            <input name="salary_rate" id="salary_rate" class="form-control" />
                            <span class="text-sm text-danger" id="salary_rate-error"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none">
            <div class="card-header h4">
                SOCIAL INSURANCE
            </div>

            <div class="card-body">
                <div class="row p-0">
                    <div class="col-lg-6 pb-0">
                        <div class="form-group">
                            <label for="philHealthNo" class="h5 text-uppercase">
                                Phil Health #
                            </label>
                            <input type="text" name="philhealth_no" class="form-control  {{ $errors->first('philhealth_no') ? 'is-invalid' : '' }}" id="philHealthNo" value="{{ old('philhealth_no') }}" />
                        </div>
                    </div>

                    <div class="col-lg-6 pb-0">
                        <div class="form-group">
                            <label for="pagIbigNo" class="h5 text-uppercase">
                                Pag-Ibig #
                            </label>
                            <input type="text" name="pagibig_no" class="form-control  {{ $errors->has('pagibig_no') ? 'is-invalid' : '' }}" id="pagIbigNo" value="{{ old('pagibig_no') }}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tinNo" class="text-uppercase h5">
                                tin #
                            </label>
                            <input type="text" name="tin_no" class="form-control  {{ $errors->has('tin_no') ? 'is-invalid' : '' }}" id="tinNo" value="{{ old('tin_no') }}" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="gsisNo" class="text-uppercase h5">
                                GSIS #
                            </label>
                            <input type="text" name="gsis_no" class="form-control  {{ $errors->has('gsis_no') ? 'is-invalid' : '' }}" id="gsisNo" value="{{ old('gsis_no') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-none mb-0">
            <div class="card-header h4">
                BANK DETAILS
            </div>
            <div class="card-body">
                <section>
                    <div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="cardNumber" class="h5 text-uppercase required">
                                        DBP Card Number
                                    </label>
                                    <input type="text" name="dbp_account_no" class="form-control" id="dbpCardNumber" />
                                    <span class="text-sm text-danger" id="dbp_account_no-error"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="cardNumber" class="text-uppercase h5 required">
                                        LBP Card Number
                                    </label>
                                    <input type="text" name="lbp_account_no" class="form-control" id="lbpCardNumber" />
                                    <span class="text-sm text-danger" id="lbp_account_no-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <button class="btn btn-success btn-lg h5 shadow float-right my-3" id="btnUpdateEmployee">
            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id='btnUpdateSpinner'></span>
            UPDATE
        </button>
    </div>
</form>

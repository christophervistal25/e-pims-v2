@extends('layouts.app')
@section('title', 'ID CARD PRODUCTION')
@prepend('page-css')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('/css/bootstrap-float-label.min.css') }}" />
<link rel="stylesheet" href="/assets/css/custom.css" />
<link rel="stylesheet" href="/assets/css/style.css">
<style>
      .btn-primarys {
            background-color: #FF9B44;
            color: white;
      }

      .btn-primarys:hover {
            background-color: #FF8544;
            color: white;
      }

</style>
@endprepend
@section('content')
<div class="row">
      <div class="d-flex col-lg-4">
            <div class="flex-fill">
                  <div class="card h-100">
                        <div class="card-body">
                              <div class="row">
                                    <div class="col-lg-12 text-center">
                                          <img class="mb-3 rounded-circle img-thumbnail" src="" width="50%" />
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="col-lg-12">
                                          <label for="empName" class="form-group has-float-label bg-light">
                                                <select class="form-control selectpicker" data-live-search="true" name="employeeName" id="employeeName" data-size="6" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                                      <option value="">Search name here</option>
                                                      @foreach($employees as $employee)
                                                      <option
                                                            data-office="{{ $employee->offices->office_name }}"
                                                            data-officeHead="{{ $employee->offices->office_head }}"
                                                            data-position="{{ $employee?->position?->Description }}"
                                                            data-employeeId="{{ $employee->Employee_id }}"
                                                            value="{{ $employee->Employee_id }}">{{ $employee->LastName }},
                                                            {{ $employee->FirstName }} {{ $employee->MiddleName }} </option>
                                                      @endforeach
                                                </select>
                                                <span><strong>EMPLOYEE NAME</strong></span>
                                          </label>

                                          <label for="office" class="form-group has-float-label">
                                                <input type="text" name="office" id="office" class="form-control bg-light" style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                                <span class="font-weight-bold">OFFICE</span>
                                          </label>
                                          <label for="position" class="form-group has-float-label">
                                                <input type="text" name="position" id="position" class="form-control bg-light" style="outline: none; box-shadow: 0px 0px 0px transparent;" readonly>
                                                <span class="font-weight-bold">POSITION</span>
                                          </label>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>

@push('page-scripts')
<script src="{{ asset('/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/js/moment.js') }}"></script>
<script src="{{ asset('/assets/libs/winbox/winbox.bundle.js') }}"></script>
@endpush
@endsection

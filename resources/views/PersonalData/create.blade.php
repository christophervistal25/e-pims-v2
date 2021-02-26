<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@extends('layouts.app')
@section('title', 'Create Personal Data Sheet')
@prepend('page-css')
<style>

    .checkbox-parent {
        transition: background 300ms;
    }
    .checkbox-parent:hover {
        background :#EAEAEA;
    }
</style>
@endprepend
@section('content')

<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-solid nav-justified">
            <li class="nav-item"><a class="nav-link" href="#c1-tab" data-toggle="tab">C1</a></li>
            <li class="nav-item"><a class="nav-link" href="#c2-tab" data-toggle="tab">C2</a></li>
            <li class="nav-item"><a class="nav-link" href="#c3-tab" data-toggle="tab">C3</a></li>
            <li class="nav-item"><a class="nav-link active" href="#c4-tab" data-toggle="tab">C4</a></li>
        </ul>
        <div class="tab-content">
            {{-- BEGIN OF C1 --}}
            <div class="tab-pane" id="c1-tab">
                {{-- BEGIN OF ACCORDION FOR C1 --}}
                <div id="accordion">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#personalInformation" aria-expanded="true" aria-controls="personalInformation">
                            PERSONAL INFORMATION
                          </button>
                        </h5>
                      </div>

                      <div id="personalInformation" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <div class="alert alert-secondary text-center" role="alert" >PERSONAL INFORMATION</div>
                            <form class="row">
                              <div class="form-group col-sm-3">
                                <label for="surname">SURNAME</label><span class="text-danger">*</span>
                                  <input type="text" class="form-control" id="surname" placeholder="Enter Surname">
                                </div>
                              <div class="form-group col-sm-3">
                                <label for="firstname">FIRST NAME</label><span class="text-danger"><span class="text-danger">*</span>
                                  <input type="text" class="form-control" id="firstname" placeholder="Enter First Name">
                                </div>
                              <div class="form-group col-sm-3">
                                <label for="middlename">MIDDLE NAME</label><span class="text-danger"><span class="text-danger">*</span>
                                  <input type="text" class="form-control" id="middlename" placeholder="Enter Middle Name">
                                </div>
                              <div class="form-group col-sm-3">
                                <label for="nameextension">NAME EXTENSION</label><span class="text-danger">
                                  <input type="text" class="form-control"  maxlength="3" 
                                  id="nameextension" placeholder="(JR.,SR.)">
                                </div>
                                </form>
                                <form>
                                  <div class="form-row">
                                    <div class="form-group">
                                    <label for="dateofbirth">DATE OF BIRTH</label><span class="text-danger">*</span>
                                    <input id="datepicker" width="276"/>
                                      <script>
                                        $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                        });
                                      </script>
                                      </div>
                                      <div class="form-group col-sm-8">
                                  <label for="placeofbirth">PLACE OF BIRTH</label><span class="text-danger">*</span>
                                      <input type="text" class="form-control" id="placeofbirth" placeholder="Enter Place of Birth">
                                    </div>
                                  </div>
                              </form>
                              <form>
                                <div class="form-row">
                                  <div class="form-group col-sm-6">
                                  <label for="sex">SEX</label><span class="text-danger">*</span>
                                    <select class="form-control" id="sex">
                                      <option value="MALE">MALE</option>
                                      <option value="FEMALE">FEMALE</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                      <label for="status">STATUS</label><span class="text-danger">*</span>
                                        <select class="form-control" id="status">
                                          <option value="SINGLE">SINGLE</option>
                                          <option value="MARRIED">MARRIED</option>
                                          <option value="WIDOWED">WIDOWED</option>
                                          <option value="SEPARATED">SEPARATED</option>
                                          <option value="OTHERS">OTHERS</option>
                                        </select>
                                    </div>
                                </div>
                              </form>
                              <form class="row">
                                      <div class="form group col-sm-4">
                                        <label for="height">HEIGHT</label><span class="text-danger">*</span>
                                          <input type="text" id="height" class="form-control" placeholder="Enter height in meter">
                                      </div>
                                      <div class="form-group col-sm-4">
                                        <label for="weight">WEIGHT</label><span class="text-danger">*</span>
                                          <input type="text" name="weight" id="weight" class="form-control" placeholder="Enter weight in kilogram">
                                      </div>
                                        <div class="form-group col-sm-4">
                                        <label for="bloodtype">BLOODTYPE</label><span class="text-danger">*</span>
                                          <input type="text" name="bloodtype" id="bloodtype" class=form-control placeholder="Enter bloodtype">
                                      </div>
                                    </form>
                                    <form class="row">
                                      <div class="form-group col-sm-4">
                                        <label for="gsisidno">GSIS ID NUMBER</label><span class="text-danger">*</span>
                                          <input type="text" name="gsisidno" id="gsisidno" class=form-control placeholder="Enter GSIS ID No.">
                                      </div>
                                      <div class="form-group col-sm-4">
                                        <label for="pagibigidno">PAG-IBIG ID NUMBER</label><span class="text-danger">*</span>
                                          <input type="text" name="pagibigidno" id="pagibigidno" class=form-control placeholder="Enter PAG-IBIG ID No.">
                                      </div>
                                      <div class="form-group col-sm-4">
                                        <label for="philhealthidno">PHILHEALTH ID NUMBER</label><span class="text-danger">*</span>
                                          <input type="text" name="philhealthidno" id="philhealthidno" class=form-control placeholder="Enter PHILHEALTH ID No.">
                                      </div>
                                    </form>
                                    <form class="row">
                                      <div class="form-group col-sm-4">
                                        <label for="sssidno">SSS ID NUMBER</label><span class="text-danger">*</span>
                                          <input type="text" name="sssidno" id="sssidno" class=form-control placeholder="Enter SSS ID No.">
                                      </div>
                                      <div class="form-group col-sm-4">
                                        <label for="tinidno">TIN ID NUMBER</label><span class="text-danger">*</span>
                                          <input type="text" name="tinidno" id="tinidno" class=form-control placeholder="Enter TIN ID No.">
                                      </div>
                                      <div class="form-group col-sm-4">
                                        <label for="agencyempidno">AGENCY EMPLOYEE NUMBER</label><span class="text-danger">*</span>
                                          <input type="text" name="agencyempidno" id="agencyempidno" class=form-control placeholder="Enter agency employee no.">
                                      </div>
                                    </form>
                                    <form>
                                      <div class="form-row">
                                        <div class="form-group col-sm-6">
                                          <label for="citizenship">CITIZENSHIP</label><span class="text-danger">*</span>
                                            <select class="form-control" id="citizenship">
                                              <option value="FILIPINO">FILIPINO</option>
                                              <option value="DUAL CITIZEN">DUAL CITIZEN</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                          <label for="citizenshipby">BY</label><span class="text-danger">*</span>
                                            <select class="form-control" id="citizenshipby">
                                              <option value="BIRTH">BIRTH</option>
                                              <option value="NATURALIZATION">NATURALIZATION</option>
                                            </select>
                                        </div>
                                        </div>
                                    </form>
                                    <form>
                                      <div class="alert alert-secondary text-center" role="alert" >RESIDENTIAL ADDRESS</div>
                                      <div class="row">
                                        <div class="form-group col-sm-4">
                                          <label for="lotno">HOUSE/BLOCK/LOT NO.</label><span class="text-danger">*</span>
                                          <input type="text" name="lotno" id="lotno" class=form-control placeholder="Enter house/block/lot no.">
                                        </div>
                                        <div class="form-group col-sm-4">
                                          <label for="street">STREET</label><span class="text-danger">*</span>
                                          <input type="text" name="street" id="street" class=form-control placeholder="Enter Street">
                                        </div>
                                        <div class="form-group col-sm-4">
                                          <label for="subdivision">SUBDIVISION/VILLAGE</label><span class="text-danger">*</span>
                                          <input type="text" name="subdivision" id="subdivision" class=form-control placeholder="Enter Subdivision or Village">
                                        </div>
                                      </div>
                                    </form>
                                    <form>
                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                          <label for="barangay">BARANGAY</label><span class="text-danger">*</span>
                                          <input type="text" name="barangay" id="barangay" class=form-control placeholder="Enter Barangay">
                                        </div>
                                        <div class="form-group col-sm-3">
                                          <label for="city">CITY/MUNICIPALITY</label><span class="text-danger">*</span>
                                          <input type="text" name="city" id="city" class=form-control placeholder="Enter City or Municipality">
                                        </div>
                                        <div class="form-group col-sm-3">
                                          <label for="province">PROVINCE</label><span class="text-danger">*</span>
                                          <input type="text" name="province" id="province" class=form-control placeholder="Enter Province">
                                        </div>
                                        <div class="form-group col-sm-3">
                                        <label for="zipcode">ZIP CODE</label><span class="text-danger">*</span>
                                          <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Enter Zipcode">
                                        </div>
                                      </div>
                                    </form>
                                    </form>
                                    <form>
                                    <div class="form-group">
                                    <div class="alert alert-secondary text-center" role="alert">PERMANENT ADDRESS</div>
                                      <label class="checkbox-inline">
                                      <input type="checkbox" name="sameadd">SAME AS ABOVE
                                      </label>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col-sm-4">
                                          <label for="lotno">HOUSE/BLOCK/LOT NO.</label><span class="text-danger">*</span>
                                          <input type="text" name="lotno" id="lotno" class=form-control placeholder="Enter house/block/lot no.">
                                        </div>
                                        <div class="form-group col-sm-4">
                                          <label for="street">STREET</label><span class="text-danger">*</span>
                                          <input type="text" name="street" id="street" class=form-control placeholder="Enter Street">
                                        </div>
                                        <div class="form-group col-sm-4">
                                          <label for="subdivision">SUBDIVISION/VILLAGE</label><span class="text-danger">*</span>
                                          <input type="text" name="subdivision" id="subdivision" class=form-control placeholder="Enter Subdivision or Village">
                                        </div>
                                        </div>
                                        </form>
                                        <form>
                                      <div class="row">
                                        <div class="form-group col-sm-3">
                                          <label for="barangay">BARANGAY</label><span class="text-danger">*</span>
                                          <input type="text" name="barangay" id="barangay" class=form-control placeholder="Enter Barangay">
                                        </div>
                                    <div class="form-group col-sm-3">
                                          <label for="city">CITY/MUNICIPALITY</label><span class="text-danger">*</span>
                                          <input type="text" name="city" id="city" class=form-control placeholder="Enter City or Municipality">
                                        </div>
                                        <div class="form-group col-sm-3">
                                          <label for="province">PROVINCE</label><span class="text-danger">*</span>
                                          <input type="text" name="province" id="province" class=form-control placeholder="Enter Province">
                                        </div>
                                        <div class="form-group col-sm-3">
                                        <label for="zipcode">ZIP CODE</label><span class="text-danger">*</span>
                                          <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Enter Zipcode">
                                        </div>
                                        <form class="row">
                                          <div class="form-group col-sm-4">
                                            <label for="telno">TELEPHONE NUMBER</label>
                                              <input type="text" id="telno" class="form-control" placeholder="Enter Telephone Number">
                                          </div>
                                          <div class="form-group col-sm-4">
                                            <label for="mobileno">MOBILE NUMBER</label><span class="text-danger">*</span>
                                              <input type="text" id="mobileno" class="form-control" placeholder="Enter Telephone Number">
                                          </div>
                                          <div class="form-group col-sm-4">
                                            <label for="email">EMAIL ADDRESS</label>
                                              <input type="email" id="email" class="form-control" placeholder="Optional">
                                          </div>
                                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#workExperience" aria-expanded="false" aria-controls="workExperience">
                            FAMILY BACKGROUND
                          </button>
                        </h5>
                      </div>
                      <div id="workExperience" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                          <div class="alert alert-secondary text-center" role="alert">FAMILY BACKGROUND</div>
                        
                        <form class="p-3">
                        <div class="row">
                          <div class="form-group col-sm-3">
                            <label for="ssurname">SPOUSE'S SURNAME</label>
                              <input type="text" class="form-control " id="ssurname" name="ssurname" placeholder="Enter Spouse's Surname" value="">
                          </div>
                          <div class="form-group col-sm-3 ">
                            <label for="sfirstname">SPOUSE'S FIRST NAME</label>
                              <input type="text" class="form-control  " id="sfirstname" name="sfirstname" placeholder="Enter Spouse's First Name" value="">
                          </div>
                          <div class="form-group col-sm-3">
                            <label for="smiddleame">SPOUSE'S MIDDLE NAME</label>
                              <input type="text" class="form-control " id="smiddleame" name="smiddleame" placeholder="Enter Spouse's Middle Name" value="">
                            </div>
                            <div class="form-group">
                              <label for="snameexten">SPOUSE'S NAME EXTENSION</label>
                                <input type="text" maxlength="3" class="form-control " id="snameexten" name="snameexten" placeholder="(JR., SR.)" value="">
                            </div>
                          </div>
                          </form>

                          <form class="p-3">
                            <div class="row">
                              <div class="form-group col-sm-6">
                                <label for="soccupation">SPOUSE'S OCCUPATION</label>
                                  <input type="text" class="form-control" id="soccupation" placeholder="Enter Spouse's Occupation">
                              </div>
                              <div class="form-group col-sm-6">
                                <label for="sempname">SPOUSE'S EMPLOYER/BUSINESS NAME</label>
                                  <input type="text" class="form-control" id="sempname" placeholder="Enter Spouse's Employer/Business Name">
                              </div>
                            </div>
                          </form>
                          <form class="p-3">
                          <div class="row">
                              <div class="form-group col-sm-6">
                              <label for="sbusadd">SPOUSE'S BUSINESS ADDRESS</label>
                                <input type="text" class="form-control" id="sbusadd" placeholder="Enter Spouse's Business Address">
                              </div>
                              <div class="form-group col-sm-6">
                              <label for="stelno">SPOUSE'S TELEPHONE NUMBER</label>
                                <input type="text" class="form-control" id="stelno" placeholder="Enter Spouse's Business Address">
                            </div>
                          </form>
                          

                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#educationalBackground" aria-expanded="false" aria-controls="educationalBackground">
                          EDUCATIONAL BACKGROUND
                        </button>
                      </h5>
                      </div>
                      <div id="educationalBackground" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Educational Background
                        </div>
                      </div>
                    </div>
                  </div>
                {{-- END OF ACCORDION FOR C1 --}}
            </div>
            {{-- END OF C1 --}}
            <div class="tab-pane" id="c2-tab">
                @include('PersonalData.sections.C2')
            </div>
            <div class="tab-pane" id="c3-tab">
                @include('PersonalData.sections.C3')
            </div>
            <div class="tab-pane show active" id="c4-tab">
                @include('PersonalData.sections.C4')
            </div>
        </div>
    </div>
</div>


@push('page-scripts')
<script src="/assets/js/custom/create-person-data.js"></script>
@endpush
@endsection

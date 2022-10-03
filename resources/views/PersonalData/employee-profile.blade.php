@extends('layouts.app-vue')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
@endprepend
@section('content')
<link rel="stylesheet" href="{{ asset('css/bootstrap-float-label.css') }}">
<div class="tab-content">

    <!-- Profile Info Tab -->
    <div id="emp_profile" class="pro-overview tab-pane fade show active">
        <div class="card mb-0 rounded-0 shadow-none">
            <div class="card-body rounded-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">John Doe</h3>
                                            <h6 class="text-muted">UI/UX Design Team</h6>
                                            <small class="text-muted">Web Designer</small>
                                            <div class="staff-id">Employee ID : FT-0001</div>
                                            <div class="small doj text-muted">Date of Join : 1st Jan 2013</div>
                                            <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Phone:</div>
                                                <div class="text"><a href="">9876543210</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Email:</div>
                                                <div class="text"><a href="">johndoe@example.com</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Birthday:</div>
                                                <div class="text">24th July</div>
                                            </li>
                                            <li>
                                                <div class="title">Address:</div>
                                                <div class="text">1861 Bayonne Ave, Manchester Township, NJ, 08759</div>
                                            </li>
                                            <li>
                                                <div class="title">Gender:</div>
                                                <div class="text">Male</div>
                                            </li>
                                            <li>
                                                <div class="title">Reports to:</div>
                                                <div class="text">
                                                   <div class="avatar-box">
                                                      <div class="avatar avatar-xs">
                                                         <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                                      </div>
                                                   </div>
                                                   <a href="profile.html">
                                                        Jeffery Lalor
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 d-flex">

                <div class="card profile-box flex-fill rounded-0 rounded-bottom border-top-0">
                    <div class="card-body">
                        <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal"
                                data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                        <ul class="personal-info">
                            <li>
                                <div class="title">Surname</div>
                                <div class="text">surname</div>
                            </li>
                            <li>
                                <div class="title">First Name</div>
                                <div class="text">fname</div>
                            </li>
                            <li>
                                <div class="title">Middle Name</div>
                                <div class="text">mname</div>
                            </li>
                            <li>
                                <div class="title">Extension Name</div>
                                <div class="text">III</div>
                            </li>
                            <li>
                                <div class="title">Date of Birth</div>
                                <div class="text">February 24, 1987</div>
                            </li>
                            <li>
                                <div class="title">Place of Birth</div>
                                <div class="text">Lorem</div>
                            </li>
                            <li>
                                <div class="title">Citizenship</div>
                                <div class="text">sikrit</div>
                            </li>
                            <li>
                                <div class="title">Sex</div>
                                <div class="text">m</div>
                            </li>
                            <li>
                                <div class="title">Height</div>
                                <div class="text">sikrit</div>
                            </li>
                            <li>
                                <div class="title">Weight</div>
                                <div class="text">m</div>
                            </li>
                            <li>
                                <div class="title">Bloodtype</div>
                                <div class="text">sikrit</div>
                            </li>
                            <li>
                                <div class="title">Civil Status</div>
                                <div class="text">sikrit</div>
                            </li>
                            <li>
                                <div class="title">Telephone Number</div>
                                <div class="text">m</div>
                            </li>
                            <li>
                                <div class="title">Mobile Number</div>
                                <div class="text">sikrit</div>
                            </li>
                            <li>
                                <div class="title">Email Address</div>
                                <div class="text">sikrit</div>
                            </li>
                            <li>
                                <div class="title">Trans No</div>
                                <div class="text">sikrit</div>
                            </li>
                            <li>
                                <div class="title">Agency Employee No</div>
                                <div class="text">sikrit</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill rounded-0 rounded-bottom border-top-0">
                    <div class="card-body">
                        <h3 class="card-title">Address<a href="#" class="edit-icon" data-toggle="modal"
                                data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                        <h5 class="section-title">Residential Address</h5>
                        <ul class="personal-info">
                            <li>
                                <div class="title">Residential House No</div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur</div>
                            </li>
                            <li>
                                <div class="title">Residential Street</div>
                                <div class="text">Lorem ipsum dolor</div>
                            </li>
                            <li>
                                <div class="title">Residential Village</div>
                                <div class="text">9876543210</div>
                            </li>
                            <li>
                                <div class="title">Residential Province</div>
                                <div class="text">Province</div>
                            </li>
                            <li>
                                <div class="title">Residential City</div>
                                <div class="text">Lorem ipsum dolor</div>
                            </li>
                            <li>
                                <div class="title">Residential Barangay</div>
                                <div class="text">Barangay</div>
                            </li>
                            <li>
                                <div class="title">Residential Zip Code</div>
                                <div class="text">Zip Code</div>
                            </li>
                        </ul>
                        <hr>
                        <h5 class="section-title">Permanent Address</h5>
                        <ul class="personal-info">
                            <li>
                                <div class="title">Permanent House No</div>
                                <div class="text">Karen Wills</div>
                            </li>
                            <li>
                                <div class="title">Permanent Street</div>
                                <div class="text">Brother</div>
                            </li>
                            <li>
                                <div class="title">Permanent Village</div>
                                <div class="text">9876543210, 9876543210</div>
                            </li>
                            <li>
                                <div class="title">Permanent Province</div>
                                <div class="text">Karen Wills</div>
                            </li>
                            <li>
                                <div class="title">Permanent City</div>
                                <div class="text">Brother</div>
                            </li>
                            <li>
                                <div class="title">Permanent Barangay</div>
                                <div class="text">9876543210, 9876543210</div>
                            </li>
                            <li>
                                <div class="title">Permanent Zip Code</div>
                                <div class="text">9876543210, 9876543210</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Government Issued Numbers</h3>
                        <ul class="personal-info">
                            <li>
                                <div class="title">GSIS BP NO</div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur</div>
                            </li>
                            <li>
                                <div class="title">GSIS ID NO</div>
                                <div class="text">1Lorem ipsum dolor</div>
                            </li>
                            <li>
                                <div class="title">GSIS POLICY NO</div>
                                <div class="text">ICI24504</div>
                            </li>
                            <li>
                                <div class="title">PAG-IBIG NO</div>
                                <div class="text">TC000Y56</div>
                            </li>
                            <li>
                                <div class="title">PHILHEALTH NO</div>
                                <div class="text">TC000Y56</div>
                            </li>
                            <li>
                                <div class="title">SSS NO</div>
                                <div class="text">TC000Y56</div>
                            </li>
                            <li>
                                <div class="title">TIN NO</div>
                                <div class="text">1Lorem ipsum dolor</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Family Background <a href="#" class="edit-icon" data-toggle="modal"
                                data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                        <div class="table-responsive">
                            <table class="table table-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Relationship</th>
                                        <th>Date of Birth</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Leo</td>
                                        <td>Brother</td>
                                        <td>Feb 16th, 2019</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a aria-expanded="false" data-toggle="dropdown"
                                                    class="action-icon dropdown-toggle" href="#"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a>
                                                    <a href="#" class="dropdown-item"><i
                                                            class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Educational Background<a href="#" class="edit-icon" data-toggle="modal"
                                data-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Elementary</a>
                                            <div>Barangay Elem School</div>
                                            <span class="time">2000 - 2003</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Secondary</a>
                                            <div>National High School</div>
                                            <span class="time">2000 - 2003</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">College</a>
                                            <div>Computer Science</div>
                                            <span class="time">2000 - 2003</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card profile-box flex-fill">
                    <div class="card-body">
                        <h3 class="card-title">Work Experience <a href="#" class="edit-icon" data-toggle="modal"
                                data-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Web Designer at Zen Corporation</a>
                                            <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Web Designer at Ron-tech</a>
                                            <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <a href="#/" class="name">Web Designer at Dalt Technology</a>
                                            <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Profile Info Tab -->
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">Civil Service Eligibility <a href="#" class="edit-icon" data-toggle="modal"
                            data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-sm">CAREER SERVICE</th>
                                    <th class="text-sm">DATE OF EXAMINATION</th>
                                    <th class="text-sm">PLACE OF EXAMINATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Leo</td>
                                    <td>Brother</td>
                                    <td>Feb 16th, 2019</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">Voluntary Work <a href="#" class="edit-icon" data-toggle="modal"
                            data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-sm">NAME OF ORGANIZATION</th>
                                    <th class="text-sm">FROM</th>
                                    <th class="text-sm">TO</th>
                                    <th class="text-sm">NUMBER OF HOURS</th>
                                    <th class="text-sm">POSITION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Leo</td>
                                    <td>Brother</td>
                                    <td>Feb 16th, 2019</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED <a
                            href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i
                                class="fa fa-pencil"></i></a></h3>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-sm">TRAINING PROGRAMS</th>
                                    <th class="text-sm">FROM</th>
                                    <th class="text-sm">TO</th>
                                    <th class="text-sm">NUMBES OF HOURS</th>
                                    <th class="text-sm">TO</th>
                                    <td class="text-sm">TYPE OF LD</td>
                                    <td class="text-sm">CONDUCTED</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Leo</td>
                                    <td>Brother</td>
                                    <td>Feb 16th, 2019</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">OTHER INFORMATION <a href="#" class="edit-icon" data-toggle="modal"
                            data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-sm">SPECIAL SKILLS and HOBBIES</th>
                                    <th class="text-sm">NON-ACADEMIC DISTINCTIONS/RECOGNITION</th>
                                    <th class="text-sm">MEMBERSHIP IN ASSOCIATION/ORGANIZATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Leo</td>
                                    <td>Brother</td>
                                    <td>Feb 16th, 2019</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">REFERENCES <a href="#" class="edit-icon" data-toggle="modal"
                            data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-sm">NAME</th>
                                    <th class="text-sm">ADDRESS</th>
                                    <th class="text-sm">CONTACT NUMBER</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Leo</td>
                                    <td>Brother</td>
                                    <td>Feb 16th, 2019</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">GOVERNMENT ISSUED ID <a href="#" class="edit-icon" data-toggle="modal"
                            data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-sm">Government Issued ID</th>
                                    <th class="text-sm">ID/License/Passport No.</th>
                                    <th class="text-sm">Date/Place of Issuance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Leo</td>
                                    <td>Brother</td>
                                    <td>Feb 16th, 2019</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title"></h3>
                    <div class="col-md-4">
                        <div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Employee ID</label>
							</div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

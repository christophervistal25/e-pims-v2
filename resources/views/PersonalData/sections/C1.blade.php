<div class="accordion">
	{{-- BEGIN OF PERSONAL INFORMATION --}}
	<div class="card">
		<div class="card-header" id="headingOne">
			<h5 class="mb-0">
			<button class="btn btn-link" data-toggle="collapse" data-target="#personalInformation" aria-expanded="true" aria-controls="personalInformation">
			PERSONAL INFORMATION
			</button>
			</h5>
		</div>
		<div id="personalInformation" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
			
			<div class="p-3">
				<div class="alert alert-secondary text-center font-weight-bold" role="alert">PERSONAL INFORMATION</div>
			</div>
			<form id="personalInformationForm">
				<div class="row pr-3 pl-3">
					<div class="form-group col-lg-3">
						<label for="surname">SURNAME</label><span class="text-danger">*</span>
						<input type="text" class="form-control" id="surname" placeholder="Enter Surname" name="surname">
					</div>
					<div class="form-group col-lg-3">
						<label for="firstname">FIRST NAME</label><span class="text-danger"><span class="text-danger">*</span>
						<input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
					</div>
					<div class="form-group col-lg-3">
						<label for="middlename">MIDDLE NAME</label><span class="text-danger"><span class="text-danger">*</span>
						<input type="text" class="form-control" id="middlename" placeholder="Enter Middle Name" name="middlename">
					</div>
					<div class="form-group col-lg-3">
						<label for="nameextension">NAME EXTENSION</label><span class="text-danger">
						<input type="text" class="form-control"  maxlength="3"
						id="nameextension" placeholder="(JR.,SR.)" name="nameExtension">
					</div>
				</div>
				<div class="row pl-3 pr-3">
					<div class="form-group col-lg-3">
						<label for="dateofbirth">DATE OF BIRTH</label><span class="text-danger">*</span>
						<input class="form-control" type="date" name="dateOfBirth" />
					</div>
					<div class="form-group col-lg-9">
						<label for="placeofbirth">PLACE OF BIRTH</label><span class="text-danger">*</span>
						<input type="text" class="form-control" id="placeofbirth" placeholder="Enter Place of Birth" name="placeOfBirth">
					</div>
				</div>
				<div class="row pl-3 pr-3">
					<div class="form-group col-lg-6">
						<label for="sex">SEX</label><span class="text-danger">*</span>
						<select class="form-control" id="sex" name="sex">
							<option value="MALE">MALE</option>
							<option value="FEMALE">FEMALE</option>
						</select>
					</div>
					<div class="form-group col-lg-6">
						<label for="status">STATUS</label><span class="text-danger">*</span>
						<select class="form-control" id="status" name="status">
							<option value="SINGLE">SINGLE</option>
							<option value="MARRIED">MARRIED</option>
							<option value="WIDOWED">WIDOWED</option>
							<option value="SEPARATED">SEPARATED</option>
							<option value="OTHERS">OTHERS</option>
						</select>
					</div>
				</div>
				<div class="row pl-3 pr-3">
					<div class="form group col-lg-4">
						<label for="height">HEIGHT</label><span class="text-danger">*</span>
						<input type="text" id="height" class="form-control" placeholder="Enter height in meter" name="height">
					</div>
					<div class="form-group col-lg-4">
						<label for="weight">WEIGHT</label><span class="text-danger">*</span>
						<input type="text" name="weight" id="weight" class="form-control" placeholder="Enter weight in kilogram" name="weight">
					</div>
					<div class="form-group col-lg-4">
						<label for="bloodtype">BLOODTYPE</label><span class="text-danger">*</span>
						<input type="text" name="bloodtype" id="bloodtype" class=form-control placeholder="Enter bloodtype" name="bloodType">
					</div>
				</div>
				<div class="row pl-3 pr-3">
					<div class="form-group col-lg-4">
						<label for="gsisidno">GSIS ID NUMBER</label><span class="text-danger">*</span>
						<input type="text" name="gsisIdNo" id="gsisidno" class=form-control placeholder="Enter GSIS ID No.">
					</div>
					<div class="form-group col-lg-4">
						<label for="pagibigidno">PAG-IBIG ID NUMBER</label><span class="text-danger">*</span>
						<input type="text" name="pagibigIdNo" id="pagibigidno" class=form-control placeholder="Enter PAG-IBIG ID No.">
					</div>
					<div class="form-group col-lg-4">
						<label for="philhealthidno">PHILHEALTH ID NUMBER</label><span class="text-danger">*</span>
						<input type="text" name="philHealthIdNo" id="philhealthidno" class=form-control placeholder="Enter PHILHEALTH ID No.">
					</div>
				</div>
				<div class="row pl-3 pr-3">
					<div class="form-group col-lg-4">
						<label for="sssidno">SSS ID NUMBER</label><span class="text-danger">*</span>
						<input type="text" name="sssIdNo" id="sssidno" class=form-control placeholder="Enter SSS ID No.">
					</div>
					
					<div class="form-group col-lg-4">
						<label for="tinidno">TIN ID NUMBER</label><span class="text-danger">*</span>
						<input type="text" name="tinIdNo" id="tinidno" class=form-control placeholder="Enter TIN ID No.">
					</div>
					
					<div class="form-group col-lg-4">
						<label for="agencyempidno">AGENCY EMPLOYEE NUMBER</label><span class="text-danger">*</span>
						<input type="text" name="agencyEmpIdNo" id="agencyempidno" class=form-control placeholder="Enter agency employee no.">
					</div>
				</div>
				<div class="row pl-3 pr-3">
					<div class="form-group col-lg-4">
						<label for="citizenship">CITIZENSHIP</label><span class="text-danger">*</span>
						<select class="form-control" id="citizenship" name="citizenship">
							<option value="FILIPINO">FILIPINO</option>
							<option value="DUAL CITIZEN">DUAL CITIZEN</option>
						</select>
					</div>
					<div class="form-group col-lg-4 d-none" id="citizenshipby-container">
						<label for="citizenshipby">BY</label><span class="text-danger">*</span>
						<select class="form-control" id="citizenshipby" name="citizenshipBy">
							<option value="BIRTH">BIRTH</option>
							<option value="NATURALIZATION">NATURALIZATION</option>
						</select>
					</div>

					<div class="form-group col-lg-4 d-none" id="country-container">
						<label for="countries">INDICATE COUNTRY</label><span class="text-danger">*</span>
						<select class="form-control" id="countries" name="country"></select>
					</div>
					
					<div class="form-group col-lg-4">
						<label for="telno">TELEPHONE NUMBER</label>
						<input type="text" id="telno" class="form-control" placeholder="Enter Telephone Number" name="telephoneNumber">
					</div>
					<div class="form-group col-lg-4">
						<label for="mobileno">MOBILE NUMBER</label><span class="text-danger">*</span>
						<input type="text" id="mobileno" class="form-control" placeholder="Enter Mobile Number" name="mobileNumber">
					</div>
					<div class="form-group col-lg-4">
						<label for="email">EMAIL ADDRESS</label>
						<input type="email" id="email" class="form-control" placeholder="Enter your email address" name="emailAddress">
					</div>
					
				</div>
				
				{{-- BEGIN OF RESIDENTIAL ADDRESS --}}
				<div class="pl-3 pr-3">
					<div class="alert alert-secondary text-center font-weight-bold" role="alert" >RESIDENTIAL ADDRESS</div>
				</div>
				<div class="row pl-3 pr-3">
					<div class="form-group col-lg-4">
						<label for="lotno">HOUSE/BLOCK/LOT NO.</label><span class="text-danger">*</span>
						<input type="text" name="residentialLotNo" id="lotno" class=form-control placeholder="Enter house/block/lot no.">
					</div>
					<div class="form-group col-lg-4">
						<label for="street">STREET</label><span class="text-danger">*</span>
						<input type="text" name="residentialStreet" id="street" class=form-control placeholder="Enter Street">
					</div>
					<div class="form-group col-lg-4">
						<label for="subdivision">SUBDIVISION/VILLAGE</label><span class="text-danger">*</span>
						<input type="text" name="residentialSubdivision" id="subdivision" class=form-control placeholder="Enter Subdivision or Village">
					</div>
				</div>
				<div class="row pl-3 pr-3">
					<div class="form-group col-lg-3">
						<label for="barangay">BARANGAY</label><span class="text-danger">*</span>
						<input type="text" name="residentialBarangay" id="barangay" class=form-control placeholder="Enter Barangay">
					</div>
					<div class="form-group col-lg-3">
						<label for="city">CITY/MUNICIPALITY</label><span class="text-danger">*</span>
						<input type="text" name="residentialCity" id="city" class=form-control placeholder="Enter City or Municipality">
					</div>
					<div class="form-group col-lg-3">
						<label for="province">PROVINCE</label><span class="text-danger">*</span>
						<input type="text" name="residentialProvince" id="province" class=form-control placeholder="Enter Province">
					</div>
					<div class="form-group col-lg-3">
						<label for="zipcode">ZIP CODE</label><span class="text-danger">*</span>
						<input type="number" name="residentialZipCode" id="zipcode" class="form-control" placeholder="Enter Zipcode">
					</div>
				</div>
				<div class="pl-3 pr-3">
					<div class="alert alert-secondary text-center font-weight-bold" role="alert">PERMANENT ADDRESS</div>
					<div class="form-group">
						<label class="checkbox-inline">
							<input type="checkbox" id="same-as-above">SAME AS ABOVE
						</label>
					</div>
				</div>
				<div class="row pl-3 pr-3">
					<div class="form-group col-lg-4">
						<label for="lotno">HOUSE/BLOCK/LOT NO.</label><span class="text-danger">*</span>
						<input type="text" name="permanentLotNo" id="permanent_lotno" class=form-control placeholder="Enter house/block/lot no.">
					</div>
					<div class="form-group col-lg-4">
						<label for="street">STREET</label><span class="text-danger">*</span>
						<input type="text" name="permanentStreet" id="permanent_street" class=form-control placeholder="Enter Street">
					</div>
					<div class="form-group col-lg-4">
						<label for="subdivision">SUBDIVISION/VILLAGE</label><span class="text-danger">*</span>
						<input type="text" name="permanentSubdivision" id="permanent_subdivision" class=form-control placeholder="Enter Subdivision or Village">
					</div>
				</div>
				
				<div class="row pl-3 pr-3">
					<div class="form-group col-lg-3">
						<label for="barangay">BARANGAY</label><span class="text-danger">*</span>
						<input type="text" name="permanentBarangay" id="permanent_barangay" class=form-control placeholder="Enter Barangay">
					</div>
					<div class="form-group col-lg-3">
						<label for="city">CITY/MUNICIPALITY</label><span class="text-danger">*</span>
						<input type="text" name="permanentCity" id="permanent_city" class=form-control placeholder="Enter City or Municipality">
					</div>
					<div class="form-group col-lg-3">
						<label for="province">PROVINCE</label><span class="text-danger">*</span>
						<input type="text" name="permanentProvince" id="permanent_province" class=form-control placeholder="Enter Province">
					</div>
					<div class="form-group col-lg-3">
						<label for="zipcode">ZIP CODE</label><span class="text-danger">*</span>
						<input type="number" name="permanentZipCode" id="permanent_zipcode" class="form-control" placeholder="Enter Zipcode">
					</div>
				</div>
				<div class="p-3 float-right">
					<button class="btn btn-primary" id="btnSubmitPersonalInformation">NEXT</button>
				</div>
				<div class="clearfix"></div>
			</form>

		</div>
	</div>
	{{-- END OF PERSONAL INFORMATION --}}
    
	{{-- BEGIN OF FAMILY BACKGROUND --}}
	<div class="card">
		<div class="card-header" id="headingOne">
			<h5 class="mb-0">
			<button class="btn btn-link" data-toggle="collapse" data-target="#familyBackground" aria-expanded="true" aria-controls="familyBackground">
			FAMILY BACKGROUND
			</button>
			</h5>
		</div>
		<div id="familyBackground" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
			<div class="p-3">
				<div class="alert alert-secondary text-center font-weight-bold" role="alert">FAMILY BACKGROUND</div>
			</div>
			{{-- BEGIN OF SPOUSE --}}
			<div class="row pr-3 pl-3">
				<div class="form-group col-lg-3">
					<label for="ssurname">SPOUSE'S SURNAME</label>
					<input type="text" class="form-control " id="ssurname" name="ssurname" placeholder="Enter Spouse's Surname" value="">
				</div>
				<div class="form-group col-lg-3 ">
					<label for="sfirstname">SPOUSE'S FIRST NAME</label>
					<input type="text" class="form-control  " id="sfirstname" name="sfirstname" placeholder="Enter Spouse's First Name" value="">
				</div>
				<div class="form-group col-lg-3">
					<label for="smiddleame">SPOUSE'S MIDDLE NAME</label>
					<input type="text" class="form-control " id="smiddleame" name="smiddleame" placeholder="Enter Spouse's Middle Name" value="">
				</div>
				<div class="form-group col-lg-3">
					<label for="snameexten">SPOUSE'S NAME EXTENSION</label>
					<input type="text" maxlength="3" class="form-control " id="snameexten" name="snameexten" placeholder="(JR., SR.)" value="">
				</div>
			</div>
			<div class="row pl-3 pr-3">
				<div class="form-group col-lg-6">
					<label for="soccupation">SPOUSE'S OCCUPATION</label>
					<input type="text" class="form-control" id="soccupation" placeholder="Enter Spouse's Occupation">
				</div>
				<div class="form-group col-lg-6">
					<label for="sempname">SPOUSE'S EMPLOYER/BUSINESS NAME</label>
					<input type="text" class="form-control" id="sempname" placeholder="Enter Spouse's Employer/Business Name">
				</div>
			</div>
			<div class="row pl-3 pr-3">
				<div class="form-group col-sm-6">
					<label for="sbusadd">SPOUSE'S BUSINESS ADDRESS</label>
					<input type="text" class="form-control" id="sbusadd" placeholder="Enter Spouse's Business Address">
				</div>
				<div class="form-group col-sm-6">
					<label for="stelno">SPOUSE'S TELEPHONE NUMBER</label>
					<input type="text" class="form-control" id="stelno" placeholder="Enter Spouse's Business Address">
				</div>
			</div>
			{{-- END OF SPOUSE --}}
            <hr>
            {{-- BEGIN OF SPOUSE CHILDREN --}}
            <div id="dynamic-row-for-spouse">
                    <div class="row pl-3 pr-3">
                        <div class="form-group col-lg-6">
                            <label for="stelno">NAME OF CHILDREN</label>
                            <input type="text" class="form-control" id="stelno" placeholder="Enter Name of Children">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="stelno">DATE OF BIRTH</label>
                            <input type="date" class="form-control" id="stelno" placeholder="Enter Spouse's Business Address">
                        </div>
                    </div>
            </div>
            <div class="col-lg-2 offset-10 text-right">
                <button class="btn btn-primary rounded-circle" id="generateNewSpouseField">+</button>
            </div>
            {{-- END OF SPOUSE CHILDREN --}}
			<hr>
			{{-- BEGIN OF FATHER --}}
			<div class="row pr-3 pl-3">
				<div class="form-group col-lg-3">
					<label for="ssurname">FATHER'S SURNAME</label>
					<input type="text" class="form-control " id="ssurname" name="ssurname" placeholder="Enter Father's Surname" value="">
				</div>
				<div class="form-group col-lg-3 ">
					<label for="sfirstname">FATHER'S FIRST NAME</label>
					<input type="text" class="form-control  " id="sfirstname" name="sfirstname" placeholder="Enter Father's First Name" value="">
				</div>
				<div class="form-group col-lg-3">
					<label for="smiddleame">FATHER'S MIDDLE NAME</label>
					<input type="text" class="form-control " id="smiddleame" name="smiddleame" placeholder="Enter Father's Middle Name" value="">
				</div>
				<div class="form-group col-lg-3">
					<label for="snameexten">FATHER'S NAME EXTENSION</label>
					<input type="text" maxlength="3" class="form-control " id="snameexten" name="snameexten" placeholder="(JR., SR.)" value="">
				</div>
			</div>
			{{-- END OF FATHER --}}
			<hr>
			{{-- BEGIN OF MOTHER --}}
			<div class="row pr-3 pl-3">
				
				<div class="form-group col-lg-3">
					<label for="snameexten">MOTHER'S MAIDEN SURNAME</label>
					<input type="text" maxlength="3" class="form-control " id="snameexten" name="snameexten" placeholder="Enter Mother's Maiden Surname" value="">
				</div>
				<div class="form-group col-lg-3 ">
					<label for="sfirstname">MOTHER'S FIRST NAME</label>
					<input type="text" class="form-control  " id="sfirstname" name="sfirstname" placeholder="Enter Mother's First Name" value="">
				</div>
				<div class="form-group col-lg-3">
					<label for="smiddleame">MOTHER'S MAIDEN MIDDLE NAME</label>
					<input type="text" class="form-control " id="smiddleame" name="smiddleame" placeholder="Enter Mother's Maiden Middle Name" value="">
				</div>
			</div>
			{{-- END OF MOTHER --}}
			
		</div>
	</div>
	{{-- END OF FAMILY BACKGROUND --}}

    {{-- BEGIN OF EDUCATIONAL BACKGROUND --}}
	<div class="card">
		<div class="card-header" id="headingOne">
			<h5 class="mb-0">
			<button class="btn btn-link" data-toggle="collapse" data-target="#educationalBackground" aria-expanded="true" aria-controls="educationalBackground">
			EDUCATIONAL BACKGROUND
			</button>
			</h5>
		</div>
		<div id="educationalBackground" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
			<div class="p-3">
				<div class="alert alert-secondary text-center font-weight-bold" role="alert">ELEMENTARY</div>
			</div>
			{{-- BEGIN OF ELEMETARY --}}
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>ELEMENTARY</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>
				</div>
					<div class="pr-3 pb-3 py-3">
						<div class="row">
                    <div class="col-lg-3">
                        <label>HIGHEST LEVEL/ UNIT EARNED</label>
                        <input type="number" class="form-control" placeholder="(if not graduated)">
                    </div>

                    <div class="col-lg-3">
                        <label>YEAR GRADUATED</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
					
					<div class="col-lg-6">
                        <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                        <input type="text" class="form-control">
						</div>
                	</div>
				</div>
            </div>
			{{-- END OF ELEMENTARY --}}

            <hr>

            <div class="p-3">
				<div class="alert alert-secondary text-center font-weight-bold" role="alert">SECONDARY</div>
			</div>
			{{-- BEGIN OF SECONDARY --}}
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>SECONDARY</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>
				</div>
			<div class="pr-3 pb-3 py-3">
				<div class="row">
                    <div class="col-lg-3">
                        <label>HIGHEST LEVEL/ UNIT EARNED</label>
                        <input type="number" class="form-control" placeholder="(if not graduated)">
                    </div>

                    <div class="col-lg-3">
                        <label>YEAR GRADUATED</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                
                    <div class="col-lg-6">
                        <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                        <input type="text" class="form-control">
						</div>
                    </div>
                </div>
            </div>
			{{-- END OF SECONDARY --}}

            <hr>

            <div class="p-3">
				<div class="alert alert-secondary text-center font-weight-bold" role="alert">VOCATIONAL / TRADE COURSE</div>
			</div>
			{{-- BEGIN OF VOCATIONAL / TRADE COURSE --}}
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>VOCATIONAL / TRADE COURSE</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>
                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>
				</div>
			</div>
			<div class="pl-3 pr-3 pb-3">
				<div class="row">
                    <div class="col-lg-3">
                        <label>HIGHEST LEVEL/ UNIT EARNED</label>
                        <input type="number" class="form-control" placeholder="(if not graduated)">
                    </div>

                    <div class="col-lg-3">
                        <label>YEAR GRADUATED</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                
                    <div class="col-lg-6">
                        <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                        <input type="text" class="form-control">
                    </div>
			</div>
        </div>    
			{{-- END OF VOCATIONAL / TRADE COURSE --}}

            <hr>

            <div class="p-3">
				<div class="alert alert-secondary text-center font-weight-bold" role="alert">COLLEGE</div>
			</div>
			{{-- BEGIN OF COLLEGE --}}
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>COLLEGE</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>
                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>
				</div>
			</div>
			
			<div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>HIGHEST LEVEL/ UNIT EARNED</label>
                        <input type="number" class="form-control" placeholder="(if not graduated)">
                    </div>

                    <div class="col-lg-3">
                        <label>YEAR GRADUATED</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                
                    <div class="col-lg-6">
                        <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
			</div>
            
			{{-- END OF COLLEGE --}}

            <hr>

            <div class="p-3">
				<div class="alert alert-secondary text-center font-weight-bold" role="alert">GRADUATE STUDIES</div>
			</div>
			{{-- BEGIN OF GRADUATE STUDIES --}}
            <div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>GRADUATE STUDIES</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>BASIC EDUCATION/DEGREE/COURSE</label>
                        <input type="text" class="form-control" placeholder="Name of School">
                    </div>

                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (FROM)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>
                    <div class="col-lg-3">
                        <label>PERIOD OF ATTENDANCE (TO)</label>
                        <input type="date" class="form-control" placeholder="Name of School">
                    </div>
				</div>
			</div>

			<div class="pl-3 pr-3 pb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <label>HIGHEST LEVEL/ UNIT EARNED</label>
                        <input type="number" class="form-control" placeholder="(if not graduated)">
                    </div>

                    <div class="col-lg-3">
                        <label>YEAR GRADUATED</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
	
                    <div class="col-lg-6">
                        <label>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</label>
                        <input type="text" class="form-control">
                    </div>
				</div>
			</div>
		
                
            
			{{-- END OF GRADUATE STUDIES --}}
		</div>
	</div>
	{{-- END OF EDUCATIONAL BACKGROUND --}}
</div>
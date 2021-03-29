{{-- BEGIN OF ACCORDION FOR C2 --}}
<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0" data-toggle="collapse" data-target="#civilService" aria-expanded="true" aria-controls="civilService" style="cursor: pointer;">
          <button class="btn btn-link" >
            IV. Civil Service Egibility
          </button>
        </h5>
      </div>

      <div id="civilService" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          {{-- BEGIN CONTENT OF CIVIL SERVICE --}}
          <table class="table table-bordered">
            <tr class="text-center" style="background: #EAEAEA;">
              <td rowspan="2" class="align-middle">27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE BARANGAY ELIGIBILITY / DRIVER'S LICENSE</td>
              <td rowspan="2" class="align-middle">RATING</td>
              <td rowspan="2" class="align-middle">DATE OF EXAMINATION / CONFERMENT</td>
              <td rowspan="2" class="align-middle">PLACE OF EXAMINATION / CONFERMENT</td>
              <td colspan="2" scope="colgroup">LICENSE</td>
              <td rowspan="2" class="pl-4 pr-4">&nbsp;</td>
            </tr>
            <tr style="background: #EAEAEA;">
                <td scope="col" class="text-center">NUMBER</td>
                <td scope="col" class="text-center">Date of Validity</td>
            </tr>


            {{-- BEGIN OF DATA --}}
            <tbody id="dynamic-row-civil-service-data">
                <tr>
                    <th scope="row">
                      <input type="text" class="form-control rounded-0 border-0" placeholder="Input here..." name="civilService[careerServ]">
                    </th>
                    <td>
                      <input type="number" class="form-control rounded-0 border-0" placeholder="e.g. 91.2" name="civilService[rating]">
                    </td>
                    <td>
                        <input type="date" class="form-control rounded-0 border-0" placeholder="Input" name="civilService[dateOfExam]">
                    </td>
                    <td>
                        <input type="text" class="form-control rounded-0 border-0" placeholder="e.g Tandag" name="civilService[placeOfExam]">
                    </td>

                    <td>
                        <input type="text" class="form-control rounded-0 border-0" placeholder="e.g. 2015" name="civilService[number]">
                    </td>
                    <td>
                        <input type="text" class="form-control rounded-0 border-0" placeholder="e.g. 2016" name="civilService[dateOfValid]">
                    </td>
                    <td class="jumbotron"></td>
                </tr>
            </tbody>
            {{-- END OF DATA --}}
          </table>
          <div class="float-right mb-3">
              <button class="btn btn-primary" id="btnAddNewFieldCivilServiceRow">
                  <i class="fa fa-plus"></i>
                  Add new field
                </button>
          </div>
          {{-- END CONTENT OF CIVIL SERVICE --}}
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0" data-toggle="collapse" data-target="#workExperience" aria-expanded="false" aria-controls="workExperience" style="cursor: pointer;">
          <button class="btn btn-link collapsed" >
            V. Work Experience
          </button>
        </h5>
      </div>

      <div id="workExperience" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            {{-- BEGIN CONTENT OF WORK EXPERIENCE --}}
            <table class="table table-bordered">
                <tr class="text-center" style="background: #EAEAEA;">
                  <td colspan="2" scope="colgroup">28. INCLUSIVE DATES (mm/dd/yyyy)</td>
                  <td rowspan="2" class="align-middle">POSITION TITLE (Write in full/Do not abbreviate)</td>
                  <td rowspan="2" class="align-middle">DEPARTMENT / AGENCY / OFFICE / COMPANY (Write in full/Do not abbreviate)</td>
                  <td rowspan="2" class="align-middle">MONTHLY SALARY</td>
                  <td rowspan="2" class="align-middle">SALARY/ JOB/ PAY GRADE <br> (if applicable) <br> & STEP  (Format "00-0")/ INCREMENT</td>
                  <td rowspan="2" class="align-middle">STATUS OF APPOINTMENT</td>

                  <td rowspan="2" class="align-middle">GOV'T SERVICE (Y/ N)             </td>
                    </input>
                  <td rowspan="2" class="pl-4 pr-4">&nbsp;</td>
                </tr>

                <tr style="background: #EAEAEA;">
                  <td scope="col" class="text-center">FROM</td>
                  <td scope="col" class="text-center">TO</td>
                </tr>


                {{-- BEGIN OF DATA --}}
                <tbody id="dynamic-row-work-experience-data">
                    <tr>
                        <th scope="row">
                          <input type="date" class="form-control rounded-0 border-0" placeholder="FROM" name="workExp[from]">
                        </th>
                        <td>
                          <input type="date" class="form-control rounded-0 border-0" placeholder="TO" name="workExp[to]">
                        </td>
                        <td>
                            <input type="text" class="form-control rounded-0 border-0" placeholder="Input" name="workExp[position]">
                        </td>
                        <td>
                            <input type="text" class="form-control rounded-0 border-0" placeholder="e.g Tandag" name="workExp[dept]">
                        </td>

                        <td>
                            <input type="text" class="form-control rounded-0 border-0" placeholder="" name="workExp[monSalary]">
                        </td>
                        <td>
                            <input type="text" class="form-control rounded-0 border-0" placeholder="" name="workExp[payGrade]">
                        </td>
                        <td>
                            <input type="text" class="form-control rounded-0 border-0" placeholder="" name="workExp[statOfApp]">
                        </td>
                        <td>
                            <input type="text" class="form-control rounded-0 border-0 text-uppercase" maxlength="1" placeholder="" name="workExp[govServ]">
                        </td>
                        <td class="jumbotron"></td>
                    </tr>
                </tbody>
                {{-- END OF DATA --}}
              </table>
              <div class="float-right mb-3">
                  <button class="btn btn-primary" id="btnAddNewWorkExperienceRow">
                      <i class="fa fa-plus"></i>
                      Add new field
                    </button>
              </div>
            {{-- END CONTENT OF WORK EXPERIENCE --}}
        </div>
      </div>
    </div>
  </div>
{{-- END OF ACCORDION FOR C2 --}}

{{-- BEGIN OF ACCORDION FOR C3 --}}
<div id="accordion">

    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0" data-toggle="collapse" data-target="#voluntary" aria-expanded="true" aria-controls="voluntary" style="cursor:pointer;">
          <button class="btn btn-link">
            VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S
          </button>
        </h5>
      </div>

      <div id="voluntary" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          {{-- BEGIN CONTENT OF VOLUNTARY --}}
          <table class="table table-bordered">
            <tr class="text-center" style="background: #EAEAEA;">
                <td rowspan="2" class="align-middle" scope="colgroup">NAME & ADDRESS OF ORGANIZATION (Write in full)</td>
                <td colspan="2" class="align-middle" scope="colgroup">INCLUSIVE DATES (mm/dd/yyyy)</td>
                <td rowspan="2" class="align-middle" scope="colgroup">NUMBES OF HOURS</td>
                <td rowspan="2" class="align-middle" scope="colgroup">POSITION / NATURE OF WORK</td>
                <td rowspan="2" class="align-middle">&nbsp;</td>
            </tr>
            <tr style="background: #EAEAEA;">
                <td scope="col" class="text-center">FROM</td>
                <td scope="col" class="text-center">TO</td>
            </tr>


            {{-- BEGIN OF DATA --}}
            <tbody id="dynamic-row-voluntary-data">
                <tr>
                    <td>
                        <input type="text" class="form-control rounded-0 border-0" placeholder="NAME" name="volunOrg[nameOfOrg]">
                    </td>
                    <td>
                        <input type="date" class="form-control rounded-0 border-0" placeholder="FROM" name="volunOrg[from]">
                    </td>
                    <td>
                        <input type="date" class="form-control rounded-0 border-0" placeholder="TO" name="volunOrg[to]">
                    </td>
                    <td>
                        <input type="number" class="form-control rounded-0 border-0" placeholder="Hours" name="volunOrg[noOfHrs]">
                    </td>
                    <td>
                        <input type="text" class="form-control rounded-0 border-0" placeholder="Position" name="volunOrg[position]">
                    </td>
                    <td class="jumbotron"></td>
                </tr>
            </tbody>
            {{-- END OF DATA --}}
          </table>
          <div class="float-right mb-3">
              <button class="btn btn-primary" id="btnAddNewFieldVoluntaryRow">
                  <i class="fa fa-plus"></i>
                  Add new field
                </button>
          </div>
          {{-- END CONTENT OF VOLUNTARY --}}
        </div>
      </div>
    </div>



    {{-- BEGIN OF LEARNING AND DEVELOPMENT --}}
    <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0" data-toggle="collapse" data-target="#learningAndDevelopment" aria-expanded="true" aria-controls="learningAndDevelopment" style="cursor: pointer;">
            <button class="btn btn-link">
                VII.  LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED
            </button>
          </h5>
        </div>

        <div id="learningAndDevelopment" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            {{-- BEGIN CONTENT OF LEARNING AND DEVELOPMENT --}}
            <table class="table table-bordered">
              <tr class="text-center" style="background: #EAEAEA;">
                  <td rowspan="2" class="align-middle" scope="colgroup">TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS (Write in full)</td>
                  <td colspan="2" class="align-middle" scope="colgroup">INCLUSIVE DATES OF ATTENDANCE (mm/dd/yyyy)</td>
                  <td rowspan="2" class="align-middle" scope="colgroup">NUMBES OF HOURS</td>
                  <td rowspan="2" class="align-middle" scope="colgroup">Type of LD(Managerial/ Supervisory/Technical/etc)</td>
                  <td rowspan="2" class="align-middle" scope="colgroup"> CONDUCTED/ SPONSORED (Write in full)</td>
                  <td rowspan="2" class="align-middle">&nbsp;</td>
              </tr>
              <tr style="background: #EAEAEA;">
                  <td scope="col" class="text-center">FROM</td>
                  <td scope="col" class="text-center">TO</td>
              </tr>


              {{-- BEGIN OF DATA --}}
              <tbody id="dynamic-row-learning-and-development-data">
                  <tr>
                      <td>
                          <input type="text" class="form-control rounded-0 border-0" placeholder="NAME" name="learnDev[nameOfTraining]">
                      </td>
                      <td>
                          <input type="date" class="form-control rounded-0 border-0" placeholder="FROM" name="learnDev[from]">
                      </td>
                      <td>
                          <input type="date" class="form-control rounded-0 border-0" placeholder="TO" name="learnDev[to]">
                      </td>
                      <td>
                          <input type="number" class="form-control rounded-0 border-0" placeholder="Hours" name="learnDev[noOfHours]">
                      </td>
                      <td>
                          <input type="text" class="form-control rounded-0 border-0" placeholder="" name="learnDev[typeOfLD]">
                      </td>
                      <td>
                        <input type="text" class="form-control rounded-0 border-0" placeholder="" name="learnDev[conducted]">
                      </td>
                      <td class="jumbotron"></td>
                  </tr>
              </tbody>
              {{-- END OF DATA --}}
            </table>
            <div class="float-right mb-3">
                <button class="btn btn-primary" id="btnAddNewFieldLearningAndDevelopmentRow">
                    <i class="fa fa-plus"></i>
                    Add new field
                  </button>
            </div>
            {{-- END CONTENT OF LEARNING AND DEVELOPMENT --}}
          </div>
        </div>
      </div>
      {{-- END OF LEARNING AND DEVELOPMENT --}}

      {{-- BEGIN OF OTHER INFORMATION --}}
    <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0" data-toggle="collapse" data-target="#otherInformation" aria-expanded="true" aria-controls="otherInformation" style="cursor: pointer">
            <button class="btn btn-link">
                VIII.  OTHER INFORMATION
            </button>
          </h5>
        </div>

        <div id="otherInformation" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            {{-- BEGIN CONTENT OF OTHER INFORMATION --}}
            <table class="table table-bordered">
              <tr class="text-center" style="background: #EAEAEA;">
                  <td rowspan="2" class="align-middle" scope="colgroup">31. SPECIAL SKILLS and HOBBIES</td>
                  <td rowspan="2" class="align-middle" scope="colgroup">32. NON-ACADEMIC DISTINCTIONS / RECOGNITION (Write in full)</td>
                  <td rowspan="2" class="align-middle" scope="colgroup">33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION (Write in full)</td>
                  <td rowspan="2" class="align-middle">&nbsp;</td>
              </tr>



              {{-- BEGIN OF DATA --}}
              <tbody id="dynamic-row-other-information-data">
                  <tr>
                      <td>
                          <input type="text" class="form-control rounded-0 border-0" placeholder="Input" name="otherInfo[skill]">
                      </td>
                      <td>
                          <input type="text" class="form-control rounded-0 border-0" placeholder="Input" name="otherInfo[recog]">
                      </td>
                      <td>
                          <input type="text" class="form-control rounded-0 border-0" placeholder="Input" name="otherInfo[memAssociation]">
                      </td>
                      <td class="jumbotron"></td>
                  </tr>
              </tbody>
              {{-- END OF DATA --}}
            </table>
            <div class="float-right mb-3">
                <button class="btn btn-primary" id="btnAddNewFieldOtherInformation">
                    <i class="fa fa-plus"></i>
                    Add new field
                  </button>
            </div>
            {{-- END CONTENT OF OTHER INFORMATION --}}
          </div>
        </div>
      </div>
      {{-- END OF OTHER INFORMATION --}}

  </div>
{{-- END OF ACCORDION FOR C3 --}}

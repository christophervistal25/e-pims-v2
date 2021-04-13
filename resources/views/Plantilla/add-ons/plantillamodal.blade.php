<div id="addPositionBtn" class="modal custom-modal fade" role="dialog">
    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Position</h5>
                <button style="background-color:white;margin-right:2px; margin-top:2px; " type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color:black; font-size:20px;" aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                    <div class="form-group col-12">
                        <label class="d-block">Position Code</label>
                        <input placeholder="Input Position Code" class="form-control" id="positionCode" name="positionCode" type="text" >
                    </div>
                    <div class="form-group col-12">
                        <label class="d-block">Position Name</label>
                        <input placeholder="Input Position Name" class="form-control" id="positionName" name="positionName" type="text" >
                    </div>

                    <div class="form-group col-12">
                        <label class="d-block">Salary Grade</label>
                        <select name="salaryGrades" id="salaryGrades" class="select floating">
                            <option selected="selected">Please Select</option>
                            @foreach (range(1, 33) as $step_no)
                                <option value="{{ $step_no}}">{{ $step_no}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-12">
                        <label class="d-block">Position Short Name</label>
                        <input placeholder="Input Position Short Name" class="form-control" id="positionShortName" name="positionShortName" type="text" >
                    </div>
                    <div class="form-group submit-section col-12">
                        <button id="btnPosition" type="submit" class="btn btn-success submit-btn">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
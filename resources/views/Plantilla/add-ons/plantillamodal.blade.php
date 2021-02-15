<div id="add_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Plantilla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/plantilla" method="">
                    @csrf
                    <div class="row">
                    <div class="form-group col-2">
                        <label class="d-block">Plantilla ID<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="plantilla_id" type="text">
                    </div>
                    <div class="form-group col-2">
                        <label>Old Item No<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="old_item_no" type="text">
                    </div>
                    <div class="form-group col-2">
                        <label>New Item No<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="new_item_no" type="text">
                    </div>
                    <div class="form-group col-3">
                        <label>Position Title<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="position_title" type="text">
                    </div>
                    <div class="form-group col-3">
                        <label>Position Title Ext<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="position_title_ext" type="text">
                    </div>
                    <div class="col-3">
                        <label>Employee ID<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-9">
                        <label>Employee Name<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group col-3">
                        <input value="" class="form-control" name="employee_id" type="text">
                    </div>
                    <div class="form-group col-9">
                        <select class="form-control form-control-xs selectpicker" 
                        name="employee_name" data-live-search="true" id="state_list">
                            <option>Search Name</option>
                            <option value="PGO">PGO</option>
                            <option value="VGO">VGO</option>
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label>Current Salary Grade<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="current_salary_grade" type="text">
                    </div>
                    <div class="form-group col-4">
                        <label>Current Step No<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="current_step_no" type="text">
                    </div>
                    <div class="form-group col-4">
                        <label>Current Salary Amount<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="current_salary_amount" type="text">
                    </div>
                    <div class="form-group col-6">
                        <label>Office<span class="text-danger">*</span></label>
                        <select name="office_code" class="select">
                            <option>Select Office</option>
                            <option value="PGO">PGO</option>
                            <option value="VGO">VGO</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label>Division<span class="text-danger">*</span></label>
                        <select name="division_code" class="select">
                            <option>Select Division</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label>Date Of Original Appointment<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="date_original_appointment" type="date">
                    </div>
                    <div class="form-group col-4">
                        <label>Date Of Last Promotion</label>
                        <input value="" class="form-control" name="date_last_promotion" type="date">
                    </div>
                    <div class="form-group col-4">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="select">
                            <option>Select Status</option>
                            <option value="Casual">Casual</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Coterminous">Coterminous</option>
                            <option value="Coterminous-Temporary">Coterminous-Temporary</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Provisional">Provisional</option>
                            <option value="Regular_Permanent">Regular Permanent</option>
                            <option value="Substitute">Substitute</option>
                            <option value="Temporary">Temporary</option>
                            <option value="Elected">Elected</option>
                        </select>
                    </div>
                    <div class="col-1">
                        <label></label>
                    </div>
                    <div class="col-3">
                        <label>Salary Grade</label>
                    </div>
                    <div class="col-3">
                        <label>Step No</label>
                    </div>
                    <div class="col-3">
                        <label>SG Year</label>
                    </div>
                    <div class="col-2">
                        <label>Amount</label>
                    </div>
                    <div class="col-1">
                        <label>DBM Previous</label>
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_previous_sg_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_previous_step_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_previous_sg_year" type="text">
                    </div>
                    <div class="col-2">
                        <input value="" class="form-control" name="dbm_previous_amount" type="text">
                    </div>
                    <div class="col-1">
                        <label>DBM Current</label>
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_current_sg_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_current_step_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="dbm_current_sg_year" type="text">
                    </div>
                    <div class="col-2">
                        <input value="" class="form-control" name="dbm_current_amount" type="text">
                    </div>
                    <div class="col-1">
                        <label>CSC Previous</label>
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_previous_sg_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_previous_step_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_previous_sg_year" type="text">
                    </div>
                    <div class="col-2">
                        <input value="" class="form-control" name="csc_previous_amount" type="text">
                    </div>
                    <div class="col-1">
                        <label>CSC Current</label>
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_current_sg_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_current_step_no" type="text">
                    </div>
                    <div class="col-3">
                        <input value="" class="form-control" name="csc_current_sg_year" type="text">
                    </div>
                    <div class="col-2">
                        <input value="" class="form-control" name="csc_current_amount" type="text">
                    </div>
                    <div class="form-group col-4">
                        <label>Area Code<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="area_code" type="text">
                    </div>
                    <div class="form-group col-4">
                        <label>Area Type<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="area_type" type="text">
                    </div>
                    <div class="form-group col-4">
                        <label>Area Level<span class="text-danger">*</span></label>
                        <input value="" class="form-control" name="area_level" type="text">
                    </div>
                    <div class="form-group submit-section col-12">
                        <button class="btn btn-sm btn-primary float-right" type="button" data-toggle="modal" data-target="#add_custom_policy"><i class="fa fa-plus"></i> Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
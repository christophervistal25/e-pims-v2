 <!-- Add Leave Modal -->
 <div id="add_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Salary Grade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                    <div class="form-group col-6">
                        <label>Salary Grade <span class="text-danger">*</span></label>
                        <select name="salary_grade_no" value="{{ old('salary_grade_no') }}" class="select floating {{ $errors->has('salary_grade_no')  ? 'is-invalid' : ''}}">
                           @foreach (range(1, 35) as $salarygrade)
                             <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label>Step 1 <span class="text-danger">*</span></label>
                        <input class="form-control {{ $errors->has('salary_grade_step1')  ? 'is-invalid' : ''}}" value="{{ old('salary_grade_step1') }}" id="salary-grade" name="salary_grade_step1" type="text" maxlength="12">
                        @if($errors->has('salary_grade_step1'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salary_grade_step1') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Step 2 <span class="text-danger">*</span></label>
                        <input class="form-control {{ $errors->has('salary_grade_step2')  ? 'is-invalid' : ''}}" value="{{ old('salary_grade_step2') }}" id="salary-grade" name="salary_grade_step2" type="text" maxlength="12">
                        @if($errors->has('salary_grade_step2'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salary_grade_step2') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Step 3 <span class="text-danger">*</span></label>
                        <input class="form-control {{ $errors->has('salary_grade_step3')  ? 'is-invalid' : ''}}" value="{{ old('salary_grade_step3') }}" id="salary-grade" name="salary_grade_step3" type="text" maxlength="12">
                        @if($errors->has('salary_grade_step3'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salary_grade_step3') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Step 4 <span class="text-danger">*</span></label>
                        <input class="form-control {{ $errors->has('salary_grade_step4')  ? 'is-invalid' : ''}}" value="{{ old('salary_grade_step4') }}" id="salary-grade" name="salary_grade_step4" type="text" maxlength="12">
                        @if($errors->has('salary_grade_step4'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salary_grade_step4') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Step 5 <span class="text-danger">*</span></label>
                        <input class="form-control {{ $errors->has('salary_grade_step5')  ? 'is-invalid' : ''}}" value="{{ old('salary_grade_step5') }}" id="salary-grade" name="salary_grade_step5" type="text" maxlength="12">
                        @if($errors->has('salary_grade_step5'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salary_grade_step5') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Step 6 <span class="text-danger">*</span></label>
                        <input class="form-control {{ $errors->has('salary_grade_step6')  ? 'is-invalid' : ''}}" value="{{ old('salary_grade_step6') }}" id="salary-grade" name="salary_grade_step6" type="text" maxlength="12">
                        @if($errors->has('salary_grade_step6'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salary_grade_step6') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Step 7 <span class="text-danger">*</span></label>
                        <input class="form-control {{ $errors->has('salary_grade_step7')  ? 'is-invalid' : ''}}" value="{{ old('salary_grade_step7') }}" id="salary-grade" name="salary_grade_step7" type="text" maxlength="12">
                        @if($errors->has('salary_grade_step7'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salary_grade_step7') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Step 8 <span class="text-danger">*</span></label>
                        <input class="form-control {{ $errors->has('salary_grade_step8')  ? 'is-invalid' : ''}}" value="{{ old('salary_grade_step8') }}" id="salary-grade" name="salary_grade_step8" type="text" maxlength="12">
                        @if($errors->has('salary_grade_step8'))
                        <small  class="form-text text-danger">
                        {{ $errors->first('salary_grade_step8') }} </small>
                        @endif
                    </div>
                    <div class="form-group col-6">
                        <label>Salary Grade Year <span class="text-danger">*</span></label>
                        <select name="salary_grade_year" value="{{ old('salary_grade_year') }}" class="select floating">
                            @for($i = 5; $i >= 1; $i--)
                            {{ $date1 = date("Y",strtotime("+$i year")) }}
                            <option value={{ $date1 }}>{{ $date1 }}</option>
                        @endfor 
                            {{ $date = date("Y") }}
                            <option selected value={{ $date }}>{{ $date }}</option>
                        @for($ii = 1; $ii <= 5; $ii++)
                            {{ $date2 = date("Y",strtotime("-$ii year")) }}
                            <option value={{ $date2 }}>{{ $date2 }}</option>
                        @endfor 
                        </select>
                    </div>
                    <div class="form-group submit-section col-12">
                        <button class="btn btn-primary submit-btn float-right">Add Step</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Leave Modal -->
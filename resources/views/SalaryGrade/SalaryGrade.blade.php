@extends('layouts.app')
@section('title', 'Salary Grade')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endprepend
@section('content')
<div class="content container-fluid">
    <div class="kanban-board card mb-0">
        <div class="card-body">
    <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
        <form action="" method="POST">
            @csrf
            <div class="row">
            <div class="form-group col-6 col-lg-2">
                <label>Salary Grade <span class="text-danger">*</span></label>
                <select name="sg_no" value="{{ old('sg_no') }}" class="select floating {{ $errors->has('sg_no')  ? 'is-invalid' : ''}}">
                   @foreach (range(1, 35) as $salarygrade)
                     <option value="{{ $salarygrade }}">{{ $salarygrade }}</option>
                   @endforeach
                </select>
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step 1 <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('sg_step1')  ? 'is-invalid' : ''}}" value="{{ old('sg_step1') }}" id="salary-grade" name="sg_step1" type="text" maxlength="12">
                @if($errors->has('sg_step1'))
                <small  class="form-text text-danger">
                {{ $errors->first('sg_step1') }} </small>
                @endif
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step 2 <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('sg_step2')  ? 'is-invalid' : ''}}" value="{{ old('sg_step2') }}" id="salary-grade" name="sg_step2" type="text" maxlength="12">
                @if($errors->has('sg_step2'))
                <small  class="form-text text-danger">
                {{ $errors->first('sg_step2') }} </small>
                @endif
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step 3 <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('sg_step3')  ? 'is-invalid' : ''}}" value="{{ old('sg_step3') }}" id="salary-grade" name="sg_step3" type="text" maxlength="12">
                @if($errors->has('sg_step3'))
                <small  class="form-text text-danger">
                {{ $errors->first('sg_step3') }} </small>
                @endif
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step 4 <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('sg_step4')  ? 'is-invalid' : ''}}" value="{{ old('sg_step4') }}" id="salary-grade" name="sg_step4" type="text" maxlength="12">
                @if($errors->has('sg_step4'))
                <small  class="form-text text-danger">
                {{ $errors->first('sg_step4') }} </small>
                @endif
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step 5 <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('sg_step5')  ? 'is-invalid' : ''}}" value="{{ old('sg_step5') }}" id="salary-grade" name="sg_step5" type="text" maxlength="12">
                @if($errors->has('sg_step5'))
                <small  class="form-text text-danger">
                {{ $errors->first('sg_step5') }} </small>
                @endif
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step 6 <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('sg_step6')  ? 'is-invalid' : ''}}" value="{{ old('sg_step6') }}" id="salary-grade" name="sg_step6" type="text" maxlength="12">
                @if($errors->has('sg_step6'))
                <small  class="form-text text-danger">
                {{ $errors->first('sg_step6') }} </small>
                @endif
            </div>
            <div class="form-group col-6 col-lg-2">
                <label>Step 7 <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('sg_step7')  ? 'is-invalid' : ''}}" value="{{ old('sg_step7') }}" id="salary-grade" name="sg_step7" type="text" maxlength="12">
                @if($errors->has('sg_step7'))
                <small  class="form-text text-danger">
                {{ $errors->first('sg_step7') }} </small>
                @endif
            </div>
            <div class="form-group col-5 col-lg-2">
                <label>Step 8 <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('sg_step8')  ? 'is-invalid' : ''}}" value="{{ old('sg_step8') }}" id="salary-grade" name="sg_step8" type="text" maxlength="12">
                @if($errors->has('sg_step8'))
                <small  class="form-text text-danger">
                {{ $errors->first('sg_step8') }} </small>
                @endif
            </div>
            <div class="form-group col-7 col-lg-2">
                <label>Salary Grade Year <span class="text-danger">*</span></label>
                <select name="sg_year" value="{{ old('sg_year') }}" class="select floating">
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
                <button type="submit" class="btn btn-success submit-btn float-right">Save</button>
                <button style="margin-right:10px;" type="button" id="cancelbutton" class="btn btn-primary submit-btn float-right">Cancel</button>
            </div>
            
        </div>
        </form>
    </div>
    <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
        <div style="padding-bottom:10px;" class="row align-items-right">
            <div class="col">
                @include('SalaryGrade.add-ons.success')
                <div class="row">
                    <div class="form-group form-focus select-focus col-5">
                        <select class="select floating" id="filter_year" onchange="filter_year();">
                            @foreach (range(5, 1) as $year)
                            {{ $year1 = date("Y",strtotime("+$year year")) }}
                            <option value={{ $year1 }}>{{ $year1 }}</option>
                            @endforeach
                            {{ $date = date("Y") }}
                            <option selected value={{ $date }}>{{ $date }}</option>
                                @foreach (range(1, 5) as $year)
                                {{ $year2 = date("Y",strtotime("-$year year")) }}
                                <option value={{ $year2 }}>{{ $year2 }}</option>
                            @endforeach 
                        </select>
                        <label style="padding-left:10px;" class="focus-label">Select Year</label>
                    </div>
                </div>
            </div>
            <div class="col-auto float-right ml-auto">
                <button id="addbutton" class="btn btn-primary submit-btn float-right"><i class="fa fa-plus"></i> Add Salary Grade</button>
            </div>
        </div>
        <div class="table" style="overflow-x:auto;">
        <table class="table table-bordered" id="myTable"  style="width:100%;">
            <thead>
              <tr>
                <td scope="col" class="text-center font-weight-bold">Salary Grade</td>
                <td scope="col" class="text-center font-weight-bold">Step 1</td>
                <td scope="col" class="text-center font-weight-bold">Step 2</td>
                <td scope="col" class="text-center font-weight-bold">Step 3</td>
                <td scope="col" class="text-center font-weight-bold">Step 4</td>
                <td scope="col" class="text-center font-weight-bold">Step 5</td>
                <td scope="col" class="text-center font-weight-bold">Step 6</td>
                <td scope="col" class="text-center font-weight-bold">Step 7</td>
                <td scope="col" class="text-center font-weight-bold">Step 8</td>
                <td scope="col" class="text-center font-weight-bold">Salary Grade Year</td>
              </tr>
            </thead>
          </table>
        </div>
    </div>
</div>
    </div>
</div>
@include('SalaryGrade.add-ons.sgmodal')
@push('page-scripts')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

{{-- code for yajra datatable --}}
<script>
    var date = new Date();
    var year = date.getFullYear();
    var myTable = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/salary-grade-list',
            columns: [
                { data: 'sg_no', name: 'sg_no' },
                { data: 'sg_step1', name: 'sg_step1' },
                { data: 'sg_step2', name: 'sg_step2' },
                { data: 'sg_step3', name: 'sg_step3' },
                { data: 'sg_step4', name: 'sg_step4' },
                { data: 'sg_step5', name: 'sg_step5' },
                { data: 'sg_step6', name: 'sg_step6' },
                { data: 'sg_step7', name: 'sg_step7' },
                { data: 'sg_step8', name: 'sg_step8' },
                { data: 'sg_year', name: 'sg_year' },
            ]
        });
        myTable.columns(9).search(year);
        myTable.draw(); 
        function filter_year(){
        var filter_year = document.getElementById('filter_year').value;
        localStorage.setItem('salary_grade_filter_year', filter_year);
        var ls = localStorage.getItem('salary_grade_filter_year');
        myTable.columns(9).search(ls);
        myTable.draw(); 
    }
    </script>
    {{-- code for number only --}}
    <script>
    $(function(){
        $("input[id='salary-grade']").on('input', function (e) {
          $(this).val($(this).val().replace(/[^0-9.]/g, ''));
        });
      });
    </script>
    {{-- code for show add form--}}
        <script>
            $(document).ready(function(){
            $("#addbutton").click(function(){
                $("#add").attr("class", "page-header");
                $("#table").attr("class", "page-header d-none");
            });
            });
            </script>
            {{-- code for show table --}}
            <script>
                $(document).ready(function(){
                  $("#cancelbutton").click(function(){
                    $("#add").attr("class", "page-header d-none");
                    $("#table").attr("class", "page-header");
                  });
                });
            </script>
@endpush
@endsection

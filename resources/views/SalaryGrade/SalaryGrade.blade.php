@extends('layouts.app')
@section('title', 'Salary Grade')
@prepend('page-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endprepend
@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div style="padding-bottom:10px;" class="row align-items-right">
            <div class="col">
                @include('SalaryGrade.add-ons.error')
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
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Salary Grade</a>
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
@include('SalaryGrade.add-ons.sgmodal')
@push('page-scripts')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    var date = new Date();
    var year = date.getFullYear();
    var myTable = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/salary-grade-list',
            columns: [
                { data: 'salary_grade_no', name: 'salary_grade_no' },
                { data: 'salary_grade_step1', name: 'salary_grade_step1' },
                { data: 'salary_grade_step2', name: 'salary_grade_step2' },
                { data: 'salary_grade_step3', name: 'salary_grade_step3' },
                { data: 'salary_grade_step4', name: 'salary_grade_step4' },
                { data: 'salary_grade_step5', name: 'salary_grade_step5' },
                { data: 'salary_grade_step6', name: 'salary_grade_step6' },
                { data: 'salary_grade_step7', name: 'salary_grade_step7' },
                { data: 'salary_grade_step8', name: 'salary_grade_step8' },
                { data: 'salary_grade_year', name: 'salary_grade_year' },
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
    <script>
    $(function(){
        $("input[id='salary-grade']").on('input', function (e) {
          $(this).val($(this).val().replace(/[^0-9.]/g, ''));
        });
      });
    </script>
@endpush
@endsection

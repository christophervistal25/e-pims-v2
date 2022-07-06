@extends('accounts.employee.layouts.app')
@section('title', 'Payslip')
@section('content')
<div class="p-3">
    <div class="row mb-3">
        <div class="col-lg-12 col-xs-12">
            <label for="month" class='font-weight-bold'>Month & Year</label>
            <select name="month" class='form-control form-select' id="month">
                <option value="ALL" selected>ALL</option>
                @foreach($months as $month)
                <option value="{{ $month }}" class='text-uppercase'>{{ date('F Y', strtotime($month)) }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div id="payroll-wrapper">
        @foreach($payrolls as $payroll)
        @php
        list($month, $sequenceNo) = explode("-", $payroll->payroll_no);
        @endphp
        <div class="card" data-content="{{ $payroll->payroll_no }}">
            <div class="card-header" id="{{ $payroll->payroll_no }}-ID">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left text-decoration-none pt-3"
                        type="button" >
                        <span class='text-uppercase'> {{ date('F Y', strtotime($month)) }} </span>
                    </button>
                </h2>
            </div>

            <div id="{{ $payroll->payroll_no }}" class="collapse show" aria-labelledby="{{  $payroll->payroll_no  }}"
                data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-5 col-sm-12 col-md-12 col-lg-12">
                            <table class='table' style="margin :0px; padding : 0px;">
                                <tr>
                                    <th colspan="2" class='lead font-weight-bold'
                                        style='letter-spacing : 2.5px; border-top : 0px solid transparent;'>
                                        SALARY
                                        <span class="float-right d-xl-none">
                                            <small id="gross" class="font-weight-bold"></small>
                                        </span>
                                    </th>
                                </tr>

                                <tr style="border-top : 3px solid black;">
                                    <td>Monthly Salary</td>
                                    <td class='text-right' style='letter-spacing : 1.5px;'>
                                        {{ number_format($payroll->details->first()->monthly_salary ?? 0, 2, ".", ",") }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class='text-uppercase' style="letter-spacing : 1.5px;">Compensation </th>
                                    <th class='text-right' style='letter-spacing : 1.5px;'>
                                        {{ number_format($payroll->details->first()->add_compensation ?? 0, 2, ".", ",") }}
                                    </th>
                                </tr>
                                @foreach($payroll->compensations as $compensation)
                                <tr class='align-middle'>
                                    <td><span
                                            class='ml-3'></span>{{ $compensation->description->account_chart->accountDesc }}
                                    </td>
                                    <td class='text-right' style='letter-spacing : 1.5px'>
                                        {{ number_format($compensation->amount, 2, ".", ",") }}
                                    </td>
                                </tr>
                                @endforeach
                                @foreach(range(1, ($payroll->mandatory_deductions->count() +
                                $payroll->personal_deductions->count()) - $payroll->compensations->count()) as $index)
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                </tr>
                                @endforeach
                                <tr style="border-bottom: 2px solid gray; border-top: 0px solid transparent">
                                    <td><span class='font-weight-bold'
                                            style='margin-right : 90px; letter-spacing : 2px;'>GROSS SALARY</span></td>
                                    <td class='text-right' style='letter-spacing : 1.5px;'> <span
                                            class='font-weight-bold gross-salary'>{{ number_format($payroll->details->first()->gross_salary, 2, ".", ',') }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xl-5 col-sm-12 col-md-12 col-lg-12">
                            <table class='table' style="margin-bottom : 0px;">
                                <tr style="border-bottom : 3px solid black;">
                                    <th colspan="2" class='lead font-weight-bold'
                                        style='letter-spacing : 2.5px; border-top : 0px solid transparent;'>
                                        DEDUCTIONS
                                        <span class="float-right d-xl-none">
                                            <small id="deduction" class="font-weight-bold"></small>
                                        </span>
                                    </th>
                                </tr>
                                <tr class='align-middle'>
                                    <th class='text-uppercase' style='letter-spacing : 1.5px;'>Mandatory</th>
                                    <th class='text-right' style='letter-spacing : 1.5px'>
                                        {{ number_format($payroll->details->first()->mandatory_deductions, 2, ".", ",") }}
                                    </th>
                                </tr>
                                @foreach($payroll->mandatory_deductions as $mandatory_deductions)
                                <tr class='align-middle'>
                                    <td><span
                                            class='ml-3'></span>{{ $mandatory_deductions->description->account_chart->accountDesc }}
                                    </td>
                                    <td class='text-right' style='letter-spacing : 1.5px'>
                                        {{ number_format($mandatory_deductions->amount, 2, ".", ",") }}
                                    </td>
                                </tr>
                                @endforeach
                                <tr class='align-middle'>
                                    <th class='text-uppercase' style='letter-spacing : 1.5px'>Personal</th>
                                    <th class='text-right' style='letter-spacing : 1.5px'>
                                        {{ number_format($payroll->details->first()->personal_deductions, 2, ".", ",") }}
                                    </th>
                                </tr>
                                @foreach($payroll->personal_deductions as $personal_deductions)
                                <tr class='align-middle'>
                                    <td><span
                                            class='ml-3'></span>{{ $personal_deductions->description->account_chart->accountDesc }}
                                    </td>
                                    <td class='text-right' style='letter-spacing : 1.5px'>
                                        {{ number_format($personal_deductions->amount, 2, ".", ",") }}
                                    </td>
                                </tr>
                                @endforeach
                                <tr style="border-bottom: 2px solid gray; border-top: 0px solid transparent">
                                    <td><span class='font-weight-bold'
                                            style='margin-right : 90px; letter-spacing : 2px;'>TOTAL DEDUCTIONS</span>
                                    </td>
                                    <td class='text-right' style='letter-spacing : 1.5px; '><span
                                            class='font-weight-bold total-deduction'>{{ number_format($payroll->mandatory_deductions->sum('amount') + $payroll->personal_deductions->sum('amount'), 2, ".", ",") }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-xl-2 col-sm-12 col-md-12 col-lg-12">
                            <table class='table' class='m-0'>
                                <tr style="border-bottom : 3px solid black;">
                                    <th colspan="2" class='lead font-weight-bold'
                                        style='letter-spacing : 2.5px; border-top : 0px solid transparent;'>
                                        NET
                                        <span class="float-right d-xl-none">
                                            <small id="net" class="font-weight-bold"></small>
                                        </span>
                                    </th>
                                </tr>
                                <tr>
                                    <td>FH</td>
                                    <td class='text-right' style='letter-spacing : 1.5px;'>
                                        {{ number_format($payroll->details->where('quencena', 1)->first()->quencena_amount ?? 0, 2, ".", ",") }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>SH</td>
                                    <td class='text-right' style='letter-spacing : 1.5px;'>
                                        {{ number_format($payroll->details->where('quencena', 2)->first()->quencena_amount ?? 0, 2, ".", ",") }}
                                    </td>
                                </tr>
                                @foreach(range(1, ($payroll->mandatory_deductions->count() +
                                $payroll->personal_deductions->count())) as $index)
                                <tr>
                                    <td>&nbsp;</td>
                                    <td></td>
                                </tr>
                                @endforeach
                                <tr style="border-bottom: 2px solid gray; border-top: 0px solid transparent">
                                    <td class='font-weight-bold'>NET PAY</td>
                                    <td class='text-right' style='letter-spacing : 1.5px; '><span
                                            class='font-weight-bold'>{{ number_format($payroll->details->where('quencena', 1)->first()->quencena_amount + $payroll->details->where('quencena', 2)->first()->quencena_amount ?? 0, 2, ".", ",") }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@push('page-scripts')
<script>
    $('#month').change(function () {
        let month = $(this).val();
        
        if(month === 'ALL') {
            // Dispay all card children of #payroll-wrapper
            $('#payroll-wrapper').children().fadeIn().show();
        } else {
            $('#payroll-wrapper').children().each(function (index, element) {
                let [monthYear, sequenceNo] = $(element).attr('data-content').split('-');
                if(monthYear.includes(month)) {
                    $(element).fadeIn().show();
                } else {
                    $(element).fadeOut().hide();
                }
            });
        }
    });

</script>
@endpush
@endsection

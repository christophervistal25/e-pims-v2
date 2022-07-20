@extends('layouts.app')
@section('title', 'Generate Plantilla Report')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

    table.dataTable.no-footer {
        border: 1px solid #dee2e6;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 15px 25px;
        border-bottom: 1px solid #dee2e6;
    }

    table.dataTable {
        border-collapse: collapse;
    }

    .btn-primarys {
        background-color: #FF9B44;
        color: white;
    }

    .btn-primarys:hover {
        background-color: #FF8544;
        color: white;
    }

    .page-item.active .page-link {
        background-color: #FF9B44 !important;
        border: 1px solid #FF9B44;
    }

    .page-item.active .page-link:hover {
        background-color: #FF8544 !important;
        border: 1px solid #FF8544;
    }

</style>
@endprepend
@section('content')
<div id="accordion">
    <div class="card shadow-none mb-0">
        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#filterOptions" aria-expanded="true" aria-controls="filterOptions">
            <span class='h6'>FILTER</span>
        </div>
        <div id="filterOptions" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group">
                    <label for="" class='h6'>Select Office: </label>
                    <select name="office" id="office" class='form-control form-select selectpicker border' data-live-search="true">
                        @foreach($offices as $office)
                        <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="" class='h6'>Select Year: </label>
                    <select name="year" id="year" class='form-control form-select'>
                        @foreach($years as $year)
                        <option {{ date('Y') == $year ? 'selected' : '' }} value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-right mt-3">
                    <button class='btn btn-primarys text-uppercase shadow' id='btnGenerate'>GENERATE</button>
                </div>

            </div>
        </div>
    </div>


</div>

<div id='plantilla-reports-table' class='mt-2'>
    <div class="float-right mb-2">
        <button class='btn btn-info shadow' id='btnDbmExport'>
            <i class="las la-file-excel"></i>
            DBM - EXPORT XLS
        </button>
        <button class='btn btn-danger shadow' id='btnDbmExportPdf'>
            <i class="las la-file-pdf"></i>
            DBM - EXPORT PDF
        </button>
    
        <button class='btn btn-info shadow' id='btnExport'>
            <i class="las la-file-excel"></i>
            CSC - EXPORT XLS
        </button>

        <button class='btn btn-danger shadow' id='btnExportPdf'>
            <i class="las la-file-pdf"></i>
            CSC - EXPORT PDF
        </button>
    </div>
    <table class='table table-bordered table-hover' id='report-table'>
        <thead>
            <tr>
                <th class='font-weight-bold text-sm'>ITEM #</th>
                <th class='font-weight-bold text-sm'>POSITION TITLE</th>
                <th class='font-weight-bold text-sm text-center'>SG</th>
                <th class='font-weight-bold text-sm text-center'>AUTHORIZED</th>
                <th class='font-weight-bold text-sm text-center'>ACTUAL</th>
                <th class='font-weight-bold text-sm text-center'>STEP</th>
                <th class='font-weight-bold text-sm text-center'>CODE</th>
                <th class='font-weight-bold text-sm text-center'>TYPE</th>
                <th class='font-weight-bold text-sm text-center'>LEVEL</th>
                <th class='font-weight-bold text-sm'>FULLNAME</th>
                <th class='font-weight-bold text-sm'>ORIGINAL APPOINTMENT</th>
                <th class='font-weight-bold text-sm'>LAST PROMOTION</th>
            </tr>
        </thead>
        <tbody id='dynamic-content-of-plantilla-report'>
        </tbody>
        <tfoot>
            <tr class='bg-light text-center'>
                <td colspan='6'>
                   VACANT : <span class='font-weight-bold' id='vacant-total'>0</span>
                </td>
                <td colspan='6'>
                    PERSONNEL WITH PLANTILLA : <span id='personnel-with-plantilla-total' class='font-weight-bold'>0</span>
                </td>
            </tr>
            <tr class='bg-light'>
                <td colspan='12' class='text-center'>
                    TOTAL : <span id='total' class='font-weight-bold'>0</span>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

@push('page-scripts')
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        , }
    , });

    $('#plantilla-reports-table').hide();

    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number
            , prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            , sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep
            , dec = (typeof dec_point === 'undefined') ? '.' : dec_point
            , s = ''
            , toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    $('#btnGenerate').click(function() {
        // Change the content of button to a spinner
        $('#btnGenerate').html('<i class="las la-spinner la-spin"></i>');
        $('#btnGenerate').attr('disabled', true);

        $('#filterOptions').collapse('hide');
        $('#plantilla-reports-table').fadeIn(1000);

        let office = $('#office').val();
        let year = $('#year').val();

        $('#dynamic-content-of-plantilla-report').html(`
            <tr class='text-center'>
                <td colspan='12'><i class="las la-spinner la-spin fa-2x text-primary"></i></td>
            </tr>
        `);

        $.ajax({
            url: `/plantilla-report/generate/${office}/${year}`,
            method: 'POST',
            success: function(response) {
                // Change the content of button to a normal text
                $('#btnGenerate').text('GENERATE');
                // Enable the button
                $('#btnGenerate').attr('disabled', false);

                let totalVacant = 0;
                let DEFAULT_STEP = 1;
                let authorizedAndActualField;
                let totalPersonnelWithPlantilla = 0;
                $('#dynamic-content-of-plantilla-report').html(``);

                if(response.length !== 0) {
                    $('#report-table tfoot').show();
                    response.forEach((record) => {
                        let {plantilla_history} = record;
                        let [current, previous] = plantilla_history;
                        authorizedAndActualField = "";

                        if (previous && current) {
                            authorizedAndActualField = `
                                            <td class='text-sm text-right font-weight-bold'>${number_format(previous?.salary_amount * 12, 2, ".", ",") || ''}</td>
                                            <td class='text-sm text-right font-weight-bold'>${number_format(current?.salary_amount * 12, 2, ".", ",") || ''}</td>
                                        `;
                        } else {
                            totalVacant++;
                            let [currentYear, previousYear] = record.salary_grade;
                            authorizedAndActualField = `
                                            <td class='text-sm text-right font-weight-bold'>${number_format(previousYear?.sg_step1 * 12, 2, ".", ",") || ''}</td>
                                            <td class='text-sm text-right font-weight-bold'>${number_format(currentYear?.sg_step1 * 12, 2, ".", ",") || ''}</td>
                                        `;
                        }

                        let employeeOrVacant = record.plantillas?.employee.fullname || 'VACANT';

                        if(employeeOrVacant !== 'VACANT') {
                            totalPersonnelWithPlantilla++;
                        }

                        $('#dynamic-content-of-plantilla-report').append(`
                            <tr>
                                <td class='text-sm'>${record.item_no}</td>
                                <td class='text-sm'>${record.position.Description}</td>
                                <td class='text-sm text-center'>${record.sg_no}</td>
                                ${authorizedAndActualField}
                                <td class='text-sm text-center'>${current?.step_no || DEFAULT_STEP}</td>
                                <td class='text-sm text-center'>15</td>
                                <td class='text-sm text-center'>P</td>
                                <td class='text-sm text-center'>${record.plantillas?.area_level || '-'}</td>
                                <td class='text-sm font-weight-bold ${current ? 'text-left' : 'text-center'}' style='background : ${current ? '' : '#FFFF00'}'>
                                    ${employeeOrVacant}
                                </td>
                                <td class='text-sm text-center'>${current?.date_original_appointment || ''}</td>
                                <td class='text-sm text-center'>${current?.date_last_promotion || ''}</td>
                            </tr>
                        `);
                    });

                    $('#personnel-with-plantilla-total').text(totalPersonnelWithPlantilla);
                    $('#vacant-total').text(response.length - totalPersonnelWithPlantilla);
                    $('#total').text(response.length);
                } else {
                    // Hide tfoot if there is no data
                    $('#report-table tfoot').hide();
                    // Display no available data in dynamic-content-of-plantilla-report with icon
                    $('#dynamic-content-of-plantilla-report').html(`
                        <tr>
                            <td colspan="12" class="text-center text-danger">
                                <i class="las la-exclamation-triangle"></i>
                                No available data
                            </td>
                        </tr>
                    `);
                }
            
            }
        });
    });

    $('#btnDbmExportPdf').click(function () {
        // Display a page spinner
        $('#btnDbmExportPdf').html('<i class="las la-spinner la-spin"></i>');
    

        let office = $("#office").val();
        let year = $('#year').val();
        
         $.post({
            url: `/dbm/plantilla-report/generate/${office}/${year}`,
            success: function(response) {
                if (response.success) {
                    socket.emit('DBM_PLANTILLA_PDF', {
                        file: response.filename
                    });
                    setTimeout(() => {
                        window.open(`/dbm/plantilla-report/download/${response.filename.replace('xls', 'pdf')}`);
                        $('#btnDbmExportPdf').html(`
                            <i class="las la-file-pdf"></i>
                            DBM - EXPORT PDF
                        `);
                    }, 1000);

                    // Change the content of button to a normal text
                }
            }
        });
    });

    $('#btnDbmExport').click(function () {
        // Change the content of button to a loading text
        $('#btnDbmExport').html('<i class="las la-spinner la-spin"></i>');

        let office = $("#office").val();
        let year = $('#year').val();
        
        $.post({
            url: `/dbm/plantilla-report/generate/${office}/${year}`,
            success: function(response) {
                if (response.success) {
                    window.open(`/dbm/plantilla-report/download/${response.filename}`);
                    // Change the content of button to a normal text
                    $('#btnDbmExport').html(`
                        <i class="las la-file-excel"></i>
                        DBM - EXPORT XLS
                    `);
                }
            }
        });
    });

    $('#btnExport').click(function() {
        // Change the content to a spinner
        $('#btnExport').html('<i class="las la-spinner la-spin"></i>');

        let office = $("#office").val();
        let year = $('#year').val();
        $.post({
            url: `/export/${office}/${year}`,
            success: function(response) {
                if (response.success) {
                    window.open(`download/plantilla-generated-report/${response.fileName}`);
                    // Change the content to a normal text
                    $('#btnExport').html(`
                        <i class="las la-file-excel"></i>
                        DBM - EXPORT XLS
                    `);
                }
            }
        });
    });

    $('#btnExportPdf').click(function() {
        $('#btnExportPdf').html('<i class="las la-spinner la-spin"></i>');
        let office = $("#office").val();
        let year = $('#year').val();
        $.post({
            url: `/export/${office}/${year}`
            , success: function(response) {
                if (response.success) {
                    socket.emit('PLANTILLA_PDF', {
                        file: fileName = response.fileName.split('||').pop()
                    });
                    setTimeout(() => {
                        window.open(`download/plantilla-generated-report/${response.fileName.replace('xls', 'pdf')}`);
                    }, 1000);
                    $('#btnExportPdf').html(`
                        <i class="las la-file-pdf"></i>
                        DBM - EXPORT PDF
                    `);
                }
            }
        });
    });

</script>
@endpush
@endsection

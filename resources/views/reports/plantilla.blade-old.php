@extends('layouts.app')
@section('title', 'Generate Plantilla Report')
@prepend('page-css')
{{-- <link rel="stylesheet" href="/assets/css/style.css"/> --}}
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"/>
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
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

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="" class='h6'>Select Office: </label>
            <select name="office" id="office" class='form-control form-select selectpicker border' data-live-search="true" data-size="10">
                <option value="*" selected>All</option>
                @foreach($offices as $office)
                <option value="{{ $office->office_code }}">{{ $office->office_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="" class='h6'>Select Year: </label>
            <select name="year" id="year" class='form-control form-select'>
                @foreach($years as $year)
                <option {{ date('Y') == $year ? 'selected' : '' }} value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>



<div id='plantilla-reports-table' class='mt-2'>
    <div class="float-right mb-2">
        <button class='btn btn-info shadow' id='btnDbmExport'>
            <i class="las la-file-excel"></i>
            DBM - EXPORT XLS
        </button>

        <button class='btn btn-info shadow' id='btnExport'>
            <i class="las la-file-excel"></i>
            CSC - EXPORT XLS
        </button>
    </div>
    <div class="table-responsive">
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
                    <th class='font-weight-bold text-sm text-truncate'>FULLNAME</th>
                    <th class='font-weight-bold text-sm'>OFFICE</th>
                    <th class='font-weight-bold text-sm text-truncate'>ORIGINAL APPOINTMENT</th>
                    <th class='font-weight-bold text-sm text-truncate'>LAST PROMOTION</th>
                </tr>
            </thead>
            <tbody id='dynamic-content-of-plantilla-report'>
            </tbody>
            {{-- <tfoot>
                <tr class='bg-light text-center'>
                    <td colspan='7'>
                        VACANT : <span class='font-weight-bold' id='vacant-total'>0</span>
                    </td>
                    <td colspan='6'>
                        PERSONNEL WITH PLANTILLA : <span id='personnel-with-plantilla-total' class='font-weight-bold'>0</span>
                    </td>
                </tr>
                <tr class='bg-light'>
                    <td colspan='13' class='text-center'>
                        TOTAL : <span id='total' class='font-weight-bold'>0</span>
                    </td>
                </tr>
            </tfoot> --}}
        </table>
    </div>
</div>

@push('page-scripts')
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        , }
    , });

    // $('#plantilla-reports-table').hide();

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

    let office = '*';
    let year = 2022;

    let table = $('#report-table').DataTable({
        ajax: `/plantilla-report/generate/${office}/${year}`,
        serverSide: true,
        processing: true,
        destroy: true,
        aLengthMenu: [[11, 50, 75, -1], [11, 50, 75, "All"]],
        iDisplayLength: 11,
        language: {
            processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
        },
        drawCallback: function() {
            $('.vacant-cell').each(function(index, element) {
                $(element).parent().css('background', '#FFFF00').addClass('font-weight-bold').addClass('text-dark');
            });
        },
        columns: [
            {
                name: 'item_no',
                data: 'item_no',
                class : 'align-middle text-sm text-center text-truncate',
            },
            {
                name: 'Description',
                data: 'Description',
                class : 'align-middle text-sm text-truncate',
             },
             {
                name: 'sg_no',
                data: 'sg_no',
                class : 'align-middle text-sm text-center',
            },
            {
                name: 'salary_amount_yearly',
                data: 'salary_amount_yearly',
                class : 'align-middle text-sm text-right',
                render : function(rawData) {
                    return number_format(rawData, 2, ".", ",");
                }
            },
            {
                name: 'salary_amount_previous_yearly',
                data: 'salary_amount_previous_yearly',
                class : 'align-middle text-sm text-right',
                render : function(rawData) {
                    return number_format(rawData, 2, ".", ",");
                }
            },
            {
                name: 'step_no',
                data: 'step_no',
                class : 'align-middle text-sm text-center',
            },
            {
                name: 'area_code',
                data: 'area_code',
                class : 'align-middle text-sm text-center',
            },
            {
                name: 'area_type',
                data: 'area_type',
                class : 'align-middle text-sm text-center',
            },
            {
                name: 'area_level',
                data: 'area_level',
                class : 'align-middle text-sm text-center',
            },
            {
                name: 'fullname',
                data: 'fullname',
                class : 'align-middle text-sm font-weight-medium text-truncate',
                render : function(rawData, a, b, c) {
                    if(rawData.trim() === ',') {
                        return "<center class='vacant-cell'>VACANT</center>";
                    } else {
                        return `<span>${rawData.trim()}</span>`;
                    }
                },
            },
            {
                name: 'office_short_name',
                data: 'office_short_name',
                class : 'align-middle text-sm text-uppercase text-truncate',
                render : function (_, _, row) {
                    return row.office_short_name  || row.division_name || row.section_name || row.office_name;
                }
            },
            {
                name: 'date_original_appointment',
                 data: 'date_original_appointment',
                class : 'align-middle text-sm text-center',
             },
            {
                name: 'date_last_promotion',
                data: 'date_last_promotion',
                class : 'align-middle text-sm text-center',
            },
        ]
     });

    $('#office').change(function () {
        let office = $(this).val();
        let year = $('#year').val();
        table.ajax.url(`/plantilla-report/generate/${office}/${year}`).load();
    });

    $('#year').change(function () {
        let office = $('#office').val();
        let year = $(this).val();
        table.ajax.url(`/plantilla-report/generate/${office}/${year}`).load();
    });

    $('#btnDbmExportPdf').click(function() {
        $('#btnDbmExportPdf').html('<i class="las la-spinner la-spin"></i>');

        let office = $("#office").val();
        let year = $('#year').val();

        $.post({
            url: `/dbm/plantilla-report/generate/${office}/${year}`
            , success: function(response) {
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
                }
            }
        });
    });

    $('#btnDbmExport').click(function() {
        // Change the content of button to a loading text
        $('#btnDbmExport').html('<i class="las la-spinner la-spin"></i>');

        let office = $("#office").val();
        let year = $('#year').val();

        $.post({
            url: `/dbm/plantilla-report/generate/${office}/${year}`
            , success: function(response) {
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
        $('#btnExport').html('<i class="las la-spinner la-spin"></i>');

        let office = $("#office").val();
        let year = $('#year').val();
        $.post({
            url: `/export/${office}/${year}`
            , success: function(response) {
                if (response.success) {
                    window.open(`download/plantilla-generated-report/${response.fileName}`);
                    $('#btnExport').html(`
                        <i class="las la-file-excel"></i>
                        CSC - EXPORT XLS
                    `);
                }
            }
        });
    });


</script>
@endpush
@endsection

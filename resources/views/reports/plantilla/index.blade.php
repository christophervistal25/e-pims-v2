@extends('layouts.app')
@section('title', 'Plantilla Report History')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/style.css" />
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endprepend
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="text-uppercase font-weight-bold">Select Year</label>
            <select name="selected_year" id="year" class="form-control">
                @foreach($years as $year)
                <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label class="text-uppercase font-weight-bold">Select Type</label>
            <select name="type" class="form-control" id="selectedType">
                <option value="CSC">CSC PLANTILLA</option>
                <option value="DBM">DBM PLANTILLA</option>
            </select>
        </div>
    </div>
    <div class="col-lg-2 align-middle">
        <label class="text-uppercase font-weight-bold">&nbsp;</label>
        <button class="btn btn-primary btn-block" id='btnGenerate'>Generate</button>
    </div>
</div>
<div class="card" id="report-wrapper">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="reports-table" width="100%">
                <thead>
                    <tr class="text-uppercase text-center bg-light">
                        <th>ID</th>
                        <th>Year</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="create-report-form-wrapper">
    <div class="card">
        <div class="card-body">
            <form id="generateReportForm">

                <div class="form-group">
                    <label>Year</label>
                    <input type="text" class="form-control" id="selectedYear" readonly>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="description"></textarea>
                </div>

                <div class="form-group">
                    <label>As of Date</label>
                    <input type="date" class="form-control" id="asOfDate">
                </div>

                <div class="form-group">
                    <label>Plantilla Type</label>
                    <input type="text" class="form-control" id="type" readonly>
                </div>

                <div class="float-right">
                    <button class="btn btn-info">
                        <i class="las la-eye"></i>
                        Preview
                    </button>
                    <button class="btn btn-primary" id="formBtnGenerate">
                        <i class="las la-folder-plus"></i>
                        Generate
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@push('page-scripts')
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script>
    $('#create-report-form-wrapper').hide();

    let table = $('#reports-table').DataTable({
        ajax : `/plantilla-report-history-list/*`,
        serverSide : true,
        processing: true,
        destroy: true,
        language: {
            processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>'
        },
        columns : [
            {
                class : 'text-center align-middle',
                name : 'Id',
                data : 'Id',
            },
            {
                class : 'text-center align-middle',
                name : 'Year',
                data : 'Year',
            },
            {
                class : 'align-middle',
                name : 'Description',
                data : 'Description',
            },
            {
                class : 'text-center align-middle',
                name : 'Asof_date',
                data : 'Asof_date',
            },
            {
                class : 'text-center align-middle',
                name : 'Plantilla_type',
                data : 'Plantilla_type',
            },
            {
                class : 'text-center align-middle',
                name : 'Id',
                data : 'Id',
                render : function (Id) {
                    return `
                    <button class="btn btn-primary">
                            <i class="las la-eye"></i>
                        </button>
                        <button class="btn btn-danger btn__remove__report" data-id="${Id}">
                            <i class="las la-trash"></i>
                        </button>
                    `;
                }
            },

        ]
    });
    $('#btnGenerate').click(function() {
        $('#report-wrapper').fadeOut(300);
        let year = $('#year').val();
        let description = $('#description').val();
        let asOfDate = $('#asOfDate').val();
        let plantillaType = $('#selectedType').val();

        // Checkpoint before display the form.
        $.ajax({
            url : '/plantilla-report-history-checkpoint',
            method : 'POST',
             data : {
                year,
                description,
                asOfDate,
                plantillaType
             },
             success : function (response) {
                if(response.success) {
                    setTimeout(() => $('#create-report-form-wrapper').show().fadeIn(300), 350);
                    // Initialize valu  es for form
                    let year = $('#year').val();
                    let type = $('#selectedType').val();

                    $('#selectedYear').val(year);
                    $('#description').val(`${type} PLANTILLA ${year}`);
                    $('#type').val(type);
                }
             },
             error : function(response) {

             }
        });

    });

    const clearErrorMessage = (parent, target) => $('#generateReportForm').children().find(parent).each((index, element) => $(element).parent().find(target).remove());
    const removeIsInvalidClass = (parent) => $('#generateReportForm').children().find(parent).removeClass('is-invalid');

    $('#formBtnGenerate').click(function(e) {
        e.preventDefault();

        let year = $('#year').val();
        let description = $('#description').val();
        let asOfDate = $('#asOfDate').val();
        let plantillaType = $('#type').val();


        clearErrorMessage('input', 'span');
        clearErrorMessage('textarea', 'span');
        removeIsInvalidClass('input');
        removeIsInvalidClass('textarea');



        $.post({
            url: '/plantilla-report-history-generate'
            , data: {
                year
                , description
                , asOfDate
                , plantillaType
            }
            , success: function(response) {
                if(response.success) {
                    swal({
                        title : '',
                        text : `Successfullye generate a ${plantillaType}  report`,
                        icon : 'success',
                        buttons : false,
                        timer : 5000,
                    });
                    table.ajax.reload();
                    $('#create-report-form-wrapper').fadeOut(300);
                    setTimeout(() => $('#report-wrapper').show().fadeIn(300), 350);
                }
            }
            , error: function(response) {
                if (response.status === 422) {
                    Object.keys(response.responseJSON.errors).map((key) => {
                        let [errorMessage] = response.responseJSON.errors[key];
                        let element = `#${key}`;
                        $(element).addClass('is-invalid').parent().append(`
                            <span class="text-danger">${errorMessage}</span>
                        `);
                    });
                }
            }
        });
    });


    $(document).on('click', '.btn__remove__report', async function () {
        let id = $(this).attr('data-id');
        let confirmation = await swal({
            icon : 'warning',
            text : 'Are you sure you want to delete this report?',
            title : '',
            dangerMode : true,
            buttons : ["No", "Yes"]
        });

        if(confirmation) {
            $.ajax({
                url : `/plantilla-report-history-remove/${id}`,
                method : 'DELETE',
                success : function (response) {
                    if(response.success) {
                        table.ajax.reload();
                    }
                },
            });
        }

    });
</script>
@endpush
@endsection

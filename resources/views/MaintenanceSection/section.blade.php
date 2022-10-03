@extends('layouts.app')
@section('title', 'Section')
@prepend('page-css')
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('/css/bootstrap-float-label.min.css') }}" />
<script src="{{ asset("js/sweetalert.min.js") }}"></script>
<style>
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
@prepend('meta-data')
<meta id="divisionMetaData" content="@foreach($division as $divisions){ |officeCode|:|{{ $divisions->office_code }}|, |divisionId|:|{{ $divisions->division_id }}|, |divisionName|:|{{ $divisions->division_name }}|}, @endforeach">
@endprepend
@section('content')
<div class="kanban-board card">
     <div class="card-body">
          <div id="add" class="page-header {{  count($errors->all())  !== 0 ?  '' : 'd-none' }}">
               <div style='padding-bottom:50px;'>
                    <button id="showListDivision" class="btn btn-primarys submit-btn float-right shadow"><i class="fa fa-list"></i> Division List</button>
               </div>
               <form action="" method="" id="maintenanceSectionForm">
                    @csrf
                    <div class="alert alert-secondary text-center font-weight-bold" role="alert">ADD NEW SECTION</div>
                    <div class="container">
                         <div class="row justify-content-center align-items-center">

                            <div class="form-group col-10 col-lg-7">
                                <label class="has-float-label officeCode mb-0">
                                     <select value="" class="form-control selectpicker  {{ $errors->has('officeCode')  ? 'is-invalid' : ''}}" name="officeCode" data-live-search="true" id="officeCode" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <option></option>
                                              @foreach($office as $offices)
                                             <option {{ old('officeCode') == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">
                                                 {{ $offices->office_name }}
                                             </option>
                                             @endforeach
                                     </select>
                                     <span class="font-weight-bold">Office<span class="text-danger">*</span></span>
                                </label>
                                <div id='office-code-error-message' class='text-danger text-sm'>
                                </div>
                           </div>

                            <div class="form-group col-10 col-lg-7">
                                <label class="has-float-label divisionId mb-0">
                                     <select value="" class="form-control selectpicker divisionId  {{ $errors->has('divisionId')  ? 'is-invalid' : ''}}" name="divisionId" data-live-search="true" id="divisionId" data-size="4" data-width="100%" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                             <option></option>
                                     </select>
                                     <span class="font-weight-bold">Division<span class="text-danger">*</span></span>
                                </label>
                                <div id='division-id-error-message' class='text-danger text-sm'>
                                </div>
                           </div>

                              <div class="form-group col-12 col-md-6 col-lg-7">
                                   <label class="has-float-label mb-0">
                                        <input value="{{ old('sectionName') }}" class="form-control {{ $errors->has('sectionName')  ? 'is-invalid' : ''}}" name="sectionName" id="sectionName" type="text" style="outline: none; box-shadow: 0px 0px 0px transparent;">
                                        <span class="font-weight-bold">Section Name<span class="text-danger">*</span></span>
                                   </label>
                                   <div id='section-name-error-message' class='text-danger text-sm'>
                                   </div>
                              </div>



                              <div class="form-group form-group submit-section col-12">
                                   <button id="saveBtn" class="btn btn-primarys submit-btn float-right shadow" type="submit">
                                        <span id="loading" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
                                        <i class="fas fa-save"></i> Save
                                   </button>
                                   <button style="margin-right:10px;" type="button" id="cancelButton" onclick="myFunction()" class="text-white btn btn-danger submit-btn float-right shadow"><i class="fas fa-ban"></i> Cancel</button>
                              </div>
                         </div>
                    </div>
               </form>
          </div>

          <div id="table" class="page-header {{  count($errors->all()) == 0 ? '' : 'd-none' }}">
               <div class="row">
                    <div class="col-8 mb-2">
                        <select value="" data-style="btn-primarys text-white" class="form-control form-control-xs selectpicker {{ $errors->has('employeeOffice')  ? 'is-invalid' : ''}}" name="maintenanceSectionOffice" data-live-search="true" id="maintenanceSectionOffice" data-size="5">
                             <option value="">All</option>
                             @foreach($office as $offices)
                              <option {{ '0001' == $offices->office_code ? 'selected' : '' }} value="{{ $offices->office_code }}">{{ $offices->office_name }}</option>
                              @endforeach
                        </select>
                   </div>
                    <div class="col-4 float-right mb-2">
                         <button id="addButton" class="btn btn-primarys submit-btn float-right"><i class="fa fa-plus"></i>
                              Add
                              New Section</button>
                    </div>
               </div>

               <div class="table">
                    <table class="table table-bordered table-hover" id="maintenanceSection" style="width:100%;">
                         <thead>
                              <tr>
                                  <td scope="col" class="text-truncate">Id</td>
                                  <td scope="col" class="text-truncate">Description</td>
                                  <td scope="col" class="text-truncate">Division</td>
                                  <td scope="col" class="text-truncate">Office</td>
                                   <td scope="col" class="text-truncate">Action</td>
                              </tr>
                         </thead>
                    </table>
               </div>
               <div class="result">
               </div>
          </div>
     </div>
</div>
@push('page-scripts')
<script>
     $.ajaxSetup({
          headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
     });

     $(document).on("click", ".delete", function() {
          let $ele = $(this).parent().parent();
          let id = $(this).attr("value");
          swal({
               title: "Are you sure you want to delete?",
               text: "Once deleted, you will not be able to recover this record!",
               icon: "warning",
               buttons: true,
               dangerMode: true
          }).then((willDelete) => {
               if (willDelete) {
                    $.ajax({
                         url: `/maintenance-section/${id}`,
                         type: "DELETE",
                         cache: false,
                         data: {
                              _token: '{{ csrf_token() }}'
                         }
                         , success: function(dataResult) {
                              var dataResult = JSON.parse(dataResult);
                              if (dataResult.statusCode == 200) {
                                   $('#maintenanceSection').DataTable().ajax.reload();
                                   swal({
                                        title: '',
                                        text: 'Successfully Deleted',
                                        icon: 'success',
                                        buttons: false,
                                        timer: 5000
                                    });
                              }
                         }
                    });
               }
          });
     });

     // filter position and division by office
    $("#officeCode").change(function (e) {
        //divisionMetaData
        if (document.querySelectorAll('[id="divisionMetaData"]')[1] == null) {
            var divisionMetaData = document
                .querySelectorAll('[id="divisionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var divisionMetaData = document
                .querySelectorAll('[id="divisionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var divisionMetaDataRemoveLast =
            "[" +
            divisionMetaData.substring(0, divisionMetaData.length - 2) +
            "]";
        let divisionOfficeCodeOptionAll = JSON.parse(
            divisionMetaDataRemoveLast
        );
        if (document.querySelectorAll('[id="divisionMetaData"]')[1] == null) {
            var metaDataDivision = document
                .querySelectorAll('[id="divisionMetaData"]')[0]
                .content.replaceAll("|", '"');
        } else {
            var metaDataDivision = document
                .querySelectorAll('[id="divisionMetaData"]')[1]
                .content.replaceAll("|", '"');
        }
        var metaDataDivisionRemoveLast =
            "[" +
            metaDataDivision.substring(0, metaDataDivision.length - 2) +
            "]";
        let divisionOptionAll = JSON.parse(metaDataDivisionRemoveLast);
        let officeCode2 = e.target.value;
        //filter all division data in plantilla//
        let plantillaDivisionFilter = divisionOfficeCodeOptionAll.filter(
            function (Division) {
                return Division.officeCode == officeCode2;
            }
        );
        //Remove all option in #divisionId//
        function removeOptionsDivision(selectDivision) {
            var ii,
                L = selectDivision.options.length - 1;
            for (ii = L; ii >= 0; ii--) {
                selectDivision.remove(ii);
            }
        }
        removeOptionsDivision(document.getElementById("divisionId"));
        //add division data based in what you select in #officeCode//
        var i,
            plantillaLengthDivisionId = plantillaDivisionFilter.length;
        $("#divisionId").append("<option></option>");
        for (i = 0; i < plantillaLengthDivisionId; i++) {
            var plantillaDivisionFilter_final = plantillaDivisionFilter[i];
            //filter all division data//
            let divisionIdFilter = divisionOptionAll.filter(function (
                Division
            ) {
                return (
                    Division.officeCode ==
                    plantillaDivisionFilter_final.officeCode
                );
            });
            $("#divisionId").append(
                '<option value="' +
                    divisionIdFilter[i].divisionId +
                    '">' +
                    divisionIdFilter[i].divisionName +
                    "</option>"
            );
        }
        $("#divisionId").selectpicker("refresh");
    });
</script>
<script src="{{ asset('/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>
<script src="{{ asset('/assets/js/maintenance-section.js') }}"></script>
@endpush
@endsection

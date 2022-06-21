@inject('holiday', 'App\Holiday')
@extends('layouts.app')
@section('title', 'Holidays')
@prepend('page-css')
<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/css/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css">
<style>
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

     .fc-daygrid-day {
          cursor: pointer;
     }

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css">
@endprepend
@section('content')
<div class="card" id="cardBody">
     <div class="card-body">
          <div class="row mb-3">
               <div class="col-6">
                    {{-- <button type="button" class="btn btn-info shadow" id="calendarBtn" data-view="calendar"><i class="far fa-calendar-alt float-start"></i> View Calendar</button> --}}
               </div>
               <div class="col-6 text-right">
                    <button type="button" class="btn btn-primary text-white shadow" data-toggle="modal" data-target="#addNewHolidayModal">
                         <i class='la la-plus'></i>
                         Add new holiday
                    </button>
               </div>
          </div>


          {{-- TABLE FOR HOLIDAYS --}}
          <div class="clearfix"></div>
          <div id="table__parent__container">
               <table class='table table-bordered table-hover ' id='holidays-table' width="100%">
                    <thead>
                         <tr>
                              <th>Name</th>
                              <th>Date</th>
                              <th>Type</th>
                              <th class='text-center'>Actions</th>
                         </tr>
                    </thead>
                    <tbody cellpadding="20"></tbody>
               </table>
          </div>
          <div id="calendar__container">
               <div class="container" id="calendar"></div>
          </div>
     </div>
</div>



<!-- SAVE Modal -->
<div class="modal rounded-0 fade " id="addNewHolidayModal" data-keyboard="false" data-backdrop="static">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Add new Holiday</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                    <div class="form-group">
                         <label for="">Enter holiday name</label>
                         <input type="text" class='form-control' id="holidayName">
                         <span id="name-error" class='text-danger'></span>
                    </div>

                    <div class="form-group">
                         <label for="">Pick date</label>
                         <input type="date" class='form-control' id="holidayDate">
                         <span id="date-error" class='text-danger'></span>
                    </div>

                    <div class="form-group">
                         <label for="">Holiday Type</label>
                         <select id="holidayType" class='form-control'>
                              @foreach($holiday::TYPES as $type)
                              <option value="{{  $type }}">{{ $type }}</option>
                              @endforeach
                         </select>
                         <span id="type-error" class='text-danger'></span>
                    </div>

               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                    <button type="button" class="btn btn-primary shadow text-white" id="btnHolidaySave">
                         <div class="spinner-border spinner-border-sm text-light d-none" id="save-spinner" role="status">
                              <span class="sr-only">Loading...</span>
                         </div>
                         Save
                    </button>
                    <button type="button" class="btn btn-danger text-white shadow" data-dismiss="modal">Close</button>
               </div>

          </div>
     </div>
</div>

<!-- EDIT Modal -->
<div class="modal rounded-0 fade" id="editHolidayModal" data-keyboard="false" data-backdrop="static">
     <div class="modal-dialog">
          <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                    <h4 class="modal-title">Edit Holiday</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                    <div class="form-group">
                         <label for="">Enter holiday name</label>
                         <input type="text" class='form-control' id="editHolidayName">
                         <span id="edit-name-error" class='text-danger'></span>
                    </div>

                    <div class="form-group">
                         <label for="">Pick date</label>
                         <input type="date" class='form-control' id="editHolidayDate">
                         <span id="edit-date-error" class='text-danger'></span>
                    </div>

                    <div class="form-group">
                         <label for="">Holiday Type</label>
                         <select id="editHolidayType" class='form-control'>
                              @foreach($holiday::TYPES as $type)
                              <option value="{{  $type }}">{{ $type }}</option>
                              @endforeach
                         </select>
                         <span id="edit-type-error" class='text-danger'></span>
                    </div>

               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                    <button type="button" class="btn btn-success text-white shadow" id="btnHolidayUpdate">
                         <div class="spinner-border spinner-border-sm text-light d-none" id="update-spinner" role="status">
                              <span class="sr-only">Loading...</span>
                         </div>
                         Update
                    </button>
                    <button type="button" class="btn btn-danger text-white shadow" data-dismiss="modal">Close</button>
               </div>

          </div>
     </div>
</div>




@push('page-scripts')
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
<script src="{{ asset('/assets/js/holiday.js') }}"></script>

@endpush
@endsection

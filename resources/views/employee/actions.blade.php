<div class="text-center align-middle">
     <button class='btn btn-success btn-edit-employee shadow' title="Edit Employee" data-employee-id="{{ $id }}">
          <i class='las la-edit' style='pointer-events:none;'></i>
     </button>

     <a class='btn btn-info shadow' title="Edit PDS" href="{{ route('employee.personal-data-sheet.edit', $id) }}" target="_blank">
          <i class='las la-file' style='pointer-events:none;'></i>
     </a>

     <button class='btn btn-primary shadow btn-download-pds' data-id="{{ $employee_id }}" title="Download PDS">
          <i class='las la-download' style='pointer-events:none;'></i>
     </button>


</div>

<div class="text-center align-middle">
     <button class='btn btn-success btn-edit-employee shadow' title="Edit Employee" data-employee-id="{{ $id }}">
          <i class='las la-pen' style='pointer-events:none;'></i>
     </button>

     <a class='btn btn-info shadow' title="Edit PDS" href="{{ route('employee.personal-data-sheet.edit', $id) }}" target="_blank">
          <i class='las la-file' style='pointer-events:none;'></i>
     </a>

     <button class='btn btn-primary shadow btn-download-pds' data-id="{{ $employee_id }}" title="Download PDS">
          <i class='las la-download' style='pointer-events:none;'></i>
     </button>

     <button 
        @class([
            'btn',
            $isActive === '1' ? 'btn-danger' : 'btn-warning',
            'text-white',
            'shadow',
            'btn-mark-as-retire',
        ])
        data-id="{{ $employee_id }}" data-active-status="{{ $isActive }}" title="{{ $isActive  == 1? 'Mark as retire' : 'Mark as active' }}">
          @if($isActive == 1)
            <i class="las la-user-alt-slash" style='pointer-events:none;'></i>
          @else
            <i class="las la-redo-alt" style='pointer-events:none;'></i>
          @endif
     </button>


</div>

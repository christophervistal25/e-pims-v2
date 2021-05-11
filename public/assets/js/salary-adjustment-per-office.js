 // display salary grade
$(function() {
    var table = $('#salaryAdjustmentPerOffice').DataTable({
        processing: true,
        bPaginate: false,
        bLengthChange: false,
        bInfo: false,
        serverSide: true,
        destroy: true,  
        retrieve: true,
        aoColumnDefs : [{
        orderable : false, aTargets : [0]
        }],
        order: [[1, 'asc']],
        ajax: '/salary-adjustment-per-office-list',
        columns: [
                {data: 'checkbox', name: 'checkbox', searchable: false, orderable: false, sortable : false},
                { data: 'employee', name: 'employee'},
                { data: 'sg_no', name: 'sg_no' },
                { data: 'step_no', name: 'step_no' },
                { data: 'salary_previous', name: 'salary_previous' },
                { data: 'salary_new', name: 'salary_new' },
                { data: 'salary_diff', name: 'salary_diff' },
                { data: 'plantilla', name: 'plantilla.office_code'},
                { data: 'action', name: 'action' }
        ]
    });
    table.draw();
    $("#employeeOffice").change(function() {
        let val = $.fn.dataTable.util.escapeRegex(
            $(this).val()
        );
        table.search( val ? ''+val+'' : '', true, false ).draw();
    });

    // $('#selectAll').click(function(){
    //     // Get all rows with search applied
    //     var rows = table.rows({ 'search': 'applied' }).nodes();
    //     // Check/uncheck checkboxes for all rows in the table
    //     $('input[type="checkbox"]', rows).prop('checked', this.checked);
    // });

    //  // Handle click on checkbox to set state of "Select all" control
    // $('#salaryAdjustmentPerOffice tbody').on('change', 'input[type="checkbox"]', function(){
    //     // If checkbox is not checked
    //     if(!this.checked){
    //     var el = $('#selectAll').get(0);
    //     // If "Select all" control is checked and has 'indeterminate' property
    //     if(el && el.checked && ('indeterminate' in el)){
    //         // Set visual state of "Select all" control
    //         // as 'indeterminate'
    //         el.indeterminate = true;
    //     }
    //     }
    // });


});



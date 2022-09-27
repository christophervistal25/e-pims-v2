const MAINTENANCE_LEAVE_LIST = "/maintenance/leave/list"

let table = $('#leave-types-table').DataTable({
    ajax: MAINTENANCE_LEAVE_LIST,
    serverSide: true,
    processing: true,
    language: {
        processing: '<i class="text-primary fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span> '
    },
    columns: [
        {
            className: 'text-truncate align-middle',
            data: "leave_type_id",
            name: "leave_type_id"
        },
        {
            className: "text-truncate align-middle",
            data: "description",
            name: "description"
        }
    ]
});

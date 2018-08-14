/**
 * Created by Iamjustakid on 11/26/2017.
 */

var table = $('.tblDetails').DataTable({
    "scrollX": true,
    "pageLength": 25,
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'print',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible'
            }
        },
        'colvis'
    ]
});
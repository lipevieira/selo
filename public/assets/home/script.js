$(document).ready(function () {
    $('#tblInstitution').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
    $('#tblLevelActivity').DataTable();
    $('#tblProfileCollaborators').DataTable();
    $('#tblMembrersComission').DataTable();
    $('#tblShedule').DataTable();
});
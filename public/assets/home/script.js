$(document).ready(function () {
    $('#tblInstitution').DataTable({
        dom: 'Bfrtip',
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada Encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum equipamento encontrado",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            },
            "search": "Pesquisar"
        },
        buttons: [
            {
                extend: 'excel',
                text: '<i class="fa fa-files-o"></i> Excel',
                titleAttr: 'Excel',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'PDF',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            }, 
            {
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i> Copy',
                titleAttr: 'Copy',
                className: 'btn btn-primary btn-sm'
            },
            
        ]
    } );
        
    $('#tblLevelActivity').DataTable({
        dom: 'Bfrtip',
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada Encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum equipamento encontrado",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            },
            "search": "Pesquisar"
        },
        buttons: [
            {
                extend: 'excel',
                text: '<i class="fa fa-files-o"></i> Excel',
                titleAttr: 'Excel',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'PDF',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i> Copy',
                titleAttr: 'Copy',
                className: 'btn btn-primary btn-sm'
            },

        ]
    } );
    $('#tblProfileCollaborators').DataTable({
        dom: 'Bfrtip',
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada Encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum equipamento encontrado",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            },
            "search": "Pesquisar"
        },
        buttons: [
            {
                extend: 'excel',
                text: '<i class="fa fa-files-o"></i> Excel',
                titleAttr: 'Excel',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'PDF',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i> Copy',
                titleAttr: 'Copy',
                className: 'btn btn-primary btn-sm'
            },

        ]
    } );
    $('#tblMembrersComission').DataTable({
        dom: 'Bfrtip',
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada Encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum equipamento encontrado",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            },
            "search": "Pesquisar"
        },
        buttons: [
            {
                extend: 'excel',
                text: '<i class="fa fa-files-o"></i> Excel',
                titleAttr: 'Excel',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'PDF',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i> Copy',
                titleAttr: 'Copy',
                className: 'btn btn-primary btn-sm'
            },

        ]
    } );
    $('#tblShedule').DataTable({
        dom: 'Bfrtip',
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada Encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum equipamento encontrado",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            },
            "search": "Pesquisar"
        },
        buttons: [
            {
                extend: 'excel',
                text: '<i class="fa fa-files-o"></i> Excel',
                titleAttr: 'Excel',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'PDF',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i> Copy',
                titleAttr: 'Copy',
                className: 'btn btn-primary btn-sm'
            },

        ]
    } );
});
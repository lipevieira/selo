$(document).ready(function () {

    $('#list_instituicao_detalhes').removeClass('inactive_tab1');
    $('#list_instituicao_detalhes').addClass('active_tab1 active');

    $('#list_instituicao_detalhes').attr('href', '#instituicao_detalhes');

    $('#list_instituicao_detalhes').attr('data-toggle', 'tab');
    $('#instituicao_detalhes').addClass('active in');

    $('#list_diagnostico_censitario').attr('href', '#diagnostico_censitario');
    $('#list_diagnostico_censitario').attr('data-toggle', 'tab');
    // Plano de trabalho
    $('#list_plano_trabalho_etnico').attr('href', '#plano_trabalho');
    $('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
    // Cronograma
    $('#list_cronograma').attr('href', '#cronograma');
    $('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
    $('#list_cronograma').attr('data-toggle', 'tab');
    // Pacerias
    $('#list_parceiras').attr('href', '#parceiras');
    $('#list_parceiras').attr('data-toggle', 'tab');
    // Metodologia
    $('#list_metodologia').attr('href', '#metodologia');
    $('#list_metodologia').attr('data-toggle', 'tab');
    // Resuldados
    $('#list_resultados_esperados').attr('href', '#resultados_esperados');
    $('#list_resultados_esperados').attr('data-toggle', 'tab');
    // Documentos
    $('#list_documentos').attr('href', '#documento');
    $('#list_documentos').attr('data-toggle', 'tab');

    $('#tblLevelActivity').DataTable({
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total da coluna de homems
            pageMem = api
                .column(3, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(3).footer()).html(
                pageMem
            );
            // Total da coluna de mulheres
            pageWomana = api
                .column(4, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(4).footer()).html(
                pageWomana
            );
            // Total da Coluna total
            pageTotal = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(5).footer()).html(
                pageTotal
            );

        },
        dom: 'Bfrtip',
        "bPaginate": false,
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada Encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro encontrado",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            },
            "search": "Pesquisar"
        },
        "bFilter": false,
        buttons: [
            {
                extend: 'excel', footer: true,
                text: '<i class="fa fa-files-o"></i> Excel',
                titleAttr: 'Excel',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
        ]
    });
    $('#tblProfileCollaborator').DataTable({
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            // Total da coluna de homens
            pageHomens = api
                .column(1, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            $(api.column(1).footer()).html(
                pageHomens
            );


            // Total da coluna de mulhres
            pageMulhres = api
                .column(2, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(2).footer()).html(
                pageMulhres
            );
            // Total da coluna TOTAL
            pageWomana = api
                .column(3, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(3).footer()).html(
                pageWomana
            );


        },
        "bFilter": false,
        dom: 'Bfrtip',
        "bPaginate": false,
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada Encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro encontrado",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            },
            "search": "Pesquisar"
        },
        buttons: [
            {
                extend: 'excel', footer: true,
                text: '<i class="fa fa-files-o"></i> Excel',
                titleAttr: 'Excel',
                className: 'btn btn-primary btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
            },
        ]
    });


});
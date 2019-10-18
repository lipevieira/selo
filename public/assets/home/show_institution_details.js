$(document).ready(function () {

    $('#btn_indentificacao').click(function () {

        $('#list_instituicao_detalhes').removeClass('active active_tab1');
        $('#list_instituicao_detalhes').removeAttr('href data-toggle');
        $('#instituicao_detalhes').removeClass('active');
        $('#list_instituicao_detalhes').addClass('inactive_tab1');
        // Ativando outra aba no menu
        $('#list_diagnostico_censitario').removeClass('inactive_tab1');
        $('#list_diagnostico_censitario').addClass('active_tab1 active');

        $('#list_diagnostico_censitario').attr('href', '#diagnostico_censitario');
        $('#list_diagnostico_censitario').attr('data-toggle', 'tab');
        $('#diagnostico_censitario').addClass('active in');

    });

    $('#btn_previous_diagnostico').click(function () {
        $('#list_diagnostico_censitario').removeClass('active active_tab1');
        $('#list_diagnostico_censitario').removeAttr('href data-toggle');

        $('#diagnostico_censitario').removeClass('active in');
        $('#list_diagnostico_censitario').addClass('inactive_tab1');

        $('#list_instituicao_detalhes').removeClass('inactive_tab1');
        $('#list_instituicao_detalhes').addClass('active_tab1 active');

        $('#list_instituicao_detalhes').attr('href', '#instituicao_detalhes');

        $('#list_instituicao_detalhes').attr('data-toggle', 'tab');
        $('#instituicao_detalhes').addClass('active in');
    });

    // Diagnostico proximo
    $('#btn_diagnostico_next').click(function () {

        $('#list_diagnostico_censitario').removeClass('active active_tab1');
        $('#list_diagnostico_censitario').removeAttr('href data-toggle');

        $('#diagnostico_censitario').removeClass('active');
        $('#list_diagnostico_censitario').addClass('inactive_tab1');

        $('#list_plano_trabalho_etnico').removeClass('inactive_tab1');
        $('#list_plano_trabalho_etnico').addClass('active_tab1 active');

        $('#list_plano_trabalho_etnico').attr('href', '#plano_trabalho');

        $('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
        $('#plano_trabalho').addClass('active in');

    });

    $('#btn_previous_plano_trabalho').click(function () {
        $('#list_plano_trabalho_etnico').removeClass('active active_tab1');
        $('#list_plano_trabalho_etnico').removeAttr('href data-toggle');

        $('#plano_trabalho').removeClass('active in');
        $('#list_plano_trabalho_etnico').addClass('inactive_tab1');

        $('#list_diagnostico_censitario').removeClass('inactive_tab1');
        $('#list_diagnostico_censitario').addClass('active_tab1 active');

        $('#list_diagnostico_censitario').attr('href', '#diagnostico_censitario');
        $('#list_diagnostico_censitario').attr('data-toggle', 'tab');
        $('#diagnostico_censitario').addClass('active in');
    });

    //Button Proximo plano de trabalho
    $('#btn_plano_trabalho_next').click(function () {

        $('#list_plano_trabalho_etnico').removeClass('active active_tab1');
        $('#list_plano_trabalho_etnico').removeAttr('href data-toggle');

        $('#plano_trabalho').removeClass('active');
        $('#list_plano_trabalho_etnico').addClass('inactive_tab1');

        $('#list_cronograma').removeClass('inactive_tab1');
        $('#list_cronograma').addClass('active_tab1 active');

        $('#list_cronograma').attr('href', '#cronograma');

        $('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
        $('#cronograma').addClass('active in');

    });
    // Button previos Cronograma
    $('#btn_previous_cronograma').click(function () {
        $('#list_cronograma').removeClass('active active_tab1');
        $('#list_cronograma').removeAttr('href data-toggle');

        $('#cronograma').removeClass('active in');
        $('#list_cronograma').addClass('inactive_tab1');

        $('#list_plano_trabalho_etnico').removeClass('inactive_tab1');
        $('#list_plano_trabalho_etnico').addClass('active_tab1 active');

        $('#list_cronograma').attr('href', '#cronograma');
        $('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
        $('#plano_trabalho').addClass('active in');
    });
    //Button proximo plano de trabalho
    $('#btn_plano_next').click(function () {

        $('#list_cronograma').removeClass('active active_tab1');
        $('#list_cronograma').removeAttr('href data-toggle');

        $('#cronograma').removeClass('active');
        $('#list_cronograma').addClass('inactive_tab1');

        $('#list_parceiras').removeClass('inactive_tab1');
        $('#list_parceiras').addClass('active_tab1 active');

        $('#list_parceiras').attr('href', '#parceiras');

        $('#list_cronograma').attr('data-toggle', 'tab');
        $('#parceiras').addClass('active in');

    });
    // Button Anterior Parceiras
    $('#btn_previous_parceiras').click(function () {
        $('#list_parceiras').removeClass('active active_tab1');
        $('#list_parceiras').removeAttr('href data-toggle');

        $('#parceiras').removeClass('active in');
        $('#list_parceiras').addClass('inactive_tab1');

        $('#list_cronograma').removeClass('inactive_tab1');
        $('#list_cronograma').addClass('active_tab1 active');

        $('#list_cronograma').attr('href', '#cronograma');
        $('#list_cronograma').attr('data-toggle', 'tab');
        $('#cronograma').addClass('active in');
    });
    // Button proximo parceiras
    $('#btn_next_parceiras').click(function () {

        $('#list_parceiras').removeClass('active active_tab1');
        $('#list_parceiras').removeAttr('href data-toggle');

        $('#parceiras').removeClass('active');
        $('#list_parceiras').addClass('inactive_tab1');

        $('#list_metodologia').removeClass('inactive_tab1');
        $('#list_metodologia').addClass('active_tab1 active');

        $('#list_metodologia').attr('href', '#metodologia');

        $('#list_metodologia').attr('data-toggle', 'tab');
        $('#metodologia').addClass('active in');


    });
    //Button previos Metodologia
    $('#btn_metodologia_previous').click(function () {
        $('#list_metodologia').removeClass('active active_tab1');
        $('#list_metodologia').removeAttr('href data-toggle');

        $('#metodologia').removeClass('active in');
        $('#list_metodologia').addClass('inactive_tab1');

        $('#list_parceiras').removeClass('inactive_tab1');
        $('#list_parceiras').addClass('active_tab1 active');

        $('#list_parceiras').attr('href', '#parceiras');
        $('#list_parceiras').attr('data-toggle', 'tab');
        $('#parceiras').addClass('active in');
    });
    // Button next Metodologia
    $('#btn_metodologia_next').click(function () {

        $('#list_metodologia').removeClass('active active_tab1');
        $('#list_metodologia').removeAttr('href data-toggle');

        $('#metodologia').removeClass('active');
        $('#list_metodologia').addClass('inactive_tab1');

        $('#list_resultados_esperados').removeClass('inactive_tab1');
        $('#list_resultados_esperados').addClass('active_tab1 active');

        $('#list_resultados_esperados').attr('href', '#resultados_esperados');

        $('#list_resultados_esperados').attr('data-toggle', 'tab');
        $('#resultados_esperados').addClass('active in');

    });
    //Button previos Resultados esperados
    $('#btn_resultados_previous').click(function () {
        $('#list_resultados_esperados').removeClass('active active_tab1');
        $('#list_resultados_esperados').removeAttr('href data-toggle');

        $('#resultados_esperados').removeClass('active in');
        $('#list_resultados_esperados').addClass('inactive_tab1');

        $('#list_metodologia').removeClass('inactive_tab1');
        $('#list_metodologia').addClass('active_tab1 active');

        $('#list_metodologia').attr('href', '#metodologia');

        $('#list_metodologia').attr('data-toggle', 'tab');
        $('#metodologia').addClass('active in');

    });
    $('#btn_result_next').on('click', function () {

        $('#list_resultados_esperados').removeClass('active active_tab1');
        $('#list_resultados_esperados').removeAttr('href data-toggle');

        $('#resultados_esperados').removeClass('active');
        $('#list_resultados_esperados').addClass('inactive_tab1');

        $('#list_documentos').removeClass('inactive_tab1');
        $('#list_documentos').addClass('active_tab1 active');

        $('#list_documentos').attr('href', '#documento');

        $('#list_documentos').attr('data-toggle', 'tab');
        $('#documento').addClass('active in');
    });

    $('#previous_btn_documentos').on('click', function () {
        $('#list_documentos').removeClass('active active_tab1');
        $('#list_documentos').removeAttr('href data-toggle');

        $('#list_documentos').removeClass('active in');
        $('#list_documentos').addClass('inactive_tab1');

        $('#list_resultados_esperados').removeClass('inactive_tab1');
        $('#list_resultados_esperados').addClass('active_tab1 active');

        $('#list_resultados_esperados').attr('href', '#resultados_esperados');

        $('#list_resultados_esperados').attr('data-toggle', 'tab');
        $('#resultados_esperados').addClass('active in');
    });

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
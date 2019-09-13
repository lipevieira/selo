$(document).ready(function () {

    // Tabela de nivel de atividades dos colaboradores
    $('#activity_level').mask('0#');
    $('#human_quantity_activity_level').mask('0#');
    $('#woman_quantity_activity_level').mask('0#');

    $('#btn_indentificacao').click(function () {

        $('#list_instituicao_detalhes').removeClass('active active_tab1');
        $('#list_instituicao_detalhes').removeAttr('href data-toggle');
        $('#instituicao_detalhes').removeClass('active');
        $('#list_instituicao_detalhes').addClass('inactive_tab1');
        // Ativando outra aba no menu
        $('#list_plano_trabalho_etnico').removeClass('inactive_tab1');
        $('#list_plano_trabalho_etnico').addClass('active_tab1 active');

        $('#list_plano_trabalho_etnico').attr('href', '#plano_trabalho');

        $('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
        $('#plano_trabalho').addClass('active in');

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

        $('#list_instituicao_detalhes').removeClass('inactive_tab1');
        $('#list_instituicao_detalhes').addClass('active_tab1 active');

        $('#list_instituicao_detalhes').attr('href', '#instituicao_detalhes');

        $('#list_instituicao_detalhes').attr('data-toggle', 'tab');
        $('#instituicao_detalhes').addClass('active in');
    });

    //Button Proximo plano de trabalho
    $('#btn_plano_trabalho_next').click(function () {

        $('#list_parceiras').removeClass('active active_tab1');
        $('#list_parceiras').removeAttr('href data-toggle');

        $('#plano_trabalho').removeClass('active');
        $('#list_plano_trabalho_etnico').addClass('inactive_tab1');

        $('#list_parceiras').removeClass('inactive_tab1');
        $('#list_parceiras').addClass('active_tab1 active');

        $('#list_parceiras').attr('href', '#parceiras');

        $('#list_cronograma').attr('data-toggle', 'tab');
        $('#parceiras').addClass('active in');
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

        $('#list_plano_trabalho_etnico').removeClass('inactive_tab1');
        $('#list_plano_trabalho_etnico').addClass('active_tab1 active');

        $('#list_cronograma').attr('href', '#cronograma');
        $('#list_plano_trabalho_etnico').attr('data-toggle', 'tab');
        $('#plano_trabalho').addClass('active in');
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
    $('#btn_resultados_next').on('click', function () {

    });

    /***
     * @description: Preparando para editar 
     * @array
     */
    $('tbody tr td #btnPrepareUdate').on('click', function () {
        let url = $(this).data('url');
        var id = $(this).attr("idEdit");

        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.getJSON({
            type: 'GET',
            url: url,
            data: { 'id': id },
            dataType: 'json',
            success: function (data) {
                console.log(data)
                $("#id").val(data.id);
                $("#activity_level").val(data.activity_level);
                $("#color").val(data.color);
                $("#human_quantity_activity_level").val(data.human_quantity_activity_level);
                $("#woman_quantity_activity_level").val(data.woman_quantity_activity_level);

                $('#modalEdit').modal('show');
            },
            error: function () {
                alert("Ocorreu um erro carregar O diagnostico para Editar.");
            }
        });
    });

    /**
     * @description: Abrindo o modal de cadastro de cronograma
     */
    $('#btnInserOpenModal').on('click', function(){
        $('#modalSalveEdit').modal('show');
    });

    /***
     * @description: 
     */
    $('#btnSaveShedule').on('click', function(){
        let url = $(this).data('url');
        var form = $('#insertShedule');
        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function (data) {
                if ((data.errors)) {
                    var danger = $('#danger');
                    danger.hide().find('ul').empty();
                    $.each(data.errors, function (index, error) {
                        danger.find('ul').append('<li>' + error + '</li>');
                    });
                    danger.slideDown();
                } else {
                    alert('Ação salva com sucesso!')
                    // window.location.reload();
                }

            },
            error: function () {
                alert("Ocorreu um erro ao salvar essa Cronograma. Por favor recarregue a pagina");
            }
        });
    });
});
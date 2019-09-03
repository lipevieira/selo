$(document).ready(function () {
    $('#tblSheduleAction').DataTable({
        "bPaginate": false,
        "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Pesquisar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            }
        }
    });
    $('#btnOpenModal').on('click', function () {
        $('#btnSaveAction').show();
        $('#btnUpdate').hide();
        $('#modalInserUpdate').modal('show');
    });
    /***
     * Salvado Ação
     */
    $('#btnSaveAction').on('click', function () {
        let url = $(this).data('url');
        var form = $('#insertActionShedule');
        var formData = form.serialize();

        // console.log(formData);
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
                    window.location.reload();
                }
            },
            error: function () {
                alert("Ocorreu um erro ao salvar esssa ação. Por favor recarregue a pagina");
            }
        });
    });
    /*Quando fechar o modal deve ocultar  as messagens de errors*/
    $('#modalInserUpdate').on('hide.bs.modal', function (event) {
        $('#danger').hide();
    });

    /****
     * Preparando para editar ações
     */
    $('table tr th #btnPrepareUdate').on('click', function () {
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
                $('#btnSaveAction').hide();
                $("#id").val(data.id);
                $("#weight").val(data.weight);
                $("#description").val(data.description);

                $('#modalInserUpdate').modal('show');
            },
            error: function () {
                alert("Ocorreu um erro carregar Ação para Editar.");
            }
        });
    });
    /***
     * Confirmando alteração
     */
    $('#btnUpdate').on('click', function () {
        var id = $('#id').val();
        let url = $(this).data('url');

        var form = $('#insertActionShedule');
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
                    alert('Ação Alterada com sucesso!')
                    window.location.reload();
                    $('#modalInserUpdate').modal('hide');
                }
            },
            error: function () {
                alert("Ocorreu um erro ao alterar o equipamento.");
            }
        });
    });

    /***
     * Parregando a ação para excluir
     */
    $('table tr th  #btnDelete').on('click', function () {
        var id = $(this).attr("idDelete");
        let url = $(this).data('url');
       
      
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            type: 'GET',
            url: url,
            data: { 'id': id },
            success: function (data) {

                $("#id_excluir").val(data.id);

                $('#confirmaExclucao').modal('show');
            },
            error: function () {
                alert("Ocorreu um erro ao prepara ação para excluir .");
            }
        });
    });
    /***
     * Confimando a exclusão da ação
     */
    $('#btnConfirmarExclusao').on('click', function () {
        let url = $(this).data('url');

        var id = $('input[name=id_excluir]').val();

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': id
            },
            success: function (data) {
                alert('Ação excluida com sucesso!')

                $('#confirmaExclucao').modal('hide');
                window.location.reload();
            },
            error: function () {
                alert("Ocorreu um erro ao excluir essa ação.");
            }
        });
    });

});
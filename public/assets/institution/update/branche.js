$(document).ready(function () {

    $('#btnSaveBranche').on('click', function () {
        $('#btnUpdate').hide();
        $('#modalSaveEdit').modal('show');
    });

    $('#btnConfirmSave').on('click', function () {
        let url = $(this).data('url');
        var form = $('#insertBranche');
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
                    window.location.reload();
                    $('#modalSaveEdit').modal('hide');
                }
            },
            error: function () {
                alert("Ocorreu um erro ao salvar essa Filial. Por favor recarregue a pagina");
            }
        });
    });
    /****
     * Preparando para editar ações
     * @param id
     * @returns Branche
     */
    $('table tr td #btnPrepareUpdate').on('click', function () {
        let url = $(this).data('url');
        var id = $(this).attr("idEdit");
        $('#btnUpdate').show();

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
                $("#cnpj_additional").val(data.cnpj_additional);

                $('#btnConfirmSave').hide();

                $('#modalSaveEdit').modal('show');
            },
            error: function () {
                alert("Ocorreu um erro carregar Ação para Editar.");
            }
        });
    });
    /****
     * Preparando para Excluir Filial
     * @param id
     * @returns Branche
     */
    $('table tr td #btnDelete').on('click', function () {
        let url = $(this).data('url');
        var id = $(this).attr("idExcluir");

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
                $("#id_excluir").val(data.id);

                $('#modalDelete').modal('show');
            },
            error: function () {
                alert("Ocorreu um erro carregar Ação para Excluir.");
            }
        });
    });


    /***
   * Confirmando alteração
   * @param array
   * @returns void
   */
    $('#btnUpdate').on('click', function () {
        let url = $(this).data('url');
        var form = $('#insertBranche');
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
                    $('#btnConfirmSave').modal('hide');
                }
            },
            error: function () {
                alert("Ocorreu um erro ao alterar essa Filial.");
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

                $('#modalDelete').modal('hide');
                window.location.reload();
            },
            error: function () {
                alert("Ocorreu um erro ao excluir essa Filial.");
            }
        });
    });
    /*Quando fechar o modal de emprestimo deve ocultar  as messagens de errors*/
    $('#modalSaveEdit').on('hide.bs.modal', function (event) {
        $('#danger').hide();
    });


});
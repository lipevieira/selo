$(document).ready(function () {

    $('table tr td #btnPrepareUpdate').on('click', function () {
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
                $("#id").val(data.id);
                $("#members_name").val(data.members_name);
                $("#members_function").val(data.members_function);
                $("#members_phone").val(data.members_phone);
                $("#members_email").val(data.members_email);

                $('#btnConfirmSave').hide();

                $('#modalEdit').modal('show');

            },
            error: function () {
                alert("Ocorreu um erro carregar Ação para Editar.");
            }
        });
    });
    /***
    * Confirmando alteração
    * @param array
    * @returns void
    */
    $('#btnConfirmeUpdate').on('click', function () {
        let url = $(this).data('url');
        var form = $('#formUpdateComission');
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
                    alert('Membro Alterada com sucesso!')
                    window.location.reload();
                    $('#modalEdit').modal('hide');
                }
            },
            error: function () {
                alert("Ocorreu um erro ao alterar essa Filial.");
            }
        });
    });
    /*Quando fechar o modal de emprestimo deve ocultar  as messagens de errors*/
    $('#modalEdit').on('hide.bs.modal', function (event) {
        $('#danger').hide();
    });

});
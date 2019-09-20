$(document).ready(function () {

    /**
    * @description: Abrindo o modal de cadastro de cronograma
    */
    $('#btnInserOpenModal').on('click', function () {
        $('#modalSalveEdit').modal('show');
    });
    /***
     * @description: 
     */
    $('#btnSaveShedule').on('click', function () {
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
                    window.location.reload();
                }

            },
            error: function () {
                alert("Ocorreu um erro ao salvar essa Cronograma. Por favor recarregue a pagina");
            }
        });
    });
    /****
     * Preparando para editar ações
     */
    $('table tr td #btnPrepareUpdate').on('click', function () {        
        let url = $(this).data('url');
        var id = $(this).attr("idEditShedele");

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
                $('#schedule_action_id').val(data.schedule_action_id);
                $("#activity").val(data.activity);
                $("#amount").val(data.amount);
                $("#status").val(data.status);
                

                // $("#deadline").val(date.deadline);

                $('#modalSalveEdit').modal('show');
            },
            error: function () {
                alert("Ocorreu um erro carregar Ação para Editar.");
            }
        });
    });

    $('#btnEditSchedule').on('click', function(){
        let url = $(this).data('url');
        var form = $('#insertShedule');
        var formData = form.serialize();

        console.log(formData);
        // $.ajaxSetup({
        //     headers:
        //         { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        // });
    });

    /**
     * Quando fechar o modal limpar campos
     * @returns void
     */
    $('#modalSalveEdit').on('hide.bs.modal', function (event) {
        $('#danger').hide();
    });
});
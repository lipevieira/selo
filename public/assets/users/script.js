$(document).ready(function(){
    $('#btnSaveuser').on('click', function(){
        let url = $(this).data('url');
        var form = $('#insertUser');
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
                    alert('Usuário salva com sucesso!')
                    window.location.reload();
                    $('#cadUsers').modal('hide');
                    
                }
            },
            error: function () {
                alert("Ocorreu um erro ao salvar Usuário. Por favor recarregue a pagina");
            }
        });
    });
});
$(document).ready(function () {
    $('#etapa01').hide();
    $('#etapa02').hide();
    $('#etapa03').hide();
    $('#btn_star_register').hide();

    $("#cb_type_institution").change(function () {
        $('#btn_star_register').hide();
        $('#etapa01').hide();
        $('#etapa02').hide();
        $('#etapa03').hide();
        switch ($(this).val()) {
            case '1':
                $('#etapa01').show();
                break;
            case '2':
                $('#etapa01').show();
                break;
            case '3':
                    $('#btn_star_register').show();
                break;
            case '4':
                $('#btn_star_register').show();
                break;
            case '5':
                $('#btn_star_register').show();
                break;
            case '6':
                $('#etapa03').show(); // Abrir o Container das entidades sem fins lucrativos
                break;
            default:
                alert('Por favor selecione a quantidade de funcionário da sua empresa!')
                break;
        }
    });
    $("#cb_company_01").change(function () {
        switch ($(this).val()) {
            case 'SIM':
                $('#etapa02').show();
                break;

            case 'NÃO':
                alert('Agradecemos seu interrese. Sua empresa não preenche os requisitos.')
                window.location.reload();
                break;
        }
    });

    $("#cb_company_02").change(function () {
        switch ($(this).val()) {
            case 'SIM':
                $('#btn_star_register').show();
                break;

            case 'NÃO':
                alert('Agradecemos seu interrese. Sua empresa não preenche os requisitos.');
                window.location.reload();
                break;
        }
    });
    $("#institution_entity").change(function () {
        switch ($(this).val()) {
            case 'SIM':
                $('#btn_star_register').show();
                break;
            case 'NÃO':
                alert('Agradecemos seu interrese. Sua empresa não preenche os requisitos.');
                window.location.reload();
                break;
        }
    });

    function hideButtonRegister() {
        $('#btn_star_register').hide();
    }
});
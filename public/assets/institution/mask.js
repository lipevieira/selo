$(document).ready(function(){
    // Mascaras para inpust da etapa 01 do formulario.
    $('#cnpj').mask('00.000.000/0000-00');
    $('.cnpj_additional').mask('00.000.000/0000-00');
    $('#cnpj_additional').mask('00.000.000/0000-00');
    $('#phone').mask('(00) 0000-00009');
    $('#phone_two').mask('(00) 0000-00009');
    $('.members_phone').mask('(00) 0000-00009');

    // Mascaras para inpust da etapa 02 do formulario.
    // Tabela de nivel de atividades dos colaboradores
    $('.activity_level').mask('0#');
    $('.human_quantity_activity_level').mask('0#');
    $('.woman_quantity_activity_level').mask('0#');

    // Tabela de perfil dos colaboradores
    $('.human_quantity').mask('0#');
    $('.woman_quantity').mask('0#');
});
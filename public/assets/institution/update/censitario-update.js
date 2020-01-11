$(document).ready(function(){
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
                $("#id_collaborator").val(data.id);
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
});
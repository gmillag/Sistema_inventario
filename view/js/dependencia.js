// js para enviar la lista de dependencias segun la sede habilitada (formulario usuario)
$(document).ready(function () {
    $("#sede_id").on("change", function () {
        let sedeId = $(this).val();

        if (!sedeId) {
            $("#dependencia_id").html('<option value="">Seleccione una dependencia</option>');
            return;
        }

        $.ajax({
            url: "ajax/dependencia.ajax.php", // nombre correcto
            method: "POST",
            data: { sede_id: sedeId },
            dataType: "json",
            success: function (respuesta) {
                let opciones = '<option value="">Seleccione una dependencia</option>';
                respuesta.forEach(dep => {
                    opciones += `<option value="${dep.dependencia_id}">${dep.nombre_dependencia}</option>`;
                });
                $("#dependencia_id").html(opciones);
            },
            error: function (xhr, status, error) {
                console.error("Error cargando dependencias:", error);
            }
        });
    });
});

$(document).ready(function () {

  function cargarDependencias(sedeId, selectorDependencia, dependenciaSeleccionada = null) {
    if (!sedeId) {
      $(selectorDependencia).html('<option value="">Seleccione una dependencia</option>');
      return;
    }

    $.ajax({
      url: "ajax/dependencia.ajax.php",
      method: "POST",
      data: { sede_id: sedeId },
      dataType: "json",
      success: function (respuesta) {
        let opciones = '<option value="">Seleccione una dependencia</option>';
        respuesta.forEach(dep => {
          opciones += `<option value="${dep.dependencia_id}" 
            ${dependenciaSeleccionada == dep.dependencia_id ? "selected" : ""}>
            ${dep.nombre_dependencia}</option>`;
        });
        $(selectorDependencia).html(opciones);
      },
      error: function (xhr, status, error) {
        console.error("Error cargando dependencias:", error);
      }
    });
  }

  // Crear usuario
  $("#sede_id").on("change", function () {
    cargarDependencias($(this).val(), "#dependencia_id");
  });

  // Editar usuario
  $("#sede_idEditar").on("change", function () {
    cargarDependencias($(this).val(), "#dependencia_idEditar");
  });

  // Cuando abras el modal editar, cargas dependencias segun sede
  $(".tablas").on("click", ".btnEditarUsuario", function () {
    let usuario_id = $(this).attr("usuario_id");
    let datos = new FormData();
    datos.append("usuario_id", usuario_id);

    $.ajax({
      url: "ajax/usuarioEditar.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#usuarioEditar").val(respuesta["usuario_id"]);
        $("#nombreEditar").val(respuesta["nombre_usuario"]);
        $("#apellidoPaternoEditar").val(respuesta["apellidop_usuario"]);
        $("#apellidoMaternoEditar").val(respuesta["apellidom_usuario"]);
        $("#dniEditar").val(respuesta["dni_usuario"]);
        $("#passwordEditar").val(respuesta["clave_usuario"]);
        $("#emailEditar").val(respuesta["email_usuario"]);
        $("#telefonoEditar").val(respuesta["telf_usuario"]);
        $("#cargo_idEditar").val(respuesta["cargo_id"]);
        $("#sede_idEditar").val(respuesta["sede_id"]);

        // Cargar dependencias según la sede seleccionada
        cargarDependencias(respuesta["sede_id"], "#dependencia_idEditar", respuesta["dependencia_id"]);
      }
    });
  });

});

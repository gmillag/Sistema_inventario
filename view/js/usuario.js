// ====================CREACIÓN DE USUARIO ====================

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("formUsuario");
  const dniInput = document.getElementById("dni");
  const telefonoInput = document.getElementById("telefono");
  const usuarioInput = document.getElementById("usuario");

  let usuarioDisponible = false;

  // Validación en tiempo real para DNI
  if (dniInput) {
    dniInput.addEventListener("input", function () {
      this.value = this.value.replace(/[^0-9]/g, "").slice(0, 8);
    });
  }

  // Validación en tiempo real para Teléfono
  if (telefonoInput) {
    telefonoInput.addEventListener("input", function () {
      this.value = this.value.replace(/[^0-9]/g, "").slice(0, 9);
    });
  }

  // Verificar si el usuario_id ya existe en la BD al perder el foco
  if (usuarioInput) {
    usuarioInput.addEventListener("blur", function () {
      const usuario = usuarioInput.value.trim();

      if (usuario.length > 0) {
        fetch("ajax/usuarioValidar.ajax.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: "usuario=" + encodeURIComponent(usuario)
        })
          .then(res => res.json())
          .then(data => {
            console.log("Respuesta del servidor:", data);
            if (data.existe) {
              usuarioDisponible = false;
              Swal.fire({
                icon: "warning",
                title: "Usuario ya existe",
                text: "El ID de usuario que ingresaste ya está registrado. Por favor, elige otro.",
              });
              usuarioInput.classList.add("is-invalid");
            } else {
              usuarioDisponible = true;
              usuarioInput.classList.remove("is-invalid");
            }
          })
          .catch(err => console.error("Error al validar usuario:", err));
      }
    });
  }

  // ==================== VALIDAR USUARIO ====================
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const password = document.getElementById("password");
      const nombre = document.getElementById("nombre");
      const apellidoP = document.getElementById("apellidoPaterno");
      const apellidoM = document.getElementById("apellidoMaterno");
      const email = document.getElementById("email");
      const cargo = document.getElementById("cargo_id");
      const sede = document.getElementById("sede_id");
      const dependencia = document.getElementById("dependencia_id");

      const regexDNI = /^[0-9]{8}$/;
      const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const regexTelefono = /^[0-9]{9}$/;

      let errores = [];

      if (usuarioInput.value.trim() === "") errores.push("Ingrese el usuario.");
      if (password.value.trim() === "") errores.push("Ingrese la contraseña.");
      if (!regexDNI.test(dniInput.value)) errores.push("El DNI debe tener 8 dígitos numéricos.");
      if (nombre.value.trim() === "") errores.push("Ingrese los nombres.");
      if (apellidoP.value.trim() === "") errores.push("Ingrese el apellido paterno.");
      if (apellidoM.value.trim() === "") errores.push("Ingrese el apellido materno.");
      if (!regexEmail.test(email.value)) errores.push("Ingrese un correo válido.");
      if (!regexTelefono.test(telefonoInput.value)) errores.push("Ingrese un teléfono válido (9 dígitos).");
      if (cargo.value === "") errores.push("Seleccione un cargo.");
      if (sede.value === "") errores.push("Seleccione una sede.");
      if (dependencia.value === "") errores.push("Seleccione una dependencia.");

      if (errores.length > 0) {
        Swal.fire({
          icon: "error",
          title: "Error de Validación",
          html: errores.join("<br>"),
        });
      } else {
        form.submit();
      }
    });
  }

  // ==================== LIMPIAR FORMULARIO ====================
  $('#modalAgregarUsuario').on('hidden.bs.modal', function () {
    if (form) form.reset();

    ["cargo_id", "sede_id", "dependencia_id", "usuario_id"].forEach(id => {
      const el = document.getElementById(id);
      if (el) el.value = "";
    });

    usuarioDisponible = false;
    if (usuarioInput) usuarioInput.classList.remove("is-invalid");
  });
});

// ==================== EDITAR USUARIO ====================
$(".tablas").on("click", ".btnEditarUsuario", function(){
  var usuario_id = $(this).attr("usuario_id");
  var datos = new FormData();
  datos.append("usuario_id", usuario_id);

  $.ajax({
    url: "ajax/usuarioEditar.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      $("#usuarioEditar").val(respuesta["usuario_id"]);
      $("#nombreEditar").val(respuesta["nombre_usuario"]);
      $("#apellidoPaternoEditar").val(respuesta["apellidop_usuario"]);
      $("#apellidoMaternoEditar").val(respuesta["apellidom_usuario"]);
      $("#dniEditar").val(respuesta["dni_usuario"]);
      $("#passwordEditar").val(respuesta["clave_usuario"]);
      $("#emailEditar").val(respuesta["email_usuario"]);
      $("#telefonoEditar").val(respuesta["telf_usuario"]);
      $("#cargo_idEditar").val(respuesta["cargo_id"]);
      $("#dependencia_idEditar").val(respuesta["dependencia_id"]);
      $("#estadoEditar").val(respuesta["estado_usuario"]);
    }
  });
});

// ==================== GUARDAR CAMBIOS DE USUARIO ====================
$("#formUsuarioEditar").on("submit", function(e){
  e.preventDefault();

  var datos = new FormData(this);

  $.ajax({
    url: "ajax/usuarioEditar.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("Respuesta servidor:", respuesta);

      if (respuesta.status === "success") {
        Swal.fire({
          icon: "success",
          title: "¡Actualizado!",
          text: respuesta.message,
          timer: 2000,
          showConfirmButton: false
        });
        $("#modalEditarUsuario").modal("hide");

        // SOLUCIÓN: Recargar la página completa
        setTimeout(function() {
          location.reload();
        }, 1500);
        
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: respuesta.message
        });
      }
    },
    error: function(xhr, status, error){
      console.error("Error AJAX:", error);
      Swal.fire({
        icon: "error",
        title: "Error de conexión",
        text: "No se pudo comunicar con el servidor."
      });
    }
  });
});


// Configurar el modal cuando se hace clic en eliminar
$(document).on("click", ".btnEliminarUsuario", function () {
    var usuarioId = $(this).data("usuario_id");
    var nombreUsuario = $(this).data("nombre");

    console.log("ID a eliminar:", usuarioId);
    
    $("#usuarioIdEliminar").val(usuarioId);
    $("#nombreUsuarioEliminar").text(nombreUsuario);
});

// Opcional: Mostrar loading al enviar
$(document).ready(function() {
    $('#modalEliminarUsuario form').on('submit', function() {
        $('button[type="submit"]', this).html('<i class="fas fa-spinner fa-spin"></i> Procesando...').prop('disabled', true);
    });
    
    // Limpiar modal cuando se cierre
    $('#modalEliminarUsuario').on('hidden.bs.modal', function () {
        $('#nombreUsuarioEliminar').text('');
        $('#usuarioIdEliminar').val('');
        $('button[type="submit"]', this).html('<i class="fas fa-user-slash"></i> Desactivar').prop('disabled', false);
    });
});
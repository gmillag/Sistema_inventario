document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("formUsuario");
  const dniInput = document.getElementById("dni");
  const telefonoInput = document.getElementById("telefono");

  // 🔢 Validación en tiempo real para DNI
  if (dniInput) {
    dniInput.addEventListener("input", function () {
      this.value = this.value.replace(/[^0-9]/g, "").slice(0, 8);
    });
  }

  // 📱 Validación en tiempo real para Teléfono
  if (telefonoInput) {
    telefonoInput.addEventListener("input", function () {
      this.value = this.value.replace(/[^0-9]/g, "").slice(0, 9);
    });
  }

  // ✅ Validación al enviar el formulario
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const usuario = document.getElementById("usuario");
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
      const regexTelefono = /^[0-9]{6,9}$/;

      let errores = [];

      if (usuario.value.trim() === "") errores.push("Ingrese el usuario.");
      if (password.value.trim() === "") errores.push("Ingrese la contraseña.");
      if (!regexDNI.test(dniInput.value)) errores.push("El DNI debe tener 8 dígitos numéricos.");
      if (nombre.value.trim() === "") errores.push("Ingrese los nombres.");
      if (apellidoP.value.trim() === "") errores.push("Ingrese el apellido paterno.");
      if (apellidoM.value.trim() === "") errores.push("Ingrese el apellido materno.");
      if (!regexEmail.test(email.value)) errores.push("Ingrese un correo válido.");
      if (!regexTelefono.test(telefonoInput.value)) errores.push("Ingrese un teléfono válido (6 a 9 dígitos).");
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

  // 🧹 Limpiar formulario y selects cuando se cierre el modal
  $('#modalAgregarUsuario').on('hidden.bs.modal', function () {
    if (form) form.reset();

    ["cargo_id", "sede_id", "dependencia_id", "usuario_id"].forEach(id => {
      const el = document.getElementById(id);
      if (el) el.value = "";
    });
  });
}); // 👈 ESTA LLAVE CIERRA TODO

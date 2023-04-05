$(document).ready(function () {
  /**
   * Iniciar Sesion Administrador
   */
  $("#btnloginAdmin").on("click", function (e) {
    e.preventDefault();
    let usuario = $("#userAD").val();
    let contrasena = $("#passAD").val();
    let accion = "LoginAdmins";

    $.ajax({
      url: "../login.php",
      type: "POST",
      data: {
        usuario,
        contrasena,
        accion,
      },
      success: function (response) {
        $("#mensajelogin").html(response);
      },
    });
  });

  /**
   * Iniciar Sesion Usuario
   */
  $("#btnloginU").on("click", function (e) {
    e.preventDefault();
    let usuario = $("#usuario").val();
    let contrasena = $("#contrasena").val();
    let accion = "iniciarSesion";
    console.log(usuario);

    $.ajax({
      url: "login.php",
      type: "POST",
      data: {
        usuario: usuario,
        contrasena: contrasena,
        accion: accion,
      },
      success: function (response) {
        $("#mensajelogin").html(response);
      },
    });
  });
});

$(document).ready(function () {


  $("#btnNuevoUsuario").click(function () {
    let empresa = $("#empresa").val();
    let segmento = $("#segmento").val();
    let usuario = $("#usuario").val();
    let contrasena = $("#contrasena").val();
    let accion = "nuevoUsuario";

    if (empresa != "" && segmento != "" && usuario != "" && contrasena) {
      $.ajax({
        type: "POST",
        url: `claseADM.php`,

        data: {
          usuario: usuario,
          contrasena: contrasena,
          empresa: empresa,
          segmento: segmento,
          accion: accion,
        },
        success: function (response) {
          let res = JSON.parse(response);

          if (res.response == true) {
            Swal.fire(
              "Éxito!",
              "Se agrego correctamente el Usuario.",
              "success"
            );
            setTimeout(function () {
              location.reload();
            }, 2000);
          } else {
            Swal.fire(
              "Error!",
              "Ocurrio un error al agregar el Usuario.",
              "error"
            );
          }
        },
      });
    } else {
      Swal.fire(
        "Error!",
        "Asegurese de completar todos los espacios.",
        "error"
      );
    }
  });


$('#btneliminaUsu').on('click', function () {
	var empresa = $("#empresa").val();
  var user = $("#user").val();
	var accion = "borraUsuario";

	if (empresa != '') {
		$.ajax({
			url: "claseADM.php",
			type: "POST",
			data: {
				empresa: empresa,
        user: user,
				accion: accion
			},
			success: function (response) {
				var x = JSON.parse(response);
				if (x.response == true) {
					Swal.fire("Exito!", "Se elimino el usuario correctamente.", "success");
					setTimeout(function () {
						location.reload();
					}, 2000);
				} else {
					Swal.fire("Error!", "Lo sentimos, no se elimino correctamente.", "error");
				}
			}
		});
	} else {
		Swal.fire("Error!", "No se pudo cancelar.", "error");
	}
});



});

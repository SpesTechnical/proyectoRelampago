<?php

require_once('admin/claseADM.php');

//Login Admin
if (isset($_POST["accion"])) {
    if ($_POST['accion'] == 'LoginAdmins') {
        $usuario = $_POST['usuario'];
        $pass = md5($_POST['contrasena']);

        if (!preg_match("/^[a-zA-Z0-9_@.]*$/", $usuario)) {
?>
            <script>

                Swal.fire("Advertencia!", "El usuario no puede contener caracteres especiales.", "warning");
            </script>
            <?php
        } else {

            $loginAD = $ObjADM->loginAdmin($usuario, $pass);

            if ($loginAD) {
                foreach ($loginAD as $datos => $row) {
                    $_SESSION['id'] = $row->IdAdmin;
                }
            ?>
            <script>
                window.location.href = "home.php"
            </script>
            <?php
            } else {
            ?>
                <script>
                        Swal.fire("Error!", "El usuario o la contraseña no coiciden.", "error");
                </script>
<?php
            }
        }
    }
}


//Login
if (isset($_POST["accion"])) {
    if ($_POST['accion'] == 'iniciarSesion') {
        $usuario = $_POST['usuario'];
        $pass = md5($_POST['contrasena']);

        if (!preg_match("/^[a-zA-Z0-9_@.]*$/", $usuario)) {
    ?>
            <hr>
            <script>

                Swal.fire("Advertencia!", "El usuario no puede contener caracteres especiales.", "warning");
            </script>
            <?php
        } else {
            $loginU = $ObjADM->loginUsuario($usuario, $pass);

            if ($loginU) {
                foreach ($loginU as $datos => $row) {
                    $_SESSION['id'] = $row->user;
                }

            ?>
                <script>
                    window.location.href = "user/inicio.php";
                </script>
            <?php
            } else {
            ?>
                <script>
                    Swal.fire("Error!", "El usuario o la contraseña no coiciden.", "error");
                </script>
    <?php
            }
        }
    }
}

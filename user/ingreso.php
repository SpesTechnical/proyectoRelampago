<?php
require_once('bll/consultas.php');
if (isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Ingreso-Información
    </title>
    <?php include_once('../links.php'); ?>
</head>

<body>

    <?php
    include_once('./nav.php');
    require('modals.php');
    ?>


    <div class="container mt-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #212529; color: #ffffff; text-align:center;">
                <h3 class="text-center">Lista de Caracteristicas <i class="fa-duotone fa-list-check"></i></h3>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarCaracteriticas"><i class="fa-light fa-file-plus"></i></button>
            </div>

            <div class="card-body">
                <div class="container mt-3">

                    <div class="table-responsive-lg">
                        <form class="d-flex">
                            <input class="form-control me-2" id="BuscaV" type="search" placeholder="Buscar...">
                            <button class="btn btn-outline-primary" id="BuscaV2" type="button"><i class="fa-regular fa-magnifying-glass"></i></button>
                        </form>
                        <script>
                            $(document).ready(function() {
                                $("#BuscaV").on("keyup", function() {
                                    var value = $(this).val().toLowerCase();

                                    $("#tablaUsuarios tr").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });

                                $("#BuscaV2").on('click', function() {
                                    var value = $('#BuscaV').val().toLowerCase();

                                    $("#tablaUsuarios tr").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });
                        </script>
                        <table class="table table-dark table-hover table-bordered text-md-center">
                            <thead class="table-dark">
                                <hr>
                                <br>
                                <tr>
                                    <th>ID</th>
                                    <th>Caracteristicas</th>
                                    <th>Requerimientos</th>
                                </tr>
                            </thead>
                            <tbody class="table-secondary" id="tablaUsuarios">
                                <?php
                                include_once('./bll/consultas.php');
                                $consultas = new bllconsultas;
                                $datos = $consultas->consultaCaracterisca();

                                foreach ($datos as $dato) {
                                ?>
                                    <tr>
                                        <td><?php echo $dato->idCaracteristica ?></td>
                                        <td><?php echo $dato->DesCaracteristica ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target=<?php echo '#AgregarRequerimiento'.$dato->idCaracteristica ?>>Agregar <i class="fa-sharp fa-solid fa-code-pull-request"></i></button>
                                            <a href="requerimientos.php">
                                                <button type="button" class="btn btn-dark">Ver lista <i class="fa-sharp fa-solid fa-list"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="background-color: #212529; color: #ffffff; text-align:center;"></div>
        </div>
    </div>


    <?php
    require('../footer.php')
    ?>


</body>

</html>
<?php
} else {
    session_destroy();
    header("location:./index.php");
}
?>
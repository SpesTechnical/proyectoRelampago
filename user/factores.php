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
        Factores
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
                <h3 class="text-center">Desgloce de Factores <i class="fa-sharp fa-regular fa-list-timeline"></i></h3>
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
                                    <th>Requerimiento</th>
                                    <th>Factor</th>
                                    <th>Aspecto</th>
                                    <th>Clasificación</th>
                                    <th>PESTEL</th>
                                </tr>
                            </thead>
                            <tbody class="table-secondary" id="tablaUsuarios">
                                <?php
                                include_once('./bll/consultas.php');
                                $consultas = new bllconsultas;
                                $datos = $consultas->consultaFactor();

                                foreach ($datos as $dato) {
                                ?>
                                    <tr>
                                        <td><?php echo $dato->idRequerimiento ?></td>
                                        <td><?php echo $dato->desRequerimiento ?></td>
                                        <td><?php echo $dato->nombreFactor ?></td>
                                        <?php
                                        if ($dato->estado == 1) {
                                        ?>
                                            <td>Positivo</td>
                                        <?php
                                        } else {
                                        ?>
                                            <td>Negativo</td>
                                        <?php

                                        }
                                        ?>
                                        <?php
                                        if ($dato->clasificacion == 1) {
                                        ?>
                                            <td>Externa</td>
                                        <?php
                                        } else {
                                        ?>
                                            <td>Interna</td>
                                        <?php

                                        }
                                        ?>
                                        <td>
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target=<?php echo '#ClasPestel'.$dato->idFactores?>>Pestel <i class="fa-sharp fa-solid fa-list"></i></button>
                                        </td>
                                        <script>
                                            const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                                            checkboxes.forEach(checkbox => {
                                                checkbox.addEventListener('change', () => {
                                                    if (checkbox.checked) {
                                                        checkboxes.forEach(otherCheckbox => {
                                                            if (otherCheckbox !== checkbox) {
                                                                otherCheckbox.checked = false;
                                                                Swal.fire({
                                                                    icon: 'warning',
                                                                    title: 'Advertencia!',
                                                                    text: 'Solo se puede marcar un tipo de impacto.',
                                                                });
                                                            }
                                                        });
                                                    }
                                                });
                                            });
                                        </script>
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
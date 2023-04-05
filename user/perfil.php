<?php
require_once('bll/consultas.php');
if (isset($_SESSION['id'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Perfil</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        require('../links.php')
        ?>
    </head>

    <body style="background-color: #f8f8f8;">

        <?php
        require('nav.php');
        require('modals.php');
        ?>



        <div class="container p-3 my-4" style="background-color: #212529; color: #ffffff;">
            <h1><img src="http://www.cuc.ac.cr/app/cms/www/images/logo_cuc.png" width="70px"></h1>
            <p>TI-161 Programación V</p>
        </div>

        <div class="container mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #212529; color: #ffffff; text-align:center;">
                    <h3>Información del Perfil <i class="fa-duotone fa-user-check"></i></h3>
                </div>

                <div class="card-body">
                    <div style="text-align: right;">

                    </div>

                    <div class="container mt-3">
                        <form method="POST">
                            <div class="row" style="text-align: center;">

                                <?php

                                $consultas = new bllconsultas;
                                $datos = $consultas->consultaPerfil();
                    
                                foreach ($datos as $dato) {
                                ?>

                                    <div class="col-md-4">
                                        <h4>Nombre-Usuario</h4>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" disabled class="form-control" id="usuario" name="usuario" value="<?= $dato->user; ?>" placeholder="Nombre-Usuario">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4>Empresa</h4>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fa-solid fa-buildings"></i></span>
                                            <input type="text" disabled class="form-control" id="empresa" name="empresa" value="<?= $dato->empresa; ?>" placeholder="Empresa">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4>Segmento-Mercado</h4>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fa-solid fa-money-bill-trend-up"></i></i></span>
                                            <input type="text" disabled class="form-control" id="segmento" name="segmento" value="<?= $dato->segmento; ?>" placeholder="Segmento Perteneciente">
                                        </div>
                                    </div>
                                <?php

                                }
                                ?>
                        </form>
                    </div>
                    <hr>
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
<?php
require_once('./claseADM.php');
if (isset($_SESSION['id'])) {
?>
   
   <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Inicio</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        require('../links.php')
        ?>
    </head>

    <body>
        <?php
        require('nav.php')
        ?>
        <div class="container-fluid p-5 text-white text-center" style="background-color: #081e4d;">
            <a class="navbar-brand" href="#"><img src="http://www.cuc.ac.cr/app/cms/www/images/logo_cuc.png" width="100px" /></a>
            <h1>TI-161 Administración de Sitios Web</h1>
            <p>Bienvenido</p>
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
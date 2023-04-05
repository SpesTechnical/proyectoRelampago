
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
    Inicio
  </title>
  <?php include_once('../links.php'); ?>
</head>

<body>
  <div class="wrapper">

    <?php
    include_once('./nav.php');
    require('modals.php');
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
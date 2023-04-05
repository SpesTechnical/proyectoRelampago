<?php

require_once('consultas.php');
include_once('../data/consultas.php');
$datos = new consultas;
$datos ->ingresarCaracteristicas($_POST['caracteritica'], $_SESSION['id']);
header('location:../ingreso.php');
?>


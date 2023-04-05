<?php

include_once('../data/consultas.php');
$datos = new consultas;
$datos ->ingresarCaracteristicas($_POST['caracteritica'], 'valdo');
header('location:../ingreso.php');
?>
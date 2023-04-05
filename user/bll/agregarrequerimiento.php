<?php
require_once('consultas.php');
include_once('../data/consultas.php');
$datos = new consultas;
$datos ->ingresarRequerimientos($_POST['idCaracteristica'], $_POST['Requerimiento']);
header('location:../ingreso.php');

?>
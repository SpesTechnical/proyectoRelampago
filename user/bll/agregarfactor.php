<?php
require_once('consultas.php');
include_once('../data/consultas.php');
$datos = new consultas;
$datos ->ingresarFactores($_POST['factor'], $_POST['idRequerimiento'], $_POST['aspecto'], $_POST['clasificacion']);
header('location:../requerimientos.php');

?>
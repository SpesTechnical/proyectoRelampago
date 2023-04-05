<?php
include_once('../data/consultas.php');
$datos = new consultas;

$array_pestel=[$_POST['politico'], $_POST['economico'], $_POST['social'], $_POST['tecnologico'], $_POST['ecologico'], $_POST['legal']];

for($i = 0; $i<6; $i++){
   if(!$datos->verificarPestelFactor('valdo', $_POST['idFactor'], $i+1) && $array_pestel[$i]=="Aplica"){
    $datos->ingresarPestel($i+1, $_POST['idFactor']);
   } 
   else if($datos->verificarPestelFactor('valdo', $_POST['idFactor'], $i+1) && $array_pestel[$i]!="Aplica"){
    $datos->borrarPestelFactor('valdo', $_POST['idFactor'], $i+1);
   }
}

if(count($datos->consultaComentario($_POST['idFactor']))==0 && !empty($_POST['comentario'])){
    $datos->ingresarComentario($_POST['comentario'], $_POST['idFactor']);
}
else if(!empty($_POST['comentario'])){
    $datos->modificarComentario($_POST['comentario'],$_POST['idFactor']);
}



header('location:../factores.php');

?>
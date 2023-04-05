<?php
session_start();

class bllconsultas{

    function consultaCaracterisca(){
        include_once('./data/consultas.php');
        $datos = new consultas;
        return $datos ->consultaCaracteristicas($_SESSION['id']);
    }

    function consultaRequerimientos(){
        include_once('./data/consultas.php');
        $datos = new consultas;
        return $datos ->consultaRequerimientos($_SESSION['id']);
    }

    function consultaFactor(){
        include_once('./data/consultas.php');
        $datos = new consultas;
        return $datos ->consultaFactores($_SESSION['id']);
    }

    function consultaPestelFactor($idFactor){
        include_once('./data/consultas.php');
        $datos = new consultas;
        return $datos ->consultaPestelFactor($_SESSION['id'], $idFactor);
    }

    function consultaComentario($idFactor){
        include_once('./data/consultas.php');
        $datos = new consultas;
        return $datos ->consultaComentario($idFactor);
    }

    
    function consultaPerfil(){
        include_once('./data/consultas.php');
        $datos = new consultas;
        return $datos ->muestraPerfil($_SESSION['id']);
    }


}
?>
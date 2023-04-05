<?php
class consultas{

    function ingresarCaracteristicas($caracteristica, $user){
        include_once 'database.php';
        $con = new con;
        $bd = $con->bd;
        $sentencia = $bd->prepare("INSERT INTO `caracteristicas`(`idCaracteristica`, `DesCaracteristica`, `user`) VALUES (0,:caracteristica, :user)");
        $sentencia->bindParam(":caracteristica", $caracteristica, PDO::PARAM_STR);
        $sentencia->bindParam(":user", $user, PDO::PARAM_STR);
        $sentencia->execute();
    }

    function ingresarRequerimientos($idCaracteristica, $desRequerimiento){
        include_once 'database.php';
        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("INSERT INTO `requerimientos`(`idRequerimiento`, `desRequerimiento`, `idCaracteristica`) VALUES (0,:desRequerimiento,:idCaracteristica)");
        $sentencia->bindParam(":idCaracteristica", $idCaracteristica, PDO::PARAM_INT);
        $sentencia->bindParam(":desRequerimiento", $desRequerimiento, PDO::PARAM_STR);
        $sentencia->execute();
    }

    function ingresarFactores($factor, $idRequerimiento, $aspecto, $clasificacion){
        include_once 'database.php';
        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("INSERT INTO `factores`(`idFactores`, `nombreFactor`, `idRequerimiento`, `estado`, `clasificacion`) VALUES (0,:nombreF, :idRequerimiento, :estado, :clasificacion)");
        $sentencia->bindParam(":nombreF", $factor, PDO::PARAM_STR);
        $sentencia->bindParam(":estado", $aspecto, PDO::PARAM_INT);
        $sentencia->bindParam(":idRequerimiento", $idRequerimiento, PDO::PARAM_INT);
        $sentencia->bindParam(":clasificacion", $clasificacion, PDO::PARAM_INT);
        $sentencia->execute();
    }

    //verificar si existe pestel
    function verificarPestelFactor($user, $factor, $pestel){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("SELECT * FROM `pestel` join pestelporfactor pf on pf.idPestel = pestel.idPestel join factores f on f.idFactores = pf.idFactor join requerimientos r on r.idRequerimiento = f.idRequerimiento join caracteristicas c on c.idCaracteristica = r.idCaracteristica where  c.user = :user and pf.idFactor = :factor and pf.idPestel = :pestel" );
        $sentencia->bindParam(":user", $user, PDO::PARAM_STR);
        $sentencia->bindParam(":factor", $factor, PDO::PARAM_INT);
        $sentencia->bindParam(":pestel", $pestel, PDO::PARAM_INT);
            
        $sentencia->execute();
        
        return $sentencia ->fetchAll(PDO::FETCH_OBJ);
    }


    //Borrar factorpestel
    function borrarPestelFactor($user, $factor, $pestel){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("DELETE from `pestelporfactor` where idFactor = :idFactor and idPestel = :pestel" );
        $sentencia->bindParam(":idFactor", $factor, PDO::PARAM_INT);
        $sentencia->bindParam(":pestel", $pestel, PDO::PARAM_INT);
            
        $sentencia->execute();
        
    }


    function ingresarPestel($idPestel, $idFactor){
        include_once 'database.php';
        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("INSERT INTO `pestelporfactor`(`idPestelFactor`, `idPestel`, `idFactor`) VALUES (0,:idPestel,:idFactor)");
        $sentencia->bindParam(":idPestel", $idPestel, PDO::PARAM_INT);
        $sentencia->bindParam(":idFactor", $idFactor, PDO::PARAM_INT);
        $sentencia->execute();
    }

    function ingresarUsuario($user, $pass){
        include_once 'database.php';
        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("INSERT INTO `usuarios`(`user`, `password`) VALUES (:user,:pass)");
        $sentencia->bindParam(":user", $user, PDO::PARAM_INT);
        $sentencia->bindParam(":pass", $pass, PDO::PARAM_INT);
        $sentencia->execute();        
    }

    function verificarUsuario($user, $pass){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("SELECT * FROM `usuarios` WHERE user = :user and password = :pass");
        $sentencia->bindParam(":user", $user, PDO::PARAM_INT);
        $sentencia->bindParam(":pass", $pass, PDO::PARAM_INT);
        
        $sentencia->execute();
        
        return $sentencia ->fetch(PDO::FETCH_OBJ);
    }

    
    function ingresarComentario($comentario, $idFactor){
        include_once 'database.php';
        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("INSERT INTO `comentarios`(`idComentario`, `comentarios`, `idFactor`) VALUES (0,:comentario,:idFactor)");
        $sentencia->bindParam(":comentario", $comentario, PDO::PARAM_STR);
        $sentencia->bindParam(":idFactor", $idFactor, PDO::PARAM_INT);
        $sentencia->execute();
    }

    function consultaCaracteristicas($user){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("SELECT `idCaracteristica`, `DesCaracteristica` FROM `caracteristicas` WHERE user = :user");
        $sentencia->bindParam(":user", $user, PDO::PARAM_STR);
            
        $sentencia->execute();
        
        return $sentencia ->fetchAll(PDO::FETCH_OBJ);
    }

    function consultaRequerimientos($user){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("SELECT * FROM `requerimientos` join caracteristicas on requerimientos.idCaracteristica = caracteristicas.idCaracteristica WHERE caracteristicas.user = :user Order by caracteristicas.idCaracteristica");
        $sentencia->bindParam(":user", $user, PDO::PARAM_STR);
            
        $sentencia->execute();
        
        return $sentencia ->fetchAll(PDO::FETCH_OBJ);
    }

    function consultaFactores($user){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("SELECT * FROM `factores` join requerimientos r on r.idRequerimiento = factores.idRequerimiento join caracteristicas c on c.idCaracteristica = r.idCaracteristica where c.user = :user");
        $sentencia->bindParam(":user", $user, PDO::PARAM_STR);
            
        $sentencia->execute();
        
        return $sentencia ->fetchAll(PDO::FETCH_OBJ);
    }

    //SELECT * FROM `pestel` join pestelporfactor pf on pf.idPestel = pestel.idPestel join factores f on f.idFactores = pf.idFactor join requerimientos r on r.idRequerimiento = f.idRequerimiento join caracteristicas c on c.idCaracteristica = r.idCaracteristica where  c.user = ''

    function consultaPestelFactor($user, $idFactor){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("SELECT * FROM `pestel` join pestelporfactor pf on pf.idPestel = pestel.idPestel join factores f on f.idFactores = pf.idFactor join requerimientos r on r.idRequerimiento = f.idRequerimiento join caracteristicas c on c.idCaracteristica = r.idCaracteristica where  c.user = :user and pf.idFactor = :idFactor");
        $sentencia->bindParam(":user", $user, PDO::PARAM_STR);
        $sentencia->bindParam(":idFactor", $idFactor, PDO::PARAM_INT);
            
        $sentencia->execute();
        
        return $sentencia ->fetchAll(PDO::FETCH_OBJ);
    }

    function consultaPestel(){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("SELECT * FROM `pestel`");
            
        $sentencia->execute();
        
        return $sentencia ->fetchAll(PDO::FETCH_OBJ);
    }

    
    function consultaComentario($idFactor){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("SELECT * FROM `comentarios` where idFactor = :idFactor");
        $sentencia->bindParam(":idFactor", $idFactor, PDO::PARAM_INT);            
        $sentencia->execute();
        
        return $sentencia ->fetchAll(PDO::FETCH_OBJ);
    }

    function modificarComentario($comentario, $idFactor){
        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("UPDATE `comentarios` SET `comentarios`=:comentario where idFactor = :idFactor");
        $sentencia->bindParam(":comentario", $comentario, PDO::PARAM_STR);
        $sentencia->bindParam(":idFactor", $idFactor, PDO::PARAM_INT);            
        $sentencia->execute();

    }

    public function muestraPerfil()
    {

        include_once 'database.php';

        $con = new con;
        $bd = $con->bd;

        $sentencia = $bd->prepare("SELECT * FROM `usuarios` where user = :user");
        $sentencia->bindParam(":user", $_SESSION['id'], PDO::PARAM_STR);            
        $sentencia->execute();
        
        return $sentencia ->fetchAll(PDO::FETCH_OBJ);
    }




}

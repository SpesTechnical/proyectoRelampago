<?php

try {

    class con
    {
        public $bd= null;
        public  function __construct()
        {
            $contrasena = "*082rEom2";
            $usuario = "user_relam";
            $nombre_bd = "tiusr4pl_PROYECRELAM";
            $this->bd = new PDO(
                "mysql:host=tiusr4pl.cuc-carrera-ti.ac.cr;
                dbname=" . $nombre_bd,
                $usuario,
                $contrasena,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        }

    }
} catch (Exception $e) {
    throw $e;
}

?>

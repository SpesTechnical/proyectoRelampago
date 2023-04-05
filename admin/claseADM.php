<?php
session_start();
class claseADM
{
    private $user = 'user_relam';
    private $pass = '*082rEom2';
    private $conn;

    function __construct()
    {
        $this->conn = new PDO('mysql:host=tiusr4pl.cuc-carrera-ti.ac.cr;dbname=tiusr4pl_PROYECRELAM', $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    
    function getConexion()
    {
        return $this->conn;
    }


    public function loginAdmin()
    {
        $param = func_get_args();

        $query = "SELECT * FROM administradores WHERE Usuario=? and Contrasena=?";
        $stmt = $this->getConexion()->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_STR);
        $stmt->bindParam(2, $param[1], PDO::PARAM_STR);
        $stmt->execute();

        $datos = $stmt->fetchAll();

        if (!empty($datos)) {
            return $datos;
        } else {
            return false;
        }
    }

    public function loginUsuario()
    {
        $param = func_get_args();

        $query = "SELECT * FROM usuarios WHERE user=? and `password`=?";
        $stmt = $this->getConexion()->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_STR);
        $stmt->bindParam(2, $param[1], PDO::PARAM_STR);
        $stmt->execute();

        $datos = $stmt->fetchAll();

        if (!empty($datos)) {
            return $datos;
        } else {
            return false;
        }
    }

    public function insertaUsuario()
    {
        $param = func_get_args();

        $query = "INSERT INTO usuarios(user,`password`, empresa, segmento) VALUES (?,?,?,?)";

        $stmt = $this->getConexion()->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_STR);
        $stmt->bindParam(2, $param[1], PDO::PARAM_STR);
        $stmt->bindParam(3, $param[2], PDO::PARAM_STR);
        $stmt->bindParam(4, $param[3], PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo json_encode(array('response' => true));
        } else {
            echo json_encode(array('response' => false));
        }
    }


    public function eliminarUsuario()
    {
        $param = func_get_args();
        $query = "DELETE FROM usuarios WHERE user=? AND empresa=?";
        $stmt = $this->getConexion()->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_STR);
        $stmt->bindParam(2, $param[1], PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo json_encode(array('response' => true));
        } else {
            echo json_encode(array('response' => false));
        }
    }


    public function muestraPerfilAD()
    {
        $param = func_get_args();

        $query = "SELECT * FROM administradores WHERE IdAdmin=?";
        $stmt = $this->getConexion()->prepare($query);
        $stmt->bindParam(1, $param[0], PDO::PARAM_STR);
        $stmt->execute();

        $datos = $stmt->fetchAll();

        if (!empty($datos)) {
            return $datos;
        } else {
            return false;
        }
    }



    public function muestraUsuarios()
    {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->getConexion()->prepare($query);;
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
    }

}

$ObjADM = new claseADM();




//Borrar Usuario
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'borraUsuario') {
        $user = $_POST['user'];
        $empresa = $_POST['empresa'];
        
        $ObjADM->eliminarUsuario($user,$empresa);
    }
}


//Ingresar Usuario
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'nuevoUsuario') {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $empresa = $_POST['empresa'];
        $segmento = $_POST['segmento'];
        
        $ObjADM->insertaUsuario($usuario,$contrasena,$empresa,$segmento);
    }
}

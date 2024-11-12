<?php
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';
Class Usuario{
    private $idUsuario;
    private $nombreUsuario;
    private $correoUsuario;
    private $permisosUsuario;
    private $passUsuario;

    public function __construct($idUsuario, $nombreUsuario,$correoUsuario,$permisosUsuario,$passUsuario){
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->correoUsuario = $correoUsuario;
        $this->permisosUsuario = $permisosUsuario;
        $this->passUsuario = $passUsuario;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }
    public function getCorreoUsuario(){
        return $this->correoUsuario;
    }
    public function getPermisosUsuario(){
        return $this->permisosUsuario;
    }
    public function getPassUsuario(){
        return $this->passUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }

    public function setCorreoUsuario($correoUsuario){
        $this->correoUsuario = $correoUsuario;
    }

    public function setPermisosUsuario($permisosUsuario){
        $this->permisosUsuario = $permisosUsuario;
    }

    public function setPassUsuario($passUsuario){
        $this->passUsuario = $passUsuario;
    }

    public static function getLogin($correo,$contraseña) {
        try{
            $conn = getDbConnection();
            $sentencia = $conn->prepare("SELECT * FROM usuario WHERE correoUsuario = ? AND passUsuario = ?");
            $sentencia->bindParam(1, $correo);
            $sentencia->bindParam(2, $contraseña);
            $sentencia->execute();
            $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        }
    }

    public  function crearUsuario($user){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("INSERT INTO `usuario`(`nombreUsuario`, `correoUsuario`, `permisosUsuario`, `passUsuario`) VALUES (?,?,?,?)");
            $query->bindParam(1, $user->getNombreUsuario());
            $query->bindParam(2, $user->getCorreoUsuario());
            $query->bindParam(3, $user->getPermisosUsuario());
            $query->bindParam(4, $user->getPassUsuario());
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public  function findUserByEmail($email){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("SELECT * FROM `usuario` WHERE correoUsuario = ?");
            $query->bindParam(1, $email);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            return $res!=null;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public  function getUser($user){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("SELECT * FROM `usuario` WHERE correoUsuario = ?");
            $query->bindParam(1, $user->getCorreoUsuario());
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);

            return  $res;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public  function updateUser($newUser){
        $nombreUsuario = $newUser->getNombreUsuario();
        $correoUsuario = $newUser->getCorreoUsuario();
        $passUsuario = $newUser->getPassUsuario();
        $idUsuario = $newUser->getIdUsuario();
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("UPDATE `usuario` SET `nombreUsuario` = ?, `correoUsuario` = ?, `passUsuario` = ?  WHERE idUsuario = ?");
            $query->bindParam(1, $nombreUsuario);
            $query->bindParam(2, $correoUsuario);
            $query->bindParam(3, $passUsuario);
            $query->bindParam(4, $idUsuario);
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}
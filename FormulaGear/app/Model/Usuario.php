<?php
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';
/**
 * 
 * Class Usuario
 * 
 * Gestiona las tareas de conexión a la base de datos relacionadas con el usuario.
 * 
 * @package Model
 */
Class Usuario{
    /**
     * @var int $idUsuario El ID único del usuario.
     */
    private $idUsuario;

    /**
     * @var string $nombreUsuario El nombre del usuario.
     */
    private $nombreUsuario;

    /**
     * @var string $correoUsuario El correo electrónico del usuario.
     */
    private $correoUsuario;

    /**
     * @var string $permisosUsuario Los permisos del usuario.
     */
    private $permisosUsuario;

    /**
     * @var string $passUsuario La contraseña del usuario.
     */
    private $passUsuario;

    /**
     * Constructor para la clase Usuario.
     *
     * @param int $idUsuario El ID único del usuario.
     * @param string $nombreUsuario El nombre del usuario.
     * @param string $correoUsuario El correo electrónico del usuario.
     * @param string $permisosUsuario Los permisos del usuario.
     * @param string $passUsuario La contraseña del usuario.
     */
    public function __construct($idUsuario, $nombreUsuario,$correoUsuario,$permisosUsuario,$passUsuario){
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->correoUsuario = $correoUsuario;
        $this->permisosUsuario = $permisosUsuario;
        $this->passUsuario = $passUsuario;
    }

    /**
     * Recupera el ID del usuario.
     *
     * @return int El ID único del usuario.
     */
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    /**
     * Recupera el nombre del usuario.
     *
     * @return string El nombre del usuario.
     */
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    /**
     * Recupera el correo electrónico del usuario.
     *
     * @return string El correo electrónico del usuario.
     */
    public function getCorreoUsuario() {
        return $this->correoUsuario;
    }

    /**
     * Recupera los permisos del usuario.
     *
     * @return string Los permisos del usuario.
     */
    public function getPermisosUsuario() {
        return $this->permisosUsuario;
    }

    /**
     * Recupera la contraseña del usuario.
     *
     * @return string La contraseña del usuario.
     */
    public function getPassUsuario() {
        return $this->passUsuario;
    }

    /**
     * Establece el ID del usuario.
     *
     * @param int $idUsuario El ID único del usuario.
     */
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Establece el nombre del usuario.
     *
     * @param string $nombreUsuario El nombre del usuario.
     */
    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * Establece el correo electrónico del usuario.
     *
     * @param string $correoUsuario El correo electrónico del usuario.
     */
    public function setCorreoUsuario($correoUsuario) {
        $this->correoUsuario = $correoUsuario;
    }

    /**
     * Establece los permisos del usuario.
     *
     * @param string $permisosUsuario Los permisos del usuario.
     */
    public function setPermisosUsuario($permisosUsuario) {
        $this->permisosUsuario = $permisosUsuario;
    }

    /**
     * Establece la contraseña del usuario.
     *
     * @param string $passUsuario La contraseña del usuario.
     */
    public function setPassUsuario($passUsuario) {
        $this->passUsuario = $passUsuario;
    }

    /**
     * Método que realiza un login con el correo del usuario almacenado en la base de datos.
     *
     * @param string $correo El correo electrónico del usuario.
     * 
     * @return array Array asociativo con los datos del usuario.
     * 
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos.
     */
    public static function getLogin($correo) {
        try{
            $conn = getDbConnection();
            $sentencia = $conn->prepare("SELECT * FROM usuario WHERE correoUsuario = ?");
            $sentencia->bindParam(1, $correo);
            $sentencia->execute();
            $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
    }

    /**
     * Método que crea un nuevo usuario en la base de datos.
     *
     * @param Usuario $user El objeto Usuario que contiene los datos del nuevo usuario.
     * 
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos.
     */
    public function crearUsuario($user){
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

    /**
     * Método que recupera un usuario de la base de datos mediante su correo electrónico.
     *
     * @param string $email El correo electrónico del usuario.
     * 
     * @return bool Retorna `true` si el usuario existe, `false` si no.
     * 
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos.
     */
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

    /**
     * Método que Recupera todos los datos de un usuario mediante su correo electrónico.
     *
     * @param Usuario $user El objeto Usuario que contiene el correo electrónico.
     * 
     * @return array Array asociativo con los datos del usuario.
     * 
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos.
     */
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

     /**
     * Método que actualiza los datos de un usuario en la base de datos.
     *
     * @param Usuario $newUser El objeto Usuario con los nuevos datos.
     * 
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos.
     */
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
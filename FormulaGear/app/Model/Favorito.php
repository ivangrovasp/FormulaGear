<?php
    require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';
    /**
     * Class Favorito
     * 
     * Gestiona las tareas de conexión a la base de datos relacionadas con los favoritos del usuario
     * @package Model
     */
    class Favorito {
        /**
         * @var int Id favorito
         */
        private $idFavorito;
         /**
         * @var int Id del usuario
         */
        private $idUsuario;
         /**
         * @var int Id del producto
         */
        private $idProducto;
        /**
         * Constructor completo
         * @param int $idFavorito Id favorito
         * @param int $idProducto Id del producto
         * @param int $idUsuario Id del usuario
         */
        public function __construct($idFavorito,$idProducto,$idUsuario)
        {
        $this->idProducto = $idProducto;
        $this->idFavorito = $idFavorito;
        $this->idUsuario = $idUsuario;
        }
    /**
     * Recupera el id del producto
     * @return int Retorna el Id del producto
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Establece el Id del producto
     * @param int $idProducto Id del producto
     * @return void
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    /**
     * Recupera el id favorito
     * @return int Retorna el Id favorito
     */
    public function getidFavorito()
    {
        return $this->idFavorito;
    }

    /**
     * Establece el Id favorito
     * @param int $idFavorito Id favorito
     * @return void
     */
    public function setidFavorito($idFavorito)
    {
        $this->idFavorito = $idFavorito;
    }

    /**
     * Establece el Id de usuario
     * @return int Retorna el Id del usuario
     */
    public function getidUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Establece el Id del usuario
     * @param int $idUsuario Id del usuario
     * @return void
     */
    public function setidUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    /**
     * Método que inserta un producto del usuario a favoritos
     * @param mixed $favorite Objeto de la clase Favorito
     * @return void
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos
     */
    public function userFavorites($favorite){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("INSERT INTO `favorito`(`idUsuario`, `idProducto`) VALUES (?,?)");
            $query->bindParam(1, $favorite->getidUsuario());
            $query->bindParam(2, $favorite->getIdProducto());
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    }
?>
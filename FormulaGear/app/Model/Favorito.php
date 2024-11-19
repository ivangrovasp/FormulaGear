<?php
    require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';
    class Favorito {
        private $idFavorito;
        private $idUsuario;
        private $idProducto;

        public function __construct($idProducto,$idFavorito,$idUsuario)
        {
        $this->idProducto = $idProducto;
        $this->idFavorito = $idFavorito;
        $this->idUsuario = $idUsuario;
        }

    public function getIdProducto()
    {
        return $this->idProducto;
    }


    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }


    public function getidFavorito()
    {
        return $this->idFavorito;
    }


    public function setidFavorito($idFavorito)
    {
        $this->idFavorito = $idFavorito;
    }

    
    public function getidUsuario()
    {
        return $this->idUsuario;
    }


    public function setidUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function userFavorites($user){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("INSERT INTO `favorito`(`idUsuario`, `idProducto`) VALUES (?,?)");
            $query->bindParam(1, $user->getidUsuario());
            $query->bindParam(2, $user->getIdProducto());
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    }
?>
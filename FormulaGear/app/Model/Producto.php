<?php
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Talla.php';

Class Producto{
    private $idProducto;
    private $nombreProducto;
    private $precioProducto;
    private $descripcionProducto;
    private $imagenProducto;
    private $numeroLikesProducto;

    public function __construct($idProducto,$nombreProducto,$precioProducto,$descripcionProducto,$imagenProducto,$numeroLikesProducto){
        $this->idProducto = $idProducto;
        $this->nombreProducto = $nombreProducto;
        $this->precioProducto = $precioProducto;
        $this->descripcionProducto = $descripcionProducto;
        $this->imagenProducto = $imagenProducto;
        $this->numeroLikesProducto = $numeroLikesProducto;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }


    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }


    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }


    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }


    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;
    }


    public function getDescripcionProducto()
    {
        return $this->descripcionProducto;
    }

    public function setDescripcionProducto($descripcionProducto)
    {
        $this->descripcionProducto = $descripcionProducto;
    }


    public function getImagenProducto()
    {
        return $this->imagenProducto;
    }

    public function setImagenProducto($imagenProducto)
    {
        $this->imagenProducto = $imagenProducto;
    }



    public function getNumeroLikesProductoProducto()
    {
        return $this->numeroLikesProducto;
    }

    public function setNumeroLikesProductoProducto($numeroLikesProducto)
    {
        $this->numeroLikesProducto = $numeroLikesProducto;
    }

    public static function getProducstMostLiked(){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("SELECT * FROM `producto` ORDER BY `numeroLikesProducto` DESC LIMIT 3;");
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            return  $res;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function getAllProducts(){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("SELECT * FROM `producto`");
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            return  $res;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function getDetailProductByID($idProducto){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("SELECT * FROM `producto`p INNER JOIN `talla`t ON p.`idProducto` = t.`idProducto` WHERE p.`idProducto` = ?");
            $query->bindParam(1, $idProducto);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            return  $res;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public static function getProductById($idProducto){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("SELECT * FROM `producto` WHERE`idProducto` = ?");
            $query->bindParam(1, $idProducto);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            return  $res;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public static function updateProductLike($idProducto){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("UPDATE `producto` SET `numeroLikesProducto` = `numeroLikesProducto` +1 WHERE `idProducto` = ?");
            $query->bindParam(1, $idProducto);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            return  $res;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function addProduct($nombreProducto,$precioProducto,$descripcionProducto,$imagenProducto,$numeroLikesProducto){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("INSERT INTO `producto`(`nombreProducto`, `precioProducto`, `descripcionProducto`, `imagenProducto`, `numeroLikesProducto`) VALUES (?,?,?,?,?)");
            $query->bindParam(1, $nombreProducto);
            $query->bindParam(2, $precioProducto);
            $query->bindParam(3, $descripcionProducto);
            $query->bindParam(4, $imagenProducto);
            $query->bindParam(5, $numeroLikesProducto);
            $query->execute();
            //Tras insertar el producto, devolvemos el id del último elemento insertado en la bd
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function deleteProduct($idProduct){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("DELETE FROM `producto` WHERE `idProducto` = ?");
            $query->bindParam(1, $idProduct);
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function updateProduct($idProducto,$nombreProducto,$precioProducto,$descripcionProducto,$imagenProducto){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("UPDATE `producto` SET `nombreProducto`= ?,`precioProducto`=?,`descripcionProducto`=?,`imagenProducto`= ?WHERE `idProducto`=?");
            
            $query->bindParam(1, $nombreProducto);
            $query->bindParam(2, $precioProducto);
            $query->bindParam(3, $descripcionProducto);
            $query->bindParam(4, $imagenProducto);
            $query->bindParam(5, $idProducto);
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}

?>
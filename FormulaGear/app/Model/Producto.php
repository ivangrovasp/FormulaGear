<?php
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Talla.php';
/**
 * Class Producto
 * 
 * Gestiona las tareas de conexión a la base de datos relacionadas con los productos
 * @package Model
 */
class Producto
{
    /**
     * @var int Id del producto favorito del usuario
     */
    private $idProducto;
    /**
     * @var string nombre del producto
     */
    private $nombreProducto;
    /**
     * @var float precio del producto
     */
    private $precioProducto;
    /**
     * @var string Descripción del producto
     */
    private $descripcionProducto;
    /**
     * @var string Ruta de la imagen del producto
     */
    private $imagenProducto;
    /**
     * @var int Número de likes del producto
     */
    private $numeroLikesProducto;
    /**
     * Constructor completo
     * @param int $idProducto Id del producto
     * @param string $nombreProducto Nombre del producto
     * @param float $precioProducto Precio del producto
     * @param string $descripcionProducto Descripción del producto
     * @param string $imagenProducto ruta de la imagen del producto
     * @param int $numeroLikesProducto Número de likes del producto
     */
    public function __construct($idProducto, $nombreProducto, $precioProducto, $descripcionProducto, $imagenProducto, $numeroLikesProducto)
    {
        $this->idProducto = $idProducto;
        $this->nombreProducto = $nombreProducto;
        $this->precioProducto = $precioProducto;
        $this->descripcionProducto = $descripcionProducto;
        $this->imagenProducto = $imagenProducto;
        $this->numeroLikesProducto = $numeroLikesProducto;
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
     * Recupera el nombre del producto
     * @return string Retorna el nombre del producto
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Establece el nombre del producto
     * @param string $nombreProducto nombre del producto
     * @return void
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }

    /**
     * Recupera el precio del producto
     * @return float Retorna el precio del producto
     */
    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }
    /**
     * Establece el precio del producto
     * @param float $precioProducto precio del producto
     * @return void
     */
    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;
    }

    /**
     * Recupera la descripción del producto
     * @return string Retorna la descripción del producto
     */
    public function getDescripcionProducto()
    {
        return $this->descripcionProducto;
    }
    /**
     * Establece la descripción del producto
     * @param mixed $descripcionProducto Descripción del producto
     * @return void
     */
    public function setDescripcionProducto($descripcionProducto)
    {
        $this->descripcionProducto = $descripcionProducto;
    }

    /**
     * Recupera la ruta de la imagen del producto
     * @return string ruta de la imagen del producto
     */
    public function getImagenProducto()
    {
        return $this->imagenProducto;
    }
    /**
     * Establece la ruta de la imagen del producto
     * @param mixed $imagenProducto Ruta de la imagen del producto
     * @return void
     */
    public function setImagenProducto($imagenProducto)
    {
        $this->imagenProducto = $imagenProducto;
    }


    /**
     * Recupera el número de likes del producto
     * @return int Número de likes del producto
     */
    public function getNumeroLikesProducto()
    {
        return $this->numeroLikesProducto;
    }
    /**
     * Establece el número de likes del producto
     * @param mixed $numeroLikesProducto Número de likes del producto
     * @return void
     */
    public function setNumeroLikesProducto($numeroLikesProducto)
    {
        $this->numeroLikesProducto = $numeroLikesProducto;
    }
    /**
     * Método que recupera los tres productos con más likes
     * @return array|null Array asociativo con la información de los productos con más likes
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos
     */
    public static function getProducstMostLiked()
    {
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
    /**
     * Método que recupera todos los productos
     * @return array|null Array asociativo con la información de todos los productos
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos
     */
    public static function getAllProducts()
    {
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
    /**
     * Método que recupera todos los productos con sus tallas
     * @param int $idProducto Id del producto
     * @return array|null Array asociativo con la información de todos los productos con las tallas
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos
     */
    public static function getDetailProductByID($idProducto)
    {
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
    /**
     * Método que recupera un producto por su id
     * @param int $idProducto Id del producto
     * @return array|null Array asociativo con la información del producto a buscar
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos
     */
    public static function getProductById($idProducto)
    {
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
    /**
     * Método que actualiza los likes del producto
     * @param mixed $idProducto Id del producto
     * @return mixed El resultado de actualizar el número de likes del producto.
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos
     */
    public static function updateProductLike($idProducto)
    {
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
    /**
     * Método para insertar un producto en la base de datos
     * @param string $nombreProducto Nombre del producto
     * @param float $precioProducto Precio del producto
     * @param string $descripcionProducto Descripción del producto
     * @param string $imagenProducto Ruta de la imagen del producto
     * @param int $numeroLikesProducto Número de likes del producto
     * @return bool|string Retorna el id del último producto insertado
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos
     */
    public function addProduct($nombreProducto, $precioProducto, $descripcionProducto, $imagenProducto, $numeroLikesProducto)
    {
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
    /**
     * Método para eliminar un producto
     * @param mixed $idProduct Id del producto
     * @return void
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos
     */
    public function deleteProduct($idProduct)
    {
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("DELETE FROM `producto` WHERE `idProducto` = ?");
            $query->bindParam(1, $idProduct);
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    /**
     * Método para actualizar un producto
     * @param int $idProducto Id del producto
     * @param string $nombreProducto Nombre del producto
     * @param float $precioProducto Precio del producto
     * @param string $descripcionProducto Descripción del producto
     * @param string $imagenProducto Ruta de la imagen del producto
     * @return void
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos
     */
    public function updateProduct($idProducto, $nombreProducto, $precioProducto, $descripcionProducto, $imagenProducto)
    {
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

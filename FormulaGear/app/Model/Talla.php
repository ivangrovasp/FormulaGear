<?php
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';
/**
 * 
 * Class Talla
 * 
 * Gestiona las tareas de conexión a la base de datos relacionadas con las tallas de los productos.
 * 
 * @package Model
 */
class Talla {
    /**
     * @var int $idTalla El ID único de la talla.
     */
    private $idTalla;

    /**
     * @var string $nombreTalla El nombre de la talla.
     */
    private $nombreTalla;

    /**
     * @var int $idProducto El ID del producto al que se le asigna la talla.
     */
    private $idProducto;

    
    /**
     * Recupera el ID de la talla.
     *
     * @return int El ID único de la talla.
     */
    public function getIdTalla() {
        return $this->idTalla;
    }

    /**
     * Establece el ID de la talla.
     *
     * @param int $idTalla El ID único de la talla.
     */
    public function setIdTalla($idTalla) {
        $this->idTalla = $idTalla;
    }

    /**
     * Recupera el nombre de la talla.
     *
     * @return string El nombre de la talla.
     */
    public function getNombreTalla() {
        return $this->nombreTalla;
    }

    /**
     * Establece el nombre de la talla.
     *
     * @param string $nombreTalla El nombre de la talla.
     */
    public function setNombreTalla($nombreTalla) {
        $this->nombreTalla = $nombreTalla;
    }

    /**
     * Recupera el ID del producto al que pertenece la talla.
     *
     * @return int El ID del producto.
     */
    public function getIdProducto() {
        return $this->idProducto;
    }

    /**
     * Establece el ID del producto al que pertenece la talla.
     *
     * @param int $idProducto El ID del producto.
     */
    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    /**
     * Método que añade una nueva talla a la base de datos para un producto específico.
     *
     * @param string $nombreTalla El nombre de la talla.
     * @param int $idProducto El ID del producto al que se le asigna la talla.
     * 
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos.
     */
    public function addSize($nombreTalla, $idProducto){
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("INSERT INTO `talla`(`nombreTalla`, `idProducto`) VALUES (?,?)");
            $query->bindParam(1, $nombreTalla);
            $query->bindParam(2, $idProducto);
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}
?>

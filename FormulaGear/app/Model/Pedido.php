<?php
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';

/**
 * 
 * Class Pedido
 * 
 * Gestiona las tareas de conexión a la base de datos relacionadas con los pedidos.
 * 
 * @package Model
 */
class Pedido {
    /**
     * @var int $idPedido El ID único del pedido.
     */
    private $idPedido;

    /**
     * @var int $idUsuario El ID del usuario que realizó el pedido.
     */
    private $idUsuario;

    /**
     * @var int $idProducto El ID del producto en el pedido.
     */
    private $idProducto;

    /**
     * @var bool $isLiked Indica si el pedido ha sido marcado como favorito (true) o no (false).
     */
    private $isLiked;

    /**
     * Constructor de la clase Pedido.
     * 
     * @param int $idPedido El ID único del pedido.
     * @param int $idUsuario El ID del usuario.
     * @param int $idProducto El ID del producto.
     * @param bool $isLiked El estado del pedido.
     */
    public function __construct($idPedido, $idUsuario, $idProducto, $isLiked)
    {
        $this->idPedido = $idPedido;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->isLiked = $isLiked;
    }

    /**
     * Recupera el ID del pedido.
     * 
     * @return int El ID del pedido.
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Establece el ID del pedido.
     * 
     * @param int $idPedido El ID del pedido.
     * @return void
     */
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }

    /**
     * Recupera el ID del usuario.
     * 
     * @return int El ID del usuario.
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Establece el ID del usuario.
     * 
     * @param int $idUsuario El ID del usuario.
     * @return void
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Recupera el ID del producto.
     * 
     * @return int El ID del producto.
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Establece el ID del producto.
     * 
     * @param int $idProducto El ID del producto.
     * @return void
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    /**
     * Verifica si el pedido ha sido marcado como "me gusta".
     * 
     * @return bool Verdadero si está marcado como "me gusta", falso en caso contrario.
     */
    public function isLiked()
    {
        return $this->isLiked;
    }

    /**
     * Establece si el pedido ha sido marcado como "me gusta".
     * 
     * @param bool $isLiked El valor que indica si el pedido es "me gusta" o no.
     * @return void
     */
    public function setIsLiked($isLiked)
    {
        $this->isLiked = $isLiked;
    }


    /**
     * Método que inserta un nuevo pedido a la base de datos.
     * 
     * @param int $idUsuario El ID del usuario que realizó el pedido.
     * @param int $idProducto El ID del producto en el pedido.
     * @param bool $isLiked El estado de "me gusta" del pedido.
     * 
     * @return void
     * 
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos.
     */
    public function addOrder($idUsuario, $idProducto, $isLiked)
    {
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("INSERT INTO `pedido`(`idUsuario`, `idProducto`, `isLiked`) VALUES (?,?,?)");
            $query->bindParam(1, $idUsuario);
            $query->bindParam(2, $idProducto);
            $query->bindParam(3, $isLiked);
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    /**
     * Método que recupera un pedido específico de la base de datos mediante un idUsuario y un idProducto.
     * 
     * @param int $idProduct El ID del producto en el pedido.
     * @param int $idUsuario El ID del usuario que realizó el pedido.
     * 
     * @return array|null Retorna un array asociativo con los datos del pedido, o null si no se encuentra el pedido.
     * 
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos.
     */
    public function getOrder($idProduct, $idUsuario)
    {
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("SELECT pe.idPedido, pe.idUsuario, pe.isLiked, pr.* FROM PEDIDO pe INNER JOIN PRODUCTO pr ON pe.idProducto = pr.idProducto WHERE pr.idProducto = ? AND pe.idUsuario = ?");
            $query->bindParam(1, $idProduct);
            $query->bindParam(2, $idUsuario);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    /**
     * Método que actualiza el estado del "me gusta" de un pedido a verdadero para un producto específico.
     * 
     * @param int $idProducto El ID del producto cuyo pedido se va a actualizar.
     * 
     * @return void
     * 
     * @throws PDOException Lanza esta excepción si ocurre un error en la conexión con la base de datos.
     */
    public function updateOrder($idProducto)
    {
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("UPDATE `pedido` SET `isLiked` = 1 WHERE `idProducto` = ?");
            $query->bindParam(1, $idProducto);
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}
?>

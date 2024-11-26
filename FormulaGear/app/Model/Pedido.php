<?php
require_once 'C:/xampp/htdocs/FormulaGear/FormulaGear/config/dbConnection.php';
class Pedido
{
    private $idPedido;
    private $idUsuario;
    private $idProducto;
    private $isLiked;

    public function __construct($idPedido, $idUsuario, $idProducto, $isLiked)
    {
        $this->idPedido = $idPedido;
        $this->idUsuario = $idUsuario;
        $this->idProducto = $idProducto;
        $this->isLiked = $isLiked;
    }
    public function getIdPedido()
    {
        return $this->idPedido;
    }


    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }


    public function setIdUsuario($idUsuario)
    {
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
    public function isLiked()
    {
        return $this->isLiked;
    }


    public function setIsLiked($isLiked)
    {
        $this->isLiked = $isLiked;
    }
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
    public function getOrder($idProduct,$idUsuario)
    {
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("SELECT pe.idPedido,pe.idUsuario,pe.isLiked,pr.* FROM PEDIDO pe INNER JOIN PRODUCTO pr ON pe.idProducto = pr.idProducto WHERE pr.idProducto = ? AND pe.idUsuario = ?");
            $query->bindParam(1, $idProduct);
            $query->bindParam(2, $idUsuario);
            $query->execute();
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            return  $res;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function updateOrder($idProducto)
    {
        try {
            $conn = getDBConnection();
            $query = $conn->prepare("UPDATE `pedido` SET `isLiked`= 1 WHERE `idProducto` = ?");
            $query->bindParam(1, $idProducto);
            $query->execute();
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}

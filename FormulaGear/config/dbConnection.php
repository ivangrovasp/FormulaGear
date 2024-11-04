<?php
function getDBConnection(){
    $host = 'localhost';
    $db_name = 'supermercado';
    $user = 'mathias';
    $pass = 'root';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo 'Error de conexión: ' . $e->getMessage();
        return null;
    }
}

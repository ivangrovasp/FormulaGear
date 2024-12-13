<?php

/**
 * Función para establecer una conexión a la base de datos MySQL y retornar un objeto PDO.
 *
 * Intenta establecer una conexión con la base de datos utilizando las credenciales especificadas. 
 * Si la conexión es exitosa, devuelve el objeto de conexión PDO. Si ocurre un error,
 * captura la excepción y muestra un mensaje de error.
 *
 * @package Config
 * @return PDO|null Retorna el objeto PDO si la conexión tiene éxito y null en su defecto.
 */
function getDBConnection() {
    // Credenciales de conexión
    $host = 'localhost';
    $db_name = 'FormulaGear';
    $user = 'ivan';
    $pass = 'root';

    try {
        // Establece la conexión utilizando PDO
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Retorna el objeto PDO de la conexión
        return $conn;
    } catch (PDOException $e) {
        // Captura cualquier excepción posible y muestra el mensaje de error
        echo 'Error de conexión: ' . $e->getMessage();
        return null;
    }
}

?>

<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
session_start();
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/UsuarioController.php";
require_once "../perfil/perfil.php";

final class CerrarSesionDataTest extends TestCase {

    public function testCerrarSesion() {
        
        // Objeto que simula la variable de sesión
        $_SESSION['usuario'] = [
            'idUsuario' => 1,
            'nombreUsuario' => 'Juan',
            'correoUsuario' => 'juan@example.com',
            'permisosUsuario' => true,
            'passUsuario' => 'password123',
        ];

        // Código a testear
       Sesion::eliminarVariableSesion('usuario');

        // Verificación del test
        $this->assertEmpty($_SESSION);
    }
}

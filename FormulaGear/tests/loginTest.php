<?php
use PHPUnit\Framework\TestCase;
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/UsuarioController.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Usuario.php";

class LoginTest extends TestCase
{
    public function testInicioSesion()
    {
        $correoFiltrado = 'mathiasveira@gmail.com';
        $contraseñaFiltrada = 'mathias123'; 
        
        $usuarioController = new UsuarioController();
        
        $resultado = $usuarioController->getLogin($correoFiltrado, $contraseñaFiltrada);

        $this->assertEquals("Inicio de sesión exitoso", $resultado);
    }
}
?>

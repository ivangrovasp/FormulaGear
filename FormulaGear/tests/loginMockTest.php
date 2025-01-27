<?php
use PHPUnit\Framework\TestCase;
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/UsuarioController.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Usuario.php";

class LoginMockTest extends TestCase
{
    public function testInicioSesionMocks()
    {
        $correoFiltrado = 'mathiasveira@gmail.com';
        $contraseñaFiltrada = 'aaaaa';

        $usuarioMock = $this->createMock(Usuario::class);

        $usuarioMock->method('verificarCredenciales')
            ->with($correoFiltrado, $contraseñaFiltrada)
            ->willReturn(false);

        $usuarioController = new UsuarioController($usuarioMock);

        $resultado = $usuarioController->getLogin($correoFiltrado, $contraseñaFiltrada);

        $this->assertEquals('Contraseña no válida', $resultado);
    }
}
?>
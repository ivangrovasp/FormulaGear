<?php
use PHPUnit\Framework\TestCase;
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/UsuarioController.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Usuario.php";

class LoginMockTest extends TestCase
{
    public function testInicioSesionMocks()
    {
        $usuarioMock = $this->createMock(Usuario::class);

        $usuarioMock->method('getUser')
            ->willReturn(new Usuario(0,"Alberto","alberto@gmail.com",false,"contraseñaErronea"));

        $usuarioController = new UsuarioController();

        $resultado = $usuarioController->getLogin($usuarioMock->getCorreoUsuario(), $usuarioMock->getPassUsuario());

        $this->assertEquals('Contraseña no válida', $resultado);

    }
}
?>
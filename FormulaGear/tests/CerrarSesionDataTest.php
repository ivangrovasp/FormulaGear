<?php declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Controller/UsuarioController.php";
require_once "../perfil/perfil.php";

final class CerrarSesionDataTest extends TestCase {

    public function testCerrarSesion() {
        $sesionMock = $this->createMock(Sesion::class);
        $sesionMock->method('eliminarVariableSesion')->with('usuario');
        $this->assertEmpty($sesionMock->obtenerVariableSesion('usuario'));
    }
}
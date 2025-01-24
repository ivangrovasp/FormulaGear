<?php

use PHPUnit\Framework\TestCase;
require_once "../../Controller/UsuarioController.php";
require_once "../../Model/Usuario.php";
require_once "../../Model/Sesion.php";
Class RegistroMockTest extends TestCase{
    public function testRegistroMock(){
        $mockRegister = $this->createMock(Usuario::class);
        $mockRegister->method('getUser')->willReturn([new Usuario(0,'Mathias28','mathiasveira@gmail.com',false,'mathias123')]);
        $sesion = new Sesion();
        $sesion->iniciarVariableSesion("usuario",$mockRegister);
        $this->assertNotEmpty($sesion->obtenerVariableSesion("usuario"));
    }

}
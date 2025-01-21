<?php

use PHPUnit\Framework\TestCase;
require_once "../../Controller/UsuarioController.php";
require_once "../../Model/Usuario.php";
Class RegistroMockTest extends TestCase{
    public function testRegistroMock(){
        $mockRegister = $this->createMock(Usuario::class);
    }

}
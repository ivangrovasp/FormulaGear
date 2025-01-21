<?php declare(strict_types=1);
require_once "../../Controller/UsuarioController.php";
require_once "../../Model/Usuario.php";
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
final class RegistroDataTest extends TestCase{
    public static function registroPruebaProvider() {
        return [
            [new Usuario(0,"mathias","mathiasveira@gmail.com",false,"mathias123")],
            [new Usuario(0,"mathias2809","mathi@gmail.com",false,"mathias123")],
    ];
    }
    #[DataProvider('registroPruebaProvider')]
    public function testRegistro($userPrueba){
        $user = new UsuarioController();
        $this->assertTrue($user->crearUsuario($userPrueba->getNombreUsuario(),$userPrueba->getCorreoUsuario(),$userPrueba->getPassUsuario())==true);
    }
}
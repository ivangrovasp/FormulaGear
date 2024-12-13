<?php

require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Usuario.php";
require_once "C:/xampp/htdocs/FormulaGear/FormulaGear/app/Model/Sesion.php";

/**
 * 
 * Class UsuarioController
 * 
 * Gestiona las acciones relacionadas con los usuarios.
 * 
 * @package Controller
 */
class UsuarioController
{

    /**
     * Método para iniciar sesión de usuario con correo y contraseña.
     *
     * Verifica si el correo proporcionado existe en la base de datos,
     * y si la contraseña proporcionada es correcta. Si ambos son válidos, se inicia
     * una sesión para el usuario.
     *
     * @param string $correoFiltrado El correo del usuario.
     * @param string $contraseñaFiltrada La contraseña del usuario.
     * @return string Mensaje indicando el resultado del inicio de sesión.
     */
    public function getLogin($correoFiltrado, $contraseñaFiltrada)
    {
        // Obtiene los datos del usuario a partir del correo.
        $usuario = Usuario::getLogin($correoFiltrado);
        
        // Verifica si el usuario existe y si la contraseña es correcta.
        if ($usuario != null) {
            if (password_verify($contraseñaFiltrada, $usuario[0]['passUsuario'])) {
                // Crea una nueva instancia de Usuario y de Sesión
                $user = new Usuario(0, "", $correoFiltrado, false, $contraseñaFiltrada);
                $sesion = new Sesion();
                
                // Obtiene los datos del usuario y los guarda en la sesión
                $sessionUser = $user->getUser($user);
                $sesion->iniciarVariableSesion("usuario", $sessionUser[0]);
                
                return "Inicio de sesión exitoso";
            } else {
                return 'Contraseña no válida';
            }
        } else {
            return "Correo no encontrado";
        }
    }

    /**
     * Método para crear un nuevo usuario en el sistema.
     *
     * Este método verifica si el correo del usuario ya existe en la base de datos.
     * Si no existe, se crea un nuevo usuario y se inicia una sesión para él.
     *
     * @param string $nombreUsuario El nombre del usuario.
     * @param string $correoUsuario El correo del usuario.
     * @param string $passUsuario La contraseña del usuario.
     * @return bool Retorna true si el usuario se crea correctamente, false si el correo ya existe.
     */
    public function crearUsuario($nombreUsuario, $correoUsuario, $passUsuario)
    {
        // Crea una nueva instancia de Usuario
        $user = new Usuario(0, $nombreUsuario, $correoUsuario, false, $passUsuario);
        
        // Verifica si el correo ya está registrado
        if ($user->findUserByEmail($correoUsuario)) {
            return false;
        } else {
            // Crea el usuario y inicia sesión
            $user->crearUsuario($user);
            $sesion = new Sesion();
            $sessionUser = $user->getUser($user);
            $sesion->iniciarVariableSesion("usuario", $sessionUser[0]);
        }
        return true;
    }

    /**
     * Método para actualizar los datos de un usuario existente en BBDD.
     *
     * Permite actualizar los detalles del usuario.
     *
     * @param int $idUsuario El ID del usuario a actualizar.
     * @param string $nombreUsuario El nuevo nombre del usuario.
     * @param string $correoUsuario El nuevo correo del usuario.
     * @param bool $permisosUsuario El nuevo permiso del usuario.
     * @param string $passUsuario La nueva contraseña del usuario.
     */
    public function updateUser($idUsuario, $nombreUsuario, $correoUsuario, $permisosUsuario, $passUsuario)
    {
        // Crea una nueva instancia de Usuario con los datos actualizados
        $newUser = new Usuario($idUsuario, $nombreUsuario, $correoUsuario, $permisosUsuario, $passUsuario);
        
        // Actualiza los datos del usuario
        $newUser->updateUser($newUser);
    }

    /**
     * Método para recuperar los detalles de un usuario mediante su correo.
     *
     * @param string $correoFiltrado El correo del usuario que se desea obtener.
     * @return mixed Los detalles del usuario, si existe.
     */
    public function getUser($correoFiltrado)
    {
        // Crea una nueva instancia de Usuario y obtiene los detalles
        $user = new Usuario(0, '', $correoFiltrado, false, '');
        return $user->getUser($user);
    }
}
?>

<?php
class homeController {
    private $MODEL;

    public function __construct() {
        require_once("c://xampp/htdocs/login_prueba/model/homeModel.php");
        $this->MODEL = new homeModel();
    }

    // Guardar usuario con correo, contraseña y RUT
    public function guardarUsuario($correo, $contraseña, $rut) {
        $correoLimpio = $this->limpiarCorreo($correo);
        $contraseñaEncriptada = $this->encriptarContraseña($this->limpiarCadena($contraseña));
        $rutLimpio = $this->limpiarRUT($rut);

        $valor = $this->MODEL->agregarNuevoUsuario($correoLimpio, $contraseñaEncriptada, $rutLimpio);
        return $valor;
    }

    // Limpiar cadenas de texto
    public function limpiarCadena($campo) {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_UNSAFE_RAW);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    // Limpiar correos electrónicos
    public function limpiarCorreo($campo) {
        $campo = strip_tags($campo);
        $campo = filter_var($campo, FILTER_SANITIZE_EMAIL);
        $campo = htmlspecialchars($campo);
        return $campo;
    }

    // Limpiar y validar RUT
    public function limpiarRUT($rut) {
        $rut = strtoupper(trim($rut));
        $rut = preg_replace('/[^0-9K]/', '', $rut); // Eliminar caracteres no permitidos
        return $rut;
    }

    // Encriptar contraseña
    public function encriptarContraseña($contraseña) {
        return password_hash($contraseña, PASSWORD_DEFAULT);
    }

    // Verificar usuario
    public function verificarUsuario($correo, $contraseña) {
        $keydb = $this->MODEL->obtenerClave($correo);
        return (password_verify($contraseña, $keydb)) ? true : false;
    }
}
?>

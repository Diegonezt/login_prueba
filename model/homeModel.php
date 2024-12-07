<?php
class homeModel {
    private $PDO;

    public function __construct() {
        require_once("c://xampp/htdocs/login_prueba/config/db.php");
        $pdo = new db();
        $this->PDO = $pdo->conexion();
    }

    // Agregar un nuevo usuario con correo, contraseña y RUT
    public function agregarNuevoUsuario($correo, $password, $rut) {
        $statement = $this->PDO->prepare("INSERT INTO usuarios VALUES (null, :correo, :password, :rut)");
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":rut", $rut);

        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Obtener la clave (contraseña) del usuario por su correo
    public function obtenerClave($correo) {
        $statement = $this->PDO->prepare("SELECT password FROM usuarios WHERE correo = :correo");
        $statement->bindParam(":correo", $correo);
        return ($statement->execute()) ? $statement->fetch()['password'] : false;
    }
}
?>

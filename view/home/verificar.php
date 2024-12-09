<?php
    require_once("c://xampp/htdocs/login_prueba/controller/homeController.php");
    session_start();
    $obj = new homeController();
    $correo = $obj->limpiarcorreo($_POST['correo']);
    $contraseña = $obj->limpiarcadena($_POST['contraseña']);
    $bandera = $obj->verificarusuario($correo, $contraseña);
    if($bandera){
        $_SESSION['usuario'] = $correo;
        header("Location:profile-card/index.html");
    }else{
        $error = "<li>Credenciales incorrectas</li>";
        header("Location:login.php?error=".$error);
    }
?>
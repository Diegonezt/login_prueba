<?php
    require_once("c://xampp/htdocs/login_prueba/controller/homeController.php");
    $obj = new homeController();
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $confirmarContraseña = $_POST['confirmarContraseña'];
    $error = "";
    if(empty($correo) && empty($contraseña) && empty($confirmarContraseña)){
        $error .= "<li>Los campos son iguales</li>";
        header("Location:signup.php?error=".$error."&&correo=".$correo."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña);
    }else if($correo || $contraseña || $confirmarContraseña){
        if($contraseña == $confirmarContraseña){
            if($obj->guardarUsuario($correo,$contraseña) == false){
                $error .= "<li>Correo agregado</li>";
                header("Location:signup.php?error=".$error."&&correo=".$correo."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña);
            }else{
                header("Location:login.php");
            }
        }else{
            $error .= "<li>Las contraseñas son iguales</li>";
            header("Location:signup.php?error=".$error."&&correo=".$correo."&&contraseña=".$contraseña."&&confirmarContraseña=".$confirmarContraseña);
        }
    }
?>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/class/database.class.php");
    $action = (isset($_GET['action']))?$_GET['action']:null;

    switch($action){
        case 'validar':
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            if($sistema->Validar($correo, $contrasena)){
                header('Location: ../index.php');
            }else{
                $sistema->Logout(); 
            }
        break;
        case 'logout':
            $sistema->Logout();
        break;
        
        case 'recuperar':
            include("view/recuperar.php");
        break;
        case 'verificarCorreo':
            $correo = $_POST['correo'];
            if(!$sistema->verificarCorreo($correo)){
                $mensaje = "El correo proporcionado no se encuentra registrado como usuario";
                include_once($_SERVER['DOCUMENT_ROOT']."/proyecto/login/view/recuperar.php");
                die();
            }
            $sistema->recuperarContrasena($correo);
        break;  
        case 'reestablecer':
            $correo = $_GET['correo'];
            $token = $_GET['token'];
            if($sistema->verificarToken($correo, $token)){
                include("view/reestablecer.php");
            }else{
                die("Error, el token proporcionado no coincide con el usuario");
            }
        break;
        case 'cambiarContrasena':
            $correo = $_POST['correo'];
            $token = $_POST['token'];
            $contrasena = $_POST['contrasena'];
            if($sistema->verificarToken($correo, $token)){
                $sistema->cambiarContrasena($correo, $contrasena);
                $mensaje = "La contraseña se ha cambiado";
                include_once($_SERVER['DOCUMENT_ROOT']."/proyecto/login/view/login.php");
            }else{
                die("Error, el token proporcionado no coincide con el usuario");
            }
        break;    
        default:
        include_once($_SERVER['DOCUMENT_ROOT']."/proyecto/login/view/login.php");
    }
?>
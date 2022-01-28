<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;   
    Class Sistema extends Database{

        function VerificarPermiso($permiso){
            $mensaje = "";
            if(isset($_SESSION)){
                if($_SESSION['validado']){
                    $permisos = $_SESSION['permiso'];
                    $flag = false;
                    foreach($permisos as $key=>$value){
                        if($value['permiso']==$permiso){
                            $flag = true;
                        }
                    }
                    if(!$flag){
                        $mensaje = "Usted no tiene permiso para realizar esta acción";
                        include($_SERVER['DOCUMENT_ROOT']."/proyecto/login/login.php");
                        die();
                    }
                }
                else{
                    $this->Logout();
                }
            }else{
                $this->Logout();
            }
        }

        function Validar($correo, $contrasena){
            $contrasena = md5($contrasena);
            $this->connect();
            $_SESSION['validado']=false;
            $row = array();
            $sql = "SELECT id_usuario, correo FROM usuario WHERE correo=? AND contrasena=? ";
            if($stmt = $this->con->prepare($sql)){
                $stmt->bindParam(1,$correo);
                $stmt->bindParam(2,$contrasena);
                $stmt->execute();
                $row = $stmt->fetchAll();
                if(isset($row[0])){
                    $_SESSION['validado']=true;
                    $_SESSION['id_usuario'] = $row[0]['id_usuario'];
                    $_SESSION['correo'] = $row[0]['correo'];
                    $rol = array();
                    $permiso = array();
                    $sql = "SELECT r.id_rol, r.rol FROM rol r INNER JOIN usuario_rol ur ON r.id_rol = ur.id_rol WHERE ur.id_usuario = ?";
                    $sql_permiso = 'SELECT p.id_permiso, p.permiso 
                    FROM permiso p INNER JOIN rol_permiso rp ON p.id_permiso = rp.id_permiso 
                    INNER JOIN rol r ON rp.id_rol = r.id_rol
                    INNER JOIN usuario_rol ur ON r.id_rol=ur.id_rol
                    WHERE ur.id_usuario=?';

                    if($stmt = $this->con->prepare($sql)){
                        $stmt->bindParam(1, $row[0]['id_usuario']);
                        $stmt->execute();
                        $rol = $stmt->fetchAll();
                        $_SESSION['rol'] = $rol;
                    }
                    if($stmt = $this->con->prepare($sql_permiso)){
                        $stmt->bindParam(1, $row[0]['id_usuario']);
                        $stmt->execute();
                        $permiso = $stmt->fetchAll();
                        $_SESSION['permiso'] = $permiso;
                    }    
                    return true;
                }else{
                    return false;
                }
            }
            $this->close();
        }

        function Logout(){
            session_destroy();
            $mensaje="Usted ha salido del sistema, o sus credenciales no son correctas";
            include_once($_SERVER['DOCUMENT_ROOT']."/proyecto/login/view/login.php");
            //header("Location: ../login/login.php");
            die();
        }

        function VerificarCorreo($correo){
            $this->connect();
            $datos=array();
            $sql="SELECT * FROM usuario WHERE correo=?";
            if($stmt = $this->con->prepare($sql)){
                $stmt->bindParam(1,$correo);
                $stmt->execute();
                $datos = $stmt->fetchAll();
            }
            if(!isset($datos[0])){
                return false;
            }
            $this->close();
            return true;
        }

        function recuperarContrasena($correo){
            $this->connect();
            $token = substr(md5($correo.sha1($correo."cruzazul").random_int(0, 1000000)),0,16);
            $sql = "UPDATE usuario SET token = ? WHERE correo = ?";
            if($stmt = $this->con->prepare($sql)){
                $stmt->bindParam(1, $token);
                $stmt->bindParam(2, $correo);
                $stmt->execute();
                $mensaje = "Estimado usuario, presione el vinculo para recuperar su contraseña: <br> 
                            http://localhost/proyecto/login/login.php?action=reestablecer&correo=$correo&token=$token";

                $this->enviarCorreo($correo, 'usuario', 'recuperacion de contrasena',$mensaje);
            }

            $this->close();
        }

        function enviarCorreo($destinatario, $nombre, $asunto, $mensaje){
            require $_SERVER['DOCUMENT_ROOT'].'/proyecto/vendor/autoload.php';
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->Username = '16031202@itcelaya.edu.mx';
            $mail->Password = '';
            $mail->setFrom('16031202@itcelaya.edu.mx', 'Alejandro Saldaña');
            $mail->addAddress($destinatario, $nombre);
            $mail->Subject = $asunto;
            $mail->msgHTML($mensaje);
            if (!$mail->send()) {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message sent!';

            }
        }

        function verificarToken($correo, $token){
            if($this->verificarCorreo($correo)&!is_null($token)){
                $this->connect();
                $sql = "SELECT * FROM usuario WHERE correo=? AND token=?";
                if($stmt= $this->con->prepare($sql)){
                    $stmt->bindParam(1,$correo);
                    $stmt->bindParam(2,$token);
                    $stmt->execute();
                    $fila = $stmt->fetchAll();
                    if(isset($fila[0])){
                        return true;
                    }
                }
                $this->close();
            }
            return false;
        }

        function cambiarContrasena($correo, $contrasena){
            $contrasena=md5($contrasena);
            $this->connect();
            $sql="UPDATE usuario SET contrasena=?, token=null WHERE correo=?";
            if($stmt = $this->con->prepare($sql)){
                $stmt->bindParam(1, $contrasena);
                $stmt->bindParam(2, $correo);
                $stmt->execute();
            }
            $this->close();
        }
    }
    $sistema = new Sistema;
?>
<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    

    <title>Reestablecer</title>
    </head>
    <body>
        <div class="sidenavi">
            <div class="login-main-text">
                <h2>Reestablece tu contraseña</h2>
                <p>Proporcionanos una nueva contraseña para registrarla en nuestro sistema.</p>
            </div>
        </div>
        <div class="main">
            <div class="col-md-6 col-sm-12">
                <div class="login-form">
                <form action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/proyecto/login/login.php?action=cambiarContrasena" method="POST">
                    <div class="form-group">
                        <label>Contrasena</label>
                        <input name="contrasena" type="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-black">Reestablecer Contraseña</button>
                    <input type="hidden" name="correo" value="<?php echo $correo; ?>">
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                </form>
                
                <div>
                    &nbsp;
                </div>
            </div>
        </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    </body>
</html>
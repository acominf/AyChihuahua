<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        echo var_dump($_POST);
        $name = $_POST['name'];
        $app = $_POST['app'];
        $dir = $_POST['dir'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        $conexion = new mysqli('localhost','root','','aychihuahua');
        $consulta = "SELECT * FROM Clientes WHERE EMail='$mail'";
        $res = $conexion->query($consulta);
        if (empty($name) OR empty($app) OR empty($dir) OR empty($mail) OR empty($pass)) {
            $errores .= '<p>Hay campos vacios vacios</p>';
        }
        else if ($res->num_rows != 0) {
            $errores .= '<p>El email ya esta registrado</p>';
        }
        else {
            $consulta = "INSERT INTO Clientes VALUES(NULL,'$name','$app','$dir','$mail', NULL, '$pass')";
            $conexion->query($consulta);
            $conexion->close();
            header('Location: index.html');
        }
        $conexion->close();
        echo $errores;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>¡AyChihuahua!</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/catalogo.css">
</head>
<body>
	<div class="container">
		<div class="row top-buffer">
			<a href="index.html"><img class="col-lg-12 col-md-12 col-sm-12 col-md-offset-2 col-sm-offset-2 col-xs-12 col-lg-offset-3 logo" src="img/logo.png" alt="Logotipo"></a>
		</div>
        <div class="row top-buffer">
            <div class="col-xs-12">
                <form method="POST">
                    <h1>Formulario de registro</h1>
                    Nombre: <input type="text" name="name"><br>
                    Apellidos: <input type="text" name="app"><br>
                    Dirección: <input type="text" name="dir"><br>
                    E-Mail: <input type="text" name="mail"><br>
                    Contraseña: <input type="password" name="pass"><br>
                    <input type="submit" value='Registrar'>
                </form>
            </div>
        </div>
	</div>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
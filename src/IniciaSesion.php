<?php
    // session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mail = $_POST['mail'];
        $pass = $_POST['contraseña'];
        $conexion = new mysqli('localhost','root','','aychihuahua');
        $consulta = "SELECT IdCliente FROM Clientes WHERE email = '$mail' AND contrasenia = '$pass'";
        $resultado = $conexion->query($consulta);
        if ($resultado->num_rows == 1) {
            $_SESSION['mail'] = "$mail";
            $_SESSION['id'] = $resultado->fetch_assoc()['IdCliente'];
            header('Location: catalogo.php');
        }
        else {
            echo "Usuario o contraseña no valido";
        }
        $conexion->close();
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
            <div class="col-xs-12">
                <form method="POST">
                    Email: <input type="text" name="mail"><br>
                    Contraseña: <input type="password" name="contraseña"><br>
                    <input type="submit">
                    <p>
                        ¿No estas registrado?
                    </p>
                    <a href='registro.php'>Registrate aquí</a>
                </form>
            </div>
        </div>
	</div>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usr = $_POST['usr'];
        $pass = $_POST['pass'];
        $conexion = new mysqli('localhost','root','','aychihuahua');
        $consulta = "SELECT * FROM Admins WHERE Usuario = '$usr' AND Contrasenia = '$pass'";
        $resultado = $conexion->query($consulta);
        if ($resultado->num_rows == 1) {
            $_SESSION['admin'] = True;
            header('Location: admin.php');
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
                    Usuario: <input type="text" name="usr"><br>
                    Contraseña: <input type="password" name="pass"><br>
                    <input type="submit">
                </form>
            </div>
        </div>
	</div>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
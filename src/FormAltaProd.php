<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $img = $_POST['img'];
        $qty = $_POST['qty'];
        $conexion = new mysqli('localhost','root','','aychihuahua');
        $conexion->query("INSERT INTO Productos (Nombre, Precio, Imagen, Existencias) VALUES ('$nombre', '$precio', '$img', $qty)");
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
                    Nombre: <input type="text" name="nombre"><br>
                    Precio: <input type="text" name="precio"><br>
                    Imágen: <input type="text" name="img"><br>
                    Existencias: <input type="text" name="qty"><br>
                    <input type="submit">
                </form>
                <a href="admin.php">Regresar</a>
            </div>
        </div>
	</div>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
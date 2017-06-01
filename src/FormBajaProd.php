<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $conexion = new mysqli('localhost','root','','aychihuahua');
        $conexion->query("DELETE FROM Productos WHERE IdProducto = $id");
        $conexion->query("DELETE FROM Pedidos WHERE IdProducto = $id");
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
                    Id del producto: <input type="text" name="id"><br>
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
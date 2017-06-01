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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
    session_start();

    $conexion = new mysqli("localhost","root","","aychihuahua");
    $query = "SELECT * FROM Pedidos WHERE IdCliente = {$_SESSION['id']}";
    $pedidos = $conexion->query($query);

    echo "<div class='container'>";
        echo "<div class='table-responsive'>";
            // Pedidos
            echo "<h3>Pedidos</h3>";
            echo "<table class='table'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Id Pedido</th>";
                        echo "<th>Producto</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    while ($ped = mysqli_fetch_assoc($pedidos)) {
                        echo "<tr>";
                            echo "<td>{$ped['IdPedido']}</td>";
                            $id = $ped['IdProducto'];
                            $query = "SELECT Nombre FROM Productos WHERE IdProducto = $id";
                            $pedido = $conexion->query($query);
                            $pedido = mysqli_fetch_assoc($pedido);
                            echo "<td>{$pedido['Nombre']}</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
        echo "</div>";
        echo '<a href="catalogo.php">Regresar</a>';
    echo "</div>";
?>
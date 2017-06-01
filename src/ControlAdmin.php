<?php
    $conexion = new mysqli("localhost","root","","aychihuahua");
    $query = "SELECT * FROM Clientes";
    $ctes = $conexion->query($query);
    $query = "SELECT * FROM Productos";
    $prods = $conexion->query($query);
    $query = "SELECT * FROM Pedidos";
    $peds = $conexion->query($query);

    echo "<div class='container'>";
        echo "<div class='table-responsive'>";
            // Clientes
            echo "<h3>Clientes</h3>";
            echo "<table class='table'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Id Cliente</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Apellidos</th>";
                        echo "<th>Dirección</th>";
                        echo "<th>E-mail</th>";
                        echo "<th>Teléfono</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    while ($cte = mysqli_fetch_assoc($ctes)) {
                        echo "<tr>";
                            echo "<td>{$cte['IdCliente']}</td>";
                            echo "<td>{$cte['Nombre']}</td>";
                            echo "<td>{$cte['Apellidos']}</td>";
                            echo "<td>{$cte['Direccion']}</td>";
                            echo "<td>{$cte['EMail']}</td>";
                            echo "<td>{$cte['Telefono']}</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
            // Productos
            echo "<h3>Productos</h3>";
            echo "<table class='table'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Id Producto</th>";
                        echo "<th>Nombre</th>";
                        echo "<th>Precio</th>";
                        echo "<th>Existencias</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    while ($prod = mysqli_fetch_assoc($prods)) {
                        echo "<tr>";
                            echo "<td>{$prod['IdProducto']}</td>";
                            echo "<td>{$prod['Nombre']}</td>";
                            echo "<td>{$prod['Precio']}</td>";
                            echo "<td>{$prod['Existencias']}</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
            echo "<a href='FormAltaProd.php'>Alta de productos</a>";
            // Pedidos
            echo "<h3>Pedidos</h3>";
            echo "<table class='table'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Id Pedido</th>";
                        echo "<th>Id Cliente</th>";
                        echo "<th>Id Producto</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    while ($ped = mysqli_fetch_assoc($peds)) {
                        echo "<tr>";
                            echo "<td>{$ped['IdPedido']}</td>";
                            echo "<td>{$ped['IdCliente']}</td>";
                            echo "<td>{$ped['IdProducto']}</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
            echo "</table>";
        echo "</div>";
    echo "</div>";
?>
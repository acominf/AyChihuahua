<?php
		// session_start();
		
		$query = "SELECT * FROM productos";
		$conexion = new mysqli("localhost","root","","aychihuahua");
		$ids = "Ids: ";
		if ($conexion->connect_error) {
	    	die($conexion->connect_error);
		} else {
			$res = $conexion->query($query);
			$nres = mysqli_num_rows($res);

			if ($nres == 0) {
				// Error
			} else {
				echo '<form method="POST">';
				echo '<div class="container">';
				echo '<a href="AdminCuentaCte.php" title="">Administrar mi cuenta</a>';
				echo '<div class="row top-buffer">';
				while ($producto = mysqli_fetch_assoc($res)) {
						echo "<div class='col-xs-18 col-sm-6 col-md-3 col-md-offset-1 col-lg-offset-0'>
							<div class='thumbnail'>
								<img src='./img/productos/{$producto['Imagen']}.jpg' alt=''>
									<div class='caption'>
										<h4>{$producto['Nombre']}</h4>
										<p>
										<b>Precio: </b>&#36;{$producto['Precio']}<br>
										<b>Existencias: </b>{$producto['Existencias']}
										</p>
										<p>
										<div class='checkbox'>
											<label><input type='checkbox' value='' name='{$producto['IdProducto']}'>Selecciona el producto</label>
										</div>
										</p>
									</div>
							</div>
						</div>
					";
				}
				echo '</div></div>';
				echo '<div class="container">';
				echo '<div class="row top-buffer">';
				echo '
					<input type="submit" value="Realizar pedido" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					</form>';
				echo '</div></div>';
				echo '<br>';
			}
		}

		if ($_POST) {
			$id = $_SESSION['id'];
			for ($i=1; $i <= $nres; $i++) {
				if (isset($_POST["$i"])) {
					$conexion->query("INSERT INTO Pedidos (IdCliente, IdProducto) VALUES ($id, $i)");
				}
			}
			// mail("Correo administrador", "Tienes un nuevo pedido", "Tienes un nuevo pedido del usuario con id" . "$id");
		}

		$res -> close();
		$conexion -> close();
	?>
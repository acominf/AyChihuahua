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
	</div>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
	session_start();
	if(isset($_SESSION['mail']))
		require_once ("GeneraCatalogo.php");
	else
		require_once("IniciaSesion.php");
?>
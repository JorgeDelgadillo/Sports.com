<?php
include("menu.php");
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/cssIndex.css">
		<title>Iniciar Sesion</title>
	</head>
	<body >
	<div class="feed">
		<div id="login" class="content-form">
			<div class="form">
				<form  action="validar.php" class="formulario" name="form_login" method="post">
					<div class="input">
						<input type="email" name="correo" id="correo">
						<label class="label" for="correo">Correo: </label>
					</div>
					<div class="input">
						<input type="password" name="contraseña" id="contraseña" >
						<label class="label" for="contraseña">Contraseña: </label>
					</div>

					<a href="registro.php" target="_blank">¿Aun no Tienes Cuenta?</a><br><br>
					<input type="submit" id="btnAceptar" value="Aceptar">
				</form>	
			</div>
			
		</div>
	</div>
		<script type="text/javascript" src="js/form.js"></script>
	</body>
</html>
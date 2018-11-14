<?php
include("menu.php");
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/cssIndex.css">
		<title>Registro</title>
		
	</head>
	<body>
	<div class="feed">
		<div class="content-form">
			<div class="form">
				<form action="guardarRegistro.php"  class="formulario" name="form-registro" method="post">
				<div class="input">
					<input type="text" name="nombre" id="nombre">
					<label class="label active" for="nombre">Nombre: </label>
				</div>
				<div class="input">
					<input type="text" name="apellido" id="apellido">
					<label class="label active" for="apellido">Apellidos: </label>
				</div>
				<div class="input">
					<input type="email" name="correo" id="correo">
					<label class="label active" for="correo">Correo: </label>
				</div>
				<div class="input">
					<input type="password" name="contraseña" id="contraseña">
					<label class="label active" for="contraseña">Contraseña: </label>
				</div>
				<div class="input">
					<input type="password" name="contraseña2" id="contraseña2">
					<label class="label active" for="contraseña2">Repetir Contraseña: </label>
				</div>
				<div class="input radio error">
					<input type="radio" name="sexo" id="hombre" value="H">
					<label class="label active" for="hombre">Hombre</label>
					<input type="radio" name="sexo" id="mujer" value="M">
					<label class="label active" for="mujer">Mujer</label>
				</div>

				<input type="submit" id="btnAceptar" value="Aceptar">

			</form>
			</div>
		</div>
	</div>
	</body>
</html>
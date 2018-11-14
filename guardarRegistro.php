<?php
include("conexionBD.php");

if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contraseña']) && isset($_POST['contraseña2']) && isset($_POST['sexo']) && isset($_POST['apellido'])){
	$query = "insert into usuario(nombre, apellidos, email, psw, tipo, sexo) values('".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['correo']."','".$_POST['contraseña']."',1,'".$_POST['sexo']."');";	
	$objeto->consulta($query);

	header("Location: ingresar.php"); 
}

?>
<?php
	include("/conexionBD.php");
	
	$query="insert into transmision(nombre, fecha, deporte, canal, id_autor, hora) values('".$_POST['nombre']."','".$_POST['fecha']."','".$_POST['deporte']."',".$_POST['canal'].",".$_SESSION['user'].",'".$_POST['tiempo']."');";
    $objeto->consulta($query);
    header("Location : transmisiones.php");
?>
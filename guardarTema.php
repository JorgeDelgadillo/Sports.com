<?php
	include("/conexionBD.php");
	
	$query="insert into foro(autor, titulo, mensaje, fecha) values('".$_SESSION['nombre']."','".$_POST['titulo']."','".$_POST['mensaje']."',CURDATE());";
    $objeto->consulta($query);

    header('Location :  foro/index.php');
?>
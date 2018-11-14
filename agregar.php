<?php
	include("/conexionBD.php");
	
	$query="insert into respuesta(id_forum, autor, mensaje) values(".$_GET['id'].",'".$_SESSION['nombre']."','".$_POST['mensaje']."');";
    $objeto->consulta($query);
    

    header('Location: /foro.php?id='.$_GET['id'].'');

?>
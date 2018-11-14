<?php
include("/conexionBD.php");

    $query="delete from respuesta where id_forum=".$_GET['id'].";";
    $objeto->consulta($query);

    $query2="delete from foro where ID=".$_GET['id'].";";
    $objeto->consulta($query2);

    header('Location : foro/index.php');


?>
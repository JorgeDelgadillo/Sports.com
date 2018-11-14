<?php
include("conexionBD.php");
 $query = "select * from usuario where id_usuario=".$_SESSION['user'].";";
        $objeto->consulta($query);
        $registro="";
        $objeto->a_numeRegistros;
        echo "<dr>";
        echo $objeto->a_numeRegistros;
        if($objeto->a_numeRegistros>0){
            $_SESSION['email']=$_POST['correo'];
            $registro=$objeto->a_traerRegistro();
            $_SESSION['nombre']=$registro['nombre']." ".$registro['apellidos'];
            $_SESSION['name']=$registro['nombre'];
            $_SESSION['apellidos']=$registro['apellidos'];
            
            header("Location: AccountAdmin.php");
           
        }
?>
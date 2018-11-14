<?php
include("conexionBD.php");  
if(isset($_POST['correo']) && isset($_POST['contraseña'])){
    if($_POST['correo']>"" && $_POST['contraseña']>""){
        $query = "select * from usuario where email='".$_POST['correo']."' and psw='".$_POST['contraseña']."';";
        $objeto->consulta($query);
        $registro="";
        $objeto->a_numeRegistros;
        echo "<dr>";
        echo $objeto->a_numeRegistros;
        if($objeto->a_numeRegistros>0){
            $_SESSION['email']=$_POST['correo'];
            $_SESSION['isAdmin']=false;
            $registro=$objeto->a_traerRegistro();
            $_SESSION['user']=$registro['id_usuario'];
            $_SESSION['type']=$registro['tipo'];
            $_SESSION['nombre']=$registro['nombre']." ".$registro['apellidos'];
            $_SESSION['name']=$registro['nombre'];
            $_SESSION['apellidos']=$registro['apellidos'];
            
            header("Location: index.php");
           
        }
        else{
            header("Location: ingresar.php?o=3");
            echo "o=3";
        }
    }else{
        header("Location: ingresar.php?o=2");
        echo "o=2";
    }
    
}else{
    header("Location: ingresar.php?o=1");
    echo "o=1";
}
?>
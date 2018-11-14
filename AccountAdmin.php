<?php
include("menu.php");
include("conexionBD.php");
    if (isset($_FILES['foto'])) {
        $ext = explode(".", $_FILES['foto']['name']);
        $ext = strtolower($ext[count($ext) - 1]);
        if (($ext == "jpg" || $ext == "jpeg") && $_FILES['foto']['size'] <= 2000000)
            move_uploaded_file($_FILES['foto']['tmp_name'],
                "Sports.com/fotos/" . $_SESSION['user'] . "." . $ext
            );
        else
            unlink($_FILES['foto']['tmp_name']);
    }

    if(isset($_POST['nombre'])){
        if($_POST['nombre']!=''){
            $query='update usuario set nombre="'.$_POST['nombre'].'" where id_usuario='.$_SESSION['user'].';';
            $objeto->consulta($query);
        }
        if($_POST['apellidos']!=''){
            $query='update usuario set apellidos="'.$_POST['apellidos'].'" where id_usuario='.$_SESSION['user'].';';
            $objeto->consulta($query);
        }
        if($_POST['email']!=''){
            $query='update usuario set email="'.$_POST['email'].'" where id_usuario='.$_SESSION['user'].';';
            $objeto->consulta($query);
        }
        if($_POST['pwd']!=''){
            $query='update usuario set psw="'.$_POST['pwd'].'" where id_usuario='.$_SESSION['user'].';';
            $objeto->consulta($query);
        }
        
        header("Location: update.php");
    }


?>

<html>

<!DOCTYPE html>
<html>
<head>
    <title>Administrar Cuenta</title>
</head>
<body>
    <div class="feed">
        <section>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 >Cambiar Imagen de Perfil</h3>
                    <?php
                        $img = is_file("fotos/" . $_SESSION['user'] . ".jpg") ?
                            "fotos/" . $_SESSION['user'] . ".jpg" : (
                            is_file("fotos/" . $_SESSION['user'] . ".jpeg") ?
                                "fotos/" . $_SESSION['user'] . ".jpeg" :
                                 "imagenes/user.jpg");


                        echo '<img src="'.$img.'" width="42px">';

                        echo '
                        <form method="post" enctype="multipart/form-data">
                            <input id="input-1a" type="file" class="file" name="foto"/>
                            <input type="submit" value="Cambiar foto"/>
                        </form>
                        ';
                    ?>
                </div>
            </div>
            
            <br><br><br>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 >Cambiar Datos Personales</h3>
                        <form action="AccountAdmin.php?o=2" method="post">
                        <div class="form-group">
                          <label for="email">Actualizar Nombre:</label>
                          <input type="text" class="form-control" id="nombre" placeholder="<?php echo $_SESSION['name']?>" name="nombre">
                        </div>
                        <div class="form-group">
                          <label for="email">Actualizar apellido:</label>
                          <input type="text" class="form-control" id="apellidos" placeholder="<?php echo $_SESSION['apellidos']?>" name="apellidos">
                        </div>
                        <div class="form-group">
                          <label for="email">Actualizar Email:</label>
                          <input type="email" class="form-control" id="email" placeholder="<?php echo $_SESSION['email']?>" name="email">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Actualizar Password:</label>
                          <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                    <input type="submit" class="btn btn-default" value="Aceptar">
                    </form>
                </div>
            </div>
            
        </section>
    </div>
</body>
</html>
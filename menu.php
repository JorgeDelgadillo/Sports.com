<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


    if (isset($_FILES['foto'])) {
        $ext = explode(".", $_FILES['foto']['name']);
        $ext = strtolower($ext[count($ext) - 1]);
        if (($ext == "jpg" || $ext == "jpeg" || $ext == "png") && $_FILES['foto']['size'] <= 200000000000000000)
            move_uploaded_file($_FILES['foto']['tmp_name'],
                "fotos/" . $_SESSION['user'] . "." . $ext
            );
        else
            unlink($_FILES['foto']['tmp_name']);
    }
?>
<header>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="/Sports.com/css/font.css">
	<link rel="stylesheet" type="text/css" href="/Sports.com/css/styles.css">
	<link rel="stylesheet" type="text/css" href="/Sports.com/css/styles_rss.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<div class="title-page">
		<a href="/Sports.com/index.php"><img src="/Sports.com/imagenes/logo.png"></a>		
	</div>

	<div class="menu_bar">
		<a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
	</div>
	<script src="/Sports.com/js/menu.js"></script>
    <div style="position:relative;" class="menup">
        <nav class="menu-fixed">
		<ul>
			<li><a href="/Sports.com/index.php" ><span class=" tag-a icon-home "></span>Inicio</a></li>
			<li><a href="/Sports.com/forum/index.php"><span class=" tag-a icon-users "></span>Foro</a></li>
			<li><a href="/Sports.com/transmisiones.php"><span class=" tag-a icon-podcast "></span>Transmisiones en Vivo</a></li>
			<?php 
			if(isset($_SESSION['type'])){
			?>
			<li style="float:right;"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php  
				$img = is_file("/fotos/" . $_SESSION['user'] . ".jpg") ?
                    "fotos/" . $_SESSION['user'] . ".jpg" : (
                    is_file("fotos/" . $_SESSION['user'] . ".jpeg") ?
                        "fotos/" . $_SESSION['user'] . ".jpeg" :
                         "imagenes/user.jpg");
			    echo '<img src="'.$img.'" width="42px">';
                echo $_SESSION['nombre'];
                ?>  
                <span class="caret"></span>
                </a>
                <ul style="position:absolute;" class="dropdown-menu sub-dropdown-menu">
                    <li><a href="/Sports.com/AccountAdmin.php" class="dr">Administrar Cuenta</a></li><br>
                    <li><a href="/Sports.com/CerrarSesion.php" class="dr">Cerrar Sesion</a></li>
                </ul>
            </li>
			<?php
			}
			else{
			?>
			<li style="float:right;"><a href="/Sports.com/ingresar.php"><span  class="glyphicon glyphicon-log-in"></span>Ingresar</a></li>
			<?php
			}
			?>
		</ul>
	</nav>
    </div>
	
</header>

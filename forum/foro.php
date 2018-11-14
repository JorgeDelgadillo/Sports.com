<?php
include("../menu.php");
include("../conexionBD.php");

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
?>
<head>
	<title>Jorge Sports</title>
</head>
<div class="feed">
	<section>

		<?php
            $query='select * from foro where ID='.$_GET['id'].';';
            $objeto->consulta($query);
            $tema=$objeto->a_traerRegistro();
        
        
        ?>
        <div class="container">
            <div class="row" style="width:80%;">
                <section class="panel panel-primary ">
                  <header class="panel-heading">
                    <h3><?php echo $tema['titulo'] ?></h3>
                  </header>
                    <section class="panel panel-info " >
                    <?php 
                        echo $tema['autor'];
                    ?>
                </section>
                  <section class="row panel-body">
                    <section class="col-md-6">
                      <h6><?php echo $tema['mensaje'] ?></h6>

                    </section>
                  </section>
                  <hr>
              </section>
          </div>
        </div>
        
        <?php 
            $query2='select * from respuesta where id_forum='.$_GET['id'].';';
            $objeto->consulta($query2);

                          
            while($row=$objeto->a_traerRegistro()){   
        ?>
        <div class="container">
            <div class="row" style="width:80%;">
                <section class="panel panel-primary ">
                    <section class="panel panel-info " >
                    <?php 
                        echo $row['autor'];
                    ?>
                </section>
                  <section class="row panel-body">
                    <section class="col-md-6">
                      <h6><?php echo $row['mensaje'] ?></h6>

                    </section>
                  </section>
                  <hr>
              </section>
          </div>
        </div>
        <?php
        }
        if(isset($_SESSION['user'])){
        ?>
        <div class="container">
            <div class="row" style="width:80%;">
                <section class="panel panel-primary ">
                  <form method="post" action="../agregar.php?id=<?php echo $_GET['id']?>">
                    <div class="form-group">
                      <label for="comment">Responder:</label>
                      <textarea name="mensaje" class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Aceptar">
                </form>
              </section>
          </div>
        </div>
        
        <?php
        }
        ?>
	</section>
    
	
</div>

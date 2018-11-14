<?php
include("../menu.php");
include("../conexionBD.php");
?>
<head>
	<title>Jorge Sports</title>
	
</head>
<div class="feed">
    <section>
        
        <?php
            $query='select * from foro order by fecha';
            $objeto->consulta($query);
            
        
        ?>
        <div class="container">
            <div class="row" style="width:80%;">
                <section class="panel panel-info">
                  <header class="panel-heading">
                    <h3>Foro</h3>
                  </header>
                <?php 
                    while($row=$objeto->a_traerRegistro()){   
                ?>
                  <section class="row panel-body">
                    <section class="col-md-6">
                      <h4> <a href="foro.php?id=<?php echo $row['ID']?>"><i class="glyphicon glyphicon-th-list"> </i><?php echo $row['titulo']; ?></a></h4> <hr>
                    </section>
                    <section class="col-md-3">
                      <a href="#"><i class="glyphicon glyphicon-user"></i> <?php echo $row['autor']; ?>  </a><br>
                      <a href="#"><i class="glyphicon glyphicon-calendar"></i> <?php echo $row['fecha']; ?> </a>
                    </section>
                      <?php 
                        if(isset($_SESSION['user'])){
                            if($_SESSION['user']==2){
                            
                        ?>
                    <section class="col-md-3">
                        <a href="../eliminar.php?id=<?php echo $row['ID']?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
                    </section>
                      <?php
                        }
                    }
                      ?>
                  </section>
                  <?php
                    }
                    if(isset($_SESSION['user'])){ 
                ?>
                    <a href="../NuevoTema.php"><button type="button" class="btn btn-success">Nuevo Tema</button></a>
                    <?php
                    }
                    ?>
              </section>

          </div>
        </div>
    </section>
</div>





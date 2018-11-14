<?php
include("menu.php");
include("conexionBD.php");
?>
<head>
	<title>Jorge Sports</title>

</head>

<div class="feed">
	<section>
	
		<?php

			$query = "select nombre as Evento, fecha as Fecha,hora as Hora, deporte as Deporte, canal as Canal from transmision;";
			$result = $objeto->consulta($query);
			echo $objeto->mostTabla(0,"",array(),"DDD","#B1B1B7",array("play"));

		?>
         <?php
                    if(isset($_SESSION['user'])){ 
                ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 >Nueva Transmision</h3>
                                <form action="nuevaTransmision.php" method="post">
                                    <div class="form-group">
                                      <label for="nombre">Evento: </label>
                                      <input type="text" class="form-control" name="nombre">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Deporte: </label>
                                        <input class="form-control"  name="deporte">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Fecha: </label>
                                        <input type="date" name="fecha">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Hora: </label>
                                        <input type="time" name="tiempo">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Canal: </label>
                                        <select name="canal">
                                            <option value="1">Canal 1</option>
                                            <option value="2">Canal 2</option>
                                            <option value="3">Canal 3</option>
                                            <option value="4">Canal 4</option>
                                        </select>
                                    </div>
                                <input type="submit" class="btn btn-default" value="Aceptar">
                                </form>
                        </div>
                    </div>
                    
                    <?php
                    }
                    ?>
		
	</section>
</div>


?>
<?php
include("/menu.php");
include("/conexionBD.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Tema</title>
</head>
<body>
    <div class="feed">
        <section>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 >Nuevo Tema</h3>
                        <form action="guardarTema.php" method="post">
                            <div class="form-group">
                              <label for="email">Titulo: </label>
                              <input type="text" class="form-control" name="titulo">
                            </div>
                            <div class="form-group">
                              <label for="email">Mensaje: </label>
                                <textarea class="form-control"  name="mensaje"></textarea>
                            </div>
                        <input type="submit" class="btn btn-default" value="Aceptar">
                        </form>
                </div>
            </div>
            
        </section>
    </div>
</body>
</html>
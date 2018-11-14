<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
class baseDatos{
 var $a_conexion;
 var $a_bloque;
 var $a_numeRegistros;
  function conexion(){
     $this->a_conexion=mysql_connect("localhost","admin","1234","sports");
     if ($this->a_conexion)
       mysql_select_db("sports",$this->a_conexion);
     else
     	exit;
  }
  function consulta($p_query){
      //echo "entro";
     $this->a_bloque=mysql_query($p_query) or die(mysql_error());  
     if (strpos($p_query,"select")!==false)
         $this->a_numeRegistros=mysql_num_rows($this->a_bloque);
      else
         $this->a_numeRegistros=mysql_affected_rows();
     //echo $a_numeRegistros;
  }
//  Parametros Mostrar Tabla
 function mostTabla($p_borde=1,
    $p_cabeceras="",
    $p_anchos=array(),
    $p_coloCabecera="#DDD",
    $p_coloRenglon="#DD0",
    $p_opciones=array(),
    $p_actualizar=0,
    $p_borrar=0,$p_nuevo=0){
    $resultado="";
    $renglones=mysql_num_rows($this->a_bloque);
    //if ($renglones>0)
    {$resultado.='<div id="div1" onmousedown="comienzoMovimiento(event, this.id); onMouseOver="this.style.cursor='."move".'"">'; 
     $resultado.='<table class="table" border="'.$p_borde.'" >';
       $resultado.='<tr style="background:'.$p_coloCabecera.'">';
       $numeColumnas=mysql_num_fields($this->a_bloque);
       if (count($p_anchos)==0)
         for($y=0; $y<$numeColumnas; $y++)
          $p_anchos[$y]=0;
       if ($p_cabeceras=="")
         for ($i=0; $i<$numeColumnas; $i++)
           { $campo=mysql_fetch_field($this->a_bloque,$i);
            if ($i==0 && in_array('nuevo',$p_opciones)!=0)
             $resultado.='<th width="'.$p_anchos[$i].'px" ><table><tr><td><form action="insertar.php" method="post" style="margin: 0;">
                        <input type="image" src="imagenes/icon_add.png" title="Nuevo registro" 
                            name="tabla" value="' . $campo->table . '" />
                    </form></td> <th>'.$campo->name."</th></tr></table></th>";
            else
             $resultado.='<th width="'.$p_anchos[$i].'px">'.$campo->name."</th>";
           }
        else
        { $cabe=explode(",",$p_cabeceras);
          for ($i=0; $i<$numeColumnas; $i++)
           { if ($i==0 && in_array('nuevo',$p_opciones)!=0)
               $resultado.='<th width="'.$p_anchos[$i].'px" ><table><tr><td><form action="insertar.php" method="post" style="margin: 0;">
                        <input type="image" src="imagenes/icon_add.png" title="Nuevo registro" 
                            name="tabla" value="' . $campo->table . '"/>
                    </form></td> <th>'.$cabe[$i]."</th></tr></table></th>";
           else
             $resultado.='<th width="'.$p_anchos[$i].'px" >'.$cabe[$i]."</th>";
           }
        }
        if(in_array('actualizar',$p_opciones)) $resultado.="<td>&nbsp;</td>";
        if(in_array('borrar',$p_opciones)) $resultado.="<td>&nbsp;</td>";
        if(in_array('jugar',$p_opciones)) $resultado.="<td>&nbsp;</td>";
       $resultado.="</tr>";
      for ($i=0; $i<$renglones; $i++)
      {
        $registro=mysql_fetch_array($this->a_bloque);
        if ($i%2==1)
          $resultado.='<tr style="background:'.$p_coloRenglon.'">';
        else $resultado.="<tr>";
        for ($j=0; $j< $numeColumnas; $j++)
         { $campo=mysql_fetch_field($this->a_bloque,$j);
           if ($campo->primary_key) $nombPK=$campo->canal;
          $resultado.="<td>".$registro[$j]."</td>";}
          if (in_array('play',$p_opciones)) $resultado.='<td>
            <form action="canales/canal-'.$registro['Canal'].'.php" method="post" target="_blank">
                <input type="image"class="glyphicon glyphicon-play" title = "Reproducir" />
                <input name="id" type="hidden" value='.$registro['Canal'].' />
            </form>
          </td>';
        $resultado.="</tr>";
      }
      $resultado.="</table></div>";
    } // No hay registros en la consulta
    return $resultado;
  }
  function cerrar(){
  	mysql_close($this->a_conexion);
  }
  function a_traerRegistro()
    {
        return mysql_fetch_array($this->a_bloque);
    }

} // fin de la clase
 $objeto = new baseDatos();
 $objeto->conexion();
 //$query="SELECT * FROM user;";
 //$objeto->consulta($query);
 //$objeto->mostTabla();
 
?>
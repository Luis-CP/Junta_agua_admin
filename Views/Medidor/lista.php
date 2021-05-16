<?php
  include 'conexion.php';
  if(isset($_GET['id'])){
      $consulta=ConsultarAdmin($_GET['id']);

      $resultado='';
      $resultado.='<form action="controlador.php" method="POST" name="form">';
      $resultado.='<input class="form-control" type="hidden" name="ver" value="modificar">';
      $resultado.='<input class="form-control" type="hidden" name="id" value="'.$_GET['id'].'">';

      $resultado.='<div class="form-group row">';
      $resultado.='<label for="inputPassword3" class="col-sm-4 col-form-label">Número:</label>';
      $resultado.='<div class="col-sm-10">';
      $resultado.='<input class="form-control" type="text" name="numero" value="'.$consulta[1].'" required maxlength="10" onkeypress="return validar_numeros(event)" >';
      $resultado.='</div>';
      $resultado.='</div>';

      $resultado.='<div class="form-group row">';
      $resultado.='<label for="inputPassword3" class="col-sm-4 col-form-label">Dirección:</label>';
      $resultado.='<div class="col-sm-10">';
      $resultado.='<input class="form-control text-uppercase" type="text" id="addressUpdateM" name="direccion" value="'.$consulta[2].'" required  onkeypress="return validar_caracteres(event)" onblur="aMayusculas(this.value,this.id)">';
      $resultado.='</div>';
      $resultado.='</div>';

      $resultado.='<div class="form-group row">';
      $resultado.='<label for="inputPassword3" class="col-sm-4 col-form-label">Socio:</label>';
      $resultado.='<div class="col-sm-10">';
      $resultado.='<select class="form-control" name="socio" required>';
      $sentencia = "SELECT * FROM socio";
      $query = mysql_query($sentencia);  
      while ($row=mysql_fetch_assoc($query))
        {
          if($row['id_socio']==$consulta[3]){
            $resultado.='<option value="'.$row['id_socio'].'" selected>'.$row['nombre_socio'].'</option>';
          }else{
            $resultado.='<option value="'.$row['id_socio'].'">'.$row['nombre_socio'].'</option>';
          }            
        }
      $resultado.='</select>';
      $resultado.='</div>';
      $resultado.='</div>';


      $resultado.='<div class="form-group row" align="right">';
      $resultado.='<div class="col-sm-10">';
      $resultado.='<input  class="btn btn-success" type="submit" name="submit" value="Guardar"/>';
      $resultado.='</div>';
      $resultado.='</div>';

      $resultado.='</form>';

      exit($resultado);
  }
  function ConsultarAdmin($id)
  {
    $sentencia="SELECT * FROM medidor WHERE id_medidor='".$id."' ";
    $resultado=mysql_query($sentencia) or die (mysql_error());
    $filas=mysql_fetch_assoc($resultado);
    return [
      $filas['id_medidor'],
      $filas['numero_medidor'],
      $filas['direccion_medidor'],
      $filas['id_socio']
    ];
  }
?>
<?php
include("Inicio.php");
if(isset($_GET['state']))
    $state = $_GET['state'];
else
    $state = '';
?>

    <input type="hidden" id="message" value="<?php echo($state)?>">
<br><br>
<section>
  <a class="btn btn-primary" style="margin-left: 20px;" href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-paper-plane" aria-hidden="true"></i> Crear</a>
      <table class="table">      
        <thead>
          <tr>
            <td align="center" style="font-family: cursive;">Id</td>
            <td align="center" style="font-family: cursive;">Número</td>
            <td align="center" style="font-family: cursive;">Dirección</td>
            
            <td align="center" style="font-family: cursive;">Socio</td>
            <td align="center" style="font-family: cursive;">Editar</td>
            <!--<td align="center" style="font-family: cursive;">Eliminar</td>-->
          </tr>
        </thead>
        <tbody>
          <?php
            include "conexion.php";   
            $sentencia = "SELECT * FROM medidor";
            $query = mysqli_query($conexion,$sentencia);  
            while ($row=mysqli_fetch_assoc($query))
              {?>
              <tr>
                <td align="center"><?php echo $row['id_medidor'];?></td>
                <td align="center"><?php echo $row['numero_medidor'];?></td>
                <td align="center"><?php echo $row['direccion_medidor'];?></td>
                <?php 
                $sentencia1 = "SELECT * FROM socio";
                $query1 = mysqli_query($conexion,$sentencia1);  
                while ($row1=mysqli_fetch_assoc($query1))
                  {
                    if($row1['id_socio']==$row['id_socio']){?>
                        <td align="center"><?php echo $row1['nombre_socio'];?></td>
                <?php }            
                  }
                ?>
                <td align="center">
                  <a class="btn btn-success" href="#" onclick="javascript:update(<?php echo $row['id_medidor'];?>);" data-toggle="modal" data-target="#myModal1"><i class="fa fa-paint-brush" aria-hidden="true"></i></a>
                </td>
                  <!--
                <td align="center">
                  <a class="btn btn-danger" href="controlador.php?eliminar=true&id=<?php // echo $row['id_socio'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>-->
              </tr>
          <?php
            }?>
        </tbody>
      </table>
</section>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nuevo</h4>
      </div>
      <div class="modal-body">
        <div style="margin-left: 70px;">
        <form action="controlador.php" method="POST" name="form">
              
              <input class="form-control" type="hidden" name="ver" value="crear">

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Número de medidor:</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="numero" required
                         onkeypress="return validar_numeros(event)" maxlength="10">
                </div>
              </div>

              <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-4 col-form-label"><Font color='red'>Dirección:</Font> <br>Calle Principal:</label>
                <div class="col-sm-10">
                  <input class="form-control text-uppercase" id="addressCreateM" type="text" name="direccion" required
                         onkeypress="return validar_caracteres(event)"
                         onblur="aMayusculas(this.value,this.id)">
                </div>
              </div>

            
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Socio:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="socio" required>
                  <?php
                    include "conexion.php";   
                    $sentencia = "SELECT * FROM socio";
                    $query = mysql_query($sentencia);  
                    while ($row=mysql_fetch_assoc($query))
                      {?>
                        <option value="<?php echo $row['id_socio']; ?>"><?php echo $row['nombre_socio']; ?> <?php echo $row['apellido_socio']; ?></option>
                    <?php }
                    ?>  
                  </select>
                </div>
              </div>

              <div class="form-group row" align="right">
                <div class="col-sm-10">
                <input  class="btn btn-warning" type="submit" name="submit" value="Guardar"/>
                </div>
              </div>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--UPDATE-->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualizar</h4>
      </div>
      <div class="modal-body">
        <div id="update_data" style="margin-left: 70px;">
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--FIN-->
<script type="text/javascript">
  function update(id){
    $.ajax({
        url:'lista.php?id='+id+'',
        success:function(data){
          $("#update_data").html(' ');
          $("#update_data").html(data);
        }
      })
  }
</script>
<?php include("Fin.php");?>
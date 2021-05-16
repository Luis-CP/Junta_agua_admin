<?php
  include 'conexion.php';
  if(isset($_GET['id'])){
      $consulta=ConsultarAdmin($_GET['id']);

      $resultado='';
      $resultado.='<form action="controlador.php" method="POST" name="form">';
      $resultado.='<input class="form-control" type="hidden" name="ver" value="modificar">';
      $resultado.='<input class="form-control" type="hidden" name="id" value="'.$_GET['id'].'">';

      $resultado.='<div class="form-group row">';
      $resultado.='<label for="inputPassword3" class="col-sm-4 col-form-label">Nombre:</label>';
      $resultado.='<div class="col-sm-10">';
      $resultado.='<input class="form-control text-uppercase" type="text" id="nameUpdate"  name="nombre" value="'.$consulta[1].'" required  onkeypress="return validar_letras(event)" onblur="aMayusculas(this.value,this.id)">';
      $resultado.='</div>';
      $resultado.='</div>';

      $resultado.='<div class="form-group row">';
      $resultado.='<label for="inputPassword3" class="col-sm-4 col-form-label">Apellido:</label>';
      $resultado.='<div class="col-sm-10">';
      $resultado.='<input class="form-control text-uppercase" type="text" id="lastNameUpdate" name="apellido" value="'.$consulta[2].'" required onkeypress="return validar_letras(event)" onblur="aMayusculas(this.value,this.id)">';
      $resultado.='</div>';
      $resultado.='</div>';

      $resultado.='<div class="form-group row">';
      $resultado.='<label for="inputPassword3" class="col-sm-4 col-form-label">Cedula:</label>';
      $resultado.='<div class="col-sm-10">';
      $resultado.='<input class="form-control" type="text" name="cedula" value="'.$consulta[3].'" required  onkeypress="return validar_numeros(event)" maxlength="10" minlength="10">';
      $resultado.='</div>';
      $resultado.='</div>';

      $resultado.='<div class="form-group row">';
      $resultado.='<label for="inputPassword3" class="col-sm-4 col-form-label">Dirreción:</label>';
      $resultado.='<div class="col-sm-10">';
      $resultado.='<input class="form-control text-uppercase" type="text" id="addressUpdate" name="direccion" value="'.$consulta[4].'" required onkeypress="return validar_caracteres(event)" onblur="aMayusculas(this.value,this.id)">';
      $resultado.='</div>';
      $resultado.='</div>';

      
      $resultado.='<div class="form-group row" align="right">';
      $resultado.='<div class="col-sm-10">';
      $resultado.='<input  class="btn btn-success" type="submit" id="btnUpdate" name="submit" value="Guardar"/>';
      $resultado.='</div>';
      $resultado.='</div>';

      $resultado.='</form>';

      exit($resultado);
  }
  function ConsultarAdmin($id)
  {
    $sentencia="SELECT * FROM socio WHERE id_socio='".$id."' ";
    $resultado=mysql_query($sentencia) or die (mysql_error());
    $filas=mysql_fetch_assoc($resultado);
    return [
      $filas['id_socio'],
      $filas['nombre_socio'],
      $filas['apellido_socio'],
      $filas['cedula_socio'],
      $filas['direccion_socio'],
      
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
            <td align="center" style="font-family: cursive;">Nombre</td>
            <td align="center" style="font-family: cursive;">Apellido</td>
            <td align="center" style="font-family: cursive;">Cédula</td>
            <td align="center" style="font-family: cursive;">Dirección</td>
            
            <td align="center" style="font-family: cursive;">Editar</td>
              <!-- <td align="center" style="font-family: cursive;">Eliminar</td> -->
          </tr>
        </thead>
        <tbody>
          <?php
            include "conexion.php";   
            $sentencia = "SELECT * FROM socio";
            $query = mysqli_query($conexion,$sentencia);
            while ($row=mysqli_fetch_assoc($query))
              {?>
              <tr>
                <td align="center"><?php echo $row['id_socio'];?></td>
                <td align="center"><?php echo $row['nombre_socio'];?></td>
                <td align="center"><?php echo $row['apellido_socio'];?></td>
                <td align="center"><?php echo $row['cedula_socio'];?></td>
                <td align="center"><?php echo $row['direccion_socio'];?></td>
                
                <td align="center">
                  <a class="btn btn-success" href="#" onclick="javascript:update(<?php echo $row['id_socio'];?>);" data-toggle="modal" data-target="#myModal1"><i class="fa fa-paint-brush" aria-hidden="true"></i></a>
                </td>
                  <!--
                <td align="center">
                  <a class="btn btn-danger" href="controlador.php?eliminar=true&id=<?php // echo $row['id_socio'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
                  -->
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
                <label for="inputPassword3" class="col-sm-4 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                  <input class="form-control text-uppercase" type="text" id="nameCreate" name="nombre" required
                         onkeypress="return validar_letras(event)"
                         onblur="aMayusculas(this.value,this.id)">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Apellido:</label>
                <div class="col-sm-10">
                  <input class="form-control text-uppercase" type="text" id="lastNameCreate" name="apellido" required
                         onkeypress="return validar_letras(event)"
                         onblur="aMayusculas(this.value,this.id)">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Cédula:</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="cedula" required
                         onkeypress="return validar_numeros(event)" maxlength="10" minlength="10">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Dirección:</label>
                <div class="col-sm-10">
                  <input class="form-control text-uppercase" type="text" id="addressCreate" name="direccion" required
                         onkeypress="return validar_caracteres(event)" onblur="aMayusculas(this.value,this.id)">
                </div>
              </div>



              <div class="form-group row" align="right">
                <div class="col-sm-10">
                <input  class="btn btn-success" type="submit" name="submit" value="Registrar"/>
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
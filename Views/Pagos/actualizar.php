<?php include("Inicio.php");?>
<?php
  include 'conexion.php';

  $consulta=ConsultarTrabajador($_GET['id_pago']);
  
  function ConsultarTrabajador($id)
  {
    $sentencia="SELECT * FROM pago WHERE id_pago='".$id."' ";
    $resultado=mysql_query($sentencia) or die (mysql_error());
    $filas=mysql_fetch_assoc($resultado);
    return [
      $filas['fecha_pago'],
      $filas['id_socio'],
      $filas['id_pago']
    ];

  }
?>
<style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    color: #ffffff;
    background-color: red;
    border-radius: 6px;
    border: 2px solid white;
  }
  .boton_personalizado:hover{
    color: #1883ba;
    background-color: #ffffff;
  }
</style>
<form method="post" action="controlador2.php">
        <table class="table">
          <tr>
            <td width="20"  style=" font-size: 25px;margin: auto;">Fecha : <input type="hidden" name="fecha" value="<?php echo $consulta[0];?>"><?php echo $consulta[0];?></td>
          </tr>
            <tr>
                <td width="45" style=" font-size: 25px;margin: auto;">Socio :  
                    <?php
                      $sql = "SELECT * FROM socio";
                      $query = mysql_query($sql);  
                      while ($row=mysql_fetch_array($query))
                        {
                        if($row['id_socio']==$consulta[1]){  
                        ?>
                        <input type="hidden" name="socio" value="<?php echo $row['id_socio'];?>">
                        <?php echo $row['nombre_socio'];?> <?php echo $row['apellido_socio'];?>
                        <?php 
                         } ?>
                    <?php
                        }?>
                </td>
            </tr>
        </table>
          <hr>
        <table class="table">
            <tr>
                <td>Fecha</td>
                <td>Medidor</td>
                <td>Consumo</td>
                <td>Acción</td>
            </tr>
            <tr>
              <th  style="width: 100px;"><input type="date" id="fecha" class="form-control" /></th> 
                <th>
                    <select id="medidor" name="medidor" class="form-control" style="height: 46px;">
                    <?php
                      $sql = "SELECT * FROM medidor";
                      $query = mysql_query($sql);  
                      while ($row=mysql_fetch_array($query))
                        {
                        ?>
                        <option value="<?php echo $row['id_medidor'];?>"><?php echo $row['numero_medidor'];?></option>
                    <?php
                        }?>
                    </select>
                </th>
                <th><input placeholder="Consumo" type="text" name="consumo" id="consumo" class="form-control" /></th>               
                <th><input class="btn btn-warning" type="button" id="anadir" name="anadir" value="Añadir" style="margin-top: 0px;height: 46px;"></th>
            </tr>
        </table>
          <hr>
        <table class="table">
        <thead>
            <tr>
                <td>Fecha</td>
                <td>Medidor</td>
                <td>Consumo</td>
                <td>Acción</td>
            </tr>
        </thead>
        <tbody id="itemlist">
          <?php 
        $sql1 = "SELECT * FROM detalle_pago where id_pago='".$consulta[2]."'";
        $query1 = mysql_query($sql1);  
        while ($row1=mysql_fetch_array($query1))
          {
        ?>
        <tr>
        <td><input type='hidden' name="item[fecha][]" value="<?php echo $row1['fecha_detalle']; ?>"><?php echo $row1['fecha_detalle']; ?></td>
        <?php 
        $sql2 = "SELECT * FROM medidor where id_medidor='".$row1['id_medidor']."'";
        $query2 = mysql_query($sql2);  
        while ($row2=mysql_fetch_array($query2))
          {
        ?>
        <td><input type='hidden' name="item[medidor][]" value="<?php echo $row2['id_medidor']; ?>"><?php echo $row2['numero_medidor']; ?></td>
       <?php 
       }?>
       <td><input type='hidden' name="item[consumo][]" value="<?php echo $row1['consumo_detalle']; ?>"><?php echo $row1['consumo_detalle']; ?></td>
       <td width="20"><input type="button" id="borrar" name="borrar" value="Eliminar" class="boton_personalizado" ></td>
       </tr>
       <?php 
       }?>
        </tbody>
        </table>
        <input type="hidden" name="id_pago" value="<?php echo $consulta[2];?>">
        <input type="submit" style="float: left;margin-left: 1100px;" class="btn btn-info" value="Guardar">
</form> 

<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
  <script type="text/javascript">
  $("tbody#itemlist").on("click","#borrar",function(){
      $(this).parent().parent().remove();
  });

    function clear (){
        $("#fecha").val("");
        $("#medidor").val("");
        $("#consumo").val("");
    }

    $('#anadir').on('click', function(e) {
      e.preventDefault();
    var medidor = $("#medidor").val();
    var consumo = $("#consumo").val();
    var fecha = $("#fecha").val();
    var numeroMe;
    var contador=0;
    if(contador==0){
        <?php
            $sql = "SELECT * FROM medidor";
            $query = mysql_query($sql);  
            while ($row=mysql_fetch_array($query))
            {?>   
        var id_medidor='<?php echo $row['id_medidor'];?>';
        if(id_medidor==medidor){
            numeroMe='<?php echo $row['numero_medidor'];?>';
        }                
        <?php
        }?>
        var items = "";
        items += "<tr>";
        items += "<td><input type='hidden' name='item[fecha][]' value='"+ fecha +"'>"+fecha+"</td>";
        items += "<td><input type='hidden' name='item[medidor][]' value='"+ medidor +"'>"+numeroMe+"</td>";
        items += "<td><input type='hidden' name='item[consumo][]' value='"+ consumo +"'>"+consumo+"</td>";
        items += "<td width='20'><input type='button' id='borrar' name='borrar' value='Eliminar' class='boton_personalizado'></td>";
        items += "</tr>";

        if ($("tbody#itemlist tr").length == 0)
        {
            $("#itemlist").append(items);
            clear();
        }else{
                $("#itemlist").append(items);
                clear();
                return false;
        }
      }
    });
</script>
<?php include("Fin.php");?>
    
<?php
  if (isset($_POST['filtro'])) {   
    $connection = new mysqli('localhost', 'root', '', 'pago_agua'); 
    $response="";
    $ver='';
    if (isset($_POST['filtro'])) {
    $ver="( nombre_socio like '%".$_POST['filtro']."%' or apellido_socio like '%".$_POST['filtro']."%' or cedula_socio like '%".$_POST['filtro']."%')";
    }
    $sql = $connection->query("SELECT * FROM socio where ".$ver);
    if ($sql->num_rows > 0) {
      while ($data = $sql->fetch_array()){
      $response .= "<li class='lista' id='".$data['id_socio']."'>".$data['nombre_socio']." ".$data['apellido_socio']."</li>";
      }
    }
    exit($response);
  }
  if (isset($_POST['socio'])) {   
    $connection = new mysqli('localhost', 'root', '', 'pago_agua'); 
    $response="";
    $sql = $connection->query("SELECT * FROM medidor where id_socio='".$_POST['socio']."'");
    if ($sql->num_rows > 0) {
      while ($data = $sql->fetch_array()){
      $response .= "<option value='".$data['id_medidor']."'>".$data['numero_medidor']."</option>";
      }
    }
    exit($response);
  }
?>
<?php include("Inicio.php");?>
<style type="text/css">
.lista{
    list-style: none;
    width: 100%;
    height: 30px;
    text-align: center;
  }
.lista:hover{
    color: white;
    background: #58ACFA;
    cursor:context-menu;
    width: 100%;
    height: 30px;
    text-align: center;
  }
#response{
    float: left;
    width: 254px;
    overflow-y:auto;
    background-color: white; 
    z-index: 35;
    position: absolute;
  }
</style>
<script type="text/javascript">
    function buscar_cliente() {
        var op = $("#searchBox").val();
        if (op.length>2) {
            $.ajax({
                url: 'crear.php',
                type: 'POST',
                data: {
                    filtro: op,
                    },
                success: function (data) {
                    $("#response").html('');
                    $("#response").append(data);
                    document.getElementById("response").style.border="1px solid rgb(101, 211, 227)";
                }
            })
        }else{
            document.getElementById("response").style.border="0px";
            $("#response").html('');
        }
    }
</script>
<form method="post" action="controlador.php">
  <input class="form-control" type="hidden" name="ver" value="crear">
        <table class="table">
            <tr>
                <td width="20"  style=" font-size: 25px;margin: auto;">Socios:</td>
                <td>
                    <div style="float: left;">
                        <input id="searchBox" type="text" class="form-control" placeholder="Buscar" style="float: left;margin-left: 46px;" onkeyup="buscar_cliente();">
                        <input type="hidden" id="socio" name="socio">
                        <div id="response" style="margin-top: 50px;margin-left: 46px;"></div>
                    </div>
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
              <th  style="width: 150px;"><input type="text" name="fecha" id="fecha" class="form-control" value="<?php echo date("Y-m-d");?>" readonly /></th> 
                <th>
                    <select id="medidor" name="medidor" class="form-control" style="height: 46px;">
                    </select>
                </th>
                <th><input placeholder="Consumo" type="text" name="consumo" id="consumo" class="form-control" /></th>               
                <th><input class="btn btn-warning" type="button" id="anadir" name="anadir" value="Añadir" style="margin-top: 0px;height: 46px;"></th>
            </tr>
        </table>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Medidor</th>
                <th>Consumo</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="itemlist"></tbody>
        </table>
        <input type="submit" style="float: left;margin-left: 1100px;" class="btn btn-info" value="Guardar">
</form>      

<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
  <script type="text/javascript">
  $("tbody#itemlist").on("click","#borrar",function(){
      $(this).parent().parent().remove();
  });

    function clear (){
        $("#medidor").val("");
        $("#consumo").val("");
    }

    $('#anadir').on('click', function(e) {
      e.preventDefault();
    var medidor = $("#medidor").val();
    var consumo = $("#consumo").val();
    var fecha = $("#fecha").val();
    var numeroMe;
    <?php
    include 'conexion.php';
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
        items += "<td width='20'><input type='button' id='borrar' name='borrar' value='Eliminar' class='btn btn-danger'></td>";
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
    });
</script>
<?php include("Fin.php");?>
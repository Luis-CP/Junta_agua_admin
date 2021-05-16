<?php include("Inicio.php"); ?>
<br>
<h1 align="center">Consultar Cartola</h1><br>
<section>
  <!--********************** Mes año actual ***********************-->
  <?php 
        date_default_timezone_set('America/Guayaquil');
        $zonahoraria = date_default_timezone_get();
       
        $mesActual = date("m");
        $anioActual = date("Y");
      
        if($mesActual==1){
          $mesActual='enero';
        }
        if($mesActual==2){
          $mesActual='febrero';
        }
        if($mesActual==3){
          $mesActual='marzo';
        }
        if($mesActual==4){
          $mesActual='abril';
        }
        if($mesActual==5){
          $mesActual='mayo';
        }
        if($mesActual==6){
          $mesActual='junio';
        }
        if($mesActual==7){
          $mesActual='julio';
        }
        if($mesActual==8){
          $mesActual='agosto';
        }
        if($mesActual==9){
          $mesActual='septiembre';
        }
        if($mesActual==10){
          $mesActual='octubre';
        }
        if($mesActual==11){
          $mesActual='noviembre';
        }
        if($mesActual==12){
          $mesActual='diciembre';
        }
?>
  <!--********************** Fin mes año actual ***********************-->

  <!--********************** Buscador ***********************-->
  <form action="crear.php" method="POST">
    <table class="table table-striped table-hove">
      <thead>
        <tr>
          <td align="center" > Mes</td>
          <td align="center">Año</td>
          <td align="center">Acción</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td align="center"><select class="form-control" name="mes" id="mes" onchange="javascript:Seleccionar();">
              <option value="enero">Enero</option>
              <option value="febrero">Febrero</option>
              <option value="marzo">Marzo</option>
              <option value="abril">Abril</option>
              <option value="mayo">Mayo</option>
              <option value="junio">Junio</option>
              <option value="julio">Julio</option>
              <option value="agosto">Agosto</option>
              <option value="septiembre">Septiembre</option>
              <option value="octubre">Octubre</option>
              <option value="noviembre">Noviembre</option>
              <option value="diciembre">Diciembre</option>
            </select></td>
            <td><select class="form-control" name="anio" id="anio">
              <option value="<?php echo date("Y");?>" selected><?php echo date("Y");?></option>
            </select></td>
            <td align="center"><button class="btn btn-success"> Consultar</button></td>
        </tr>
      </tbody>
    </table>
  </form>
   <!--********************** Fin Buscador ***********************-->
  <?php
  if(!empty($_POST['mes']) && !empty($_POST['anio'])){
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    include 'conection.php';
      $listarCartola = "SELECT c.id, c.numero, c.direccion, c.socio, c.costo, c.mes, c.anio,
                    s.id_socio, CONCAT( s.nombre_socio, ' ',s.apellido_socio) AS nombre_completo, s.cedula_socio
                    FROM cartola c 
                    INNER JOIN socio s ON c.socio = s.id_socio WHERE mes = '$mes' AND anio=$anio";

      $query = mysqli_query($concection, $listarCartola);
      $numrows= mysqli_num_rows($query);
      if ($numrows>0){
        echo "<h4 align='center' style='color:green'>Cartola del mes de ".$mes." del ".$anio." generada</h4>";
    ?>
    <table class="table table-striped table-hove" id="myTable">
    <thead>
      <tr>
        <td align="center">N</td>
        <td align="center">Nombre</td>
        <td align="center">Cédula</td>
        <td align="center">Dirección</td>
        <td align="center">nMedidor</td>
        <td align="center">Mes</td>
        <td align="center">Consumo</td>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
          <td align='center'><?php echo $row['id']; ?></td>
          <td align='center'><?php echo $row['nombre_completo']; ?></td>
          <td align='center'><?php echo $row['cedula_socio']; ?></td>
          <td align='center'><?php echo $row['direccion']; ?></td>
          <td align="center"><?php echo $row['numero']; ?></td>
          <td align="center"><?php echo $row['mes']; ?></td>
          <td align="center">
          <?php echo $row['costo']; ?>
          </td>
        </tr>
      <?php
      }
      echo "<input style='display: none;' type='text' id='contador' value='1'>";
    }else{
      echo "<h4 align='center' style='color:red'>Genere la cortola del mes de ".$mes." del ".$anio.".</h4>";
      echo "<input style='display: none;' type='text' id='contador' value='0'>";
    }
      ?>
    </tbody>
  </table>
    <?php
  }?>

   <!--********************** Fecha actual ***********************-->
  <?php
  
  
  ?>
  <form action="controlador.php" method="POST" id="ver_cartola" style="display: block;">
    <div class="container">
    <div class="row">
      <div class="col-12">
        
        <?php 
        date_default_timezone_set('America/Guayaquil');
        $zonahoraria = date_default_timezone_get();
       
        $mesActual = date("m");
        $anioActual = date("Y");
      
        if($mesActual==1){
          $mesActual='enero';
        }
        if($mesActual==2){
          $mesActual='febrero';
        }
        if($mesActual==3){
          $mesActual='marzo';
        }
        if($mesActual==4){
          $mesActual='abril';
        }
        if($mesActual==5){
          $mesActual='mayo';
        }
        if($mesActual==6){
          $mesActual='junio';
        }
        if($mesActual==7){
          $mesActual='julio';
        }
        if($mesActual==8){
          $mesActual='agosto';
        }
        if($mesActual==9){
          $mesActual='septiembre';
        }
        if($mesActual==10){
          $mesActual='octubre';
        }
        if($mesActual==11){
          $mesActual='noviembre';
        }
        if($mesActual==12){
          $mesActual='diciembre';
        }

        echo "<h2 align='center'>Generar Cartola </h2>";
        ?>
        <input type="hidden" name="mes" id="js_mes">
        <input type="hidden" name="anio" value="<?php echo date("Y");?>" readonly>

          <?php include 'conection.php';
                $mes = "SELECT id, CONCAT (mes, ' ',anio) AS fecha_completa FROM cartola ORDER by id DESC LIMIT 1";
                $query = mysqli_query($concection,$mes);
                while($mMostrar = mysqli_fetch_array($query)){
                    $verMes = $mMostrar['fecha_completa'];
                }  
          ?>
      </div>
    </div>
    </div>
    <table class="table table-striped table-hove">
      <thead>
        <tr>
        <td align="center" style="font-family: cursive;">N</td>
          <td align="center" style="font-family: cursive;">Nombre</td>
          <td align="center" style="font-family: cursive;">Cédula</td>
          <td align="center" style="font-family: cursive;">Dirección</td>
          <td align="center" style="font-family: cursive;">N.Medidor</td>
          <td align="center" style="font-family: cursive;">Dirección</td>
          <td align="center" style="font-family: cursive;">Lectura m^3</td>
        </tr>
      </thead>
      <tbody>
        <?php
        include "conection.php";
        
        date_default_timezone_set('America/Guayaquil');
        $zonahoraria = date_default_timezone_get();
       
        $mesActual = date("m");
        $anioActual = date("Y");
      
        if($mesActual==1){
          $mesActual='enero';
        }
        if($mesActual==2){
          $mesActual='febrero';
        }
        if($mesActual==3){
          $mesActual='marzo';
        }
        if($mesActual==4){
          $mesActual='abril';
        }
        if($mesActual==5){
          $mesActual='mayo';
        }
        if($mesActual==6){
          $mesActual='junio';
        }
        if($mesActual==7){
          $mesActual='julio';
        }
        if($mesActual==8){
          $mesActual='agosto';
        }
        if($mesActual==9){
          $mesActual='septiembre';
        }
        if($mesActual==10){
          $mesActual='octubre';
        }
        if($mesActual==11){
          $mesActual='noviembre';
        }
        if($mesActual==12){
          $mesActual='diciembre';
        }

        $lastMes = "SELECT mes,id FROM cartola ORDER by id DESC LIMIT 1";
        $lastM = mysqli_query($concection, $lastMes);

        while ($resM = mysqli_fetch_array($lastM)) {
          $varLastM = $resM['mes'];
        }

     
          $sentencia = "SELECT m.id_medidor, m.numero_medidor, m.direccion_medidor, m.id_socio,
                          s.id_socio, s.nombre_socio,CONCAT (s.nombre_socio, ' ',s.apellido_socio) AS nombre_completo, s.cedula_socio, s.direccion_socio
                          FROM medidor m
                          INNER JOIN socio s ON m.id_socio=s.id_socio ";
        $query = mysqli_query($concection, $sentencia);
        
        while ($row = mysqli_fetch_assoc($query)) { ?>
          <tr>
            <td ><input type="text" readonly class="form-control" name="id[]" value="<?php echo $row['id_socio']; ?>" required></td>
            <td align="center" name="<?php echo $row['nombre_socio']; ?>"><?php echo $row['nombre_completo']; ?></td>
            <td align="center"><?php echo $row['cedula_socio']; ?></td>
            <td align="center"><?php echo $row['direccion_socio']; ?></td>
            <td align="center"><input type="text" readonly class="form-control" name="numMedidor[]" value="<?php echo $row['numero_medidor']; ?>" required></td>
            <td align="center"><?php echo $row['direccion_medidor']; ?></td>
            <td align="center"><input type="text" name="monto[]" id="monto<?php echo $row['numero_medidor']; ?>" class="form-control"  required onkeypress="return validar_numeros(event)" onblur="validator(this.value,this.id);"></td>
          </tr>
        <?php
        } 
        ?>
      </tbody>
    </table>
    <button type="submit" id="btnCreateCartola" class="btn btn-success">Guardar</button>
  </form>

   <!--********************** Buscador ***********************-->
</section>
<script type="text/javascript">
  function Seleccionar(){
    var op = $('#mes').val();
    $('#js_mes').val(op);
  }
</script>


<!--********************** FIN ***********************-->
<?php include("Fin.php"); ?>
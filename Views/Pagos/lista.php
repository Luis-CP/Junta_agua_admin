
<?php include("Inicio.php"); ?>

<style type="text/css">
  .form-control {
    width: 70%;
  }
</style>
<br>
<section>
  <h1 align='center'>Pagos</h1>
  <hr>
  <table class="table table-striped table-hove" id="myTable">
    <thead>
      <tr>
        <td align="center">Medidor</td>
        <td align="center">Mes</td>
        <td align="center">Año</td>
        <td align="center">Socio</td>
        <td align="center">Planillas</td>
        <td align="center">Eliminar</td>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'conection.php';

      $lastMes = "SELECT mes,id FROM cartola ORDER by id DESC LIMIT 1";
      $lastM = mysqli_query($connection, $lastMes);

      while ($resM = mysqli_fetch_array($lastM)) {
        $varLastM = $resM['mes'];
      }

      if(!empty($varLastM)){
      $listarCartola = "SELECT c.id, c.numero, c.direccion, c.socio, c.costo, c.mes, c.anio,
                    s.id_socio, CONCAT( s.nombre_socio, ' ',s.apellido_socio) AS nombre_completo
                    FROM cartola c 
                    INNER JOIN socio s ON c.socio = s.id_socio WHERE mes = '$varLastM'";

      $query = mysqli_query($connection, $listarCartola);
      while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
          <td align='center'><input type="text" readonly class="form-control" value="<?php echo $row['numero']; ?>" required></td>
          <td align='center'><?php echo $row['mes']; ?></td>
          <td align='center'><?php echo $row['anio']; ?></td>
          <td align='center'><?php echo $row['nombre_completo']; ?></td>
          <td><a class="btn btn-primary" href="cobrar.php?socio=<?php echo $row['socio']; ?>&&numMedidor=<?php echo $row['numero']; ?>">Ver</a></td>
          <td>
            <a class="btn btn-danger" href="controlador.php?id=<?php echo $row['id']; ?>&ver=eliminar">Eliminar</a>
          </td>
        </tr>
      <?php
      }
    } ?>
    </tbody>
  </table>
</section>
<!--********************** VENTANA ***********************-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Planillas</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id">

        <hr>
        <table class="table">
          <thead>
            <tr>
              <td align='center'>Mes</td>
              <td align='center'>Año</td>
              <td align='center'>Consumo</td>
              <td align='center'>Pago</td>
              <td align='center'>Estado</td>
              <td align='center'>Factura</td>

            </tr>
          </thead>
          <tbody id="informacion"></tbody>

          <!--
          <tbody>
          
              <?php
              /*include 'conection.php';

                  $listarCarto="SELECT id, costo, mes FROM cartola WHERE socio = 5";
                  $result=mysqli_query($connection,$listarCarto);
                  while ($mostrar=mysqli_fetch_row($result)) {
                    ?>
                    <tr >
                      <td><?php echo $mostrar[1] ?></td>
                      <td><?php echo $mostrar[2] ?></td>
                    </tr>
                  <?php /*}
                  */
              ?>
                  
          </tbody>
                  -->
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--********************** FIN ***********************-->
<?php include("Fin.php"); ?>

<?php include("Inicio.php"); ?>

<style type="text/css">
  .form-control {
    width: 70%;
  }
</style>
<br>
<section>
  <h1 align='center'>Cartolas Generadas</h1>
  <hr>

  <form action="cartolasG.php" method="POST">
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
          <td align="center"><select class="form-control" name="mes" id="mes">
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
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
            </select></td>
            <td align="center"><button class="btn btn-success"> Consultar</button></td>
        </tr>
      </tbody>
    </table>
  </form>
<br><br>
  <table class="table table-striped table-hove" id="myTable">
    <thead>
      <tr>
        <td align="center">Cédula</td>
        <td align="center">Socio</td>
        <td align="center">Mes</td>
        <td align="center">Año</td>
        <td align="center">Planillas</td>
        <td align="center">Eliminar</td>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'conection.php';

      if(!empty($_POST['mes']) && !empty($_POST['anio'])){
      $mes= $_POST['mes'];
      $anio= $_POST['anio'];
     
      $listarCartola = "SELECT c.id, c.numero, c.direccion, c.socio, c.costo, c.mes, c.anio,
                    s.id_socio, CONCAT( s.nombre_socio, ' ',s.apellido_socio) AS nombre_completo, s.cedula_socio
                    FROM cartola c 
                    INNER JOIN socio s ON c.socio = s.id_socio WHERE mes = '$mes' AND anio=$anio";

      $query = mysqli_query($concection, $listarCartola);
      while ($row = mysqli_fetch_array($query)) { ?>
        <tr>
          <td align='center'><?php echo $row['cedula_socio']; ?></td>
          <td align='center'><?php echo $row['nombre_completo']; ?></td>
          <td align='center'><?php echo $row['mes']; ?></td>
          <td align='center'><?php echo $row['anio']; ?></td>
          <td><a class="btn btn-primary" href="#">Creada</a></td>
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

<!--********************** FIN ***********************-->
<?php include("Fin.php"); ?>
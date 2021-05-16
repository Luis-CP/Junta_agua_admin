<?php

include 'Inicio.php';
include 'conection.php';
$socio = $_GET['socio'];
$numMedidor = $_GET['numMedidor'];

$socios = $socio;
$sql = "SELECT id_socio, CONCAT(nombre_socio, ' ', apellido_socio) AS nombre_completo , cedula_socio, direccion_socio
        FROM socio
        WHERE id_socio=$socio";
$socio = mysqli_query($connection, $sql);
?>
<div class="container">
    <h3>JUNTA ADMINISTRADORA DE AGUA POTABLE DE TANDACATO</h3>
    <table class="table">
        <?php
        while ($row = mysqli_fetch_array($socio)) {
            ?>
            <tr>
                <td colspan="8">Senor (a): <?php echo $row['nombre_completo'] ?> </td>
            <?php } ?>
        </tr>
        <tr>
            <td>TANDACATO</td>
        </tr>
    </table>
</div>

<form action="guardar.php" method="POST">
    <table class="table">
        <thead>
            <tr>
                <td align='center'>Mes</td>
                <td align='center'>Año</td>
                <td align='center'>Consumo</td>
                <td align='center'>nMedidor</td>
                <td align='center'>Pago</td>
                <td align='center'>Estado</td>
                <td align='center'>Factura</td>

            </tr>
        </thead>
        <tbody id="informacion"></tbody>

        <tbody>
            <?php
            include 'conection.php';
            $total = 0;
            $listarCarto = "SELECT id, idMedidor, numero, direccion, socio, costo, mes, anio, estado 
                        FROM cartola WHERE socio = $socios AND numero = $numMedidor";
            $result = mysqli_query($connection, $listarCarto);
            while ($mostrar = mysqli_fetch_row($result)) {
                ?>
                <tr>
                    <input type='text' hidden name='id' value='<?php echo $mostrar[4] ?>'>
                    <input type='text' hidden name='anio' value='<?php echo $mostrar[7] ?>'>
                    <input type='text' hidden name='idMedidor' value='<?php echo $mostrar[1] ?>'>
                    <input type='text' hidden name='numero' value='<?php echo $mostrar[2] ?>'>
                    <td align='center'><?php echo $mostrar[6] ?></td>
                    <td align='center'><?php echo $mostrar[7] ?></td>
                    <td align='center'><?php echo $mostrar[5] ?></td>
                    <td align='center'><?php echo $mostrar[2] ?></td>
                    <?php
                    if ($mostrar[8] == 1) { ?>
                        <td align='center'><input disabled type='checkbox' checked></td>
                        <td align='center'>Pagado</td>
                        <td align='center'><a style='color: red;font-size: 25px;' href='pdf/planilla.php?id=<?php echo $mostrar[0] ?>&&socio=<?php echo $mostrar[4] ?>'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></td>
                    <?php } else { ?>
                        <td align='center'>
                            <input id='myCheckV' class="checkV" hidden name='check[]' type='checkbox' value='<?php echo $mostrar[6] ?>'>
                            <input id='myCheck' class="check" name='checkVal[]' onclick="func();" type='checkbox' value='<?php echo $mostrar[5] ?>'></td>
                        <td align='center'>Pendiente</td>
                        <td align='center' hidden><a style='color: red;font-size: 25px;'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></td>

                    <?php }
                    ?>

                </tr>
            <?php }
            ?>

        </tbody>

    </table>
    <div class="container">
        <div class="row">
            <div class="form-group">
                <label for="" style="float: left">Total a pagar : $ </label>
                <div id="resul" name="resul"></div>
            </div>
        </div>
    </div>


    <br>
    <a href="lista.php" class="btn btn-warning">Atrás</a>
    <button type="submit" class="btn btn-success">Confirmar</button>
</form>
<script>
    
    window.onload = function(){
        var checkBox = document.getElementsByClassName('check');
        var checkBoxV = document.getElementsByClassName('checkV');
        var str = 0;
        document.getElementById("resul").innerHTML = 0;
        for (var i = 0; i <= checkBox.length; i++) {
            checkBoxV[i].checked = 0;
            checkBox[i+1].setAttribute('disabled','disabled');
           
        }
    }
    function func() {

        var checkBox = document.getElementsByClassName('check');
        var checkBoxV = document.getElementsByClassName('checkV');
        var str = 0;
        document.getElementById("resul").innerHTML = 0;
        for (var i = 0; i <= checkBox.length; i++) {
            checkBoxV[i].checked = 0;

            if (checkBox[i].checked) {
                str += parseInt(checkBox[i].value);
                document.getElementById("resul").innerHTML = str;
                checkBoxV[i].checked = 1;
                
                checkBox[i+1].removeAttribute('disabled')
            }else{
                checkBoxV[i].checked = 0;
                checkBox[i+1].checked = 0;
                checkBox[i+1].setAttribute('disabled','disabled');
            }
        }
    }
</script>

<?php

include 'Fin.php';

?>
<?php

include 'Inicio.php';
?>

    <h1 align='center'>Generar Reportes</h1>

    <table class="table table-striped table-hove" id="">
        <thead>
        <tr>
            <td align='center'>Mes</td>
            <td align='center'>Año</td>
            <td align='center'>Estado</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align='center'><select class="form-control" name="mes" id="mes">
                    <option value="enero">Enero</option>
                    <option value="febrero">Febrero</option>
                    <option value="marzo">Marzo</option>
                    <option value="abril">Abril</option>
                    <option value="mayo">Mayo</option>
                    <option value="junio">Junio</option>
                    <option value="julio">Julio</option>
                    <option value="agosto">Agosto</option>
                    <option value="septiembre">Septiembre</option>
                    <option value="octubre" selected>Octubre</option>
                    <option value="noviembre">Noviembre</option>
                    <option value="diciembre">Diciembre</option>
                </select></td>
            <td align='center'><select class="form-control" name="anio" id="anio">
                    <option value="2019">2019</option>
                    <option value="2020" selected>2020</option>
                    <option value="2021">2021</option>
                </select></td>
            <td align='center'><select class="form-control" name="estado" id="estado">
                    <option value="1">Pagado</option>
                    <option value="0">Pendiente</option>
                </select></td>
        </tr>
        </tbody>
    </table>


    <div id="graph"></div>
    <button style="display:none;" value="" id="btn-graph" OnClick="viewDetail(this)" data-toggle="modal"
            data-target="#modal-selected">graph
    </button>




    <div id="modal-selected" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detalle del Socio</h4>
                </div>
                <div class="modal-body" id="modal-content">

                </div>

            </div>

        </div>
    </div>

<?php
include 'Fin.php';
?>
</div>
</div><!--/.col-->
</div><!--/.row-->
</div>    <!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="datatables/js/dataTables.responsive.min.js"></script>
<script src="../../Static/toastr/build/toastr.min.js"></script>
<script src="./js/toastr.js"></script>
<script src="../../Static/validations/js/validate-inputs.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable();
        $('#response').on('click', 'li', function () {
            var perfil = $(this).text();
            var id = $(this).attr("id");
            $("#socio").val(id);
            $.ajax({
                url: 'crear.php',
                type: 'POST',
                data: {
                    socio: id,
                },
                success: function (data) {
                    $("#medidor").html('');
                    $("#medidor").append(data);
                }
            })
            $("#searchBox").val(perfil);
            $("#response").html("");
            document.getElementById("response").style.border = "0px";
        });
        var a = $('#contador').val();
        if (a == 1) {
            document.getElementById("ver_cartola").style.display = 'none';
        } else {
            document.getElementById("ver_cartola").style.display = 'block';
        }
        <?php date_default_timezone_set('America/Guayaquil');
        $zonahoraria = date_default_timezone_get();

        $mesActual = date("m");
        $anioActual = date("Y");

        if ($mesActual == 1) {
            $mesActual = 'enero';
        }
        if ($mesActual == 2) {
            $mesActual = 'febrero';
        }
        if ($mesActual == 3) {
            $mesActual = 'marzo';
        }
        if ($mesActual == 4) {
            $mesActual = 'abril';
        }
        if ($mesActual == 5) {
            $mesActual = 'mayo';
        }
        if ($mesActual == 6) {
            $mesActual = 'junio';
        }
        if ($mesActual == 7) {
            $mesActual = 'julio';
        }
        if ($mesActual == 8) {
            $mesActual = 'agosto';
        }
        if ($mesActual == 9) {
            $mesActual = 'septiembre';
        }
        if ($mesActual == 10) {
            $mesActual = 'octubre';
        }
        if ($mesActual == 11) {
            $mesActual = 'noviembre';
        }
        if ($mesActual == 12) {
            $mesActual = 'diciembre';
        }?>
        var fecha = '<?php echo $mesActual;?>';
        <?php ?>
        var tmsel = document.getElementById('mes').length;
        var t;
        for (var z = 0; z < tmsel; z++) {
            t = document.getElementById('mes').options[z].value;
            if (fecha == t) {
                document.getElementById('mes').selectedIndex = z;
            }
        }
    });
</script>

<script>
    function validator(val, id) {
        console.log(val+' '+id);
        if (val < 10 || val == '') {
            toastr.error('El valor debe ser mayor o igual a 10.', '¡Alerta!', {
                positionClass: 'toastr toast-top-right',
                containerId: 'toast-top-right'
            });
            document.getElementById(id).style.border = '1px solid red';
            document.getElementById('btnCreateCartola').disabled=true;
        }else{
            document.getElementById(id).style.border = '1px solid green';
            document.getElementById('btnCreateCartola').disabled=false;
        }
    }
</script>
</body>
</html>
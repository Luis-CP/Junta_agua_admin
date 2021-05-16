</div>
</div><!--/.col-->
</div><!--/.row-->
</div>    <!--/.main-->




<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.3"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="datatables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="datatables/js/dataTables.responsive.min.js"></script>
<script src="./js/graphics.js"></script>
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
        })
    });
</script>
</body>
</html>
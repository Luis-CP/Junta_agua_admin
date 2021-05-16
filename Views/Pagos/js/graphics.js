$(document).ready(function () {
    let canvas = '';
    canvas += '<center>' +
        '<h5><strong>Eje X: </strong>Número de Medidor - <strong>Eje Y: </strong>Consumo</h5>' +
        '<canvas id="barCanvas" width="80%" height="25"></canvas>' +
        '</center>';

    let cbMonth = $('#mes');
    let cbYear = $('#anio');
    let cbState = $('#estado');
    //cargar grafica del mes anterior
    let route = '/PAGO/Views/Pagos/graphics.php?action=1';
    addCanvas();
    let barCanvas = document.getElementById('barCanvas').getContext('2d');
    defaultGraph(barCanvas, 'bar', route);

    //grafica por filtro
    cbMonth.on('change', function () {
        let month = this.value;
        let year = cbYear.val();
        let state = cbState.val();
        removeCanvas();
        addCanvas();
        let barCanvas = document.getElementById('barCanvas').getContext('2d');
        let route = '/PAGO/Views/Pagos/graphics.php?action=2';
        let array = [];
        $.ajax({
            url: route,
            data: {
                month: month,
                year: year,
                state: state,
            },
            type: 'POST',
            success: function (data) {
                filterGraph('bar', data, barCanvas);
            },
        });
    });

    cbYear.on('change', function () {
        let month = cbMonth.val();
        let year = this.value;
        let state = cbState.val();
        removeCanvas();
        addCanvas();
        let barCanvas = document.getElementById('barCanvas').getContext('2d');
        let route = '/PAGO/Views/Pagos/graphics.php?action=2';
        let array = [];
        $.ajax({
            url: route,
            data: {
                month: month,
                year: year,
                state: state,
            },
            type: 'POST',
            success: function (data) {
                filterGraph('bar', data, barCanvas);
            },
        });
    });

    cbState.on('change', function () {
        let month = cbMonth.val();
        let year = cbYear.val();
        let state = this.value;
        removeCanvas();
        addCanvas();
        let barCanvas = document.getElementById('barCanvas').getContext('2d');
        let route = '/PAGO/Views/Pagos/graphics.php?action=2';
        let array = [];
        $.ajax({
            url: route,
            data: {
                month: month,
                year: year,
                state: state,
            },
            type: 'POST',
            success: function (data) {
                filterGraph('bar', data, barCanvas);
            },
        });
    });

    function removeCanvas() {
        $('#barCanvas').remove();
    }

    function addCanvas() {
        $('#graph').html(canvas);
    }
});

function defaultGraph(element, type, url_json) {
    var measurer = [];
    var cost = [];
    $.getJSON(url_json, function (datos) {
        $.each(datos, function (index, item) {
            //  count++;
            measurer.push(item.measurer);
            // labels.push(item.title);
            cost.push(item.cost);
        });
        var myChart = new Chart(element, {
            type: type,
            data: {
                labels: measurer,
                datasets: [{
                    label: 'Consumo ',
                    data: cost,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 135, 209, 0.2)',
                        'rgba(218, 134, 255, 0.2)',
                        'rgba(188, 134, 254, 0.2)',
                        'rgba(138, 146, 255, 0.2)',
                        'rgba(136, 180, 255, 0.2)',
                        'rgba(135, 255, 194, 0.2)',
                        'rgba(191, 255, 135, 0.2)',
                        'rgba(227, 254, 139, 0.2)',
                        'rgba(255, 237, 135, 0.2)',
                        'rgba(255, 237, 135, 0.2)',
                        'rgba(250, 175, 135, 0.2)',
                        'rgba(253, 164, 140, 0.2)',
                        'rgba(255, 122, 123, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',

                        'rgba(246, 211, 71, 0.2)',
                        'rgba(183, 28, 70, 0.2)',
                        'rgba(255, 119, 193, 0.2)',
                        'rgba(255, 119, 255, 0.2)',
                        'rgba(207, 119, 255, 0.2)',
                        'rgba(128, 128, 255, 0.2)',
                        'rgba(115, 199, 255, 0.2)',
                        'rgba(128, 255, 255, 0.2)',
                        'rgba(119, 255, 184, 0.2)',
                        'rgba(119, 255, 119, 0.2)',
                        'rgba(207, 255, 119, 0.2)',
                        'rgba(255, 255, 136, 0.2)',
                        'rgba(255, 225, 136, 0.2)',
                        'rgba(255, 190, 119, 0.2)',
                        'rgba(255, 159, 119, 0.2)',
                        'rgba(255, 119, 119, 0.2)',
                        'rgba(106, 190, 159, 0.2)',
                        'rgba(255, 216, 143, 0.2)',
                        'rgba(49, 215, 199, 0.2)',
                        'rgba(226, 157, 118, 0.2)',
                        'rgba(255, 121, 101, 0.2)',
                        'rgba(156, 96, 59, 0.2)',
                        'rgba(161, 210, 206, 0.2)',
                        'rgba(165, 160, 128, 0.2)',
                        'rgba(112, 152, 204, 0.2)',
                        'rgba(204, 163, 109, 0.2)',
                        'rgba(101, 141, 105, 0.2)',
                        'rgba(255, 253, 184, 0.2)',
                        'rgba(159, 142, 126, 0.2)',
                        'rgba(199, 110, 59, 0.2)',
                        'rgba(114, 125, 151, 0.2)',
                        'rgba(254, 219, 213, 0.2)',
                        'rgba(148, 79, 84, 0.2)',
                        'rgba(179, 113, 123, 0.2)',
                        'rgba(198, 138, 146, 0.2)',
                        'rgba(230, 172, 186, 0.2)',
                        'rgba(98, 133, 214, 0.2)',
                        'rgba(153, 178, 234, 0.2)',
                        'rgba(191, 212, 241, 0.2)',
                        'rgba(211, 222, 244, 0.2)',
                        'rgba(107, 163, 160, 0.2)',
                        'rgba(150, 186, 186, 0.2)',
                        'rgba(188, 218, 220, 0.2)',
                        'rgba(217, 237, 238, 0.2)',
                        'rgba(126, 149, 107, 0.2)',
                        'rgba(149, 168, 140, 0.2)',
                        'rgba(185, 197, 175, 0.2)',
                        'rgba(210, 221, 205, 0.2)',
                        'rgba(106, 101, 107, 0.2)',
                        'rgba(134, 127, 135, 0.2)',
                        'rgba(172, 166, 176, 0.2)',
                        'rgba(190, 188, 193, 0.2)',
                        'rgba(113, 82, 87, 0.2)',
                        'rgba(147, 114, 121, 0.2)',
                        'rgba(168, 137, 143, 0.2)',
                        'rgba(247, 216, 187, 0.2)',
                        'rgba(233, 190, 156, 0.2)',


                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 135, 209, 1)',
                        'rgba(218, 134, 255, 1)',
                        'rgba(188, 134, 254, 1)',
                        'rgba(138, 146, 255, 1)',
                        'rgba(136, 180, 255, 1)',
                        'rgba(135, 255, 194, 1)',
                        'rgba(191, 255, 135, 1)',
                        'rgba(227, 254, 139, 1)',
                        'rgba(255, 237, 135, 1)',
                        'rgba(255, 237, 135, 1)',
                        'rgba(250, 175, 135, 1)',
                        'rgba(253, 164, 140, 1)',
                        'rgba(255, 122, 123, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',

                        'rgba(246, 211, 71, 1)',
                        'rgba(183, 28, 70, 1)',
                        'rgba(255, 119, 193, 1)',
                        'rgba(255, 119, 255, 1)',
                        'rgba(207, 119, 255, 1)',
                        'rgba(128, 128, 255, 1)',
                        'rgba(115, 199, 255, 1)',
                        'rgba(128, 255, 255, 1)',
                        'rgba(119, 255, 184, 1)',
                        'rgba(119, 255, 119, 1)',
                        'rgba(207, 255, 119, 1)',
                        'rgba(255, 255, 136, 1)',
                        'rgba(255, 225, 136, 1)',
                        'rgba(255, 190, 119, 1)',
                        'rgba(255, 159, 119, 1)',
                        'rgba(255, 119, 119, 1)',
                        'rgba(106, 190, 159, 1)',
                        'rgba(255, 216, 143, 1)',
                        'rgba(49, 215, 199, 1)',
                        'rgba(226, 157, 118, 1)',
                        'rgba(255, 121, 101, 1)',
                        'rgba(156, 96, 59, 1)',
                        'rgba(161, 210, 206, 1)',
                        'rgba(165, 160, 128, 1)',
                        'rgba(112, 152, 204, 1)',
                        'rgba(204, 163, 109, 1)',
                        'rgba(101, 141, 105, 1)',
                        'rgba(255, 253, 184, 1)',
                        'rgba(159, 142, 126, 1)',
                        'rgba(199, 110, 59, 1)',
                        'rgba(114, 125, 151, 1)',
                        'rgba(254, 219, 213, 1)',
                        'rgba(148, 79, 84, 1)',
                        'rgba(179, 113, 123, 1)',
                        'rgba(198, 138, 146, 1)',
                        'rgba(230, 172, 186, 1)',
                        'rgba(98, 133, 214, 1)',
                        'rgba(153, 178, 234, 1)',
                        'rgba(191, 212, 241, 1)',
                        'rgba(211, 222, 244, 1)',
                        'rgba(107, 163, 160, 1)',
                        'rgba(150, 186, 186, 1)',
                        'rgba(188, 218, 220, 1)',
                        'rgba(217, 237, 238, 1)',
                        'rgba(126, 149, 107, 1)',
                        'rgba(149, 168, 140, 1)',
                        'rgba(185, 197, 175, 1)',
                        'rgba(210, 221, 205, 1)',
                        'rgba(106, 101, 107, 1)',
                        'rgba(134, 127, 135, 1)',
                        'rgba(172, 166, 176, 1)',
                        'rgba(190, 188, 193, 1)',
                        'rgba(113, 82, 87, 1)',
                        'rgba(147, 114, 121, 1)',
                        'rgba(168, 137, 143, 1)',
                        'rgba(247, 216, 187, 1)',
                        'rgba(233, 190, 156, 1)',


                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    zoom: {
                        pan: {
                            enabled: true,
                            mode: 'x'
                        },
                        zoom: {
                            enabled: true,
                            mode: 'x'
                        }
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            display: true
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontSize: 14,
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
}

function filterGraph(type, data, element) {
    var measurer = [];
    var cost = [];
    $.each(JSON.parse(data), function (index, item) {
        measurer.push(item.measurer);
        cost.push(item.cost);
    });
    var myChart = new Chart(element, {
        type: type,
        data: {
            labels: measurer,
            datasets: [{
                label: 'Consumo ',
                data: cost,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 135, 209, 0.2)',
                    'rgba(218, 134, 255, 0.2)',
                    'rgba(188, 134, 254, 0.2)',
                    'rgba(138, 146, 255, 0.2)',
                    'rgba(136, 180, 255, 0.2)',
                    'rgba(135, 255, 194, 0.2)',
                    'rgba(191, 255, 135, 0.2)',
                    'rgba(227, 254, 139, 0.2)',
                    'rgba(255, 237, 135, 0.2)',
                    'rgba(255, 237, 135, 0.2)',
                    'rgba(250, 175, 135, 0.2)',
                    'rgba(253, 164, 140, 0.2)',
                    'rgba(255, 122, 123, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',

                    'rgba(246, 211, 71, 0.2)',
                    'rgba(183, 28, 70, 0.2)',
                    'rgba(255, 119, 193, 0.2)',
                    'rgba(255, 119, 255, 0.2)',
                    'rgba(207, 119, 255, 0.2)',
                    'rgba(128, 128, 255, 0.2)',
                    'rgba(115, 199, 255, 0.2)',
                    'rgba(128, 255, 255, 0.2)',
                    'rgba(119, 255, 184, 0.2)',
                    'rgba(119, 255, 119, 0.2)',
                    'rgba(207, 255, 119, 0.2)',
                    'rgba(255, 255, 136, 0.2)',
                    'rgba(255, 225, 136, 0.2)',
                    'rgba(255, 190, 119, 0.2)',
                    'rgba(255, 159, 119, 0.2)',
                    'rgba(255, 119, 119, 0.2)',
                    'rgba(106, 190, 159, 0.2)',
                    'rgba(255, 216, 143, 0.2)',
                    'rgba(49, 215, 199, 0.2)',
                    'rgba(226, 157, 118, 0.2)',
                    'rgba(255, 121, 101, 0.2)',
                    'rgba(156, 96, 59, 0.2)',
                    'rgba(161, 210, 206, 0.2)',
                    'rgba(165, 160, 128, 0.2)',
                    'rgba(112, 152, 204, 0.2)',
                    'rgba(204, 163, 109, 0.2)',
                    'rgba(101, 141, 105, 0.2)',
                    'rgba(255, 253, 184, 0.2)',
                    'rgba(159, 142, 126, 0.2)',
                    'rgba(199, 110, 59, 0.2)',
                    'rgba(114, 125, 151, 0.2)',
                    'rgba(254, 219, 213, 0.2)',
                    'rgba(148, 79, 84, 0.2)',
                    'rgba(179, 113, 123, 0.2)',
                    'rgba(198, 138, 146, 0.2)',
                    'rgba(230, 172, 186, 0.2)',
                    'rgba(98, 133, 214, 0.2)',
                    'rgba(153, 178, 234, 0.2)',
                    'rgba(191, 212, 241, 0.2)',
                    'rgba(211, 222, 244, 0.2)',
                    'rgba(107, 163, 160, 0.2)',
                    'rgba(150, 186, 186, 0.2)',
                    'rgba(188, 218, 220, 0.2)',
                    'rgba(217, 237, 238, 0.2)',
                    'rgba(126, 149, 107, 0.2)',
                    'rgba(149, 168, 140, 0.2)',
                    'rgba(185, 197, 175, 0.2)',
                    'rgba(210, 221, 205, 0.2)',
                    'rgba(106, 101, 107, 0.2)',
                    'rgba(134, 127, 135, 0.2)',
                    'rgba(172, 166, 176, 0.2)',
                    'rgba(190, 188, 193, 0.2)',
                    'rgba(113, 82, 87, 0.2)',
                    'rgba(147, 114, 121, 0.2)',
                    'rgba(168, 137, 143, 0.2)',
                    'rgba(247, 216, 187, 0.2)',
                    'rgba(233, 190, 156, 0.2)',


                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 135, 209, 1)',
                    'rgba(218, 134, 255, 1)',
                    'rgba(188, 134, 254, 1)',
                    'rgba(138, 146, 255, 1)',
                    'rgba(136, 180, 255, 1)',
                    'rgba(135, 255, 194, 1)',
                    'rgba(191, 255, 135, 1)',
                    'rgba(227, 254, 139, 1)',
                    'rgba(255, 237, 135, 1)',
                    'rgba(255, 237, 135, 1)',
                    'rgba(250, 175, 135, 1)',
                    'rgba(253, 164, 140, 1)',
                    'rgba(255, 122, 123, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',

                    'rgba(246, 211, 71, 1)',
                    'rgba(183, 28, 70, 1)',
                    'rgba(255, 119, 193, 1)',
                    'rgba(255, 119, 255, 1)',
                    'rgba(207, 119, 255, 1)',
                    'rgba(128, 128, 255, 1)',
                    'rgba(115, 199, 255, 1)',
                    'rgba(128, 255, 255, 1)',
                    'rgba(119, 255, 184, 1)',
                    'rgba(119, 255, 119, 1)',
                    'rgba(207, 255, 119, 1)',
                    'rgba(255, 255, 136, 1)',
                    'rgba(255, 225, 136, 1)',
                    'rgba(255, 190, 119, 1)',
                    'rgba(255, 159, 119, 1)',
                    'rgba(255, 119, 119, 1)',
                    'rgba(106, 190, 159, 1)',
                    'rgba(255, 216, 143, 1)',
                    'rgba(49, 215, 199, 1)',
                    'rgba(226, 157, 118, 1)',
                    'rgba(255, 121, 101, 1)',
                    'rgba(156, 96, 59, 1)',
                    'rgba(161, 210, 206, 1)',
                    'rgba(165, 160, 128, 1)',
                    'rgba(112, 152, 204, 1)',
                    'rgba(204, 163, 109, 1)',
                    'rgba(101, 141, 105, 1)',
                    'rgba(255, 253, 184, 1)',
                    'rgba(159, 142, 126, 1)',
                    'rgba(199, 110, 59, 1)',
                    'rgba(114, 125, 151, 1)',
                    'rgba(254, 219, 213, 1)',
                    'rgba(148, 79, 84, 1)',
                    'rgba(179, 113, 123, 1)',
                    'rgba(198, 138, 146, 1)',
                    'rgba(230, 172, 186, 1)',
                    'rgba(98, 133, 214, 1)',
                    'rgba(153, 178, 234, 1)',
                    'rgba(191, 212, 241, 1)',
                    'rgba(211, 222, 244, 1)',
                    'rgba(107, 163, 160, 1)',
                    'rgba(150, 186, 186, 1)',
                    'rgba(188, 218, 220, 1)',
                    'rgba(217, 237, 238, 1)',
                    'rgba(126, 149, 107, 1)',
                    'rgba(149, 168, 140, 1)',
                    'rgba(185, 197, 175, 1)',
                    'rgba(210, 221, 205, 1)',
                    'rgba(106, 101, 107, 1)',
                    'rgba(134, 127, 135, 1)',
                    'rgba(172, 166, 176, 1)',
                    'rgba(190, 188, 193, 1)',
                    'rgba(113, 82, 87, 1)',
                    'rgba(147, 114, 121, 1)',
                    'rgba(168, 137, 143, 1)',
                    'rgba(247, 216, 187, 1)',
                    'rgba(233, 190, 156, 1)',


                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                zoom: {
                    pan: {
                        enabled: true,
                        mode: 'x'
                    },
                    zoom: {
                        enabled: true,
                        mode: 'x'
                    }
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                        fontSize: 14,
                        display: true
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontSize: 14,
                        beginAtZero: true
                    }
                }]
            },
            onClick: function (e) {
                //debugger;
                var activePointLabel = this.getElementsAtEvent(e)[0]._model.label;
                //alert(activePointLabel);
                document.getElementById('btn-graph').value = activePointLabel;
                document.getElementById('btn-graph').click();
                //detailArticle(activePointLabel);
            }
        }
    });
}

function viewDetail(btn) {
    let month = document.getElementById('mes').value;
    let year = document.getElementById('anio').value;
    let state = document.getElementById('estado').value;

    let meterNumber = btn.value;
    let route = '/PAGO/Views/Pagos/graphics.php?action=3';
    $('#modal-content').html('');
    $.ajax({
        url: route,
        data: {
            month: month,
            year: year,
            state: state,
            meterNumber: meterNumber,
        },
        type: 'POST',
        success: function (data) {
            $('#modal-content').html('');
            var html = "";
            $.each(JSON.parse(data), function (index, item) {
                html += '   <div class="row">\n' +
                    '<div class="col-md-1"></div>\n' +
                    '<div class="col-md-5">\n' +
                    '<small class="">Cédula </small>\n' +
                    '<h6><strong>'+item.dni+'</strong></h6>\n' +
                    '<small class="">Nombres y Apellidos </small>\n' +
                    '<h6><strong>'+item.lastName+' '+item.name+'</strong></h6>\n' +
                    '<small class="">Dirección </small>\n' +
                    '<h6><strong>'+item.address+'</strong></h6>\n' +
                    '</div>\n' +
                    '<div class="col-md-5">\n' +
                    '<small class="">Número de Medidor </small>\n' +
                    '<h6><strong>'+item.measurer+'</strong></h6>\n' +
                    '<small class="">Mes</small>\n' +
                    '<h6 class="text-uppercase"><strong>'+item.month+'</strong></h6>\n' +
                    '<small class="">Consumo </small>\n' +
                    '<h6><strong>'+item.cost+'</strong></h6>\n' +
                    '</div>\n' +
                    '<div class="col-md-1"></div>\n' +
                    '</div>';
            });
            $('#modal-content').html(html);
        },
        error: function (data) {
            $('#modal-content').html('');
            var html = "";

            html += '<div class="modal-header" style="background: #01568F; ">' +
                '<button type="button" class="close" data-dismiss="modal" style="color: #ffff; ">x</button>' +
                '<h3 align="center" style="color: #FFF;">EL SOCIO NO EXISTE EN NUESTRA BASE DE DATOS</h3>\n' +
                '</div>';

            $('#modal-content').html(html);
        }
    });
}


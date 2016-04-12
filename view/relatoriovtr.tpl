{if $verificador == 1}
    <div class="container-fluid">
        <div style="margin: 0 auto;width:50%">
            <div id="js-legend" class="chart-legend"></div>
            <canvas id="canvas" height="100%" width="100%"></canvas>
        </div>
    </div>
    <script>
        var barChartData = {
            labels: [{$a}],
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    label: "Qnt",
                    data: [{$b}]
                },
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    label: "Km",
                    data: [{$c}]
                }
            ]

        }
        window.onload = function () {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx).Bar(barChartData, {
                responsive: true
            });
            document.getElementById('js-legend').innerHTML = window.myBar.generateLegend();
        }

    </script>
{/if}
<div class="wrapper" role="main">
    <div class='container'>
        <div class="jumbotron">
            <h1>{$titulo}</h1>
            <form autocomplete="off" action="relatoriovtr" method="post">
                <tr>
                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="data_inicio">Data Início</label>
                    <input class="form-control" type="text" id="data_inicio" name="data_inicio"  required="required" tabindex="1"/>
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-6">
                    <label for="data_fim">Data Fim</label>
                    <input class="form-control" type="text" id="data_fim" name="data_fim"  required="required" tabindex="2"/>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="relatorio" name="enviar" tabindex="3">Gerar Relatório</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
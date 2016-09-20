<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
</div>
<div class="container">
    <div id="grafico" class="col-xs-12 col-sm-12 col-md-12 grafico" style="margin: 0 auto;width:100%;height:100%">
        <div id="js-legend" class="chart-legend"></div>
        <canvas id="canvas" ></canvas>
    </div>
</div>
    <script>
            var barChartData = {
                labels: [{$a}],
                datasets: [
                    {
                        fillColor: "rgba(61,0,245,0.5)",
                        strokeColor: "rgba(61,0,245,0.8)",
                        highlightFill: "rgba(61,0,245,0.75)",
                        highlightStroke: "rgba(61,0,245,1)",
                        label: "Existente",
                        data: [{$b}]
                    },
                    {
                        fillColor: "rgba(245,0,61,0.5)",
                        strokeColor: "rgba(245,0,61,0.8)",
                        highlightFill: "rgba(245,0,61,0.75)",
                        highlightStroke: "rgba(245,0,61,1)",
                        label: "Indisponível",
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
<!--<div class="container">
    <table id="relatorio" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Viatura</td>
                <td>Qnt x rodou</td>
                <td>KM rodada</td>
            </tr>
        </thead>
        <tbody>
            {foreach $relacao_relatorio as $tbl name=relacao_relatorio}
                <tr>                            
                    <td>{$tbl.modelo} - {$tbl.placa}</td>
                    <td>{$tbl.qnt}</td>
                    <td>{$tbl.KM}</td>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Viatura</td>
                <td>Qnt x rodou</td>
                <td>KM rodada</td>
            </tr>
        </tfoot>
    </table>
</div>
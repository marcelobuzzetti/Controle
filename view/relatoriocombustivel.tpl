{if $verificador == 1}
    <div class='container'>
        <div class="jumbotron">
            <h1 class="titulo">{$titulo1}</h1>
        </div>
    </div>
    <div class="container">
        <div id="grafico" class="col-xs-12 col-sm-12 col-md-12 grafico" style="margin: 0 auto;width:100%;height:100%">
            <div id="js-legend" class="chart-legend"></div>
            <canvas id="canvas" ></canvas>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            window.location.href = '#grafico';
        });
        var barChartData = {
            labels: [{$a}],
            datasets: [
                {
                    fillColor: ["rgba(205,64,64,0.5)", "rgba(220,220,220,0.5)", "rgba(24,178,235,0.5)", "rgba(220,220,220,0.5)"],
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    label: "Qnt",
                    data: [{$b}]
                }
            ]

        }
        window.onresize = function () {
            location.reload();
        };
        window.onload = function () {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx).Bar(barChartData, {
                responsive: true
            });
            document.getElementById('js-legend').innerHTML = window.myBar.generateLegend();
        }

    </script>
    <div class="container">
        <table id="relatorio" class="table table-striped table-hover table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Combustivel</td>
                    <td>Quantidade</td>
                </tr>
            </thead>
            <tbody>
                {foreach $relacao_relatorio as $tbl name=relacao_relatorio}
                    <tr>
                        <td>{$tbl.combustivel} {$tbl.tipo}</td>
                        <td>{$tbl.qnt}</td>
                    </tr>
                {/foreach}
            </tbody>
            <tfoot>
                <tr>
                    <td>Combustivel</td>
                    <td>Quantidade</td>
                </tr>
            </tfoot>
        </table>
    </div>
{elseif $verificador == 2}
    <div class='container'>
        <div class="jumbotron">
            <h1 class="titulo">{$titulo1}</h1>
        </div>
    </div>
      <div class="container">
        <div id="grafico" class="col-xs-12 col-sm-12 col-md-12 grafico" style="margin: 0 auto;width:100%;height:100%">
            <div id="js-legend" class="chart-legend"></div>
            <canvas id="canvas" ></canvas>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            window.location.href = '#grafico';
        });
        var barChartData = {
            labels: [{$a}],
            datasets: [
                {
                     fillColor: ["rgba(205,64,64,0.5)", "rgba(220,220,220,0.5)", "rgba(24,178,235,0.5)", "rgba(220,220,220,0.5)"],
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    label: "Qnt",
                    data: [{$b}]
                }
            ]

        }
        window.onresize = function () {
            location.reload();
        };
        window.onload = function () {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx).Bar(barChartData, {
                responsive: true
            });
            document.getElementById('js-legend').innerHTML = window.myBar.generateLegend();
        }

    </script>
    <div class="container">
        <table id="relatorio" class="table table-striped table-hover table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Combustivel</td>
                    <td>Quantidade</td>
                </tr>
            </thead>
            <tbody>
                {foreach $relacao_relatorio as $tbl name=relacao_relatorio}
                    <tr>
                        <td>{$tbl.combustivel} {$tbl.tipo}</td>
                        <td>{$tbl.qnt}</td>
                    </tr>
                {/foreach}
            </tbody>
            <tfoot>
                <tr>
                    <td>Combustivel</td>
                    <td>Quantidade</td>
                </tr>
            </tfoot>
        </table>
    </div>
{/if}
<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <form autocomplete="off" action="relatoriocombustivel" method="post">
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="data_inicio">Data Início</label>
            <input class="form-control" type="text" id="data_inicio" name="data_inicio" placeholder='Digite a Data de início do Relatório' required="required" tabindex="1"/>
        </div>
        <div class="form-group col-xs-12 col-sm-6 col-md-6">
            <label for="data_fim">Data Fim</label>
            <input class="form-control" type="text" id="data_fim" name="data_fim" placeholder='Digite a Data final do Relatório' required="required" tabindex="2"/>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <button type="submit" disabled class="btn btn-primary col-xs-12 col-sm-12 col-md-12" id="enviar" value="relatorio" name="enviar" tabindex="3">Gerar Relatório por Data</button>
        </div>
    </form>
</div>
<div class=" container">
    <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <form action="relatoriocombustivel" method="post">
            <button type="submit" class="btn btn-success col-xs-12 col-sm-12 col-md-12" id="enviar_completo" value="relatorio_completo" name="enviar" tabindex="3">Gerar Relatório Completo</button>
        </form>
    </div>
</div>
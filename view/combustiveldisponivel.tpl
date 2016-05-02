<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <table class='table table-hover table-striped table-responsive' text-align='center'>
            <tr>
                <td>Combustível</td>
                <td>Tipo Combustível</td>
                <td>Qnt</td>
            </tr>
            {foreach $tabela_existencia as $tbl name=tabela_existencia}
                <tr>
                    <td>{$tbl.combustivel}</td>
                    <td>{$tbl.tipo_combustivel}</td>
                    <td>{$tbl.qnt}</td>
                </tr>
            {/foreach}    
        </table>
    </div>
</div>
<div class='container table-responsive grafico'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
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
<div class='container tabela'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
    <table class='table table-hover table-striped table-responsive' text-align='center'>
        {foreach $tabela_existencia as $tbl name=tabela_existencia}
            <tr>
                <td>Combustível {$tbl.combustivel}</td>
            <tr>
            <tr>
                <td>Tipo Combustível {$tbl.tipo_combustivel}</td>
            </tr>
            <tr>
                <td>Qnt {$tbl.qnt}</td>
            </tr>           
            <tr>
                <td></td>
            </tr>
        {/foreach}    
    </table>
</div>
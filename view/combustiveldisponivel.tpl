<div class='container'>
    <div class="jumbotron">
        <h1>{$titulo}</h1>
    </div>
</div>
<div class="container">
    <table id="tabela" class="table table-striped table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Combustível</td>
                <td>Tipo Combustível</td>
                <td>Qnt</td>
            </tr>
        </thead>
        <tbody>
            {foreach $tabela_existencia as $tbl name=tabela_existencia}
                <tr>
                    <td>{$tbl.combustivel}</td>
                    <td>{$tbl.tipo_combustivel}</td>
                    <td>{$tbl.qnt}</td>
                </tr>
            {/foreach}    
        </tbody>
        <tfoot>
            <tr>
                <td>Combustível</td>
                <td>Tipo Combustível</td>
                <td>Qnt</td>
            </tr>
        </tfoot>
    </table>
</div>
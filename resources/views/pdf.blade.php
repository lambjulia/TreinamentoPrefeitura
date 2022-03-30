<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>PDF RELATORIO</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"
        rel="stylesheet" />
</head>
<style>
    .table-condensed {
        font-size: 13px;
    }

    div {
        margin-top: 10px;
    }
</style>

<body>
    <header>
        <div style="align: center">
            <img width="100" src="{{ URL::to('/imagens/logo.png') }}"
               />
            
                <h4 style="margin-top: 30px">Prefeitura Municipal de São Leopoldo<br /></h4>
                <h4>Secretária Municipal de Desenvolvimento Social</h4>
                <h4>Relatório de protocolo</h4>
        </div>
    </header>
    <div style="align: center">
        <h4 style="margin-top: 50px"><strong></strong><br /></h4>
    </div>
    <table class="table">
        <thead style="align: center">
            <tr>
                
                <th>Contribuinte</th>
                <th>Descrição</th>
                <th>Data</th>
                
               

            </tr>
        </thead>
        <tbody>
            @foreach ($protocolo as $protocolo)
            <tr>
                
                <td>{{$protocolo->contribuinte}}</td>
                <td>{{$protocolo->descricao}}</td>
                <td>{{$protocolo->data}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
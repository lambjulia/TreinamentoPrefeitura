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
            
            
                <h4 style="margin-top: 30px">Prefeitura Municipal de São Leopoldo<br /></h4>
                <h4>Secretária Municipal de Desenvolvimento Social</h4>
                <h4>Relatório de protocolo</h4>
        </div>
    </header>
    <div class="container-fluid no-padding table-responsive-sm" style="align: center">
        <table class="table table-striped nowrap" style="width:100%" id="prefeitura">
            <thead style="align: center">
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Descrição</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach ($protocolo as $protocolo)
                <tr>
                    <td>{{ $protocolo->pessoa_id }}</td>
                    <td>{{ $protocolo->data }}</td>
                    <td>{{ $protocolo->descricao }} </td>
    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
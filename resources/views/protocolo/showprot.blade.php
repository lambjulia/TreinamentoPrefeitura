@extends('layouts.master')
@section('title','Prefeitura')
@section('content')

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <ul class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="tab" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Protocolo</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="tab" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Acompanhamento</button>
    </li>
  </ul>

  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

        <div class="card">
            <div class="card-header">
                
            
            <div class="container col-11">
                <input type="hidden" id="id" class="form-control">
                    <tr>
                        
                        <label for="nome" class="control-label">Nome: *</label>
                        <input type="text" name="pessoa_id"  style="background-color: #fffaface; font-size:1.5em"  class="form-control" readonly value =" {{ $protocolo->pessoa->nome }}"><br>
                        <label for="descricao" class="control-label">Descrição: *</label>
                        <input type="text" name="descricao"  style="background-color: #fffaface; font-size:1.5em"  class="form-control" readonly value =" {{ $protocolo->descricao }}"><br>
                        <label for="data" class="control-label">Data: *</label>
                        <input type="text" name="data"  style="background-color: #fffaface; font-size:1.5em"  class="form-control" readonly  value =" {{ $protocolo->data }}"><br>
                        <label for="prazo" class="control-label">Prazo: *</label>
                        <input type="text" name="prazo"  style="background-color: #fffaface; font-size:1.5em"  class="form-control" readonly   value =" {{ $protocolo->prazo }}"><br>
                        <label for="departamento" class="control-label">Departamento: *</label>
                        <input type="text" name="departamento_id"  style="background-color: #fffaface; font-size:1.5em"  class="form-control" readonly value =" {{ $protocolo->departamento->departamento }}"><br>
        
                    
                      
        
                    </tr>
                  
                    <a class="btn btn-primary" href="{{ route('pdfgenerate', ['id'=>$protocolo->id]) }}">Download PDF</a>
                   
            </div>
            </div>
        </div>
        

    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

 
        <div class="container-fluid no-padding table-responsive-sm">
            <table class="table table-striped nowrap" style="width:100%" id="prefeitura">
                <thead style="align: center">
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Usuário de acompanhamento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acompanhamento as $acompanhamento)
                    <tr>
                        <td>{{ $acompanhamento->data }}</td>
                        <td>{{ $acompanhamento->descricao }} </td>
                        <td>{{ $acompanhamento->user->name }}</td>
                    </tr>
      
                    @endforeach
                <a class="btn btn-primary" href="{{ route('acompanhamento', ['id'=>$protocolo->id]) }}">Registrar acompanhamento</a>
        </tbody>
    </table>
    </div>
  

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  

</body>



@endsection
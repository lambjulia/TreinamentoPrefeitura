@extends('layouts.master')
@section('title','Prefeitura')
@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

<div class="card">
    <div class="card-header">
        
   
   
    <div class="container col-11">
        <input type="hidden" id="id" class="form-control">
            <tr>
                
                <label for="nome" class="control-label">Nome: *</label>
                <input type="text" name="nome"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->nome }}"><br>
                <label for="data_de_nascimento" class="control-label">Data de nascimento: *</label>
                <input type="date" name="data_de_nascimento"  style="background-color: #fffaface" class="form-control"  
                value="{{isset($pessoa->data_de_nascimento) ? date('Y-m-d',strtotime($pessoa->data_de_nascimento)) : old('data_de_nascimento')}}"><br>
                <label for="cpf" class="control-label">CPF: *</label>
                <input type="text" name="cpf"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->cpf }}"><br>
                <label for="Sexo" class="control-label">Sexo: *</label>
                <input type="text" name="sexo"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->sexo }}"><br>
                <label for="cidade" class="control-label">Cidade: *</label>
                <input type="text" name="cidade"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->cidade }}"><br>
                <label for="bairro" class="control-label">Bairro: *</label>
                <input type="text" name="bairro"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->bairro }}"><br>
                <label for="rua" class="control-label">Rua: *</label>
                <input type="text" name="rua"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->rua }}"><br>
                <label for="numero" class="control-label">Número: *</label>
                <input type="text" name="numero"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->numero }}"><br>
                <label for="complemento" class="control-label">Complemento: *</label>
                <input type="text" name="complemento"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->complemento }}"><br>

            </tr>
        
    </div>
    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  

<script>
    $(document).ready(function(){


  $('#cpf').mask('000.000.000-00', {reverse: true});

  });
    </script>

@endsection
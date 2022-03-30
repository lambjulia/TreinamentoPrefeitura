@extends('layouts.master')
@section('title','Prefeitura')
@section('content')

<div class="card">
    <div class="card-header">
        
   
   
    <div class="container col-11">
        <input type="hidden" id="id" class="form-control">
            <tr>
                
                <input type="text" name="nome"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->nome }}"><br>
                <input type="text" name="data_de_nascimento"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->data_de_nascimento }}"><br>
                <input type="text" name="cpf"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->cpf }}"><br>
                <input type="text" name="sexo"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->sexo }}"><br>
                <input type="text" name="cidade"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->cidade }}"><br>
                <input type="text" name="bairro"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->bairro }}"><br>
                <input type="text" name="rua"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->rua }}"><br>
                <input type="text" name="numero"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->numero }}"><br>
                <input type="text" name="complemento"  style="background-color: #fffaface" class="form-control" value =" {{ $pessoa->complemento }}"><br>

            </tr>
        
    </div>
    </div>
</div>


@endsection
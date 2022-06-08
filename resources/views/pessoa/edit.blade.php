@extends('layouts.master')
@section('title','Prefeitura')
@section('content')



<form action="{{ route('alterar_cadastro', $pessoa->id) }}" method="POST" class="form-horizontal" id="formProduto">
    @csrf               
    @method('POST')
    
    <div class="card">
        <div class="card-header">
            <h4 class="col-12 modal-title text-center">Edite Cadastro</h5>
        </div>
        <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

            
            {{--- Formulario Nome ---}}

            <div class="form-group">
                <label for="nome" class="control-label">Nome: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo"
                    value =" {{ $pessoa->nome }}" required>
                </div>
            </div>

            {{--- Formulario data de nascimento Cras ---}}

            <div class="form-group col-md-6">
                <label for="data_de_nascimento" class="control-label">Data de nascimento: *</label>
                <div class="input-group">
                    <input type="date" class="form-control date" id="data_de_nascimento" name="data_de_nascimento"
                    value="{{isset($pessoa->data_de_nascimento) ? date('Y-m-d',strtotime($pessoa->data_de_nascimento)) : old('data_de_nascimento')}}" required>
                </div>
            </div>

            {{--- Formulario cpf Cras ---}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cpf" class="control-label">CPF: *</label>
                    <div class="input-group ">
                        <input type="text" class="form-control cpf" name="cpf" id="cpf"
                            value="{{isset($pessoa->cpf) ? $pessoa->cpf : old('cpf') }}" 
                            placeholder="000.000.000-00" />
                    </div>
                </div>
            </div>
            
                {{--- Formulario sexo Cras ---}}
               
                <div class="col-md-6">
                    <div class="form-group row">
                   <label class="col-md-1 label-control" for="sexo">Sexo :</label>

                   <div class="col-md-8" id="sexo" >

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" required="required" id="masculino"
                    value="masculino" {{ $pessoa->sexo=="masculino" ? 'checked='.'"'.'checked'.'"' : '' }}><br>
                    <label class="form-check-label" for="masculino">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input  class="form-check-input" type="radio" name="sexo" required="required" id="feminino"
                    value="feminino" {{ $pessoa->sexo=="feminino" ? 'checked='.'"'.'checked'.'"' : '' }}><br>
                    <label class="form-check-label" for="feminino">Feminino</label>
                </div>

                    </div>
                            </div>
                        </div>
                
            {{--- Formulario cidade Cras ---}}

            <div class="form-group">
                <label for="cidade" class="control-label">Cidade: </label>
                <div class="input-group">
                    <input type="cidade" class="form-control" name="cidade" id="cidade"
                    value =" {{ $pessoa->cidade }}"
                        placeholder="São Leopoldo" />
                </div>
            </div>
        
            
            
            <div class="form-group">
            <label for="bairro" class="control-label">Bairro: </label>
            <div class="input-group">
                <input type="bairro" class="form-control" name="bairro" id="bairro"
                value =" {{ $pessoa->bairro }}"
                    placeholder="Centro" />
            </div>
             </div>
            
             <div class="form-row">
              <div class="form-group col-md-6">
            <label for="rua" class="control-label">Rua: </label>
            <div class="input-group ">
                <input type="text" class="form-control cpf" name="rua" id="rua"
                value =" {{ $pessoa->rua }}" 
                    placeholder="Sete de Setembro" />
                </div>
             </div>

             <div class="form-group">
                <label for="numero" class="control-label">Número: </label>
                <div class="input-group">
                    <input type="numero" class="form-control" name="numero" id="numero"
                    value =" {{ $pessoa->numero }}"
                        placeholder="81" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="complemento" class="control-label">Complemento: </label>
            <div class="input-group">
                <input type="complemento" class="form-control" name="complemento" id="complemento"
                value =" {{ $pessoa->complemento }}"
                    placeholder="Casa" />
            </div>
        </div>
        </div>
           
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="btn btn-secondary" href="{{ url('tabela') }}">Cancelar</a>
        </div>
    </div>


</form>

</div>
</div>
</div>


<script>
    $(document).ready(function(){


  $('#cpf').mask('000.000.000-00', {reverse: true});

  });
    </script>

@endsection
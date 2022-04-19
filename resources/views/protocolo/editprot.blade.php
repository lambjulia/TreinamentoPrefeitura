@extends('layouts.master')
@section('title','Prefeitura')
@section('content')


<form action="/saveprot" method="POST" class="form-horizontal" id="formProduto">
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
                <label for="descricao" class="control-label">Descrição: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição"
                        value=" {{ $protocolo->descricao }}"  required>
                </div>
            </div>

            {{--- Formulario data de nascimento Cras ---}}

            <div class="form-group col-md-6">
                <label for="data" class="control-label">Data: *</label>
                <div class="input-group">
                    <input type="date" class="form-control date" id="data" name="data"
                        value=" {{ $protocolo->data }}"  required>
                </div>
            </div>

            {{--- Formulario cpf Cras ---}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="prazo" class="control-label">Prazo: *</label>
                    <div class="input-group ">
                        <input type="text" class="form-control cpf" name="prazo" id="prazo" placeholder="Prazo"
                        value =" {{ $protocolo->prazo }}"  required
                             />
                    </div>
                </div>

                <select required="required" style="background-color: #white" class="form-control"  name="pessoa_id" id="">
                    <option  value="">Selecione uma pessoa</option>    
                    @foreach ($pessoa as $p)
                    <option  value="{{ $p->nome }}"> 
                    {{ $p->nome }}
                    </option>
                    @endforeach
                </select> 
        </div>
           
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="btn btn-secondary" href="{{ url('tabelaprotocolo') }}">Cancelar</a>
        </div>
    </div>


</form>

</div>
</div>
</div>

@endsection
<!DOCTYPE html>
<html lang="en">

<form action="{{ route('saveprot')}}" method="POST" class="form-horizontal" id="formProduto" enctype="multipart/form-data">
    @csrf               
    @method('POST')
    
    <div class="card">
        <div class="card-header">
            <h4 class="col-12 modal-title text-center">Novo Cadastro</h5>
        </div>
        <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

            @if ($errors->any())
            <div class='alert alert-danger'>
             @foreach ( $errors->all() as $error )
              <p>{{ $error }}</p>
             @endforeach
            </div>
           @endif
            
            {{--- Formulario Nome ---}}

            <div class="form-group">
                <label for="descricao" class="control-label">Descrição: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição"
                        value="{{isset($cras->descricao) ? $cras->descricao : old('descricao') }}" >
                </div>
            </div>

            {{--- Formulario data de nascimento Cras ---}}

            <div class="form-group col-md-6">
                <label for="data" class="control-label">Data: *</label>
                <div class="input-group">
                    <input type="date" class="form-control date" id="data" name="data"
                        value="{{isset($cras->data) ? $cras->data : old('data') }}">
                </div>
            </div>

            {{--- Formulario cpf Cras ---}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="prazo" class="control-label">Prazo: *</label>
                    <div class="input-group ">
                        <input type="text" class="form-control cpf" name="prazo" id="prazo" placeholder="Prazo"
                            value="{{isset($cras->prazo) ? $cras->prazo : old('prazo') }}" 
                             />
                    </div>
                </div>

                <select required="required" style="background-color: #white" class="form-control"  name="pessoa_id" id="pessoa_id">
                    <option  value="">Selecione uma pessoa</option>    
                    @foreach ($pessoa as $p)
                    <option  value="{{ $p->id }}"> 
                    {{ $p->nome }}
                    </option>
                    @endforeach
                </select> 

        
                <div class="form-group">
                    <input type="file" name="arquivos" class="custom-file-unput" id="arquivos" multiple >
                   
                    
                </div>
              
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


</body>
</html>
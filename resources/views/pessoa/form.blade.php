<!DOCTYPE html>
<html lang="en">

<script src="{{asset('js/validation/validationinfo.js')}}"></script>

<form action="/store" method="POST" class="form-horizontal" id="formProduto">
    @csrf               
    @method('POST')
    
    <div class="card">
        <div class="card-header">
            <h4 class="col-12 modal-title text-center">Novo Cadastro</h5>
        </div>
        <h6 class="col-12 modal-title text-center">Campos com * são obrigatorios</h6>
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">

            
            {{--- Formulario Nome ---}}

            <div class="form-group">
                <label for="nome" class="control-label">Nome: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo"
                        value="{{isset($cras->nome) ? $cras->nome : old('nome') }}">
                </div>
            </div>

            {{--- Formulario data de nascimento Cras ---}}

            <div class="form-group col-md-6">
                <label for="data_de_nascimento" class="control-label">Data de nascimento: *</label>
                <div class="input-group">
                    <input type="date" class="form-control date" id="data_de_nascimento" name="data_de_nascimento"
                        value="{{isset($cras->data_de_nascimento) ? $cras->data_de_nascimento : old('data_de_nascimento') }}" >
                </div>
            </div>

            {{--- Formulario cpf Cras ---}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cpf" class="control-label">CPF: *</label>
                    <div class="input-group ">
                        <input type="text" class="form-control cpf" name="cpf" id="cpf"
                            value="{{isset($cras->cpf) ? $cras->cpf : old('cpf') }}" 
                            placeholder="000.000.000-00" />
                    </div>
                </div>

                {{--- Formulario sexo Cras ---}}

                <div class="form-group">
                    <label for="sexo" class="control-label">Sexo:</label>
                    <div class="input-group">
                        <input type="radio" name="sexo" required="required" value="masculino" id="masculino"><br /> 
                        <label style="font-size:medium" for="masculino">Masculino</label>
                        <input type="radio" name="sexo" required="required" value="feminino" id="feminino"><br />
                        <label style="font-size: medium" for="feminino">Feminino</label>
                        
                   
                </div>
            </div>
        </div>
            {{--- Formulario cidade Cras ---}}

            <div class="form-group">
                <label for="cidade" class="control-label">Cidade: </label>
                <div class="input-group">
                    <input type="cidade" class="form-control" name="cidade" id="cidade"
                        value="{{isset($cras->cidade) ? $cras->cidade : old('cidade') }}"
                        placeholder="São Leopoldo" />
                </div>
            </div>
        
            
            
            <div class="form-group">
            <label for="bairro" class="control-label">Bairro: </label>
            <div class="input-group">
                <input type="bairro" class="form-control" name="bairro" id="bairro"
                    value="{{isset($cras->bairro) ? $cras->bairro : old('bairro') }}"
                    placeholder="Centro" />
            </div>
             </div>
            
             <div class="form-row">
              <div class="form-group col-md-6">
            <label for="rua" class="control-label">Rua: </label>
            <div class="input-group ">
                <input type="text" class="form-control cpf" name="rua" id="rua"
                    value="{{isset($cras->rua) ? $cras->rua : old('rua') }}" 
                    placeholder="Sete de Setembro" />
                </div>
             </div>

             <div class="form-group">
                <label for="numero" class="control-label">Número: </label>
                <div class="input-group">
                    <input type="numero" class="form-control" name="numero" id="numero"
                        value="{{isset($cras->numero) ? $cras->numero : old('numero') }}"
                        placeholder="81" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="complemento" class="control-label">Complemento: </label>
            <div class="input-group">
                <input type="complemento" class="form-control" name="complemento" id="complemento"
                    value="{{isset($cras->complemento) ? $cras->complemento : old('complemento') }}"
                    placeholder="Casa" />
            </div>
        </div>
    </div>
            </body>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a class="btn btn-secondary" href="#">Cancelar</a>
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
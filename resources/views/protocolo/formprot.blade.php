<!DOCTYPE html>
<html lang="en">

<form action="/saveprot" method="POST" class="form-horizontal" id="formProduto" enctype="multipart/form-data">
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
                <label for="descricao" class="control-label">Descrição: *</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição"
                        value="{{isset($cras->descricao) ? $cras->descricao : old('descricao') }}" required>
                </div>
            </div>

            {{--- Formulario data de nascimento Cras ---}}

            <div class="form-group col-md-6">
                <label for="data" class="control-label">Data: *</label>
                <div class="input-group">
                    <input type="date" class="form-control date" id="data" name="data"
                        value="{{isset($cras->data) ? $cras->data : old('data') }}" required>
                </div>
            </div>

            {{--- Formulario cpf Cras ---}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="prazo" class="control-label">Prazo: *</label>
                    <div class="input-group ">
                        <input type="text" class="form-control cpf" name="prazo" id="prazo" placeholder="Prazo"
                            value="{{isset($cras->prazo) ? $cras->prazo : old('prazo') }}" required
                             />
                    </div>
                </div>

                <select required="required" style="background-color: #white" class="form-control"  name="pessoa_id" id="pessoa_id">
                    <option  value="">Selecione uma pessoa</option>    
                    @foreach ($pessoa as $p)
                    <option  value="{{ $p->nome }}"> 
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
            <a class="btn btn-secondary" href="#">Cancelar</a>
        </div>
    </div>


</form>

</div>
</div>
</div>

<script>
    (function() {
        validate.extend(validate.validators.datetime, {
        parse: function(value, options) {
          return +moment.utc(value);
        },
       
        format: function(value, options) {
          var format = options.dateOnly ? "DD-MM-YYYY" : "DD-MM-YYYY hh:mm:ss";
          return moment.utc(value).format(format);
        }
      });

      var constraints = {
        nome: 
          presence: true,
          length: {
            minimum: 5,
            maximum: 100
          },
        },

        var form = document.querySelector("form#main");
      form.addEventListener("submit", function(ev) {
        ev.preventDefault();
        handleFormSubmit(form);
      });

      // Hook up the inputs to validate on the fly
      var inputs = document.querySelectorAll("input, textarea, select")
      for (var i = 0; i < inputs.length; ++i) {
        inputs.item(i).addEventListener("change", function(ev) {
          var errors = validate(form, constraints) || {};
          showErrorsForInput(this, errors[this.nome])
        });
      }

      function handleFormSubmit(form, input) {
        // validate the form against the constraints
        var errors = validate(form, constraints);
        // then we update the form to reflect the results
        showErrors(form, errors || {});
        if (!errors) {
          showSuccess();
        }
      }

      // Updates the inputs with the validation errors
      function showErrors(form, errors) {
        // We loop through all the inputs and show the errors for that input
        _.each(form.querySelectorAll("input[nome], select[nome]"), function(input) {
          // Since the errors can be null if no errors were found we need to handle
          // that
          showErrorsForInput(input, errors && errors[input.name]);
        });
      }

      // Shows the errors for a specific input
      function showErrorsForInput(input, errors) {
        // This is the root of the input
        var formGroup = closestParent(input.parentNode, "form-group")
          // Find where the error messages will be insert into
          , messages = formGroup.querySelector(".messages");
        // First we remove any old messages and resets the classes
        resetFormGroup(formGroup);
        // If we have errors
        if (errors) {
          // we first mark the group has having errors
          formGroup.classList.add("has-error");
          // then we append all the errors
          _.each(errors, function(error) {
            addError(messages, error);
          });
        } else {
          // otherwise we simply mark it as success
          formGroup.classList.add("has-success");
        }
      }
</script>
</body>
</html>
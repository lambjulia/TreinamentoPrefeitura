@extends('layouts.master')
@section('title','Prefeitura')
@section('content')

<div class="card">
    <div class="card-header">
        
   
   
    <div class="container col-11">
        <input type="hidden" id="id" class="form-control">
            <tr>
                
                <input type="text" name="contribuinte"  style="background-color: #fffaface" class="form-control"  value =" {{ $protocolo->contribuinte }}"><br>
                <input type="text" name="descricao"  style="background-color: #fffaface" class="form-control"  value =" {{ $protocolo->descricao }}"><br>
                <input type="text" name="data"  style="background-color: #fffaface" class="form-control"  value =" {{ $protocolo->data }}"><br>
                <input type="text" name="prazo"  style="background-color: #fffaface" class="form-control"  value =" {{ $protocolo->prazo }}"><br>

            </tr>
            <form method="GET" action="/pdf/{id}" enctype="multipart/form-data">
                <div class="form-group">
                 
                 <div class="control">
                 
                     <button type="submit" class="btn btn-primary">Download PDF Relatórios</button>
                 
                 </div>
                 
                </div>
                 
                </form> 
    </div>
    </div>
</div>


@endsection
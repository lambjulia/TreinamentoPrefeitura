@extends('layouts.master')
@section('title','Auditoria')
@section('content')

<body>
    <div class="card">
        <div class="card-header">
            
          
       
        <div class="container col-11">
            <input type="hidden" id="id" class="form-control">
                <tr>
                    
                    <label for="user_id" class="control-label">Responsável: </label>
                    <input type="text" name="user_id"  style="background-color: #fffaface" class="form-control"  value =" {{App\User::whereId($audits->user_id)->pluck('name')}}"><br>
                    <label for="event" class="control-label">Evento: </label>
                    <input type="text" name="event"  style="background-color: #fffaface" class="form-control"  value =" {{ $audits->event}}"><br>
                    <label for="old_values" class="control-label">Dado Antigo: </label>
                    <input type="text" name="old_values"  style="background-color: #fffaface" class="form-control"  value =" {{ $audits->old_values }}"><br>
                    <label for="new_values" class="control-label">Novo Dado: </label>
                    <input type="text" name="new_values"  style="background-color: #fffaface" class="form-control"  value =" {{ $audits->new_values }}"><br>
                    <label for="url" class="control-label">URL: </label>
                    <input type="text" name="url"  style="background-color: #fffaface" class="form-control"  value =" {{ $audits->url }}"><br>
                    <label for="ip_address" class="control-label">IP: </label>
                    <input type="text" name="ip_address"  style="background-color: #fffaface" class="form-control"  value =" {{ $audits->ip_address }}"><br>
                    <label for="created_at" class="control-label">Data/Hora: </label>
                    <input type="text" name="created_at"  style="background-color: #fffaface" class="form-control"  value =" {{ $audits->created_at }}"><br>
                    <label for="updated_at" class="control-label">Data/Hora Update: </label>
                    <input type="text" name="updated_at"  style="background-color: #fffaface" class="form-control"  value =" {{ $audits->updated_at }}"><br>
                   
                </tr>
</body>


@endsection
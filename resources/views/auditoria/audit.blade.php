<body>
    <div class="table" style="margin-top:0;overflow-x: scroll;margin-bottom: 0;">
        <table class="table table-striped nowrap" style="width: 100%; margin-top:0;" id="lista">
            <thead style="align:center">
                <tr>
                    <th>Ver</th>
                    <th>Responsável</th>
                    <th>Data/Hora</th>
                    <th>Dado Antigo</th>
                    <th>Novo Dado</th>
                    <th>Evento</th>
                    <th>IP</th>
                    <th>URL</th>
                </tr>
            </thead>
            <tbody style="align:center">
                @foreach ($audits as $auditoria )
                <tr>
                    <td>
                    <a href="{{ url('showaudit', $auditoria->id) }}" class="btn btn-primary" style="float: right">Ver</a>
                    </td>
                    <td>{{ App\User::whereId($auditoria->user_id)->pluck('name') }}</>
                    <td>{{ date('d-m-Y', strtotime($auditoria->created_at)) }}</td>
                    <td>{{ $auditoria->old_values }}</td>
                    <td>{{ $auditoria->new_values }}</td>
                    <td>{{ $auditoria->event }}</td>
                    <td>{{ $auditoria->ip_address }}</td>
                    <td>{{ $auditoria->url }}</td>
                    
                </tr>

                
                @endforeach
            </tbody>
        </table>
    </div>
</body>

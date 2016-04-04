<h1> Esporte </h1>
<h2> Cadastre um atleta </h2>

{!! Form::open(array('method' => 'post', 'action' => 'Athlete@create')) !!}
    Id do usuário (virá por sessão): {!! Form::text('id') !!}
    |
    Esporte: 
    <select>
        <option value=''></option>
        @if(isset($sportList))
            @foreach($sportList as $sport)
                <option value='{{ $sport->id }}'>{{ $sport->name }}</option>
            @endforeach
        @endif
    </select>
    |
    Status: {!! Form::select('status', array('' => '', '1' => 'Ativo', '2' => 'Inativo', '3' => 'Em espera', '4' => 'Pendente', '5' => 'Temporário')) !!}
    |
    {!!Form::submit('Cadastrar') !!}
{!! Form::close() !!}

<br>
<h2>Campos de busca</h2>

ID | CPF | Nome | Status(combobox) | Deficiência (combobox) 

<h2> Altetas </h2>

<table>
    <tr>
        <th>ID Usuário</th>
        <th>| Nome</th>
        <th>| Esporte</th>
        <th>| Deficiência</th>
    </tr>
    <tr>
        @foreach($athletetList as $athlete)
            <td> {{ $athlete->id   }} </td>
            <td> {{ $athlete->name }} </td>
        @endforeach
    </tr>
</table>

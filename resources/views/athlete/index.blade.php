
Buscar Usuários
<br>
    {!! Form::open(array('method' => 'post', 'action' => array('AthleteController@index'))) !!}
        Id: {!! Form::text('id', '', $attributes = array()) !!}
        Nome: {!! Form::text('name', '', $attributes = array()) !!}
        {!!Form::submit('Buscar') !!}
    {!! Form::close() !!}
<br>

Usuários Comuns
<br>
<br>

<table>
    @foreach($users as $user)
        <tr>
            <td> {{ $user->id }} </td>
            <td> {{ $user->name }} </td> 
            <td>
                <a href="/athlete/create/{{ $user->id }}"> Torna-lo(a) atléta </a>   
            </td>
        </tr>
    @endforeach
</table>

<div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">
    {!! $users->render() !!}
</div>

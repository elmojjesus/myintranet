@extends('layouts.layout')
@section('content')
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
@endsection

<div id="dataTables-example_paginate" class="dataTables_paginate paging_simple_numbers">
    {!! $users->render() !!}
</div>

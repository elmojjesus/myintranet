
<h1> Torando o usuário um atléta </h1>


{!! Form::open(array('method' => 'post', 'action' => array('AthleteController@store', $user->id))) !!}
    
    <h3> Escolha um esporte para {{ $user->name }}</h3>
    Esporte: 
    <select name="sport_id">
        <option value=''></option>
        @if(isset($sports))
            @foreach($sports as $sport)
                <option value='{{ $sport->id }}'>{{ $sport->name }}</option>
            @endforeach
        @endif
    </select>
    |
    Status: {!! Form::select('status_id', array('' => '', '1' => 'Ativo', '2' => 'Inativo', '3' => 'Em espera', '4' => 'Pendente', '5' => 'Temporário')) !!}
    |
    {!!Form::submit('Cadastrar') !!}
{!! Form::close() !!}

@if ( isset($user) )
    @if ( isset($athlete) ) 
        Esportes que já faz:
        @foreach($athlete->sport as $sport)
            {{ $sport->name }}
        @endforeach
    @endif
@endif

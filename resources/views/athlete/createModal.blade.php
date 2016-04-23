
<div class="data-title">
    <h3> Torando o usuário um atleta <i class="fa fa-trophy"></i> </h3>
</div>


{!! Form::open(array('method' => 'post', 'action' => array('AthleteController@store', $user->id), 'name' => 'tornarAtletaForm')) !!}
    
    Escolha o esporte e o respectivo status para <b>{{ $user->name }}</b>

    <br>
    <br>    
    
    <div class="row">
        <div class="col-sm-6">
            Esporte:
                @if( isset($sports) )
                    {!! Form::select('sport_id', 
                                     array('' => '') + $sports,
                                     '',
                                     $attributes = array('class' => 'form-control')) !!}
                @endif
        </div>

        <div class="col-sm-6">
            Status: 
            {!! Form::select('status_id', 
                    array('' => '', '1' => 'Ativo', '2' => 'Inativo', '3' => 'Em espera', '4' => 'Pendente', '5' => 'Temporário'), 
                    '', 
                    $attributes = array('class' => 'form-control')) !!}
        </div>

    </div>

    <!-- ver favoritos salvo para resolver -->
    <div class="data-footer"> 
        <button class="btn btn-primary" onclick="formSubmit(tornarAtletaForm)">Cadastrar atleta</button>  
    </div>

{!! Form::close() !!}

<!-- tirar essa parte e colcoar na listagem -->
@if ( isset($user) )
    @if ( isset($athlete) ) 
        Esportes que já faz:
        @foreach($athlete->sport as $sport)
            {{ $sport->name }}
        @endforeach
    @endif
@endif

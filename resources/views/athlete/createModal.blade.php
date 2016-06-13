
<div class="data-title">
    <h3> Tornando o usuário um atleta <i class="fa fa-trophy"></i> </h3>
</div>


{!! Form::open(array('method' => 'post', 'action' => array('AthleteController@store', $user->id), 'name' => 'tornarAtletaForm')) !!}
    
    Escolha o esporte e o respectivo status para <b>{{ $user->name }}</b>

    <br>
    <br>    
    
    <div class="row">
        <div class='col-sm-12'>
            <center> Status </center>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! Form::select('status_id', 
                    array('' => '') + $status,
                    '', 
                    $attributes = array('class' => 'form-control')) !!}
        </div>
    </div>

    <br>

    <div class="row">
        <div class='col-sm-12'>
            <center> Esportes </center>
        </div>
    </div>
    <div class="manySports">
        
        <div class="template">
            <div class='row'>
                <div class='col-sm-12'>
                        @if( isset($sports) )
                            {!! Form::select('sports[]', 
                                             array('' => '') + $sports,
                                             '',
                                             $attributes = array('class' => 'form-control')) !!}
                        @endif
                </div>
            </div>
        </div>

    </div>

    <!-- ver favoritos salvo para resolver -->
    <div class="data-footer"> 
        <button class="btn btn-primary plus" onclick="addSport()">Adicionar mais um esporte</button>
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

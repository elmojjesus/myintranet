
<div class="data-title">
    <h3> Torando o usuário um funcionário <i class="fa fa-star"></i> </h3>
</div>


{!! Form::open(array('method' => 'post', 'action' => array('EmployeeController@store', $user->id), 'name' => 'formMakeEmployee')) !!}
    
    Escolha o departamento e o respectivo status para <b>{{ $user->name }}</b>

    <br>
    <br>    
    
    <div class="row">
        <div class="col-sm-6">
            Departamento:
                @if( isset($departaments) )
                    {!! Form::select('departament_id', 
                                     array('' => '') + $departaments,
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


    <div class="data-footer"> 
        <button class="btn btn-primary" onclick="formSubmit(formMakeEmployee)">Cadastrar funcionário</button>  
    </div>

{!! Form::close() !!}


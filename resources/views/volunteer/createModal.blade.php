
<div class="data-title">
    <h3> Torando o usuário um voluntário <i class="fa fa-heart"></i> </h3>
</div>


{!! Form::open(array('method' => 'post', 'action' => array('VolunteerController@store', $user->id), 'name' => 'formMakeVolunteer')) !!}
    
    Escolha o departamento e o respectivo status para <b>{{ $user->name }}</b>

    <br>
    <br>    
    <div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">Campo obrigatório não preenchido, por favor verifique!</label>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-sm-6">
            Departamento:
                @if( isset($departaments) )
                    {!! Form::select('departament_id', 
                                     array('' => '') + $departaments,
                                     '',
                                     $attributes = array('class' => 'form-control', 'id' => 'departamento')) !!}
                @endif
        </div>

        <div class="col-sm-6">
            Status: 
            {!! Form::select('status_id', 
                    array('' => '', '1' => 'Ativo', '2' => 'Inativo', '3' => 'Em espera', '4' => 'Pendente', '5' => 'Temporário'), 
                    '', 
                    $attributes = array('class' => 'form-control', 'id' => 'status')) !!}
        </div>

    </div>


    <div class="data-footer"> 
        <button class="btn btn-primary" onclick="validaCampos();">Cadastrar voluntário</button>  
    </div>

{!! Form::close() !!}

<script type="text/javascript">

function validaCampos()
{

   $("#departamento").removeClass('danger');
   $("#status").removeClass('danger');
   $("#erros").addClass('hidden');

   var departamentoValor = $("#departamento").val();
   var status = $("#status").val();

    if (status == "") {
 
        $("#status").addClass('danger');
        $("#erros").removeClass('hidden');
        return false;
    }
    if (departamentoValor == "") {
 
        $("#departamento").addClass('danger');
        $("#erros").removeClass('hidden');
        return false;
    }
    formSubmit(formMakeVolunteer);
    return true;
}


</script>



<div class="data-title">
    <h3> Tornando o usuário um atleta <i class="fa fa-trophy"></i> </h3>
</div>


{!! Form::open(array('method' => 'post', 'action' => array('AthleteController@store', $user->id), 'name' => 'tornarAtletaForm' , 'id' => 'tornarAtletaForm')) !!}
    
    Escolha o esporte e o respectivo status para <b>{{ $user->name }}</b>

    <br>
    <br>    
    <div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">Campo obrigatório não preenchido, por favor verifique!</label>
        </div>
    </div> 
    
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
                    $attributes = array('class' => 'form-control', 'id' => 'status')) !!}
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
                                             $attributes = array('class' => 'form-control', 'id' => 'esportes')) !!}
                        @endif
                </div>
            </div>
        </div>

    </div>

    <!-- ver favoritos salvo para resolver formSubmit(tornarAtletaForm) -->
    <div class="data-footer"> 
        <button class="btn btn-primary plus" onclick="addSport()">Adicionar mais um esporte</button>
        <button class="btn btn-primary" onclick="validaEsporte();">Cadastrar atleta</button>  
    </div>

{!! Form::close() !!}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js" type="text/javascript"></script>

<script type="text/javascript">

function validaEsporte()
{
   $("#esportes").removeClass('danger');
   $("#status").removeClass('danger');
   $("#erros").addClass('hidden');

   var listaEsporte = $("#esportes").val();
   var status = $("#status").val();

    if (status == "") {
        $("#status").addClass('danger');
        $("#erros").removeClass('hidden');
        return false;
    }
    if (listaEsporte == "") {
        $("#esportes").addClass('danger');
        $("#erros").removeClass('hidden');
        return false;
    }
    document.getElementById('tornarAtletaForm').submit();
    return true;
}


</script>


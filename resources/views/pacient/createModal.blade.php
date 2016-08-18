
<div class="data-title">
    <h3> Tornando o usuário um paciente <i class="fa fa-wheelchair"></i> </h3>
</div>


{!! Form::open(array('method' => 'post', 'action' => array('PacientController@store', $user->id), 'name' => 'tornarPacienteForm' , 'id' => 'tornarPacienteForm')) !!}
    
    Escolha o status do paciente e as terapias para <b>{{ $user->name }}</b>

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
            <center> Terapias </center>
        </div>
    </div>
    <div class="manyTherapies">
        
        <div class="template">
            <div class='row'>
                <div class='col-sm-12'>
                        @if( isset($therapies) )
                            {!! Form::select('therapies[]', 
                                             array('' => '') + $therapies,
                                             '',
                                             $attributes = array('class' => 'form-control', 'id' => 'terapias')) !!}
                        @endif
                </div>
            </div>
        </div>

    </div>

    <!-- ver favoritos salvo para resolver formSubmit(tornarPacienteForm) -->
    <div class="data-footer"> 
        <button class="btn btn-primary plus" onclick="addOneMore('Therapies');">Adicionar mais uma terapia</button>
        <button class="btn btn-primary" onclick="validaTerapia();">Cadastrar paciente</button>  
    </div>

{!! Form::close() !!}


<script type="text/javascript">

    function validaTerapia()
    {
       $("#terapias").removeClass('danger');
       $("#status").removeClass('danger');
       $("#erros").addClass('hidden');

       var listaTerapia = $("#terapias").val();
       var status = $("#status").val();

        if (status == "") {
            $("#status").addClass('danger');
            $("#erros").removeClass('hidden');
            return false;
        }
        if (listaTerapia == "") {
            $("#terapias").addClass('danger');
            $("#erros").removeClass('hidden');
            return false;
        }
        document.getElementById('tornarPacienteForm').submit();
        return true;
}


</script>


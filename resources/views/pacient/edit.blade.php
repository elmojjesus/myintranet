    
<div class="data-title">
    <h3> Editando informações do paciente <i class="fa fa-wheelchair"></i> </h3>
</div>



<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <img src="/images/profile/{{ $pacient->user->image ?: 'default-profile.png' }}" width="80" height="80">
            {{ $pacient->user->name }} 
        </div>
            <div class="panel-body">

                <div class="row">
                    {!! Form::open(array('method' => 'post', 'action' => array('PacientController@update', $pacient->id), 'name' => 'updateStatus')) !!}
                    
                    <div class="col-sm-4 middle-align">
                        <div id="dataTables-example_length" class="dataTables_length">
                            Status do paciente:
                        </div>
                    </div>

                    <div class="col-sm-4 middle-align">
                        <div id="dataTables-example_length" class="dataTables_length">
                            
                            <select class="form-control" id="status" name="status_id">
                                @foreach($status as $statu)
                                    <option {{ $statu->id == $pacient->status->id ? 'selected' : '' }} value="{{ $statu->id }}">{{ $statu->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-sm-4 bottom-align">
                        <div id="dataTables-example_length" class="dataTables_length">
                            <button class="btn btn-primary right" onclick="formSubmit(updateStatus)">Alterar Status</button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div clas="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="row">   
                    {!! Form::open(array('method' => 'post', 'action' => array('PacientTherapiesController@destroy', $pacient->id), 'name' => 'destroyPacientTherapies', 'id' => 'destroyPacientTherapies')) !!}
                        <div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">É necessário checar pelo menos uma terapia para exclusão, por favor verifique!</label>
        </div>
    </div>
                        <div class="col-sm-4 middle-align">
                            <div id="dataTables-example_length" class="dataTables_length">
                                Terapias:
                            </div>
                        </div>
                        
                        <div class="col-sm-4  middle-align">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <center>
                                <table>
                                    @foreach ($pacient->pacientTherapy as $key => $pacientTherapy)
                                        @if(  !is_null($pacientTherapy->therapy) )
                                            <tr>  
                                                <td width="90%"> {{ $pacientTherapy->therapy->name }} </td>
                                                <td> {!! Form::checkbox('therapies[]', $pacientTherapy->therapy->id, null, $attributes = array('class' => 'checkTherapy')) !!} </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                </center>
                            </div>
                        </div>
                            
                        <div class="col-sm-4 bottom-align">
                            <div id="dataTables-example_length" class="dataTables_length">
                                
                                <button class="btn btn-primary right" onclick="return validaTerapiaExclusao();">Excluir terapia(s)</button>  
                                
                            </div>
                        </div>
                            
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
               
<div class="row">
    <div clas="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="row">
                            <div id="errosAdd" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">Campo de seleção vazio, por favor, verifique !</label>
        </div>
    </div>
                    <div class='col-sm-12'>
                        <center> Adicionar terapias: </center>
                    </div>
                </div>

                {!! Form::open(array('method' => 'post', 'action' => array('PacientTherapiesController@update', $pacient->id), 'name' => 'addTherapies')) !!}
                <div class="manyTherapies">
                    
                    <div class="template">
                        <div class='row'>
                            <div class='col-sm-12'>
                                    @if( isset($therapies) )
                                        {!! Form::select('therapies[]', 
                                                         array('' => '') + $therapies,
                                                         '',
                                                         $attributes = array('class' => 'form-control addTherapy')) !!}
                                    @endif
                            </div>
                        </div>
                    </div>

                </div>
                {!! Form::close() !!}
                
                <br>

                <div class="row right">
                    <div class="col-lg-12">
                        <button class="btn btn-primary plus" onclick="addTherapy()">+</button>
                        <button class="btn btn-primary" onclick=" return validaTerapiaInclusao();">Salvar terapias</button>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function validaTerapiaExclusao()
{

  $("#erros").addClass('hidden');
  var checado = false;
  var inputs = document.getElementsByClassName('checkTherapy');
  for(var i = 0, l = inputs.length; i < l; ++i) {
    if(inputs[i].checked) {
      checado = true;
      break;
      return checado;
    }
  }
  if(!checado) {
    $("#erros").removeClass('hidden');
    return checado;
  }

}

function validaTerapiaInclusao()
{
  
  $("#errosAdd").addClass('hidden');

  var selecionado = true;
  var inputs = document.getElementsByClassName('addTherapy');
  for(var i = 0, l = inputs.length; i < l; ++i) {
    if(inputs[i].value == "") {
      selecionado = false;
      $("#errosAdd").removeClass('hidden');
      break;
      return selecionado;
    }
  }

  if (selecionado) {
    formSubmit(addTherapies);
    return selecionado;
  }


}


</script>
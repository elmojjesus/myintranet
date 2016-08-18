    
<div class="data-title">
    <h3> Editando informações do atleta <i class="fa fa-trophy"></i> </h3>
</div>



<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <img src="/images/profile/{{ $athlete->user->image ?: 'default-profile.png' }}" width="80" height="80">
            {{ $athlete->user->name }} 
        </div>
            <div class="panel-body">

                <div class="row">
                    {!! Form::open(array('method' => 'post', 'action' => array('AthleteController@update', $athlete->id), 'name' => 'updateStatus')) !!}
                    
                    <div class="col-sm-4 middle-align">
                        <div id="dataTables-example_length" class="dataTables_length">
                            Status do atleta:
                        </div>
                    </div>

                    <div class="col-sm-4 middle-align">
                        <div id="dataTables-example_length" class="dataTables_length">
                            
                            <select class="form-control" id="status" name="status_id">
                                @foreach($status as $statu)
                                    <option {{ $statu->id == $athlete->status->id ? 'selected' : '' }} value="{{ $statu->id }}">{{ $statu->name }}</option>
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
                    {!! Form::open(array('method' => 'post', 'action' => array('AthleteSportsController@destroy', $athlete->id), 'name' => 'destroyAthleteSports', 'id' => 'destroyAthleteSports')) !!}
                        <div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">É necessário checar pelo menos um esporte para exclusão, por favor verifique!</label>
        </div>
    </div>
                        <div class="col-sm-4 middle-align">
                            <div id="dataTables-example_length" class="dataTables_length">
                                Esportes em atividade:
                            </div>
                        </div>
                        
                        <div class="col-sm-4  middle-align">
                            <div id="dataTables-example_length" class="dataTables_length">
                                <center>
                                <table>
                                    @foreach ($athlete->athleteSport as $key => $athleteSport)
                                        @if(  !is_null($athleteSport->sport) )
                                            <tr>  
                                                <td width="90%"> {{ $athleteSport->sport->name }} </td>
                                                <td> {!! Form::checkbox('sports[]', $athleteSport->sport->id, null, $attributes = array('class' => 'checkSport')) !!} </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                </center>
                            </div>
                        </div>
                            
                        <div class="col-sm-4 bottom-align">
                            <div id="dataTables-example_length" class="dataTables_length">
                                
                                <button class="btn btn-primary right" onclick="return validaEsporteExclusao();">Excluir esporte(s)</button>  
                                
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
                        <center> Adicionar esportes: </center>
                    </div>
                </div>

                {!! Form::open(array('method' => 'post', 'action' => array('AthleteSportsController@update', $athlete->id), 'name' => 'addSports')) !!}
                <div class="manySports">
                    
                    <div class="template">
                        <div class='row'>
                            <div class='col-sm-12'>
                                    @if( isset($sports) )
                                        {!! Form::select('sports[]', 
                                                         array('' => '') + $sports,
                                                         '',
                                                         $attributes = array('class' => 'form-control addSport')) !!}
                                    @endif
                            </div>
                        </div>
                    </div>

                </div>
                {!! Form::close() !!}
                
                <br>

                <div class="row right">
                    <div class="col-lg-12">
                        <button class="btn btn-primary plus" onclick="addOneMore('Sports')">+</button>
                        <button class="btn btn-primary" onclick=" return validaEsporteInclusao();">Salvar esportes</button>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

function validaEsporteExclusao()
{

  $("#erros").addClass('hidden');
  var checado = false;
  var inputs = document.getElementsByClassName('checkSport');
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

function validaEsporteInclusao()
{
  
  $("#errosAdd").addClass('hidden');

  var selecionado = true;
  var inputs = document.getElementsByClassName('addSport');
  for(var i = 0, l = inputs.length; i < l; ++i) {
    if(inputs[i].value == "") {
      selecionado = false;
      $("#errosAdd").removeClass('hidden');
      break;
      return selecionado;
    }
  }

  if (selecionado) {
    formSubmit(addSports);
    return selecionado;
  }


}


</script>
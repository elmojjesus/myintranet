    
<div class="data-title">
    <h3> Editando informações do atleta <i class="fa fa-trophy"></i> </h3>
</div>


<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ '/images/profile/' . $athlete->user->image }}" width="80" height="80">
                    </div>
                    <div class="col-md-6">
                        {{ $athlete->user->name }}
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        Esporte
                    </div>
                    <div class="col-md-6">
                        Status no esporte    
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-md-6">
                    <div id="myForm">
                    {!! Form::open(array('method' => 'post', 'action' => array('AthleteController@update', $athlete->id), 'name' => 'editAthlete')) !!}
                        
                    <table>
                            
                            @foreach ($athlete->athleteSport as $key => $athleteSport)
                                {{ $key }}
                                @if(  !is_null($athleteSport->sport) )
                                <tr>
                                    <td> <center> {{ $athleteSport->sport->name }}  </center> </td>
                                    <td>
                                        <select id="status_id{{ $key }}" name="status_id" class="form-control input-sm" disabled>
                                            @foreach($status as $s)
                                                <option {{ isset($athleteSport->status->id) && $athleteSport->status->id == $s->id ? 'selected="selected"' : '' }} value="{{ $s->id }}">{{ $s->name }}
                                                </option>
                                            @endforeach
                                        </select> 
                                    </td>
                                    <td> 
                                        <a onclick="enableInput(status_id{{ $key }})">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach

                        
                        </table>
                        {!! Form::close() !!}
                    </div>
                    </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>

<div class="data-footer"> 
    <button class="btn btn-primary" onclick="formSubmit(editAthlete)">Cadastrar atleta</button>  
</div>
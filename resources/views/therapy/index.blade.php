@extends('layouts.layout')

@section('title')
    Controle terapia <small> / Pacientes / Terapias </small>
@stop

@section('content')
    
    <div class="row">
        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Cadastre uma terapia </div>
                <div class="panel-body">
                        {!! Form::open(array('method' => 'post', 'action' => 'SportController@store')) !!}
                            <div class="form-group">
                                <label> Nome da terapia </label>
                                {!! Form::text('name', '', $attributes = array('class' => 'form-control')) !!}
                                <br>
                                {!! Form::submit('Cadastrar terapia', $attributes = array('class' => 'btn btn-primary')) !!}    
                            </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Terapias já registradas </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                          <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th width="60%">Terapia</th>
                                <th width="20%">Editar</th>
                                <th width="20%">Remover</th>
                            </tr>

                                    <tr>
                                        <td> Banheira</td>
                                        <td style="text-align: center;"> 
                                                 <a class="modal-ajax-link" > 
                                                     <i class="fa fa-pencil"></i> 
                                                 </a> 
                                            </td>
                                        <td style="text-align: center;">
												<a class="modal-ajax-link">
													<i class="fa fa-trash-o"></i>
												</a>
											</td>
                                    </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Fim linha -->
    </div>
        
@stop
@extends('layouts.layout')

@section('title')
    Controle de profissão <small> / Usuário / Profissão </small>
@stop

@section('content')
    
    <div class="row">
        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Cadastre uma profissão </div>
                <div class="panel-body">
                        {!! Form::open(array('method' => 'post', 'action' => 'ProfessionController@store')) !!}
                            <div class="form-group">
                                <label> Profissão </label>
                                {!! Form::text('name', '', $attributes = array('class' => 'form-control', 'maxlength' => '100')) !!}
                                <br>
                                {!! Form::submit('Cadastrar profissão', $attributes = array('class' => 'btn btn-primary')) !!}    
                            </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Profissões já registradas </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th width="60%">Profissão</th>
                                <th width="20%">Editar</th>
                                <th width="20%">Remover</th>
                            </tr>

                                    <tr>
                                        <td> Auxiliar Administrativo</td>
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
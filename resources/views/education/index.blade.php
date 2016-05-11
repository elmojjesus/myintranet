@extends('layouts.layout')

@section('title')
    Controle de educação <small> / Usuário / Educação </small>
@stop

@section('content')
    
    <div class="row">
        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Cadastre um nível de educação </div>
                <div class="panel-body">
                        {!! Form::open(array('method' => 'post', 'action' => 'EducationController@store')) !!}
                            <div class="form-group">
                                <label> Nível de educação </label>
                                {!! Form::text('name', '', $attributes = array('class' => 'form-control', 'maxlength' => '100')) !!}
                                <br>
                                {!! Form::submit('Cadastrar nível', $attributes = array('class' => 'btn btn-primary')) !!}    
                            </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Níveis de educação já registrados </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th width="60%">Nível</th>
                                <th width="20%">Editar</th>
                                <th width="20%">Remover</th>
                            </tr>

                                    <tr>
                                        <td> Ensino Médio</td>
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
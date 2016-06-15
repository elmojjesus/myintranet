@extends('layouts.layout')

@section('title')
    Controle de deficiência <small> / Usuário / Deficiências </small>
@stop

@section('content')
    
    <div class="row">
        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Cadastre uma deficiência </div>
                <div class="panel-body">
                        {!! Form::open(array('method' => 'post', 'action' => 'DeficiencyController@store')) !!}
                        <div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">Campo Nome é obrigatório, por favor verifique!</label>
        </div>
    </div> 
                            <div class="form-group">
                                <label> Nome da deficiência </label>
                                {!! Form::text('name', '', $attributes = array('class' => 'form-control', 'maxlength' => '100', 'id' => 'name')) !!}
                                <br>
                                {!! Form::submit('Cadastrar deficiência', $attributes = array('class' => 'btn btn-primary', 'onclick' => 'return validaCampo();')) !!}    
                            </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Deficiências já registradas </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th width="60%">Deficiência</th>
                                <th width="20%">Editar</th>
                                <th width="20%">Remover</th>
                            </tr>
                                @if($deficiencies->count() > 0)
                                    @foreach($deficiencies as $deficiency)
                                        <tr>
                                            <td>{{ $deficiency->name }}</td>
                                            <td style="text-align: center;"> 
                                                 <a class="modal-ajax-link" data-mfp-src="/deficiency/edit/{{ $deficiency->id }}"> 
                                                     <i class="fa fa-pencil"></i> 
                                                 </a> 
                                            </td>
                                            <td style="text-align: center;">
    						    				<a class="modal-ajax-link" data-mfp-src="/deficiency/delete/{{ $deficiency->id }}">
    												<i class="fa fa-trash-o"></i>
    											</a>
    										</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger">
                                        Nenhuma deficiência cadastrada
                                    </div>
                                @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Fim linha -->
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js" type="text/javascript"></script>

    <script type="text/javascript">
        
        function validaCampo() {
        var isSalvar = true;
        var objCadastro = { name: '#name' };

        for (var i in objCadastro) {
            verificaCampo(objCadastro[i]);
            if (verificaCampo(objCadastro[i])) {
                isSalvar = false;
            }
        }

        if (!isSalvar) {
            $("#erros").removeClass('hidden');
        }
        return isSalvar;
    }


    function verificaCampo(campo) {
        if ($(campo).val() == " " || $(campo).val() == "" || $(campo).val() == undefined ||
            $(campo).val() == "Selecione") {
            $(campo).addClass('danger');
            return true;
        } else {
            $(campo).removeClass('danger');
            return false;
        }
    }


    </script>
        
@stop
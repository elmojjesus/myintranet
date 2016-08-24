@extends('layouts.layout')

@section('title')
    Controle de terapias  
@stop

@section('main_title')
    <small> / Pacientes / Terapias </small>
@stop


@section('content')
<div class="row">

<div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Cadastre uma terapia </div>
                <div class="panel-body">
                        {!! Form::open(array('method' => 'post', 'action' => 'TherapyController@store')) !!}
                        <div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">Campo Nome é obrigatório, por favor verifique!</label>
        </div>
    </div> 
                            <div class="form-group">
                                <label> Nome da terapia </label>
                                {!! Form::text('name', '', $attributes = array('class' => 'form-control', 'maxlength' => '100', 'id' => 'name')) !!}
                                <br>
                                {!! Form::submit('Cadastrar terapia', $attributes = array('class' => 'btn btn-primary', 'onclick' => 'return validaCampo();')) !!}    
                            </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>

 <!-- <div class="col-lg-6">
	<a data-mfp-src="/therapy/create" class="btn btn-primary modal-ajax-link">Adicionar Nova Terapia</a>

</div> -->
 <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"> Terapias já registradas </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover">
                            @if($therapies->count() > 0)
                                @foreach ($therapies as $therapy)
                                    <tr>
                                        <td> {!! $therapy->name !!} </td>
                                        <td> <a class="modal-ajax-link" data-mfp-src="/therapy/edit/{{ $therapy->id }}"> <i class="fa fa-pencil"></i> </a> </td>
                                    </tr>
                                @endforeach  
                            @else
                                Ainda não há terapias cadastradas.
                            @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>
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
        
		
@endsection
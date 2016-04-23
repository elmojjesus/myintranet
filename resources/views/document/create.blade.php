@extends('layouts.layout')
@section('content')
<h2>Cadastrar documento para {{ $user->name }}</h2>
<br/>
<br/>

<div id="erros" class="col-md-12 hidden">
		<div class="form-group">
		<label style="color:#ff0000; text-align: center;">Campo(s) obrigatorio(s) nao preenchidos, por favor verifique!</label>
		</div>
	</div> 

<form method="POST" action="/document/store">
	{{ csrf_field() }}
	<input type="hidden" name="user_id" value="{{ $user->id }}" />
	<div class="col-md-6">
		<div class="form-group">
			<label>RG</label>
			<input type="text" id="rg" name="rg" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>CPF</label>
			<input type="text" id="cpf" name="cpf" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Passaporte</label>
			<input type="text" id="passport" name="passport" class="form-control" />
		</div>
	</div>
	<div class="clearfix"></div>
	<input class="btn btn-primary" onclick="return validaCampo();" type="submit" value="Salvar" />
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js"></script>

<script type="text/javascript">


window.onload = function() {
  //$('sexM').prop('checked', true); 
  document.getElementById('sexM').checked=true;
};


function validaCampo() {
        var isSalvar = true;
        var objCadastro = { rg: '#rg', cpf : '#cpf', passport : '#passport' };

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
        if ($(campo).val() == " " || $(campo).val() == "" || $(campo).val() == undefined
             || $(campo).val() == "Selecione") {
            $(campo).addClass('danger');
            return true;
        } else {
            $(campo).removeClass('danger');
            return false;
        }
    }
    
</script>

@endsection
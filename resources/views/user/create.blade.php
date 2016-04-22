@extends('layouts.layout')
@section('content')
<form  action="/user/store" method="POST">
	{{ csrf_field() }}

	<div id="erros" class="col-md-12 hidden">
		<div class="form-group">
		<label style="color:#ff0000; text-align: center;">Campo(s) obrigatorio(s) nao preenchidos, por favor verifique!</label>
		</div>
	</div> 

	<h2>Cadastrar Usuário</h2>

	<br/>
	<br/>

	<div class="col-md-6">
		<div class="form-group">
		<label>Nome:</label>
		<input type="text" class="form-control" maxlength="200" id="name" name="name" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Email:</label>
		<input type="text" class="form-control" maxlength="200" id="email" name="email" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Senha:</label>
		<input type="password" class="form-control" id="senha" name="password" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Confirmar Senha:</label>
		<input type="password" class="form-control" id="confirmSenha" name="password_confirm" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Deficiência:</label>
		<select name="deficiency_id" id="deficiencia" class="form-control" >	
			@foreach($deficiencies as $deficiency)
				<option value="{{ $deficiency->id }}">{{ $deficiency->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Data de nascimento:</label>
		<input type="text" class="form-control" id="dataNasc" name="birthDate">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Sexo:</label>
		<input type="radio" id="sexM" name="sex" value="M">M	
		<input type="radio" id="sexF" name="sex" value="F">F
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nacionalidade:</label>
		<input type="text" class="form-control" id="nacionalidade" name="nationality">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nome da mãe:</label>
		<input type="text" class="form-control" id="mae" name="mother">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nome do Pai:</label>
		<input type="text" class="form-control" id="pai" name="father">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Escolaridade:</label>
		<select class="form-control" id="educacao" name="education_id">
			@foreach($educations as $education)
				<option value="{{ $education->id }}">{{ $education->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Profissão:</label>
		<select class="form-control" id="profissao" name="profession_id">
			@foreach($professions as $profession)
				<option value="{{ $profession->id }}">{{ $profession->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
<<<<<<< HEAD
		<label>Voluntário:</label>
		<input type="checkbox" class="form-control" id="voluntario" name="voluntary">
=======
			<label>Voluntário:</label>
			<br>
			<label class="checkbox-inline">
	  			Sim <input type="checkbox" name="voluntary"> 
			</label>	
>>>>>>> 1a4eb8c392cb509dced168c355c5fe7110c3a2a1
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Status:</label>
		<select class="form-control" id="status" name="status_id">
			@foreach($status as $s)
				<option value="{{ $s->id }}">{{ $s->name }}</option>
			@endforeach
		</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>RG</label>
			<input type="text" name="rg" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>CPF</label>
			<input type="text" name="cpf" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Passaporte</label>
			<input type="text" name="passport" class="form-control" />
		</div>
	</div>
	<div class="clearfix"></div>
	<input type="submit" onclick="return validaCampo();" class="btn btn-primary" value="Salvar" />
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
        var objCadastro = { name: '#name', email : '#email', profession : '#profissao',
          education : '#educacao', birthDate : '#dataNasc', status : '#status', nationality : '#nacionalidade'
         };

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


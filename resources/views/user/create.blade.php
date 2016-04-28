@extends('layouts.layout')

@section('title')
	 Cadastre um usuário <i class="fa fa-user"></i>
	 <small> / Usuários / Cadastrar </small>
@stop

@section('content')

<div class="row">
	<div clas="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Dados Pessoais</div>
			<div class="panel-body">

<form  action="/user/store" method="POST">
	{{ csrf_field() }}

	<div id="erros" class="col-md-12 hidden">
		<div class="form-group">
		<label style="color:#ff0000; text-align: center;">Campo(s) obrigatorio(s) nao preenchidos, por favor verifique!</label>
		</div>
	</div> 

	                                <!-- DADOS PESSOAIS -->
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
		<input type="text" maxlength="50" class="form-control" id="dataNasc" name="birthDate">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Sexo:</label>
		<br>
		<input type="radio" id="sexM" name="sex" value="M">M	
		<input type="radio" id="sexF" name="sex" value="F">F
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nacionalidade:</label>
		<input type="text" maxlength="250" class="form-control" id="nacionalidade" name="nationality">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nome da mãe:</label>
		<input type="text" maxlength="250" class="form-control" id="mae" name="mother">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nome do Pai:</label>
		<input type="text" maxlength="250" class="form-control" id="pai" name="father">
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

		<!--<label>Voluntário:</label>
		<input type="checkbox" class="form-control" id="voluntario" name="voluntary">
-->
			<label>Voluntário:</label>
			<br>
			<label class="checkbox-inline">
	  			Sim <input type="radio" name="voluntary"> 
			</label>	
			<label class="checkbox-inline">
	  			Não <input type="radio" name="voluntary"> 
			</label>

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

</div>
</div>
</div>
                                    <!-- DOCUMENTOS -->
<div class="panel panel-default">
			<div class="panel-heading">Documentos</div>
			<div class="panel-body">
	<div class="col-md-6">
		<div class="form-group">
			<label>RG</label>
			<input type="text" name="rg" maxlength="20" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>CPF</label>
			<input type="text" maxlength="17" name="cpf" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Passaporte</label>
			<input type="text" maxlength="100" name="passport" class="form-control" />
		</div>
	</div>
	</div>
</div>
                            <!-- ENDEREÇO -->
<div class="panel panel-default">
			<div class="panel-heading">Endereço</div>
			<div class="panel-body">
	<div class="col-md-6">
		<div class="form-group">
			<label>Rua</label>
			<input type="text" maxlength="250" name="street" class="form-control" />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Número</label>
			<input type="text" maxlength="5" name="number" class="form-control" />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Complemento</label>
			<input type="text" maxlength="100" name="complement" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Código Postal</label>
			<input type="text" maxlength="5" name="street" class="form-control" />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Bairro</label>
			<input type="text" maxlength="250" name="number" class="form-control" />
		</div>
	</div>
		<div class="col-md-3">
		<div class="form-group">
			<label>Regional</label>
			<select class="form-control" id="regional" name="regional">
				<option value="Bairro Novo">Bairro Novo</option>
				<option value="Boa Vista">Boa Vista</option>
				<option value="Boqueirão">Boqueirão</option>
				<option value="Cajuru">Cajurú</option>
				<option value="CIC">CIC</option>
				<option value="Fazendinha/Portão">Fazendinha/Portão</option>
				<option value="Matriz">Matriz</option>
				<option value="Pinheirinho">Pinheirinho</option>
				<option value="Santa Felicidade">Santa Felicidade</option>
				<option value="Tatuquara">Tatuquara</option>
			</select> 
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Cidade</label>
			<input type="text" maxlength="250" name="complement" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Estado</label>
			<select name="estado" class="form-control" id="regional" name="regional"> 
		<option value="Selecione">-- Selecione --</option> 
		<option value="ac">Acre</option> 
		<option value="al">Alagoas</option> 
		<option value="am">Amazonas</option> 
		<option value="ap">Amapá</option> 
		<option value="ba">Bahia</option> 
		<option value="ce">Ceará</option> 
		<option value="df">Distrito Federal</option> 
		<option value="es">Espírito Santo</option> 
		<option value="go">Goiás</option> 
		<option value="ma">Maranhão</option> 
		<option value="mt">Mato Grosso</option> 
		<option value="ms">Mato Grosso do Sul</option> 
		<option value="mg">Minas Gerais</option> 
		<option value="pa">Pará</option> 
		<option value="pb">Paraíba</option> 
		<option value="pr">Paraná</option> 
		<option value="pe">Pernambuco</option> 
		<option value="pi">Piauí</option> 
		<option value="rj">Rio de Janeiro</option> 
		<option value="rn">Rio Grande do Norte</option> 
		<option value="ro">Rondônia</option> 
		<option value="rs">Rio Grande do Sul</option> 
		<option value="rr">Roraima</option> 
		<option value="sc">Santa Catarina</option> 
		<option value="se">Sergipe</option> 
		<option value="sp">São Paulo</option> 
		<option value="to">Tocantins</option> 
	</select>
		</div>
	</div>

	</div>
</div>

</div>
	<div class="clearfix"></div>
	<input type="submit" onclick="return validaCampo();" class="btn btn-primary" value="Salvar" />
</form>
</div>


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


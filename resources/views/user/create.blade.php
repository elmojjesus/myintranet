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
		<input type="text" class="form-control" placeholder="Nome Completo" maxlength="200" id="name" name="name" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Email:</label> <label class="hidden" id="lblEmailInvalido" style="color: red"> Email inválido, por favor, verifique
		</label>
		<input type="text" placeholder="exemplo@email.com" class="form-control" onblur="validaEmail();" maxlength="200" id="email" name="email" />
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
		<label>Data de nascimento:</label> <label class="hidden" id="lblDataInvalido" style="color: red"> Data inválida, por favor, verifique
		</label>
		<input type="text" maxlength="10" onblur="validaData(this.value)" placeholder="__/__/____" data-mask="00/00/0000" class="form-control" id="dataNasc" name="birthDate">
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
		<input type="text" maxlength="250" placeholder="Nacionalidade" class="form-control" id="nacionalidade" name="nationality">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nome da mãe:</label>
		<input type="text" maxlength="250" placeholder="Mãe" class="form-control" id="mae" name="mother">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Nome do Pai:</label>
		<input type="text" maxlength="250" placeholder="Pai" class="form-control" id="pai" name="father">
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
	  			Sim <input type="radio" id="volS" name="voluntary"> 
			</label>	
			<label class="checkbox-inline">
	  			Não <input type="radio" id="volN" name="voluntary"> 
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
	<div class="col-md-6">
		<div class="form-group">
		<label>Telefone 1:</label>
		<input type="text" maxlength="14" placeholder="(00) 0000-0000" data-mask="(00) 0000-0000" class="form-control" id="telefone1" name="telephone1">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Telefone 2:</label>
		<input type="text" maxlength="14" placeholder="(00) 0000-0000" data-mask="(00) 0000-0000" class="form-control" id="telefone2" name="telephone2">
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
			<input type="text" id="rg" placeholder="RG" name="rg" maxlength="20" class="form-control numeric" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>CPF</label> <label class="hidden" id="lblCPFInvalido" style="color: red"> CPF inválido, por favor, verifique
		</label>
			<input type="text" maxlength="17" data-mask="000.000.000-00" id="cpf" 
			onblur="validaCPF(this.value)" name="cpf" placeholder="CPF" class="form-control"/>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Passaporte</label>
			<input type="text" maxlength="100" placeholder="Passaporte" id="passport" name="passport" class="form-control numeric" />
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
			<input type="text" maxlength="250" placeholder="Rua" name="street" id="street" class="form-control" />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Número</label>
			<input type="text" maxlength="5" placeholder="Número" name="number" id="number" class="form-control numeric" />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Complemento</label>
			<input type="text" maxlength="100" placeholder="Complemento" name="complement" id="complement" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Código Postal</label>
			<input type="text" maxlength="5" placeholder="Código Postal" name="codPostal" id="codPostal" class="form-control numeric" />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label>Bairro</label>
			<input type="text" maxlength="250" placeholder="Bairro" name="bairro" id="bairro" class="form-control" />
		</div>
	</div>
		<div class="col-md-3">
		<div class="form-group">
			<label>Regional</label>
			<select class="form-control" id="regional" name="regional">
			<option value="Selecione">-- Selecione --</option> 
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
			<input type="text" maxlength="250" placeholder="Cidade" id="cidade" name="cidade" class="form-control" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Estado</label>
			<select name="estado" class="form-control" id="estado"> 
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js" type="text/javascript"></script>

<script type="text/javascript">

window.onload = function() {
  document.getElementById('sexM').checked=true;
  document.getElementById('volN').checked=true;
};

jQuery('.numeric').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

function validaCampo() {
        var isSalvar = true;
        var objCadastro = { name: '#name', email : '#email', profession : '#profissao',
          education : '#educacao', birthDate : '#dataNasc', status : '#status', nationality : '#nacionalidade', cpf : '#cpf', rg : '#rg', street : '#street', bairro : '#bairro', tel1 : '#telefone1', tel2 : '#telefone2', numero : '#number', cidade : '#cidade', estado : '#estado'
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


    function validaEmail(){
    var	emailAddress = $("#email").val();
    if (emailAddress != "") 
    {
    if (!isValidEmailAddress(emailAddress)) {
    	$("#email").addClass('danger');
    	$("#lblEmailInvalido").removeClass('hidden');
    	return true;
    }
    $("#email").removeClass('danger');
    $("#lblEmailInvalido").addClass('hidden');
    return true;
}
$("#email").removeClass('danger');
    $("#lblEmailInvalido").addClass('hidden');
        return true;
    }

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

function validaCPF(cpf) {

$("#lblCPFInvalido").addClass('hidden');
$("#cpf").removeClass('danger');
    cpf = cpf.replace(/[^\d]+/g, '');

    // Elimina CPFs conhecidos como inválidos
    if (cpf == '' ||
        cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999"){
    	$("#lblCPFInvalido").removeClass('hidden');
    	$("#cpf").addClass('danger');
        return false;
}

    // Valida 1o digito
    add = 0;
    for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9))){
    	$("#lblCPFInvalido").removeClass('hidden');
    	$("#cpf").addClass('danger');
        return false;
    }

    // Valida 2o digito
    add = 0;
    for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10))){
    	$("#lblCPFInvalido").removeClass('hidden');
    	$("#cpf").addClass('danger');
        return false;
    }

    return true;
}

function validaData(data) {

$("#lblDataInvalido").addClass('hidden');
$("#dataNasc").removeClass('danger');

var valida = true;

    data = data.replace('_', '');
    data = data.replace('__', '');
    data = data.replace('___', '');
    data = data.replace('____', '');
    data = data.replace('__', '');
    data = data.replace('_', '');

    data = data.split("/");
    dia = data[0];
    mes = data[1];
    ano = data[2];

    if (typeof dia == "undefined" || typeof mes == "undefined" || typeof ano == "undefined")
        valida = false;    

    if ((ano < 1000))
        valida = false;

    if ((mes < 1) || (mes > 12))
        valida = false;
    if ((dia < 1) || (dia > 31))
        valida = false;
    if ((mes == 2) || (mes == 4) || (mes == 6) || (mes == 9) || (mes == 11)) {
        if (dia > 30)
            valida = false;
        if (mes == 2) {
            if (ano % 4 == 0) {
                if (dia > 29)
                    valida = false;
            }
            else if (dia > 28)
                valida = false;
        }
    }
    if (valida == false) 
    {
        $("#lblDataInvalido").removeClass('hidden');
        $("#dataNasc").addClass('danger');
        return false;
    }
    return true;
}


</script>

@endsection


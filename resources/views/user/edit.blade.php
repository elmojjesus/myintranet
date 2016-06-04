
<form action="/user/update/{{ $user->id }}" method="POST">
	<a href="/user/image/upload/{{ $user->id }}">Alterar foto de perfil</a>
	<br>
	<input type="hidden" name="edit" value="xumbalacatualua" >
	{{ csrf_field() }}

	<div id="erros" class="col-md-12 hidden">
		<div class="form-group">
		<label style="color:#ff0000; text-align: center;">Campo(s) obrigatorio(s) nao preenchidos, por favor verifique!</label>
		</div>
	</div> 

<div class="row">
	<div clas="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Dados Pessoais</div>
			<div class="panel-body">

	<div class="col-md-6">
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" class="form-control" maxlength="200" id="name" name="name" value="{{ $user->name }}" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Email:</label> <label class="hidden" id="lblEmailInvalido" style="color: red"> Email inválido, por favor, verifique
		</label>
			<input placeholder="exemplo@email.com" class="form-control" onblur="validaEmail();" maxlength="200" id="email" type="text" name="email" value="{{ $user->email }}" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<label>Deficiência:</label>
			<select name="deficiency_id" class="form-control">
				@foreach($deficiencies as $deficiency)
					<option {{ $deficiency->id == $user->deficiency->id ? 'selected' : '' }} value="{{ $deficiency->id }}" >{{ $deficiency->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Data de nascimento:</label> <label class="hidden" id="lblDataInvalido" style="color: red"> Data inválida, por favor, verifique
		</label>
            <?php $birthDate = \Datetime::createFromFormat('Y-m-d', $user->birthDate); ?>
			<input maxlength="10" onblur="validaData(this.value)" placeholder="__/__/____" data-mask="00/00/0000" type="text" id="birthDate" name="birthDate" class="form-control" value="{{ $birthDate->format('d/m/Y') }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Sexo:</label>
			<input type="radio" name="sex" value="M" {{ $user->sex == 'M' ? 'checked' : '' }}>M	
			<input type="radio" name="sex" value="F" {{ $user->sex == 'F' ? 'checked' : '' }}>F
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Nacionalidade:</label>
			<input maxlength="250" placeholder="Nacionalidade" class="form-control" id="nationality" type="text" name="nationality" value="{{ $user->nationality }}">
		</div>
	</div>
	<br>
	<div class="col-md-6">
		<div class="form-group">
			<label>Nome da mãe:</label>
			<input type="text" name="mother" value="{{ $user->mother }}" class="form-control">
		</div>
	</div>
	<br>
	<div class="col-md-6">
		<div class="form-group">
			<label>Nome do Pai:</label>
			<input type="text" name="father" value="{{ $user->father }}" class="form-control">
		</div>
	</div>
	<br>
	<div class="col-md-6">
		<div class="form-group">
			<label>Escolaridade:</label>
			<select name="education_id" class="form-control">
				@foreach($educations as $education)
					<option {{ $education->id == $user->education->id ? 'selected' : '' }} value="{{ $education->id }}">{{ $education->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Profissão:</label>
			<select name="profession_id" class="form-control">
				@foreach($professions as $profession)
					<option {{ $profession->id == $user->profession->id ? 'selected' : '' }} value="{{ $profession->id }}">{{ $profession->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Voluntário:</label>
			<input type="checkbox" name="voluntary" {{ $user->voluntary ? 'checked' : '' }}>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>RG</label>
			<input type="text" id="rg" placeholder="RG" name="rg" maxlength="20" class="form-control numeric" value="{{ $user->document->rg }}" 	/>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>CPF</label> <label class="hidden" id="lblCPFInvalido" style="color: red"> CPF inválido, por favor, verifique
		</label>
			<input type="text" maxlength="17" data-mask="000.000.000-00" id="cpf" 
			onblur="validaCPF(this.value)" name="cpf" placeholder="CPF" class="form-control" value="{{ $user->document->cpf }}" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Passaporte</label>
			<input type="text" name="passport" class="form-control" value="{{ $user->document->passport }}" />
		</div>
	</div>

	</div>
	</div>
	</div>
	</div>
	</div>
	<input type="submit"  class="btn btn-primary" value="Salvar" />
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js" type="text/javascript"></script>

<script type="text/javascript">

jQuery('.numeric').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

function validaCampo() {
        var isSalvar = true;
        var objCadastro = { name: '#name', email : '#email', birthDate : '#birthDate', nationality : '#nationality', cpf : '#cpf', rg : '#rg'
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

    if (data != "") 
    {

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
    $("#dataNasc").removeClass('danger');
    $("#lblDataInvalido").addClass('hidden');
        return true;
}
    return true;
}

function validaCPF(cpf) {

$("#lblCPFInvalido").addClass('hidden');
$("#cpf").removeClass('danger');
    cpf = cpf.replace(/[^\d]+/g, '');

    if (cpf !="") {

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
    $("#cpf").removeClass('danger');
    $("#lblCPFInvalido").addClass('hidden');
    return treu;
}
    return true;
}

    </script>
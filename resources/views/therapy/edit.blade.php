<form method="POST" action="/therapy/update/{{ $therapy->id }}">

<div class="data-title">
    <h3> Editar terapia <i class="fa fa-trophy"></i> </h3>
</div>

 <div class="row">
    <div class="col-lg-12">
    <div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">Campo Nome é obrigatório, por favor verifique!</label>
        </div>
    </div> 
                <label>Nome</label>
				<input type="name" id="name" name="name" class="form-control" value="{{ $therapy->name }}">
    </div>
  </div>

<div class="data-footer">
    <input class="btn btn-primary" onclick="return validaCampo();" type="submit" value="Editar">
  </div>  
	
</form>

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
        
		
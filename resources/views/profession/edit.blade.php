<div class="data-title">
	<h3>Editar profissão: {{ $profession->name }}</h3>
</div>
<div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">Campo Nome é obrigatório, por favor verifique!</label>
        </div>
    </div> 
<form action="/profession/update/{{ $profession->id }}" method="POST" name="editProfession">
	{{ csrf_field() }}
	<label>Nome da profissão:</label>
	<input type="text" id="name" class="form-control" name="name" value="{{ $profession->name }}" />
</form>

<div class="data-footer">
	<button class="btn btn-primary" onclick="return validaCampo();">Salvar</button>
</div>

    <script type="text/javascript">
        
        function validaCampo() {

       $('#name').removeClass('danger');
       $('#erros').addClass('hidden');

        var Nome = $('#name').val();
        if (Nome == null || Nome == "" || Nome == " ") 
        {
       $('#name').addClass('danger');
       $('#erros').removeClass('hidden');
return false;
        }else
        {
            formSubmit(editProfession);
            return true;
        }
    }


    </script>
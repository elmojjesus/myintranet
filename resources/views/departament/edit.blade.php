@extends('layouts.layout')
<div class="data-title">
	<h3>Editar departamento: {{ $departament->name }}</h3>
</div>
<div id="erros" class="col-md-12 hidden">
        <div class="form-group">
        <label style="color:#ff0000; text-align: center;">Campo Nome é obrigatório, por favor verifique!</label>
        </div>
    </div> 
<form method="POST" name="editDepartament" action="/departament/update/{{ $departament->id }}">
	{{ csrf_field() }}
	<div class="form-group">
		<label>Nome:</label>
		<input type="text" id="name" name="name" value="{{ $departament->name }}">	
	</div>
	<div class="form-group">
		<label>Responsável:</label>
		<select type="text" name="user_id">
			<option value=""></option>
			@foreach($users as $user)
				<option value="{{ $user->id }}" {{ $user->id == $departament->user->id ? 'selected="seletected"' : '' }}>{{ $user->name }}</option>
			@endforeach
		</select>
	</div>
	<input type="submit" onclick="return validaCampo();" class="btn btn-primary" value="Salvar">
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js" type="text/javascript"></script>

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
            formSubmit(editDepartament);
            return true;
        }
    }


    </script>
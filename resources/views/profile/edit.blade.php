
<div class="data-title">
    <h3> Editando informações de acesso</h3>
</div>

{!! Form::open(array('method' => 'post', 'action' => array('ProfileController@update', $profile->id), 'name' => 'editProfile' , 'id' => 'editProfile')) !!}



<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <img src="/images/profile/{{ $profile->user->image ?: 'default-profile.png' }}" width="80" height="80">
            {{ $profile->user->name }} 
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        Edite o tipo de acesso que <b>{{ $profile->user->name }}</b> possui: 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Permissão de acesso:</label>
                        <select class="form-control" id="status" name="role_id">
                            @foreach($roles as $role)
                                <option {{ $role->id == $profile->role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        Edite a senha de acesso de <b>{{ $profile->user->name }}</b>, ou, deixe em branco para manter a senha atual: 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nova senha:</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirmação de senha:</label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                    </div>
                </div>
                <label class="hidden" id="lblPassword" style="color: red">  Senhas não conferem, por favor verifique
            </div>

        </div>
    </div>
</div>    
    
    {!! Form::close() !!}

    <div class="data-footer"> 
         <button class="btn btn-primary" onclick="formSubmit(editProfile)">Salvar</button>
    </div>

<script>
    $('#password').keyup(function() {
        validaSenha();
    });
    $('#password_confirm').keyup(function() {
        validaSenha();
    });

    function validaSenha() {
        if ($('#password').val() != '' && $('#password_confirm').val() != '') {
            if ($('#password').val() != $('#password_confirm').val()) {
                $('#lblPassword').removeClass('hidden');
                $('#password').addClass('danger');
                $('#password_confirm').addClass('danger');
            } else {
                $('#lblPassword').addClass('hidden');
                $('#password').removeClass('danger');
                $('#password_confirm').removeClass('danger');
            }
        }
    }
</script>
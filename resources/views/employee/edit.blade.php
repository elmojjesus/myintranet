
<div class="data-title">
    <h3> Editando informações do funcionário <i class="fa fa-star"></i> </h3>
</div>

{!! Form::open(array('method' => 'post', 'action' => array('EmployeeController@update', $employee->id), 'name' => 'editarFuncionario' , 'id' => 'editarFuncionario')) !!}



<div class="row">
    <div clas="col-lg-12">
        <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{ '/images/profile/' . $employee->user->image }}" width="80" height="80">
            {{ $employee->user->name }} 
        </div>
        <div class="panel-body">
            
        	<div class="row">
	            <div class="col-md-12">
					<div class="form-group">
						Edite o departamento em que <b>{{ $employee->user->name }}</b> trabalha, ou seu respectivo status: 
					</div>
				</div>
			</div>

            <div class="row">

	            <div class="col-md-6">
					<div class="form-group">
						<label>Departamento</label>
						<select name="departament_id" class="form-control">
							<option value=""></option>
							@foreach($departaments as $departament)
								<option value="{{ $departament->id }}" {{ $employee->departament->id == $departament->id ? 'selected="selected"' : '' }}>{{ $departament->name }}</option>
							@endforeach
						</select>
					</div>
				</div>

            	<div class="col-md-6">
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" id="status" name="status_id">
                            @foreach($status as $statu)
                                <option {{ $statu->id == $employee->status->id ? 'selected' : '' }} value="{{ $statu->id }}">{{ $statu->name }}</option>
                            @endforeach
                        </select>
					</div>
				</div>

            </div>

        </div>
	</div>
</div>    
	
	{!! Form::close() !!}

	<div class="data-footer"> 
		 <button class="btn btn-primary" onclick="formSubmit(editarFuncionario)">Salvar</button>
    </div>
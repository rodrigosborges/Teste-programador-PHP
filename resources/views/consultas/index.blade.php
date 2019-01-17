@extends('layout.main')
@section('title','Formulário')

@section('content')

<div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 mt-3">
	<div class="content-div">
		<div class="card">
			<div class="card-header">
				<h4>Consultas</h4>
			</div>
			<div class="card-body">
				<form action="pesquisar" id="form" method="POST">
					@csrf
					<div class="row">
						<div class="form-group col-md-6">
							<label>Médicos</label>
							<div class="input-group">
								<select type="text" name="nomeMedico[]" multiple="multiple" class="form-control selectpicker" data-selected-text-format="value">										
									@foreach($medicos as $medico)
										<option value="{{$medico->nome}}">{{$medico->nome}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="form-group col-md-3">
							<label>De</label>
							<div class="input-group">
								<input type="text" name="de" class="form-control data">
							</div>
						</div>
						<div class="form-group col-md-3">
							<label>Até</label>
							<div class="input-group">
								<input type="text" name="ate" class="form-control data">
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-mapes btn-block" id="sendForm">Pesquisar</button>
				</form>

				<div id="results"></div>
			</div>
		</div>
	</div>
</div>

@stop

@section('js')
	<script type="text/javascript" src="{{ url('js/views/consulta.js') }}"></script>
@stop
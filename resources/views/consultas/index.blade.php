@extends('layout.main')
@section('title','Formulário')

@section('content')

<div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-8 offset-lg-2 mt-3">
	<div class="content-div">
		<div class="card">
			<div class="card-header">
				<h4>Início</h4>
			</div>
			<div class="card-body">
				<form action="pesquisar" id="form" method="POST">
					@csrf
					<div class="row">
						<div class="form-group col-md-8">
							<label>Nome do médico</label>
							<div class="input-group">
								<input type="text" name="nomeMedico" class="form-control">										
							</div>
						</div>
						
						<div class="form-group col-md-4">
							<label>Período</label>
							<div class="input-group">
								<input type="text" name="periodo" class="form-control data">
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-info btn-block" id="sendForm">Pesquisar</button>
				</form>

				<div id="results"></div>
			</div>
		</div>
	</div>
</div>

@stop

@section('js')

	<script>
		search = (url) => {
			$.ajax({
				type: "GET",
				url: url,
				data: $("#form").serialize(),
				success: function (data) {
					$("#results").html(data)
				},
				error: function (jqXHR, exception) {
					$("#results").html("<div class='alert alert-danger'>Desculpe, ocorreu um erro. <br> Recarregue a página e tente novamente</div>")
				},
  			})
		}

		$("#sendForm").on("click",function() {
			search(`${main_url}/pesquisar`)
		})

		$('#results').on('click', 'ul.pagination a', function(e){
     		e.preventDefault()
      		search($(this).attr('href'))
    	})
	</script>

@stop
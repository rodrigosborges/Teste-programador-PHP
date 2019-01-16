$(document).ready(function(){
    	
	$('#form').validate({
		rules: {
			"placa[]": {
				placa: ($("#form").attr("estrageiro") == 0),
				unique_array_table: "placaveiculo",
			},
			"tipo_veiculo_id[]": {
			},
			"documentos[cadastur][]": {
				multiple_extensions: 'jpg|jpeg|png|pdf',
				files_size: "3000",
			},
			"documentos[veiculo][]": {
				multiple_extensions: 'jpg|jpeg|png|pdf',
				files_size: "3000",
			},
			"documentos[regularidade][]": {
				multiple_extensions: 'jpg|jpeg|png|pdf',
				files_size: "3000",
			}
		},
		messages:{}
    })
})
$(document).ready(function(){
	var idViagem = null;
	var idUser = null;

	if($('#form').attr('data-viagem_id')){
		idViagem = $('#form').attr('data-viagem_id');
		var data = $('#date_id').val();
		var dia = data.substr(0, 2);
		var mes = data.substr(3, 2);
		var ano = data.substr(6, 4);
	}

	if($('#form').attr('data-user_id'))
		idUser = $('#form').attr('data-user_id');
		
	$('#form').validate({
		rules: {
			// DADOS PESSOAIS
			"pessoa[nome]": {
				minlength: 3,
				maxlength: 100,
			},
			// DOCUMENTOS
			"pessoa[cpf]": {
				verificaCPF: true,
			},
			// VALORES
			"numeroPessoas":{
				min:1
			},
			"numeroVeiculos":{
				min:1
			},
			//DATAS
			"chegada":{
				validaDataLivre: true,
				minDate: (idUser ? new Date(Date.now()).toLocaleString().slice(0,10) :((idViagem)?new Date(ano,mes,dia).toLocaleString().slice(0,10): new Date(Date.now()).addDays(10).toLocaleString().slice(0,10))),
			},
			"saida":{
				validaDataLivre: true,
				minDate: (idUser ? new Date(Date.now()).toLocaleString().slice(0,10) : new Date(Date.now()).addDays(10).toLocaleString().slice(0,10)),
				minDateCompare: 'chegada',
			},
			// CONTATO
			"pessoa[contato][email]": {				
				email: true,
				// remote: main_url + 'unique/usuarios/email/null/'+idViagem,
			},
			"pessoa[contato][telefone]": {
				telefone:true,
			},
			"pessoa[contato][celular]": {
				telefone:true,
			},
			"empresa[contato][email]": {
				email:true,
			},
			"empresa[contato][telefone]": {
				telefone:true,
			},
			"documentos[solicitante]": {
				extension: 'jpg|jpeg|png|pdf',
				files_size: "3000",

			},
			"anexo[]" :{
				multiple_extensions: 'jpg|jpeg|png|pdf',
				files_size: "3000",

			},
			"estacionamento_anexos[]" :{
				multiple_extensions: 'jpg|jpeg|png|pdf',
				files_size: "3000",
			},
		},
		messages:{
			"numeroPessoas":{
				min: "O valor do campo deve ser maior que 0."
			},
			"numeroVeiculos":{
				min: "O valor do campo deve ser maior que 0."
			}
		}
	})
})
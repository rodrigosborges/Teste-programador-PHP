search = (url) => {
    setLoading($("#results"))
    $.ajax({
        type: "POST",
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
    if($("#form").valid())
        search(`${main_url}/pesquisar`)
})

$('#results').on('click', 'ul.pagination a', function(e){
    e.preventDefault()
    search($(this).attr('href'))
})

$(document).ready(() => {
    search(`${main_url}/pesquisar`)
})



//validator
$(document).ready(function(){
	$('#form').validate({
		rules: {			
            "de":{
                validaDataLivre: true,
            },
            "ate":{
                validaDataLivre: true,
            },
		},
		messages:{}
    })
})
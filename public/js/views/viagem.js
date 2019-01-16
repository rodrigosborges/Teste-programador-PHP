$("#aceitar").on("click",function(){
    $('#confirmModal').modal('toggle');
    $("#accept_terms").val($('#form').attr('data-accept_terms'));
})

function especificar(input, outros, target){
    var values = $("select[name='"+input+"']").val()
    target = $("#"+target)
    if(values.includes(String(outros))){
        target.show()
        target.find("input").addClass("required").prop('disabled',false)
    }else{
        target.hide()
        target.find("input").removeClass("required").prop('disabled',true)
    }
}

function estacionamento(){
    var val = $('input[name=estacionamento_proprio]:checked').val()
    var divfalse = $(".estacionamento_false")
    var divtrue = $(".estacionamento_true")
    var file = $("input[name=estacionamento_proprio_file]")
    if(val == 1){
        divfalse.hide();
        divtrue.show();
        divfalse.find("select").removeClass("required").prop("disabled",true)
        divtrue.find("input:file").addClass(file.length == 0 ? "required" : "").prop("disabled",false)
    }else{
        divtrue.hide();
        divfalse.show();    
        divfalse.find("select").addClass("required").prop("disabled",false)
        divtrue.find("input:file").removeClass("required").prop("disabled",true)
    }
}

$(".send-form").on('click',function(){
    if($("#form").valid()){
        $(".send-form").prop("disabled",true) 
        $("#form").submit()  
    } 
})


$(document).ready(function(){
    $('#confirmModal').modal('toggle');
    estacionamento();
    tipo_estacionamento($("[name='chegada']").val().length == 10 && $("[name='chegada']").val() == $("[name='saida']").val())

    $("input:radio[name='tipo_estacionamento']").on("change", function() {
        if($('input[name=tipo_estacionamento]:checked').val() == 0){
            $(".estacionamento").hide()
            $(".estacionamento").find("input:file, select, radio").removeClass("required").prop('disabled',true)
        }else{
            $(".estacionamento").show()
            $(".estacionamento").find("input:file, select, radio").addClass("required").prop('disabled',false)
            estacionamento();
        }
    })

    function outro_pais(div, div2, name, val){
        if(val == 1){
            $("#cpf").unmask();
            $("#cpf").attr('maxlength',20);

            $( "#cpf" ).rules( "remove" );
            $( "#cpf" ).rules( "add", { maxlength: 20,  });

            $(div).show()
            $(div).find("input:text").addClass("required")
            $(div2).hide()
            $(div2).find("input:select").removeClass("required")
        }else{
            $("#cpf").mask("999.999.999-99");
            $( "#cpf" ).rules( "remove" );
            $( "#cpf" ).rules( "add", { verificaCPF: true,});

            $(div).hide()
            $(div).find("input:text").removeClass("required")
            $(div2).show()
            $(div2).find("input:select").addClass("required")
        }
    }
    

    $("[name='chegada']").on("change", function() {
        tipo_estacionamento($(this).val().length == 10 && $(this).val() == $("[name='saida']").val())
    })

    $("[name='saida']").on("change", function() {
        tipo_estacionamento($(this).val().length == 10 && $(this).val() == $("[name='chegada']").val())    
    })

    function tipo_estacionamento(bol){
        if(bol){
            $(".tipo_estacionamento").show()
            $(".tipo_estacionamento").find("input:file, select, radio").addClass("required").prop('disabled',false)
            if($('input[name=tipo_estacionamento]:checked').val() == 0){
                $(".estacionamento").hide()
                $(".estacionamento").find("input:file, select, radio").removeClass("required").prop('disabled',true)
            }else{
                $(".estacionamento").show()
                $(".estacionamento").find("input:file, select, radio").addClass("required").prop('disabled',false)
                estacionamento();
            }
        }else{
            $(".tipo_estacionamento").hide()
            $(".tipo_estacionamento").find("input:file, select, radio").removeClass("required").prop('disabled',true)
            $(".estacionamento").show()
            $(".estacionamento").find("input:file, select, radio").addClass("required").prop('disabled',false)
            estacionamento();
        }
    }

    $("input[name=estacionamento_proprio]").on('change',function(){
        estacionamento();
    })

    $("input[name=roteiro_predefinido]").on('change',function(){
        if($(this).val() == 1){
            $(".roteiro").show()
            $(".roteiro").find("input").addClass("required").prop('disabled',false)
        }else{
            $(".roteiro").hide()
            $(".roteiro").find("input").removeClass("required").prop('disabled',true)
        }
    })
    
    $("input[name=primeira_vez]").on('change',function(){
        if($(this).val() == 0){
            $(".primeira_vez").show()
            $(".primeira_vez").find("select").addClass("required").prop('disabled',false)
        }else{
            $(".primeira_vez").hide()
            $(".primeira_vez").find("select").removeClass("required").prop('disabled',true)
        }
    })
    
    $("input[name=organizacao_id]").on('change',function(){
        if($(this).val() == 1){
            $(".empresa").show()
            $(".empresa").find("input:text, select").not("input[name='empresa[site]']").addClass("required")
        }else{
            $(".empresa").hide()
            $(".empresa").find("input:text, select").removeClass("required")
        }
    })

    $(document).on('change', 'select[name="estado"]', function() {
        findElements($('select[name="estado"]').val(), $('select[name="cidade_origem"]'), 'Estado', 'cidades', 3388)
    });
    
    $(document).on('change', 'select[name="empresa[estado]"]', function() {
        findElements($('select[name="empresa[estado]"]').val(), $('select[name="empresa[cidade_id]"]'), 'Estado', 'cidades', 3388)
    });

    outro_pais('.pais','.localizacao','pais', $("input[name='outro_pais']:checked").val())
    outro_pais('.empresa_pais','.empresa_localizacao','empresa[pais]', $("input[name='empresa_outro_pais']:checked").val())

    $("input[name='empresa_outro_pais']").on('change', function() {
        outro_pais('.empresa_pais','.empresa_localizacao','empresa[pais]', $("input[name='empresa_outro_pais']:checked").val())
    })

    $("input[name='outro_pais']").on('change', function() {
        outro_pais('.pais','.localizacao','pais', $("input[name='outro_pais']:checked").val())
    })

    $("input[name='pessoa[cpf]']").on('focusout',function(){
        var cpf = $(this).val().replace(/\D/g,'');
        if(cpf.length == 11){
            $.get(window.location.origin+"/turismo/ajax/dadosResponsavel/"+cpf, function(data){
                console.log(data)
                if(data){
                    //dados pessoas
                    $('input[name="pessoa[nome]"]').val(data.pessoa.nome)
                    $('input[name="pessoa[contato][email]"]').val(data.contato.email)
                    $('input[name="pessoa[contato][telefone]"]').val(data.contato.telefone)
                    $('input[name="pessoa[contato][celular]"]').val(data.contato.celular)

                    //dados visitantes
                    $('input[name="pais"]').val(data.viagem.pais)
                    $(`select[name="estado"]`).val(data.viagem.estado).change()
                    setTimeout(() => {
                        $(`select[name="cidade_origem"]`).val(data.viagem.cidade_origem).change()
                    },1000)

                    //dados organização da viagem
                    $("[name='organizacao_id']").filter(`[value=${data.viagem.organizacao_id}]`).prop('checked', true).change()
                    if(data.empresa){
                        $('input[name="empresa[nome]"]').val(data.empresa.nome)
                        $('input[name="empresa[contato][email]"]').val(data.empresa.contato.email)
                        $('input[name="empresa[contato][telefone]"]').val(data.empresa.contato.telefone)
                        $('input[name="empresa[site]"]').val(data.empresa.site)
                        $("[name='empresa_outro_pais']").filter(`[value=${data.empresa.pais ? 1 : 0}]`).prop('checked', true).change()
                        $('input[name="empresa[pais]"]').val(data.empresa.pais)
                        if(!data.empresa.pais){
                            $(`select[name="empresa[estado]"]`).val(data.empresa.estado).change()
                            setTimeout(() => {
                                $(`select[name="empresa[cidade_id]"]`).val(data.empresa.cidade_id).change()
                            },1000)
                        }
                    }
                    $('[name="primeira_vez"]').filter(`[value=${data.viagem.primeira_vez}]`).prop('checked', true).change();
                    $(`select[name="quantidade_vez_id"]`).val(data.viagem.quantidade_vez_id).change()
                    $(`select[name="tipovisitante[]"]`).val(data.perfil_visitante.map(a => a.pivot.tipo_visitante_id)).change()
                    $(`select[name="tipodestino[]"]`).val(data.destinos.map(a => a.pivot.tipo_destino_id)).change()
                    $(`select[name="tiporefeicao[]"]`).val(data.refeicoes.map(a => a.pivot.tipo_refeicao_id)).change()
                    $(`select[name="tipoatrativo[]"]`).val(data.atrativos.map(a => a.pivot.tipo_atrativo_id)).change()
                    $(`select[name="tipomotivo[]"]`).val(data.motivos.map(a => a.pivot.tipo_motivo_id)).change()
                    $(`input[name="especificar_atrativo"]`).val(data.atrativos[0].pivot.especificar)
                    $(`input[name="especificar_destino"]`).val(data.destinos[0].pivot.especificar)
                    $(`input[name="especificar_refeicao"]`).val(data.refeicoes[0].pivot.especificar)
                    $(`input[name="especificar_motivo"]`).val(data.motivos[0].pivot.especificar)
                    $(`input[name="especificar_visitante"]`).val(data.perfil_visitante[0].pivot.especificar)
                    $('[name="roteiro_predefinido"]').filter(`[value=${data.viagem.roteiro_predefinido}]`).prop('checked', true).change();
                    $(`input[name="roteiro_especificar"]`).val(data.viagem.roteiro_especificar)
                }
            })
        }
    })

})
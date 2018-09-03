$(document).ready(function(){
    form = $("#cadastrar .form-row, #atualizar-user .form-row");
    nivel = "";
    liberar_input = $("#trab_cad, #pne_cad, #cep_cad");
    
    liberar_input.each(function(){
        switch($(this).attr("id")){
            case "trab_cad":
                if($("option:selected", $(this)).val() == 'sim'){
                    $("#cip_cad").removeAttr('disabled');
                }
            break;
            
            case "pne_cad":
                if($("option:selected", $(this)).val() == 'sim'){
                    $("#pneo_cad_label").css("display", "block");
                }else{
                    $("#pneo_cad_label").css("display", "none");
                }
            break;
            
            case "cep_cad":
                var k = $(this).val();
                
                if(k.length == 9){
                    pesquisacep(k);
                }
            break;
        }
    });
    
    $("#cep_cad, #num_cepUser").on("keyup", function(){
        var k = $(this).val();
        
        if(k.length == 9){
            $("#rua_cad, #bairro_cad, #cid_cad, #est_cad").val("CARREGANDO...").css({"background":"#00aeff", "color":"#FFF"});
            pesquisacep(k);
        }
    });
    
    controlCad();
});

function controlCad(){
    form.eq(0).css('display', 'flex');
    nivel = form.eq(0).attr('nivel');
    
    //Avança as telas até cadastrar
    $('.btnNivel').click(function(){
        nivel = parseInt($(this).attr('nivel')) + 1;
        
        if(nivel > 2){
            cadastrarUsuario();
        }else{
            animCad(nivel);
        }
    });
    
    $('.btnVoltar').click(function(){
        nivel = parseInt($(this).attr('nivel')) - 1;

        animCad(nivel);
    });
    
    $("#trab_cad").change(function() {
        if($("option:selected", this).val() == 'sim'){
            $("#cip_cad").removeAttr('disabled');
        }else{
            $("#cip_cad").attr('disabled', 'disabled');
        }
    });
    
    $("#pne_cad").change(function() {
        if($("option:selected", $(this)).val() == 'sim'){
            $("#pneo_cad_label").css("display", "block");
        }else{
            $("#pneo_cad_label").css("display", "none");
        }
    });
}

function animCad(nivel){
    form.animate({
        marginLeft: '15px',
        opacity: '0',
        
    }, 200, function(){
        form.css('display', 'none');
        form.eq(nivel).css('display', 'flex');
    });
    
    form.animate({
        marginLeft: '0px',
        opacity: '1'
        
    },200);
}
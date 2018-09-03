function controlCad(){
    form.eq(0).css('display', 'flex');
    nivel = form.eq(0).attr('nivel');
    
    //Avança as telas até cadastrar
    $('.btnNivel').click(function(event){
        
        nivel = parseInt($(this).attr('nivel')) + 1;
        
        if(nivel > 2){
            loading_screen();
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

function exibirTelaAcesso(){
    $('#btnUserDesl, .btn-curso-acesso').click(function(e){
        e.preventDefault();
        loading_screen();
        
        var modal = $('<div>',{
            class: 'modal',
            style: 'background: linear-gradient(to bottom, rgba(0,0,0,0.62) 0%,rgba(0,0,0,0.66) 51%,rgba(0,53,0,0.69) 99%,rgba(0,53,0,0.69) 100%);',
        }).appendTo('body');
        
        //CARREGA O CONTEÚDO DO MODAL
        modal.load(base_url+"Usuario/exibirTelaAcesso", function(){
            removerLoadingScreen();
            
            form = $("#cadastrar .form-row");
            nivel = "";
            liberar_input = $("#trab_cad, #pne_cad, #cep_cad");
        
            var liberar_input = $("#ig_trabUser, #ds_pneUser, #num_cepUser, #cd_cipUser");
        
            //verifica os dados no momento que a página carrega
            liberar_input.each(function(){
                switch($(this).attr("id")){
                    case "ig_trabUser":
                        if($("option:selected", $(this)).val() == 'sim'){
                            $("#cd_cipUser").removeAttr("disabled");
                        }else{
                             $("#cd_cipUser").attr("disabled", "disabled");
                        }
                    break;
                    
                    case "ds_pneUser":
                        if($("option:selected", $(this)).val() == 'sim'){
                            $("#pneo_cad_label").css("display", "block");
                        }else{
                            $("#pneo_cad_label").css("display", "none");
                        }
                    break;
                    
                    case "num_cepUser":
                        var k = $(this).val();
                        
                        if(k.length == 9){
                            pesquisacep(k);
                        }
                    break;
                }
            });
        
            //alteração nos campos do formulário automatico
            $("#num_cepUser").on("keyup", function(){
                var k = $(this).val();
                
                if(k.length == 9){
                    $("#ds_ruaUser, #ds_bairroUser, #ds_cidUser, #ds_estUser").val("CARREGANDO...").css({"background":"#00aeff", "color":"#FFF"});
                    pesquisacep(k);
                }else{
                    $("#ds_ruaUser, #ds_bairroUser, #ds_cidUser, #ds_estUser, .form-row[nivel=1] .btnNivel").attr("disabled", "disabled");
                }
            });
            
            $("#ig_trabUser").change(function() {
                if($("option:selected", this).val() == 'sim' || $("option:selected", $(this)).val() == null){
                    $("#cd_cipUser").removeAttr('disabled');
                }else{
                    $("#cd_cipUser").attr('disabled', 'disabled');
                }
            });
            
            $("#ds_pneUser").change(function() {
                if($("option:selected", $(this)).val() == 'sim'){
                    $("#pneo_cad_label").css("display", "block");
                }else{
                    $("#pneo_cad_label").css("display", "none");
                }
            });
            
            //FUNÇÕES A SEREM CARREGADAS APÓS A PÁGINA SER CRIADA
            close_modal();
            controlCad();
            logarUsuario();
            recuperarSenha();
            mask();
        });
    });
}

function logarUsuario(){
    $('.btn-logar-usuario').click(function(event){
        event.preventDefault();
        loading_screen();
        
        var login = $('#log_log').val();
        var senha = $('#sen_log').val();
        
        $.ajax({
            url: base_url+"Usuario/logarUsuario",
            method: 'POST',
            data: {'log_log':login, 'sen_log':senha},
            
            success: function(result){
                result = JSON.parse(result);
                
                if(result.tipo == "confirm"){
                    window.location.reload();
                }else{
                    msgBox(result);
                }
            },
        });
    });
}

function cadastrarUsuario(){
    var input = $("#cadastrar input, #cadastrar select");
    
    var data = {};
    
    $.each(input, function(){
        data[$(this).attr("id")] = $(this).val();
    });
    
    //configurando dados antes de passar pro servidor
    data['num_cepUser'] = data['num_cepUser'].replace(/[^0-9]/g, "");
    data['cd_cpfUser'] = data['cd_cpfUser'].replace(/[^0-9]/g, "");
    data['cd_telUser'] = data['cd_telUser'].replace(/[^0-9]/g, "");
    data['cd_celUser'] = data['cd_celUser'].replace(/[^0-9]/g, "");
    data['cd_rgUser'] = data['cd_rgUser'].replace(/[^0-9]/g, "");
    
    $.when(
        $.ajax({
            url: base_url+'Usuario/cadastrarUsuario',
            method: 'POST',
            data: data,
            async: false,
            
            success: function(result){
                var result = JSON.parse(result);
                
                input.removeAttr("style");
                input.siblings("span").html("");
                
                if(result.tipo == "error"){
                    $.each(result.campos[0], function(key, value){
                        var input = $("#"+key);
                        
                        input.css({"background":"#FF4F4C", "color":"#FFF"});
                        input.siblings("span").html(value);
                    });
                    
                    msgBox(result);
                }else{
                    $('#cadastrar input').val("");
                    $('#cadastrar select').eq(0).prop('selected', true);
                    msgBox(result);
                }
            },
        })
    );
    
    removerLoadingScreen();
}

function recuperarSenha(){
    $('.btn-recuperar-senha').click(function(e){
        loading_screen();
        e.preventDefault();
        
        var boxMsg = {
            'tipo': 'text',
            'titulo': 'RECUPERAÇÃO DE SENHA!',
            'msg': 'Digite o e-mail que você pretende recuperar...',
        };
        
        msgBox(boxMsg, verificarEmail);
    });
}

function verificarEmail(){
    $('#btnText').click(function(){
        loading_screen();
        var email = $('#cptText').val();
        
        if(email != ""){
            $.ajax({
                url: base_url+"Usuario/verificarEmail",
                method: 'POST',
                data: {'ds_emailUser':email},
                
                success: function(result){
                    var result = JSON.parse(result);
                    
                    msgBox(result);
                },
            });
        }else{
            var box = {
                    'tipo':'error',
                    'titulo':'E-MAIL EM BRANCO',
                    'msg':'O campo não foi preenchido',
                };
                
            msgBox(box);    
        }
    });
}
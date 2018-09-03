$(document).ready(function(){
    atualizarDados();
    alterarSenha();
    cadastrarEmCurso();
    adicionarItemCarrinho();
    verificarDesconto();
    removerItemCarrinho();
    finalizarCompra();
    alterarFoto();
    setarDadosUsuarioFormAtualizar();
    mask();
    
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
});

function atualizarDados(){
    var funcao = function(){
        loading_screen();
        
        var input = $("form input[type!='file'], form select");
    
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
        
        //CONSTRUINDO UMA CADEIA DE DADOS A SEREM TRATADOS TIPO UM FORMULÁRIO
        var dados = new FormData();
        
        $.each(data, function(key, value){
            dados.append(key, value);
        });
        
        var userBD;
        
        $.ajax({
            url: base_url+"Usuario/getDadosUser",
            method: "POST",
            async: false,
            
            success: function(result){
                userBD = JSON.parse(result);
                
                console.log(userBD);
            }
        });
        
        if($('#ds_imgUser')[0].files.length > 0){

            var nome = userBD.nm_user.split(" ");
            
            dados.set('ds_imgUser', nome.join("_")+"."+$('#ds_imgUser').prop('files')[0].name.split('.')[1]);
            
            dados.append('file', $('#ds_imgUser').prop('files')[0]);
        }else{
            dados.delete('ds_imgUser');
        }
        
        $.when(
            $.ajax({
                url: base_url+'Usuario/atualizarDados',
                method: 'POST',
                data: dados,
                processData: false,
                contentType: false,
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
                        
                        msgBox(result, function(){
                            removerLoadingScreen();
                        });
                    }else{
                        msgBox(result, function(){
                            $('.btn-close-modal').click(function(){
                                window.location.href = base_url+"Usuario/painel-do-usuario";
                            });
                        });
                    }
                },
            })
        );
    }
    
    if(window.location.href == base_url+"Usuario/painel-do-usuario"){
        $('.btn-atualizar-usuario').click(function(){
            funcao();
        });
        
        $('#atualizar-dados-user form').on("keyup", function(k){
            if(k.keyCode == 13){
                funcao();
            }
        })
    }
}

function alterarFoto(){
    $('#ds_imgUser').change(function(e){
        var file = e.target.files;
        
        var reader = new FileReader();
        
        reader.readAsDataURL(file[0]);
        
        reader.onload = function(r){
            $('.img-user img').prop("src", r.target.result);
            $('.img-user span').html('Clique em "Atualizar Dados" para alterar a imagem').css({'height':'100%', 'opacity':'1'});
        }
    })
}

function alterarSenha(){
    $('.btn-alterar-senha').click(function(e){
        e.preventDefault();
        
        //PEGA A URL E QUEBRA ELA EM UM ARRAY
        var link = window.location.href.split("=");
        
        var data = {'ds_emailUser': link[1].replace("&code", ""), 
                    'cd_senhaUser': $('#cd_senhaUser').val(), 'senha_confirm': $('#senha_confirm').val(),
                    'cd_codeRec': link[2]
                };
                
        $.ajax({
            url: base_url+"Usuario/alterarSenha",
            data: data,
            method: 'POST',
            
            success: function(result){
                var result = JSON.parse(result);
                
                if(result.tipo == "confirm"){
                    $('form input').val("");
                    msgBox(result, function(){
                        $('.btn-close-modal').click(function(){
                            window.location.href = base_url;
                        });
                    });
                }else{
                    msgBox(result, function(){});
                }
                
                
            },
        });
    });
}

function cadastrarEmCurso(){
    $('.btn_req').click(function(){
        var btn = $(this);
        btn.html('CARREGANDO...');
        loading_screen();
        
        boxMsg = {
            'tipo': 'option',
            'titulo': 'DESEJA REALIZAR SUA INSCRIÇÃO?',
            'msg': 'O curso <strong>'+$('.banner-apres h1 span:first-child').html()+'</strong> é gratuito, portanto sua requisição é feita na hora. Deseja realmente realizar a sua inscrição ?',
        };
        
        msgBox(boxMsg, function(){
            $('.btn-resp').click(function(){
                if($(this).attr('resp') == "sim"){
                    loading_screen();
                
                    $.ajax({
                        url: base_url+"Usuario/cadastrarCurso",
                        method: "POST",
                        data: {"tipo":"free"},
                        
                        success: function(result){
                            var result = JSON.parse(result);
                            
                            if(result.tipo == "confirm"){
                                boxMsg = {
                                    'tipo': 'confirm',
                                    'titulo': 'INSCRIÇÃO REALIZADA COM SUCESSO!',
                                    'msg': 'Sua inscrição ja foi feita e em breve você receberá um e-mail informativo.<br>'
                                            +'Caso você não receba, não se preocupe, sua inscrição ja está feita! Bons Estudos!',
                                };
            
                                msgBox(boxMsg, function(){});
                                
                                btn.replaceWith("<p class='alert alert-warning mt-2'>REQUERIMENTO REALIZADO <i class='fa fa-check'></i></p>");
                            }else{
                                boxMsg = {
                                    'tipo': 'error',
                                    'titulo': 'HOUVE ALGUM PROBLEMA NA SUA REQUISIÇÃO',
                                    'msg': 'Parece que tivemos um problema durante o seu pedido de requisição. Aguarde alguns minutos e tente novamente mais tarde.',
                                };
            
                                msgBox(boxMsg, function(){});
                                
                                btn.html("Tente Novamente <i class='fa fa-close'></i>");
                            }
                            
                            removerLoadingScreen();
                        }
                    });
                }else{
                    btn.html('Requisitar Inscrição <i class="fa fa-check-circle text-light"></i>');
                    close_modal();
                }
            });
        });
    });
}

function adicionarItemCarrinho(){
    $('.btn-add-carrinho').click(function(){
        var btn = $(this);
        btn.html("<img src='"+base_url+"assets/img/icone/loading-circle.gif' alt='' width='30px' height='30px'>");
        
        //Pega o código do curso na url
        var cdCurso = $(location).attr('href').split("/")[4];
        
        $.ajax({
            url: base_url+"Carrinho/adicionarItem",
            method: 'post',
            data: {'cdcurso': cdCurso},
            
            success: function(result){
                btn.replaceWith("<p class='alert alert-warning mt-2'>CURSO ADICIONADO AO CARRINHO <i class='fa fa-check'></i></p>");
                
                setInterval(function(){
                    window.location.href = base_url+"Carrinho"
                }, 500)
            },
        });
    });
}

function verificarDesconto(){
    $('.btn-ver-desc').click(function(){
        loading_screen();
        var desc = $("#cd_cupom").val();
        
        $.ajax({
            url: base_url+'Carrinho/calcularValorDesc',
            data: {'desc':desc},
            method: "POST",
            
            success: function(result){
                var result = JSON.parse(result);
                
                if(result.tipo == "error"){
                    msgBox(result, function(){});
                }else{
                    msgBox(result, function(){
                        $('.btn-close-modal').click(function(){
                            window.location.href = base_url+"Carrinho";
                        })
                    });
                }
            
                removerLoadingScreen();
            },
        });
    });
}

function removerItemCarrinho(){
    $('.btn-remover-carrinho').click(function(){
        loading_screen();
        var cdcurso = $(this).closest('tr').attr("curso");
        
        $.ajax({
            url: base_url+"Carrinho/removerItem",
            method: "post",
            data: {'cdcurso':cdcurso},
            
            success: function(result){
                var result = JSON.parse(result);
                
                if(result.tipo == "error"){
                    msgBox(result, function(){});
                }else{
                    msgBox(result, function(){
                        $('.btn-close-modal').click(function(){
                            window.location.href = base_url+"Carrinho";
                        })
                    });
                }
            }
        });
    });
}

function finalizarCompra(){
    $('.finalizar-compra').click(function(e){
        loading_screen();
        e.preventDefault();
        
        var msg;
        
        $.when(
            $.ajax({
                url: base_url+'Usuario/cadastrarCurso',
                method: 'post',
                data: {'tipo':'car'},
                async: false,
                
                success: function(result){
                    msg = JSON.parse(result);
                }
            })
        ).done(function(){
            $.when(
                $.ajax({
                    url: base_url+"Carrinho/retornarDadosCarrinho",
                    method: "post",
                    async: false,
                    
                    success: function(result){
                        var result = JSON.parse(result);
                        
                        //ENVIANDO INFORMAÇÕES PARA O PAGSEGURO
                        var form = $('<form>',{
                            id: "enviar_pag_seguro",
                            method: "post",
                            action: "https://pagseguro.uol.com.br/checkout/checkout.jhtml",
                        }).appendTo("#list-car");
                        
                            //EMAIL DE COBRANÇA
                            var c_emailCobranca = $("<input>",{
                                type: "hidden",
                                name: "email_cobranca",
                                value: "cenepsantos@gmail.com",
                            }).appendTo(form);
                            
                            //ENCODING
                            var c_nome = $("<input>",{
                                type: "hidden",
                                name: "encoding",
                                value: "UTF-8",
                            }).appendTo(form);
                            
                            //DADOS DE PAGAMENTO
                            var i_tipo = $("<input>",{
                                type: "hidden",
                                name: "tipo",
                                value: "CP",
                            }).appendTo(form);
                            
                            var i_moeda = $("<input>",{
                                type: "hidden",
                                name: "moeda",
                                value: "BRL",
                            }).appendTo(form);
                            
                            var i = 1;
                            $.each(result.item, function(index, value){
                                $.ajax({
                                    method: 'post',
                                    url: base_url+'Cursos/getDadosCurso',
                                    data: {'cdcurso':value},
                                    async: false,
                                    
                                    success: function(curso){
                                        var curso = JSON.parse(curso);
                                        
                                        var i_itemId = $("<input>",{
                                            type: "hidden",
                                            name: "item_id_"+i,
                                            value: curso.cd_curso,
                                        }).appendTo(form);
                                        
                                        var i_itemDesc = $("<input>",{
                                            type: "hidden",
                                            name: "item_descr_"+i,
                                            value: curso.nm_curso,
                                        }).appendTo(form);
                                        
                                        var i_itemQuant = $("<input>",{
                                            type: "hidden",
                                            name: "item_quant_"+i,
                                            value: "1",
                                        }).appendTo(form);
                                        
                                        var i_valor = $("<input>",{
                                            type: "hidden",
                                            name: "item_valor_"+i,
                                            value: curso.vl_curso,
                                        }).appendTo(form);
                                        
                                        i++;
                                    }
                                });
                            });
                            
                            var i_frete = $("<input>",{
                                type: "hidden",
                                name: "frete",
                                value: "0",
                            }).appendTo(form);
                            
                            var i_peso = $("<input>",{
                                type: "hidden",
                                name: "peso",
                                value: "0",
                            }).appendTo(form);
                            
                            var desc = 0;
                            if(result.desc.length > 0){
                                for(var i = 0; i < result.desc.length; i++){
                                    desc = desc + result.desc[i].vl_desc
                                    
                                    var i_extras = $("<input>",{
                                        type: "hidden",
                                        name: "extras",
                                        value: ((desc * 100) * -1),
                                    }).appendTo(form);
                                }
                            }
                            
                            //FIM DADOS PAGAMENTO
                            
                            //DADOS USUARIO
                            $.ajax({
                                url: base_url+"Usuario/getDadosUser",
                                async: false,
                                
                                success: function(user){
                                    var user = JSON.parse(user);
                                    
                                    var u_nome = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_nome",
                                        value: user.nm_user,
                                    }).appendTo(form);
                                    
                                    var u_cep = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_cep",
                                        value: user.num_cepUser,
                                    }).appendTo(form);
                                    
                                    var u_rua = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_end",
                                        value: user.ds_ruaUser,
                                    }).appendTo(form);
                                    
                                    var u_num = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_num",
                                        value: user.num_casaUser,
                                    }).appendTo(form);
                                    
                                    var u_compl = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_compl",
                                        value: user.ds_compUser,
                                    }).appendTo(form);
                                    
                                    var u_bairro = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_bairro",
                                        value: user.ds_bairroUser,
                                    }).appendTo(form);
                                    
                                    var u_cid = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_cidade",
                                        value: user.ds_cidUser,
                                    }).appendTo(form);
                                    
                                    var u_uf = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_uf",
                                        value: user.ds_estUser,
                                    }).appendTo(form);
                                    
                                    var u_pais = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_pais",
                                        value: "BRA",
                                    }).appendTo(form);
                                    
                                    var u_ddd = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_ddd",
                                        value: user.cd_telUser.substr(0, 1),
                                    }).appendTo(form);
                                    
                                    var u_tel = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_tel",
                                        value: user.cd_telUser  ,
                                    }).appendTo(form);
                                    
                                    var u_nome = $("<input>",{
                                        type: "hidden",
                                        name: "cliente_email",
                                        value: user.ds_emailUser,
                                    }).appendTo(form);
                                }
                            });//FIM DADOS USUÁRIO
                    }
                })
            ).done(function(){
                removerLoadingScreen();
                
                if(msg.tipo == "confirm"){
                    msgBox(msg, function(){
                        setInterval(function(){
                            $("#enviar_pag_seguro").submit();
                        }, 2000);
                        
                        $('.btn-close-modal').css('display', 'none');
                    })
                }else{
                    msgBox(msg, function(){
                        $('.btn-close-modal').click(function(){
                            window.location.reload();
                        });
                    });
                }
            });
        });
    });
}

function setarDadosUsuarioFormAtualizar(){
    if(window.location.href == base_url+"Usuario/painel-do-usuario"){
        loading_screen();
        $.ajax({
            url: base_url+"Usuario/getDadosUser",
            method: "post",
            async: false,
            
            success: function(result){
                var result = JSON.parse(result);
                
                var formDados = $('form input[type!="file"], form select');
                
                $.each(formDados, function(i){
                    $.each(result, function(key, val){
                        if(formDados[i].id == key && val != null && val != ""){
                            $(formDados[i]).val(val);
                        }
                    });
                });
            }
        });
        
        removerLoadingScreen();
    }
}
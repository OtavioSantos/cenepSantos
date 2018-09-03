$(document).ready(function(){
    container = $(".dashboard-cont");
    btnMenu = $(".option-menu button");
        
    btnMenu.click(function(){
        var option = $(this).attr("option");
        
        btnMenu.removeAttr("style");
        btnMenu.attr("disabled", "disabled");
        
        $(this).css({"background":"#009334", "color":"#FFF"});
        
        switch(option){
            case "home":
                exibirHome();
                btnMenu.removeAttr("disabled");
            break;
            
            case "usuario":
                listarUsuarios();
                btnMenu.removeAttr("disabled");
            break;
            
            case "curso":
                listarCursos();
                btnMenu.removeAttr("disabled");
            break;
            
            case "noticia":
                listarNoticias();
                btnMenu.removeAttr("disabled");
            break;
            
            case "banner":
                listarBanner();
                btnMenu.removeAttr("disabled");
            break;
            
            case "opiniao":
                listarOpiniao();
                btnMenu.removeAttr("disabled");
            break;
        }
        $(this).attr("disabled", "disabled");
    });
});

function exibirHome(){
    container.load(base_url+"Admin/exibirHome");
}

function listarUsuarios(){
    container.load(base_url+"Admin/listUser_board");
    
    setTimeout(function(){
        $.ajax({
            url: base_url+"Admin/listarUsuario",
            method: "POST",
        
            beforeSend: function(){
                loading_screen();
            },
            
            success: function(result){
                var result = JSON.parse(result);
                $("#modal_loading").remove();
                
                var tblListaUsuario = $(".dashboard-cont table tbody"); 
                
                //adicionando dados a tabela de lista de usuario
                result.forEach(function(u){
                    $('<tr>',{
                        class: "user",
                        id_user: u.cd_user,
                    }).appendTo(tblListaUsuario);
                    
                    $('<td>',{}).html("<input type='checkbox' name='select_user' value='"+u.cd_user+"'>").appendTo("tr[id_user="+u.cd_user+"]");
                    $('<td>',{}).html(u.cd_user).appendTo("tr[id_user="+u.cd_user+"]");
                    $('<td>',{}).html(u.nm_user).appendTo("tr[id_user="+u.cd_user+"]");
                    $('<td>',{}).html(u.nm_nickUser).appendTo("tr[id_user="+u.cd_user+"]");
                    $('<td>',{}).html(u.ds_emailUser).appendTo("tr[id_user="+u.cd_user+"]");
                    $('<td>',{}).html(u.cd_telUser).appendTo("tr[id_user="+u.cd_user+"]");
                    $('<td>',{}).html(u.cd_celUser).appendTo("tr[id_user="+u.cd_user+"]");
                });
                
                setTimeout(function(){
                    adicionarAtualizarUsuario();
                    selectUser();
                    verificar_cursos_inscritos();
                    remover('user');
                }, 1000);
            }
        });
    }, 1000);
}

function selectUser(){
    $(".dashboard-cont table tbody tr").dblclick(function(){
        var code = $(this).attr("id_user");
        create_modal();
        var modal = $(".modal_nv1");
        
        $.ajax({
            url: base_url+"Admin/selectUser",
            data: {"cd":code},
            method: "POST",
            
            beforeSend: function(){
                loading_screen();
            },
            
            success: function(result){
                $("#modal_loading").remove();
                
                var result = JSON.parse(result);
                
                var dados = $.map(result, function(val, element) { 
                    if(val == null){
                        val = "";
                    }
                    
                    return element+"="+val.split(" ").join("%20")+"&"; 
                }); //converte para json e retorna uma string contendo index e valor, sendo que os valores estão tendo os espaços vazios filtrados
                
                dados = dados.join("");
                
                modal.load(base_url+"Admin/selectUser_board?"+dados);
                
                setTimeout(function(){
                    remover('user', result.cd_user);
                    adicionarAtualizarUsuario();
                    close_modal();
                }, 1000);
            }
        });
    });
}

function listarCursos(){
    container.load(base_url+"Admin/listCurso_board");
    
    setTimeout(function(){
        $.ajax({
            url: base_url+"Admin/listarCursos",
            method: "POST",
            
            beforeSend: function(){
                loading_screen();
            },
            
            success: function(result){
                var result = JSON.parse(result);
                $("#modal_loading").remove();
                
                var tblListaCurso = $(".dashboard-cont table tbody"); 
                
                //adicionando dados a tabela de lista de usuario
                result.forEach(function(c){
                    $('<tr>',{
                        class: "curso",
                        id_curso: c.cd_curso,
                    }).appendTo(tblListaCurso);
                    
                    $('<td>',{}).html(c.cd_curso).appendTo("tr[id_curso="+c.cd_curso+"]");
                    $('<td>',{}).html(c.nm_curso).appendTo("tr[id_curso="+c.cd_curso+"]");
                    $('<td>',{}).html(c.dt_inicInsc).appendTo("tr[id_curso="+c.cd_curso+"]");
                    $('<td>',{}).html(c.dt_limInsc).appendTo("tr[id_curso="+c.cd_curso+"]");
                    $('<td>',{}).html(c.ig_destCurso).appendTo("tr[id_curso="+c.cd_curso+"]");
                });
            }
        });
    }, 1000);
}

function selectCurso(){
    setTimeout(function(){
        $(".dashboard-cont table tbody tr").dblclick(function(){
            var code = $(this).attr("id_curso");
            create_modal();
            var modal = $(".modal_nv1");
            
            $.ajax({
                url: base_url+"Admin/selectCurso",
                data: {"cd":code},
                method: "POST",
                
                beforeSend: function(){
                    loading_screen();
                },
                
                success: function(result){
                    $("#modal_loading").remove();
                    
                    var result = JSON.parse(result);
                    
                    var result = $.map(result, function(val, element) { return element +"="+val.split(" ").join("%20")+"&"; }); //converte para json e retorna uma string contendo index e valor, sendo que os valores estão tendo os espaços vazios filtrados
                    var dados = result.join("");
                    
                    modal.load(base_url+"Admin/selectUser_board?"+dados);
                    
                    setTimeout(function(){
                        close_modal();
                    }, 1000);
                }
            });
        });
    }, 1500);
}

//noticias
function listarNoticias(){
    container.load(base_url+"Admin/listNoticia_board");
    
    setTimeout(function(){
        $.ajax({
            url: base_url+"Admin/listarNoticias",
            method: "POST",
            
            beforeSend: function(){
                loading_screen();
            },
            
            success: function(result){
                var result = JSON.parse(result);
                $("#modal_loading").remove();
                
                var tblListaNoticia = $(".dashboard-cont table tbody"); 
                
                //adicionando dados a tabela de lista de usuario
                result.forEach(function(n){
                    $('<tr>',{
                        class: "noticia",
                        id_not: n.cd_not,
                    }).appendTo(tblListaNoticia);
                    
                    $('<td>',{}).html(n.cd_not).appendTo("tr[id_not="+n.cd_not+"]");
                    $('<td>',{}).html(n.nm_not).appendTo("tr[id_not="+n.cd_not+"]");
                    $('<td>',{}).html(n.dt_postNot).appendTo("tr[id_not="+n.cd_not+"]");
                    $('<td>',{}).html(n.qt_clickNot).appendTo("tr[id_not="+n.cd_not+"]");
                    $('<td>',{}).html(n.ig_destNot).appendTo("tr[id_not="+n.cd_not+"]");
                });
            }
        });
    }, 1000);
}
//fim noticias

//banner
function listarBanner(){
    container.load(base_url+"Admin/listBanner_board");
    
    setTimeout(function(){
        $.ajax({
            url: base_url+"Admin/listarBanners",
            method: "POST",
            
            beforeSend: function(){
                loading_screen();
            },
            
            success: function(result){
                var result = JSON.parse(result);
                $("#modal_loading").remove();
                
                var tblListaNoticia = $(".dashboard-cont table tbody"); 
                
                //adicionando dados a tabela de lista de usuario
                result.forEach(function(b){
                    $('<tr>',{
                        class: "noticia",
                        id_banner: b.cd_banner,
                    }).appendTo(tblListaNoticia);
                    
                    $('<td>',{}).html(b.cd_banner).appendTo("tr[id_banner="+b.cd_banner+"]");
                    $('<td>',{}).html("<img class='img-fluid' src='"+base_url+"assets/img/banner/"+b.ds_imgBanner+"' alt='' style='width: 150px'>").appendTo("tr[id_banner="+b.cd_banner+"]");
                    $('<td>',{}).html("<a href='"+b.ds_linkBanner+"' target='_blank'>"+b.ds_linkBanner+"</a>").appendTo("tr[id_banner="+b.cd_banner+"]");
                    $('<td>',{}).html(b.nm_banner).appendTo("tr[id_banner="+b.cd_banner+"]");
                    $('<td>',{}).html(b.ds_banner).appendTo("tr[id_banner="+b.cd_banner+"]");
                });
            }
        });
    }, 1000);
}
//fim banner

//opiniao
function listarOpiniao(){
    container.load(base_url+"Admin/listOpiniao_board");
    
    setTimeout(function(){
        $.ajax({
            url: base_url+"Admin/listarOpiniao",
            method: "POST",
            
            beforeSend: function(){
                loading_screen();
            },
            
            success: function(result){
                var result = JSON.parse(result);
                $("#modal_loading").remove();
                
                var tblListaNoticia = $(".dashboard-cont table tbody"); 
                
                //adicionando dados a tabela de lista de usuario
                result.forEach(function(o){
                    $('<tr>',{
                        class: "noticia",
                        id_op: o.cd_op,
                    }).appendTo(tblListaNoticia);
                    
                    $('<td>',{}).html(o.cd_op).appendTo("tr[id_op="+o.cd_op+"]");
                    $('<td>',{}).html(o.nm_op).appendTo("tr[id_op="+o.cd_op+"]");
                    $('<td>',{}).html(o.nm_cursoOp).appendTo("tr[id_op="+o.cd_op+"]");
                    $('<td>',{}).html(o.ds_op).appendTo("tr[id_op="+o.cd_op+"]");
                });
            }
        });
    }, 1000);
}
//fim opiniao

//funções funcionais
function remover(tipo, cd){
    $(".remover-item").click(function(){
        var exclude = function(){
            $.ajax({
                url: base_url+"Admin/remover",
                data: {'tipo':tipo, item},
                method: "POST",
                
                beforeSend: function(){
                    loading_screen();
                },
                
                success: function(result){
                    $("#modal_loading").remove();
                    
                    $(".config-message").css("display", "block");
                    close_modal();
                    listarUsuarios();
                },
            });
        };
        
        switch(tipo){
            case 'user':
                var item = [];
                $("input[name='select_user']:checked").each(function (){
                   item.push(parseInt($(this).val()));
                });
            break;
        }
        
        if(item.length == 0){
            if(cd != null){
                item.push(cd);
                exclude();
            }
        }else{
            exclude();
        }
    });
}

function verificar_cursos_inscritos(){
    $(".cursos-inscritos").click(function(){
        create_modal();
        var modal = $(".modal_nv1");
            
        var userid = [], userName = [];
        $("input[name='select_user']:checked").each(function (){
           userid.push(parseInt($(this).val()));
           userName.push($(this).parent().siblings("td:nth-child(3)").html().split(" "));
        });
        
        
        //juntando os dados de um array separando-os com porcentagem.
        //Se for passar os dados via URL, colocar no 'join' = %20.
        for(var i in userName){
            userName[i] = $.map(userName[i], function(val) { 
                            return val;
                        }).join(" ");
        }
        
        if(userid.length == 0){
            alert("Selecione pelo menos um usuário!");
            modal.remove();
            
        }else{
            modal.load(base_url+"Admin/verificarCursosInscritos_board");
        
            setTimeout(function(){
                $.ajax({
                    url: base_url+"Admin/verificarCursosInscritos",
                    method: "POST",
                    data: {userid},
                    
                    beforeSend: function(){
                        loading_screen();
                    },
                    
                    success: function(result){
                        var result = JSON.parse(result);
                        
                        var tblListaUserCurso = $("#table-user-curso tbody"); 
                        
                        $("#modal_loading").remove();
                        
                        for(var i in result){
                            //informando o usuário antes da lista de cursos.
                            $('<tr>',{
                                class: "user_curso text-white bg-dark p-2",
                                user_desc: userid[i],
                            }).appendTo(tblListaUserCurso);
                            
                            $('<td>',{
                                colspan: "6",
                            }).html("<strong>Cód. </strong> "+userid[i]+","
                                    +"<strong class='ml-2'>Nome: </strong>"+userName[i]).appendTo("tr[user_desc="+userid[i]+"]");
                            //fim de exibição do usuário.
                                
                            result[i].forEach(function(uc){
                                $('<tr>',{
                                    class: "user_curso",
                                    id_uc: uc.cd_curso,
                                    id_user: userid[i],
                                }).appendTo(tblListaUserCurso);
                                
                                $('<td>',{}).html("<input type='checkbox' name='curso_insc' value='"+uc.cd_curso+"'>").appendTo("tr[id_uc="+uc.cd_curso+"]");
                                $('<td>',{}).html(uc.cd_curso).appendTo("tr[id_uc="+uc.cd_curso+"]");
                                $('<td>',{}).html(uc.nm_curso).appendTo("tr[id_uc="+uc.cd_curso+"]");
                                $('<td>',{}).html(uc.dt_cadastro).appendTo("tr[id_uc="+uc.cd_curso+"]");
                                $('<td>',{
                                    class: "status_insc",
                                }).html("<p>"+uc.ds_status+"</p>").appendTo("tr[id_uc="+uc.cd_curso+"]");
                                $('<td>',{}).html(uc.nm_emp).appendTo("tr[id_uc="+uc.cd_curso+"]");
                            });
                        }
                        
                        setTimeout(function(){
                            gerarCertificado();
                            editar_status_curso();
                            close_modal();
                        }, 1000);
                    },
                });
            }, 1000);
        }
    });
}

function editar_status_curso(){
    $(".status_insc").dblclick(function(){
        alterando = true;
        var item = $(this);
        var cdcurso = $(this).siblings("td:nth-child(2)").html();
        var cduser = $(this).parent().attr("id_user");
        var status = $(this).children("p").html();
        
        //$(this).html("<input type='text' name='status_insc' value='"+status+"'>");
        $(item.children("p")).replaceWith("<input type='text' name='status_insc' value='"+status+"'>");
        
        var close_input = function(){
            var input = $("input[name='status_insc']");
            
            if(input.val() == status){
                item.html(status);
            }else{
                $.ajax({
                    url: base_url+"Admin/atualizarInscCurso",
                    method: "POST",
                    data: {"cd_aluno": cduser, "cd_curso":cdcurso, "ds_status":input.val()},
                    
                    beforeSend: function(){
                        loading_screen();
                    },
                    
                    success: function(result){
                        $("#modal_loading").remove();
                        item.html(input.val());
                    }
                });
            }
            $('body').unbind('click');//remove o evento de click do body
        };
                
        //verifica se foi clicado fora do input criado
        $('body').click(function (event) {
            if(event.target.name!='status_insc'){
                close_input();
            }
        });
        
        //verifica se o enter foi pressionado e realiza a alteração dos dados
        $(item).keyup(function(e){
            if(e.keyCode == 13){
                close_input();
            }
        })
    });
}

function adicionarAtualizarUsuario(){
    var clickSave = function(){
        $(".save-dados").click(function(){
            var data = {
                "cd_cad": $("#cd_cad").val(), "nome_cad": $("#nome_cad").val(), "email_cad": $("#email_cad").val(), "tel_cad": $("#tel_cad").val(), "cel_cad": $("#cel_cad").val(), "nick_cad": $("#nick_cad").val(), "senha_cad": $("#senha_cad").val(), 
                "rua_cad": $("#rua_cad").val(), "bairro_cad": $("#bairro_cad").val(), "est_cad": $("#est_cad").val(), "cid_cad": $("#cid_cad").val(), "cep_cad": $("#cep_cad").val(), "num_cad": $("#num_cad").val(), "comp_cad": $("#comp_cad").val(), "trab_cad": $("#trab_cad").val(), 
                "emp_cad": $("#emp_cad").val(), "cip_cad": $("#cip_cad").val(), "rg_cad": $("#rg_cad").val(), "cpf_cad": $("#cpf_cad").val(), 
            };

            $.ajax({
                url: base_url+"Admin/atualizarCadastrarUsuario",
                method: "POST",
                data: data,
                
                beforeSend: function(){
                    loading_screen();
                },
                
                success: function(result){
                    $("#modal_loading").remove();
                    
                    result = JSON.parse(result);
                    
                    var input = $("#user-dados form input");
                    
                    if(result.error){
                        
                        $.each(result.error[0], function(key, value){
                            $("#"+key).css({"border":"2px solid red", "background":"#ff6161"}).attr("placeholder", value);
                        });
                        
                    }else if(result.tipo){
                        
                        input.removeAttr("style");
                        
                        console.log("teste");
                        
                        if(result.tipo == "insert"){
                            input.attr("placeholder", "");
                            input.val("");
                        }
                    }
                },
            });
        });
    };
    
    $(".add-user").click(function(){
        create_modal();
        var modal = $(".modal_nv1");
        modal.load(base_url+"Admin/selectUser_board?cd_user=&nm_user=&ds_emailUser=&cd_telUser=&cd_celUser=&nm_nickUser=&cd_senhaUser=&ds_ruaUser=&ds_bairroUser=&ds_estUser=&ds_cidUser=&num_cepUser=&num_casaUser=&ds_compUser=&ig_trabUser=&nm_empUser=&cd_cipUser=&cd_rgUser=&cd_cpfUser=");
    
        setTimeout(function(){
            $(".edit-dados, .remover-item").css("display", "none");
            $(".save-dados").removeAttr("disabled");
            
            var input = $("#user-dados input, #user-dados select");
        
            input.removeAttr("disabled");
            input.eq(0).attr("disabled", "disabled");
            
            clickSave();
            
            close_modal();
        }, 1000);
    });
    
    $(".edit-dados").click(function(){
        $(".edit-dados").css("display", "none");
        $(".save-dados").removeAttr("disabled");
            
        var input = $("#user-dados input, #user-dados select");
        
        input.removeAttr("disabled");
        input.eq(0).attr("disabled", "disabled");
        
        clickSave();
        
        close_modal();
    });
}

function gerarCertificado(){
    $(".gerar-cert").click(function(){
        create_modal2();
        var modal2 = $(".modal_nv2");
            
        var userid = [], userName = [], cursoid = [];
        $("input[name='curso_insc']:checked").each(function (){
           cursoid.push(parseInt($(this).val()));
           userid.push(parseInt($(this).parent().parent().attr("id_user")));
        });
        
        modal2.load(base_url+"Admin/certificado_board");
        
        $.ajax({
            url: base_url+"Admin/gerarCertificado",
            method: "POST",
            data: {userid, cursoid},
            
            beforeSend: function(){
                
            },
            
            success: function(result){
                result = JSON.parse(result);
  
                result.forEach(function(r){
                    $('<div>',{
                        class: "col-sm-12 cert-item",
                        id_cert: r.cd_user+r.cd_curso,
                    }).appendTo("#certificado");
                    
                    //componentes do certificado
                    var p = $('<p>',{
                        class: "nome_user_cert"
                    }).html(r.nm_user).appendTo("div[id_cert="+r.cd_user+r.cd_curso+"]");
                    
                    var p = $('<p>',{
                        class: "nome_curso_cert",
                    }).html(r.nm_curso).appendTo("div[id_cert="+r.cd_user+r.cd_curso+"]");
                    
                    var p = $('<p>',{
                        class: "dt_curso",
                    }).html(r.ds_dtCurso).appendTo("div[id_cert="+r.cd_user+r.cd_curso+"]");
                    
                    var p = $('<p>',{
                        class: "dt_atual",
                    }).html("Santos, Estado de São Paulo").appendTo("div[id_cert="+r.cd_user+r.cd_curso+"]");
                });
            },
        });
        
        setTimeout(function(){
            imprimirCertificado();
            close_modal();
        }, 1000);
    });
}

//fim funcionais

//funções gerais
function loading_screen(){
    $('<div>',{
        id: "modal_loading",
        class: "d-flex align-items-center justify-content-center",
        style: "position: absolute; z-index: 999999; width: 100%; height: 100%; top: 0px; left: 0px; background: rgba(0, 88, 183, 0.8); color: #FFF; border-radius: 3px",
    }).html("<img class='img-fluid' src='"+base_url+"assets/img/icone/loading.gif' alt=''><h5>CARREGANDO</h5>").appendTo(container);
}

function create_modal(){
    $("<div>",{
        class: "modal modal_nv1 d-flex align-items-center justify-content-center",
        style: "position: absolute; z-index: 9999; width: 100%; height: 100%; top: 0px; background: rgba(0, 0, 0, 0.8)",
    }).appendTo('body');
}

function create_modal2(){
    $("<div>",{
        class: "modal modal_nv2 d-flex align-items-center justify-content-center",
        style: "position: absolute; z-index: 99999; width: 100%; height: 100%; top: 0px; background: rgba(0, 0, 0, 0.8)",
    }).appendTo('body');
}

function close_modal(){
    $(".close_modal").click(function(){
        $(this).parent().parent().parent().parent().parent().parent().remove();
    });
}
//fim funções gerais
function msgBox(result, callback){
    var modal = $('<div>',{
        class: 'modal msgBox_modal',
    });
    
    $('body').append(modal.load(base_url+"MsgBox/exibirMensagem", function(){
        
        removerLoadingScreen();
        
        //CONFIGURANDO MENSAGEM
        $.when(
            $('body .msgBox_modal:last-child .msgBox_titulo strong').html(result.titulo),
            $('body .msgBox_modal:last-child .msgBox').addClass(result.tipo),
            $('body .msgBox_modal:last-child .msgBox_msg').html(result.msg),
            $('body .msgBox_modal:last-child .msgBox_option').append(definirOpcoes(result.tipo)),
        ).done(function(){
            close_modal();
        
            //FUNÇÃO QUE DEVE SER EXECUTADA LOGO APÓS A MSGBOX TERMINAR SUA EXECUÇÃO
            callback();
        });
    }));
}

function definirOpcoes(tipo){
    var btn = $('<button>',{
        class: 'btn btn-close-modal'
    });
    
    var tag_i = $('.msgBox_titulo i');
    
    switch(tipo){
        case 'confirm':
            btn.addClass('btn-confirm', 'btn-close-modal');
            btn.html('Fechar');
            
            tag_i.addClass('fa fa-check');
            
            return btn;
        break;
        
        case 'alerts':
            btn.addClass('btn-alerts', 'btn-close-modal');
            btn.html('Fechar');
            
            tag_i.addClass('fa fa-exclamation-circle');
            
            return btn;
        break;
        
        case 'error':
            btn.addClass('btn-error', 'btn-close-modal');
            btn.html('Fechar');
            
            tag_i.addClass('fa fa-close');
            
            return btn;
        break
        
        case 'option':
            tag_i.addClass('fa fa-question');
            
            btn.addClass('btn-nao btn-resp');
            btn.attr('resp', 'nao');
            btn.html('Não');
            
            var btn_sim = $('<button>',{
                class: 'btn btn-resp btn-close-modal btn-sim mr-2',
                style: "color: #FFF",
                resp: "sim",
            }).html('Sim');
            
            return [btn_sim, btn];
        break;
        
        case 'text':
            btn.addClass('btn-text-close');
            btn.html('Fechar');
            
            tag_i.addClass('fa fa-newspaper-o');
            
            var btn_confirm = $('<button>',{
                id: 'btnText',
                class: 'btn btn-text mr-2',
                style: "color: #FFF",
            }).html('VERIFICAR E-MAIL');
            
            var input = $('<input>',{
                type: 'text',
                id: 'cptText',
                name: 'cptText',
                class: 'form-control mt-2',
                placeholder: 'Digite seu e-mail...',
            });
            
            $('.msgBox_msg').append(input);
            
            return [btn_confirm, btn];
        break;
    }
}
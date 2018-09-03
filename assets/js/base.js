$(document).ready(function(){
    $('#btnUserDesl').initEvent("click", true, true);

    var state_site = "dev";
    
    switch(state_site){
        case "online":
            base_url = 'https://www.cenepsantos.com.br/';
        break;
        
        case "dev":
            base_url = 'https://cenep-santos-2018-otvss.c9users.io/';
        break;
    }
    
    menuControl = 0;
    
    regularMenu();
    
    //VERIFICA A DISPONIBILIDADE DOS CURSOS
    setDisponibilidade();
    
    //EXIBE A TELA DE CADASTRO OU LEVA PARA O DASHBOARD
    exibirTelaAcesso();
    
    selectLang();
    
    tamanhoLetra();
});

function loading_screen(){
    var load = $('<div>',{
        id: "modal_loading",
        class: "modal",
    }).html("<div><img class='img-fluid' src='"+base_url+"assets/img/icone/loading.gif' alt=''><br>CARREGANDO</div>").appendTo('body');
    
    load.animate({
        opacity: '1',
    }, 250);
    
    $('html').css('overflow', 'hidden');
}

function removerLoadingScreen(){
    var load = $("#modal_loading");
    
    $.when(
        load.animate({
            opacity: '0',
        }, 250)
    ).done(function(){
        load.remove();
        $('html').css("overflow", "auto");
    });
}

function close_modal(){
    $('.btn-close-modal').click(function(){
        var modal = $(this).closest('.modal');
        var modal_content = modal.find('.modal_content');
        
        //REALIZA A ANIMAÇÃO DE FECHAR A JANELA
        $.when(
            modal_content.animate({
                opacity: '0',
                marginTop: '-20px',
            }, 250)
        ).done(
            modal.animate({
                opacity: '0',
            }, 500)
        //DEPOIS DE TODA ANIMAÇÃO FEITA, É REMOVIDO O MODAL    
        ).then(function(){
            $('html').css('overflow','auto');
            modal.remove();
        })
    });
}

function regularMenu(){
    var nav = $('#menu-geral');
    var navbar_brand = $('.navbar-brand');
    var car = $('.carrinho');
    
    setInterval(function(){
        if($(document).scrollTop() > 50 && $(window).width() > 767){
            nav.addClass('menu-scroll');
            nav.removeClass('menu-static');
            
            car.removeClass('carrinho-static');
            car.css({'position':'initial', 'font-weight':'normal'});
            car.addClass('carrinho-animate');
        }else{
            if(nav.hasClass('menu-scroll')){
                nav.removeClass('menu-scroll');
                nav.addClass('menu-static');
                
                car.removeClass('carrinho-animate');
                car.addClass('carrinho-static');
            }
        }
    }, 100);
}

function selectLang(){
    var selectedLang = $('#selected_lang');
    
    $('#selected_lang').click(function(){
        $.when($('#select_item_lang').toggleClass('select_item_open')).done(function(){
            $('#select_item_lang .item-lang').click(function(){
                $.when(
                    selectedLang.children('span').html($(this).children('span').html()),
                    selectedLang.children('img').attr('src', $(this).children('img').attr('src')),
                    selectedLang.attr("value", $(this).attr("value")),
                    $('html').attr('lang', $(this).attr("value")),
                    
                    $(".skiptranslate a").click(),
                    
                    $('#select_item_lang .item-lang').unbind("click")
                ).done(function(){
                    $('#select_item_lang').toggleClass('select_item_open');
                })
            });
        });
    });
}

function tamanhoLetra(){
    $('#aumentar_letra').click(function(){
        $('body').css('font-size', parseInt($('body').css('font-size').slice(0,2))+2);
    });
    
    $('#diminuir_letra').click(function(){
        $('body').css('font-size', parseInt($('body').css('font-size').slice(0,2))-2);
    });
}
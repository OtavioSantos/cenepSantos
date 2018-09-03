$(document).ready(function(){
    var duracao = 4000; //DURAÇÃO DA EXIBIÇÃO DO BANNER
    var durAnim = 1000; //TEMPO DE TRANSIÇÃO DE UM BANNER PRA OUTRO (Tem que ser menor que o tempo de duração)
    var bItem = $('.banner-item');
    var active, nItem;

    bItem.filter(':first-child').addClass('active');
    bItem.filter(':first-child').css({'opacity':'1', 'z-index':'1'});
    
    if(bItem.length > 1){
        setInterval(function(){
            active = bItem.filter('.active');
            nItem = bItem.filter('.active+div');
            
            if(nItem.length == 0){
                nItem = bItem.filter(':first-child');
            }
            
            $.when(
                active.animate({
                    opacity: '0'
                }, durAnim),
                
                nItem.animate({
                    opacity: '1'
                }, durAnim),
                
            ).done(function(){
                bItem.css('z-index', '0');
                nItem.css('z-index', '1');
                
                active.removeClass("active");
                nItem.addClass("active");
            })
        }, duracao);
    }
})
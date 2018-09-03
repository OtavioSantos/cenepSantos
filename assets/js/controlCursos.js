function setDisponibilidade(){
    var limInsc = $('.limInsc');
    var status = $('.status');
    var hoje = moment();
    
    //verifica cada data e altera a data limite de inscrição de cada
    $.each(limInsc, function(){
        var data = $(this).text().split('-');
        data = moment(data[1] + "-" + data[0] + "-" + data[2]);
        var dif = hoje.diff(data, "days") *- 1;
        
        var dt_inicinsc = $(this).attr("inicinsc");
        var dt_liminsc = $(this).attr('limInsc');
        
        if(dt_inicinsc == undefined || dt_inicinsc == "0000-00-00"){
            $(this).parent().parent().find('.inicInsc').html("Data à definir").css({'color':'#fff3cd', 'font-weight':'bold', 'text-shadow':'1px 1px 1px #000'});
            $(this).html("Data à definir").css({'color':'#fff3cd', 'font-weight':'bold', 'text-shadow':'1px 1px 1px #000'});
            
        }else if(dif >= 5){
            $(this).css('color', 'green');
            
        }else if((dif > 0) && (dif < 5)){
            $(this).css({'color':'#FFE442', 'text-shadow':'1px 1px 1px #000'});
            
        }else if(dif == 0){
            $(this).css('color', 'red');
            
        }else if(dif < 0){
            $(this).text("INDISPONÍVEL").css('color', '#A30500');
        }
    });
    
    //altera a visão do status de acordo com estado atual
    status.each(function(){
        var s = $(this);
        
        switch(s.html()){
            case "PRÓXIMO CURSO":
                s.css({"background":"yellow", "color": "#009334"});
            break;
            
            case "FINALIZADO":
                s.css({"background":"#E8593A", "color": "#FFF"});
            break;
            
            case "":
                s.css("display", "none");
            break;
        }
    });
}
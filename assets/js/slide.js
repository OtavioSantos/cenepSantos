function slide(){
    var select = 0;
    var slide = document.querySelector("#slide-active");
    var slideItem = document.querySelectorAll(".slide-item");
    var timer = parseInt(slide.getAttribute("Tduracao"));
    var trans = parseInt(slide.getAttribute("Ttrans"));
    var itemAtivo = "";
    
    var tipoSlide = document.querySelector("#slide-active").getAttribute("tipo-slide");
    
    switch(tipoSlide){
        case '1':
            sliderDefault(slide, slideItem, timer, select, itemAtivo);
        break;
        
        case '2':
            sliderControl();
        break;
    }
    
    //ESCOLHA DE SLIDE
    sliderDefault(slide, slideItem, timer, select, itemAtivo);
    
    //document.querySelector(".next").addEventListener("click", next);
}

function sliderDefault(slide, slideItem, timer, trans, select, itemAtivo){
    Array.prototype.slice.call(slideItem).forEach(function(slideAtual){
        slideAtual.style.opacity = "0";
    });
    
    document.querySelector(".active").style.opacity = "1";
    
     setInterval(function(){
         itemAtivo = document.querySelector(".active");
         itemAtivo.style.transition = "1s";
         itemAtivo.style.opacity = "0";
         itemAtivo.classList.remove("active");
         
         select++;
         
         if(select >= slideItem.length){
             select = 0;
         }
         
         slideItem[select].classList.add("active");
         document.querySelector(".active").style.opacity = "1";
         document.querySelector(".active").style.transition = "1s";
     }, timer);
}

function sliderControl(){
    var itemAtivo = "";
        
        slideControl.next = function(){
            
        }
        
        slideControl.prev = function(){
            
        }
        
}

function next(){
    
}
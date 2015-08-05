'use strict';

$(document).ready(function(){

    
     
    
    $("#nav").mouseenter(function(){
    $("#nav").css("color","white");
});
        $("#nav").mouseleave(function(){
    $("#nav").css("color","lightslategray");
});
    
    
    var animationSpeed=1000;
    var pause= 3000;
    var currentSlide=1;
    
    var $slider = $("#slider1");
    var $slideContainer = $slider.find(".slides");
    var $slides = $slideContainer.find(".slide");
    
    
   
     
   /* $slideContainer.prepend('<img  src="images/a.jpg" />').fadeIn(100).append('<img  src="images/b.jpg" />').fadeOut(1000);
    
        */

    
    
  
    
    
   // jQuery methods go here...
  setInterval(function(){
        
    $slideContainer.animate({"margin-left":"-=110%",},animationSpeed,function(){
        currentSlide++;
      
        if(currentSlide === $slides.length)
        {
         
            
            currentSlide=1;
            $slideContainer.css("margin-left",'0%');
        }
        
        
        
    });
    },pause);
    

  

});
$(document).ready(function(){
    $("#toggle").click(function(){
        $(this).toggleClass('open');
        $("#menu").toggle('slide');
        if($("#toggle").hasClass("open")){
            $(".content").css({left: '220px'});
        }
        else{
            $(".content").css({left: '0'});
        }
    
     });
     //Responsive Design On Window Resize s
     $(window).resize(function(){
        var style = $('#menu').attr('style');
        if ($(window).width() >= "1001" && style !== false) {
            if($("#toggle").hasClass("open") === true){
                $("#toggle").removeClass('open'); 
            }
            $("#menu").removeAttr("style");
             
        }
       
       
     });
     
 
});

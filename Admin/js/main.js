$(function(){
    
    if($(window).width() >= "993"){
        $("#sidebar").addClass("open")
        $(".content").addClass('margin-left-220 is-sidebar-open');
        $("#toggle").addClass("active");
    }

    $("#logout-form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: e.target.action ,
            method: "POST",
            
            success: function(){
                   window.location = "login"; 
            },
            error: function(response){
                alert(response);
            }
        });
    });

    //Header 
  
    $("#toggle").click(function(){
       
        $("#sidebar").toggleClass("open");
        if($("#sidebar").hasClass("open")){
            $(".content").addClass('margin-left-220 is-sidebar-open');
            $("#toggle").addClass("active");
            
        }
        else{
            
            $("#toggle").removeClass("active"); 
            $(".content").removeClass('margin-left-220 is-sidebar-open');
            
        }
       
    });
    
});
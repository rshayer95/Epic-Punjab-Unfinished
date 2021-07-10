$(function(){
    function getAnalysis(data,status){
        var response = $.parseJSON(data);
        if(status === "success"){
            if(response.success){
                $('.count').each(function(){
                       $(this).text(response[$(this).attr('id')]); 
                });
            }
        }
    }
    $.get(window.location.href, function(data, status){
        getAnalysis(data,status);
    }).always(function(){
        setInterval(function(){
            $.get(window.location.href, function(data, status){
                getAnalysis(data,status);
            });
                },10000);

    });

    
        
        

});
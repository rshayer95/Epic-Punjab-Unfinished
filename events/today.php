<?php
    require_once "../includes/config.php";
    require_once "../functions/escapedata.php";
    require_once "../classes/events.php";
    $event = new Events($db);
   
        if($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
            try{
               
                   
                  $event->todaysEvents();
                   
            }
            catch(Exception $e){
                die("error");
                exit;
            }
        }
        else{
            die("Request can be made using POST method only");
            exit;
        }
     

?>
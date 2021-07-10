<?php
    require_once "../includes/config.php";
    require_once "../functions/escapedata.php";
    require_once "../classes/events.php";
    $event = new Events($db);
    if(isset($_POST["count"])){
        $count = escapeData((int)$_POST["count"],$db);
        if($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
            try{
               
                   
                  $event->upcomingEvents($count);
                   
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
     }

?>
<?php
     session_start();
     require_once "../includes/constants.php";
     require_once ROOT."/includes/config.php";
     require_once ROOT. "/functions/escapedata.php";
     require_once("../classes/eventsClass.php");
     $event= new Events($db);
     if(isset($_POST["addToken"])){
        if(isset($_SESSION["addToken"]) && $_SESSION["addToken"] === $_POST["addToken"]){
            if(isset($_POST["date"]) && isset($_POST["name"]) && isset($_POST["description"])){
                $date = escapeData($_POST["date"],$db);
                $name = escapeData($_POST["name"],$db);
                $description = escapeData($_POST["description"],$db);
                $data = array("date" => $date,"name" => $name, "description" => $description);
                $event->addEvent($data);
            }
        }
       
        else{
            die("Accesss Denied");
            exit;
        }
     }
     
     if(isset($_POST["delete_id"])){
      
         if(isset($_SESSION["deleteToken"]) && $_SESSION["deleteToken"] === $_POST["token"]){
           $id= escapeData($_POST["delete_id"],$db);
           $event->deleteEvent($id);
         }
         else{
             die("Access Denied");
         }

     }
     
     if(isset($_POST["count"])){
        $count = escapeData((int)$_POST["count"],$db);
        if($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
            try{
               
                   
                  $event->getEvents($count);
                   
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
<?php
     session_start();
     require_once "../includes/constants.php";
     require_once ROOT."/includes/config.php";
     require_once ROOT. "/functions/escapedata.php";
     require_once("../classes/UsersClass.php");
     $user = new Users($db);
     if(isset($_POST["delete_id"])){
      
         if(isset($_SESSION["deleteToken"]) && $_SESSION["deleteToken"] === $_POST["token"]){
            $id= escapeData($_POST["delete_id"],$db);
            $user->deleteUser($id);
         }
         else{
             die("Unauthorized access declined");
         }

     }
     if(isset($_POST["count"])){
        $count = escapeData((int)$_POST["count"],$db);
     }
     else{
         $count = 9;
     }
     if($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
         try{
            
                
               $user->getUsers($count);
                
         }
         catch(Exception $e){
             die("error");
         }
     }
     else{
         die("Request can be made using POST method only");
     }
?>
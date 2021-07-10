<?php
    session_start();
    if(!isset($_SESSION["admin"]) && !isset($_SESSION["token"])){
        
        header("location: ../login.php");
    }
        try{
            session_destroy();
            
            header("location: ../login.php");
            
        }
        catch(Exception $e){
            die("error");
        }
        echo "Hello";
    
?>

<?php
    try{
        
        $db = new mysqli("localhost","root","root","epicpunjabDB");
        if($db -> connect_error){
            die("There is some problem in connecting to the server");
            exit();
        }
        
    }
    catch(Exception $e){
        die("There is some problem in connecting to the server");
        exit();
    }
?>
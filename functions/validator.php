<?php
    /*
        Developed By: Robin Singh Hayer
        Developed On: 18/Jan/2019
        Functions:    Validations
    */
    function is_alpha($input){
        return (preg_match("/^[a-zA-Z]+$/",$input)) ? true : false ;
    }
    function is_alpha_with_white_space($input){
        return (preg_match("/^[a-zA-Z\s]+$/",$input)) ? true : false;
    }
    function is_alpha_numeric($input){
        return (ctype_alnum($input)) ? true : false;
    }
?>
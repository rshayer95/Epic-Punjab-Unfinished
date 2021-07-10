<?php 

    $current_script = explode("\\" , getcwd()); 
    define("ROOT" , $_SERVER["DOCUMENT_ROOT"] .'/Epic Punjab/');
    define("BASE_PATH" , DIRECTORY_SEPARATOR[0] . 'Epic Punjab/');
    define("FROM" , (sizeof($current_script) == 5) ? $current_script[sizeof($current_script) - 1]: "home" );
?>
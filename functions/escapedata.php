<?php
    function escapeData($data,$db){
        $data = $db->real_escape_string(trim($data));
        $data = strip_tags($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function csrf_token($session = "deleteToken"){
        $token = bin2hex(random_bytes(32));
        $_SESSION[$session] = $token;
        return $token;
    }
?>
<?php
   session_start();
   require "../includes/config.php";
   require "../classes/User.php";
   require "../functions/escapedata.php";
   require "../includes/constants.php";
   $user = new User;
    if(isset($_SESSION["user"]) && isset($_SESSION["token"])){
        $location = "../";
       header("loation: $location");
    }

    if(isset($_POST["email"]) && isset($_POST["password"])){
        
        if($_SERVER['REQUEST_METHOD'] === "POST" && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
            $email = escapeData($_POST["email"],$db);
            $password = escapeData($_POST["password"],$db);
            $data = array("email" => $email , "password" => $password);
            $response = $user-> login($data,$db);
            echo $response;
            exit;
        }
        else{
            echo json_encode([
                'error' => 'request_method_not_allowed',
                'message' => 'Request can be only made using POST method',
            ]);
            exit;
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Icon -->
    <link rel="icon" type="image/ico" href="../assets/logo/logo.ico" />
    <!--Link Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Epic Punjab-Login</title>
    
</head>
<body class="is-full-screen is-centered">
<div class="form-container white medium">
    <header>
        <img src="../assets/images/logo.png" alt="">
        <h1>Login</h1>
    </header>
    <form id="login-form" method="post">
        
  <div class="form">
      <div class="input-group">
          <input type="text" name="email" id="email" placeholder="Email" />
          <span><i id="email_icon" class="fas fa-envelope"></i></span>
      </div>
      <div id="email_error">
      
     
        </div>
      <div class="input-group">
          <input type="password" id="password" name="password" placeholder="Password" />
          <span><i id="pass_icon" class="fas fa-lock"></i></span>
      </div>
      <div id="password_error">
            
        </div>
        <div id="form_message" >
            
        </div>
      <div class="input-group">
         <button type="submit" id="login-btn" name="login-btn" class="waves-effect fluid">Login</button>
      </div>
  </div>
  </form>
  </div>
    <script type="text/javascript" src="../assets/scripts/jquery.js"></script>
    <script type="text/javascript" src="../assets/scripts/waves.js"></script>
    <script type="text/javascript" src="../assets/scripts/login.js"></script>
</body>
</html>
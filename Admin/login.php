<?php
    session_start();
    if(isset($_SESSION["admin"]) && isset($_SESSION["token"])){
        $dashboard_location = "dashboard";
        header("location: $dashboard_location");
    }

    if(isset($_POST["username"]) && isset($_POST["password"])){
        require "../includes/config.php";
        include_once "classes/AdminAccount.php";
        require "../functions/escapedata.php";
        if($_SERVER['REQUEST_METHOD'] === "POST" && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
            $username = escapeData($_POST["username"],$db);
            $password = escapeData($_POST["password"],$db);
            $response    = $admin-> login($username,$password,$db);
            
            echo $response;
            exit();
        }
        else{
            echo json_encode([
                'error' => 'request_method_not_allowed',
                'message' => 'Request can be only made using POST method',
            ]);
            exit();
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
    <link rel="stylesheet" href="../assets/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Epic Punjab-Login</title>
    
</head>
<body class="is-full-screen is-centered">
<div class="form-container white medium">
    <header>
        <img src="../assets/images/logo.png" alt="">
        <h1>Admin Login</h1>
    </header>
    <form id="login-form" method="post">
        
  <div class="form">
      <div class="input-group">
          <input type="text" name="username" id="username" placeholder="Username" />
          <span><i id="user_icon" class="fas fa-user"></i></span>
      </div>
      <div id="username_error">
      
     
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
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>
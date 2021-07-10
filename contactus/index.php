<?php 
    session_start();
    require "../includes/config.php"; 
    require "../functions/escapedata.php";
    require "../classes/DB.php"; 
    $DB = new DB($db, "messages");
    
    if(isset($_POST["email"]) && isset($_POST["email"]) && isset($_POST["email"])){
        if(!isset($_SESSION["sendMessage_Token"]) || !isset($_POST["sendMessage_Token"])){
            die("Access Denied ");
            exit;
        }
        if($_SESSION["sendMessage_Token"] != $_POST["sendMessage_Token"]){
            die("Access Denied");
            exit;
        }
        if($_SERVER["REQUEST_METHOD"] === "POST" ){
            if(empty($_POST["email"]) || empty($_POST["name"]) || empty($_POST["message"]) ){
                echo json_encode([
                    "fail" => "fail",
                    "message" => "Please fill in the missing fields",
                ]);
                exit;
            }
            else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                echo json_encode([
                    "fail" => "fail",
                    "message" => "Invalid Email",
                ]);
                exit;
            }
            else if(!preg_match("/^[a-zA-Z ]+$/",$_POST["name"])){
                echo json_encode([
                    "fail" => "fail",
                    "message" => "Please enter a valid Name",
                ]);
                exit;
            }
            else if(!preg_match("/^[a-zA-Z0-9-.,? ]+$/",$_POST["message"])){
                echo json_encode([
                    "fail" => "fail",
                    "message" => "You can't include special characters",
                ]);
                exit;
            }
            else{
                $email   = escapeData($_POST["email"],$db);
                $name    = escapeData($_POST["name"],$db);
                $message = escapeData($_POST["message"],$db);
                $data    = array("email" => $email , "name" => $name  , "message" =>  $message  );
                $response = $DB->insert($data);
                if($response == "success"){
                    echo json_encode([
                        "success" => "success" ,
                        "message" => "Message sent successfully",
                    ]);
                    exit;
                }
                else{
                    echo json_encode([
                        "fail" => "fail" ,
                        "message" => $response,
                    ]);
                    exit;
                }
                exit;
            }
        }
        else{
            die("Access Denied ");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <title>Epic Punjab</title>
</head>

<body>
    <div class="header">
        <?php
       if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
       {
           require "../includes/userHeader.php";
       }
       else{
           require "../includes/header.php";
       }
       ?>
    </div>
    <div class="content">
        <div class="container-fluid">
        
        <!--Main Form -->
        <!--Add Message Row -->
       <div class="row mt-3">
           <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12 d-flex  justify-content-center align-items-center ">
               <div class="form-container white medium">
                   <form id="sendmessage_Form" method="post">
                       <!--Form -->
                       <div class="form">
                       <h1 class="text-primary mb-4">Contact Us</h1>
                       <input type="hidden" name="sendMessage_Token" id="sendMessage_Token" value=<?= csrf_token("sendMessage_Token"); ?> />
      <div class="input-group">
          <input type="text" name="email" id="email" placeholder="Email" />
          <span><i id="email_icon" class="fas fa-envelope"></i></span>
      </div>
      <div id="email_error">
        </div>
      <div class="input-group">
          <input type="text" id="name" name="name" placeholder="Your Name" />
          <span><i id="name_icon" class="fas fa-user"></i></span>
      </div>
      <div id="name_error">
            
        </div>
        <div class="input-group ">
          <textarea name="message" id="message" placeholder="Your Message"></textarea>
          <span><i id="message_icon" class="fas fa-pen"></i></span>
      </div>
      <div id="message_error">
            
        </div>
        <div id="form_message" >
            
        </div>
      <div class="input-group">
         <button type="submit" id="sendmessage-btn" name="sendmessage-btn" class="primary d-flex align-items-center justify-content-center waves-effect fluid medium-font"><i class="fas fa-paper-plane m-0 mr-2 medium-font"></i>Send Message</button>
      </div>
  </div>
                       <!--End of Form -->
                   </form>
               </div>
           </div>
              
       </div>
       <!--End of Add Event Row-->
        <!--End of Main Form -->

            
        </div>
    </div>
    <script src="../assets/scripts/jquery.js"></script>
    
    <script src="../assets/scripts/main.js"></script>
    <script src="../assets/scripts/contactus.js"></script>
    <script>
        var active_link = document.getElementById("contactus_link");
        active_link.classList.add("active-sidebar-link");
    </script>
</body>

</html>
<?php 
    session_start();
    require "../includes/config.php"; 
    require "../functions/escapedata.php";
    
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
        <!--Heading -->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h1 class="fluid text-primary text-center p-2">Posts</h1>
            </div>
        </div>
        <div class="row" id="post_data"></div>
        </div>
    </div>
    <script src="../assets/scripts/jquery.js"></script>
    <script src="../assets/scripts/main.js"></script>
    <script src="../assets/scripts/posts.js"></script>
    <script>
        var active_link = document.getElementById("posts_link");
        active_link.classList.add("active-sidebar-link");
    </script>
</body>

</html>
<?php
 session_start();
 if(!isset($_SESSION["admin"]) && !isset($_SESSION["token"])){
    header("location: login");
}
require_once("../includes/config.php");
require_once("classes/dashboardClass.php");

if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ){
    try{
        $dashboard = new dashboard($db);
        echo $dashboard->bindAll();
        exit();
    }
    catch(Exception $e){
        echo json_encode([
            'error' => 'error',
            'message' => 'Something Went Wrong',
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
    <link rel="stylesheet" href="../assets/css/bootstrap-grid.min.css">
    <title>Epic Punjab Admin</title>
    
    <style>
    .dashboard-navbar {
  top: 0;
  width: 100%;
  min-height: 10vh;
  background: #ffffff;
  z-index: 10;
  position: fixed;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-direction: normal;
  -webkit-box-orient: horizontal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  -webkit-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.16) ;
          box-shadow:0px 1px 2px 0px rgba(0,0,0,0.16) ;
}

.dashboard-navbar ul, .navbar li {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-direction: normal;
  -webkit-box-orient: horizontal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  
}

.dashboard-navbar img {
  height: 10vh;
  width: auto;
}

.dashboard-navbar li {
  margin: auto 10px;
  height: 100%;
}

.dashboard-navbar li span {
  font-weight: bold;
  text-transform: uppercase;
}

.dashboard-navbar .logo a {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-direction: normal;
  -webkit-box-orient: horizontal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  margin: auto 5px;
}
.index-content {
  top: 12vh;
  position: absolute;
  left: 0;
  right: 0;
  width: 100%;
  min-height: 70%;
  height: auto;
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
}
@media only screen and (max-width: 396px){
    .dashboard-navbar .logo{
        width: 100%;
    }
    .dashboard-navbar .logo a{
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }
    .dashboard-navbar ul{
        width: 100%;
        background: #fafafa;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  
    }
    .index-content{
        top: 22vh;
    }
}

    </style>
</head>
<body>
<form action="actions/logout" method="post" id="logout-form">
    <div class="dashboard-navbar">
        <div class="logo">
            <a href="dashboard">
                <img src="../assets/images/logo.png" alt="" />
                <h1 class="navbar-heading">Epic Punjab </h1>
            </a>
         </div> 
        <ul id="menu">
            <li><span class="capitalize"><?php echo $_SESSION["admin"]; ?> </span></li>
            <li><button id="logout-btn" class="info-light waves-effect waves-blue mt-1 mb-1">Logout</button></li>
            
        </ul>
    </div>
    </form>
    

<div class="index-content">
<div class="container-fluid">
<h1 class="fluid text-center text-primary">Dashboard
</h1>

    <div class="row row-container mt-5">
        <div class="col-12 col-lg-4 col-md-4 col-xl-4">
        <form action="actions/dashboard" method="get" id="counter-form">
            <div class="card">
                <div class="card-body">
                    <h1>Number of Users</h1>
                    <span id="users_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Number of Suggestions</h1>
                    <span id="suggestions_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Insititution Records</h1>
                    <span id="institute_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>All Number of Events</h1>
                    <span id="events_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Hospital Records</h1>
                    <span id="hospital_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Company Records</h1>
                    <span id="company_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>News and Media Records</h1>
                    <span id="newsandmedia_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Blog Records</h1>
                    <span id="blogs_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Image Records</h1>
                    <span id="images_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Discovery Records</h1>
                    <span id="discovery_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Tourism Places Records</h1>
                    <span id="tourism_places_count" class="count"></span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Tourist Agents Records</h1>
                    <span id="tourist_agents_count" class="count"></span>
                </div>
            </div>
            </form>
        </div>
        <div class="col-12 col-lg-8 col-xl-8 col-sm-12 col-md-8">
            <div class="row">
                <div class="col-12 col-lg-4 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body"><a href="dashboard" class="verticle-link"><i class="fas fa-chart-line"></i>Dashboard</a></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body"><a href="users" class="verticle-link"><i class="fas fa-users"></i>Users</a></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body"><a href="blogs" class="verticle-link"><i class="fas fa-edit"></i>Blogs</a></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body"><a href="gallery" class="verticle-link"><i class="fas fa-images"></i>Gallery</a></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body"><a href="events" class="verticle-link"><i class="fas fa-calendar-alt"></i>Events</a></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body"><a href="messages" class="verticle-link"><i class="fas fa-paper-plane"></i>Messages</a></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body"><a href="information" class="verticle-link"><i class="fas fa-info"></i>Information</a></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body"><a href="http://" class="verticle-link"><i class="fas fa-question-circle"></i>Quiz</a></div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-sm-6 col-md-6">
                    <div class="card">
                        <div class="card-body"><a href="http://" class="verticle-link"><i class="fas fa-history"></i>Discoveries</a></div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="../assets/scripts/jquery.js"></script>
    <script type="text/javascript" src="../assets/scripts/waves.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/dashboard.js"></script>
</body>
</html>
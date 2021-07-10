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
    <link rel="stylesheet" href="../assets/css/bootstrap-grid.min.css">
    <title>Epic Punjab</title>
    <script type="text/javascript" src="../assets/scripts/jquery.js"></script>
    <script type="text/javascript" src="../assets/scripts/waves.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo-container">
            <button id="toggle" class="waves-effect waves-circle " >
                <i class="fas fa-bars"></i>
            </button>
            <div class="logo">
            <a href="dashboard"><img src="../assets/images/logo.png" alt="">
            <h1 >Epic Punjab </h1></a>
            </div>
        </div>
        
    </div>
    <div id="sidebar" class="sidebar">
        <a id="dashboard_link" href="dashboard"><i class="fas fa-chart-line"> </i>Dashboard</a>
            <a id="events_link" href="events"><i class="fas fa-calendar-alt"></i>Events</a>
            <a id="users_link" href="users"><i class="fas fa-users"></i>Users</a>
            <a id="blogs_link" href="blogs"><i class="fas fa-edit"></i>Blogs</a>
            <a id="gallery_link" href="gallery"><i class="fas fa-images"></i>Gallery</a>
            <a id="discoveries_link" href="discoveries"><i class="fas fa-history"></i>Discoveries</a>
            <a id="quiz_link" href="quiz"><i class="fas fa-question-circle"></i>Quiz</a>
            <a id="information_link" href="information"><i class="fas fa-info"></i>Information</a>
            <a id="suggestions_link" href="suggestions"><i class="fas fa-paper-plane"></i>Suggestions</a>
            <span class="capitalize bold"><i class="fas fa-user"></i><?php echo $_SESSION["admin"]; ?> </span>
            <form action="actions/logout" method="post" id="logout-form"><button id="logout-btn" class="info-light waves-effect waves-blue mb-3">Logout</button></form>
           
        </div>
    
        
    

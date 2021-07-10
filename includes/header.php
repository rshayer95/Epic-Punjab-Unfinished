<?php
    include "constants.php";
?>
<div class="navbar">
        <div class="logo-container">
            <button id="toggle" class="waves-effect waves-circle " >
                <i class="fas fa-bars"></i>
            </button>
            <div class="logo">
            <a href="dashboard"><img src=<?= '"'. BASE_PATH . '/assets/images/logo.png' . '"' ?> alt="">
            <h1 >Epic Punjab </h1></a>
            </div>
        </div>
        
</div>
<div id="sidebar" class="sidebar">
        <a id="home_link" href=<?php echo  '"'.BASE_PATH .'"'; ?>><i class="fas fa-home"> </i>Home</a>
        <a id="events_link" href=<?= '"'. BASE_PATH .'events/'. '"'; ?>><i class="fas fa-calendar-alt"></i>Events</a>
        <a id="history_link" href=<?= '"'. BASE_PATH .'history/'. '"'; ?>><i class="fas fa-landmark"></i>History</a>
        <a id="posts_link" href=<?= '"'. BASE_PATH .'posts/'. '"'; ?>><i class="fas fa-edit"></i>Posts</a>
        <a id="gallery_link" href=<?= '"'. BASE_PATH .'gallery/'. '"'; ?>><i class="fas fa-images"></i>Gallery</a>
        <a id="discoveries_link" href=<?= '"'. BASE_PATH .'discoveries/'. '"'; ?>><i class="fas fa-history"></i>Discoveries</a>
        <a id="quiz_link" href=<?= '"'. BASE_PATH .'quiz/'. '"'; ?>><i class="fas fa-question-circle"></i>Quiz</a>
        <a id="information_link" href=<?= '"'. BASE_PATH .'information/'. '"'; ?>><i class="fas fa-info"></i>Information</a>
        <a id="upload_link" href=<?= '"'. BASE_PATH .'upload/'. '"'; ?>><i class="fas fa-cloud-upload-alt"></i>Upload</a>
        <a id="contactus_link" href=<?= '"'. BASE_PATH .'contactus/'. '"'; ?>><i class="fas fa-envelope"></i>Contact Us</a>
        <a id="login_link" href=<?= '"'. BASE_PATH .'accounts/login?from='.FROM. '"'; ?>><i class="fas fa-user"></i>Login</a>
        <a id="register_link" href=<?= '"'. BASE_PATH .'accounts/signup'. '"'; ?>><i class="fas fa-user-plus"></i>Register</a>
           
        </div>
    
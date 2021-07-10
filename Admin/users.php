<?php
 session_start();
 if(!isset($_SESSION["admin"]) && !isset($_SESSION["token"])){
    
    header("location: login");
}
require_once("../includes/config.php");
require_once("classes/UsersClass.php");
require_once("../functions/escapedata.php");
$user = new Users($db);
csrf_token();
?>
<?php include_once "includes/header.php"; ?>
<div id="popup" class="popup">
    <div id="modal" class="modal small">
        <div class="modal-body">
        <p>Are you sure to Delete this User ?</p>
        <div class="btn-group">
        <form id="delete_form" action="actions/users" method="post">
        <input type="hidden" id="token" name="token" value= <?= csrf_token() ?> />
        <button id="delete_user" class="danger waves-efect">Delete</button>
        </form>
        <button id="closeModal" class="close">Cancel</button>
        </div>
        </div>
    </div>
</div>
<div class="content " >
    <div class="container-fluid ">
       <div class="row row-container">
           <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12 d-flex justify-content-center align-center">
           <h1 class="fluid text-center text-primary uppercase">Users </h1>
           </div>
          
       </div>
       <div id="user_data" class="row">
           
        </div>
       </div>
       <div class="row"></div>
           <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
           <button id="load-more" class="hidden fluid info mt-2 mb-4" type="submit">Load More</button>
           </div>
       
    </div>
  
</div>
<script src="js/users.js"></script>
<script type="text/javascript">
      var active_link = document.getElementById("users_link");
      active_link.classList.add("active-sidebar-link");
      
      function close_popup() {
          $("#popup").css({display: "none"});
          $('html').css("overflow-y", "auto");
      }
      function setDeleteId(id){
          $("#delete_user").attr("data-id",id);
      }
      $('#closeModal').on('click', close_popup);
      function deleteUser(id) {
          $("#popup").css({display: "flex"});
          $("#modal").css({'animation-play-state': "running"});
          $("#modal").css({'-webkit-animation-play-state': "running"});
          $('html').css("overflow-y", "hidden");
          setDeleteId(id);
          $("#popup").on("click",function(event){
              var target = $(event.target ); 
                 if(target.is("#popup"))
                  {
                      close_popup();
                  } 
             $("#modal").click(function(event){
                   event.stopPropagation();
                });
            });


      }
      
</script>

</body>
</html>
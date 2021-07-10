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
        <p>Are you sure to Delete this Event ?</p>
        <div class="btn-group">
        <form id="delete_form" action="actions/users" method="post">
        <input type="hidden" id="token" name="token" value= <?= csrf_token() ?> />
        <button id="delete_event" class="danger waves-efect">Delete</button>
        </form>
        <button id="closeModal" class="close">Cancel</button>
        </div>
        </div>
    </div>
</div>
<div class="content " >
    <div class="container-fluid ">
    <!--Heading Row -->
       <div class="row row-container">
           <div class="col-9 col-md-10 col-lg-10 col-xl-11 col-sm-9 d-flex  align-center ">
           <h1 class="fluid text-center text-primary uppercase">Events </h1>
           </div>
           <div class="col-3 col-md-2 col-lg-2 col-xl-1 col-sm-3 d-flex justify-content-end">
           <button id="show_addEventContainer" class="icon-button light waves-effect waves-circle"><i class="fas fa-plus"></i></button>
           </div>   
       </div>
       <!--Add Event Row -->
       <div class="row addevent-container hidden">
           <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12 d-flex  justify-content-center align-items-center ">
               <div class="form-container white medium">
                   <form action="actions/events" id="addEvent_Form" method="post">
                       <!--Form -->
                       <div class="form">
                       <h1 class="highlight-text mb-2">Add Event</h1>
                       <input type="hidden" name="addToken" id="addToken" value=<?= csrf_token("addToken"); ?> />
      <div class="input-group">
          <input type="date" name="date" id="date" placeholder="Date" />
          <span><i id="date_icon" class="fas fa-calendar-alt"></i></span>
      </div>
      <div id="date_error">
        </div>
      <div class="input-group">
          <input type="text" id="name" name="name" placeholder="Name of Event" />
          <span><i id="name_icon" class="fas fa-pen"></i></span>
      </div>
      <div id="name_error">
            
        </div>
        <div class="input-group ">
          <textarea name="description" id="description" placeholder="Description of Event"></textarea>
          <span><i id="description_icon" class="fas fa-pen"></i></span>
      </div>
      <div id="description_error">
            
        </div>
        <div id="form_message" >
            
        </div>
      <div class="input-group">
         <button type="submit" id="addevent-btn" name="addevent-btn" class="primary d-flex align-items-center justify-content-center waves-effect fluid medium-font"><i class="fas fa-plus m-0 mr-2 medium-font"></i>Add</button>
      </div>
  </div>
                       <!--End of Form -->
                   </form>
               </div>
           </div>
              
       </div>
       <!--End of Add Event Row-->
       <div id="event_data" class="row">
           
        </div>
       </div>
       <div class="row"></div>
           <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
           <button id="load-more" class="fluid info mt-2 mb-4 hidden" type="submit">Load More</button>
           </div>
       
    </div>
  
</div>
<script src="js/events.js"></script>
<script type="text/javascript">
      var active_link = document.getElementById("events_link");
      active_link.classList.add("active-sidebar-link");
      
      function close_popup() {
          $("#popup").css({display: "none"});
          $('html').css("overflow-y", "auto");
      }
      function setDeleteId(id){
          $("#delete_event").attr("data-id",id);
      }
      $('#closeModal').on('click', close_popup);
      function deleteEvent(id) {
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
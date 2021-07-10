<?php
 session_start();
 if(!isset($_SESSION["admin"]) && !isset($_SESSION["token"])){
    
    header("location: login");
}
require_once("../includes/config.php");
require_once("classes/galleryClass.php");
require_once("../functions/escapedata.php");
$images = new Gallery($db);
csrf_token();
?>
<?php include_once "includes/header.php"; ?>
<div id="popup" class="popup">
    <div id="modal" class="modal small">
        <div class="modal-body">
        <p>Are you sure to Delete this Picture ?</p>
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
<div id="addimage_popup" class="popup">
    <div id="modal_body" class="modal medium">
        <div class="modal-body fluid p-0">
        <div class="form-container white fluid ">
                   <form action="actions/gallery" id="addImage_Form" method="post">
                       <!--Form -->
                       <div class="form">
                       <h1 class="highlight-text mb-2">Add Image</h1>
                       <input type="hidden" name="addimage_Token" id="addimage_Token" value=<?= csrf_token("addimage_Token"); ?> />
      <div class="input-group">
          <input type="text" name="title" id="title" placeholder="title" />
          <span><i id="title_icon" class="fas fa-pen"></i></span>
      </div>
      <div id="title_error">
        </div>
      <div class="input-group">
          <label for="files" class="file_label">Choose Files</label>
          <input type="file" class="hidden" id="files" name="files" placeholder="Images" />
          <span><i id="name_icon" class="fas fa-pen"></i></span>
      </div>
      <div id="name_error">
            
        </div>
       
        <div id="form_message" >
            
        </div>
      
  </div>
                       <!--End of Form -->
                   </form>
                   <div class="btn-group p-3">
                   <button type="submit" id="addevent-btn" name="addevent-btn" class="primary d-flex align-items-center justify-content-center waves-effect fluid  medium-font"><i class="fas fa-plus m-0 mr-2 medium-font"></i>Add</button>
                   <button id="closePopup" class="close fluid ">Cancel</button>
                   </div>
                   
               </div>
        
        </div>
        </div>
    </div>
</div>
<div class="content " >
    <div class="container-fluid ">
       <!--Heading Row -->
       <div class="row row-container">
           <div class="col-9 col-md-10 col-lg-10 col-xl-11 col-sm-9 d-flex  align-center ">
           <h1 class="fluid text-center text-primary uppercase">Gallery </h1>
           </div>
           <div class="col-3 col-md-2 col-lg-2 col-xl-1 col-sm-3 d-flex justify-content-end">
           <button id="show_addevent_popup" class="icon-button light waves-effect waves-circle"><i class="fas fa-plus"></i></button>
           </div>   
       </div>
       <div id="image_data" class="row">
           
        </div>
       </div>
       <div class="row"></div>
           <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
           <button id="load-more" class="hidden fluid info mt-2 mb-4" type="submit">Load More</button>
           </div>
       
    </div>
  
</div>

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
<script src="js/gallery.js"></script>
</body>
</html>
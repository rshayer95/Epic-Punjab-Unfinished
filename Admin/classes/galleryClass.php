<?php
    class Gallery{
        private $db;
        public function __construct($db){
            $this->db = $db;
        }
        public function getImages($count= 9){
            try {
                $images = $this->db->prepare("SELECT * FROM `gallery` LIMIT $count");
                $images->execute();
                $result = $images->get_result();
                if ($result->num_rows > 0) {
                    while($image = $result -> fetch_array(MYSQLI_ASSOC)){
                      
                    ?>
                    <div id=<?= '"delete_'.$image["g_id"]  . '"'; ?> class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div class="card bordered">
                                <div class="card-head white fluid">
                                    <div class="row">
                                    <img class="rounded" src= <?= '"../'.$image["g_thumbnail"] . '"';  ?> />
                                    
                                    <div class="column">
                                    <h3 class="avatar-name">
                                         <?= $image["g_title"]; ?>
                                     </h3>
                                     
                                    <span>
                                         <?php $timestamp = explode(" ",$image["timestamp"]);
                                         echo $timestamp[0]; ?>
                                     </span>
                                    </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="card-body m-0">
                                 <div class="row p-1">
                                 <a style="border-radius: 5px; " role="button" href=<?= '"viewImage/image='. $image["g_id"].'"'; ?>  class="p-2 mb-2 medium-font text-center info-light waves-effect fluid ">View</a>
                                 <button data-id=<?= '"delete_'. $image["g_id"].'"'; ?> onclick="deleteImage(this.dataset.id, this)" class="delete-image fluid danger waves-effect ">Delete</button>
                                 

                                 </div>
                               
                                   
                                </div>
                         </div>
                    </div>
                    <?php 
                    }
                 
                } 
                else{
                    echo "No Data Available";
                }
                
                $this->db->close();
              } catch(Exception $e){
                echo "Something Went Wrong";
            }
        }
        
    }
?>
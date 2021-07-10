<?php
    class Events{
        private $db;
       public function __construct($db){
           $this->db = $db;
        }
        public function upcomingEvents($count = 9){
          
            try {
                $events = $this->db->prepare("SELECT * FROM `events` WHERE date > CURRENT_DATE() LIMIT $count");
                $events->execute();
                $result = $events->get_result();
                if ($result->num_rows > 0) {
                    while($event = $result -> fetch_array(MYSQLI_ASSOC)){
                      
                    ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div style="min-height: 250px;" class="card bordered">
                                <div class="card-head fluid">
                                <div class="column justify-content-center fluid ml-0">
                                <h3 class=" text-primary fluid text-center mb-1"> <?=$event["name"]; 
                                
                                ?></h3>
                                <p class="highlighted-text fluid text-center"><?= $event["date"]; ?> </p>
                                    </div>
                                </div>
                                <div class="card-body mt-0">
                                    
                                    <div class="block p-0">
                                        <span>
                                            <?= $event["description"]; ?>
                                        </span>
                                    </div>
                                
                                    
                    
                                </div>
                         </div>
                    </div>
                    <?php 
                    }
                 
                } 
                else{
                    echo '<p class="highlighted-text ml-4">Events not available<p>';
                }
                
                $this->db->close();
              } catch(Exception $e){
                    echo '<p class="highlighted-text ml-4">Something went wrong.<p>';
            }
        }
        //Today's Events
        public function todaysEvents(){
           
            try {
                $events = $this->db->prepare("SELECT * FROM `events` WHERE date = CURRENT_DATE() ");
                $events->execute();
                $result = $events->get_result();
                if ($result->num_rows > 0) {
                    while($event = $result -> fetch_array(MYSQLI_ASSOC)){
                      
                    ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div style="min-height: 300px;" class="card bordered">
                                <div class="card-head white fluid">
                                <div class="column justify-content-center fluid ml-0">
                                <h3 class=" text-primary fluid text-center mb-1"> <?=$event["name"]; 
                                
                                ?></h3>
                                <p class="highlighted-text fluid text-center"><?= $event["date"]; ?> </p>
                                    </div>
                                </div>
                                <div class="card-body mt-0">
                                    
                                    <div class="block p-0">
                                        <span>
                                            <?= $event["description"]; ?>
                                        </span>
                                    </div>
                                
                                    
                    
                                </div>
                         </div>
                    </div>
                    <?php 
                    }
                 
                } 
                else{
                    echo '<p class="highlighted-text ml-4">Events not available<p>';
                }
                
                $this->db->close();
              } catch(Exception $e){
                    echo '<p class="highlighted-text ml-4">Something went wrong.<p>';
            }
        }
    }
?>
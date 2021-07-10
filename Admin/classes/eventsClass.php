<?php
    class Events{
        private $db;
        public function __construct($db){
            $this->db = $db;
        }
        public function getEvents($count= 9){
            try {
                $events = $this->db->prepare("SELECT * FROM `events` LIMIT $count");
                $events->execute();
                $result = $events->get_result();
                if ($result->num_rows > 0) {
                    while($event = $result -> fetch_array(MYSQLI_ASSOC)){
                      
                    ?>
                    <div id=<?= '"delete_'.$event["id"]  . '"'; ?> class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div style="min-height: 300px; height: auto;" class="card bordered">
                                <div class="card-head  fluid">
                                <div class="row flex-row-reverse align-items-center p-1">
                                <button data-id=<?= '"delete_'. $event["id"].'"'; ?> onclick="deleteEvent(this.dataset.id, this)" class="delete-event icon-button danger-light waves-effect waves-circle "><i class="fas fa-trash "></i></button>
                                <div class="column justify-content-center  flex-1">
                                <h3 class=" text-primary mb-1"> <?=$event["name"]; 
                                
                                ?></h3>
                                      <p class="highlighted-text"><?= $event["date"]; ?> </p>
                                    </div>
                                </div>
                                
                                </div>
                                
                                <div class="card-body mt-0">
                                    
                                    <div class="block pt-0">
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
                    return "no_data_available";
                }
                
                $this->db->close();
              } catch(Exception $e){
                return "something_went_wrong";
            }
        }
        public function deleteEvent($id){
                
                $event = $this->db->prepare("DELETE FROM `events` WHERE `id`= ? ");
                $event-> bind_param('i',$id);
                if($event->execute()){
                    echo "success";
                    exit;
                }
                else{
                    echo "something_went_wrong";
                }
        }
        
        private function isDate($value) 
        {
            if (!$value) {
                return false;
            }
        
            try {
                new \DateTime($value);
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
        //Add An Event
        public function addEvent($data = []){
            if(empty($data["date"]) || empty($data["name"]) || empty($data["description"])){
                echo "Please Fill in the missing fields";
            }
            else if (!$this->isDate($data["date"])) {
                echo "Please Enter Valid Date";
            }
            else if(!preg_match("/^[a-zA-Z\s]+$/",$data["name"])){
                echo "Please Enter Valid Name";
            }
            else if(!preg_match("/^[a-zA-Z0-9\s\.,]+$/",$data["description"])){
                echo "Please Enter Valid Data";
            }
            else{
                $event = $this->db->prepare("INSERT INTO `events`(`date`,`name`,`description`) VALUES (?,?,?) ");
                $event-> bind_param('sss',$data["date"],$data["name"],$data["description"]);
                if($event-> execute()){
                    $result = $event-> get_result();
                    echo "success";
                }
                else {
                    return "Failed To Add Event";
                }
            }
        }
    }
?>
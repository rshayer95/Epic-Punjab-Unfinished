<?php
    class Users{
        private $db;
        public function __construct($db){
            $this->db = $db;
        }
        
        public function getUsers($count= 9){
            
            try {
                $users = $this->db->prepare("SELECT * FROM `userinfo` LIMIT $count");
                $users->execute();
                $result = $users->get_result();
    
                if ($result->num_rows > 0) {
                    while($user = $result -> fetch_array(MYSQLI_ASSOC)){
                       $id = explode("@",$user["email"]);
                        if($user["profilepic"] == null){
                          $profilepic = '<i class="fas fa-user big"></i>';          
                        }
                        else{
                            $profilepic =  '<img class="rounded" src=' . '"../'.$user["thumbnail"].'" />';
                            
                        }
                    ?>
                    <div id=<?= '"'.$id[0]  . '"'; ?> class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div class="card bordered">
                            <div class="card-head">
                                <div class="row">
                                <?= $profilepic ?>
                                
                                <div class="column">
                                    <h3 class="avatar-name"> <?=$user["name"]; ?></h3>
                                    
                                    <button data-id=<?= '"'. $user["email"].'"'; ?> onclick="deleteUser(this.dataset.id, this)" class="delete-user icon-button danger-light waves-effect waves-circle"><i class="fas fa-trash"></i></button>
                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <span> Email </span>
                                    <p><?= $user["email"]; ?></p>
                                </div>
                                <div class="row">
                                    <span> Mobile </span>
                                    <p><?= $user["mobile"]; ?> </p>
                                </div>
                                <div class="row">
                                    <span> Registered On </span>
                                    <p><?= explode(" ",$user["regdate"])[0]; ?></p>
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
        public function deleteUser($email){
                $statement = $this->db->prepare("SELECT * FROM `userinfo` WHERE `email` = ? ");
                $statement-> bind_param('s',$email);
                $statement-> execute();
                $result = $statement-> get_result();
                if($result-> num_rows == 1){
                    while($row = $result-> fetch_array(MYSQLI_ASSOC)){
                        if(!empty($row["profilepic"])){
                            $profilepic = "../../". $row["profilepic"];
                            $thumbnail = "../../". $row["thumbnail"];
                            unlink($profilepic);
                            unlink($thumbnail);
                        }
                    }
                }
                $user = $this->db->prepare("DELETE FROM `userinfo` WHERE `email`= ? ");
                $user-> bind_param('s',$email);
                if($user->execute()){
                  
                    echo "success";
                    exit;
                }
                else{
                    echo "user_not_found";
                }
        }
    }
?>
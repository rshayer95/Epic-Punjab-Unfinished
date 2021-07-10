<?php
    class Posts{
        private $db;
        public function __construct($db){
            $this->db = $db;
        }
        //Get All Posts
        public function getPosts($count = 9){
            try {
                $Posts = $this->db->prepare("SELECT * FROM `blogs` LIMIT $count");
                $Posts->execute();
                $result = $Posts->get_result();
                if ($result->num_rows > 0) {
                    while($post = $result -> fetch_array(MYSQLI_ASSOC)){
                      
                    ?>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card fluid">
                               
                                <h3 class=" ml-3 text-primary fluid mt-3 mb-0"> <?=$post["title"]; 
                                
                                ?></h3>
                               
                                <div class="card-body mt-2 ml-0 pt-0">
                                    <div class="block mt-0 p-0 ">
                                        <p class="text-justify">
                                            <?= $post["blog"]; ?>
                                        </p>
                                    </div>
                                    <div class="block p-0">
                                        <span class="d-flex align-items-center "> By:
                                        <h6 class="text-info ml-2"><?= $post["blogger_name"]; ?></h6>
                                        </span>
                                    </div>
                                
                                    
                    
                                </div>
                         </div>
                    </div>
                    <?php 
                    }
                 
                } 
                else{
                    echo '<p class="highlighted-text ml-4">NO POSTS<p>';
                }
                
                $this->db->close();
              } catch(Exception $e){
                    echo '<p class="highlighted-text ml-4">Something went wrong.<p>';
            }
        
        }
    }
?>
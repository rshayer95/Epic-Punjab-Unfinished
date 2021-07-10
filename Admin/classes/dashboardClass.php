<?php

    class dashboard{
       private $db;
       public function __construct($db){
           $this->db = $db;
       }
        private function number_of_users(){
            try {
                $users = $this->db->prepare("SELECT * FROM `userinfo`");
                $users->execute();
                $users->store_result();
    
                if ($users->num_rows > 0) {
                    return $users-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return "something_went_wrong";
                    
                
            }
        }
        private function number_of_suggestions(){
            try {
                $suggestions = $this->db->prepare("SELECT * FROM `user_suggestions`");
                $suggestions->execute();
                $suggestions->store_result();
    
                if ($suggestions->num_rows > 0) {
                    return $suggestions-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
            }
        }
        private function number_of_images(){
            try {
                $images= $this->db->prepare("SELECT * FROM `gallery`");
                $images->execute();
                $images->store_result();
    
                if ($images->num_rows > 0) {
                    return $images-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
                
            }
        }
        private function number_of_blogs(){
            try {
                $blogs= $this->db->prepare("SELECT * FROM `blogs`");
                $blogs->execute();
                $blogs->store_result();
    
                if ($blogs->num_rows > 0) {
                    return  $blogs-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
            }
        }
        private function number_of_events(){
            try {
                $events = $this->db->prepare("SELECT * FROM `events`");
                $events->execute();
                $events->store_result();
    
                if ($events->num_rows > 0) {
                    return $events-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
                
            }
        }
        private function number_of_institutes(){
            try {
                $institutes = $this->db->prepare("SELECT * FROM `education`");
                $institutes->execute();
                $institutes->store_result();
    
                if ($institutes->num_rows > 0) {
                    return $institutes-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
            }
        }
        private function number_of_hospitals(){
            try {
                $hospitals = $this->db->prepare("SELECT * FROM `hospitals`");
                $hospitals->execute();
                $hospitals->store_result();
    
                if ($hospitals->num_rows > 0) {
                    return $hospitals-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
            }
        }
        private function number_of_companies(){
            try {
                $companies = $this->db->prepare("SELECT * FROM `companies`");
                $companies->execute();
                $companies->store_result();
    
                if ($companies->num_rows > 0) {
                    return $companies-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
                
            }
        }
        private function number_of_newsandmedia(){
            try {
                $newsmedia = $this->db->prepare("SELECT * FROM `newsmedia`");
                $newsmedia->execute();
                $newsmedia->store_result();
    
                if ($newsmedia->num_rows > 0) {
                    return $newsmedia-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
            }
        }
        private function number_of_discoveries(){
            try {
                $discoveries = $this->db->prepare("SELECT * FROM `kc`");
                $discoveries->execute();
                $discoveries->store_result();
    
                if ($discoveries->num_rows > 0) {
                    return $discoveries-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';  
            }
        }
        private function number_of_tourismplaces(){
            try {
                $places = $this->db->prepare("SELECT * FROM `places`");
                $places->execute();
                $places->store_result();
    
                if ($places->num_rows > 0) {
                    return $places-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
            }
        }
        private function number_of_tourismagents(){
            try {
                $agents = $this->db->prepare("SELECT * FROM `travelagents`");
                $agents;
                $agents->store_result();
    
                if ($agents->num_rows > 0) {
                    return $agents-> num_rows;
                } 
                else 
                {
                    return 0;
                }
                $this->db->close();
              } catch(Exception $e){
                return 'something_went_wrong';
            }
        }
        
        public function users_count(){
            return $this->number_of_users();
            
        }
        public function suggestions_count(){
            return $this-> number_of_suggestions();
        }
        public function blogs_count(){
            return $this->number_of_blogs();
        }
        public function gallery_count(){
            return $this-> number_of_images();
        }
        public function events_count(){
            return $this->number_of_events();
        }
        public function discoveries_count(){
            return $this-> number_of_discoveries();
        }
        public function institute_count(){
            return $this-> number_of_institutes();
        }
        public function hospital_count(){
            return $this-> number_of_hospitals();
        }
        public function company_count(){
            return $this-> number_of_companies();
        }
        public function newsandmedia_count(){
            return $this-> number_of_newsandmedia();
        }
        public function tourismplaces_count(){
            return $this-> number_of_tourismplaces();
        }
        public function tourismagents_count(){
            return $this-> number_of_tourismagents();
        }
        public function bindAll(){
           return json_encode([
               'success' => 'success',
               'users_count' => $this->number_of_users(),
               'suggestions_count' => $this->number_of_suggestions(),
               'institute_count' => $this->number_of_institutes(),
               'events_count' => $this-> number_of_events(),
               'hospital_count' => $this->number_of_hospitals(),
               'company_count' => $this->number_of_companies(),
               'newsandmedia_count' => $this->number_of_newsandmedia(),
               'blogs_count' => $this->number_of_blogs(),
               'images_count' => $this->number_of_images(),
               'discovery_count' => $this->number_of_discoveries(),
               'tourism_places_count' => $this->number_of_tourismplaces(),
               'tourist_agents_count' => $this->number_of_tourismagents(),
           ]);
    }
}
   
?>
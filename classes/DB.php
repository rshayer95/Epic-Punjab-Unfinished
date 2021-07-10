<?php
    class DB{
        private $db,$table;
        public function __construct($db,$table){
            $this->db = $db;
            $this->table = $table;
        }
       
        //Insert Query
        public function insert($data = []){
            $keys = implode(",",array_keys($data));
            $how_many_values = array();
            $how_many_types = array();
            for($i =0; $i < sizeof($data); $i++){
                array_push($how_many_values, "?");
                array_push($how_many_types, "s");
            }
            $question_Marks = implode(",",$how_many_values);
            try{
                $string_types =  implode("",$how_many_types) ;
                $statement = $this->db->prepare("INSERT INTO $this->table($keys) VALUES ($question_Marks) ");
                $statement->bind_param($string_types, ...array_values($data));
                   
             
                    if($statement-> execute()){
                        $result = $statement-> get_result();
                        return "success";
                    }
                    else {
                        return "Failed To Perform Query";
                    }
                    $this->db->close();
            }
            catch(Exception $e){
                return $e->getMessage();
            }
           
            }
        //Delete Query
        public function delete($data = []){
            $keys = implode("," , array_keys($data));
            $values = implode(",", array_values($data));
           
            $statement = $this->db->prepare("DELETE FROM $this->table WHERE $keys = `?` ");
               $statement-> bind_param('s', $values);
                if($statement-> execute()){
                    $result = $statement-> get_result();
                    echo "success";
                }
                else {
                    echo "Failed To Perform Query";
                }
            }
    }
?>
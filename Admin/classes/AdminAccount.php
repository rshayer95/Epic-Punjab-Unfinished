<?php
    class AdminAccount 
    {
        private function username_Exists($username,$db){
          try {
            $account = $db->prepare("SELECT `uname` FROM `admin` WHERE `uname`= ? ");
		    $account->bind_param('s', $username);
		    $account->execute();
		    $row = $account->get_result();

		    if ($row->num_rows > 0) {
			    return true;
            } 
            else 
            {
			    return false;
		    }
          } catch(Exception $e){
            return "something_went_wrong";
            
        }
        }

        	//Login Function
	public function login($username,$password, $db){

		if(empty($username) || empty($password))
        {
            return json_encode([
                'error'=> 'missing_values', 
                'message'=> 'Missing Values',
            ]);
            
        }
		else if(strlen($password) < 6){
            return json_encode([
                'error'=> 'short_password', 
                'message'=> 'Password is very short',
            ]);
            
        }
        else if(!ctype_alnum($password)  && strlen($password) < 6 && strlen($password >= 16)){
            return json_encode([
                'error'=> 'invalid_password', 
                'message'=> 'Invalid Password',
            ]);
            
        }
        else
           {
				try{
                    $statement = $db-> prepare("SELECT * FROM `admin` WHERE `username` = ? ");
				$statement-> bind_param('s',$username);
				$statement-> execute();
				$result = $statement-> get_result();
        
                   if ($result-> num_rows == 1) {
					   while($row = $result-> fetch_array(MYSQLI_ASSOC)){
						   if(password_verify($password, $row['password'])){
						       $_SESSION['admin'] = $username;
                               $_SESSION['token'] = md5(uniqid(rand(), true));
                               
                               $db->close();
                               return json_encode([
                                'success'=> 'success', 
                                'message'=> 'Authenticated Successfully',
                            ]);
                            
					       }
                           else {
                            return json_encode([
                                'error'=> 'wrong_credentials', 
                                'message'=> 'Wrong Credentials',
                                
                            ]);
                            
					       } 
					   }
					   //End of while loop
					   
                   }
                    else
                    {
                        return json_encode([
                            'error'=> 'wrong_credentials', 
                            'message'=> 'Wrong Credentials',
                        ]);
                        
                    }
            }
            catch(Exception $e){
                return json_encode([
                    'error'=> 'something_went_wrong', 
                    'message'=> 'Something Went Wrong',
                ]);
                
                
            }
                }
				//End Of Else Condition
                    
			   
                
       //End Of Login Function        
   }
	

    }
    $admin = new AdminAccount;
?>
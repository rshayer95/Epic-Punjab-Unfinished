<?php


class User{

	private function email_mobile_Exists($email,$mobile, $db){
		$account = $db-> prepare("SELECT `email`,`mobile` FROM `userinfo` WHERE `email`= ? OR `emobile` = ?");
		$account->bind_param('ss',$email,$mobile);
		$account->execute();
		$row = $account->get_result();
		
		if($row-> num_rows > 0){
			return "credentials_exists";
		}
		else{
              return false;
		}
			
	}
	private function mobile_Exists($mobile, $db)
	{
		$account = $db->prepare("SELECT `mobile` FROM `userinfo` WHERE `mobile`= ? ");
		$account->bind_param('s', $mobile);
		$account->execute();
		$row = $account->get_result();

		if ($row->num_rows > 0) {
			return "credentials_exists";
		} else {
			return false;
		}

	}
	private function email_Exists($email, $db)
	{
		$account = $db->prepare("SELECT `email` FROM `userinfo` WHERE `email`= ? ");
		$account->bind_param('s', $email);
		$account->execute();
		$row = $account->get_result();

		if ($row->num_rows > 0) {
			return "credentials_exists";
		} else {
			return false;
		}

	}
	/* Get User Details */
	public function getUserDetails($user, $db)
	{

		$getuser = $db->prepare("SELECT * FROM `userinfo` WHERE `email`= ? OR `name`= ? OR 'mobile' = ?");
		$getuser->bind_param('sss', $user, $user, $user);
		$getuser->execute();
		$statement = $getuser->get_result();
		if ($statement->num_rows == 1) {
			while ($row = $statement->fetch_array(MYSQLI_ASSOC)) {

				return $row;
			}
		} else {
			return false;
		}


	}
		
	//Login Function
	public function login($data = [], $db){

		$email = $data["email"];
		$password = $data["password"];
		if(empty($email) || empty($password))
           {
              return 'missing_values';
           }
           else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
           {
                   return 'invalid_email';
           }
		   else if(strlen($password) < 6){
               return 'short_password';
           }
           else if(!ctype_alnum($password)  && strlen($password) < 6){
               return 'invalid_password';
           }
           else if(!ctype_alnum($password)  && strlen($password) > 6){
               return 'invalid_password';
           }
           else
           {
				$statement = $db-> prepare("SELECT * FROM `userinfo` WHERE `email` = ? ");
				$statement-> bind_param('s',$email);
				$statement-> execute();
				$result = $statement-> get_result();
        
                   if ($result-> num_rows == 1) {
					   while($row = $result-> fetch_array(MYSQLI_ASSOC)){
						   if(password_verify($password, $row["password"])){
						       $_SESSION['user'] = $email;
                               $_SESSION['token'] = md5(uniqid(rand(), true));
                               return json_encode([
								   'success' => 'success',
								   'message' => 'Authenticated Successfully',
								   ]);
					       }
                           else {
							return json_encode([
								'error' => 'invalid',
								'message' => 'Invalid Credentials',
								]);
					       } 
					   }
					   //End of while loop
					   
                   }
                    else
                    {
						return json_encode([
							'error' => 'invalid',
							'message' => 'Invalid Credentials',
							]);
					   
                       
                    }
                }
				//End Of Else Condition
                    
			   
                
       //End Of Login Function        
   }
	
	


	public function signup($email,$password,$confirm_password,$fullname,$mobile,$address,$state,$pin,$country,$gender,$question,$answer,$db){
		//Check If Email or Mobile Already Exists
		//Grab Data And Insert it to the database

		if(!empty($email) && !empty($password) && !empty($confirm_password) && !empty($fullname) && !empty($mobile) && !empty($address) && !empty($state) && !empty($pin) && !empty($country) && !empty($gender) && !empty($question) && !empty($answer) ){
			//Check For Valid Email
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				return "invalid_email";
			}
			//check Password
			else if(strlen($password) < 6){
               return 'short_password';
            }
            else if(!ctype_alnum($password)  && strlen($password) < 6){
               return 'invalid_password';
            }
            else if(!ctype_alnum($password)  && strlen($password) > 6){
               return 'invalid_password';
            }
			//check confirm password
			else if(strlen($confirm_password) < 6){
               return 'short_confirm_password';
            }
            else if(!ctype_alnum($confirm_password)  && strlen($confirm_password) < 6){
               return 'invalid__confirm_password';
            }
            else if(!ctype_alnum($confirm_password)  && strlen($confirm_password) > 6){
               return 'invalid__confirm_password';
            }
			//check Full Name
			else if(!preg_match("/^[a-zA-Z ]+$/",$fullname)){
				return "invalid_name";
			}
			
			//Check Answer
			else if(!preg_match("/^[a-zA-Z ]+$/",$answer)){
				return "invalid_answer";
			}
			//Check Question
			else if(!ctype_alnum($question)){
				return "invalid_question";
			}
			//Check Mobile 
			else if(!preg_match("/^[+]{1}[\d]{4,15}$/",$mobile)){
				return "invalid_mobile";
			}
			//Check Address
			else if(!preg_match("/^[A-Za-z0-9., ]{10,60}$/",$address)){
				return "invalid_address";
			}
			//check state
			else if(!preg_match("/^[a-zA-Z ]+$/",$state)){
				return "invalid_state";
			}
			//check pin
			else if(!preg_match("/^[\d-]{4,10}$/",$pin)){
				return "invalid_pin";
			}
			//Check if Passwords Match
			else if($password != $confirm_password){
				return "mismatch_password";
			}
			else{
				//Now All Fields are validated and this portion is for insertion query
				$password_hash = password_hash($confirm_password,  PASSWORD_DEFAULT);
				 
				
				//check if email or mobile exists already
				if($this-> email_mobile_Exists($email,$mobile,$db) === "credentials_exists"){
					return "email_mobile_already_exits";
				}
				else{
					$date = date("d/M/Y");
					$insert = $db-> prepare("INSERT INTO userinfo(umail,upass,ufullname,uaddress,ustate,upin,ucountry,umobile,ugender,ques,ans,regdate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)") ;
					$insert-> bind_param('ssssssssssss',$email,$password_hash,$fullname,$address,$state,$pin,$country,$mobile,$gender,$question,$answer, $date);
					if($insert-> execute()){
						$result = $insert-> get_result();
						$_SESSION['user'] = $email;
                        $_SESSION['token'] = md5(uniqid(rand(), true));
						return "success";
					}
					else {
						return "failed_to_insert";
					}

				}


			}

			//End Of !EMPTY IF CONDITION
		}
		else{
			return "missing_values";
		}
	}
	//Create Thumbnail Funtion
	private function createThumbnail($filename,$path,$thumbnail_path,$email,$db)
	{
		if (preg_match('/[.](jpg)$/', $filename)) {
			$image = imagecreatefromjpeg($path.$filename);
		} else if (preg_match('/[.](jpeg)$/', $filename)) {
			$image = imagecreatefromjpeg($path.$filename);
		} else if (preg_match('/[.](png)$/', $filename)) {
			$image = imagecreatefrompng($path.$filename);
		}

		$original_width = imagesx($image);
		$original_height = imagesy($image);
		$final_width_of_image = 100;
		$new_width = $final_width_of_image;
		$new_height = floor($original_height * ($final_width_of_image / $original_width));
		$new_image = imagecreatetruecolor($new_width, $new_height);

		imagecopyresized($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

		$new_thumbnail = "../".$thumbnail_path.$filename;
		$new_thumbnail_path = $thumbnail_path . $filename;

		if(imagejpeg($new_image, $new_thumbnail)){
			
			$upload_thumbnail = $db-> prepare("UPDATE `userinfo` SET `profilepic` = ? WHERE `umail` = ? ");
			$upload_thumbnail-> bind_param('ss',$new_thumbnail_path,$email);
			if($upload_thumbnail-> execute()){
				$result = $upload_thumbnail-> get_result();
				echo "success";
			}
			else{
				//Delete Files In Case Failed to Update Profile pic Info in Database
				unlink($path.$filename);
				unlink($new_thumbnail);
				echo "failed_to_upload";
			}
		}
		
		imagedestroy($image);
	}
	//Check If Folder Exists Or Not
	private function folder_exist($folder)
	{
        // Get canonicalized absolute pathname
	    $path = realpath($folder);
        // If it exist, check if it's a directory
		if ($path !== false and is_dir($path)) {
            // Return canonicalized absolute pathname
			return $path;
		}
        // Path/folder does not exist
		return false;
	}


	//Upload Profile Picture
	public function upload_profile_pic($file,$email,$db){
		

		
        //Check If Upload Folder Exists Or Not
		if(!$this-> folder_exist("../uploads/")){
			mkdir("../uploads/", 0700);
			mkdir("../uploads/User/", 0700);
			mkdir("../uploads/User/Original/", 0700);
			mkdir("../uploads/User/Thumbnails/", 0700);
			return "all_upload_folders_created";
			
		}
		else{
			//Check If User Folder Exists
			if (!$this->folder_exist("../uploads/User/")) {
				mkdir("../uploads/User/", 0700);
				mkdir("../uploads/User/Original/", 0700);
				mkdir("../uploads/User/Thumbnails/", 0700);
				return "User_folder_created";
			} 
		}
		$base_directory = "uploads/User/Original/";
		$target_directory = "../uploads/User/Original/";
		$thumbnail_directory = "uploads/User/Thumbnails/"; 
		$target_file = $target_directory . basename($_FILES["file"]["name"]);
		$uploadOK = 1;
		$imageType = pathinfo($target_file, PATHINFO_EXTENSION);
		$check = getimagesize($_FILES["file"]["tmp_name"]);

		if ($check !== false) {
			//echo $check["mime"];
		    $uploadOK = 1;
		} 
		else {
		    $uploadOK = 0;
			return "file_not_an_image";
		}
		if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" ) {
			$uploadOK = 0;
			return "only_jpeg_png_jpg_allowed";
		}
		if ($imageType == "mp4") {
			$uploadOK = 0;
			return "only_images_allowed";
		}
		if (file_exists($target_file)) {
			  $_FILES["file"]["name"] =  md5(uniqid(rand() , true)).".".$imageType; 
		}
		if ($_FILES["file"]["size"] > 2000000) {
			$uploadOK = 0;
			return "file_is_very_large";
		}

		if ($uploadOK == 0) {
			return "something_went_wrong";
		} 
		else {
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_directory. $_FILES["file"]["name"])) {
		   //echo "The File".basename($_FILES["fileToUpload"]["name"])."   has been uploaded.";
		       
					$uploaded_pic = $base_directory . basename($_FILES["file"]["name"]);
					$picresult = $db->prepare("SELECT * FROM `userinfo` WHERE `umail` = ? ");
					$picresult->bind_param('s', $email);
					$picresult->execute();
					$row = $picresult->get_result();
					if ($row->num_rows > 0) {
						$imageage_exists = $row->fetch_array(MYSQLI_ASSOC);
						if (!empty($imageage_exists["originalprofilepic"])) {
							$profilepic_path = $imageage_exists["originalprofilepic"];
							unlink("../".$profilepic_path);
							echo "Previous Profile Pic Deleted";
						}
						if (!empty($imageage_exists["profilepic"])) {
							$oldthumbnail_path = $imageage_exists["profilepic"];
							unlink("../".$oldthumbnail_path);
							echo "Previous Profile Thumbnail Deleted";
						}
					} 
					$update_profile_pic = $db->prepare("UPDATE `userinfo` SET `originalprofilepic` = ? WHERE `umail` = ? ");
					$update_profile_pic->bind_param('ss', $uploaded_pic, $email);
					if ($update_profile_pic->execute()) {
						$result = $update_profile_pic->get_result();
						
						$this-> createThumbnail($_FILES["file"]["name"], $target_directory, $thumbnail_directory,$email, $db);
					} else {
						unlink($uploaded_pic);
						return "failed_to_upload";
					}
					
			   
			  
			}
			else {
				return "failed_to_upload";
			}

		}
		 
	}
    //Update Name
    public function update_name($name,$email,$db){
		if(empty($name)){
			return "missing_values";
		}
		else if(!preg_match("/^[a-zA-Z ]{3,255}$/",$name))
		{
			return "invalid_name";
		}
		else
		{
			try{
				//Main Update Query
				$update_name = $db-> prepare("UPDATE userinfo SET ufullname = ? WHERE umail= ?");
				$update_name-> bind_param('ss',$name,$email);
				if($update_name-> execute()){
					$result = $update_name-> get_result();
					return 'success';
				}
				else{
					return 'failed_to_update';
				}

			}
			catch(Exception $e){
				die("There is some Error Performing the operation");
			}
			finally{
				$db-> close();
			}
		}
	}

	//Update Mobile
	public function update_mobile($mobile, $email, $db)
	{
		if (empty($mobile)) {
			return "missing_values";
		} else if (!preg_match("/^[+]{1}[\d]{4,15}$/", $mobile)) {
			return "invalid_mobile";
		} else {
			if($this-> mobile_Exists($mobile, $db) === "credentials_exists"){
				return "credentials_existed";
			}
			else{
				try {
				    //Main Update Query
					$update_mobile = $db->prepare("UPDATE userinfo SET umobile = ? WHERE umail= ?");
					$update_mobile->bind_param('ss', $mobile, $email);
					if ($update_mobile->execute()) {
						$result = $update_mobile->get_result();
						return 'success';
					} else {
						return 'failed_to_update';
					}

				} catch (Exception $e) {
					die("There is some Error Performing the operation");
				}
				finally {
					$db->close();
				}
			}
		}
	}
    //Change Password
	public function changePassword($user, $db){
		//make sure to grab all form data
		//check if the old password is valid
		//new password and confirm new passwords are matched

		if(empty($user['password']) OR empty($user['cpassword']) OR empty($user['npassword'])){
			return 'missing_fields';
		}
		else if( $user['npassword'] !== $user['cpassword'] ){
			return 'mismatch_password';
		}
		else if( !$this->oldPasswordMatched($user['password'], $db) ){
			return 'incorrect_old';
		}

		$sql = "UPDATE `users` SET `password`=? WHERE `id`=?";
		$statement = $db->prepare($sql);

		if( is_object($statement) ){

			$hash = password_hash($user['npassword'], PASSWORD_DEFAULT);

			$statement->bindParam(1, $hash, PDO::PARAM_STR);
			$statement->bindParam(2, $_SESSION['logged_in']['id'], PDO::PARAM_STR);
			$statement->execute();

			if( $statement->rowCount() == 1 ){
				return 'success';
			}
			return 'error';
		}
	}


	private function oldPasswordMatched($password, $db){
		$sql = "SELECT * FROM `users` WHERE `id`=?";
		$statement = $db->prepare($sql);
		
		if( is_object($statement) ){
			
			$statement->bindParam(1, $_SESSION['logged_in']['id'], PDO::PARAM_INT);
			$statement->execute();

			if( $row = $statement->fetch( PDO::FETCH_OBJ ) ){

				if( password_verify( $password, $row->password ) ){
					
		
					return true;
				}

			}

		}
		return false;

	}


	

	public function mailRestPasswordLink($user, $db){
		/*
		1 - Check the email exists in database
		2 - show the error if email field is missing
		*/

		if(empty($user['email'])){
			return 'missing_fields';
		}
		else if( !$this->emailExists($user, $db) ){
			return 'not_found';
		}

		$sql = "SELECT * FROM `users` WHERE `email`=?";
		$statement = $db->prepare($sql);
		if(is_object( $statement )){
			$statement->bindParam(1, $user['email'], PDO::PARAM_STR);
			$statement->execute();

			if( $row = $statement->fetch(PDO::FETCH_OBJ) ){

				 $status = $this->sendMail($row);

				 if($status){
				 	return 'success';
				 }
				 return 'error';
			}
			
		}

	}


	
	public function updateResetPassword($user, $db){
		/*
		1 - All form data recieved done!
		2 - User id is valid done!
		3 - Code is valid
		4 - New password and confirm passwords are matched done!
		*/

		if(empty($user['id']) OR empty($user['code']) OR empty($user['cpassword']) OR empty($user['npassword'])){
			return 'missing_fields';
		}
		else if($user['cpassword'] !== $user['npassword']){
			return 'mismatch_password';
		}
		else if( !$this->idExists($user, $db) ){
			return 'incorrect_id';
		}
		else if( !$this->codeExists($user, $db) ){
			/*
            1 - regenerate code
            2 - get user info from database with updated code
            2 - use user info to send an email with updated code
			*/

            $this->regenerateCode($user, $db);

            $row = $this->getUserDetails($user, $db);

            $this->sendMail( $row );

            return 'incorrect_code';
			
		}


		$sql = "UPDATE `users` SET `password`=?, `verification_code`=? WHERE `id`=?";
		$statement = $db->prepare($sql);
	

		if(is_object( $statement )){
			
			$hash = password_hash($user['npassword'], PASSWORD_DEFAULT);
			$code = generateCode();

			$statement->bindParam(1, $hash, PDO::PARAM_STR);
			$statement->bindParam(2, $code, PDO::PARAM_STR);
			$statement->bindParam(3, $user['id'], PDO::PARAM_INT);
			$statement->execute();

			if( $statement->rowCount() ){
				return 'success';
			}
			return 'error';
		}

	}
    


	private function regenerateCode($user, $db){
		$sql = "UPDATE `users` SET `verification_code`=? WHERE `id`=?";
		$statement = $db->prepare($sql);
	

		if(is_object( $statement )){

			$code = generateCode();

			$statement->bindParam(1, $code, PDO::PARAM_STR);
			$statement->bindParam(2, $user['id'], PDO::PARAM_INT);
			$statement->execute();

			if( $statement->rowCount() ){
				

				return true;
			}
			return false;
		}
	}





	private function codeExists($user, $db){
		$sql = "SELECT * FROM `users` WHERE `id`=?";
		$statement = $db->prepare($sql);


		if(is_object( $statement )){
			$statement->bindParam(1, $user['id'], PDO::PARAM_INT);
			$statement->execute();

			if( $row = $statement->fetch(PDO::FETCH_OBJ) ){
				
				if($user['code'] === $row->verification_code ){
					

					return true;
				}
			}

			return false;
		}
	}


	private function idExists($user, $db){
		$sql = "SELECT * FROM `users` WHERE `id`=?";
		$statement = $db->prepare($sql);

		if(is_object( $statement )){
			$statement->bindParam(1, $user['id'], PDO::PARAM_INT);
			$statement->execute();

			if( $statement->fetch(PDO::FETCH_OBJ) ){
				return true;
			}
			return false;
		}
	}



	private function sendMail($user){

		// Create the Transport
		$transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
		  ->setUsername('e8786d3f2c66bf')
		  ->setPassword('b7c23b266a1939')
		;

		// Create the Mailer using your created Transport
		$mailer = new Swift_Mailer($transport);

		// Create a message
		$message = (new Swift_Message('Password Recovery Request!'))
		  ->setFrom(['noreply@oursystem.com' => 'Our Login System'])
		  ->setTo([$user->email])
		  ->setBody(passworRecoverEmailMessageBody($user), 'text/html')
		  ;

		// Send the message
		$result = $mailer->send($message);

		if($result){
			return true;
		}
		return false;

	}

}

$user = new User;
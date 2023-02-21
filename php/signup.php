<?php
	session_start();
	include_once "config.php";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($name) && !empty($email) && !empty($password)){
		//check users email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){  //if email is valid
		//email already exist in database
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){ //if email already exist
                echo "$email - This email already exist!";
            }else{
				//checks users upload file or not
                if(isset($_FILES['image'])){ //if file is uploaded
                    $img_name = $_FILES['image']['name']; // gets the users uploaded file name
                    $img_type = $_FILES['image']['type']; // gets the users uploaded file type
                    $tmp_name = $_FILES['image']['tmp_name']; //temporary name so that we can save more files in our folder
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode); //extension of an user uploaded img file 
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"photos/".$new_img_name)){ //if users upload img move to folder succesfully
                                $random_id = rand(time(), 100000000); //Creates random id for users
                                $status = "Active now"; //when a user signed up the status will be active
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, name, email, password, img, status)
                                VALUES ({$random_id}, '{$name}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo  "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>

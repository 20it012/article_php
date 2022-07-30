<?php
    session_start();

    include_once "config.php";
    //print_r($_POST); die;
    $id = $_POST['id'];
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //let's check user email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email is valid
            // let's check email is already exist in database or not
            $sql = mysqli_query($conn, "SELECT email FROM login WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){ //if email is already exist
                echo "$email - This email is already exist!";
            }else{
                //let's check user upload file or not
                if(isset($_FILES['image'])){
                    // if file is uploaded
                    $img_name = $_FILES['image']['name']; //getting user uploaded image name
                    $tmp_name = $_FILES['image']['tmp_name']; //this temporery name is used to save file to save/move file in our folder

                    //let's explode image and get tha last extension like jpg,png.
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); //here we get the extension of an user uploaded img file

                    $extensions = ['png', 'jpeg', 'jpg']; //this are some valid img ext and we have store this in array
                    if(in_array($img_ext, $extensions) === true){  // if users uploaded img ext is matched with an array extensions
                        //let's move the user uploaded img to our particular folder          
                        move_uploaded_file($tmp_name, "images/".$img_name);
                        $hobbies = implode(",", $_POST['hobby']);
                        $sql2 = mysqli_query($conn, "INSERT INTO login(id, fname, lname, email, password, gender, hobby, img )
                                                    VALUES ('{$id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$gender}', '{$hobbies}', '{$img_name}')");
                        if($sql2 > 0){ // if this datavinserted
                                        $sql3 = mysqli_query($conn, "SELECT * FROM login WHERE email = '{$email}'");
                                        if(mysqli_num_rows($sql3) > 0){
                                            $row = mysqli_fetch_assoc($sql3);
                                            $_SESSION['id'] = $row['id']; //using this session we used user unique_id in other php file
                                            echo "success";
                                        }
                                    }else{
                                        echo "something went wrong!";
                                    }
                    }else{
                        echo "please select an image file - jpg, jpeg, png";
                    }

                }else{
                    echo "please select an image file";
                }
            }
        }else{
            echo "$email - Enter valid email!";
        }
    }else {
            echo "All input filled are required!";
        }   
?>
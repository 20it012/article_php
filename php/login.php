<?php
    session_start();
    include_once "config.php"; 
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($password)){
        //check entered email & password matched to database any table row email and password
        $sql = mysqli_query($conn, "SELECT * FROM login WHERE email = '{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){  //if user credentials matched
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['id'] = $row['id']; //using this session we used user unique_id in other php file
            echo "success";
            // updating user status to active now if user login successfully
            // $sql2 = mysqli_query($conn, "UPDATE login SET id = '{$id}' WHERE id = {$row['id']}");
            // if($sql2){
            //     $_SESSION['id'] = $row['id']; //using this session we used user unique_id in other php file
            //     echo "success";
            // }
        }else{
            echo "Email or Password is incorrect";
        }

    }else{
        echo "All input field are required!";
    }
?>
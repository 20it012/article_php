<?php
    $conn = mysqli_connect("localhost", "root", "", "demo1");
    if (!$conn) {
        # code...
        echo "Database Connected".mysqli_connect_error();
    }//else{
    //     echo "Error";
    // }
?>
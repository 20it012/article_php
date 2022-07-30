<?php

$id = $_GET['id'];

include("php/config.php");

$select = "DELETE FROM article WHERE id = $id";
$result = mysqli_query($conn,$select);

header("Location: http://localhost/demo2/home.php");
?>
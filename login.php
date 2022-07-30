<?php 
    session_start();
    if(isset($_SESSION['id'])){
        header("location: home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Here</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <style>
    .count{
            display: none;
        }
    </style>
</head>
<body>
    <!--header section start -->
    <div class="wrapper">
        <section class="form login">
            <header> Login Page </header>
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                        <div class="count" type="hidden">
                            <label>id</label>
                            <input type="hidden" name="id">
                        </div>
                        <div class="field input">
                            <label>Email Address</label>
                            <input type="text" name="email" placeholder="Enter your email">
                        </div>
                        <div class="field input">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter your Password">
                            <i class="fas fa-eye"></i>
                        </div>
                        
                        <div class="field button">
                            <input type="submit" name="save"  value="Continue">
                        </div>

            </form>
            <div class="link">Not yet signed up? <a href="registration.php">signup  now</a></div>
        </section>
    </div>
    <!--header section end -->

<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/login.js"></script>

</body>
</html>
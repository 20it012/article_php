<?php 
    session_start();
    if(isset($_SESSION['id'])){ //if user is logged in
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register Here</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <style>
        form {
            counter-reset: section;
            }

        .count:before {
            counter-increment: section;
            content: counter(section);
            }
        .count{
            display: none;
        }
    </style>
</head>
<body>
    <!--header section start -->
    <div class="wrapper">
        <section class="form signup">
            <header> Register Here</header>
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                    <div class="name-details">
                        <div class="count" type="hidden">
                            <label>id</label>
                            <input type="hidden" name="id">
                        </div>
                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" name="fname" placeholder="First Name" required>
                        </div>
                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" name="lname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="field input">
                            <label>Email Address</label>
                            <input type="text" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="field input">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter your password" required>
                            <i class="fas fa-eye"></i>
                        </div>

                        <div class="field radio">
                        <label>Gender  </label>

                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                value="f" checked />
                            <label class="form-check-label" for="femaleGender">Female</label>
                            </div>

                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                value="m" />
                            <label class="form-check-label" for="maleGender">Male</label>
                            </div>
                        </div>

                        <div class="field checkbox">
                         <label>Hobby  </label>

                            <div class="form-check">
                                <input class="form-check-input" name="hobby[]" type="checkbox" id="gridCheck1" value="running">
                                <label class="form-check-labe1" for="gridCheck1">
                                 running
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="hobby[]" type="checkbox" id="gridCheck2" value="cricket">
                                <label class="form-check-labe2" for="gridCheck2">
                                 cricket
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" name="hobby[]" type="checkbox" id="gridCheck3" value="movie">
                                <label class="form-check-labe3" for="gridCheck3">
                                 movie
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="hobby[]" type="checkbox" id="gridCheck4" value="Traveling">
                                <label class="form-check-labe4" for="gridCheck4">
                                 Traveling
                                </label>
                            </div>
                        </div>

                        <div class="field image">
                            <label>Select Profile Image</label>
                            <input type="file" name="image" required>
                        </div>
                        <div class="field button">
                            <input type="submit" name="save" value="Continue">
                        </div>

            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>
    
    <!--header section end -->

<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/signup.js"></script>
</body>
</html>
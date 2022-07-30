<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0-beta1/css/bootstrap.min.css" integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css" integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        table {
            counter-reset: section;
            }

        .count:before {
            counter-increment: section;
            content: counter(section);
            }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            var html = '<tr><td class="count"></td><td><input class="form-control" type="text" name="title" required=""></td><td><input class="form-control" type="text" name="desc" required=""></td><td><input class="form-control" type="file" name="img" required=""></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value=" - "></td></tr>';       
            var max = 4;
            var x = 1;

            $("#add").click(function(){
                if (x <= max) {
                    $("#table_field").append(html);
                    x++;
                }
            });
            $("#table_field").on('click','#remove',function(){
                $(this).closest('tr').remove();
                x--;
            });       
        });

        while($result = mysqli_fetch_array($data)){}
    </script>
</head>
<body>
    
    <div class="container">
            <?php
            include("php/config.php");
               if(isset($_GET['edit'])){
                $id = $_GET['edit'];
                $update = true;      
                $result = mysqli_query($conn, "SELECT * FROM article WHERE id = $id");

                if(mysqli_num_rows($result) == 1) {
                    $ab = mysqli_fetch_array($result);
                    $id = $ab['id'];
                    $title = $ab['title'];
                    $disc = $ab['disc'];
                    $img = $ab['img'];
                }
               }
            ?>
        <form action="" method="POST" class="insert-form" id="insert_form" enctype="multipart/form-data">
        <button ><a href="php/logout.php?logout_id=<?php echo $_SESSION['id'] ?>" class="logout">Logout</a></button>
            <hr>
            <h1 class="text-center">Artical</h1>
            <hr>
            
            <div class="input-field">
                <table class="table table-bordered" id="table_field">
                    <tr>
                        <th>id</th>
                        <th style="display:none;">u_id</th>
                        <th>title</th>
                        <th>disc</th>
                        <th>img</th>
                        <th>add /remove</th>
                    </tr>
                    <?php
                        $conn = mysqli_connect("localhost","root","","demo1");
                        
                        if(isset($_POST['save']))
                        {
                           $id = $_SESSION['id'];
                           $u_id = $_POST['u_id'];
                           $title = $_POST['title'];
                           $disc = $_POST['disc'];
                           $img = $_FILES['img']['name'];
                           $img_tmp=$_FILES['img']['tmp_name'];
                           $folder = "php/images/article/".$img;
                           
                           echo "<img src='$folder' height='100' width='100'/>";
                           move_uploaded_file($img_tmp,"php/images/article/".$img);
                                $save = "INSERT INTO article(u_id,title,disc,img) VALUES ('$u_id','$title','$disc','$img')";
                                $query = mysqli_query($conn, $save);
                                if($query){         
                                    echo "<script>alert('You have been uploaded Sucessfully')</script>";
                                    echo "<script>window.open('home.php','_self')</script>";                             
                                }else{                             
                                    echo "<script>alert('You have not been uploaded Sucessfully')</script>";
                                    echo "<script>window.open('home.php','_self')</script>";
                                }
                        }
                    ?>
                    <tr>
                        <td class="count" name="id" type="hidden" value="<?php if(isset($_GET['edit'])){ echo $id;} ?>"></td>
                        <td style="display:none;"><input class="form-control" type="text" name="u_id" value="<?php echo $_SESSION['id'] ?>" required=""></td>
                        <td><input class="form-control" type="text" name="title" value="<?php if(isset($_GET['edit'])){ echo $title;} ?>" required=""></td>
                        <td><input class="form-control" type="text" name="disc" value="<?php if(isset($_GET['edit'])){ echo $disc;} ?>" required=""></td>
                        <td><input class="form-control" type="file" name="img" value="" required="">
                        <?php if(isset($_GET['edit'])){ ?>
                        <img src="php/images/article/<?php if(isset($_GET['edit'])){ echo $img;} ?>" height="100px" width="100px">

                        <?php
                        }
                        ?>
                    </td>
                        <td><input class="btn btn-primary" type="button" name="add" id="add" value=" + "></td>
                    </tr>
                </table>  
                <center>
                    <?php
                    $conn = mysqli_connect("localhost","root","","demo1");
                    if(isset($_POST['update']))
                        {   
                           $u_id = $_POST['u_id'];
                           $title = $_POST['title'];
                           $disc = $_POST['disc'];
                           $img = $_FILES['img']['name'];
                           $img_tmp=$_FILES['img']['tmp_name'];
                           $folder = "php/images/article/".$img;
                           
                           echo "<img src='$folder' height='100' width='100'/>";
                           move_uploaded_file($img_tmp,"php/images/article/".$img);
                                $save = "UPDATE article SET u_id='$u_id', title='$title', disc='$disc', img='$img' WHERE id=$id";
                                $query = mysqli_query($conn, $save);
                                if($query){            
                                    echo "<script>alert('Your record updated Sucessfully')</script>";
                                    echo "<script>window.open('home.php','_self')</script>";                                    
                                }else{                                
                                    echo "<script>alert('Your record not updated Sucessfully')</script>";
                                    echo "<script>window.open('home.php','_self')</script>";
                                }
                        }
                    ?>
                    <?php if (isset($update) && $update == true): ?>
                        <input class="btn btn-primary" type="submit" name="update" value="update" style="background: #556B2F;" >
                    <?php else: ?>
                        <input type="submit" class="btn btn-success" name="save" id="save" value="save">
                    <?php endif ?>
                </center>
            </div>
        </form>
        
        <?php $result = mysqli_query($conn, "SELECT * FROM article"); ?>
        
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>title</th>
                <th>disc</th>
                <th>img</th>
                <th>add /remove</th>
            </tr>
            <?php
               $select = "SELECT * FROM article WHERE u_id =  ".$_SESSION['id']; 
                $result = mysqli_query($conn,$select);
                while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
            <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['disc']; ?></td>
                <td><img src="php/images/article/<?php echo $row['img']; ?>" height="100" width="100">
                <td>
                    <a href="home.php?edit=<?php echo $row['id']; ?>"
                        class="btn btn-info">Edit</a>
                    <a href="delete-inline.php?id=<?php echo $row['id']; ?>"
                        class="btn btn-danger">Delete</a>
                </td>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>

</body>
</html>
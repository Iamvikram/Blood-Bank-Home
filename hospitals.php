<?php
include("../connection.php");
mysqli_select_db($conn,'bloodbank');
extract($_POST);
if(isset($submit)){
    $p = md5($pass);
    $result = mysqli_query($conn,"select password,Hospital_name from hospital_side_registered_users where password='$p' and Hospital_name='$h_name'");
    $r = mysqli_num_rows($result);
    if($r){
        session_start();
        $_SESSION['user_h_name']=$h_name;
        $_SESSION['user_name']=$name;
        header('Location: hospital_home.php');
    }
    else{
        $message = '<font  color="red"> User not found. Please enter correct details.</font>';
    }


}

?>






<!DOCTYPE html>
<html>
<head>
    <title> Hospital Home page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap css file-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Bootstrap javascript file -->
    <script src="../js/bootstrap.min.js"></script>


</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <li> <a href="../home.php"> Home </a> </li>
            <li> <a href="hospital_regist.php"> Hospital Registration </a> </li>
            <li> <a href="hospitals.php"> Hospital Log In </a> </li>
            <li> <a href="../Request_users/Receiver.php"> Receiver Registration </a> </li>
            <li> <a href="../available_blood_samples.php"> Available Blood Samples </a> </li>

        </ul>
    </div>
</nav>

<div class="container">
    <div class="jumbotron" style="margin-top: 100px;"x>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3><font color="blue">Welcome you are at hospital side page if your are already registered then login
                        else do registration.</font></h3>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h3><?php echo @$message; ?></h3>
            </div>
            <!--start login form-->
            <form method="post">
                <div class="col-md-4 col-md-offset-3">
                   <div class="form-group">
                       <label for="h_name">Hospital Name</label>
                       <input type="text" name="h_name" class="form-control" id="h_name" >
                   </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" class="form-control" id="pass" >
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
            <div class="col-md-5 col-md-offset-3">
                <h4>Are you New User ? <a href="hospital_regist.php"> Create an account.</a> </h4>
            </div>
        </div>
    </div>
</div>

</body>
</html>
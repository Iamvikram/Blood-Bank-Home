<?php
include("../connection.php");
mysqli_select_db($conn,'bloodbank');
extract($_POST);
if(isset($submit)){
    $p1 = md5($pass);
    $p2 = md5($c_pass);
    if($p1==$p2){
        mysqli_query($conn,"insert into hospital_side_registered_users VALUES ('','$name','$email','$p1','$h_name')");
       $message='<font color="blue">Registration Successful !!!</font>';
    }
    else{
        $message = '<font color="red">Password does not match!!!</font>';
    }

}

?>






<!DOCTYPE html>
<html>
<head>
    <title> Hospital Registration Page </title>
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
    <div class="jumbotron" style="margin: 100px;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3><font color="blue">Hospital User Registration.</font></h3>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h3><?php echo @$message;?></h3>
            </div>
            <!--start Registration form-->
            <form method="post">
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" name="name" class="form-control" id="name" required >
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required >
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <label for="h_name">Hospital Name</label>
                        <input type="text" name="h_name" class="form-control" id="h_name" required >
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" class="form-control" id="pass" required >
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <label for="c_pass">Conform Password</label>
                        <input type="password" name="c_pass" class="form-control" id="c_pass" required>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
            <div class="col-md-6 col-md-offset-3">
                <h4>If you are already registered then <a href="hospitals.php"> Sign in.</a> </h4>
            </div>
        </div>
    </div>
</div>

</body>
</html>
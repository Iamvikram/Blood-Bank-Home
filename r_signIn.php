<?php
include "../connection.php";
mysqli_select_db($conn,'bloodbank');
$message = "";
extract($_POST);
session_start();
if(isset($submit)){
    $p=md5($pass);
    $sql = mysqli_query($conn,"select email,password from blood_reseivers_information where email='$email' and password='$p'");
    $r = mysqli_num_rows($sql);
    if($r){
        $_SESSION['r_email']=$email;
        $_SESSION['r_login']=true;
        header('Location: requester_home.php');

    }
    else{
        $message='<font color="red"> Please Enter correct details.</font>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Blood Receiver Log In Page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap css file-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Bootstrap javascript file -->
    <script src="../js/bootstrap.min.js"></script>


</head>

<body>

<!--nav start -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <li> <a href="../home.php"> Blood Bank Home </a> </li>
        </ul>
        <ul class="nav navbar-nav navbar-left">
            <li> <a href="Receiver.php"> Receiver Registration </a> </li>
        </ul>
    </div>
</nav>
<!--nav end -->
<!---blood request registration form -->
<div class="container">
    <div class="jumbotron" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <h3 color="blue"> <?php echo @$message ;?> </h3>
            </div>
            <div class="col-md-5 col-md-offset-3">
                <h3>If You have not done registration yet,   <a href="Receiver.php"> Register here!!.</a> </h3>
            </div>
            <div class="col-md-5 col-md-offset-3">
                <h3>Blood Request  Log In form!! </h3>
            </div>
        </div>
        <!--start form -->
        <form  method="post">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-3">
                        <label for="Email">Email:</label>
                        <input type="email" id="email" name="email" title="Enter valid email address." class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" class="form-control" id="c_pass" title="Type your password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-3" style="margin-top: 20px"  >
                        <button type="submit"  name="submit" class="btn btn-success"  class="form-control">Sign In</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
</body>
</html>
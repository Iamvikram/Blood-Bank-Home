<?php
include "../connection.php";
mysqli_select_db($conn,'bloodbank');
$message = "";
extract($_POST);
$sql = mysqli_query($conn,"select email from hospital_side_registered_users where  email='$email'");
$r = mysqli_num_rows($sql);
if(isset($submit) && !$r){
    $p1=md5($pass);
    $p2=md5($c_pass);
    if($p1==$p2){
        $sql = mysqli_query($conn,"insert into blood_reseivers_information VALUES ('','$name','$bGroup','$email','$p1')");
        $message='<font color="green">Your Registration Successful!!. Now you can make blood request <a href="r_signIn.php">Click here!!</a> </font>';
    }
    else{
        $message='<font color="red"> Password does not match!!. </font>';

    }
}
else if(isset($submit) && $r){
    $message='<font color="red">Sorry you are not allowed for blood request because you are logged in as hospital side. </font>';

}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Blood Receiver Registration Page </title>
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
            <li> <a href="../home.php"> Home </a> </li>
            <li> <a href="../hospital/hospital_regist.php"> Hospital Registration </a> </li>
            <li> <a href="../hospital/hospitals.php"> Hospital Log In </a> </li>
            <li> <a href="Receiver.php"> Receiver Registration </a> </li>
            <li> <a href="../available_blood_samples.php"> Available Blood Samples </a> </li>

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
                <h3>Blood Receiver  Registration form!! </h3>
            </div>
        </div>
        <!--start form -->
        <form  method="post">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-3">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" title="Type here Your name." class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-3">
                        <label for="mobile">Mobile No:</label>
                        <input type="number" id="mobile" name="mobile" title="Enter valid mobile number"  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-3" style="margin-top: 20px">
                        <label for="b_group"> Select Required Blood Group :</label>
                        <select name="bGroup"><option value="">Select</option>
                            <?php
                            $bArray = array("A+","A-","B+","B-","O+","O-","AB+","AB-");
                            for($i=0;$i<count($bArray);$i++){?>
                                <option value="<?php echo $bArray[$i];?>"><?php echo $bArray[$i];?></option>
                            <?php } ?>
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-3">
                        <label for="Email">Email:</label>
                        <input type="email" id="email" name="email" title="Enter valid email address." class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" class="form-control" id="pass" title="Type your password here" required >
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="form-group">
                        <label for="c_pass">Conform Password</label>
                        <input type="password" name="c_pass" class="form-control" id="c_pass" title="Conform your password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-3" style="margin-top: 20px"  >
                        <button type="submit"  name="submit" class="btn btn-success"  class="form-control">Register</button>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3" style="margin-top: 20px"  >
                    <h4>If you already done registration then for log In  <a href="r_signIn.php">Click here!!</a> </h4>
                </div>
            </div>
        </form>
    </div>

</div>
</body>
</html>
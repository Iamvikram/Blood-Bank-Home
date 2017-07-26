<?php
session_start();
include "../connection.php";
mysqli_select_db($conn,'bloodbank');
$hos=$_SESSION['user_h_name'];
$message = "";
extract($_POST);
if(isset($submit) && $bGroup!='') {
    $sql = mysqli_query($conn, "insert into hospital_blood_samples_information VALUES ('','$hos','$bGroup','Available')");
    $message='<font color="green">Blood sample successfully added. </font>';
}
else{
    $message='<font color="red">Please select blood group that you want to add. </font>';
}


?>




<!DOCTYPE html>
<html>
<head>
    <title> Hospital Home </title>
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
    <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li> <a href="hospital_home.php"> Welcome <?php echo $hos; ?>  </a> </li>
            <li> <a href="blood_info.php">Available Blood Samples with Information</a> </li>
            <li> <a href="view_request.php">View Request</a> </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li> <a href="logout.php">Log Out</a> </li>
        </ul>
    </div>
</nav>
<!--nav end -->
<div class="container">
    <div class="jumbotron" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3><?php echo @$message; ?></h3>
            </div>
            <div class="col-md-6">
                <h3><font color="blue">Add new Blood samples</font></h3>
            </div>
                <form method="post">
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-3" style="margin-top: 20px">
                            <label for="bgroup">Select Blood Group which you want add:</label>
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
                        <div class="col-md-4 col-md-offset-3" style="margin-top: 20px"  >
                            <button type="submit"  name="submit" class="btn btn-primary"  class="form-control">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>
<?php
session_start();
include "../connection.php";
mysqli_select_db($conn,'bloodbank');
$hos=$_SESSION['user_h_name'];
$message = "";
$sql = mysqli_query($conn,"select * from hospital_blood_samples_information where hospital_name='$hos'");
$r = mysqli_num_rows($sql);
if(!$r){
    $message = '<font color="red">No blood sample information available. </font>';
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
            <li> <a href="hospital_home.php"> Welcome <?php  echo $hos; ?>  </a> </li>
            <li> <a href="blood_info.php">Available Blood Samples with Information</a> </li>
            <li> <a href="view_request.php">View Request</a> </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li> <a href="logout.php">Log Out</a> </li>
        </ul>
    </div>
</nav>
<!--nav end -->
<!--add blood info table -->
<div class="container" style="margin-top: 100px;">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3><?php echo @$message; ?></h3>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Blood Group Type</th>
                <th>Status</th>
                <th>Information about blood group type</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($res = mysqli_fetch_assoc($sql)){
                echo '<tr>';
                echo '<td>'.$res['blood_samples'].'</td>';
                echo '<td>'.$res['Status'].'</td>';
                if($res['blood_samples']=="A+"){
                    $info="A+ Can Be Given To A+ and AB+ An A+ donor is only compatible to donate blood to blood groups A+ and AB+ because of the presence of antigens A and Rh in the donor's blood. ";
                }
                else if($res['blood_samples']=="A-"){
                    $info="A- blood can be donated to- A+ A- AB+ AB- and Receive Blood From- A- O- ";
                }
                else if($res['blood_samples']=="O+"){
                    $info="O+ blood can be donated to- O+ A+ B+ AB+ and Receive Blood From- O+ O- ";

                }
                else if($res['blood_samples']=="B+"){
                    $info="B+ blood can be donated to- B+ AB+ and Receive Blood From- B+ B- O+ O- ";

                }
                else if($res['blood_samples']=="AB+"){
                    $info="AB+ blood can be donated to- AB+ and Receive Blood From- Everyone ";

                }
                else if($res['blood_samples']=="O-"){
                    $info="O- blood can be donated to- Everyone and Receive Blood From-  O- ";

                }
                else if($res['blood_samples']=="B-"){
                    $info="B- blood can be donated to- B+ B- AB+ AB- and Receive Blood From- B- O- ";

                }
                else{
                    $info="AB- blood can be donated to- AB+ AB- and Receive Blood From- AB- A- B- O- ";

                }

                echo '<td>'.$info.'</td>';
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>

</body>
</html>

<?php
include("../connection.php");
mysqli_select_db($conn,'bloodbank');
session_start();
$h_name = $_SESSION['user_h_name'];
$sql = mysqli_query($conn,"select blood_sample,Requester_email from blood_sample_request where hospital_name='$h_name'");
$r = mysqli_num_rows($sql);
$message = '';
if(!$r){
    $message = '<font color="red"> Currently no blood request available. </font>';
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
            <li> <a href="hospital_home.php"> Welcome <?php echo $h_name; ?>  </a> </li>
            <li> <a href="blood_info.php">Blood Info</a> </li>
            <li> <a href="view_request.php">View Request</a> </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li> <a href="logout.php">Log Out</a> </li>
        </ul>
    </div>
</nav>
<!--nav end -->
<!--request table -->
<div class="container">
    <div class="jumbotron" style="margin-top: 100px;">
        <div class="col-md-6 col-md-offset-3">
            <h3><?php echo @$message;?></h3>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th >Requester Email</th>
                <th>Blood Group sample</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($res = mysqli_fetch_assoc($sql)){
                echo '<tr>';
                echo '<td>'.$res['Requester_email'].'</td>';
                echo '<td>'.$res['blood_sample'].'</td>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
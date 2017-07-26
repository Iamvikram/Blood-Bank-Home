<?php
include("../connection.php");
mysqli_select_db($conn,'bloodbank');
session_start();
$email=$_SESSION['r_email'];
$sql = mysqli_query($conn,"select hospital_name,blood_samples from hospital_blood_samples_information ");
$r=mysqli_num_rows($sql);
$message='';
if(!$r){
    $message='<font>Currently no blood samples in any registered hospitals.</font>';
}



?>


<!DOCTYPE html>
<html>
<head>
    <title> Blood Bank Home </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap css file-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Bootstrap javascript file -->
    <script src="../js/bootstrap.min.js"></script>




</head>

<body style="padding-top:70px; margin:100px">

<!--nav start -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <ul class="nav navbar-nav navbar-left">
                        <li> <a href="requester_home.php"> Welcome <?php echo $email ; ?> </a> </li>
                        <li> <a href="available_blood_samples.php"> Available Blood Samples </a> </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a href="r_logout.php"> Log Out </a> </li>
                    </ul>
                </div>
            </nav>


        </ul>
    </div>
</nav>
<!--nav end -->
<div class="container">
    <div class="jumbotron">
        <div class="col-md-6">
            <h4>Available Blood Samples</h4>
        </div>
        <table class="table table-bordered table-responsive">
            <thead>
            <th>Hospital Name</th>
            <th>Available Blood Sample</th>
            <th>Request</th>
            </thead>
            <tbody>
            <?php
             while($res=mysqli_fetch_assoc($sql)) {
                 echo '<tr>';
                 echo '<td>' . $res['hospital_name'] . '</td>';
                 echo '<td>' . $res['blood_samples'] . '</td>';
             ?>
            <td> <button type="button" class="btn btn-success"><a href="ses.php">Request</a></button> </td>
             <?php
              echo '</tr>';
            }?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
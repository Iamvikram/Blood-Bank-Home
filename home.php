<!DOCTYPE html>
<html>
<head>
    <title> Blood Bank Home </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap css file-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Bootstrap javascript file -->
    <script src="js/bootstrap.min.js"></script>




</head>

<body>
<!--nav start -->
<nav class="navbar navbar-inverse navbar-static-top" style="margin-top: 10px;">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <li> <a href="home.php"> Home </a> </li>
            <li> <a href="hospital/hospital_regist.php"> Hospital Registration </a> </li>
            <li> <a href="hospital/hospitals.php"> Hospital Log In </a> </li>
            <li> <a href="Request_users/Receiver.php"> Receiver Registration </a> </li>
            <li> <a href="available_blood_samples.php"> Available Blood Samples </a> </li>

        </ul>
    </div>
</nav>
<!--nav end -->
<div class="container">
    <div class="jumbotron" style="margin-top: 80px; margin-bottom: 400px;">
        <h3>Welcome to blood bank home.</h3>
        <h4>If you are hospital side user then <a href="hospital/hospitals.php">Visit here!!</a></h4>
        <h4>If you want to make a blood request, first check your available blood type in hospitals  <a href="available_blood_samples.php">Visit here!!</a></h4>
    </div>
</div>

</body>
</html>
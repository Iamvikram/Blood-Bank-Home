<?php
include "../connection.php";
mysqli_select_db($conn,'bloodbank');
session_start();
$email=$_SESSION['r_email'];
$sql = mysqli_query($conn,"select * from hospital_side_registered_users");
extract($_POST);
$message="";
if(isset($submit) && $h_name!='' && $bGroup!='') {
    $sql=mysqli_query($conn,"insert into blood_sample_request VALUES ('','$email','$bGroup','$h_name')");
    $message = '<font color="green">' .'Your request is successfully sent to '.$h_name.'</font>';
}
else{

}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Blood Receiver Home </title>
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
            <li> <a href="requester_home.php"> Welcome <?php echo $email ; ?> </a> </li>
            <li> <a href="available_blood_samples.php"> Available Blood Samples </a> </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li> <a href="r_logout.php"> Log Out </a> </li>
        </ul>
    </div>
</nav>
<!--nav end -->
<div class="container">
    <div class="jumbotron" style="margin-top: 100px">
      <div class="col-md-6 ">
          <h4>Send Blood Sample Request</h4>
      </div>
        <div class="col-md-8 col-md-offset-1">
            <h4><?php echo @$message;?></h4>
        </div>
            <div class="row">
                <form method="post">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-1" style="margin-top: 40px">
                            <label for="b_group"> Select Required Blood Group Sample :</label>
                            <select name="bGroup"><option value="">Select blood group sample</option>
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
                        <div class="col-md-6 col-md-offset-1" style="margin-top: 25px">
                            <label for="hospi"> Select Hospital Name :</label>
                            <select name="h_name"><option value="">Select hospital name</option>
                                <?php
                                while ($r=mysqli_fetch_assoc($sql)){ ?>
                                    <option value="<?php echo $r['Hospital_name'];?>"><?php echo $r['Hospital_name'];?></option>

                                <?php }?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-3" style="margin-top: 20px"  >
                            <button type="submit"  name="submit" class="btn btn-success"  class="form-control">Send Request</button>
                        </div>
                    </div>
                </form>
            </div>

    </div>
</div>
</body>
</html>
<?php
session_start();
if(!isset($_SESSION['r_login'])){
    header("Location: r_signIn.php");
}
else{
    header("Location: requester_home.php");
}
?>

?>
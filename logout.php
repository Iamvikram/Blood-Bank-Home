<?php
session_start();
unset($_SESSION['user_h_name']);
header('location: hospitals.php');

?>
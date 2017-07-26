<?php
session_start();
unset($_SESSION['r_login']);
unset($_SESSION['r_email']);
header('Location: Receiver.php');
?>
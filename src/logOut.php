<?php
session_start();
unset($_SESSION['UserName']);
header("Location:../home.php");
?>

<?php
session_start();
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['phone']);
session_destroy();
header("Location:pbindex.php");
?>

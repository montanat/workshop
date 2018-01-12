<?php
session_start();
unset($_SESSION['AM_ID']);
unset($_SESSION['AM_US']);
session_destroy();
header('location:login.php');
?>

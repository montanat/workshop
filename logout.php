<?php
session_start();
unset($_SESSION['CUS_ID']);
unset($_SESSION['CUS_EM']);
session_destroy();
header('location:login.php');
?>

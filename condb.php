<?php
session_start();
//echo session_id();
$cn = mysqli_connect('localhost','root','','shop'); 
mysqli_set_charset($cn,'utf8'); 
?>
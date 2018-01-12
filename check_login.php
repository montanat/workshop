<?php
	require_once 'condb.php';
?>
<?php
	$email =$_POST['email'];
	$password =$_POST['password'];
	$sql ="select * from customers where email='$email' and password='$password'";
	$rs =mysqli_query($cn,$sql)or die(mysqli_error($cn));
	$nm =mysqli_num_rows($rs);
	echo "<br>".$nm;
	if ($nm>0) 
	{
		$rw=mysqli_fetch_array($rs);
		$_SESSION['CUS_ID']=$rw['id'];
		$_SESSION['CUS_EM']=$rw['email'];
		header('location:profile.php');
	}else{
		header('location:login.php');
	}
?>
<?php
	require_once 'condb.php';
?>
<?php
	$username =$_POST['username'];
	$password =$_POST['password'];
	$sql ="select * from admin where username='$username' and password='$password'";
	$rs =mysqli_query($cn,$sql)or die(mysqli_error($cn));
	$nm =mysqli_num_rows($rs);
	echo "<br>".$nm;
	if ($nm>0) 
	{
		$rw=mysqli_fetch_array($rs);
		$_SESSION['AM_ID']=$rw['id'];
		$_SESSION['AM_US']=$rw['username'];
		header('location:profile_a.php');
	}else{
		header('location:login.php');
	}
?>
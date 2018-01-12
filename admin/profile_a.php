<?php
  require_once 'condb.php'
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Admin Dashboard</title>
<!--hstyle-->
	<?php
		require_once'hstyle.php';
	?>
<!--/hstyle-->
  </head>

  <body>
<!--Navber-->
	<?php
		require_once'navber.php';
	?>
<!--/Navber-->
    <div class="container-fluid">
      <div class="row">
<!--sideber-->
	<?php
		require_once'sidebav.php';
	?>
<!--/sideber-->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>  
          <h2 class="sub-header">ลงชื่อเข้าใช้ Admin</h2>
          <div class="table-responsive">
            <table class="table table-striped">
        <?php
        $am_id=$_SESSION['AM_ID'];
        //echo "$cus_id";

        $sql ="select * from admin where id='$am_id'";
    $rs =mysqli_query($cn,$sql)or die(mysqli_error($cn));
    $rw =mysqli_fetch_array($rs);
      echo "username:".$rw['username']."<br>";
      echo "Passeord:".$rw['password']."<br>";
       ?>
       <a href="form_update_profile_a.php">Update</a>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
<!--fscript-->
	<?php
	require_once'fscript.php';
	?>
<!--/fscript-->    
  </body>
</html>

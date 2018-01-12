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
          <h2 class="sub-header">update profile</h2>
          <div class="table-responsive">
            <table class="table table-striped">
        <?php
        $am_id=$_SESSION['AM_ID'];
        //echo "$am_id";

        $sql ="select * from admin where id='$am_id'";
     $rs =mysqli_query($cn,$sql)or die(mysqli_error($cn));
    $rw =mysqli_fetch_array($rs);
    
  
       ?>
  <form method="post" action="updateprofile_a.php">
  <p>
    <label for="username">UserName</label>
    <input type="text" value="<?=$rw['name']?>" name="username" id="username" required>
  </p>
  <p>
    <label for="password">Password</label>
   <textarea rows="5" cols="jc" id="password" name="password"><?=$rw['password']?></textarea>     
  </p>
  <p>
    <button type="submit" name="save_btn">Resister</button>
    <button type="reset">Claer</button>
    
  </p>
</form>
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

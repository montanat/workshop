<?php
  require_once 'condb.php';
?>
<?php
  if (!isset($_SESSION['AM_ID'])) 
  {
    header('location:login.php');
    exit();
  }
  ?>
<?php

 if(isset($_GET['md'])&&$_GET['md']=='del')
 {
  echo"ok<br>";
  $id=$_GET['id'];
  $old_pic=$_GET['old_pic'];
  echo"ID=$id<br>";

  $sql="delete from admin where id='$id'";

  mysqli_query($cn,$sql)or die(mysqli_error($cn));
 if (file_exists("img_a/$old_pic")) 
 {
  unlink("img_a/$old_pic");
 }
  //Redirect
    header('location:list_admin.php');
 }

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
          <h2 class="sub-header">View Admin</h2>
             <p class="text-right">
              <a href="create_admin.php" class="btn btn-primary">Add New Product</a>
            </p>
            <br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                  <th>ID</th><th>Picture</th><th>Name</th><th>Username</th><th>password</th><th>Delele</th><th>Updale</th>
              </thead>
              <tbody>
     <?php
         $sql="select * from admin";
        $rs=mysqli_query($cn,$sql)or die(mysqli_error($cn));
         while ($rw=mysqli_fetch_array($rs)) {
    # code...
     ?>
    <tr>
      <td><?php echo $rw['id'];?></td>
      <td width="10%">
        <?php
          $img=$rw['picture'];
          if (!empty($img)) {
        ?>
          <img src="img_a/<?=$img?>" width="150">
        <?php
          }else{
            echo "NoPic";
          }
        ?>
      </td>

      <td><?php echo $rw['name'];?></td>
      <td><?php echo $rw['username'];?></td>
      <td><?php echo $rw['password'];?></td>
      <td><a href="list_admin.php?id=<?php echo $rw['id']?>&md=del&old_pic=<?=$rw['picture']?>">Del</td>
      <td><a href="form_update_a.php?id=<?php echo $rw['id']?>">updect</td>
    </tr>
  <?php
}

  ?>
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

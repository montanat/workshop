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
  if(isset($_POST['save_btn']))
  {
    echo "clicked<br>";
    $id=$_POST['id'];
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    echo "$name,$username,$password<br>";
    if(!empty($_FILES['picture']['name']))
    {
      $file=$_FILES['picture'];
      $fname=$file['name'];
      $type=$file['type'];
      $size=$file['size'];
      $tmp=$file['tmp_name'];
      $err=$file['error'];
      echo "Name=$fname<br>
            type=$type<br>
            size=$tmp<br>
            err=$err<br>";
      $file_name=explode('.', $fname);
      $ext=end($file_name);
      echo "EXT=$ext<br>";
      echo $file_name[0]."<br>";
      $new_name=date(YmjHis).'.'.$ext;
      echo "$new_name<br>";
      move_uploaded_file($tmp, "img_a/$new_name");
      if (file_exists("img_a/$old_pic"))
      {
      	unlink("img_a/$old_pic");
      }
    }else{
      $new_name=null;
    }
      echo "$name,$username,$password<br>";
      $sql ="Update admin set name='$name',username='$username',password='$password',picture='$new_name' where id='$id'";
      mysqli_query($cn,$sql)or die(mysqli_error($cn));
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
<!--content-->
  <div class="row">
    <div class="col-md-6">
      <!--form-->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Update Product</h3>
        </div>
    <div class="panel-body">
    <!---->

    <?php
    $id=$_GET['id'];
    $sql="select * from admin where id='$id'";
	$rs=mysqli_query($cn,$sql)or die(mysqli_error($cn));
	$rw=mysqli_fetch_array($rs);
	?>

    <form method="post" action="form_update_a.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $rw['name']?>" required>
    </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo $rw['username']?>" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control" id="password" name="password" value="<?php echo $rw['password']?>" required>
  </div>
  <div class="form-group">
  		<?php
					$img=$rw['picture'];
					if (!empty($img)) {
				?>
					<img src="img_a/<?=$img?>" width="150">
				<?php
					}else{
						echo 'NoPic';
					}
				?>
		<br>
    <label for="exampleInputFile">File input</label>
    <input type="file" name="picture" id="picture">

  </div>
  	<input type="hidden" name="id" value="<?php echo $rw['id']?>" >
	<input type="hidden" name="old_pic" value="<?php echo $img?>" >
  	<button type="submit" name="save_btn" class="btn btn-primary">Save Product</button>
</form>
    <!--/-->      
    </div>
      </div>
      <!--/form-->
    </div>
      <div class="col-md-6">
      <!--form-->

      <!--/form-->
    </div>
  </div>
  </div>
<!--/content-->
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
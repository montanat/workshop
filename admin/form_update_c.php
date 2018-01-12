<?php
  require_once 'condb.php'
?>
<?php
  if(isset($_GET['save_btn']))
  {
    echo "clicked<br>";
    $cat_id=$_GET['cat_id'];
    $cat_name=$_GET['cat_name'];
      echo "$cat_name<br>";
      $sql ="Update categories set cat_name='$cat_name' where cat_id='$cat_id'";
    
      mysqli_query($cn,$sql)or die(mysqli_error($cn));
      header('location:list_categories.php');
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
          <h3 class="panel-title">Add New Categories</h3>
        </div>
    <div class="panel-body">
    <!---->
    <?php

    $cat_id=$_GET['cat_id'];

    $sql="select * from categories where cat_id='$cat_id'";
  $rs=mysqli_query($cn,$sql)or die(mysqli_error($cn));
  $rw=mysqli_fetch_array($rs);
  ?>
    <form method="get" action="form_update_c.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="cat_name">Categories_name</label>
    <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo $rw['cat_name']?>" required >
  </div> 
  <input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id']?>" >
  <button type="submit" name="save_btn" class="btn btn-primary">Save Categories</button>
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
<?php
  require_once 'condb.php';
?>
<?php
   if(isset($_GET['cat_id'])){
      

  $cat_id = $_GET['cat_id'];
  $sql="delete from categories where cat_id='$cat_id'";
  mysqli_query($cn,$sql)or die(mysqli_error($cn));
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
          <h2 class="sub-header">View categories</h2>
            <p class="text-right">
              <a href="create_categories.php" class="btn btn-primary">Add New categories</a>
            </p>
            <br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Cat_id</th>
                  <th>Cat_name</th>
                  <th>Delele</th>
                  <th>Update</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $sql="select * from categories";
                $rs=mysqli_query($cn,$sql)or die(mysqli_error($cn));
                  while ($rw=mysqli_fetch_array($rs)){
                    # code...
                ?>
                <tr>
                  <td><?php echo $rw['cat_id'];?></td>
                  <td><?php echo $rw['cat_name'];?></td>
                  <td><a href="list_categories.php?cat_id=<?php echo $rw['cat_id']?>">Delete</td>
                  <td><a href="form_update_c.php?cat_id=<?php echo $rw['cat_id']?>">Update</td>
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

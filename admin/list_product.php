<?php
  require_once 'condb.php';
?>
<?php
  if(isset($_GET['md'])&&$_GET['md']=='del')
  {
    echo"ok<br>";
    $id=$_GET['id'];
    $old_pic=$_GET['old_pic'];
    echo "id=$id<br>";

    $sql="delete from products where id='$id'";

    mysqli_query($cn,$sql)or die(mysqli_error($cn));
    if (file_exists("img_p/old_pic"))
    {
      unlink("img_p/$old_pic");
    }
      header('location:list_product.php');
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
          <h2 class="sub-header">View Product</h2>
            <p class="text-right">
              <a href="create_product.php" class="btn btn-primary">Add New Product</a>
            </p>
            <br>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Picture</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Delele</th>
                  <th>Update</th>
                </tr>
              </thead>

              <tbody>
                <?php
                //เอาcat_id มาเชื่อม $sql
                  //$sql="select * from products order by id desc";
                  $sql="select products.*,categories.cat_name from products ";
                  $sql.=" inner join categories ";
                  $sql.=" on products.cat_id =categories.cat_id";

                  $rs=mysqli_query($cn,$sql)or die(mysqli_error($cn));
                  while ($rw=mysqli_fetch_array($rs)){
                    # code...
                ?>
                <tr>
                  <td><?php echo $rw['id'];?></td>
                    <td width="10%">
                      <?php
                        $img=$rw['picture'];
                        if (!empty($img)) {
                      ?>
                        <img src="img_p/<?=$img?>" width="150">
                      <?php
                      echo $img;
                        }else{
                          echo "ไม่มีรูปภาพ";
                      }
                      ?>
                    </td>

                  <td><?php echo $rw['name'];?>
                    <hr>
                    <?=$rw['cat_name']?>



                  </td>
                  <td><?php echo $rw['price'];?></td>
                  <td><a href="list_product.php?id=<?php echo $rw['id']?>&md=del&old_pic=<?=$rw['picture']?>">Delete</td>
                  <td><a href="form_update_p.php?id=<?php echo $rw['id']?>">Update</td>
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

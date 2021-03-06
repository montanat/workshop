<?php
  require_once 'condb.php'
?>
<?php
  if(isset($_POST['save_btn']))
  {
    echo "clicked<br>";
    $name=$_POST['name'];
    $price=$_POST['price'];
    $cat_id=$_POST['cat_id'];
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
      $new_name=date('YmjHis').'.'.$ext;
      echo "$new_name<br>";
      move_uploaded_file($tmp, "img_p/$new_name");
    }else{
      $new_name=null;
    }
      echo "$name,$price<br>";
      $sql ="insert into products(name,price,picture,cat_id)
      values('$name','$price','$new_name','$cat_id')";
      mysqli_query($cn,$sql)or die(mysqli_error($cn));
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
<!--content-->
  <div class="row">
    <div class="col-md-6">
      <!--form-->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Add New Product</h3>
        </div>
    <div class="panel-body">
    <!---->
    <form method="post" action="" enctype="multipart/form-data">

      <div class="form-group">

        <select class="form-control" name="cat_id" required >
          <option></option>
          <?php
            $sql_cat ="select * from categories order by cat_name ASC";
            $rs_cat = mysqli_query($cn,$sql_cat) or die(mysqli_error($cn));
            while ($rw_cat = mysqli_fetch_array($rs_cat)) {
              # code...
            
          ?>
          <option value="<?=$rw_cat['cat_id']?>"><?=$rw_cat['cat_name']?></option>
          <?php
          }
          ?>
        </select>
      </div>

    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="product name">
    </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price" placeholder="price">
  </div>
  <div class="form-group">
    <label for="picture">File input</label>
    <input type="file" name="picture" id="picture">
    <p class="help-block">Example block-level help text here.</p>
  </div>
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

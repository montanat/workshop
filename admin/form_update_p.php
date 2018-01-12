<?php
	require_once 'condb.php';
?>
<?php
  if(isset($_POST['edit_btn']))
  {
echo"clicked<br>";
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $old_pic=$_POST['old_pic'];
    $cat_id=$_POST['cat_id'];

    echo "$name,$price<br>";
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
        size=$size<br>
        tmp=$tmp<br>
        err=$err<br>";
    $file_name=explode('.', $fname);
    $ext=end($file_name);
    echo "EXT=$ext<br>";
    echo $file_name[0]."<br>"; //ถ้าเปน1จะแสดง เปนนามสกุล
    $new_name=date('YmjHis').'.'.$ext;
    echo"$new_name<br>";
    move_uploaded_file($tmp, "img_p/$new_name");
    if (file_exists("img_p/$old_pic")) 
    {
      unlink("img_p/$old_pic");
    }
  }else{
    $new_name=$old_pic;
  } 
    //คำสั้งinscrt
    $sql ="Update products set name='$name',price='$price',picture='$new_name',cat_id='$cat_id' where id='$id'";
    //ประมวลผล
    mysqli_query($cn,$sql)or die(mysqli_error($cn));
  echo "ssss";
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
		//require_once'navber.php';
	?>
<!--/Navber-->
    <div class="container-fluid">
      <div class="row">
<!--sideber-->
	<?php
		//require_once'sidebav.php';
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
    $sql="select * from products where id='$id'";
	$rs=mysqli_query($cn,$sql)or die(mysqli_error($cn));
	$rw=mysqli_fetch_array($rs);
	?>

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
          <option value="<?=$rw_cat['cat_id']?>"
            <?=($rw['cat_id']==$rw_cat['cat_id'])? 'selected' :'' ?>
            ><?=$rw_cat['cat_name']?></option>
          <?php
          }
          ?>
        </select>
      </div>

    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $rw['name']?>" required>
    </div>
  <div class="form-group">
    <label for="price">Produet Price</label>
    <input type="text" class="form-control" id="price" name="price" value="<?php echo $rw['price']?>" required>
  </div>
  <div class="form-group">
  		<?php
					$img=$rw['picture'];
					if (!empty($img)) {
				?>
					<img src="img_p/<?=$img?>" width="150">
				<?php
					}else{
						echo 'NoPic';
					}
				?>
		<br>
   <label for="picture">Picture</label>
    <input type="file" name="picture" id="picture">

  </div>
  	<input type="hidden" name="id" value="<?php echo $rw['id']?>" >
	<input type="hidden" name="old_pic" value="<?php echo $img?>" >
  	<button type="submit" name="edit_btn" class="btn btn-primary">edit Product</button>
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

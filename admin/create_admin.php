<?php
  require_once 'condb.php'
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
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
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
      move_uploaded_file($tmp,"img_a/$new_name");
    }else{
      $new_name=null;
    }
      echo "$name,$username,$password<br>";
      $sql ="insert into admin(name,username,password,picture)
      values('$name','$username','$password','$new_name')";
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
          <h3 class="panel-title">Add New Admin</h3>
        </div>
    <div class="panel-body">
    <!---->
    <form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="name">
    </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="Password" class="form-control" id="password" name="password" placeholder="password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
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

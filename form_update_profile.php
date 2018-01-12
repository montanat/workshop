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
    <link rel="icon" href="../favicon.ico">
    <title>Register Dashboard</title>
  <!--hstyle-->
    <?php
      require_once'hstyle_p.php';
    ?>
  <!--/hstyle-->
  </head>

  <body>
  <!--Navber-->
    <?php
      require_once'navber_p.php';
    ?>
  <!--/Navber-->

    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
            <h2>แก้ไขข้อมูล</h2>
          </div>
       <?php
        $cus_id=$_SESSION['CUS_ID'];
        //echo "$cus_id";

        $sql ="select * from customers where id='$cus_id'";
     $rs =mysqli_query($cn,$sql)or die(mysqli_error($cn));
    $rw =mysqli_fetch_array($rs);
    
  
       ?>
  <form method="post" action="updateprofile.php">
  <p>
    <label for="name">Name</label>
    <input type="text" value="<?=$rw['name']?>" name="name" id="name" required>
  </p>
  <p>
    <label for="address">Address</label>
   <textarea rows="5" cols="jc" id="address" name="address"><?=$rw['address']?></textarea>     
  </p>
  <p>
    <button type="submit" name="save_btn">Resister</button>
    <button type="reset">Claer</button>
    
  </p>
</form>
        </div><!--/.col-xs-12.col-sm-9-->
    <!--sideber-->
    <?php
       require_once'sidebar_p.php';
    ?>
    <!--/sideber-->
      </div><!--/row-->
      <hr>
      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div><!--/.container-->
<!--fscript-->
  <?php
  require_once'fscript_p.php';
  ?>
<!--/fscript-->   
  </body>
</html>

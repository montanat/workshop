<?php
  require_once 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">
    <title>Product Dashboard</title>
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
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap.</p>
          </div>
          <!--content-->
          <?php
            $id =$_GET['id'];
            $sql ="select * from products where id='$id'";
            $rs_pro =mysqli_query($cn,$sql)or die(mysqli_error($cn));
            $rw_pro =mysqli_fetch_array($rs_pro);
          ?>
          <div class="row">
          <div class="page-header">
            <h1><?=$rw_pro['name']?></h1>
          </div>
          <div class="row">
            <div class="col-md-6">
              <img class="img-responsive img-thumbnail" src="admin/img_p/<?=$rw_pro['picture']?>" alt="...">
            </div>
            <div class="col-md-6">
              <div class="well well-sm"><strong>Price:</strong><?=$rw_pro['price']?></div>
              <p></p>
              <input type="number" min='1' max="1000" class="form-control" id="qty<?=$rw_pro['id']?>" value="1">
              <input type="text"  id="name<?=$rw_pro['id']?>" value="<?=$rw_pro['name']?>">
              <input type="text"  id="price<?=$rw_pro['id']?>"  value="<?=$rw_pro['price']?>">
              <button type="button" name="add_to_cart" id="<?=$rw_pro['id']?>" class="add_to_cart btn btn-primary">ADD TO CART</button>
              <hr>Item<?=count($_SESSION['SP_CART'])?>
            </div>
          </div>
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
        <!--/end content-->

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

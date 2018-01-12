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
          <div class="row">
            <div class="page-header">
            <h1>Product catalog</h1>
            </div>
        <!--thumbnails-->
        <div class="row">
          <?php
          $sql="select * from products order by id DESC ";
          $rs_pro= mysqli_query($cn,$sql)or die(mysqli_error($cn));
          while ($rw_pro =mysqli_fetch_array($rs_pro)) {
          
          ?>
        <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="admin/img_p/<?=$rw_pro['picture']?>" alt="...">
        <div class="caption">
        <h3><?=$rw_pro['name']?></h3>
        <p><strong>Price:</strong><?=$rw_pro['price']?></p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="view_product.php?id=<?=$rw_pro['id']?>" class="btn btn-default" role="button">View detel</a></p>
        </div>
        </div>
        </div>
          <?php
}
          ?>
        </div>
        <!--/thumbnails-->
          </div><!--/row-->
          <!--/end content-->
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

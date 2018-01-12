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
          <div class="row">
    <!--cart -->
            <div class="table-responsive">
    <table class="table table-bordered">
    <tr>
    <th>#</th>
    <th>Pro name</th>
    <th>Qty</th>
    <th>Price</th>
    <th>Sub Total</th>
    <th>Action</th>
  </tr>
 <?php
if(!empty($_SESSION['SP_CART'])){
  $total=0;
  $sub_total=0;
  $no=1;
  foreach ($_SESSION['SP_CART'] as $key => $value) {
  $sub_total=($value['pro_qty']*$value['pro_price']);
?> 
  <tr>
    <td><?=($no++)?></td>
    <td><?=$value['pro_name']?></td>
    <td>  
    <input type="number" name="qty[]" min='1' max="1000"  id="qty<?=$value['pro_qty']?>" value="<?=$value['pro_qty']?>" data-pro_id="<?=$value['pro_id']?>" class="qty">
    </td>
    <td><?=$value['pro_price']?></td>
    <td><?=(number_format($sub_total,2))?></td>
    <td><button type="button" name="delete" class="delete" id="'.$value['pro_id'].'">Remove</button></td>
  </tr>

<?php
$total+=$sub_total;
}//foreach
?>
  <tr>
    <td colspan="4">Total</td>
    <td><?= number_format($total,2)?></td>
    <td></td>
  </tr>
<?php
}//if

?> 
</table>
</div>
   <!--/cart -->
          </div><!--/row-->
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

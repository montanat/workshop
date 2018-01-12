<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link href="css/signin.css" rel="stylesheet">
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
            <h2>สมัครสมาชิก</h2>
          </div>

  <form method="post" action="resister.php" >
  <p>
    <label for="name">Name</label>
    <input type="text" name="name" id="name"  class="form-control" required>
  </p>
  <p>
    <label for="address">Address</label>
   <textarea rows="5" cols="jc" id="address" class="form-control" name="address"></textarea>     
  </p>
  <p>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" required>
  </p>
  <p>
    <label for="password">Password</label>
    <input type="Password" name="password" id="password" class="form-control" required>
  </p>
  <p>
    <button class="btn btn-lg btn-success " type="submit" name="save_btn">Resister</button>
    <button class="btn btn-lg btn-danger " type="reset">Claer</button>
    
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

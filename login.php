<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Sign in Customer</title>
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

          <div class="row">
               <form method="post" action="check_login.php" class="form-signin">
        <h2 class="form-signin-heading">Please sign in Customer</h2 ><br>
        <label for="inputEmail" class="sr-only">Email address </label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required ><br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
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



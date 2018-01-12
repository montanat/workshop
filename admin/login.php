<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Sign in Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <script src="../js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="container">
      <div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-4 main">
      <form method="post" action="check_login.php" class="form-signin">
        <h2 class="form-signin-heading">Please sign in Admin</h2>
        <label for="Username" class="sr-only">Username</label>
        <input type="username" name="username" id="username" class="form-control" placeholder="Username" required >

        <label for="Password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      </div>
    </div> <!-- /container -->

    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>



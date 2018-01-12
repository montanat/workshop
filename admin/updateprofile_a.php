<?php
  require_once 'condb.php'
?>
<?php
  if(isset($_POST['save_btn']))
  {
    echo "clicked<br>";
    $username=$_POST['username'];
    $password=$_POST['password'];
   
      echo "$username,$password<br>";
      $am_id=$_SESSION['AM_ID'];
      $sql ="update admin set username='$username',password='$password' where id='$am_id'";

      mysqli_query($cn,$sql)or die(mysqli_error($cn));
      header('location:profile_a.php');
  }

?>
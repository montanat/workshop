<?php
  require_once 'condb.php'
?>
<?php
  if(isset($_POST['save_btn']))
  {
    echo "clicked<br>";
    $name=$_POST['name'];
    $address=$_POST['address'];
   
      echo "$name,$address<br>";
      $cus_id=$_SESSION['CUS_ID'];
      $sql ="update customers set name='$name',address='$address' where id='$cus_id'";

      mysqli_query($cn,$sql)or die(mysqli_error($cn));
      header('location:profile.php');
  }

?>
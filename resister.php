<?php
  require_once 'condb.php'
?>
<?php
  if(isset($_POST['save_btn']))
  {
    echo "clicked<br>";
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
      echo "$name,$address,$email,$password<br>";
      $sql ="insert into customers(name,address,email,password)
      values('$name','$address','$email','$password')";
      mysqli_query($cn,$sql)or die(mysqli_error($cn));
      header('location:profile.php');
  }

?>
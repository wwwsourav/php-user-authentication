<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>php new batch</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
include('common/nav.php');

?>

<div class="container">
  <h2>User Registration form</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Phone:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter phone" name="phone">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter phone" name="password">
    </div>
    <div class="form-group">
      <label for="pwd">confirm password:</label>
      <input type="password" class="form-control"  name="confirmpassword">
    </div>
    
    <button type="submit" name="submit" class="btn btn-default">Register</button>
  </form>
</div>

</body>
</html>
<?php
include('dbcon.php');
if (isset($_POST['submit'])) {
  if($_POST['password']==$_POST['confirmpassword']){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $query="insert into register (name, email, phone, password) values('$name', '$email', '$phone', '$password')";
    $sql=mysqli_query($conn,$query);

    //$row=mysqli_fetch_array($sql)
    if ($sql) {
      //echo "<script> alert('success')</script>";
       $test="SELECT * FROM register where email='$email' and password='$password'";
       $r=mysqli_query($conn,$test);
       $a=mysqli_fetch_array($r);
      $_SESSION['id']=$a['id'];
      $_SESSION['name']=$a['name'];
      header('location:show.php');
    }
    else{
      echo "<script> alert('failed')</script>";
    }
  }
  
}


?>

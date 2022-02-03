<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>php</title>
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
  <h2>User form</h2>
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
      <label for="pwd">city:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter phone" name="city">
    </div>
    <div class="form-group">
      <label for="pwd">image:</label>
      <input type="file" class="form-control"  name="image">
    </div>
    
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>

<?php
 include('dbcon.php');
 if(isset($_POST['submit'])){
   $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $city=$_POST['city'];
   $file_name=$_FILES['image']['name'];
  //print_r($file_name); exit();
  $file_type=$_FILES['image']['type'];
  $file_size=$_FILES['image']['size'];
  $file_temp_loc=$_FILES['image']['tmp_name'];
  $file_store="image/".$file_name;
  move_uploaded_file($file_temp_loc, $file_store);
  //print_r($file_name);

   $query= "INSERT INTO  crud1(name,email,phone,city,image) VALUES('$name','$email','$phone','$city','$file_name')";
   $sql=mysqli_query($conn,$query);
   if($sql){
     $_SESSION['success']="Add Record Successfully";
     header('location:show.php');
     echo "<script>alert('insert data successfully')</script>";
   }
   else{
    // $_SESSION['error']='insert data failed';
    echo "<script>alert('insert data failed')</script>";
   }
 }



?>

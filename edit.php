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
<?php
include('dbcon.php');
$update=$_GET['id'];
$query="select * from crud1 where id='$update'";
$sql=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($sql);
?>
<div class="container">
  <h2>User Update form</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter name" name="name" value="<?php echo $row['name'];?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">Phone:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter phone" name="phone" value="<?php echo $row['phone'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">city:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter phone" name="city" value="<?php echo $row['city'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">image:</label>
      <input type="file" class="form-control"  name="image" value="<?php echo $row['image'];?>">

    </div>
    <img src="image/<?php echo $row['image'];?>" width="100px" height="50px">
    <p>
    <hr>
    <button type="submit" name="update" class="btn btn-success">Update</button>
  </form>
</div>

</body>
</html>
<?php

include('dbcon.php');

if (isset($_POST['update'])) {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $city=$_POST['city'];
  
  $file_name=$_FILES['image']['name'];
  $file_type=$_FILES['image']['type'];
  $file_size=$_FILES['image']['size'];
  $file_temp_loc=$_FILES['image']['tmp_name'];
  $file_store="image/".$file_name;
  move_uploaded_file($file_temp_loc, $file_store);
  
  $query="update crud1 set name='$name',email='$email',phone='$phone',city='$city',image='$file_name' where id='$update'";
  $sql=mysqli_query($conn,$query);

  if ($sql) {
   
   $_SESSION['success']='update data successfully';
    header('location:show.php');

  }
  else{

   
    echo "<script> alert('failed');</script>";
  }
  

}



?>
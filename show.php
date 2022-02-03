<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location:login.php');
}
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
  <h2>View all data</h2>
  <p><a href="insert_data.php" class="btn btn-info">Add-User</a></p> 

<!-- user session start -->
  <?php
    if (isset($_SESSION['success'])) { ?>   
    <div class="alert alert-success">
  <strong>Info!</strong> <?php echo $_SESSION['success'];?>
</div>
<?php 
}
unset($_SESSION['success']);
    ?>
    <!-- user session end -->
<!-- login session start -->
      <?php
    if (isset($_SESSION['login'])) { ?>   
    <div class="alert alert-success">
       <?php echo $_SESSION['login'];?>
</div>
<?php 
}
unset($_SESSION['login']);
    ?>
    <!-- login session end -->


  <table class="table table-bordered">
    <thead>
      <tr>
      <th>id</th>
        <th>name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>city</th>
         <th>image</th>
        
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
        include('dbcon.php');
        $sql="select * from crud1";
        $query=mysqli_query($conn,$sql);
        ?>
        <?php while($row=mysqli_fetch_assoc($query)) {?>
      <tr>
      <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['city'];?></td>
        <td><img src="image/<?php echo $row['image'];?>" width="100px" height="50px"></td>
        <td><a href="edit.php?id=<?= $row['id']?>" class="btn btn-info">Update</a></td>
        <td><a href="delete.php?id=<?= $row['id']?>" class="btn btn-danger">Delete</a></td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>

</body>
</html>

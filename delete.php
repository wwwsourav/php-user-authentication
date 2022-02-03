<?php
session_start();
include('dbcon.php');
$delete=$_GET['id'];
$query="delete from crud1 where id='$delete'";
$sql=mysqli_query($conn,$query);
if($sql){
$_SESSION['success']='delete data success';
	header('location:show.php');
}
else{
	//$_SESSION['error']='delete failed';
	header('location:show.php');

}
?>
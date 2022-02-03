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
  <h2>User Login form</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'];?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter phone" name="password"value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>">
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="remember" value="1" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Login</button>
  </form>
</div>

</body>
</html>
<?php
include('dbcon.php');
if (isset($_POST['submit'])) {

		$email=$_POST['email'];		
		$password=$_POST['password'];
    $remember=$_POST['remember'];
    if($remember==1){
      setcookie('email', $email);
      setcookie('password',$password);
    }

		$query="SELECT * FROM register where email='$email' and password='$password'";
		$sql=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($sql);
		if (is_array($row)) {
			//echo "<script> alert('login successfull')</script>";
			//header('location:show.php');
			$_SESSION['login']="login successfully";
			$_SESSION["id"]=$row['id'];
			$_SESSION["name"]=$row['name'];
			//print_r($_SESSION); exit();
			//echo $_SESSION["id"]; exit();
			
			header('location:show.php');
			
		}
		else{
			echo "<script> alert('login failed')</script>";
		}
	
	
}


?>
